@php
  $heading = get_sub_field( 'hero__heading' );
  $headingP = get_sub_field( 'hero__heading_p' );
  $subheading = get_sub_field( 'hero__subheading' );
  //$sectionId = get_sub_field( 'eden_section_id' );
  $hasButton = get_sub_field( 'hero__has_button' );
  $background = App\return_background_from_type( get_sub_field('background_picker'), array('block'=>true) );
  $lightdark = get_sub_field('lightdark__picker');
@endphp

{{-- @if( get_sub_field( 'eden_block_image' ) )
  @php $image = get_sub_field( 'eden_block_image' ); @endphp
@endif --}}
<section 
  @if($sectionId)id="{{ $sectionId }}"@endif 
  class="block-hero jumbotron {{ $background['class'] }} @if( $background['overlay'] )overlay-{{ $background['overlay']['color'] }}@endif @if( $lightdark ){{ $lightdark }}@endif" 
  @if( $background['type'] == 'image' ) style="background-image: url('{{ $background['value']['sizes']['large'] }}'); background-size: cover; background-position: {{ $background['position'] }};" @endif
  @if( $background['type'] == 'color--custom' )style="background-color:{{ $background['value'] }}"@endif
> 
  <div class="container {{-- container-fluid-md-down --}}">
    <div class="row row-hero">
      <div class="col-sm-12 col-lg-6 ml-lg-auto text-lg-right">
        @if( $subheading )
          <p class="hero__subheading">{!! $subheading !!}</p>
        @endif

        @if( $heading || $headingP ) @if( $heading )<div class="hero__heading">{!! $heading !!}</div>@endif @if( $headingP )<p class="hero__heading_p">{!! $headingP !!}</p>@endif @endif
      
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