<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public function users(){

       return $this->hasMany(User::Class);
    }
}
