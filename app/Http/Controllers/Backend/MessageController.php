<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MessageController extends Controller
{
    public function Index()
    {
        $messages = Message::all();
        return view('backend.message.message_all',compact('messages'));
    }

    public function Delete($id): \Illuminate\Http\RedirectResponse
    {
        Message::find($id)->delete();
        return Redirect::back()->with('success','Message Deleted Successfully');
    }
}
