<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('posts');
});

Route::get('post/{post}', function ($slug) {
    $post = Post::find($slug);
    // if (!file_exists($path = __DIR__ . "/../resources/posts/$slug.html";)) {
    //     dd($slug);
    // }
    // $post = cache()->remember("posts.{$slug}", now()->addSeconds(5), fn() => file_get_contents($path));
    // return view('post', [
    //     "post" => $post
    // ]);
})->where('post', '[A-z_\-]+');
