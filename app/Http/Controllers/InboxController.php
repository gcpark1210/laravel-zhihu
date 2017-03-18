<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class InboxController extends Controller
{

    /**
     * InboxController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $messages = Message::where('to_user_id', user()->id)
            ->orWhere('from_user_id', user()->id)
            ->with(['fromUser', 'toUser'])
            ->get();
        return $messages->groupBy('to_user_id');
        return view('inbox.index', ['messages' => $messages->groupBy('to_user_id')]);
    }

    public function show($userId)
    {
        $message = Message::where('from_user_id', $userId)->get();

        return $message;
    }
}
