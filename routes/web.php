<?php

    use App\Models\Category;
    use App\Models\Post;
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

    Route::get('/', function (){
        return view('posts', ['posts' => Post::latest()->get(), 'categories' => Category::all()]);
    })->name('home');

    Route::get('/posts/{post}', function ($slug){
        return view('post', ['post' => Post::where('slug', $slug)->first()]);
    });

    Route::get('/category/{category:slug}', function (Category $category){
        return view('posts', [
            'posts'           => $category->posts,
            'currentCategory' => $category,
            'categories'      => Category::all()
        ]);
    });

    Route::get('/author/{author:user_name}', function (User $author){
        return view('posts', ['posts' => $author->posts]);
    });

