@php
  $type = get_sub_field('dynamic__post_type');
  $num = get_sub_field('dynamic__number');
  $orderby = get_sub_field('dynamic__order');

  $template = 'partials/components/card-' . $type;

  $args = array(
    'post_type' => $type,
    'orderby' => $orderby,
    'posts_per_page' => $num,
  );

  $dynamic_query = new WP_Query( $args );
@endphp

<section
  class="block-dynamic"
> 
  @if( $dynamic_query->have_posts() )
    <div class="container">
      <div class="card-wrap {{ $type }}">
        @while ( $dynamic_query->have_posts() )
          @php $dynamic_query->the_post(); @endphp
          @php $card = App\return_card($type); @endphp
          @include($template, ['card' => $card])
      @endwhile
      </div>
    </div>
@endif

@php wp_reset_postdata(); @endphp
</section>