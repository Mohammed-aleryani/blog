<?php

    namespace App\Http\Controllers;

    use App\Models\Category;
    use App\Models\Post;
    use Illuminate\Validation\Rule;

    class PostController extends Controller
    {
        public
        function index()
        {
            return view('posts.index', [
                'posts' => Post::orderBy('id', 'desc')->filter(request(['search', 'category', 'author']))->paginate(6),
            ]);
        }

        public
        function show(
            Post $post
        ){
            return view('posts.show', ['post' => $post]);
        }

        public
        function create()
        {
            return view('admin.posts.create', ['categories' => Category::all()]);
        }

        public
        function store()
        {
//            ddd(request()->all());
            $attributes = request()->validate([
                'title'       => 'required',
                'slug'        => ['required', Rule::unique('posts', 'slug')],
                'thumbnail'   => 'required',
                'excerpt'     => 'required',
                'body'        => 'required',
                'category_id' => ['required', Rule::exists('categories', 'id')]
            ]);

            $attributes[ 'thumbnail' ] = request()->file('thumbnail')->store('thumbnails');
            $attributes[ 'user_id' ]   = auth()->id();
            Post::create($attributes);
            return redirect('/')->with('success', 'Your post has been added!');
        }
    }

