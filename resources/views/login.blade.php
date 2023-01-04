@extends('layout.main')

@section('section')
    <div class="row justify-content-center my-3">
        <div class="col-md-8">
            <main class="w-75 m-auto">
                <h1 class="mb-3 fw-normal text-center">Login Form</h1>

                <form action="/login" method="POST">
                    @csrf
                    <p>Email: </p> <input type="email" name="email" value="" class="form-control p-0 fs-2">
                    @foreach ($errors->get('email') as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                    <p>Password: </p> <input type="password" name="password" value="" class="form-control p-0 fs-2">
                    @foreach ($errors->get('password') as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                    <div class="w-50 m-auto text-center mt-3">
                        <input type="submit" value="Login" class="text-center btn btn-lg btn-primary">
                    </div>

                </form>
                <small class="d-block text-center mt-3">Doesn't Have An Account? <a href="/register"> Registered</a></small>
                @if ($errors->has('error'))
                    <script>
                        alert('Email or password is wrong');
                    </script>
                @endif
            </main>
        </div>
    </div>
@endsection
