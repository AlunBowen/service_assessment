<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Service Assessment Tool</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">

        
        @if (request()->is('/')) 
            <a class="nav-link active" aria-current="page" href="/"><b>Home</b></a>
        @else 
            <a class="nav-link" href="/">Home</a>
        @endif

          
        </li>

        <li class="nav-item">
        @if (request()->is('resources*')) 
            <a class="nav-link active" aria-current="page" href="/resources">Resources</a>  
        @else
          <a class="nav-link" href="/resources/">Resources</a>
        @endif
        </li>
        
        
      </ul>
      
    </div>
  </div>
</nav>