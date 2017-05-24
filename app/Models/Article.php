<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Article
 *
 * @mixin \Eloquent
 */
class Article extends Model
{
    protected $appends = ['tagged_name','category_name'];

    public function getTaggedNameAttribute()
    {
        $tag_array = Tag::find(explode(',', $this->attributes['tagged']))->toArray();
        return array_column($tag_array, 'name');
    }

    public function getCategoryNameAttribute()
    {
        $category = Category::findOrFail($this->attributes['category_id']);
        return $category->name;
    }
}
