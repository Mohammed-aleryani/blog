<?php

    use App\Http\Controllers\AdminPostController;
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
    Route::patch('posts/comment/{comment}', [CommentController::class, 'update'])->middleware('auth')->middleware('can:commentOwner,comment');
    Route::delete('posts/comment/{comment}', [CommentController::class, 'destroy'])->middleware('can:commentOwner,comment');

    Route::post('/newsletter', NewsletterController::class);


    Route::middleware('can:admin')->group(function (){
        Route::get('/admin/posts', [AdminPostController::class, 'index']);
        Route::get('/admin/posts/create', [AdminPostController::class, 'create']);
        Route::post('/admin/posts/store', [AdminPostController::class, 'store']);
        Route::get('/admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
        Route::patch('/admin/posts/{post}', [AdminPostController::class, 'update']);
        Route::delete('/admin/posts/{post}', [AdminPostController::class, 'delete']);
    });





