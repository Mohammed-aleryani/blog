<?php

    use App\Http\Controllers\CommentController;
    use App\Http\Controllers\NewsletterController;
    use App\Http\Controllers\PostController;
    use App\Http\Controllers\RegisterController;
    use App\Http\Controllers\SessionController;
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

    Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
    Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

    Route::get('/login', [SessionController::class, 'create'])->middleware('guest');
    Route::post('/login', [SessionController::class, 'store'])->middleware('guest');

    Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');

    Route::post('/posts/{post:slug}', [CommentController::class, 'store'])->middleware('auth');

    Route::post('/newsletter', NewsletterController::class);

    Route::get('admin/posts/create', [PostController::class, 'create'])->middleware('admin');
    Route::post('admin/posts/store', [PostController::class, 'store'])->middleware('admin');


