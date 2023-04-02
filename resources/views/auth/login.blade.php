@extends('layouts.auth2')
@section('title', __('lang_v1.login'))
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }

    .h-custom {
        height: calc(100% - 73px);
    }

    @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
    }
</style>

@section('content')
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <div class="">
                        {{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                            class="img-fluid" alt="Sample image"> --}}
                        <img src="img/log.svg" class="img-fluid" alt="Sample image">
                    </div>
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <div class="">
                        <form method="POST" action="{{ route('login') }}" id="login-form">
                            {{ csrf_field() }}
                            <div class="text-center">
                                <p class="lead fw-normal fs-1 mb-0 me-3 text-light fw-bold">Sign in</p>
                            </div>

                            <div class="divider d-flex align-items-center my-4">
                                <p class="text-center fw-bold mx-3 mb-0 fs-1">o</p>
                            </div>

                            <!-- Username input -->
                            <div class="form-group has-feedback {{ $errors->has('username') ? ' has-error' : '' }}">
                                @php
                                    $username = old('username');
                                    $password = null;
                                    if (config('app.env') == 'demo') {
                                        $username = 'admin';
                                        $password = '123456';
                                    
                                        $demo_types = [
                                            'all_in_one' => 'admin',
                                            'super_market' => 'admin',
                                            'pharmacy' => 'admin-pharmacy',
                                            'electronics' => 'admin-electronics',
                                            'services' => 'admin-services',
                                            'restaurant' => 'admin-restaurant',
                                            'superadmin' => 'superadmin',
                                            'woocommerce' => 'woocommerce_user',
                                            'essentials' => 'admin-essentials',
                                            'manufacturing' => 'manufacturer-demo',
                                        ];
                                    
                                        if (!empty($_GET['demo_type']) && array_key_exists($_GET['demo_type'], $demo_types)) {
                                            $username = $demo_types[$_GET['demo_type']];
                                        }
                                    }
                                @endphp

                                <div class="form-outline mb-4">
                                    <input id="username" type="text" class="form-control rounded-pill" name="username"
                                        value="{{ $username }}" required autofocus placeholder="@lang('lang_v1.username')" />
                                    <label class="form-label text text-light" for="form3Example3">Email address</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-3">
                                    <input id="password" type="password" class="form-control rounded-pill" name="password"
                                        value="{{ $password }}" required placeholder="@lang('lang_v1.password')" />
                                    <label class="form-label text-light" for="form3Example4">Password</label>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <!-- Checkbox -->
                                    <div class="form-check mb-0">
                                        <input class="form-check-input me-2" type="checkbox" value=""
                                            id="form2Example3" />
                                        <label class="form-check-label text-light" for="form2Example3">
                                            Remember me
                                        </label>
                                    </div>
                                    <a href="#!" class="text-body text-light">Forgot password?</a>
                                </div>

                                <div class="text-center text-lg-start mt-4 pt-2 d-grid gap-2  mx-auto">
                                    <button type="submit" class="btn btn-lg rounded-pill text-light"
                                        style="padding-left: 2.5rem; padding-right: 2.5rem; background-color:#20C997">@lang('lang_v1.login')</button>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
