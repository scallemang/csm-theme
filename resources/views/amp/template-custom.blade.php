{{--
  Template Name: Landing Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    {{-- @include('partials.page-header') --}}
    @include('partials.content-page')
  @endwhile

  {{-- @include('partials.footer-cta') --}}
@endsection