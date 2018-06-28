
@extends('layouts.default')
{{--

@section('title')
Blog Posts
@endsection
--}}

@section('title', 'Lists')


@section('content')
<div class="container-fluid">
  <div class="row">
        <div class="col-md-6 col-md-offset-3">
<h1>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <a href="{{ url('/posts/create')}}" class="header-menu">New Post</a>
  <br>
  <a href="{{ url('/users') }}" class="header-menu">ユーザ一覧</a>
  Admin Home
</h1>
<ul>
  @if(session()->has('message'))
        <div class="alert alert-info mb-3">
            {{session('message')}}
        </div>
  @endif

</ul>

<h3>
  <a href="{{ url('/admin/contact') }}">お問い合わせ一覧</a>
</h3>

</div>
<script src="/js/main.js"></script>
@endsection
