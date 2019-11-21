<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = array('id');


    public static $rules = array(
        'title' => 'required',
        'body' => 'required',
        'page1' => 'required',
        'word1' => 'required',
        'important' => 'required',
        'plan' => 'required',
        'body' => 'required',
        'action' => 'required',
    );
}
