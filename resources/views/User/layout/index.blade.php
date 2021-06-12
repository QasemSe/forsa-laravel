<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<!--begin::Head-->

<head>
    <meta charset="utf-8"/>
    <title>Forsa __ Dashboard</title>
    <meta name="description"
          content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets."/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->

    @if (app()->getlocale() == "en")
        <link href="{{ asset('Backend/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
	    <link href="{{ asset('Backend/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    @else
        <link href="{{ asset('Backend/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>
	    <link href="{{ asset('Backend/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />

    @endif


    <link href="{{ asset('Backend/css/themes/layout/header/base/light.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('Backend/css/themes/layout/header/menu/light.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('Backend/css/themes/layout/brand/dark.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('Backend/css/themes/layout/aside/dark.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Layout Themes-->

    <link href="{{ asset('Backend/plugins/toaster/toastr.css')}}" rel="stylesheet" type="text/css"/>

    <link rel="shortcut icon" href="{{ asset('Backend/img/logo.png') }}" />
    <link href="{{ asset('Backend/css/style.css')}}" rel="stylesheet" type="text/css"/>

    @yield('style')
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
      class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!--begin::Main-->
<!--begin::Header Mobile-->
<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
    <!--begin::Logo-->
    <a href="{{ route('me.dashboard') }}">
        <img alt="Logo" src="{{ asset('Backend/img/logo.png')}}" height="30"/>
    </a>
    <!--end::Logo-->
    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">
        <!--begin::Aside Mobile Toggle-->
        <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
            <span></span>
        </button>
        <!--end::Aside Mobile Toggle-->
        <!--begin::Header Menu Mobile Toggle-->
        <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
            <span></span>
        </button>
        <!--end::Header Menu Mobile Toggle-->
        <!--begin::Topbar Mobile Toggle-->
        <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
				<span class="svg-icon svg-icon-xl">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                         height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<polygon points="0 0 24 0 24 24 0 24"/>
							<path
                                d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                fill="#000000" fill-rule="nonzero" opacity="0.3"/>
							<path
                                d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                fill="#000000" fill-rule="nonzero"/>
						</g>
					</svg>
                    <!--end::Svg Icon-->
				</span>
        </button>
        <!--end::Topbar Mobile Toggle-->
    </div>
    <!--end::Toolbar-->
