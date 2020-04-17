<?php

namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model;

class Campground extends Model
{
    protected $collection = 'campgrounds';
}