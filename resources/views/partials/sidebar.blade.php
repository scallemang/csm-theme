@php dynamic_sidebar('sidebar-primary') @endphp

@if( is_singular('post') && null != get_field('blog__newsletter', 'option') )
  <div class="widget_newsletter my-4">
    @if( get_field('blog__newsletter_title', 'option') )<h4>{{ get_field('blog__newsletter_title', 'option') }}</h4>@endif
    @php print do_shortcode( get_field('blog__newsletter', 'option') ); @endphp
  </div>
@endif
