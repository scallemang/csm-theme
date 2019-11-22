@php
  $heading = get_sub_field('faqs__heading');
  //$body = get_sub_field('faq__subheading');
  $hasButton = get_sub_field('faqs__has_button');
  $background = App\return_background_from_type( get_sub_field('background_picker'), array('block'=>true) );
@endphp

{{-- @if( get_sub_field( 'eden_block_image' ) )
  @php $image = get_sub_field( 'eden_block_image' ); @endphp
@endif --}}

<section 
  @if($sectionId)id="{{ $sectionId }}"@endif 
  class="block-faq @if( 'bg-none' == $background['class'] )my-5 @else py-5 @endif  text-center {{ $background['class'] }} @if( $background['overlay'] )overlay-{{ $background['overlay']['color'] }}@endif" 
  @if( $background['type'] == 'image' ) style="background-image: url('{{ $background['value']['url'] }}'); background-size: cover; background-position: {{ $background['position'] }};" @endif
  @if( $background['type'] == 'color--custom' )style="background-color:{{ $background['value'] }}"@endif
>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        @if( $heading )<h2>{!! $heading !!}</h2>@endif
        @if( $body )<div @if( $hasButton )class="mb-5"@endif>{!! $body !!}</div>@endif
        
        @if( have_rows('faqs__repeater') )
          @php $count = 0; @endphp
          <div class="row">
              <div class="col-md-10 col-lg-8 mx-auto">
                <div id="accordion-faq" class="accordion accordion-faq">
                @while ( have_rows('faqs__repeater') ) @php the_row(); @endphp
                  @php
                    $q = get_sub_field('faq__question');
                    $a = get_sub_field('faq__answer');
                    $uid = get_sub_field('faq__unique_id');
                  @endphp
                  <div class="card">
                    <div class="card-header" id="heading-{{ $uid }}" data-toggle="collapse" data-target="#collapse-{{ $uid }}" @if(0 == $count) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="collapse-{{ $uid }}">
                      <h3 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-{{ $uid }}" @if(0 == $count) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="collapse-{{ $uid }}">
                          {{ $q }}
                        </button>
                      </h3>
                    </div>

                    <div id="collapse-{{ $uid }}" class="collapse @if(0 == $count)show @endif" aria-labelledby="heading-{{ $uid }}" data-parent="#accordion-faq">
                      <div class="card-body">
                        {!! $a !!}
                      </div>
                    </div>
                  </div>
                  @php $count++; @endphp
                @endwhile
                @php $count = null; @endphp
              </div>
            </div>
          </div>
        @endif

        @if( $hasButton )
          @php 
            $buttonGroup = get_sub_field( 'faqs__button' ); 
            $button = App\return_button($buttonGroup);
          @endphp
          <div class="my-5">
            @include('partials.components.button', ['button' => $button])
          </div>
        @endif
      </div>
    </div>
  </div>
  <div class="bg-overlay"></div>
</section>