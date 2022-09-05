<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $appends = array('disc');

    public $fillable = [
        'disc_id',
        'amount',
    ];

    protected $hidden = [
        'updated_at'
    ];

    protected $casts = [
        'disc_id' => 'integer',
        'amount' => 'integer',
        'created_at' => 'datetime:d-m-Y h:i:s',
    ];

    public static $rules = [
        'disc_id' => 'required|exists:discs,id',
        'amount' => 'required|numeric',
    ];

    public function disc() {
        return $this->hasOne(Disc::class, 'id', 'disc_id')->get(['name','artist','stile'])->toArray();
    }

    public function getDiscAttribute()
    {
        return $this->disc();
    }
}
