@php
  $heading = get_sub_field('copy__heading');
  $body = get_sub_field('copy__body');
  $hasButton = get_sub_field('copy__has_button');
  $background = App\return_background_from_type( get_sub_field('background_picker'), array('block'=>true) );
  $width = 'fluid' == get_sub_field( 'width__picker' ) ? 'container-fluid' : null;
  $align = App\return_alignment( array('block'=>true) );
@endphp

{{-- @if( get_sub_field( 'eden_block_image' ) )
  @php $image = get_sub_field( 'eden_block_image' ); @endphp
@endif --}}

@if( !$width )<div class="container">@endif
<section 
  class="block-copy @if( !$width )copy--rounded @else copy--full @endif @if( 'bg-none' == $background['class'] )my-5 @else py-5 @endif @if( $align )text-{{ $align }} @endif{{ $background['class'] }} @if( $background['overlay'] )overlay-{{ $background['overlay']['color'] }}@endif" 
  @if( $background['type'] == 'image' ) style="background-image: url('{{ $background['value']['url'] }}'); background-size: cover; background-position: {{ $background['position'] }};" @endif
  @if( $background['type'] == 'color--custom' )style="background-color:{{ $background['value'] }}"@endif
> 
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        @if( $heading )<h2 @if( 'bg-none' == $background['class'] )class="mt-5"@endif>{!! $heading !!}</h2>@endif
        @if( $body )<div @if( $hasButton )class="mb-5"@endif>{!! $body !!}</div>@endif
        @if( $hasButton )
          @php 
            $buttonGroup = get_sub_field( 'copy__button' ); 
            $button = App\return_button($buttonGroup);
          @endphp
          <div class="mb-5">
            @include('partials.components.button', ['button' => $button])
          </div>
        @endif
      </div>
    </div>
  </div>
  <div class="bg-overlay"></div>
</section>
@if( !$width )</div>@endif