@if( $card )

<div class="card card shadow-sm border-0">
    <div class="card-body">
        <div class="card-header__wrapper">
            @if( $card['testimonial'] )
              <div class="lead mb-4">{!! $card['testimonial'] !!}</div>
            @endif
            @if( $card['title'] )
              <p>{!! $card['title'] !!}</p>
            @endif

        </div>
    </div>
</div>
@endif