<?php

namespace App\Repositories;

use App\Message;

/**
 * Class MessageRepository
 *
 * @package \Repositories
 */
class MessageRepository
{
    public function create(array $attributes)
    {
        return Message::create($attributes);
    }
}
