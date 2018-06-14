@extends('layouts.default')
{{--

@section('title')
Blog Posts
@endsection
--}}

@section('title', 'Lists')


@section('content')
<h1>
  <a href="{{ url('/posts/create')}}" class="header-menu">New Post</a>
  <br>
  <a href="{{ url('/users') }}" class="header-menu">ユーザ一覧</a>
  Lists
</h1>
<ul>
  @forelse ($posts as $post)
  <li>
    <a href="{{ action('PostsController@show', $post) }}">{{ $post->title }}</a>
    <a href="{{ action('PostsController@edit', $post) }}" class="edit">[Edit]</a>
    <a href="#" class="del" data-id="{{ $post->id }}">[x]</a>
    <small>作成日時:{{ date("Y年 m月 d日", strtotime($post->created_at)) }}</small>

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
