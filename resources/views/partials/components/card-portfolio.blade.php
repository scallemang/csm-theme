@if( $card )
@php

@endphp
<div class="{{ $cols }} my-3">
    <div class="card color-{{ $color }} text-center border-top-0">
        @if( $card['image'] )
        @if( $card['link'] )<a href="{{ $card['link'] }}">@endif<img src="{!! $card['image']['url'] !!}" class="img-fluid">@if( $card['link'] )</a>@endif
        @endif
        @if( $card['title'] || $card['description'])
        <div class="card-body">
            <div class="card-header__wrapper">
                @if( $card['title'] )
                  <h3 class="mt-0 post-title">@if( $card['link'] )<a href="{{ $card['link'] }}" class="link">@endif{!! $card['title'] !!}@if( $card['link'] )</a>@endif</h3>
                @endif
                @if( $card['description'] )
                  <div class="s">{!! $card['descridivtion'] !!}</div>
                @endif
            </div>
        </div>
        @endif
    </div>
</div>
@endif