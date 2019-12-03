@extends('layouts.estimator')
@section('title','地力Estimator')
@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
<table border = '2'>
<tr><th>曲名<th>EASY<th>NORMAL<th>HARD<th>EX-HARD<th>FULLCOMBO
@foreach($musics as $item)
    <tr>
        <td>{{$item->name}}
        <td>{{$item->e}}
        <td>{{$item->n}}
        <td>{{$item->h}}
        <td>{{$item->exh}}
        <td>{{$item->fc}}
@endforeach
@endsection

@section('footer')
copyright 2019 Okada Hibiki
@endsection
