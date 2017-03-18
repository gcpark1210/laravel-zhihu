<?php

namespace App\Repositories;

use App\Answer;

/**
 * Class AnswerRepository
 *
 * @package \Repositories
 */
class AnswerRepository
{
    public function byId($id)
    {
        return Answer::find($id);
    }

    public function getAnswerCommentsById($id)
    {
        $answer = Answer::with('comments', 'comments.user')->where('id', $id)->first();

        return $answer->comments;
    }

    public function create(array $attribute)
    {
        return Answer::create($attribute);
    }


}
