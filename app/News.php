<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [
    	'zh_title', 'en_title', 'jp_title', 'zh_content', 'zh_content_html', 'en_content', 'en_content_html', 'jp_content', 'jp_content_html', 'is_index', 'category', 'publish_at',
    ];

    public function getTitleAttribute()
    {
        $lang = session('language', 'zh');

        $key = $lang . '_title';

        return $this->{$key};
    }

    public function getContentAttribute()
    {
        $lang = session('language', 'zh');

        $key = $lang . '_content';
        return $this->{$key};
    }
}
