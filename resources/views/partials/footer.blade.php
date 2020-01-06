@php
  $info = App\return_contact_info();
  $phone = $info['phone'];
  $email = $info['email'];
  $address = $info['address'];
  $lightdark = get_field('footer__lightdark_lightdark__picker', 'option');
  $background = App\return_background_from_type( get_field('footer__background_background_picker', 'option'), array('prefix' => 'footer__background_', 'option'=>true) );
  $logo = $lightdark == 'light' ? App\return_logo('light') : App\return_logo();
  $menu = get_field('footer__menu', 'option');
  $googleLink = get_field( 'business__map_link', 'option');
@endphp

<footer @if($sectionId)id="{{ $sectionId }}"@endif 
  class="content-info py-5 {{ $background['class'] }} {{ $lightdark }} @if( $background['overlay'] )overlay-{{ $background['overlay']['color'] }}@endif" 
  @if( $background['type'] == 'image' ) style="background-image: url('{{ $background['value']['url'] }}'); background-size: cover; background-position: {{ $background['position'] }};" @endif
  @if( $background['type'] == 'color--custom' ) style="background-color: {{ $background['value'] }};" @endif>
  <div class="container-fluid">
    <div class="row-footer">
      @if( $logo )
        <div class="col-footer text-lg-center">
          <img src="{{ $logo['url'] }}" alt="{{ $logo['alt'] }}" class="img-fluid footer__logo mb-3">
          {!! App\social_list() !!}
        </div>
      @endif

      @if( $menu )
        <div class="col-footer">
          {!! wp_nav_menu(['menu' => $menu, 'menu_class' => 'navbar-nav ml-auto']) !!}
        </div>
      @endif

      @if( $phone || $email || $address )
        <div class="col-footer">
          @if( $email )<div class="email__wrapper d-flex align-items-center"><i class="fas fa-envelope"></i></i><span class="d-flex flex-column"><a href="mailto:{{ $email }}">{{ $email }}</a></span></div>@endif
          @if( $phone )<div class="phone__wrapper d-flex align-items-center"><i class="fas fa-phone-square-alt"></i><span class="d-flex flex-column"><a href="tel:{{ App\strip_phone( $phone ) }}">{{ $phone }}</a></span></div>@endif
          @if( $address )<div class="address__wrapper d-flex align-items-center"><i class="fas fa-map-marker-alt"></i></i><span class="d-flex flex-column">@if( $googleLink )<a href="{{ $googleLink }}" target="_blank">@endif{!! $address !!}@if( $googleLink )</a>@endif</span></div>@endif
        </div>
      @endif

      @if( $info['map'] )
        <div class="col-footer">
          {!! $info['map'] !!}
        </div>
      @endif
    
    </div>
  </div>
</footer>
