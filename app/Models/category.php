<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
class category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'is_publish' 
    ];
    protected $table = 'category';
}
