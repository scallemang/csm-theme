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

<div class="card @if($class){{ $class }}@endif" style="@if($color)border-color:{{$color}};@endif">
    <div class="card-body">
        <div class="card-header__wrapper @if( $title )line-bottom @endif @if( !$icon )justify-content-center text-center @endif" @if($color)style="color:{{ $color }};"@endif>
            @if( $icon ){!! $icon !!}@if($color)@endif @endif
            @if( $title )
                @if( $link )<h3><a href="{{ $link }}" style="@if($color)color: {{ $color }};@endif">{!! $title !!}</a></h3>
                @else<h3 style="@if($color)color: {{ $color }};@endif">{!! $title !!}</h3>@endif 
            @endif
        </div>
        @if( $body ){!! $body !!}@endif
    </div>
</div>
@endif