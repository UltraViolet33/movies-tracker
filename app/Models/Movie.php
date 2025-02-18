<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "year",
        "genre",
        "plot",
        "director",
        "imdbID"
    ];



    public function categories()
    {
        return $this->belongsToMany(Category::class, "category_movie");
    }
}
