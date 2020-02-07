@php
  $color = get_sub_field('colour_picker');
  $custom = ('custom' == $color && get_sub_field('colour_picker__custom')) ? get_sub_field('colour_picker__custom') : null;
  $size = get_sub_field('divider__height');
@endphp

{{-- @if( get_sub_field( 'eden_block_image' ) )
  @php $image = get_sub_field( 'eden_block_image' ); @endphp
@endif --}}

<section class="block-divider @if( 'default' != $color ){{ $color }}@endif">
  @if($size)
    <hr style="border-top-width:{{ $size }}px; @if( $custom )border-top-color:{{ $custom }};@endif">
  @else
    <hr>
  @endif
</section>