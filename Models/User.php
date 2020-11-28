<?php

namespace Flex\Models;

use Illuminate\Database\Eloquent\Model as Model;

class User extends Model
{
    protected $fillable = [];
    protected $hidden   = [];
    public $timestamps  = [];

    public function info()
    {
        return $this;
    }
}
