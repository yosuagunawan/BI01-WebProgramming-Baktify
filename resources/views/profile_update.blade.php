@extends('layout.main')

@section('section')
    <div class="row justify-content-center my-3">
        <div class="col-md-8">
            <main class="w-75 m-auto">
                <h1 class="mb-3 fw-normal text-center">Update Profile</h1>

                <form action="/profile_update" method="POST">
                    @csrf
                    <p>Name: </p> <input type="text" name="name" value="" class="form-control p-0 fs-2">
                    @foreach ($errors->get('name') as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                    <p>Email: </p> <input type="email" name="email" value="" class="form-control p-0 fs-2">
                    @foreach ($errors->get('email') as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                    <p>Password: </p> <input type="password" name="password" value="" class="form-control p-0 fs-2">
                    @foreach ($errors->get('password') as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                    <p>Password Confirmation: </p> <input type="password" name="password_confirmation" value=""
                        class="form-control p-0 fs-2">
                    @foreach ($errors->get('password_confirmation') as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                    <p>Address: </p> <input type="text" name="address" value="" class="form-control p-0 fs-2">
                    @foreach ($errors->get('address') as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                    <p>Phone: </p> <input type="number" name="phone" value="" class="form-control p-0 fs-2">
                    @foreach ($errors->get('phone') as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                    <div class="w-50 m-auto text-center mt-3">
                        <input type="submit" value="Update" class="btn btn-lg btn-primary">
                    </div>
                </form>
            </main>
        </div>
    </div>
@endsection
