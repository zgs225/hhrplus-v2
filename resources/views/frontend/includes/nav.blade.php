<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
        <span class="sr-only">{{ trans('labels.toggle_navigation') }}</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">{{ app_name() }}</a>
    </div>

    <div class="collapse navbar-collapse" id="main-nav">
      <ul class="nav navbar-nav navbar-right">
        <li>{!! link_to('/', trans('navs.home')) !!}</li>
        <li>{!! link_to('services', trans('navs.services')) !!}</li>
        <li>{!! link_to('clients', trans('navs.clients')) !!}</li>
        <li>{!! link_to('about', trans('navs.about')) !!}</li>
      </ul>
    </div>
  </div>
</nav>
