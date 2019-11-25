<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Book extends Model
{
    protected $table = 'book';
    protected $guarded = array('id');


    public static $rules = array(
        'title' => 'required',
        'body' => 'required',
        'page1' => 'required',
        'word1' => 'required',
        'important' => 'required',
        'plan' => 'required',
        'action' => 'required',
    );

    public function bookhistories()
    {
        return $this->hasMany('App\BookHistory');
    }
}
