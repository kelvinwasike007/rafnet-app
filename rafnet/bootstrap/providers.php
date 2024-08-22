<?php
use Laravel\Passport\PassportServiceProvider;
return [
    App\Providers\AppServiceProvider::class,
    App\Providers\VoltServiceProvider::class,
    PassportServiceProvider::class,
];
