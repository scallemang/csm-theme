@php
  $cta = App\return_cta();
  $backgroundClass = null;
  $heading = $cta['heading'];
  $subheading = $cta['subheading'];
  $hasButton = null != $cta['button'] ? true : false;
  if( 'color' == $cta['background']['type']) {
    $backgroundClass = 'bg-' . $cta['background']['value'];
  }
@endphp

{{-- @if( get_sub_field( 'eden_block_image' ) )
  @php $image = get_sub_field( 'eden_block_image' ); @endphp
@endif --}}
<section @if($sectionId)id="{{ $sectionId }}"@endif class="block-cta py-5 {{ $backgroundClass }}"> 
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        @if( $heading )<h2>{!! $heading !!}</h2>@endif
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