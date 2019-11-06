{{-- {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!} --}}
@php
  $args = isset( $args ) ? $args : array(
    'post_type' => 'post',
  );
@endphp

<section class="content-contact">
  <div class="container py-3 text-center">
    @php the_content() @endphp
  </div>
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
  @else
    {{-- no posts found --}}
  @endif
  </div>
  @php
    /* Restore original Post Data */
    wp_reset_postdata();
  @endphp
</section>