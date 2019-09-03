@if( $card )
@php
    $title = $card['title'];
    $link = $card['link'];
    $color = $card['colour'];
    $body = $card['body'];
    $icon = $card['icon'];
@endphp

<div class="col-md-4">
    <div class="card">
        <div class="card-body">
            @if( $icon ){!! $icon !!}@endif
            @if( $title )<h3>{!! $title !!}</h3>@endif
            @if( $body ){!! $body !!}@endif
        </div>
    </div>
</div>

@endif