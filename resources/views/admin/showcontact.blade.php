@extends('layouts.default')

@section('content')
<div class="container">

<h1>
<a href="{{ url('/admin/contact')}}" class="header-menu">Back</a>
{{ $contact->email }}さんのお問い合わせ
</h1>
<h6>
  <span class="badge badge-secondary">
  種類
 </span>
</h6>
<h6>
  {{ $contact->type }}
</h6>
<h6>
  <span class="badge badge-secondary">
   内容
 </span>
</h6>
<h6>
  {{ $contact->body }}
</h6>


@endsection
