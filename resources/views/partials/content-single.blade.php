<article @php post_class() @endphp>
  <header>
    <h1 class="entry-title">{!! get_the_title() !!}</h1>
    {{-- @include('partials/entry-meta') --}}
    <div class="row">
      <div class="col-md-10 col-lg-8">
        {{ the_post_thumbnail() }}
      </div>
    </div>
  </header>
  <div class="entry-content">
    @php the_content() @endphp
    {!! get_field( 'blog__signature', 'option' ) !!}
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  {{-- @php comments_template('/partials/comments.blade.php') @endphp --}}
</article>