</div>
<!--end::Header Mobile-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Aside-->
        <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
            <!--begin::Brand-->
            <div class="brand flex-column-auto" id="kt_brand">
                <!--begin::Logo-->
                <a href="{{ route('me.dashboard') }}" class="brand-logo">
                    <img alt="Logo" width="75px" height="45px" src="{{ asset('Backend/img/logo.png')}}"/>
                </a>
                <!--end::Logo-->
                <!--begin::Toggle-->
                <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
						<span class="svg-icon svg-icon svg-icon-xl">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<polygon points="0 0 24 0 24 24 0 24"/>
									<path
                                        d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                        fill="#000000" fill-rule="nonzero"
                                        transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)"/>
									<path
                                        d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3"
                                        transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)"/>
								</g>
							</svg>
						</span>
                </button>
                <!--end::Toolbar-->
            </div>
            <!--end::Brand-->
            <!--begin::Aside Menu-->
            <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
                <!--begin::Menu Container-->
                <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
                     data-menu-dropdown-timeout="500">
                    <!--begin::Menu Nav-->
                    <ul class="menu-nav">


                        <li class="menu-item {{ Request::routeIs('me.post.index') ? 'menu-item-active' : ''}}" aria-haspopup="true">
                            <a href="{{ route('me.post.index') }}" class="menu-link">
									<span class="svg-icon menu-icon"><i class="fa fa-paper-plane"></i></span>
                                <span class="menu-text">{{ t('Home Page') }}</span>
                            </a>
                        </li>

                        <li class="menu-item {{ Request::routeIs('me.dashboard') ? 'menu-item-active' : ''}}" aria-haspopup="true">
                            <a href="{{ route('me.dashboard') }}" class="menu-link">
									<span class="svg-icon menu-icon"><i class="fa fa-tachometer-alt"></i></span>
                                <span class="menu-text">{{ t('Archive') }}</span>
                            </a>
                        </li>






                        <li class="menu-item {{ Request::routeIs('me.applicant.index') ? 'menu-item-active' : ''}}" aria-haspopup="true">
                            <a href="{{ route('me.applicant.index') }}" class="menu-link">
									<span class="svg-icon menu-icon"><i class="fa fa-cart-arrow-down"></i></span>
                                <span class="menu-text">{{ t('Applicants') }}</span>
                            </a>
                        </li>






                    </ul>
                    <!--end::Menu Nav-->
                </div>
                <!--end::Menu Container-->
            </div>
            <!--end::Aside Menu-->
        </div>
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" class="header header-fixed">

                <!--begin::Container-->
                <div class="container-fluid d-flex align-items-stretch justify-content-between">
                    <div></div>
                    <!--begin::Topbar-->
                    <div class="topbar">
                        <div class="dropdown">
                            @php
                                $applicants = App\Models\Applicant::orderBy('created_at','desc')->where('user_id',Auth::user()->id)->where('status','accepted')->get();
                            @endphp
                            <!--begin::Toggle-->
                            <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px" aria-expanded="false">
                                <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-primary">
                                    <strong class="text-danger p-1"> {{ isset($applicants) ? $applicants->count() : '' }} </strong>
                                    <i class="fa fa-bell  text-primary"></i>
                                    <span class="pulse-ring"></span>
                                </div>
                            </div>
                            <!--end::Toggle-->
                            <!--begin::Dropdown-->
                            <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg" style="">
                                <form>
                                    <!--begin::Header-->
                                    <div class="d-flex flex-column pt-12 bgi-size-cover bgi-no-repeat rounded-top p-4" style="background-color: #239c64">
                                        <!--begin::Title-->
                                        <h4 class="d-flex flex-center rounded-top p-3">
                                            <span class="text-white">{{ t('Accepted Applicants') }}</span>
                                        </h4>
                                        <!--end::Title-->
                                        <!--begin::Tabs-->

                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Content-->
                                    <div class="tab-content">
                                        <!--begin::Tabpane-->
                                        <div class="tab-pane active show p-8" id="topbar_notifications_notifications" role="tabpanel">
                                            <!--begin::Scroll-->
                                            <div class="scroll pr-7 mr-n7 ps ps--active-y" data-scroll="true" data-height="300" data-mobile-height="200" style="height: 300px; overflow: hidden;">
                                                <!--begin::Item-->
                                                @if (isset($applicants) && $applicants->count() > 0)
                                                    @foreach ($applicants as $applicant)
                                                        <div class="d-flex align-items-center mb-6">
                                                            <!--begin::Symbol-->
                                                            <div class="symbol symbol-40 symbol-light-primary mr-5">
                                                                <span class="symbol-label">
                                                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                                                        <img width="40px" height="40px" src="{{ $applicant->post->company ? $applicant->post->company->profile_image : '' }}" alt="">
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <!--end::Symbol-->
                                                            <!--begin::Text-->
                                                            <div class="d-flex flex-column font-weight-bold">

                                                                <a href="{{ route('me.applicant.show',$applicant->id) }}" class="text-dark text-hover-primary mb-1 font-size-lg">
                                                                    {{ $applicant->post->company_name }}
                                                                </a>

                                                                <span class="text-muted">{{ $applicant->post_title }}</span>
                                                            </div>
                                                            <!--end::Text-->
                                                        </div>
                                                    @endforeach
                                                @endif


                                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px; height: 300px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 205px;"></div></div></div>
                                        </div>

                                    </div>
                                    <!--end::Content-->
                                </form>
                            </div>
                            <!--end::Dropdown-->
                        </div>


                        <!--end::Chat-->
                        <!--begin::Languages-->
                        <div class="dropdown">
                            <!--begin::Toggle-->
                            <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                                <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                                    <img class="h-20px w-20px rounded-sm"
                                         src="{{ t('flagImg') }}" alt=""/>
                                </div>
                            </div>
                            <!--end::Toggle-->
                            <!--begin::Dropdown-->
                            <div
                                class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                                <!--begin::Nav-->
                                <ul class="navi navi-hover py-4">
                                    <!--begin::Item-->
                                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        @if ($properties['native'] == 'English')
                                            <li class="navi-item">
                                                <a  hreflang="{{ $localeCode }}"  href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="navi-link">
                                                        <span class="symbol symbol-20 mr-3">
                                                            <img src="{{ asset('Backend/media/flags/united-states.svg') }}" alt="{{ $properties['native'] }}">
                                                        </span>
                                                    <span class="navi-text">{{ $properties['native'] }}</span>
                                                </a>
                                            </li>
                                        @else
                                            <li class="navi-item">
                                                <a  hreflang="{{ $localeCode }}"  href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="navi-link">
                                                        <span class="symbol symbol-20 mr-3">
                                                            <img src="{{ asset('Backend/media/flags/saudi-arabia.svg') }}" alt="{{ $properties['native'] }}">
                                                        </span>
                                                    <span class="navi-text">{{ $properties['native'] }}</span>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                                <!--end::Nav-->
                            </div>
                            <!--end::Dropdown-->
                        </div>
                        <!--end::Languages-->
                        <!--begin::User-->
                        <div class="topbar-item">
                            <div
                                class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"
                                id="kt_quick_user_toggle">
                                <span
                                    class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ Auth::user()->name }}</span>
                                <span class="symbol symbol-lg-35 symbol-25 symbol-light-primary">
										<span
                                         class="symbol-label font-size-h5 font-weight-bold">{{ substr(Auth::user()->name,0,1) }}</span>
									</span>
                            </div>
                        </div>
                        <!--end::User-->
                    </div>
                    <!--end::Topbar-->
                </div>
                <!--end::Container-->
            </div>


            <!--end::Header-->
            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                @yield('content')
            </div>
            <!--end::Content-->
            <!--begin::Footer-->


        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Main-->
