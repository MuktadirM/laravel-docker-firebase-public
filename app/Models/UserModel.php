<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model{


    protected $fillable = [
        'key',
        'name',
        'image',
        'verified',
        'createdBy',
        'phone',
        'ic',
        'type',
        'sex',
        'address',
        'email',
        'createdAt',
        'updatedAt',
    ];


    public function createdAt(){
        return Carbon::parse($this->createdAt);
    }
    public function insert(){
        dd($this, $this->name,$this->createdAt()->diffForHumans());
    }
}