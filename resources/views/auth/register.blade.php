@extends('layouts.app')

@section('content')
<!-- Login 5 - Bootstrap Brain Component -->
<section class="p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="card border-light-subtle shadow-sm">
            <div class="row g-0">
                <div class="col-12 col-md-6 text-bg-primary">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <div class="col-10 col-xl-8 py-3">

                            <h2 class="h1 mb-4">Welcome.</h2>
                            <hr class="border-primary-subtle mb-4">
                            <p class="lead m-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor est eos fugit autem debitis, illum excepturi accusamus necessitatibus .</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card-body p-3 p-md-4 p-xl-5">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-5">
                                    <h3>Log in</h3>
                                </div>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row gy-3 gy-md-4 overflow-hidden">
                            <div class="col-12">
                                    <label for="name" class="form-label">{{ __('Name') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                                    @error('name')
                                    <div class="invalid-feedback d-block">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">{{ __('Email Address') }} <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                                    @error('email')
                                    <div class="invalid-feedback d-block">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="password" class="form-label">{{ __('Password') }} <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="password" id="password"  required>
                                    @error('password')
                                    <div class="invalid-feedback d-block">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password-confirm" required>
                                    @error('password_confirmation')
                                    <div class="invalid-feedback d-block">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn bsb-btn-xl btn-primary" type="submit">{{ __('Register') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-12">
                                <hr class="mt-5 mb-4 border-secondary-subtle">
                                <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                                @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="text-primary">{{ __('Already have an account?') }}</a>
                            @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection