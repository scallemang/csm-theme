@php
  $heading = get_sub_field( 'services__heading' );
  // $subheading = get_sub_field( 'services__subheading' );
  $hasButton = get_sub_field( 'services__has_button' );
  $background = App\return_background_from_type( get_sub_field('background_picker'), array('block'=>true) );
  $style = get_sub_field('services__style');
  $columns = get_sub_field('services__columns');
@endphp

{{-- @if( get_sub_field( 'eden_block_image' ) )
  @php $image = get_sub_field( 'eden_block_image' ); @endphp
@endif --}}

<section
  class="block-services @if( 'bg-none' == $background['class'] )my-5 @else py-5 @endif  {{ $style }} {{ $background['class'] }} @if( $background['overlay'] )overlay-{{ $background['overlay']['color'] }}@endif" 
  @if( $background['type'] == 'image' ) style="background-image: url('{{ $background['value']['url'] }}'); background-size: cover; background-position: {{ $background['position'] }};" @endif
  @if( $background['type'] == 'color--custom' )style="background-color:{{ $background['value'] }}"@endif
> 
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        {{-- @if( $heading || $subheading) --}}
          @if( $heading )<h2>{!! $heading !!}</h2>@endif
          {{-- @if( $subheading ){!! $subheading !!}@endif --}}
        {{-- @endif --}}

        {{--  Repeater --}}
        @if( have_rows('services__repeater') )
          <div class="row-services @if( $columns )grid--{{ $columns }}@endif mb-5">
          @while( have_rows('services__repeater') ) @php the_row(); @endphp
            @php

              $service = array(
                'title'   => get_sub_field( 'service__heading' ),
                'link'    => get_sub_field( 'service__link' ),
                'colour'  => App\return_color(),
                'body'    => get_sub_field( 'service__summary' ),
                'icon'    => App\return_icon(),
                'class'   => 'color-' . get_sub_field( 'colour_picker' )
              );
            @endphp
            @include('partials.components.card', ['card' => $service])
          @endwhile
          </div>
        @endif

        @if( $hasButton )
          @php 
            $buttonGroup = get_sub_field( 'services__button' ); 
            $button = App\return_button($buttonGroup);
          @endphp
          <div class="my-5">
            @include('partials.components.button', ['button' => $button])
          </div>
        @endif
      </div>
    </div>
  </div>
  <div class="bg-overlay"></div>
</section>