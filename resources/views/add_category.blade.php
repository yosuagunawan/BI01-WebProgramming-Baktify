@extends('layout.main')

@section('section')
    <form method="POST" action="{{ Route('admin.addcategory') }}" enctype="multipart/form-data">
        @csrf
        <div class="d-flex">
            @foreach ($product_types as $x)
                <h6 class="bg-danger-subtle rounded-2 m-auto p-2">{{ $x->type_name }}</h6>
            @endforeach
        </div>
        <h3 class="my-3">Add New Category</h3>
        <div class="form-group d-flex mb-3">
            <label for="exampleFormControlInput1">Category Name</label>
            <input type="text" class="form-control w-50 m-auto" id="exampleFormControlInput1" name="type_name">
        </div>
        @if ($errors->any())
            <div class="error-message">
                {{ $errors->first() }}
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
