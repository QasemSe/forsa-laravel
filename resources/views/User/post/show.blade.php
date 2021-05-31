@extends('User.layout.index')
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
                            @if ($post->company)
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                        <div class="symbol-label" style="background-image:url({{ $post->company->profile_image }})"></div>
                                        <i class="symbol-badge bg-success"></i>
                                    </div>
                                    <div>
                                        <a class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">{{ $post->company->name }}</a>
                                    </div>
                                </div>

                                <div class="py-9">
                                    <div class="d-flex align-items-center justify-content-between mb-2 mt-4">
                                        <span class="font-weight-bold mr-2">{{ t('Email') }}:</span>
                                        <a href="#" class="text-muted text-hover-primary">{{ $post->company->email }}</a>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2 mt-4">
                                        <span class="font-weight-bold mr-2">{{ t('Mobile Number') }}:</span>
                                        <span class="text-muted">{{ $post->company->mobile_number }}</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2 mt-4">
                                        <span class="font-weight-bold mr-2">{{ t('Address') }}:</span>
                                        <span class="text-muted">{{ $post->company->address }}</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2 mt-4">
                                        <span class="font-weight-bold mr-2">{{ t('State') }}:</span>
                                        <span class="text-muted">{{ $post->company->state }}</span>
                                    </div>
                                    <hr>
                                    <div class="mt-4">
                                        <h4>{{ t('Description') }}</h4>
                                        <p class="mt-2">{!! $post->company->description !!}</p>
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
                                <span class="card-label font-weight-bolder text-dark mt-4">{{ t('Post Detail') }}</span>
                            </h3>
                            <div class="card-toolbar">
                                <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                                    {!! $post->status_value !!}
                                </ul>
                            </div>
                        </div>
                        <hr>

                        @if ($post)
                            <div class="card-body">
                                <br>
                                <!--begin::Section-->
                                <div class="d-flex align-items-center">

                                    <div class="d-flex flex-column mr-auto">
                                        <!--begin: Title-->
                                        <a class="card-title text-hover-primary font-weight-bolder font-size-h5 text-dark mb-1">{{ $post->title }}</a>
                                    </div>
                                </div>
                                <p class="mt-4">{{ $post->description }}</p>
                                <div>
                                    <label>{{ t('Expire Date') }}</label>
                                    <span  class="badge badge-secondary">{{ $post->expire_date->format('Y-m-d') }}</span>
                                </div>
                                <div class="mt-4">

                                    @if ($post->skills && $post->skills->count() > 0 )
                                        @foreach ($post->skills as $post_skill)
                                            <span class="badge badge-dark mt-4">{{ $post_skill->name }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endif

                    </div>

                    @include('User.layout.notification')

                    <div class="card card-custom gutter-b">
                        <!--begin::Header-->
                        @if ($applicant)
                            <div class="card-header border-0 p-5">
                                <label for="">{{ t('Notes') }}</label>
                                <textarea  disabled readonly class="form-control" name="notes" id="" cols="8" rows="8">{!! $applicant->notes !!}</textarea>
                                <button disabled type="submit" class="btn btn-success mt-4">{{ t('Apply Now') }}</button>
                            </div>

                        @else
                            <form action="{{ route('me.post.applyNow',$post->id) }}" method="post">
                                <div class="card-header border-0 p-5">
                                        @csrf
                                    <label for="">{{ t('Notes') }}</label>
                                    <textarea class="form-control" name="notes" id="" cols="8" rows="8"></textarea>
                                    <button type="submit" class="btn btn-success mt-4">{{ t('Apply Now') }}</button>

                                </div>
                            </form>
                        @endif

                    </div>
                </div>
                <!--end::Content-->
            </div>
    </div>

    </div>
    <!--end::Entry-->



@endsection
