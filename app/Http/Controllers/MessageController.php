<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

/**
 * MessageController
 *
 * @author Lim Afriyadi <lim.afriyadi.id@gmail.com>
 */
class MessageController extends Controller
{
    public function inbox(Request $req)
    {
        $user = \Auth::user();
        $messages = Message::query()
                ->where('to', $user->_id)
                ->where('context', null)
                ->paginate(20, array(), 'page', $req->query('page', 1));
        
        return view('message/inbox', ['messages'=>$messages]);
    }
    
    public function compose($memberId)
    {
        $member = \App\User::findOrFail($memberId);
        
        return view('message/compose', ['member'=>$member]);
    }
    
    public function reply($id)
    {
        $context = Message::findOrFail($id);
        $sender  = $context->fromMember;
        
        return view('message/reply', ['context' => $context, 'sender'=>$sender]);
    }
    
    public function send(Request $req, $id)
    {
        $member  = \App\User::findOrFail($id);
        Message::create(array(
            'to'      => $member->_id,
            'sender'  => \Auth::user()->_id, 
            'subject' => $req->input('subject'),
            'message' => $req->input("message"),
            'context' => null
        ));
        
        return redirect("/members/".$id);
    }
    
    public function respond(Request $req, $id)
    {
        $context  = \App\Message::findOrFail($id);
        Message::create(array(
            'to'      => $context->fromMember->_id,
            'sender'  => \Auth::user()->_id, 
            'subject' => $context->subject,
            'context' => $context->_id,
            'message' => $req->input("message")
        ));
        
        return redirect("/messages");
    }
    
    public function delete(Request $req)
    {
        $message = Message::findOrFail($req->input('id'));
        $message->delete();
        
        return redirect('/messages');
    }
}
