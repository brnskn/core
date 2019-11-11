<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TmpSession extends Model
{
    protected $fillable = ['session_id', 'key', 'value'];

    public function getValueAttribute($value)
    {
        return json_decode($value);
    }
}