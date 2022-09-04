<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $appends = array('client', 'disc');

    public $fillable = [
        'client_id',
        'disc_id',
        'amount',
        'released_at'
    ];

    protected $hidden = [
        'updated_at'
    ];

    protected $casts = [
        'client_id' => 'integer',
        'disc_id' => 'integer',
        'amount' => 'integer',
        'created_at' => 'datetime:d-m-Y h:i:s',
    ];

    public static $rules = [
        'client_id' => 'required|exists:clients,id',
        'disc_id' => 'required|exists:discs,id',
        'amount' => 'required|numeric',
    ];

    public function client() {
        return $this->hasOne(Client::class, 'id', 'client_id')->get(['name','email','phone'])->toArray();
    }

    public function getClientAttribute()
    {
        return $this->client();
    }

    public function disc() {
        return $this->hasOne(Disc::class, 'id', 'disc_id')->get(['name','artist','stile'])->toArray();
    }

    public function getDiscAttribute()
    {
        return $this->disc();
    }
}
