<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['date','time_from','time_to','class','day','title','quantity_classroom','subject','hability','methodology','activities','systematization','extrainfo'];

}


