<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    //Fillable Example
    //protected $fillable = ['name', 'email', 'active'];

    //Guarded Example
    protected $guarded = [];
    public function scopeActive($query){

        return $query->where('active', 1);
    }
    public function scopeInactive($query){

        return $query->where('active', 0);
    }
}
