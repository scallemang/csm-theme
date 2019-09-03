@php
  
  $heading = get_sub_field( 'services__heading' );
  $subheading = get_sub_field( 'services__subheading' );
  
  $hasButton = get_sub_field( 'services__has_button' );
@endphp

{{-- @if( get_sub_field( 'eden_block_image' ) )
  @php $image = get_sub_field( 'eden_block_image' ); @endphp
@endif --}}

<section @if($sectionId)id="{{ $sectionId }}"@endif class="block-services"> 
  <div class="container">
    <div class="row row-services">
      <div class="col-sm-12">
        @if( $heading )<h2>{!! $heading !!}</h2>@endif

        {{--  Repeater --}}
        @if( have_rows('services__repeater') )
          <div class="row">
          @while( have_rows('services__repeater') ) @php the_row(); @endphp
            @php
              print_r( get_sub_field('service__icon') );
              $service = array(
                'title'   => get_sub_field( 'service__heading' ),
                'link'    => get_sub_field( 'service__link' ),
                'colour'  => get_sub_field( 'service__colour' ),
                'body'    => get_sub_field( 'service__summary' ),
                'icon'    => App\return_icon()
              );
            @endphp
            @include('partials.components.card', ['card' => $service])
          @endwhile
          </div>
        @endif

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