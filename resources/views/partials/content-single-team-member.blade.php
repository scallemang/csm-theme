<article @php post_class() @endphp>
  <header>
    <div class="breadcrumbs breadcrumbs-navxt mt-4 mb-5" typeof="BreadcrumbList" vocab="http://schema.org/">
      @if(function_exists('bcn_display'))
        {{ bcn_display() }}
      @endif
    </div>
    @if( get_field('team__photo') )
      <img src="{!! get_field('team__photo')['sizes']['thumbnail'] !!}" class="rounded-circle mb-4">
    @endif
    <h1 class="entry-title @if( get_field('team__title') )mb-2 @endif">{!! get_the_title() !!}</h1>
    @if( get_field('team__title') )
      <h2>{{ get_field('team__title' ) }}</h2>
    @endif

    @if( get_field('team__links')['team__email'] )<a href="mailto:{{ get_field('team__links')['team__email'] }}"><i class="fas fa-envelope"></i></a>@endif
    @if( get_field('team__links')['team__twitter'] )<a href="{{ get_field('team__links')['team__twitter'] }}"><i class="fab fa-twitter"></i></a>@endif
    @if( get_field('team__links')['team__facebook'] )<a href="{{ get_field('team__links')['team__facebook'] }}"><i class="fab fa-facebook"></i></a>@endif
    @if( get_field('team__links')['team__instagram'] )<a href="{{ get_field('team__links')['team__instagram'] }}"><i class="fab fa-instagram"></i></a>@endif
    @if( get_field('team__links')['team__website'] )<a href="{{ get_field('team__links')['team__website'] }}"><i class="fas fa-link"></i></a>@endif

    @if( get_field('team__full_bio') )
      <div class="my-5">{!! get_field('team__full_bio') !!}</div>
    @endif

    @if( get_field('team__button') )
      @include('partials/components/button', ['button' => App\return_button( get_field( 'team__button' ) )])
            
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
