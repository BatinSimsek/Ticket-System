<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    protected $fillable = [
        'name'
    ];

    /**
     * A role can have many users.
     *
     * @return BelongsToMany
     */
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }
}
