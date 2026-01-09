<?php

namespace App\Policies;

use App\Models\Client;
use App\Models\User;

class ClientPolicy
{
    /**
     * Determine whether the user can delete the client.
     */
   // app/Policies/ClientPolicy.php
public function delete(User $user)
{
    return $user->isAdmin();
}


    // Outros métodos podem ser implementados conforme necessário
}
