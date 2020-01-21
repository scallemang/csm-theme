@if( $card )

<div class="card card shadow-sm border-0">
    @if( $card['image'] )<a href="{{ $card['permalink'] }}">{!! $card['image'] !!}</a>@endif
    <div class="card-body">
        <div class="card-header__wrapper">
            @if( $card['title'] )
              <h2><a href="{{ $card['permalink'] }}">{!! $card['title'] !!}</a></h2>
            @endif
            @if( $card['excerpt'] )
              <p>{!! $card['excerpt'] !!}</p> <a href="{{ $card['permalink'] }}">Read more &rarr;</a>
            @endif

        </div>
    </div>
</div>
@endif