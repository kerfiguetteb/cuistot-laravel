<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;


class Recette extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function ingredientsRecettes():HasMany
    {
        return $this->hasMany(IngredientRecette::class);
    }

    public function getSlug(): string
    {
        return Str::slug($this->title);
    }


}


