<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $fillable = [
        'table_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'guest_number',
        'date'
    ];

    public function table()
    {
        return $this->belongsTo(Table::class, 'table_id', 'id', 'belongsTo');
    }
}
