<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disc extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'artist',
        'stile',
        'amount',
        'released_at'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'name' => 'string',
        'artist' => 'string',
        'stile' => 'string',
        'amount' => 'integer',
        'released_at' => 'datetime:d-m-Y',
    ];

    public static $rules = [
        'name' => 'required|string|max:100',
        'artist' => 'required|string|max:100',
        'stile' => 'required|string|max:100',
        'amount' => 'required|numeric',
        'released_at' => 'required|date',
    ];
}
