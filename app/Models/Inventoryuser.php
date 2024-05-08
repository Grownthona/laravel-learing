<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//change here 
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

//change here
class Inventoryuser extends Model implements AuthenticatableContract
{
    use HasFactory;
    //change here
    use AuthenticableTrait;

    protected $table = 'inventoryusers';
    protected $primaryKey = 'id';
    protected $fillable = ['name','role','joining','password'];

    public $timestamps = false;
}
