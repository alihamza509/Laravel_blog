@extends('front/layout.layout')

@section('page_title',$dat[0]->title)
@section('page_name',$dat[0]->short_desc)
@section('container')

          <p>{{$dat[0]->long_desc}}</p>

@endsection