<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Project;
use Auth;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Transaction;
use PayPal\Api\Amount;
use PayPal\Api\ItemList;
use PayPal\Api\Item;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payer;

class ProjectController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req) {
        $cat = $req->get('category');
        $projects = Project::where('statusProject', '!=', 'deleted');

        if (!empty($cat) && $cat !== 'all')
            $projects->where('category', '=', $cat);

        $data = $projects->get();
            

        return view('Project/project', ['projects' => $data]); 
    }

    public function createProjectForm() {
        if (Auth::check()) {
            return view('Project/createProject');
        } else {
            return redirect('auth/login');
        }
    }

    public function viewDetail($projectID)
    {
      $detProject = Project::findOrFail($projectID);
      $user = $detProject->creator;

      return view('Project/projectDetail', compact('detProject', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProject(Request $request) {
        if (Auth::check()) {
            $image      = $request->file('mainImage');
            $filename   = time() . '-' . $image->getClientOriginalName();
            $path       = public_path('upload/project/' . $filename);
            $destPath   = public_path('upload/project/');
            $request->file('mainImage')->move($destPath, $filename);

            $user = Auth::user();

            $project = new Project;
            $project->title         = $request->title;
            $project->mainImage     = $filename;
            $project->created_by    = $user->_id;
            $project->category      = $request->category;
            $project->description   = $request->description;
            $project->goal          = $request->goal;
            $project->duration      = $request->endDate;
            $project->save();

            return redirect('projects'); //
        } else {
            return redirect('auth/login');
        }
    }

    public function viewEditDetail($projectID) {
        if (Auth::check()) {
            $detProject = Project::findOrFail($projectID);

            return view('Project/editProject', compact('detProject'));
        } else {
            return redirect('auth/login');
        }
    }

    public function updateProject(Request $request) {
        if (Auth::check()) {
            $id         = $request->input('id');
            $detProject = Project::findOrFail($id);

            $image      = $request->file('mainImage');
            $filename   = time() . '-' . $image->getClientOriginalName();
            $path       = public_path('image/' . $filename);
            $destPath   = public_path('image/');
            $request->file('mainImage')->move($destPath, $filename);

            $detProject->mainImage = $filename;
            $detProject->category = $request->input('category');
            $detProject->description = $request->input('description');
            //$project->goal = $request->goal;
            //$project->duration = $request->duration;
            $detProject->save();

            return redirect('project/' . $id);
        } else {
            return redirect('auth/login');
        }
    }

    public function deleteProject($id) {
        if (Auth::check()) {
            $detProject = Project::findOrFail($id);
            $detProject->statusProject = 'deleted';
            $detProject->save();

            return redirect('projects');
        } else {
            return redirect('auth/login');
        }
    }

    public function donate(Request $request, $id){
      return $this->checkout($id, 
              $request->input('description'), $request->input('amount'));
    }

    private function checkout($id, $desc, $value)
    {
        if(false === is_numeric($value) || $value <= 0) {
            throw new \Exception('Price must not be less than 0');
        }
        $paypal_conf = \Config::get('paypal');
        $api = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $api->setConfig($paypal_conf['settings']);

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $donation = new Item();
        $donation->setName('Item 1') // item name
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($value);

        $list = new ItemList();
        $list->setItems(array($donation));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($value);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($list)
            ->setDescription($desc);

        $redirect_urls = new RedirectUrls();
        $redirect_urls
            ->setReturnUrl('http://localhost:8000/thank-you/'.$id)
            ->setCancelUrl('http://localhost:8000/cancel/'.$id);

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($api);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                echo "Exception: " . $ex->getMessage() . PHP_EOL;
                $err_data = json_decode($ex->getData(), true);
                exit;
            } else {
                die('Some error occur, sorry for inconvenient');
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        // add payment ID to session
        \Session::put('paypal_payment', $payment);

        if(isset($redirect_url)) {
            // redirect to paypal
            return \Redirect::away($redirect_url);
        }

        return \Redirect::route('original.route')
            ->with('error', 'Unknown error occurred');
    }

    public function thankYou($id)
    {
        /* @var $payment Payment */
        $payment = \Session::get('paypal_payment');
        $project = \App\Models\Project::findOrFail($id);
        foreach($payment->getTransactions() as $transaction) {
            /* @var $transaction Transaction */
            $project->amount += $transaction->getAmount()->getTotal();
            if($project->goal >= $project->amount) {
                $project->achieved = true;
            }
        }
        \Session::forget('paypal_payment');
        $project->save();
        
        return view('Project/thanks');
    }
}
