
    
<nav class="navbar navbar-expand-lg  p-1 bg-custom"  style="padding: 0; ">
  <div class="container-fluid col-md-10"  >
    
    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class= "navbar-toggler-icon "></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
        <li class="nav-item">

        @auth
        @if (request()->is('/')) 
            <a class="nav-link active" aria-current="page" href="/">{{__('messages.assessmentdashboard')}}</a>
        @else 
            <a class="nav-link " href="/" >{{__('messages.assessmentdashboard')}}</a>
        @endif

          
        </li>

        <li class="nav-item">
        @if (request()->is('resources*')) 
            <a class="nav-link active " aria-current="page" href="/resources">{{__('messages.resourcehub')}}</a>  
        @else
          <a class="nav-link " href="/resources/">{{__('messages.resourcehub')}}</a>
        @endif
        </li>
        
        @role('cdps-admin|super-admin')
        <li class="nav-item">
        @if (request()->is('manage*')) 
            <a class="nav-link active" aria-current="page" href="/manage">Manage</a>
        @else
        <a class="nav-link " href="/manage/">Manage</a>
        @endif
        </li>
        @endrole
        @endauth
      </ul>
      
     

    </div>
  </div>
</nav>
