
<form action="{{ route('services.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Service Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input class="form-control" id="description" name="description" rows="3">{{ old('description') }}</input>
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    
    <input type="hidden" name="organisation_id" value="{{ 1 }}">




    <button class="btn btn-primary" type="submit">Create Service</button>


</form>