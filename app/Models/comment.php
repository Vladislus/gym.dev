<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment',
    ];
    public function post(){
        return $this->belongsTo(post::class);
    }
    public function person(){
        return $this->belongsTo(person::class);
    }
}
