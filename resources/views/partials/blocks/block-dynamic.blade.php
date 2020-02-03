@php
  $type = get_sub_field('dynamic__post_type');
  $num = get_sub_field('dynamic__number');
  $orderby = get_sub_field('dynamic__order');
  $cardColor = get_sub_field('colour_picker');
  $background = App\return_background_from_type( get_sub_field('background_picker'), array('block'=>true) );
  $postCategories = ( $type == 'post' && get_sub_field('dynamic__post_options')['posts__category_picker'] ) ? get_sub_field('dynamic__post_options')['posts__category_picker'] : null;
  $cardArgs = array();
  $align = App\return_alignment( array('block'=>true) );

  switch( get_sub_field('dynamic__columns' ) ) {
    case 'three':
      $colClass = 'col-md-4';
      $cardArgs['img_size'] = 'medium';
      break;
    case 'two':
      $colClass = 'col-md-6';
      $cardArgs['img_size'] = 'large';
      break;
    case 'one':
      $colClass = 'col-md-10 col-lg-8 mx-md-auto';
      $cardArgs['img_size'] = 'large';
      break;
    default:
      $colClass = 'col-md-6';
      $cardArgs['img_size'] = 'large';
      break;
  }

  $template = 'partials/components/card-' . $type;
  
  $cardArgs['show_full_testimonial'] = ($type == 'testimonial' && get_sub_field('dynamic__testimonial_options')['testimonial__show_full_message'] );

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
  class="block-dynamic @if( 'bg-none' == $background['class'] )my-5 @else py-5 @endif @if( $align )text-{{ $align }} @endif{{ $background['class'] }} @if( $background['overlay'] )overlay-{{ $background['overlay']['color'] }}@endif" 
  @if( $background['type'] == 'image' ) style="background-image: url('{{ $background['value']['url'] }}'); background-size: cover; background-position: {{ $background['position'] }};" @endif
  @if( $background['type'] == 'color--custom' )style="background-color:{{ $background['value'] }}"@endif
> 
  @if( $dynamic_query->have_posts() )
    <div class="container">
      <div class="row justify-content-center my-3 {{ $type }}">
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