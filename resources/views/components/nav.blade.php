
    
<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark" style="padding: 0; margin-bottom: 20px;">
  <div class="container-fluid col-md-10"  >
    <a class="navbar-brand text-white" href="/" >Service Assessment Tool</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
        <li class="nav-item">

        @auth
        @if (request()->is('/')) 
            <a class="nav-link active text-white" aria-current="page" href="/"><b>Home</b></a>
        @else 
            <a class="nav-link text-white" href="/" >Home</a>
        @endif

          
        </li>

        <li class="nav-item">
        @if (request()->is('resources*')) 
            <a class="nav-link active text-white" aria-current="page" href="/resources">Resources</a>  
        @else
          <a class="nav-link text-white" href="/resources/">Resources</a>
        @endif
        </li>
        
        @endauth
      </ul>
      
      @auth
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger">Logout</button>
        </form>
     
      @else
        <a href="/login" class="btn btn-primary">Login</a>
      @endauth

      <form action="{{ route('setLang') }}" method="POST">
                  @csrf
                  
                  @method('PUT')
                    <input type="hidden" name="lang" value="en">
                  <button type="submit" class="btn btn-primary">Set lang</button>
                </form>

    </div>
  </div>
</nav>
