@php
  $heading = get_sub_field('faqs__heading');
  $body = get_sub_field('faqs__body');
  $hasButton = get_sub_field('faqs__has_button');
@endphp

{{-- @if( get_sub_field( 'eden_block_image' ) )
  @php $image = get_sub_field( 'eden_block_image' ); @endphp
@endif --}}

<section @if($sectionId)id="{{ $sectionId }}"@endif class="block-faq py-5 text-center"> 
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        @if( $heading )<h2>{!! $heading !!}</h2>@endif
        @if( $body )<div @if( $hasButton )class="mb-5"@endif>{!! $body !!}</div>@endif
        @if( $hasButton )
          @php 
            $buttonGroup = get_sub_field( 'copy__button' ); 
            $button = App\return_button($buttonGroup);
          @endphp
          @include('partials.components.button', ['button' => $button])
        @endif
      </div>
    </div>
  </div>
  <div class="bg-overlay"></div>
</section>