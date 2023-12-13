
    
<nav class="navbar navbar-expand-lg bg-body-tertiary p-1" data-bs-theme="dark" style="padding: 0;">
  <div class="container-fluid col-md-10"  >
    <a class="navbar-brand text-white" href="/" >Service Assessment Tool</a>
  
      
      <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
        
      </ul>
      
      @auth
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger">Logout</button>
        </form>
     
      @else
        <a href="/login" class="btn btn-primary">Login</a>
      @endauth



                <a href="{{ route('setLang', ['redirect' => Request::path()]) }}" class="btn btn-primary">Set lang</a>

        

    </div>
  </div>
</nav>
