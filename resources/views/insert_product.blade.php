@extends('layout.main');

@section('section')
<form method="POST"  action="{{Route('admin.insertproduct')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleFormControlFile1">Image</label>
      <input type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Product Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Description</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="description">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Price</label>
        <input type="number" class="form-control" id="exampleFormControlInput1" name="price">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Product Name</label>
        <input type="number" class="form-control" id="exampleFormControlInput1" name="product_quantity">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Category Name</label>
        <select class="form-control" id="exampleFormControlSelect1" name="product_type">
        {{-- foreach product type --}}
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
