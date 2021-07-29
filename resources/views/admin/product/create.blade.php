@extends('admin.dashboard')


@section('content')


<section>
<h1>Create New Product</h1>
<form action="/admin/dashboard/product/create" method="post" enctype="multipart/form-data">
    @csrf

   
    
    <div class="mb-3">
      <label for="title" class="form-label">Enter Product Title</label>
      <input type="text" name="title" class="form-control" id="title" placeholder="title">

      @error('title')
      <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
         {{ $message }}
        </div>
      </div>
      @enderror


      
    
    </div>
    
    <div class="mb-3">
      <label for="description" class="form-label">Enter Description</label>
      <input  class="form-control" name="description" id="description" placeholder="description">
    
      @error('description')
      <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
         {{ $message }}
        </div>
      </div>
      @enderror

    </div>
    
    <div class="mb-3">
      <label for="price" class="form-label">Enter Price</label>
      <input  class="form-control" name="price" id="price" placeholder="price">
     
      @error('price')
      <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
         {{ $message }}
        </div>
      </div>
      @enderror
    </div>


    <div class="form-group col-md-4 mb-3">
        <label for="inputState">Category</label>
        <select name="category_id" id="inputState" class="form-control">
          <option selected disabled>Choose...</option>
          @foreach ($categories as $c)
          <option  value="{{ $c->id }}">{{ $c->name }}</option>
          @endforeach
        </select>
    </div>

    @error('category_id')
    <div class="alert alert-danger d-flex align-items-center" role="alert">
      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
      <div>
       {{ $message }}
      </div>
    </div>
    @enderror
  </div>




    <div class="mb-3">
   
       {{-- <img src="{{ $product->image }}" width="40" height="40" alt="" style="margin: 1rem;"> --}}

      <input type="file" class="form-control" name="image">
      <div class="form-text">image must be type of (png,jpg,or jpeg).</div>
     
      @error('image')
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