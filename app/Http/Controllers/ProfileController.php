<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * ProfileController
 *
 * @author Lim Afriyadi <lim.afriyadi.id@gmail.com>
 */
class ProfileController extends Controller
{
    /**
     * View on profile
     * 
     * @return \Illuminate\View\View
     */
    public function index() 
    {
        return view('profile/index', ['user'=>\Auth::user()]);
    }
    
    /**
     * View member profile
     * 
     * @param string $id
     * @return \Illuminate\View\View
     */
    public function view($id)
    {
        $user = \App\User::findOrFail($id);
        return view('profile/view', [ 'user' => $user ]);
    }
    
    /**
     * Save profile
     * 
     * @param Request $req
     * @return \Illuminate\View\View
     */
    public function save(Request $req)
    {
        $this->validate($req, [
            'first_name' => 'required|max:255',
            'last_name'  => 'required|max:255',
            'gender'     => 'required|in:m,f',
            'phone'      => 'required|max:15',
            'address_1'  => 'required'
        ]);
        $user = \Auth::user();
        $user->first_name = $req->input('first_name');
        $user->last_name  = $req->input('last_name');
        $user->gender     = $req->input('gender');
        $user->phone      = $req->input('phone');
        $user->address_1  = $req->input('address_1');
        $user->address_2  = $req->input('address_2');
        $user->save();
        
        return view('profile/index', ['user'=>$user]);
    }
    
    /**
     * Save profile picture
     * 
     * @param Request $req
     * @return \Illuminate\View\View
     */
    public function image(Request $req)
    {
        $file = $req->file('image');
        if($file->isValid()) {
            $user = \Auth::user();
            $target = base_path('public/upload/profile/'.date('Y/m/d'));
            $file->move($target, $user->_id.'.jpg');
            $user->image = '/upload/profile/'.date('Y/m/d/').$user->_id.'.jpg';
            $user->save();
            return redirect('/profile');
        }
    }
}
