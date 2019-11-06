@php
  $heading = get_sub_field('contact__heading');
  $subheading = get_sub_field('contact__subheading');
  $hasButton = get_sub_field('contact__button');
  $contactCheckbox = get_sub_field('contact__info');
  $info = App\return_contact_info($contactCheckbox, array('strip-hours' => true));
  $googleLink = get_field( 'business__map_link', 'option');
  $background = App\return_background_from_type( get_sub_field('background_picker'), array('block'=>true) );
@endphp

{{-- @if( get_sub_field( 'eden_block_image' ) )
  @php $image = get_sub_field( 'eden_block_image' ); @endphp
@endif --}}
<section 
  @if($sectionId)id="{{ $sectionId }}"@endif 
  class="block-contact @if( 'bg-none' == $background['class'] )my-5 @else py-5 @endif  text-center {{ $background['class'] }} @if( $background['overlay'] )overlay-{{ $background['overlay']['color'] }}@endif" 
  @if( $background['type'] == 'image' ) style="background-image: url('{{ $background['value']['url'] }}'); background-size: cover; background-position: {{ $background['position'] }};" @endif
  @if( $background['type'] == 'color--custom' )style="background-color:{{ $background['value'] }}"@endif
> 
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        @if( $heading )<h2>{!! $heading !!}</h2>@endif
        @if( $subheading ){!! $subheading !!}@endif

        @if(!empty( $info ))
        <div class="row-contact mb-5">
          @if( isset($info['phone']) || isset($info['address']) || isset($info['hours']))
          <div class="col-info">
            <ul>
              @if( $info['address'])<li class="info-address"><i class="fas fa-map-marker-alt"></i><span>@if( $googleLink )<a href="{{ $googleLink }}" target="_blank">@endif{!! $info['address'] !!}@if( $googleLink )</a>@endif</span></li>@endif
              @if( $info['phone'])<li class="info-phone"><i class="fas fa-phone-alt"></i><span><a href="tel:{{ App\strip_phone( $info['phone'] ) }}">{{ $info['phone'] }}</a></span></li>@endif
              @if( $info['email'])<li class="info-email"><i class="fas fa-envelope"></i></i><span><a href="mailto:{{ $info['email'] }}">{{ $info['email'] }}</a></span></li>@endif
              @if( $info['hours'])<li class="info-hours"><i class="fas fa-calendar-alt"></i></i><span>{!! $info['hours'] !!}</span></li>@endif
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
          <div class="mb-5">
            @include('partials.components.button', ['button' => $button])
          </div>
        @endif
      </div>
    </div>
  </div>
  <div class="bg-overlay"></div>
</section>