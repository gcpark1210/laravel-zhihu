<?php

namespace App\Repositories;

use App\User;

/**
 * Class UserRepository
 *
 * @package \Repositories
 */
class UserRepository
{
    public function byId($id)
    {
        return User::find($id);
    }
}
