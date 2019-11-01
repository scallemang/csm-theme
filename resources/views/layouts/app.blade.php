<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp>
    @if( get_field('scripts__gtm', 'option') )
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ get_field('scripts__gtm', 'option') }}"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    @endif
    @php do_action('get_header') @endphp
    @include('partials.header')
    @if( has_post_thumbnail() && is_page() )
      @include('partials.page-header')
    @endif
    <div class="wrap @if (App\display_sidebar()) container @endif" role="document">
      <div class="content @if (App\display_sidebar()) row @endif">
        <main class="main @if (App\display_sidebar())col-md-8 col-lg-9 pb-4 @endif">
          @yield('content')
        </main>
        @if (App\display_sidebar())
          <aside class="sidebar col-md-4 col-lg-3 mt-5 mb-4 pt-lg-5">
            @include('partials.sidebar')
          </aside>
        @endif
      </div>
    </div>
    @php do_action('get_footer') @endphp
    @if( basename(get_page_template() != "template-contact.blade.php") )
      @include('partials.footer')
    @endif
    @php wp_footer() @endphp
  </body>
</html>
