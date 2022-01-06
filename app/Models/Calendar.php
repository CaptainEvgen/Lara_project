<?php

namespace App\Models;

use App\Models\Event;
use App\Models\GoogleAccount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Calendar extends Model
{
    use HasFactory;


    protected $fillable = [
        'google_id', 'name', 'color', 'timezone',
    ];

    public function googleAccount()
    {
        return $this->belongsTo(GoogleAccount::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
