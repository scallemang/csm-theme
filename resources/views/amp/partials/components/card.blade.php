@if( $card )
@php
    $title = $card['title'];
    $link = $card['link'];
    $color = $card['colour'];
    $body = $card['body'];
    $icon = $card['icon'];
    $link = isset($card['link']['url']) ? $card['link']['url'] : null;
    $class = isset($card['class']) ? $card['class'] : null;
@endphp

<div class="card @if($class){{ $class }}@endif">
    <div class="card-body">
        <div class="card-header__wrapper">
            @if( $icon ){!! $icon !!}@endif
            @if( $title )
                @if( $link )<h3><a href="{{ $link }}">{!! $title !!}</a></h3>
                @else<h3>{!! $title !!}</h3>@endif 
            @endif
        </div>
        @if( $body ){!! $body !!}@endif
    </div>
</div>
@endif