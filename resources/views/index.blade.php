@extends('layouts.master')

@section('title')
@if($seo)
{{$seo->home_seo_title}}
@else
Royaltour
@endif
@endsection

@section('meta')
@if($seo)
{{$seo->home_seo_meta}}
@else
Royaltour
@endif
@endsection

@section('content')
@include('components.slide')
@include('components.search-box')
@include('components.suggest-country')
@include('components.tour-suggest')
@include('components.tour-discount')
@include('components.tour-country')
@include('components.tour-holiday')
@include('components.article')
@include('components.tour-moment')
@include('components.banner')
@endsection