<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'birth_date',
        'email',
        'phone',
        'document_number'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'document_number' => 'string',
        'birth_date' => 'datetime:d-m-Y',
    ];

    public static $rules = [
        'name' => 'required|string|max:100',
        'email' => 'required|unique:clients|email|max:100',
        'phone' => 'required|string|max:30',
        'document_number' => 'required|unique:clients|string|max:30',
        'birth_date' => 'date',
    ];
}
