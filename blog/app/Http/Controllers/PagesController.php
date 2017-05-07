<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Session;
use Mail;

class PagesController extends Controller
{
    public function getIndex(){
    	$posts = Post::orderBy('id', 'desc')->paginate(5);
    	return view('pages.index')->withPosts($posts);
    }

    public function getAbout(){
    	return view('pages.about');
    }

    public function getContact(){
    	return view('pages.contact');
    }

    public function postContact(Request $request){
        $this->validate($request, [
                'email' => 'required|email',
                'subject' => 'min:3',
                'message' => 'min:10']);

        $data = array(
                'email' => $request->email,
                'subject' => $request->subject,
                'bodyMessage' => $request->message
            );

        Mail::send('emails.contact', $data, function ($message) use($data){
            $message -> from($data['email']);
            $message -> to('cc49aa23cc-bc988f@inbox.mailtrap.io');
            $message -> subject( $data['subject']);
        });

        Session::flash('success', 'Your Email was Sent!');

        return redirect('/');
    }
}