<!-- begin::User Panel-->
<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
        <h3 class="font-weight-bold m-0">{{ t('User Profile') }}
        </h3>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <!--end::Header-->
    <!--begin::Content-->
    <div class="offcanvas-content pr-5 mr-n5">
        <!--begin::Header-->
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-100 mr-5">
                <div class="symbol-label"
                     style="background-image:url('{{ Auth::user()->image}}')"></div>
                <i class="symbol-badge bg-success"></i>
            </div>
            <div class="d-flex flex-column">
                <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{ Auth::user()->name }}</a>
                <div class="navi mt-2">
                    <a href="#" class="navi-item">
							<span class="navi-link p-0 pb-2">
								<span class="navi-icon mr-1">
									<span class="svg-icon svg-icon-lg svg-icon-primary">
										<svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                             viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24"/>
												<path
                                                    d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"
                                                    fill="#000000"/>
												<circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5"/>
											</g>
										</svg>
                                        <!--end::Svg Icon-->
									</span>
								</span>
								<span class="navi-text text-muted text-hover-primary">{{ Auth::user()->email }}</span>
							</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">{{ t('Sign Out') }}</button>
                    </form>
                </div>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Separator-->
        <div class="separator separator-dashed mt-8 mb-5"></div>
        <!--end::Separator-->
        <!--begin::Nav-->
        <div class="navi navi-spacer-x-0 p-0">
            <!--begin::Item-->
            <a href="{{ route('me.profile') }}" class="navi-item">
                <div class="navi-link">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
								<span class="svg-icon svg-icon-md svg-icon-success">
                                    <i class="fa fa-user-shield"></i>
								</span>
                        </div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">{{ t('My Profile') }}</div>
                    </div>
                </div>
            </a>


        </div>

    </div>
    <!--end::Content-->
</div>

<!--end::Chat Panel-->
<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop">
		<span class="svg-icon">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                 height="24px" viewBox="0 0 24 24" version="1.1">
				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					<polygon points="0 0 24 0 24 24 0 24"/>
					<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1"/>
					<path
                        d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                        fill="#000000" fill-rule="nonzero"/>
				</g>
			</svg>
            <!--end::Svg Icon-->
		</span>
</div>

<!--end::Demo Panel-->
<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = {"breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400},
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#3699FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#E4E6EF",
                    "dark": "#181C32"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1F0FF",
                    "secondary": "#EBEDF3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#3F4254",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#EBEDF3",
                "gray-300": "#E4E6EF",
                "gray-400": "#D1D3E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#7E8299",
                "gray-700": "#5E6278",
                "gray-800": "#3F4254",
                "gray-900": "#181C32"
            }
        },
        "font-family": "Poppins"
    };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ asset('Backend/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{ asset('Backend/js/scripts.bundle.js')}}"></script>
<script src="{{ asset('Backend/plugins/toaster/toastr.js')}}"></script>
<script src="{{ asset('Backend/js/select2.js')}}"></script>

<script>
     $(document).ready(function () {
            $('.select2').select2();
        });
</script>
<script>
    $('table').on('draw.dt', function() {
        $('[data-toggle="tooltip"]').tooltip({
             trigger: "hover"
        });
    })
</script>
@if (app()->getlocale() =="ar")
    <script>
        toastr.options = {
            "closeButton" : true,
            "debug" : false,
            "newestOnTop" : true,
            "progressBar" : true,
            "positionClass" : "toast-top-left",
            "preventDuplicates" : false,
            "onclick" : null,
            "showDuration" : "500",
            "hideDuration" : "1800",
            "timeOut" : "5000",
            'rtl'   : true,
            "extendedTimeOut" : "1800",
            "showEasing" : "swing",
            "hideEasing" : "linear",
            "showMethod" : "fadeIn",
            "hideMethod" : "fadeOut"
        }
    </script>
@else
    <script>
        toastr.options = {
            "closeButton" : true,
            "debug" : false,
            "newestOnTop" : true,
            "progressBar" : true,
            "positionClass" : "toast-top-right",
            "preventDuplicates" : false,
            "onclick" : null,
            "showDuration" : "500",
            "hideDuration" : "1800",
            "timeOut" : "5000",
            'rtl'   : false,
            "extendedTimeOut" : "1800",
            "showEasing" : "swing",
            "hideEasing" : "linear",
            "showMethod" : "fadeIn",
            "hideMethod" : "fadeOut"
        }
    </script>

@endif


{!! Toastr::message() !!}

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>


<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview2').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview2').hide();
                $('#imagePreview2').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imageUpload").change(function () {
        readURL(this);
    });

    $("#imageUpload2").change(function () {
        readURL2(this);
    });


</script>

@stack('scripts')


<!--end::Page Scripts-->
</body>
<!--end::Body-->

</html>
