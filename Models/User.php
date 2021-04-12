<?php

namespace Flex\Models;

use Illuminate\Database\Eloquent\Model as Model;

class User extends Model
{
    /**
     * Prevent mass-assignment with fillable fields.
     */
    protected $fillable = [];

    /**
     * Model hidden fields
     */
    protected $hidden   = [];

    /**
     * Model timestamp fields
     */
    public $timestamps  = [];


    /**
     * Model Info
     */
    public function info()
    {
        return $this;
    }
}
