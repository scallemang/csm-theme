@if( has_post_thumbnail() && !is_archive() && !is_home() )
@php
  $style = get_field('page__hero_style');
@endphp
  @if( $style == 'full')
    @php
      $x = get_field('background__image--x');
      $y = get_field('background__image--y');
    @endphp
    <div class="page-header-wrap py-5 full @if($x)background__x--{{ $x }}@endif @if($y)background__y--{{ $y }}@endif" data-responsive-background-image>
      {!! App\return_featured_image( $post->ID ) !!}
      <h1 class="page-title py-5 mb-0">@if(get_field('page__alternate_title')){!! get_field('page__alternate_title') !!}@else{!! App::title() !!}@endif</h1>
    </div>
  @else
    <div class="page-header-wrap fiftyfifty">
      <div data-responsive-background-image>
        {!! App\return_featured_image( $post->ID ) !!}
      </div>
      <div class="page-header text-center">
          <h1 class="page-title">@if(get_field('page__alternate_title')){!! get_field('page__alternate_title') !!}@else{!! App::title() !!}@endif</h1>
      </div>
    </div>
  @endif
  @if(function_exists('bcn_display'))
  <div class="breadcrumbs breadcrumbs-navxt mt-4 mb-4 container" typeof="BreadcrumbList" vocab="http://schema.org/">
    {{ bcn_display() }}
  </div>
  @endif
@elseif(is_home())
  @if(function_exists('bcn_display'))
  <div class="breadcrumbs breadcrumbs-navxt mt-4 mb-5 container" typeof="BreadcrumbList" vocab="http://schema.org/">
    {{ bcn_display() }}
  </div>
  @endif
  <div class="page-header container text-center my-4">
        <h1 class="page-title">@if(get_field('page__alternate_title', get_option( 'page_for_posts' ) )){!! get_field('page__alternate_title', get_option( 'page_for_posts' )) !!}@else{!! App::title() !!}@endif</h1>
  </div>
@else
  @if(function_exists('bcn_display'))
  <div class="breadcrumbs breadcrumbs-navxt mt-4 mb-5 container" typeof="BreadcrumbList" vocab="http://schema.org/">
    {{ bcn_display() }}
  </div>
  @endif
  <div class="page-header container text-center my-4">
    <h1 class="page-title">@if(get_field('page__alternate_title')){!! get_field('page__alternate_title') !!}@else{!! App::title() !!}@endif</h1>
  </div>
@endif