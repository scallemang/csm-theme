@if( $card )
@php
    $title = $card['title'];
    $link = $card['link'];
    $color = $card['colour'];
    $body = $card['body'];
    $icon = $card['icon'];
    $class = isset($card['class']) ? $card['class'] : null;
@endphp

<div class="card @if($class){{ $class }}@endif">
    <div class="card-body">
        <div class="card-header__wrapper">
            @if( $icon ){!! $icon !!}@endif
            @if( $title )<h3>{!! $title !!}</h3>@endif
        </div>
        @if( $body ){!! $body !!}@endif
    </div>
</div>
@endif