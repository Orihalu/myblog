@extends('layouts.default')
@section('content')
<form method="post" action="{{ url('/contact/complete')}}">
  {{ csrf_field() }}

<h1>
  <a href="{{ url('/contact')}}" class="header-menu">Back</a>
  確認
</h1>
<h4>
<div class="container">入力内容</div>
■ email
<p>{{ $email }}</p>
■ 性別
<p>{{ $gender }}</p>
■ 種類
<p>{{ $type }}</p>
■ 内容
<p>
  {!! nl2br(e($body)) !!}
</p>
<div class="container">


  <p>
    <input type="submit" value="送信">
  </p>
</div>
</h4>
</form>
@endsection

<!-- // var_dump($request->session()->get('email'));
// var_dump($request->session()->get('gender'));
// var_dump($request->session()->get('type'));
// var_dump($request->session()->get('body')); -->
