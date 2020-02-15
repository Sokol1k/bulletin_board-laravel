<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Spatie\Permission\Models\Permission;
use Faker\Generator as Faker;

$factory->define(Permission::class, function (Faker $faker) {
    return [
        'name' => 'create bulletin',
        'guard_name' => 'web'
    ];
}, 'create bulletin');

$factory->defineAs(Permission::class, 'show bulletin', function (Faker $faker) {
    return [
        'name' => 'show bulletin',
        'guard_name' => 'web'
    ];
});

$factory->defineAs(Permission::class, 'update bulletin', function (Faker $faker) {
    return [
        'name' => 'update bulletin',
        'guard_name' => 'web'
    ];
});

$factory->defineAs(Permission::class, 'delete bulletin', function (Faker $faker) {
    return [
        'name' => 'delete bulletin',
        'guard_name' => 'web'
    ];
});

$factory->defineAs(Permission::class, 'index bulletins', function (Faker $faker) {
    return [
        'name' => 'index bulletins',
        'guard_name' => 'web'
    ];
});

$factory->defineAs(Permission::class, 'store bulletin', function (Faker $faker) {
    return [
        'name' => 'store bulletin',
        'guard_name' => 'web'
    ];
});

$factory->defineAs(Permission::class, 'edit bulletin', function (Faker $faker) {
    return [
        'name' => 'edit bulletin',
        'guard_name' => 'web'
    ];
});

$factory->defineAs(Permission::class, 'confirm user', function (Faker $faker) {
    return [
        'name' => 'confirm user',
        'guard_name' => 'web'
    ];
});

$factory->defineAs(Permission::class, 'index users', function (Faker $faker) {
    return [
        'name' => 'index users',
        'guard_name' => 'web'
    ];
});

