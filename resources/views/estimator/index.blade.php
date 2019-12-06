@extends('layouts.estimator')
@section('title','地力Estimator')
@section('loginfo')
    @php//@parent
    @endphp
@if(Auth::check())
<p>DJ NAME:{{$user->name}}</p>
<p id='logout'><a href='/logout'>ログアウト</a></p>
@else
    <p>ログインしていません(<a href='/login'>ログイン</a>|<a href='/register'>登録</a>)</p>
@endif
@endsection

@section('content')
<form action='/' method='post'>
<center>
<button type='submit' class='fixed_btn'>record</button>
<!--推定値-->
<h1 class='suiteichi'>
@if($jiriki==-100&&!Auth::check())
推定値を取得するためにはログインしてください
@elseif($jiriki==-100&&Auth::check())
推定値を取得するためには、チェックボックスにチェックを入れたあとに、右下のボタンを押下してください
@else
推定地力:{{$jiriki}}
@endif
</h1>
<table border = '2'>
<tr><th>曲名</th><th>NO PLAY</th><th>EASY</th><th>NORMAL</th><th>HARD</th><th>EX-HARD</th><th>FULLCOMBO</th></tr>
{{csrf_field()}}
<!--<input type='submit' value='Estimate'>-->
@foreach($musics as $item)

@if(!isset($clears))
@php
$check=-1
@endphp
@else
@php
$check=$clears->where('m_id',$item->m_id)->first()->info
@endphp
@endif

    <tr>
        <!--<td>{{$item->name}}</td>-->

        <td
        @if($check==1)
        bgcolor='#98fb98'
        @elseif($check==2)
        bgcolor='#87cefa'
        @elseif($check==3)
        bgcolor='#ff6347'
        @elseif($check==4)
        bgcolor='#ffff00'
        @elseif($check==5)
        class='blink'
        @endif
        >{{$item->name}}</td>

        <td bgcolor='#a9a9a9'>
        <label><input type="radio" name="{{$item->m_id}}" value=0
        checked
        >NULL</input></label>
        </td>

        <td bgcolor='#98fb98'>
        <label
        @if($item->e <= $jiriki)
        class=highlighted
        @endif
        ><input type="radio" name="{{$item->m_id}}" value=1
        @if($check==1)
        checked
        @endif
        >{{round($item->e,7)}}</input></label>
        </td>

        <td bgcolor='#87cefa'>
        <label
        @if($item->n <= $jiriki)
        class=highlighted
        @endif
        ><input type="radio" name="{{$item->m_id}}" value=2
        @if($check==2)
        checked
        @endif
        >{{round($item->n,7)}}</input></label>
        </td></label>

        <td bgcolor='#ff6347'>
        <label
        @if($item->h <= $jiriki)
        class=highlighted
        @endif
        ><input type="radio" name="{{$item->m_id}}" value=3
        @if($check==3)
        checked
        @endif
        >{{round($item->h,7)}}</input></label>
        </td>

        <td bgcolor='#ffff00'>
        <label
        @if($item->exh <= $jiriki)
        class=highlighted
        @endif
        ><input type="radio" name="{{$item->m_id}}" value=4
        @if($check==4)
        checked
        @endif
        >{{round($item->exh,7)}}</input></label>
        </td>

        <td class='blink'>
        <label
        @if($item->fc <= $jiriki)
        class=highlighted
        @endif
        ><input type="radio" name="{{$item->m_id}}" value=5
        @if($check==5)
        checked
        @endif
        >{{round($item->fc,7)}}</input></label>
        </td>

    </tr>
@endforeach
</table>
</center>
</form>
@endsection

@section('footer')
copyright 2019 Okada Hibiki 地力値は(https://sp12.iidx.app/recommends)を参考にさせていただきました。
@endsection
