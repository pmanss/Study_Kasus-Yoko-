<?php
namespace App\Transformers;

use App\Users;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform (User $user)
    {
        return [
            'name' => $user->name,
            'email' => $user->email,
            'level' => $user->level,
            'registered' => $user->created_at->diffForHumans(),

        ];
    }
}