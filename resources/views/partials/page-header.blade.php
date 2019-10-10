@if(function_exists('bcn_display'))
<div class="breadcrumbs breadcrumbs-navxt mt-5 mb-4 container" typeof="BreadcrumbList" vocab="http://schema.org/">
  {{ bcn_display() }}
</div>
@endif

<div class="page-header container text-center my-4">
  <h1 class="page-title">@if(get_field('page__alternate_title')){!! get_field('page__alternate_title') !!}@else{!! App::title() !!}@endif</h1>
</div>
