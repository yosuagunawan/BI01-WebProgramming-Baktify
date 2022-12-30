@extends('layout.main')

@section('section')
<form method="POST"  action="{{Route('admin.addcategory')}}" enctype="multipart/form-data">
    @csrf
    <h1>Add New Category</h1>
    @foreach ($product_types as $x)
        <div class="">
            <h2>{{$x->type_name}}</h2>
        </div>
    @endforeach
    <div class="form-group">
        <label for="exampleFormControlInput1">Category Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="type_name">
    </div>
    @if ($errors->any())
        <div class="error-message">
            {{$errors->first()}}
        </div>
    @endif
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
