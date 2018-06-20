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
  Lists
</h1>
<ul>
  @if(session()->has('message'))
        <div class="alert alert-info mb-3">
            {{session('message')}}
        </div>
  @endif
  @forelse ($posts as $post)
  <li class="h5">
    <body>
    <a href="{{ action('PostsController@show', $post) }}" >{{ $post->title }}</a>
    @can('edit', $post)
    <a href="{{ action('PostsController@edit', $post) }}" class="btn-sm btn-primary">[Edit]</a>
    <a href="#" class="btn-sm btn-danger" data-id="{{ $post->id }}" >[x]</a>
    @endcan
    <small>作成日時:{{ date("Y年 m月 d日", strtotime($post->created_at)) }}</small>
    </body>
    <form method="post" action="{{ url('/posts', $post->id) }}" id="form_{{ $post->id }}">
      {{ csrf_field() }}
      {{ method_field('delete') }}
    </form>
  </li>
  @empty
  <li>No posts yet</li>
  @endforelse
</ul>

<h3>
  <a href="{{ url('/contact') }}" class="footer-menu">お問い合わせ</a>
</h3>

</div>
<script src="/js/main.js"></script>
@endsection
