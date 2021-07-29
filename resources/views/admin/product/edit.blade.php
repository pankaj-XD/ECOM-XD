@extends('admin.dashboard')


@section('content')


<section>

<form action="/admin/dashboard/product" method="post" enctype="multipart/form-data">
    @csrf
    @method("PUT")

    <input type="hidden" value="{{ $product->id }}" name="product_id">
    
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" name="title" class="form-control" id="title" value="{{ $product->title }}">

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
      <label for="description" class="form-label">Discription</label>
      <input  class="form-control" name="description" id="description" value="{{ $product->description }}">
    
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
      <label for="price" class="form-label">Price</label>
      <input  class="form-control" name="price" id="price" value="{{ $product->price }}">
     
      @error('price')
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
      <div class="form-text">if no image was given , it will use old one</div>
     
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