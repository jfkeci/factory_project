<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sastojak extends Model
{
    use HasFactory;
    protected $fillable = ['naziv'];
    public function jela(){
        return $this->belongsToMany('App\Models\Jelo', 'jela_sastojci', 'jelo_id', 'sastojak_id')->withTimestamps();
    }
}
