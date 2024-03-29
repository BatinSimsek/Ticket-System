<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'ticket',
    ];

    //Registreerd ticket_user table
    public function users() {
        return $this->belongsToMany(User::class, 'ticket_user');
    }

}
