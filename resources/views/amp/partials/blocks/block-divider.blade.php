@php
  $color = get_sub_field('colour_picker');
@endphp

{{-- @if( get_sub_field( 'eden_block_image' ) )
  @php $image = get_sub_field( 'eden_block_image' ); @endphp
@endif --}}

<section class="block-divider container @if( 'default' != $color ){{ $color }}@endif">
    <hr>
</section>