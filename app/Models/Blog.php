<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'id';

    protected function casts(): array
    {
        return [
            'blog_date' => 'datetime',
            'audio_on' => 'boolean',
            'markdown_on' => 'boolean',
        ];
    }

    public function getBlogDateAttribute($value)
    {
        if ($value == null) {
            return Carbon::now()->format('Y-m-d');
            //return null;
        }
        return Carbon::parse($value)->format('Y-m-d');
    }

    // Ein Blog (blogs) gehört zu genau einem Blogautor (blog_authors)
    public function blog_author()
    {
        return $this->belongsTo('App\Models\BlogAuthor', 'blog_author_id', 'id');
    }

    // Ein Blog (blogs) gehört zu genau einem Blogbild (blog_images)
    public function blog_image()
    {
        return $this->belongsTo('App\Models\BlogImage', 'blog_image_id', 'id');
    }

    // Ein Blog (blogs) gehört zu genau einer Blogkategorie (blog_categories)
    public function blog_category()
    {
        return $this->belongsTo('App\Models\BlogCategory', 'blog_category_id', 'id');
    }

    public function scopeFilterBlog($query, array $filters)
    {
        if (isset($filters['search']) && trim($filters['search'] !== '')) {
            $search = $filters['search'];
            $query->where('blogs.title', 'like', '%' . $search . '%')
                ->orWhere('blogs.summary', 'like', '%' . $search . '%')
                ->orWhere('blogs.content', 'like', '%' . $search . '%')
                ->orWhere('blog_authors.name', 'like', '%' . $search . '%');
        }
        //
        return $query;
    }

    protected static function boot()
    {
        parent::boot();
        static::created(function ($blog) {
            $blog->slug = $blog->initSlug($blog->title);
            $blog->save();
        });
    }

    public static function initSlug($title)
    {
        $slug = Str::slug($title, '-');
        if (static::whereSlug($slug)->exists()) {
            $max = static::whereTitle($title)->count();
            return $slug . '-' . $max;
        }
        //
        return $slug;
    }
}
