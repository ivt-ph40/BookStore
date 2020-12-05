<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Role extends Model
{
    protected $fillable =['name'];
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
