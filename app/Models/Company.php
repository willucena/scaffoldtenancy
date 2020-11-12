<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public $fillable = [ 'name','domain','bd_database','bd_username', 'bd_hostname', 'bd_password'];
}
