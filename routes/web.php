<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

// Redirect the root path directly to your login page
Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', function () {
    return view('login');
});

// Added 06-10-2026 Bolivar Login
Route::post('/login', function (Request $request) {

    $username = strtolower($request->username);
    $password = strtolower($request->password);

    if ($username === 'guest' && $password === 'guest') {

        session(['user' => 'guest']); // ✔ IMPORTANT

        return redirect('/dashboard');
    }

    return back()->with('error', 'Invalid credentials');
});


/* PROTECTED PAGES */
Route::get('/dashboard', function () {
    if (!session('user')) return redirect('/login');
    return view('dashboard');
});

Route::get('/products', function () {
    if (!session('user')) {
        return redirect('/login');
    }

    $products = [
        [
            'id' => 1,
            'name' => 'Donut Ensamada',
            'price' => 45,
            'image' => '1.jpeg'
        ],
        [
            'id' => 2,
            'name' => 'Donut Ensamada Set',
            'price' => 150,
            'image' => '2.jpeg'
        ],
        [
            'id' => 3,
            'name' => 'Choco Brownies',
            'price' => 200,
            'image' => '3.jpeg'
        ],
        [
            'id' => 4,
            'name' => 'Banana Cake',
            'price' => 160,
            'image' => '4.jpeg'
        ],
        [
            'id' => 5,
            'name' => 'Assorted Cookies',
            'price' => 35,
            'image' => '5.jpg'
        ],
        [
            'id' => 6,
            'name' => 'Mini Assorted Cookies Set',
            'price' => 100,
            'image' => '6.jpg'
        ],
        [
            'id' => 7,
            'name' => 'Carrot Cake',
            'price' => 160,
            'image' => '7.jpg'
        ],
        [
            'id' => 8,
            'name' => 'Carrot Muffins',
            'price' => 80,
            'image' => '7.jpg' // Fixed: Updated item 8 image extension safely to match your array pattern
        ]
    ];

    return view('products', compact('products'));
});

Route::get('/contact', function () {
    if (!session('user')) return redirect('/login');
    return view('contact');
});

Route::get('/logout', function () {
    session()->forget('user');
    return redirect('/login');
});
