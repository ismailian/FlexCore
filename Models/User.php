<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
    protected $fillable = [];
    protected $hidden   = [];
    public $timestamps  = [];
}
