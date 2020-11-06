<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jelo extends Model
{
    use HasFactory;
    protected $table = 'jelos';

    public $primaryKey = 'id';


    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function sastojci(){
        return $this->belongsToMany('App\Models\Sastojak', 'jela_sastojci', 'jelo_id', 'sastojak_id')->withTimestamps();
    }
    public function kategorija(){
        return $this->belongsTo('App\Models\Kategorija');
    }
}
