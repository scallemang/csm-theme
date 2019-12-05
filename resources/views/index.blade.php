@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  <div class="container">
    @if (!have_posts())
      <div class="alert alert-warning">
        {{ __('Sorry, no results were found.', 'sage') }}
      </div>
      {!! get_search_form(false) !!}
    @endif
    <div class="row row--blog">
      @while(have_posts()) @php the_post() @endphp
        <div class="col-md-6 mb-4">
          <a href="{{ get_the_permalink() }}">{{ the_post_thumbnail() }}</a>
          <h4 class="text-center post-title"><a href="{{ get_the_permalink() }}">{!! get_the_title() !!}</a></h4>
        </div>
      @endwhile
    </div>
  </div>

  {{-- {!! get_the_posts_navigation() !!} --}}
  @if( function_exists( 'wp_pagenavi' ) ){!! wp_pagenavi( ) !!}@endif
@endsection