@extends('layouts.layout')
<style>
    .pagination { font-size:10pt; }
    .pagination li { display:inline-block }
    tr th a:link { color: white; }
    tr th a:visited { color: white; }
    tr th a:hover { color: white; }
    tr th a:active { color: white; }
@section('title', 'Paginate')


@section('content')
    <table>
        <tr>
            <th><a href="/hello?sort=name">name</a></th>
            <th><a href="/hello?sort=sex">sex</a></th>
            <th><a href="/hello?sort=age">age</a></th>
        </tr>
        @foreach ($people as $person)
            <tr>
                <td>{{$person->name}}</td>
                <td>{{$person->sex}}</td>
                <td>{{$person->age}}</td>
            </tr>
        @endforeach
    </table>
    {{ $people->appends(['sort' => $sort])->links() }}

    <!-- ページ移動のリンクを自動で生成する -->

    <!--　以下のようなリンクが生成される
    <ul class="pagination">
        <li class="disabled"><span>&Laquo; Previous</span></li>
        <li><a  <table>
   href="" rel="next">Next &raquo;</a></li>
    </ul>
    -->

@endsection
