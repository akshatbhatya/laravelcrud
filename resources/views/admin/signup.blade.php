@extends('layouts.layout')

@section('content')
<div class="d-flex align-items-center justify-content-center min-vh-100 bg-light">
    <div class="card shadow-lg border-0 rounded-4 p-4 p-lg-5" style="max-width: 500px; width: 100%;">
        <div class="text-center mb-4">
            <i class="bi bi-person-plus-fill fs-1 text-primary"></i>
            <h1 class="h3 fw-bold mt-2">Admin Sign Up</h1>
            <p class="text-muted small mb-0">Create an admin account to manage the platform.</p>
        </div>

        {{-- Validation errors --}}
        @if ($errors->any())
            <div class="alert alert-danger rounded-3">
                <ul class="mb-0 small">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('registerAdmin') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf

            {{-- Name --}}
            <div class="form-floating mb-3">
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control @error('name') is-invalid @enderror"
                    placeholder="Full Name"
                    value="{{ old('name') }}"
                    required
                >
                <label for="name">Full Name</label>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Email --}}
            <div class="form-floating mb-3">
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control @error('email') is-invalid @enderror"
                    placeholder="name@example.com"
                    value="{{ old('email') }}"
                    required
                >
                <label for="email">Email address</label>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Avatar --}}
            <div class="mb-3">
                <label for="image" class="form-label fw-semibold">Avatar (optional)</label>
                <input
                    type="file"
                    name="image"
                    id="image"
                    class="form-control @error('image') is-invalid @enderror"
                    accept="image/*"
                >
                @error('image')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            {{-- Password --}}
            <div class="form-floating mb-4">
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control @error('password') is-invalid @enderror"
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
                <i class="bi bi-person-check me-1"></i> Register
            </button>
        </form>
    </div>
</div>
@endsection
