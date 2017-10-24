<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'data';
    protected $guarded = array('id');

    public static $rules = [
      'message' => 'required',
      'url' => 'required',
    ];

    public function getData() {
        return $this->id . ':' . $this->message . '(' . $this->url . ')';
    }
    //
}
