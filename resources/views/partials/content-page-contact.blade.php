{{-- {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!} --}}
@php
  $info = App\return_contact_info('', array('strip-hours' => false));
@endphp

<section class="content-contact">
  <div class="container py-3 text-center">
    @php the_content() @endphp
  </div>

  @if(!empty( $info ))

    {{-- Address bar --}}
    @if( isset($info['phone']) || isset($info['address']) || isset($info['hours']))
    <div class="bg-info">
      <div class="container-fluid py-4">
        <div class="info">
          <ul>
            @if( $info['address'])<li class="info-address"><i class="fas fa-map-marker-alt"></i><span>{{ $info['address'] }}</span></li>@endif
            @if( $info['hours'])<li class="info-hours"><i class="fas fa-calendar-alt"></i></i><span>{!! $info['hours'] !!}</span></li>@endif
            @if( $info['phone'] && $info('email'))<div>@endif
            @if( $info['phone'])<li class="info-phone"><i class="fas fa-phone-alt"></i><span><a href="tel:{{ App\strip_phone( $info['phone'] ) }}">{{ $info['phone'] }}</a></span></li>@endif
            @if( $info['email'])<li class="info-email"><i class="fas fa-envelope"></i><span>{{ $info['email'] }}</span></li>@endif
          @if( $info['phone'] && $info('email'))</div>@endif
          </ul>          
        </div>
      </div>
    </div>
    @endif

    {{-- Google Map --}}
    @if( isset($info['map']) )
    <div class="container pt-5 pb-3">
      <div class="row">
        <div class="col-sm-12 mx-auto">
          <div class="map">
            {!! $info['map'] !!}
          </div>
        </div>
      </div>
    </div>
    @endif

    {{-- Contact form --}}
    @if( isset($info['form']) )
    <div class="container py-3">
      <div class="row">
        <div class="col-sm-12 mx-auto">
          <div class="form">
            {!! do_shortcode( $info['form'] ) !!}
          </div>
        </div>
      </div>
    </div>
    @endif

  @endif
</section>