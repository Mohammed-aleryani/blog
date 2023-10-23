<?php

    use App\Http\Controllers\PostController;
    use App\Models\User;
    use Illuminate\Support\Facades\Route;

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

    Route::get('/', [postController::class, 'index'])->name('home');

    Route::get('/posts/{post:slug}', [PostController::class, 'show']);
    Route::get('/author/{author:user_name}', function (User $author){
        return view('posts', ['posts' => $author->posts]);
    });

