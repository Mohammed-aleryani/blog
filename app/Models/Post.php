<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;

class Post extends Model
{
    use HasFactory;

    use Prunable;

    public function prunable(): Builder
    {
        return static::where('status', 'draft')->where('updated_at', '<', Carbon::now()->subWeek(4));
    }

    protected $guarded = [];

    public
    function scopeFilter(
        $query,
        array $filters
    ) {
        $query->when($filters['search'] ?? false,
            fn($query, $search) => $query->where(fn($query) => $query->where('title', 'like',
                '%'.request('search').'%')->orWhere('body', 'like', '%'.request('search').'%')));

        $query->when($filters['category'] ?? false, fn($query, $category) => $query->whereExists(fn($query
        ) => $query->from('categories')->whereColumn('categories.id', 'posts.category_id')->where('categories.slug',
            $category)
        ));

        $query->when($filters['author'] ?? false,
            fn($query, $author) => $query->whereHas('author', fn($query) => $query->where('user_name', $author)
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

    public
    function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

