<div class="btn-wrapper">
    @if( $button[ 'text' ] && $button['link'] )
        <a id="" class="btn @if ($button['colour']) btn-{{ $button['colour'] }} @endif" 
            @if ($button['url']) href="{{ $button['url'] }}" @endif
            @if ($button['target']) target="{{ $button['target'] }}" @endif
            @if ($button['onclick']) onclick="{{ $button['onclick'] }}" @endif>
            {{ $button['text'] }}
        </a>
    @endif
</div>