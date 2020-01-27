@php
  $type = get_sub_field('dynamic__post_type');
  $num = get_sub_field('dynamic__number');
  $orderby = get_sub_field('dynamic__order');
  $cardColor = get_sub_field('colour_picker');
  $postCategories = ( $type == 'post' && get_sub_field('dynamic__post_options')['posts__category_picker'] ) ? get_sub_field('dynamic__post_options')['posts__category_picker'] : null;

  switch( get_sub_field('dynamic__columns' ) ) {
    case 'three':
      $colClass = 'col-md-4';
      break;
    case 'two':
      $colClass = 'col-md-6';
      break;
    case 'one':
      $colClass = 'col-md-10 col-lg-8 mx-md-auto';
      break;
    default:
      $colClass = 'col-md-6';
      break;
  }

  $template = 'partials/components/card-' . $type;
  
  $cardArgs = array(
    'show_full_testimonial' => ($type == 'testimonial' && get_sub_field('dynamic__testimonial_options')['testimonial__show_full_message'] )
  );

  $args = array(
    'post_type' => $type,
    'orderby' => $orderby,
    'posts_per_page' => $num,
  );

  if( $postCategories ):
    $args['category__in'] = $postCategories;
  endif;

  $dynamic_query = new WP_Query( $args );
@endphp

<section
  class="block-dynamic"
> 
  @if( $dynamic_query->have_posts() )
    <div class="container">
      <div class="row justify-content-center mb-5 {{ $type }}">
        @while ( $dynamic_query->have_posts() )
          @php $dynamic_query->the_post(); @endphp
          @php $card = App\return_card($type, $cardArgs); @endphp
          @include($template, ['card' => $card, 'color' => $cardColor, 'cols' => $colClass])
        @endwhile
      </div>
    </div>
@endif

@php wp_reset_postdata(); @endphp
</section>