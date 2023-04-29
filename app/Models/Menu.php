<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';

    protected $fillable = [
        'name',
        'description',
        'image',
        'price'
    ];

    // Relationships
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_menu', 'menu_id', 'category_id');
    }

    // Global accessor
    protected static function booted(): void
    {
        static::addGlobalScope('accessor', function (Builder $builder) {
            $builder->select('*', DB::raw("CONCAT('/storage/', image) as image_url"));
        });
    }
}
