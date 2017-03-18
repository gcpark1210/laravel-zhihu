<?php

namespace App\Http\Controllers;

use App\Repositories\MessageRepository;
use Illuminate\Http\Request;
use Auth;

class MessageController extends Controller
{
    protected $message;

    /**
     * MessageController constructor.
     *
     * @param $message
     */
    public function __construct(MessageRepository $message)
    {
        $this->message = $message;
    }

    public function store()
    {
        $message = $this->message->create([
            'from_user_id' => user('api')->id,
            'to_user_id' => request('user'),
            'body' => request('body')
        ]);
        if ($message){
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }
}
