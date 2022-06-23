<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['id_category', 'title', 'description', 'content'];
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
}
