@php
  $heading = get_sub_field( 'hero__heading' );
  $subheading = get_sub_field( 'hero__subheading' );
  //$sectionId = get_sub_field( 'eden_section_id' );
  $hasButton = get_sub_field( 'hero__has_button' );
@endphp

{{-- @if( get_sub_field( 'eden_block_image' ) )
  @php $image = get_sub_field( 'eden_block_image' ); @endphp
@endif --}}
<section @if($sectionId)id="{{ $sectionId }}"@endif class="block-hero" @if( $image ) style="background-image: url('{{ $image['url'] }}'); background-size: cover; background-position: center;" @endif> 
  <div class="container {{-- container-fluid-md-down --}}">
    <div class="row row-hero">
      <div class="col-sm-12">
        @if( $heading || $subheading )@if( $heading )<h1 class="">{!! $heading !!}</h1>@endif @if( $subheading )<h3 class="">{!! $subheading !!}</h3>@endif @endif
      
        @if( $hasButton )
          @php 
            $buttonGroup = get_sub_field( 'hero__button' ); 
            $button = App\return_button($buttonGroup);
          @endphp
          @include('partials.components.button', ['button' => $button])
        @endif
      </div>
    </div>
  </div>
  <div class="bg-overlay"></div>
</section>