@php
  $heading = get_sub_field('copy__heading');
  $body = get_sub_field('copy__body');
  $hasButton = get_sub_field('copy__has_button');
  $background = App\return_background_from_type( get_sub_field('background_picker'), array('block'=>true) );
  $align = App\return_alignment( array('block'=>true) );
@endphp

{{-- @if( get_sub_field( 'eden_block_image' ) )
  @php $image = get_sub_field( 'eden_block_image' ); @endphp
@endif --}}

<section 
  @if($sectionId)id="{{ $sectionId }}"@endif 
  class="block-copy @if( 'bg-none' == $background['class'] )my-4 @else py-4 @endif @if( $align )text-{{ $align }} @endif{{ $background['class'] }} @if( $background['overlay'] )overlay-{{ $background['overlay']['color'] }}@endif" 
  @if( $background['type'] == 'image' ) style="background-image: url('{{ $background['value']['url'] }}'); background-size: cover; background-position: {{ $background['position'] }};" @endif
> 
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        @if( $heading )<h2>{!! $heading !!}</h2>@endif
        @if( $body )<div @if( $hasButton )class="mb-5"@endif>{!! $body !!}</div>@endif
        @if( $hasButton )
          @php 
            $buttonGroup = get_sub_field( 'copy__button' ); 
            $button = App\return_button($buttonGroup);
          @endphp
          @include('partials.components.button', ['button' => $button])
        @endif
      </div>
    </div>
  </div>
  <div class="bg-overlay"></div>
</section>