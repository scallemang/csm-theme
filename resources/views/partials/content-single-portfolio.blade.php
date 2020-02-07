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
    <h1 class="entry-title @if( get_field('team__title') )mb-2 @endif">{!! get_the_title() !!}</h1>

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