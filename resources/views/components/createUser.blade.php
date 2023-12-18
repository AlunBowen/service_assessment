
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" type="text" name="name" id="name" value="{{old('name')}}">
       
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" type="email" name="email" id="email" value="{{old('email')}}">
       
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" type="password" name="password" id="password">
    </div>
    @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
    </div>
    @error('password_confirmation')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    
    <input type="hidden" name="organisation_id" value="{{ $organisation->id }}">



    <button class="btn btn-primary" type="submit">Create User</button>


</form>