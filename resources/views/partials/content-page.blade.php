{{-- @php the_content() @endphp --}}
{{-- {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!} --}}

@if( have_rows('flex-content') )
    @while ( have_rows('flex-content') ) @php the_row() @endphp
      @include('partials.snippets.background')

      @if( get_row_layout() == 'flex__hero' )
      	@include('partials.blocks.block-hero')

      @elseif( get_row_layout() == 'flex__copy' )
      	@include('partials.blocks.block-copy')

      @elseif( get_row_layout() == 'flex__fiftyfifty' )
        @include('partials.blocks.block-fiftyfifty')

      @elseif( get_row_layout() == 'flex__dynamic' )
        @include('partials.blocks.block-dynamic')

      @elseif( get_row_layout() == 'flex__services' )
      	@include('partials.blocks.block-services')

      @elseif( get_row_layout() == 'flex__cta' )
      	@include('partials.blocks.block-cta')

      @elseif( get_row_layout() == 'flex__faqs' )
      	@include('partials.blocks.block-faqs')

      @elseif( get_row_layout() == 'flex__reviews' )
      	@include('partials.blocks.block-reviews')

      @elseif( get_row_layout() == 'flex__contact' )
        @include('partials.blocks.block-contact')

      @elseif( get_row_layout() == 'flex__divider' )
        @include('partials.blocks.block-divider')

      @elseif( get_row_layout() == 'flex__space' )
        @include('partials.blocks.block-space')

      @endif

    @endwhile
@else
    {{-- no layouts found --}}

@endif