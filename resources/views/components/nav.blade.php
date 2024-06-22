
    
<nav class="navbar navbar-expand-lg  p-1 bg-custom"  style="padding: 0; ">
  <div class="container-fluid col-md-10"  >
    
    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class= "navbar-toggler-icon "></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex align-items-center" >
      <li class="nav-item d-flex align-items-center">

        @auth
        @if (request()->is('/')) 
            <a class="nav-link active align-middle fs-5" aria-current="page" href="/">{{__('messages.homepage')}}</a></h5>
        @else 
            <a class="nav-link align-middle fs-5" href="/" >{{__('messages.homepage')}}</a>
        @endif

          
        </li>

        <li class="nav-item d-flex align-items-center">

       
        @if (request()->is('dashboard*')) 
        <a class="nav-link active align-middle fs-5" aria-current="page" href="/dashboard">{{__('messages.dashboard')}}</a>
        @else 
        <a class="nav-link align-middle fs-5" href="/dashboard" >{{__('messages.dashboard')}}</a>
        @endif

          
        </li>

        <li class="nav-item d-flex align-items-center">
        @if (request()->is('resources*')) 
        <a class="nav-link active align-middle fs-5" aria-current="page" href="/resources">{{__('messages.resourcehub')}}</a>  
        @else
        <a class="nav-link align- fs-5" href="/resources/">{{__('messages.resourcehub')}}</a>
        @endif
        </li>
        
        @role('cdps-admin|super-admin')
        <li class="nav-item d-flex align-items-center">
        @if (request()->is('manage*')) 
        <a class="nav-link active align-middle fs-5" aria-current="page" href="/manage">{{__('messages.manage')}}</a>
        @else
        <a class="nav-link align-middle fs-5" href="/manage/">{{__('messages.manage')}}</a>
        @endif
        </li>
        @endrole
        @endauth
      </ul>
      
     

    </div>
  </div>
</nav>
