@if( $column )

@php
    $image = $column['image'];
    $heading = $column['heading'];
    $subheading = $column['subheading'];
    $copy = $column['copy'];
@endphp

<div class="col-md-6">
    @if( $image )
    <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" class="img-fluid">
    @elseif( $heading || $subheading || $copy )
        @if($heading)<h2>{!! $heading !!}</h2>@endif
        @if($subheading)<h3>{!! $subheading !!}</h3>@endif
    @endif
</div>
@endif