<?php

namespace App\Http\Composers;

use Illuminate\View\View;

class MyComposer {
    // composeメソッドの引数$viewは、サービスプロバイダのboot()でView::composerが実行された際に呼び出される
    public function compose(View $view) {
        // $view->getName()でビューの名前をGET -> PRACTICED.CHILD が帰ってくるはず
        $view->with('view_message', 'This is '. $view->getName() . '!!');
    }
}