@extends('front/layout.layout')

@section('page_title','home page')
@section('page_name','My Blogs')
@section('container')
@foreach($data as $hoja)
        <div class="post-preview">
          <a href="{{url('/post/'.$hoja->id)}}">
            <h2 class="post-title">
              {{$hoja->title}}
            </h2>
            <h3 class="post-subtitle">
              {{$hoja->short_desc}}
            </h3>
          </a>
          <p class="post-meta">Posted Date
            
            {{$hoja->post_date}}</p>
        </div>
        <hr>
       @endforeach

@endsection