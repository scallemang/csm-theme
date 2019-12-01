{{-- {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!} --}}
@php
  $args = isset( $args ) ? $args : array(
    'post_type' => 'post',
    'paged' => get_query_var('paged'),
  );
@endphp

<section class="content-blog">
  @if( basename(get_page_template()) == "template-blog.blade.php" )
  <div class="container py-3 text-center">
    @php the_content() @endphp
  </div>
  @endif

  @php
    // The Query
    $the_query = new WP_Query( $args );
    // The Loop
  @endphp
  <div class="container">
  @if ( $the_query->have_posts() )
    <div class="row row--blog">
    @while ( $the_query->have_posts() )
        {!! $the_query->the_post() !!}
        <div class="col-md-6 mb-4">
          <a href="{{ get_the_permalink() }}">{{ the_post_thumbnail() }}</a>
          <h4 class="text-center post-title"><a href="{{ get_the_permalink() }}">{!! get_the_title() !!}</a></h4>
        </div>
    @endwhile
    </ul>
    @if( function_exists( wp_pagenavi) ){!! wp_pagenavi( array( 'query' => $the_query ) ) !!}@endif
  @else
    {{-- no posts found --}}
  @endif
  </div>
  @php
    /* Restore original Post Data */
    wp_reset_postdata();
  @endphp
</section>