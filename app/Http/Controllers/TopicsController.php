<?php

namespace App\Http\Controllers;

use App\Repositories\TopicsRepository;
use Illuminate\Http\Request;

class TopicsController extends Controller
{
    protected $topic;

    /**
     * TopicsController constructor.
     *
     * @param $topic
     */
    public function __construct(TopicsRepository $topic)
    {
        $this->topic = $topic;
    }

    public function index(Request $request)
    {
        return $this->topic->getTopicsForTagging($request);
    }
}
