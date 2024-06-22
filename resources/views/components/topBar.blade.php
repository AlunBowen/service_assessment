
    
<nav class="navbar navbar-expand-lg bg-body-tertiary p-1" data-bs-theme="dark" style="padding: 0;">
  <div class="container-fluid col-md-10"  >
    <!-- @if(auth()->user())
    <a class="navbar-brand text-white" href="/" >{{ auth()->user()->getRoleNames() }}</a>
  
    @endif -->
    @if (Cookie::get('lang') == 'en')
    <a class="navbar-brand text-white fs-4" href="/" >{{ __('messages.product')}}</a>
    @endif
    @if (Cookie::get('lang') == 'cym')
    <a class="navbar-brand text-white fs-4" href="/" >{{ __('messages.product')}}</a>
    @endif
      
      <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
        
      </ul>
      
      @auth
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger">{{ __('messages.logout')}}</button>
        </form>
     
      @else
        <a href="/login" class="btn btn-primary">{{ __('messages.login')}}</a>
      @endauth



                <a href="{{ route('setLang', ['redirect' => Request::path()]) }}" class="btn btn-dark">{{ __('messages.language')}}</a>

        

    </div>
  </div>
</nav>
