<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestInven extends Model
{
    use HasFactory;
    protected $table = 'requests';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
