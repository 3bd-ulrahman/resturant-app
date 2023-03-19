<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'description',
        'image'
    ];

    // RelationShips
    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'category_menu', 'category_id', 'menu_id');
    }

    protected static function booted(): void
    {
        static::addGlobalScope('accessor', function (Builder $builder) {
            $builder->select('*', DB::raw("CONCAT('/storage/', image) as image_url"));
        });
    }
}
