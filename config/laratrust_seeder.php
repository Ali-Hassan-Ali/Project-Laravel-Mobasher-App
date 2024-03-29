<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [

        'super_admin' => [
            'dashboard'  => 'r',
            'admins'     => 'c,r,u,d',
            'users'      => 'c,r,u,d',
            'owners'     => 'c,r,u,d',
            'orders'     => 'c,r,u,d,s',
            'citys'      => 'c,r,u,d',
            'regions'    => 'c,r,u,d',
            'categorys'  => 'c,r,u,d',
            'apartments' => 'c,r,u,d,s',
        ],

        'admin' => [
            'dashboard'  => 'r',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        's' => 'status'
    ]
];
