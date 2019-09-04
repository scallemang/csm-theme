<div class="btn-wrapper">
    @if( $button[ 'text' ] && $button['link'] )
    {{-- @php print_r( $button ); @endphp --}}
        <a id="" class="btn btn-lg @if ($button['colour']) btn-{{ $button['colour'] }} @endif" 
            @if ($button['link']['url']) href="{{ $button['link']['url'] }}" @endif
            @if ($button['link']['target']) target="{{ $button['link']['target'] }}" @endif
            @if ($button['link']['onclick']) onclick="{{ $button['link']['onclick'] }}" @endif
            @if ($button['link']['title']) title="{{ $button['link']['title'] }}" @endif>
            {{ $button['text'] }}
        </a>
    @endif
</div>