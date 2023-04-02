<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'POS') }}</title>

    @include('layouts.partials.css')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    @inject('request', 'Illuminate\Http\Request')
    @if (session('status'))
        <input type="hidden" id="status_span" data-status="{{ session('status.success') }}"
            data-msg="{{ session('status.msg') }}">
    @endif
    <div class="container-fluid" style="background-color:#8D52F8">
        <div class="row ">
            <div class="container-fluid d-flex justify-content-end">
                <div class="col-md-2 col-xs-5 " style="text-align: left;">
                    <select class="form-control input-sm p-0 fw-bold rounded-pill" id="change_lang" style="margin: 10px;">
                        @foreach (config('constants.langs') as $key => $val)
                            <option value="{{ $key }}" @if ((empty(request()->lang) && config('app.locale') == $key) || request()->lang == $key) selected @endif>
                                {{ $val['full_name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="container">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-9 col-xs-8" style="text-align: right;padding-top: 10px;">
                            @if (!($request->segment(1) == 'business' && $request->segment(2) == 'register'))
                                <!-- Register Url -->
                                @if (config('constants.allow_registration'))
                                    <a href="{{ route('business.getRegister') }}@if (!empty(request()->lang)) {{ '?lang=' . request()->lang }} @endif"
                                        class="btn bg-maroon btn-flat"><b>{{ __('business.not_yet_registered') }}</b>
                                        {{ __('business.register_now') }}</a>
                                    <!-- pricing url -->
                                    @if (Route::has('pricing') && config('app.env') != 'demo' && $request->segment(1) != 'pricing')
                                        &nbsp; <a
                                            href="{{ action('\Modules\Superadmin\Http\Controllers\PricingController@index') }}">@lang('superadmin::lang.pricing')</a>
                                    @endif
                                @endif
                            @endif
                            @if ($request->segment(1) != 'login')
                                &nbsp; &nbsp;<span class="text-white">{{ __('business.already_registered') }} </span><a
                                    href="{{ action('Auth\LoginController@login') }}@if (!empty(request()->lang)) {{ '?lang=' . request()->lang }} @endif">{{ __('business.sign_in') }}</a>
                            @endif
                        </div>


                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>


    @include('layouts.partials.javascripts')

    <!-- Scripts -->
    <script src="{{ asset('js/login.js?v=' . $asset_v) }}"></script>

    @yield('javascript')

    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2_register').select2();

            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

</html>
