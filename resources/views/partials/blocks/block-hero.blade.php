@php
  $heading = get_sub_field( 'hero__heading' );
  $headingP = get_sub_field( 'hero__heading_p' );
  $subheading = get_sub_field( 'hero__subheading' );
  $hasButton = get_sub_field( 'hero__has_button' );
  $background = App\return_background_from_type( get_sub_field('background_picker'), array('block'=>true) );
  $lightdark = get_sub_field('lightdark__picker');

  if( 'dark' == $lightdark) {
    $headingColour = get_sub_field( 'hero__colour--heading' );
    $subheadingColour = get_sub_field( 'hero__colour--subheading' );
  } else {
    $headingColour = null;
    $subheadingColour = null;
  }
@endphp

{{-- @if( get_sub_field( 'eden_block_image' ) )
  @php $image = get_sub_field( 'eden_block_image' ); @endphp
@endif --}}
<section
  class="block-hero jumbotron {{ $background['class'] }} @if( $background['overlay'] )overlay-{{ $background['overlay']['color'] }}@endif @if( $lightdark ){{ $lightdark }}@endif" 
  @if( $background['type'] == 'image' ) style="background-image: url('{{ $background['value']['sizes']['large'] }}'); background-size: cover; background-position: {{ $background['position'] }};" @endif
  @if( $background['type'] == 'color--custom' )style="background-color:{{ $background['value'] }}"@endif
> 
  <div class="container {{-- container-fluid-md-down --}}">
    <div class="row row-hero">
      <div class="col-sm-12 col-lg-6 ml-lg-auto text-lg-right">
        @if( $subheading )
          <div class="hero__subheading" @if( $subheadingColour )style="color:{{ $subheadingColour }} !important;" @endif>{!! $subheading !!}</div>
        @endif

        @if( $heading || $headingP ) @if( $heading )<div class="hero__heading" @if( $headingColour )style="color: {{ $headingColour }} !important;" @endif>{!! $heading !!}</div>@endif @if( $headingP )<p class="hero__heading_p" @if( $headingColour )style="color: {{ $headingColour }}" @endif>{!! $headingP !!}</p>@endif @endif
      
        @if( $hasButton )
          @php 
            $buttonGroup = get_sub_field( 'hero__button' ); 
            $button = App\return_button($buttonGroup);
          @endphp
          @include('partials.components.button', ['button' => $button])
        @endif
      </div>
    </div>
  </div>
</section>