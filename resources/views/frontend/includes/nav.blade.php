<nav class="navbar navbar-default">
  <div class="hhrplus-container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
        <span class="sr-only">{{ trans('labels.toggle_navigation') }}</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">
        <img src="/build/images/logo.png" alt="合伙人+Logo">
      </a>
    </div>

    <div class="collapse navbar-collapse" id="main-nav">
      <ul class="nav navbar-nav navbar-right">
        <li>{!! link_to('/', trans('navs.home')) !!}</li>
        <li>{!! link_to('services', trans('navs.services')) !!}</li>
        <li>{!! link_to('about', trans('navs.about')) !!}</li>
      </ul>
    </div>
  </div>
</nav>
