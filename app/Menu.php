<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nestable\NestableTrait;

/**
 * App\Menu
 *
 * @mixin \Eloquent
 */
class Menu extends Model
{
    use NestableTrait;

    protected $parent = 'parent_id';
}
