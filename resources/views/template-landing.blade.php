{{--
  Template Name: Landing Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @if( !is_front_page() && !has_post_thumbnail() )
      @include('partials.page-header')
    @endif
    @include('partials.content-page')
  @endwhile

  {{-- @include('partials.footer-cta') --}}
@endsection