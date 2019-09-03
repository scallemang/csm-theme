@php
  $heading = get_sub_field('contact__heading');
  $subheading = get_sub_field('subheading');
  $hasButton = get_sub_field('button');
  $contactCheckbox = get_sub_field('contact__info');
  $contactInfo = App\return_contact_info($contactCheckbox);
  print_r( $contactInfo );
@endphp

{{-- @if( get_sub_field( 'eden_block_image' ) )
  @php $image = get_sub_field( 'eden_block_image' ); @endphp
@endif --}}
<section @if($sectionId)id="{{ $sectionId }}"@endif class="block-cta"> 
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        @if( $heading )<h2>{!! $heading !!}</h2>@endif
        @if( $subheading ){!! $subheading !!}@endif
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