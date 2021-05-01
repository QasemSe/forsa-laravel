@extends('Manager.layout.index')
@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
                @include('Manager.layout.notification')
                <div class="card card-custom gutter-b">
                    <div class="card-body">
                        <div class="d-flex">
                            <!--begin: Pic-->
                            <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                                <div class="symbol symbol-50 symbol-lg-120">
                                    <img alt="Pic" src="{{ $company->profile_image }}">
                                </div>
                                <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
                                    <span class="font-size-h3 symbol-label font-weight-boldest"></span>
                                </div>
                            </div>
                            <!--end: Pic-->
                            <!--begin: Info-->
                            <div class="flex-grow-1">
                                <!--begin: Title-->
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <div class="mr-3">
                                        <!--begin::Name-->
                                        <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{ $company->name }}
                                        <i class="flaticon2-correct text-success icon-md ml-2"></i></a>
                                        <!--end::Name-->
                                        <!--begin::Contacts-->
                                        <div class="d-flex flex-wrap my-2">
                                            <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                <i class="fa fa-envelope"> </i>
                                                {{ $company->email }}
                                            </a>
                                            <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                <i class="fa fa-mobile-alt"> </i>
                                                {{ $company->mobile_number }}
                                            </a>
                                            <a href="#" class="text-muted text-hover-primary font-weight-bold">
                                                <i class="fa fa-map-marker-alt"> </i>
                                                {{ $company->address }} -  {{ $company->state }}
                                            </a>
                                        </div>
                                        <!--end::Contacts-->
                                    </div>
                                    <div class="my-lg-0 my-1">
                                       {!! $company->status_value !!}
                                    </div>
                                </div>
                                <!--end: Title-->
                                <!--begin: Content-->
                                <div class="d-flex align-items-center flex-wrap justify-content-between">
                                    <div class="flex-grow-1 font-weight-bold text-dark-50 py-5 py-lg-2 mr-5">{{ $company->description }}</div>
                                </div>
                                <!--end: Content-->
                            </div>
                            <!--end: Info-->
                        </div>
                        <div class="separator separator-solid my-7"></div>
                        <!--begin: Items-->
                        <div class="d-flex align-items-center flex-wrap">
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                <a href="{{ $company->link ?  $company->link->website_url  : asset('')}}">
                                    <span class="mr-4">
                                        <i class="fa fa-globe-americas fa-3x text-success"></i>
                                    </span>
                                </a>
                            </div>

                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                <a href="{{ $company->link ?  $company->link->facebook_url  : asset('')}}">
                                    <span class="mr-4">
                                        <i class="fab fa-facebook fa-3x text-success"></i>
                                    </span>
                                </a>
                            </div>

                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                <a href="{{ $company->link ?  $company->link->twitter_url  : asset('')}}">
                                    <span class="mr-4">
                                        <i class="fab fa-twitter-square fa-3x text-success"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                <a href="{{ $company->link ?  $company->link->instagram_url  : asset('')}}">
                                    <span class="mr-4">
                                        <i class="fab fa-instagram-square fa-3x text-success"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                <a href="{{ $company->link ?  $company->link->whatsapp_url  : asset('')}}">
                                    <span class="mr-4">
                                        <i class="fab fa-whatsapp-square fa-3x text-success"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                <a href="{{ $company->link ?  $company->link->linkedin_url  : asset('')}}">
                                    <span class="mr-4">
                                        <i class="fab fa-linkedin fa-3x text-success"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                <a href="{{ $company->link ?  $company->link->behance_url  : asset('')}}">
                                    <span class="mr-4">
                                        <i class="fab fa-behance-square fa-3x text-success"></i>
                                    </span>
                                </a>
                            </div>




                        </div>
                        <!--begin: Items-->
                    </div>
                </div>



                <div class="accordion accordion-solid accordion-panel accordion-svg-toggle mb-10" id="faq">
                    <!--begin::Item-->
                    @if ($company->posts && $company->posts->count() > 0)
                        @foreach ($company->posts as $company_post)
                        <div class="card p-6">
                            <!--begin::Header-->
                            <div class="card-header" id="faqHeading{{ $company_post->id }}">
                                <div class="card-title font-size-h4 text-dark" data-toggle="collapse" data-target="#faq{{ $company_post->id }}" aria-expanded="true" aria-controls="faq1" role="button">
                                    <div class="card-label">{{ $company_post->title }}</div>
                                    <span class="mr-4">
                                        {!! $company_post->status_value !!}
                                    </span>
                                    <span class='badge badge-danger mr-4'>{{ $company_post->expire_date->format('Y-m-d') }}</span>

                                    <span class="svg-icon svg-icon-primary">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-right.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
                                                <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999)"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>

                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div id="faq{{ $company_post->id }}" class="collapse " aria-labelledby="faqHeading{{ $company_post->id }}" data-parent="#faq" style="">
                                <div class="card-body pt-3 font-size-h6 font-weight-normal text-dark-50">
                                    {{ $company_post->description }}
                                    <br><br>
                                    @foreach ($company_post->skills as $post_skill)
                                        <div class="badge badge-dark">{{ $post_skill->name }}</div>
                                    @endforeach
                                </div>

                            </div>
                            <!--end::Body-->
                        </div>
                        @endforeach
                    @else
                            <div class="alert alert-danger" role="alert">
                                {{ t('No New Posts') }}
                            </div>

                    @endif


                </div>

        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->



@endsection
