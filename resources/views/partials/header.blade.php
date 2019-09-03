@php
  $phone = get_field('business__phone', 'option');
  $email = get_field('business__email', 'option');
  $background = App\return_background_from_type( get_field('header_secondary__background_background_picker', 'option'), array('prefix' => 'header_secondary__background_', 'option' => true) );
  if( 'color' == $background['type']) {
    $backgroundClass = 'bg-' . $background['value'];
  }
  $logo = App\return_logo();
@endphp

<header class="banner">
  <section class="header-secondary py-2 d-flex {{ $backgroundClass }}">
    <div class="container d-flex align-items-center">
      {!! App\social_list() !!}
      <div class="header-secondary__right d-flex ml-auto">
        @if( $phone )<div class="phone__wrapper d-flex align-items-center"><i class="fas fa-phone-square-alt"></i><span class="d-flex flex-column"><span>Contact</span><a href="{{ App\strip_phone( $phone ) }}">{{ $phone }}</a></span></div>@endif
        @if( $email )<div class="email__wrapper d-flex align-items-center"><i class="fas fa-envelope"></i></i><span class="d-flex flex-column"><span>Email</span><a href="mailto:{{ $email }}">{{ $email }}</a></span></div>@endif
      </div>
    </div>
  </section>
  <div class="container container d-flex align-items-center pt-2">
    <a class="brand" href="{{ home_url('/') }}">
      @if( $logo )<img src="{{ $logo['url'] }}" alt="{{ $logo['alt'] }}" class="img-fluid header__logo my-1">
      @else{{ get_bloginfo('name', 'display') }}@endif
    </a>
    <nav class="nav-primary ml-auto align-self-end">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'walker' => new \App\wp_bootstrap4_navwalker()]) !!}
      @endif
    </nav>
  </div>
</header>
