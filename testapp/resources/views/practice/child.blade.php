@extends ('layouts.parent')

<!-- h1へ埋め込み-->
@section ('title', 'Person-Child')

@section('menubar')
    @parent <!-- 親にあるセクションを表示できる -->
    子供1
    子供2
@endsection

@section('content')
    <p>ここが本文のコンテンツです</p>
    <p>必要なだけ記述できます</p>

    <!-- /views/components/の中からとってくる -->
    @component('components.message')
        <!-- スロットで変数に値を入れる -->
        @slot('msg_title')CAUTION!@endslot
        @slot('msg_content')メッセージ@endslot
    @endcomponent

<!--
    # /views/components/message.blade.php
    <div class="message">
        <p class="msg_title">{$msg_title}</p>
        <p class="msg_content">{$msg_content}</p>
    </div>
-->

@endsection

@section('example')
    @component('components.example')
        @slot('exp_title')例@endslot
        @slot('exp_content')これはCOMPONENTの練習です@endslot
    @endcomponent
@endsection

@section('content2')
    <!-- サブビューの読み込み -->
    @php $array =  ['msg_title' => 'OK', 'msg_content' => 'Sub View']; @endphp
    @include('components.message', $array)
@endsection

@section('content3')
    @php
        $data = [
            ['name' => '山田太郎', 'mail' => 'yamada', ],
            ['name' => '田中花子', 'mail' => 'tanaka', ],
            ['name' => '鈴木二郎', 'mail' => 'suzuki', ],
            ['name' => '佐藤三郎', 'mail' => 'satou', ],
        ];
    @endphp
    <!-- テンプレート名, 配列, 変数名 -->
    @each('components.item', $data, 'item')

    <!-- <li>{$item['name']} [ {$item['mail']} ] -->

    <p>ビューコンポーザ</p>
    <p>コントローラーで設定した値: {{ $message }} </p>

    <pre>
    public function child() {
        $data = ['message' => 'Hello',];
        return view('practice.child', $data);
    }

    </pre>

    <h2>ビューコンポーザーで設定した値: {{$view_message}}</h2>

    <pre>
    class MyServiceProvider extends ServiceProvider{
        # ブートストラップ処理: アプリケーションが起動されるたびに割り込んで実行
        public function boot(){
            // ビューコンポーザを設定するためのもの
            View::composer(
                'practice.child', // 第一引数はビューの指定

                'App\Http\Composers\MyComposer' //namespaceで使いたいコンポーザを指定する

                // ^ namespaceで指定したコンポーザに処理を移動した
                function($view) { // 第二引数: 処理を実行するクロージャ, クラス
                // Viewクラスのインスタンス$viewのメソッドwithで値を追加
                $view->with('view_message', 'Hello from ServiceProvider!');
                }
            );
        }
    }
    </pre>

    <pre>

        namespace App\Http\Composers;

        use Illuminate\View\View;

        class MyComposer {
            // composeメソッドの引数$viewは、サービスプロバイダのboot()でView::composerが実行された際に呼び出される
            public function compose(View $view) {
                // $view->getName()でビューの名前をGET -> PRACTICED.CHILD が帰ってくるはず
                $view->with('view_message', 'This is '. $view->getName() . '!!');
            }
        }
    </pre>

    <h2>Middleware!</h2>
    <p><middleware>google.com</middleware></p>

    <pre></pre>

@endsection


@section('footer')
    Copyright 2017 Sato
@endsection

