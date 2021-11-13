<?php

namespace Ikoncoder\Ikonstarter\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function author()
    {
        return $this->morphTo();
    }

    protected static function newFactory()
    {
        return \Ikoncoder\Ikonstarter\Database\Factories\PostFactory::new();
    }
}