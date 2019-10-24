@php
  $cta = App\return_cta();
  $backgroundClass = null;
  $heading = $cta['heading'];
  $subheading = $cta['subheading'];
  $hasButton = null != $cta['button'] ? true : false;
  $alignmentOverride = get_sub_field('cta__override_alignment');
  $alignment = $alignmentOverride ? get_sub_field('copy__alignment')['alignment__picker'] : $cta['alignment'];
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
<section 
  @if($sectionId)id="{{ $sectionId }}"@endif 
  class="block-cta @if( 'bg-none' == $background['class'] )my-5 @else py-5 @endif  {{ $cta['background']['class'] }} {{ $lightdark }} @if( $cta['background']['overlay'] )overlay-{{ $cta['background']['overlay']['color'] }}@endif" 
  @if( $cta['background']['type'] == 'image' ) style="background-image: url('{{ $cta['background']['value']['url'] }}'); background-size: cover; background-position: {{ $cta['background']['position'] }};" @endif
> 
  <div class="container">
    <div class="row">
      <div class="text-{{ $alignment }} {{ $colClass }}">
        @if( $heading )<h2 @if($subheading)class="line-bottom"@endif>{!! $heading !!}</h2>@endif
        @if( $subheading )<h3>{!! $subheading !!}</h3>@endif
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