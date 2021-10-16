<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => true,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'payments' => 'c,r,u,d',
            'profile' => 'r,u',
            'formations' => 'c,r,u,d',
            'cours' => 'c,r,u,d',
            'phases' => 'c,r,u,d',
            'questions' => 'c,r,u,d',
            'commentaires' => 'c,r,u,d',
            'reponse_cs' => 'c,r,u,d',
            'reponse_qs' => 'c,r,u,d'
        ],
        'administrator' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u',
            'formations' => 'c,r,u,d',
            'cours' => 'c,r,u,d',
            'phases' => 'c,r,u,d',
            'questions' => 'c,r,u,d',
            'commentaires' => 'c,r,u,d',
            'reponse_cs' => 'c,r,u,d',
            'reponse_qs' => 'c,r,u,d'
        ],
        'user' => [
            'profile' => 'r,u',
            'formations' => 'c,r,u,d',
            'cours' => 'c,r,u,d',
            'phases' => 'c,r,u,d',
            'questions' => 'c,r,u,d',
            'commentaires' => 'c,r,u,d',
            'reponse_cs' => 'c,r,u,d',
            'reponse_qs' => 'c,r,u,d'
        ],
        'formateur' => [
            'profile' => 'r,u,',
            'formations' => 'c,r,u,d',
            'cours' => 'c,r,u,d',
            'phases' => 'c,r,u,d',
            'questions' => 'c,r,u,d',
            'commentaires' => 'c,r,u,d',
            'reponse_cs' => 'c,r,u,d',
            'reponse_qs' => 'c,r,u,d'
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
