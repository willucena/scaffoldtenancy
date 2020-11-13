<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Company
 * @package App\Models
 * @version November 12, 2020, 11:57 pm -03
 *
 */
class Company extends Model
{
    use HasFactory;


    public $fillable = [ 'name','domain','bd_database','bd_username', 'bd_hostname', 'bd_password'];




    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
