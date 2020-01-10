@php
  $cta = App\return_cta();
  $backgroundClass = null;
  $heading = $cta['heading'];
  $subheading = $cta['subheading'];
  $hasButton = null != $cta['button'] ? true : false;
  $alignmentOverride = get_sub_field('cta__override_alignment');
  $alignment = $alignmentOverride ? get_sub_field('copy__alignment')['alignment__picker'] : $cta['alignment'];
  $width = 'fluid' == get_sub_field( 'width__picker' ) ? 'container-fluid' : null;
  $lightdark = $cta['lightdark'];
  if( 'color' == $cta['background']['type']) {
    $backgroundClass = 'bg-' . $cta['background']['value'];
  }
  switch( $alignment ) {
    case 'center':
      $colClass = 'col-lg-5 col-md-6 mx-md-auto';
      break;
    case 'right':
      $colClass = 'col-lg-5 col-md-6 ml-md-auto';
      break;
    case 'left':
    default:
      $colClass = 'col-lg-5 col-md-6';
      break;
  }
@endphp

{{-- @if( get_sub_field( 'eden_block_image' ) )
  @php $image = get_sub_field( 'eden_block_image' ); @endphp
@endif --}}
@if( !$width )<div class="container">@endif
<section 
  @if($sectionId)id="{{ $sectionId }}"@endif 
  class="block-cta @if( !$width )cta--rounded @else cta--full @endif @if( 'bg-none' == $background['class'] )my-5 @else py-5 @endif  {{ $cta['background']['class'] }} {{ $lightdark }} @if( $cta['background']['overlay'] )overlay-{{ $cta['background']['overlay']['color'] }}@endif" 
  @if( $cta['background']['type'] == 'image' ) style="background-image: url('{{ $cta['background']['value']['sizes']['large'] }}'); background-size: cover; background-position: {{ $cta['background']['position'] }};" @endif
  @if( $background['type'] == 'color--custom' )style="background-color:{{ $background['value'] }}"@endif
> 
  <div class="container">
    <div class="row">
      <div class="text-{{ $alignment }} {{ $colClass }}">
        <div class="text-wrapper my-5">
          @if( $heading )<p class="h2 @if($subheading)line-bottom @endif">{!! $heading !!}</p>@endif
          @if( $subheading )<p class="h2">{!! $subheading !!}</p>@endif
        </div>
        @if( $hasButton )
          @php 
            $button = $cta['button'];
          @endphp
          @include('partials.components.button', ['button' => $button])
        @endif
      </div>
    </div>
  </div>
  <div class="bg-overlay"></div>
</section>
@if( !$width )</div>@endif