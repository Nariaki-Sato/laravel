<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restdata extends Model
{
    protected $table = 'restdata';
    protected $guarded = array('id');

    public static $rule = array(
        'message' => 'required',
        'url' => 'required',
    );

    public function getData() {
        return $this->id . ':' . $this->message . '(' . $this->url() . ')';
    }
}
