@extends('admin.dashboard')


@section('content')


<section>

<form action="/admin/dashboard/category" method="post">
    @csrf

    <div class="mb-3">
      <label for="title" class="form-label"><h1>Create Category</h1></label>
      <input type="text" name="name" class="form-control" id="title" placeholder="Enter Category Name" >

      @error('name')
      <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
         {{ $message }}
        </div>
      </div>
      @enderror
  
    
    </div>
    

    <button type="submit" class="btn btn-primary">Create</button>
  </form>


  
</section>

@endsection