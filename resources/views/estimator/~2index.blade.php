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
<center>
<table border = '2'>
<tr><th>曲名</th><th>NO PLAY</th><th>EASY</th><th>NORMAL</th><th>HARD</th><th>EX-HARD</th><th>FULLCOMBO</th></tr>
<form action='/' method='post'>
{{csrf_field()}}
<!--<button class='fixed_btn' type='submit' >Estimate</button>
-->
<input type='submit' value='Estimate'>
@foreach($musics as $item)
    <tr>
        <td>{{$item->name}}</td>

        <td bgcolor='#a9a9a9'>
        <label><input type="radio" name="{{$item->m_id}}" value=0 @php if(isset($clears))if($clears->first('m_id',$item->m_id)->info==0)echo('checked');@endphp ></input></label>
        </td>

        <td bgcolor='#98fb98'>
        <label><input type="radio" name="{{$item->m_id}}" value=1 @php if(isset($clears))if($clears->first('m_id',$item->m_id)->info==1)echo('checked');@endphp ></input></label>
        {{$item->e}}
        </td>

        <td bgcolor='#87cefa'>
        <label><input type="radio" name="{{$item->m_id}}" value=2 @php if(isset($clears))if($clears->first('m_id',$item->m_id)->info==2)echo('checked');@endphp ></input></label>
        {{$item->n}}
        </td>

        <td bgcolor='#ff6347'>
        <label><input type="radio" name="{{$item->m_id}}" value=3 @php if(isset($clears))if($clears->first('m_id',$item->m_id)->info==3)echo('checked');@endphp ></input></label>
        {{$item->h}}
        </td>

        <td bgcolor='#ffff00'>
        <label><input type="radio" name="{{$item->m_id}}" value=4 @php if(isset($clears))if($clears->first('m_id',$item->m_id)->info==4)echo('checked');@endphp ></input></label>
        {{$item->exh}}
        </td>

        <td class='blink'>
        <label><input type="radio" name="{{$item->m_id}}" value=5 @php if(isset($clears))if($clears->first('m_id',$item->m_id)->info==5)echo('checked');@endphp ></input></label>
        {{$item->fc}}
        </td>

    </tr>
@endforeach
</table>
</center>
</form>
@endsection

@section('footer')
copyright 2019 Okada Hibiki
@endsection
