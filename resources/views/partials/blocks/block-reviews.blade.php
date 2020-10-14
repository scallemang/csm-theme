@php
  $heading = get_sub_field('reviews__heading');
  $hasButton = get_sub_field('copy__has_button');
  $background = App\return_background_from_type( get_sub_field('background_picker'), array('block'=>true) );
  $width = 'fluid' == get_sub_field( 'width__picker' ) ? 'container-fluid' : null;
  $align = App\return_alignment( array('block'=>true) );
  $reviewsShortcode = get_sub_field('reviews__shortcode');
@endphp

@if( get_sub_field( 'eden_block_image' ) )
  @php $image = get_sub_field( 'eden_block_image' ); @endphp
@endif
<section 
  class="block-reviews @if( !$width )reviews--rounded @else reviews--full @endif @if( 'bg-none' == $background['class'] )my-5 @else py-5 @endif @if( $align )text-{{ $align }} @endif{{ $background['class'] }} @if( $background['overlay'] )overlay-{{ $background['overlay']['color'] }}@endif" 
  @if( $background['type'] == 'image' ) style="background-image: url('{{ $background['value']['url'] }}'); background-size: cover; background-position: {{ $background['position'] }};" @endif
  @if( $background['type'] == 'color--custom' )style="background-color:{{ $background['value'] }}"@endif
> 
  <div class="container pb-lg-5 {{-- container-fluid-md-down --}}">
    <div class="text-center">
      @if( $heading )<div class="container"><h2 class="mt-5">{{ $heading }}</h1></div>@endif
    
      @if( $reviewsShortcode )
        {!! do_shortcode($reviewsShortcode) !!}
      @endif
    </div>
  </div>
  <div class="bg-pattern"></div>
</section>