@extends('layouts.layout')

@section('content')
<div class="d-flex align-items-center justify-content-center min-vh-100 bg-light">
    <div class="card shadow-lg border-0 rounded-4 p-4 p-lg-5" style="max-width: 420px; width: 100%;">
        <div class="text-center mb-4">
            <i class="bi bi-shield-lock-fill fs-1 text-primary"></i>
            <h1 class="h3 fw-bold mt-2">Sign in to your account</h1>
            <p class="text-muted small mb-0">Welcome back! Please enter your details.</p>
        </div>

        <form action="{{ route('login') }}" method="POST" class="needs-validation" novalidate>
            @csrf

            {{-- Email --}}
            <div class="form-floating mb-3">
                <input
                    type="email"
                    name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    id="email"
                    placeholder="name@example.com"
                    value="{{ old('email') }}"
                    required
                >
                <label for="email">Email address</label>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Password --}}
            <div class="form-floating mb-3">
                <input
                    type="password"
                    name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    id="password"
                    placeholder="Password"
                    required
                    minlength="6"
                >
                <label for="password">Password</label>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            {{-- Submit --}}
            <button class="btn btn-primary w-100 py-2" type="submit">
                <i class="bi bi-box-arrow-in-right me-1"></i> Sign In
            </button>
        </form>

        <hr class="my-4">

        <p class="text-center small mb-0">
            Don’t have an account?
            <a href="{{route("adminsignup")}}" class="fw-semibold text-primary text-decoration-none">
                Create one
            </a>
        </p>
    </div>
</div>
@endsection
