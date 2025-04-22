@extends("layouts.layout")
@section("content")
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Admin Sign Up</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{route("registerAdmin")}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name"  value="{{ old('name') }}">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email"  value="{{ old('email') }}">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Avatar</label>
                    <input type="file" class="form-control" id="image" name="image"  value="{{ old('image') }}">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" >
                </div>

                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>
        </div>
    </div>
</div>
@endsection