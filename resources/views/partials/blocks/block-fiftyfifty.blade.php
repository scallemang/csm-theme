@php
  $leftCol = App\return_fiftyfifty_col( get_sub_field( 'fiftyfifty__left' ) );
  $rightCol = App\return_fiftyfifty_col( get_sub_field( 'fiftyfifty__right' ) );
  $width = 'fluid' == get_sub_field( 'width__picker' ) ? 'container-fluid' : 'container';

@endphp

{{-- @if( get_sub_field( 'eden_block_image' ) )
  @php $image = get_sub_field( 'eden_block_image' ); @endphp
@endif --}}

<section @if($sectionId)id="{{ $sectionId }}"@endif class="block-fiftyfifty"> 
  <div class="{{ $width }}">
    <div class="row row-fiftyfifty">
      @include('partials.components.column', ['column' => $leftCol])
      @include('partials.components.column', ['column' => $rightCol])
    </div>
  </div>
  <div class="bg-overlay"></div>
</section>