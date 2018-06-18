@extends('layouts.default')

@section('title', 'New Post')

@section('content')
<h1>
  <a href="{{ url('/')}}" class="header-menu">Back</a>
  Contact
</h1>
<form method="post" action="{{ url('/contact/confirm')}}">
  {{ csrf_field() }}
  <p>
    <input type="text" name="email" value="{{Auth::user()->email}}" readonly>
    @if ($errors->has('title'))
    <span class="error">{{ $errors->first('title')}}</span>
    @endif
  </p>



    <input name="gender" type="radio" value="男性">男性
    <input name="gender" type="radio" value="女性">女性
    <select name="type">
      <option value="未選択">未選択</option>
      <option value="contact">contact</option>
      <option value="otoiawase">otoiawase</option>
      <option value="sonota">sonota</option>
    </select>


    <p>
      <textarea name="body" placeholder="enter body" >{{old('body')}}</textarea>
      @if ($errors->has('body'))
      <span class="error">{{ $errors->first('body')}}</span>
      @endif
    </p>
    <p>
      <input type="submit" value="確認">
    </p>
    </form>


@endsection
