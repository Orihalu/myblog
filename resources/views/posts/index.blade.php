@extends('layouts.default')
{{--

@section('title')
Blog Posts
@endsection
--}}

@section('title', 'Lists')


@section('content')
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
  <li>
    <body>
    <a href="{{ action('PostsController@show', $post) }}">{{ $post->title }}</a>
    <a href="{{ action('PostsController@edit', $post) }}" class="edit">[Edit]</a>
    <a href="#" class="del" data-id="{{ $post->id }}">[x]</a>
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
<script src="/js/main.js"></script>
@endsection
