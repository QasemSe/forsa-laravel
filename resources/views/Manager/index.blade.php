
@extends('Manager.layout.index')
@section('content')

    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="row">
                <div class="col-xl-3">
                    <!--begin::Stats Widget 29-->
                    <div class="card card-custom   card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-info">
                                <i class="fa fa-graduation-cap fa-3x"></i>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{ isset($degrees) ? $degrees->count() : 0 }}</span>
                            <span class="font-weight-bold text-muted font-size-sm">{{ t('Degrees') }}</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 29-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Stats Widget 30-->
                    <div class="card card-custom  bg-info card-stretch gutter-b" >
                        <!--begin::Body-->
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-white">
                                <i class="fa fa-thumbtack fa-3x text-white"></i>
                            </span>
                            <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{ isset($specializes) ? $specializes->count() : 0 }}</span>
                            <span class="font-weight-bold text-white font-size-sm">{{ t('Specializes') }}</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 30-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Stats Widget 31-->
                    <div class="card card-custom bg-danger card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-white">
                                <i class="fa fa-university text-white fa-3x"></i>
                            </span>
                            <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{ isset($universities) ? $universities->count() : 0 }}</span>
                            <span class="font-weight-bold text-white font-size-sm">{{ t('Universities') }}</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 31-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Stats Widget 32-->
                    <div class="card card-custom bg-dark card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-white">
                                <i class="fa fa-tags text-white fa-3x"></i>

                            </span>
                            <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 text-hover-primary d-block">{{ isset($skills) ? $skills->count() : 0 }}</span>
                            <span class="font-weight-bold text-white font-size-sm">{{ t('Skills') }}</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 32-->
                </div>
            </div>


            <div class="row">
                <div class="col-xl-3">
                    <!--begin::Stats Widget 29-->
                    <div class="card card-custom   card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-info">
                                <i class="fa fa-users  fa-3x"></i>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{ isset($users) ? $users->count() : 0 }}</span>
                            <span class="font-weight-bold text-muted font-size-sm">{{ t('Users') }}</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 29-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Stats Widget 30-->
                    <div class="card card-custom  bg-info card-stretch gutter-b" >
                        <!--begin::Body-->
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-white">
                                <i class="fa fa-building text-white fa-3x"></i>
                            </span>
                            <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{ isset($companies) ? $companies->count() : 0 }}</span>
                            <span class="font-weight-bold text-white font-size-sm">{{ t('Companies') }}</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 30-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Stats Widget 31-->
                    <div class="card card-custom bg-danger card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-white">
                                <i class="fa fa-paper-plane text-white fa-3x"></i>
                            </span>
                            <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{ isset($posts) ? $posts->count() : 0 }}</span>
                            <span class="font-weight-bold text-white font-size-sm">{{ t('Posts') }}</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 31-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Stats Widget 32-->
                    <div class="card card-custom bg-dark card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-white">
                                <i class="fa fa-cart-arrow-down text-white fa-3x"></i>
                            </span>
                            <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 text-hover-primary d-block">{{ isset($applicants) ? $applicants->count() : 0 }}</span>
                            <span class="font-weight-bold text-white font-size-sm">{{ t('Applicants') }}</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 32-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection
