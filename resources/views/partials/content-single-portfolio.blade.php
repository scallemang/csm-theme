@php
$portfolio['links'] = array(
  'twitter' => get_field('portfolio__links')['portfolio__twitter'],
  'facebook' => get_field('portfolio__links')['portfolio__facebook'],
  'instagram' => get_field('portfolio__links')['portfolio__instagram'],
  'youtube' => get_field('portfolio__links')['portfolio__youtube'],
  'pinterest' => get_field('portfolio__links')['portfolio__pinterest'],
  'houzz' => get_field('portfolio__links')['portfolio__houzz'],
  'website' => get_field('portfolio__links')['portfolio__website'],
);
@endphp

<article @php post_class() @endphp>
  <header>
    <div class="breadcrumbs breadcrumbs-navxt mt-4 mb-5" typeof="BreadcrumbList" vocab="http://schema.org/">
      @if(function_exists('bcn_display'))
        {{ bcn_display() }}
      @endif
    </div>
    @if( get_field('portfolio__photo') )
      <img src="{!! get_field('portfolio__photo')['url'] !!}" class="mb-4">
    @endif
    <h1 class="entry-title my-1">{!! get_the_title() !!}</h1>

    <div class="portfolio__links mt-2 mb-4">
      @if( $portfolio['links']['twitter'] )<a href="{{ $portfolio['links']['twitter'] }}"><i class="fab fa-twitter"></i></a>@endif
      @if( $portfolio['links']['facebook'] )<a href="{{ $portfolio['links']['facebook'] }}"><i class="fab fa-facebook"></i></a>@endif
      @if( $portfolio['links']['instagram'] )<a href="{{ $portfolio['links']['instagram'] }}"><i class="fab fa-instagram"></i></a>@endif
      @if( $portfolio['links']['youtube'] )<a href="{{ $portfolio['links']['youtube'] }}"><i class="fab fa-youtube"></i></a>@endif
      @if( $portfolio['links']['pinterest'] )<a href="{{ $portfolio['links']['pinterest'] }}"><i class="fab fa-pinterest"></i></a>@endif
      @if( $portfolio['links']['houzz'] )<a href="{{ $portfolio['links']['houzz'] }}"><i class="fab fa-houzz"></i></a>@endif
      @if( $portfolio['links']['website'] )<a href="{{ $portfolio['links']['website'] }}"><i class="fas fa-link"></i></a>@endif
    </div>

    @if( get_field('portfolio__description') )
      <div>{!! get_field('portfolio__description') !!}</div>
    @endif

  </header>
  <div class="entry-content">
    @php the_content() @endphp
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  {{-- @php comments_template('/partials/comments.blade.php') @endphp --}}
</article>
