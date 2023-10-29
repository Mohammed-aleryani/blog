<?php

    namespace App\Http\Controllers;

    use App\Models\Category;
    use App\Models\Post;
    use Illuminate\Validation\Rule;

    class AdminPostController extends Controller
    {
        public
        function index()
        {
            return view('admin.posts.index', [
                'posts' => Post::latest()->paginate(50)
            ]);
        }

        public
        function create()
        {
            return view('admin.posts.create', ['categories' => Category::all()]);
        }

        public
        function store()
        {
            $attributes = $this->validatePost();


            $attributes[ 'thumbnail' ] = request()->file('thumbnail')->store('thumbnails');
            $attributes[ 'user_id' ]   = auth()->id();
            Post::create($attributes);
            return redirect('/')->with('success', 'Your post has been added!');
        }

        public
        function edit(
            Post $post
        ){
            return view('admin.posts.edit', [
                'post'       => $post,
                'categories' => Category::all()
            ]);
        }

        public
        function update(
            ?Post $post
        ){
            $attributes = $this->validatePost($post);


            if (($attributes[ 'thumbnail' ] ?? false)) {
                $attributes[ 'thumbnail' ] = request()->file('thumbnail')->store('thumbnails');
            }

            $post->update($attributes);
            return back()->with('success', 'Post Updated!');
        }

        public
        function delete(
            Post $post
        ){
            $post->delete();
            return back()->with('success', 'Post deleted!');
        }

        /**
         * @param  Post  $post
         * @return array
         */
        protected
        function validatePost(
            Post $post = null
        )
        : array{
            $attributes = request()->validate([
                'title'       => 'required',
                'thumbnail'   => $post->exists ? ['image'] : ['image', 'required'],
                'slug'        => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
                'excerpt'     => 'required',
                'body'        => 'required',
                'category_id' => ['required', Rule::exists('categories', 'id')]
            ]);
            return $attributes;
        }
    }
