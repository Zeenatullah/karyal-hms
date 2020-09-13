<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class S3File extends Model
{
    protected $fillable = ['filename', 'url'];
}
