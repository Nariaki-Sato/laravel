@extends('layouts.helloapp')
@section ('title', 'Index')

@section('menubar')
    @parent <!-- 親セクションmenubarをはめ込む -->
    INDEX PAGE <!-- show = INDEX PAGE -->
@endsection

@section('content')
    <p>This is main content. </p>
    <p>You can write anything if you want!</p>

    <p>Controller value<br>'message' = {{$message}}</p>
    <p>ViewComposer value<br>'view_message' = {{$view_message}}</p>

@endsection

@section('footer')
    copyright 2017 Nariaki Sato in RI
@endsection

