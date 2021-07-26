<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['full_name','address','zipcode','phone','state','city',];


    public function user() {
        return $this->hasOne(User::class);
    }
}
