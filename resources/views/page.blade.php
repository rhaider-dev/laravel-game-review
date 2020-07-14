@extends('layouts.app')

@section('meta-tags')
<meta name="title" content="{{$page->title}}">
<meta name="description" content="{{$page->meta_description}}">
<meta name="keywords" content="{{$page->meta_keywords}}">
@stop

@section('title', $page->title)

@section('content')

<div class="container mt-5 mb-5 pt-5">

  <h1 class="h1 text-center mb-5">{{$page->title}}</h1>
  @if(!is_null($page->image))
    <figure class="figure">
      <img src="{{Voyager::image($page->image)}}" class="figure-img img-fluid z-depth-1"alt="">
    </figure>
  @endif  
  <!--Section: Content-->
  <section class="text-justify">
    {!!$page->body!!}
  </section>
  <!--Section: Content-->

</div>

@stop