@extends('layouts.default')

@section('content')
<div class="container">

<h1>
<a href="{{ url('/users')}}" class="header-menu">Back</a>
{{ $user->name }}
</h1>

@forelse ($user->comments as $comment)
<li>
<small>
      {{ $comment->body }}:{{ date("Y年 m月 d日", strtotime($comment->created_at)) }}
</small>

</li>
@empty
<li>No comments yet</li>
@endforelse
</div>
@endsection
