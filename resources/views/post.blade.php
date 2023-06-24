@extends('welcome')
@section('content')
@foreach ($data as $post )
   <a href="{{ route('post.detail',$post->id ) }}"> <h2>{{ $post->title }}</h2></a>
    <p>{{ $post->des }}</p>
@endforeach
@endsection
