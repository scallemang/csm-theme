@if( $card )

<div class="{{ $cols }} mb-5">
  {{-- <div class="card color-{{ $color }}"> --}}
      @if( $card['image'] )<a href="{{ $card['permalink'] }}">{!! $card['image'] !!}</a>@endif
      {{-- <div class="card-body">
          <div class="card-header__wrapper"> --}}
              @if( $card['title'] )
                <h4 class="text-center post-title"><a href="{{ $card['permalink'] }}">{!! $card['title'] !!}</a></h2>
              @endif
              {{-- @if( $card['excerpt'] )
                <p>{!! $card['excerpt'] !!}</p> <a href="{{ $card['permalink'] }}">Read more &rarr;</a>
              @endif --}}

          {{-- </div>
      </div> --}}
  {{-- </div> --}}
</div>
@endif