<?php
use Faker\Factory as Faker;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/register', function () {
    return view('register');
})->name('register');
Route::get('/home', function () {
    $contacts = [];
    $faker = Faker::create();
    for ($i = 1; $i <= 10; $i++) {
        $contacts[] = [
            'nama' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'title' => $faker->randomElement(['Software Engineer', 'Quality Assurance', 'Product Manager', 'Account Manager', 'Customer Service']),
            'job' => $faker->jobTitle,
            'role' => $faker->randomElement(['Owner', 'User', 'Admin']),
            'status' => $faker->randomElement(['active', 'inactive', 'pending']),
        ];
    };
    return view('home',['contacts' => $contacts]);
})->name('home');
