<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['logo', 'name', 'email', 'website'];

    public function employee()
    {
        return $this->hasMany('App\Models\Employee');
    }
}
