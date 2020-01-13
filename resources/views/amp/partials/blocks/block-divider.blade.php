@php
  $color = get_sub_field('colour_picker');
  $size = get_sub_field('divider__height');
@endphp

{{-- @if( get_sub_field( 'eden_block_image' ) )
  @php $image = get_sub_field( 'eden_block_image' ); @endphp
@endif --}}

<section class="block-divider @if( 'default' != $color ){{ $color }}@endif">
  @if($size)
    <hr style="border-top-width:{{ $size }}px">
  @else
    <hr>
  @endif
</section>