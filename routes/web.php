<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home.index', []);
// })->name('home.index');

// Route::get('/contact', function () {
//     return view('home.contact');
// })->name('home.contact');

Route::get('/', [HomeController::class, 'home'])->name('home.index');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');

Route::get('/single', AboutController::class);

$posts = [
    1 => [
        'title' => 'Intro to Laravel',
        'content' => 'This is a short intro to Laravel',
        'is_new' => true,
        'has_comments' => true
    ],
    2 => [
        'title' => 'Intro to PHP',
        'content' => 'This is a short intro to PHP',
        'is_new' => false
    ]
];

Route::resource('/posts', PostsController::class);
// Route::get('/posts', function () use ($posts) {
//     return view('posts.index', [
//         'posts' => $posts
//     ]);
// })->name('posts.index');

// Route::get('/posts/{id}', function ($id) use ($posts) {


//     abort_if(!isset($posts[$id]), 404);

//     return view('posts.show', [
//         'post' => $posts[$id]
//     ]);   
// })->name('posts.show');
// Route::get('/recent-posts/{days_ago?}', function ($daysAgo = 20)
// {
//     return 'Posts from ' . $daysAgo . ' days ago';
// })->name('posts.recent.index');

Route::get('/fun/responses', function () use ($posts) {
    return response($posts, 201)
        ->header('Content-Type', 'application/json')->cookie('MY_COOKIE', 'Piotr Jura', 3600);
});

Route::get('/fun/redirect', function () {
    return redirect('/contact');
});

Route::get('/fun/back', function () {
    return back();
});
