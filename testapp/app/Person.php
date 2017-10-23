<?php

namespace App;

use App\Scopes\ScopePerson;                 # Scopeクラスの利用
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;   # Builderの利用を登録

class Person extends Model {

    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'sex' => 'required',
        'age' => 'integer|min:0|max:150',
    );


    ### グローバルスコープ
    ### モデルの全てのデータ取得に適用されるスコープ
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ScopePerson);

        /*
        static::addGlobalScope('age', function (Builder $builder) {
            $builder->where('age', '>', 30);
        });
        */
    }

    ### ローカルスコープ
    public function getData() {
        return $this->id . ': ' . $this->name . '(' . $this->age . ')';
    }

    public function scopeNameEqual($query, $str) {
        # queryはwhereで取得されるのと同じBuilderインスタンス
        # strは引数 $request->input が置き換えられる
        return $query->where('name', $str);

        ### 例
        # $person = Person::where('name', $request->input)->first();    # where検索
        # $person = Person::nameEqual($request->input)->first();          # nameEqual検索

    }

    public function boards() {                       # メソッド名は関連づけるモデル名
        return $this->hasMany('App\Board');  # 引数に指定したモデルへの関連付け
    }

}
