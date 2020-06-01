<?php

use App\Sensei;
use App\User;
use App\Role;


return [


    'table_modal' => [
        'senseis' => Sensei::class,
        'users' => User::class,
        'roles' => Role::class,
    ],



];
