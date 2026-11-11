<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Admin Seed Password
    |--------------------------------------------------------------------------
    |
    | Password for the admin user created by DatabaseSeeder outside the local
    | and testing environments. When empty, a random password is generated.
    |
    */

    'admin_seed_password' => env('ADMIN_SEED_PASSWORD'),

    /*
    |--------------------------------------------------------------------------
    | Admin Seed Email
    |--------------------------------------------------------------------------
    |
    | Email for the admin user created by DatabaseSeeder. It is required outside
    | the local and testing environments: a public inbox such as mailinator.com
    | would let anyone reset the super_admin password.
    |
    */

    'admin_seed_email' => env('ADMIN_SEED_EMAIL'),

    /*
    |--------------------------------------------------------------------------
    | Require Two-Factor Authentication for super_admin
    |--------------------------------------------------------------------------
    |
    | When true, users with the super_admin role must enable two-factor
    | authentication before using the panel. Enabled by default in production.
    |
    */

    'require_super_admin_two_factor' => (bool) env('REQUIRE_SUPER_ADMIN_2FA', env('APP_ENV') === 'production'),

];
