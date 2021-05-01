@extends('Manager.layout.index')
@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
                @include('Manager.layout.notification')
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">
                           <a href="{{ route('company.index') }}">{{ t('Companies') }}</a> /  {{ t('Add New Compay') }}
                        </h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">
                                <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form id="form" method="POST" action="{{ route('company.store') }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-md-6 text-right   mb-5">
                                    <div class="image-input image-input-outline" id="kt_user_add_avatar">
                                        <div id="imagePreview" class="image-input-wrapper" style="background-image: url({{ asset('Backend/img/default.jpg') }});"></div>
                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="{{ t('Chnage Image') }}">
                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                            <input type="file" name="profile_image" id="imageUpload" >
                                        </label>
                                        <label class="text-center p-4">{{ t('Profile Image') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-6 text-left   mb-5">
                                    <div class="image-input image-input-outline text-center" id="kt_user_add_avatar">
                                        <div id="imagePreview2" class="image-input-wrapper" style="background-image: url({{ asset('Backend/img/default.jpg') }});"></div>
                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="{{ t('Chnage Image') }}">
                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                            <input type="file" name="banner_image" id="imageUpload2" >
                                        </label>
                                        <label class="text-center p-4">{{ t('Banner Image') }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label>{{ t('Name') }} </label>
                                        <input  value="{{ old('name') }}"  name="name" type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label>{{ t('Email') }} </label>
                                        <input  value="{{ old('email') }}"  name="email" type="email" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label>{{ t('Password') }} </label>
                                        <input  value="{{ old('password') }}"  name="password" type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label>{{ t('Mobile Number') }} </label>
                                        <input  value="{{ old('mobile_number') }}"  name="mobile_number" type="text" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label>{{ t('Address') }} </label>
                                        <input  value="{{ old('address') }}"  name="address" type="text" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label>{{ t('State') }} </label>
                                        <input  value="{{ old('state') }}"  name="state" type="text" class="form-control" />
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group fv-plugins-icon-container">
                                        <label class="col-form-label">{{ t("Status") }}</label>
                                        <div class="switch">
                                            <label>
                                              <input name="status" value="1"   type="checkbox">
                                              <span class="lever"></span>
                                            </label>
                                          </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 ">
                                    <div class="form-group">
                                        <label>{{ t('Description') }} </label>
                                        <textarea name="description" class="form-control" rows="10"></textarea>
                                    </div>
                                </div>
                                
                            </div>
                            <hr><br>
                            <h5>{{ t('Links') }}</h5>
                            <div class="row mt-4">
                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label>{{ t('Website') }} </label>
                                        <input  value="{{ old('website_url') }}"  name="website_url" type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label>{{ t('Facebook') }} </label>
                                        <input  value="{{ old('facebook_url') }}"  name="facebook_url" type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label>{{ t('Twitter') }} </label>
                                        <input  value="{{ old('twitter_url') }}"  name="twitter_url" type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label>{{ t('Whatsapp') }} </label>
                                        <input  value="{{ old('whatsapp_url') }}"  name="whatsapp_url" type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label>{{ t('Instagram') }} </label>
                                        <input  value="{{ old('instagram_url') }}"  name="instagram_url" type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label>{{ t('Linkedin') }} </label>
                                        <input  value="{{ old('linkedin_url') }}"  name="linkedin_url" type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label>{{ t('Behance') }} </label>
                                        <input  value="{{ old('behance_url') }}"  name="behance_url" type="text" class="form-control" />
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">{{ t('Submit') }}</button>
                            <a href="{{ route('company.index') }}">
                                <button type="button" class="btn btn-secondary">{{ t('Cancle') }}</button>
                            </a>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>

        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->

    @push('scripts')
        <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

        {!! $validator->selector('#form') !!}
    @endpush


@endsection
