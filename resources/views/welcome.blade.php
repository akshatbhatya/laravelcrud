@extends("layouts.layout")
@section("content")

  
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <h1 class="display-4 fw-bold mb-3">
                👋 Welcome to <span class="text-primary">BuildRight</span>
            </h1>
            <p class="lead mb-4">
                Your one‑stop platform for expert construction tips, project management
                resources, and professional services. Whether you’re renovating a
                kitchen or managing a commercial build, we’re here to make it smooth
                and successful.
            </p>

            <a href="" class="btn btn-primary btn-lg me-2">
                Explore Our Services
            </a>
            <a href="" class="btn btn-outline-primary btn-lg">
                Get in Touch
            </a>
        </div>
    </div>

    {{-- optional feature highlights --}}
    <div class="row text-center mt-5 g-4">
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <i class="bi bi-hammer fs-1 mb-3"></i>
                    <h5 class="card-title fw-semibold">Expert Advice</h5>
                    <p class="card-text">
                        Step‑by‑step guides, industry insights, and best practices from
                        seasoned professionals.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <i class="bi bi-people fs-1 mb-3"></i>
                    <h5 class="card-title fw-semibold">Trusted Pros</h5>
                    <p class="card-text">
                        Connect with vetted contractors and suppliers to keep your
                        project on schedule and on budget.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <i class="bi bi-speedometer2 fs-1 mb-3"></i>
                    <h5 class="card-title fw-semibold">Fast Estimates</h5>
                    <p class="card-text">
                        Use our built‑in calculators to get quick, accurate cost
                        projections before you break ground.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection