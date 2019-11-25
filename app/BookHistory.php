<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookhistory extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'book_id' => 'required',
        'edited_at' => 'required',
    );
}
