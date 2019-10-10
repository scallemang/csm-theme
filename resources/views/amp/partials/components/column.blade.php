@if( $column )

@php
    $image = $column['image'];
    $heading = $column['heading'];
    $subheading = $column['subheading'];
    $copy = $column['copy'];
@endphp

<div class="col-{{ $column['type'] }}" 
    @if( $image ) style="background-image:url('{{ $image['url'] }}'); background-size: cover;" @endif>
    @if( !$image )
        @if( $heading || $subheading || $copy )
            @if($heading)<h2>{!! $heading !!}</h2>@endif
            @if($subheading)<h3>{!! $subheading !!}</h3>@endif
            @if($copy){!! $copy !!}@endif
        @endif
    @endif
</div>
@endif