<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    // Table Name
    protected $table = 'data';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
