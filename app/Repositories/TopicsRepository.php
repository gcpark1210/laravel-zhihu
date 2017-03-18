<?php

namespace App\Repositories;

use Request;
use App\Topic;

/**
 * Class TopicsRepository
 *
 * @package \App\Repositories
 */
class TopicsRepository
{
    public function getTopicsForTagging(Request $request)
    {
        return Topic::select(['id','name'])
            ->where('name','like','%'.$request->query('q').'%')
            ->get();
    }
}
