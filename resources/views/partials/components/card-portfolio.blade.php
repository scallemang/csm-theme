@if( $card )
@php

@endphp
<div class="{{ $cols }} my-3">
    <div class="card color-{{ $color }} text-center">
        @if( $card['image'] )
        <img src="{!! $card['image']['url'] !!}" class="img-fluid">
        @endif
        <div class="card-body">
            <div class="card-header__wrapper">
                @if( $card['title'] )
                  <h3 class="mt-0 post-title">{!! $card['title'] !!}</h3>
                @endif
                @if( $card['description'] )
                  <p class="s">{!! $card['description'] !!}</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endif