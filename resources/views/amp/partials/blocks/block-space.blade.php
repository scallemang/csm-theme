@php
  $size = get_sub_field('space__height');
@endphp

{{-- @if( get_sub_field( 'eden_block_image' ) )
  @php $image = get_sub_field( 'eden_block_image' ); @endphp
@endif --}}

@if($size)
<section class="block-space" style="height:{{ $size }}px">
</section>
@endif