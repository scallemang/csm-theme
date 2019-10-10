@php
  $heading = get_sub_field( 'services__heading' );
  $subheading = get_sub_field( 'services__subheading' );
  $hasButton = get_sub_field( 'services__has_button' );
  $background = App\return_background_from_type( get_sub_field('background_picker'), array('block'=>true) );
  $style = get_sub_field('services__style');
@endphp

{{-- @if( get_sub_field( 'eden_block_image' ) )
  @php $image = get_sub_field( 'eden_block_image' ); @endphp
@endif --}}

<section 
  @if($sectionId)id="{{ $sectionId }}"@endif 
  class="block-services @if( 'bg-none' == $background['class'] )my-5 @else py-5 @endif  {{ $style }} {{ $background['class'] }} @if( $background['overlay'] )overlay-{{ $background['overlay']['color'] }}@endif" 
  @if( $background['type'] == 'image' ) style="background-image: url('{{ $background['value']['url'] }}'); background-size: cover; background-position: {{ $background['position'] }};" @endif
> 
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        @if( $heading || $subheading)
        <div class="row">
          <div class="col-lg-10 mx-auto text-center">
            @if( $heading )<h2>{!! $heading !!}</h2>@endif
            @if( $subheading ){!! $subheading !!}@endif
          </div>
        </div>
        @endif

        {{--  Repeater --}}
        @if( have_rows('services__repeater') )
          <div class="row-services my-4">
          @while( have_rows('services__repeater') ) @php the_row(); @endphp
            @php

              $service = array(
                'title'   => get_sub_field( 'service__heading' ),
                'link'    => get_sub_field( 'service__link' ),
                'colour'  => get_sub_field( 'service__colour' ),
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
          @include('partials.components.button', ['button' => $button])
        @endif
      </div>
    </div>
  </div>
  <div class="bg-overlay"></div>
</section>