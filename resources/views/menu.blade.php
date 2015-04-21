    <nav class="top-bar" data-topbar role="navigation" data-options="sticky_on: large">
      <ul class="title-area">
        <li class="name">
          <h1><a></a></h1>
        </li> 
      </ul>

      <section class="top-bar-section">
        <ul class="left">
          
       @if(Auth::Guest())

       @elseif(Auth::User()->isCourseAdmin == 1)
       <li class ="has-dropdown"><a  href="{{URL::action('HomeController@homepage')}}">CPD</a> 
       <ul class="dropdown">
             <li><a href="{{URL::action('HomeController@homepage')}}">Profile</a></li>
             <li class="has-dropdown">
            <a href="#">Management</a>
                      <ul class="dropdown" data-options="align:right">
                      <li><a  href="/admin">Admin</a></li>      
                      <li> <a href="\home\courseAdmin">Course Admin</a></li>
                     </ul></li>

       @elseif(Auth::User()->isAdmin == 1)
       <li class ="has-dropdown"><a  href="{{URL::action('HomeController@homepage')}}">CPD</a> 
       <ul class="dropdown">
             <li><a href="{{URL::action('HomeController@homepage')}}">Profile</a></li>
             <li class="has-dropdown">
            <a href="#">Management</a>
                      <ul class="dropdown" data-options="align:right">
                      <li><a  href="/admin">Admin</a></li>     
                     </ul></li>



       @elseif(Auth::User())
        <li class ="has-dropdown"><a  href="{{URL::action('HomeController@homepage')}}">CPD</a> 
       <ul class="dropdown">
             <li><a href="{{URL::action('HomeController@homepage')}}">Profile</a></li>
       @endif
        </ul>
      </li>
      </ul>
    </ul>
    </ul>
      </section>
    </nav>