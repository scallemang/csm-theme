@php
  $phone = get_field('business__phone', 'option');
  $email = get_field('business__email', 'option');
  $background = App\return_background_from_type( get_field('header_secondary__background_background_picker', 'option'), array('prefix' => 'header_secondary__background_', 'option' => true) );
  $logo = App\return_logo();
@endphp

<header class="banner">
  <section class="header-secondary py-2 d-md-flex {{ $background['class'] }}">
    <div class="container-fluid d-flex align-items-center flex-column flex-md-row">
      {!! App\social_list() !!}
      <div class="header-secondary__right d-md-flex ml-md-auto">
        @if( $phone )<div class="phone__wrapper d-flex align-items-center"><i class="fas fa-phone-square-alt"></i><span class="d-flex flex-column"><span>Contact</span><a href="{{ App\strip_phone( $phone ) }}">{{ $phone }}</a></span></div>@endif
        @if( $email )<div class="email__wrapper d-flex align-items-center"><i class="fas fa-envelope"></i></i><span class="d-flex flex-column"><span>Email</span><a href="mailto:{{ $email }}">{{ $email }}</a></span></div>@endif
        @php 
          $buttonGroup = get_field( 'header_secondary__cta', 'option' ); 
          if(!empty($buttonGroup)):
            $button = App\return_button($buttonGroup);
            $button['class'] = 'btn-md';
          endif;
        @endphp
        @if($button)
          @include('partials.components.button', ['button' => $button])
        @endif
      </div>
    </div>
  </section>

  <div class="pt-2">
    <nav class="navbar navbar-expand-md nav-primary">
      <a class="brand" href="{{ home_url('/') }}">
        @if( $logo )<img src="{{ $logo['url'] }}" alt="{{ $logo['alt'] }}" class="img-fluid header__logo my-1">
        @else{{ get_bloginfo('name', 'display') }}@endif
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation--primary" aria-controls="navigation--primary" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      </button>
      <div class="collapse navbar-collapse align-self-center" id="navigation--primary">
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'navbar-nav ml-auto', 'walker' => new \App\wp_bootstrap4_navwalker()]) !!}
        @endif
      </div>
    </nav>

  </div>
</header>
