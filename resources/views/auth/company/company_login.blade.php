
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
	<!--begin::Head-->
	<head><base href="../../../../">
		<meta charset="utf-8" />
		<title>{{ t('Company Login') }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

		<link href="{{ asset('Backend/css/login-4.css') }}" rel="stylesheet" type="text/css" />
        @if (app()->getlocale() == "en")
            <link href="{{ asset('Backend/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
                <link href="{{ asset('Backend/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
            @else
                <link href="{{ asset('Backend/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>
                <link href="{{ asset('Backend/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
            @endif
		<link rel="shortcut icon" href="{{ asset('Backend/img/logo.png') }}" />
        <style>
            .error_content{
                font-size: 14px
            }
        </style>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url({{ asset('Backend/media/bg/bg-3.jpg') }});">
					<div class="login-form text-center p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-15">
							<a href="#">
								<img src="{{ asset('Backend/img/logo-2.png') }}" class="max-h-75px" alt="" />
							</a>
						</div>
						<!--end::Login Header-->
						<!--begin::Login Sign in form-->
						<div class="login-signin">
							<div class="mb-20">
								<h3>{{ t('Company Login') }}</h3>
							</div>
							<form class="form" method="POST" action="{{ route('loginCompany') }}">
                                @csrf
                                @include('Manager.layout.notification')

								<div class="form-group mb-5">
									<input class="form-control h-auto form-control-solid py-4 px-8" name="email" type="text" placeholder="{{ t('Email') }}" autocomplete="off" />
								</div>
								<div class="form-group mb-5">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="{{ t('Password') }}" name="password" />
								</div>
								<button id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">{{ t('Sign in') }}</button>
							</form>
							<div class="mt-10">
								<span class="opacity-70 mr-4">{{ t("Dont have an account yet?") }}</span>
								<a href="{{ route('showRegisterCompany') }}" id="kt_login_signup" class="text-muted text-hover-primary font-weight-bold">{{ t('Sign Up!') }}</a>
							</div>
						</div>


					</div>
				</div>
			</div>
			<!--end::Login-->
		</div>



	</body>
	<!--end::Body-->
</html>
