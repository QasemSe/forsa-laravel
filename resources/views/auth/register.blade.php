
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
	<!--begin::Head-->
	<head><base href="../../../../">
		<meta charset="utf-8" />
		<title>{{ t('Users Register') }}</title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="{{ asset('Backend/css/login-3.css')}}" rel="stylesheet" type="text/css" />


        @if (app()->getlocale() == "en")
            <link href="{{ asset('Backend/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
            <link href="{{ asset('Backend/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
        @else
            <link href="{{ asset('Backend/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>
            <link href="{{ asset('Backend/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
        @endif
		<link rel="shortcut icon" href="{{ asset('Backend/media/logos/favicon.ico')}}" />
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-3 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url({{ asset('Backend/media/bg/bg-1.jpg') }});">
					<div class="login-form text-center text-white p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-15">
							<a href="#">
								<img src="{{ asset('Backend/img/logo.png') }}" class="max-h-100px" alt="" />
							</a>
						</div>
						<!--end::Login Header-->
						<!--begin::Login Sign in form-->
						<div class="login-signin">
							<div class="mb-20">
								<h3>{{ t('Users Register') }}</h3>
							</div>
							<form class="form" action="{{ route('register') }}" method="POST">
                                @csrf
                                @include('Manager.layout.notification')
								<div class="form-group">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5"
                                     type="text" placeholder="{{ t('Full Name') }}" name="name" autocomplete="off" />
								</div>
                                <div class="form-group">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5"
                                     type="email" placeholder="{{ t('Email') }}" name="email" autocomplete="off" />
								</div>
								<div class="form-group">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5"
                                     type="password" placeholder="{{ t('Password') }}" name="password" />
								</div>
                                <div class="form-group">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5"
                                     type="password" placeholder="{{ t('Confirm Password') }}" name="password_confirmation" />
								</div>

								<div class="form-group text-center mt-10">
									<button type="submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3">{{ t('Register') }}</button>
								</div>
							</form>
							<div class="mt-10">
								<span class="opacity-70 mr-4">{{ t("I have an account") }}</span>
								<a href="{{ route('login') }}" i class="text-white font-weight-bold">{{ t('Sign In') }}</a>
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
