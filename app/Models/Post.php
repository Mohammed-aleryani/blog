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
            $query->when($filters[ 'search' ] ?? false, fn($query, $search) => $query->where('title', 'like', '%'.request('search').'%')->orWhere('body', 'like', '%'.request('search').'%'));
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

