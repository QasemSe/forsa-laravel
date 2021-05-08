@extends('Company.layout.index')
@section('content')

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="d-flex flex-row">
                <!--begin::Aside-->
                <div class="flex-row-auto offcanvas-mobile w-300px w-xl-350px" id="kt_profile_aside">
                    <!--begin::Profile Card-->
                    <div class="card card-custom card-stretch">
                        <!--begin::Body-->
                        <div class="card-body pt-4">
                            @if ($applicant->user)
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                        <div class="symbol-label" style="background-image:url({{ $applicant->user->image }})"></div>
                                        <i class="symbol-badge bg-success"></i>
                                    </div>
                                    <div>
                                        <a href="{{ route('user.edit',$applicant->user->id) }}" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">{{ $applicant->user->name }}</a>
                                    </div>
                                </div>

                                <div class="py-9">
                                    <div class="d-flex align-items-center justify-content-between mb-2 mt-4">
                                        <span class="font-weight-bold mr-2">{{ t('Email') }}:</span>
                                        <a href="#" class="text-muted text-hover-primary">{{ $applicant->user->email }}</a>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2 mt-4">
                                        <span class="font-weight-bold mr-2">{{ t('Mobile Number') }}:</span>
                                        <span class="text-muted">{{ $applicant->user->mobile_number }}</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4">
                                        <span class="font-weight-bold mr-2">{{ t('Avarage') }}:</span>
                                        <span class="text-muted">{{ $applicant->user->avarage }}</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4">
                                        <span class="font-weight-bold mr-2">{{ t('Specialize') }}:</span>
                                        <span class="text-muted">{{ $applicant->user->specialize ? $applicant->user->specialize->name : '' }}</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4">
                                        <span class="font-weight-bold mr-2">{{ t('Degrees') }}:</span>
                                        <span class="text-muted">{{ $applicant->user->degree ? $applicant->user->degree->name : '' }}</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4">
                                        <span class="font-weight-bold mr-2">{{ t('University') }}:</span>
                                        <span class="text-muted">{{ $applicant->user->university?  $applicant->user->university->name : '' }}</span>
                                    </div>
                                    <hr>
                                    <div class="mt-4">
                                        <h4>{{ t('Skills') }}</h4>
                                        @if ($applicant->user->skills->count() > 0)
                                            @foreach ($applicant->user->skills as $skill)
                                                <div class="badge badge-dark mt-4">{{ $skill->name }}</div>
                                            @endforeach
                                        @endif
                                    </div>

                                </div>



                            @endif

                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Profile Card-->
                </div>
                <!--end::Aside-->
                <!--begin::Content-->

                <div class="flex-row-fluid ml-lg-8">

                    <div class="card card-custom gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">{{ t('Applicant Detail') }}</span>
                            </h3>
                            <div class="card-toolbar">
                                <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                                    {!! $applicant->status_value !!}
                                </ul>
                            </div>
                        </div>
                        <hr>

                        @if ($applicant->post->company)
                            <div class="card-body">
                                <h4 class="text-primary">{{ t('Company Detail') }}</h4>
                                <br>
                                <!--begin::Section-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Pic-->
                                    <div class="flex-shrink-0 mr-4 symbol symbol-65 symbol-circle">
                                        <img src="{{ $applicant->post->company->profile_image }}" alt="image">
                                    </div>
                                    <!--end::Pic-->
                                    <!--begin::Info-->
                                    <div class="d-flex flex-column mr-auto">
                                        <!--begin: Title-->
                                        <a href="{{ route('company.show',$applicant->post->company->id) }}" class="card-title text-hover-primary font-weight-bolder font-size-h5 text-dark mb-1">{{ $applicant->company_name }}</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                                <!--end::Section-->
                                <!--begin::Content-->
                                <div class="d-flex flex-wrap mt-14">
                                    <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                        <i class="fa fa-envelope"> </i>
                                        {{ $applicant->post->company->email }}
                                    </a>
                                    <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                        <i class="fa fa-mobile-alt"> </i>
                                        {{ $applicant->post->company->mobile_number }}
                                    </a>
                                    <a href="#" class="text-muted text-hover-primary font-weight-bold">
                                        <i class="fa fa-map-marker-alt"> </i>
                                        {{ $applicant->post->company->address }} -  {{ $applicant->post->company->state }}
                                    </a>
                                </div>

                            </div>
                        @endif
                        <hr>
                        <div class="card-body">
                            <h4 class="text-primary">{{ t('Details') }}</h4>

                            <br>
                            {{ $applicant->notes }}
                        </div>
                    </div>
                    <!--end::Advance Table Widget 7-->
                </div>
                <!--end::Content-->
            </div>
    </div>

    </div>
    <!--end::Entry-->



@endsection
