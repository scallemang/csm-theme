@php
  $heading = get_sub_field('contact__heading');
  $subheading = get_sub_field('contact__subheading');
  $hasButton = get_sub_field('contact__button');
  $contactCheckbox = get_sub_field('contact__info');
  $info = App\return_contact_info($contactCheckbox, array('strip-hours' => true));
  $background = App\return_background_from_type( get_sub_field('background_picker'), array('block'=>true) );
  print_r( $background );
@endphp

{{-- @if( get_sub_field( 'eden_block_image' ) )
  @php $image = get_sub_field( 'eden_block_image' ); @endphp
@endif --}}
<section 
  @if($sectionId)id="{{ $sectionId }}"@endif 
  class="block-contact py-5 text-center {{ $background['class'] }} @if( $background['overlay'] )overlay-{{ $background['overlay']['color'] }}@endif" 
  @if( $background['type'] == 'image' ) style="background-image: url('{{ $background['value']['url'] }}'); background-size: cover; background-position: {{ $background['position'] }};" @endif
> 
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        @if( $heading )<h2>{!! $heading !!}</h2>@endif
        @if( $subheading ){!! $subheading !!}@endif

        @if(!empty( $info ))
        <div class="row-contact my-5">
          @if( isset($info['phone']) || isset($info['address']) || isset($info['hours']))
          <div class="col-info">
            <ul>
              @if( $info['address'])<li class="info-address"><i class="fas fa-map-marker-alt"></i><span>{{ $info['address'] }}</span></li>@endif
              @if( $info['phone'])<li class="info-phone"><i class="fas fa-phone-alt"></i><span><a href="tel:{{ App\strip_phone( $info['phone'] ) }}">{{ $info['phone'] }}</a></span></li>@endif
              @if( $info['hours'])<li class="info-hours"><i class="fas fa-calendar-alt"></i></i><span>{{ $info['hours'] }}</span></li>@endif
            </ul>
          </div>
          @endif
          @if( isset($info['map']) )
          <div class="col-map">
            {!! $info['map'] !!}
          </div>
          @endif
          @if( isset($info['form']) )
          <div class="col-form">
            {!! $info['form'] !!}
          </div>
          @endif
        </div>
        @endif

         @if( $hasButton )
          @php 
            $buttonGroup = get_sub_field( 'contact__button' ); 
            $button = App\return_button($buttonGroup);
          @endphp
          @include('partials.components.button', ['button' => $button])
        @endif
      </div>
    </div>
  </div>
  <div class="bg-overlay"></div>
</section>