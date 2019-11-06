@php
  $leftCol = App\return_fiftyfifty_col( get_sub_field( 'fiftyfifty__left' ) );
  $rightCol = App\return_fiftyfifty_col( get_sub_field( 'fiftyfifty__right' ) );
  $width = 'fluid' == get_sub_field( 'width__picker' ) ? 'container-fluid' : 'container';
  $background = App\return_background_from_type( get_sub_field('background_picker'), array('block'=>true) );
@endphp

{{-- @if( get_sub_field( 'eden_block_image' ) )
  @php $image = get_sub_field( 'eden_block_image' ); @endphp
@endif --}}

<section 
  @if($sectionId)id="{{ $sectionId }}"@endif 
  class="block-fiftyfifty {{ $style }} @if( $background['overlay'] )overlay-{{ $background['overlay']['color'] }}@endif" 
  @if( $background['type'] == 'image' ) style="background-image: url('{{ $background['value']['url'] }}'); background-size: cover; background-position: {{ $background['position'] }};" @endif
  @if( $background['type'] == 'color--custom' )style="background-color:{{ $background['value'] }}"@endif
> 
  <div class="{{ $width }}">
    <div class="row-fiftyfifty {{ $background['class'] }} @if( $width == "container" )fiftyfifty--rounded @else fiftyfifty--full @endif">
      @include('partials.components.column', ['column' => $leftCol])
      @include('partials.components.column', ['column' => $rightCol])
    </div>
  </div>
  <div class="bg-overlay"></div>
</section>