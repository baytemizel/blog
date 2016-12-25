<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use Sluggable;

    protected $table = 'pages';

    protected $fillable = [
        'category_id', 'slug', 'title', 'content', 'status'
    ];

    /**
     * İlk eklemede title a göre oto slug yapacak
     * @return array
     */

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function tags()
    {
        return $this->hasMany('App\Tag', 'page_id', 'id');
    }
}
