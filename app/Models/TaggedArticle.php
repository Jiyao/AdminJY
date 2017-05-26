<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaggedArticle extends Model
{
    protected $fillable = ['tag_id','article_id'];
}
