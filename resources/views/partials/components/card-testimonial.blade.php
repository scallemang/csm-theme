@if( $card )

<div class="{{ $cols }} my-3">
  <div class="card color-{{ $color }}">
      <div class="card-body">
          <div class="card-header__wrapper">
              @if( $card['testimonial__excerpt'] )
                <div class="lead font-weight-bold h3 display-5 mt-0 mb-4">{!! $card['testimonial__excerpt'] !!}</div>
              @endif
              @if( $card['testimonial__full'] )
                <div class="full mb-3">{!! $card['testimonial__full'] !!}</div>
              @endif
              @if( $card['title'] )
                <p class="h6">{!! $card['title'] !!}</p>
              @endif

          </div>
      </div>
  </div>
</div>
@endif