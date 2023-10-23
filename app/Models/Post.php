<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Post extends Model
    {
        use HasFactory;

        protected $fillable = ['title', 'category_id', 'slug', 'excerpt', 'body'];

        public
        function scopeFilter(
            $query, array $filters
        ){
            $query->when($filters[ 'search' ] ?? false, fn($query, $search) => $query->where(fn($query) => $query->where('title', 'like', '%'.request('search').'%')->orWhere('body', 'like', '%'.request('search').'%')));

            $query->when($filters[ 'category' ] ?? false, fn($query, $category) => $query->whereExists(fn($query) => $query->from('categories')->whereColumn('categories.id', 'posts.category_id')->where('categories.slug', $category)
            ));

            $query->when($filters[ 'author' ] ?? false, fn($query, $author) => $query->whereHas('author', fn($query) => $query->where('user_name', $author)
            ));
        }

        public
        function category()
        {
            return $this->belongsTo(Category::class);
        }

        protected $with = ['category', 'author'];

        public
        function author()
        {
            return $this->belongsTo(User::class, 'user_id');
        }
    }

