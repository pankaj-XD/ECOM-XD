@extends('admin.dashboard')


@section('content')


<section>

    <h1>EDIT Category</h1>

<form action="/admin/dashboard/category" method="post">
    @csrf
    @method("PUT")

    <input type="hidden" value="{{ $category->id }}" name="categroy_id">
    
    <div class="mb-3">
      <label for="title" class="form-label">Enter Category Name:</label>
      <input type="text" name="name" class="form-control" id="title" value="{{ $category->name }}">

      @error('name')
      <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
         {{ $message }}
        </div>
      </div>
      @enderror
  
    
    </div>
    

    <button type="submit" class="btn btn-primary">Update</button>
  </form>


  
</section>

@endsection