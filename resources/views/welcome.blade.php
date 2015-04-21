<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beauchamps Intranet</title>
    
    <link rel="stylesheet" href="/css/foundation.css" />
    <link rel="stylesheet" href="/css/mystyles.css" />
    <!--<link rel="stylesheet" href="/css/jquery.dataTables.css">-->
   <script src="/js/jquery.js"></script>
    <script src="/js/vendor/modernizr.js"></script>
    <script src="/js/jquery.dataTables.js"></script>
    @yield('head')
  </head>
  <body>
 <!--<img id="background" src="http://beauweb.org.uk/images/bg_mini.jpg"/>-->
 <div class="off-canvas-wrap" data-offcanvas>
  <div class="inner-wrap">
    <nav class="tab-bar show-for-small">
      <section class="left-small">
        <a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
      </section>

      <section class="middle tab-bar-section">
        <h1 class="title">Beauchamps Intranet</h1>
      </section>

      <section class="right-small">
  
      </section>
    </nav>

    <aside class="left-off-canvas-menu">
      <ul class="off-canvas-list">
        <li><label>Beauchamps CPD</label></li>
        <li><a href="#">The Psychohistorians</a></li>
        <li><a href="#">...</a></li>
      </ul>
    </aside>

    <section class="main-section">
<section class="header">
	<nav class="top-bar foundation-bar hide-for-small" data-topbar>
  <ul class="title-area">
    <li class="name">
      @if(Auth::guest())
      <span><h1><a href="#">Welcome to the Intranet please log in.</a></h1></span>
      @else
     <span><h1><a href="#">You are logged in!</a></h1></span>
     @endif
    </li>
  </ul>
  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
      @if(Auth::guest())
      <li><a  href="/home" >Login</a></li>
      @else
      <li><a  class="loginRight" data-dropdown="drop1" aria-controls="drop1"  aria-expanded="false" >Hello {{ Auth::user()->firstName }}!</a></li>
       <ul id="drop1" class="f-dropdown" data-dropdown-content aria-hidden="false" tabindex="-1">
          <li><a  href="/">View Profile</a></li>
          <li><a  href="/auth/logout">Logout</a></li>
       </ul>   
      @endif
    </ul>         
  </section>
</nav>
	<div class="row">
		<div class="large-12 medium-12 small-12">
			<a href="/home"><img class="header-image" src="/img/Ofsted-Header-new-logo.png"></img></a>
		</div>
	</div>
</section>
<div class="row">
  <div class="contain-to-grid sticky">

@include('menu')
  </div>
</div>  
@yield('content')
<div class="posts">
</div>
    
    @yield('scripts')
    <script>
    $('div#alert-box').delay(4000).slideUp(300);
    </script>
   
    <script src="/js/foundation.min.js"></script>
    <script src="/js/foundation/foundation.alert.js"></script>
    <script>
    $(document).foundation();
    </script>
     </section>
    <a class="exit-off-canvas"></a>
  </body>
</html>
