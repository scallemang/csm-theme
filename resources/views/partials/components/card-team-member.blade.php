@if( $card )
@php

@endphp
<div class="{{ $cols }}">
    <div class="card color-{{ $color }} text-center">
        <div class="card-body">
            <div class="card-header__wrapper">
                @if( $card['image'] )
                @if( $card['permalink'] )<a href="{{ $card['permalink'] }}">@endif<img src="{!! $card['image']['url'] !!}" class="rounded-circle">@if( $card['permalink'] )</a>@endif
                @endif
                @if( $card['title'] )
                    <h3>@if( $card['permalink'] )<a href="{{ $card['permalink'] }}">@endif{!! $card['title'] !!}@if( $card['permalink'] )</a>@endif</h3>
                @endif
                @if( $card['jobtitle'] )
                    <h4>{!! $card['jobtitle'] !!}</h4>
                @endif
            </div>
            @if( $card['links']['email'] )<a href="mailto:{{ $card['links']['email'] }}"><i class="fas fa-envelope"></i></a>@endif
            @if( $card['links']['twitter'] )<a href="{{ $card['links']['twitter'] }}"><i class="fab fa-twitter"></i></a>@endif
            @if( $card['links']['facebook'] )<a href="{{ $card['links']['facebook'] }}"><i class="fab fa-facebook"></i></a>@endif
            @if( $card['links']['instagram'] )<a href="{{ $card['links']['instagram'] }}"><i class="fab fa-instagram"></i></a>@endif
            @if( $card['links']['website'] )<a href="{{ $card['links']['website'] }}"><i class="fas fa-link"></i></a>@endif
            @if( $card['bio']['short'] )<p>{!! $card['bio']['short'] !!}</p>@endif
            @if( $card['button'] )@include('partials/components/button', ['button' => $card['button']])@endif
        </div>
    </div>
</div>
@endif