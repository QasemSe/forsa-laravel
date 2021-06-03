@extends('Manager.layout.index')
@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
                @include('Manager.layout.notification')
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">
                           <a href="{{ route('user.index') }}">{{ t('Users') }}</a> /  {{ t('Edit User Data') }}
                        </h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">
                                <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form id="form" method="POST" action="{{ route('user.update',$user->id) }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-md-12 text-center   mb-5">
                                    <div class="image-input image-input-outline" id="kt_user_add_avatar">
                                        <div id="imagePreview" class="image-input-wrapper" style="background-image: url({{ $user->image }});"></div>
                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="{{ t('Chnage Image') }}">
                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                            <input type="file"  name="image" id="imageUpload" >
                                        </label>
                                        <label class="text-center p-4">{{ t('Profile Image') }}</label>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label>{{ t('Name') }} </label>
                                        <input  value="{{ $user->name }}"  name="name" type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label>{{ t('Email') }} </label>
                                        <input  value="{{ $user->email }}"  name="email" type="email" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label>{{ t('Password') }} </label>
                                        <input    name="password" type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label>{{ t('Mobile Number') }} </label>
                                        <input  value="{{ $user->mobile_number }}"  name="mobile_number" type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label>{{ t('Avarage') }} </label>
                                        <input  value="{{ $user->avarage }}"  name="avarage" type="text" class="form-control" />
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <label>{{ t('Specialize') }}</label>
                                    <select class="form-control" name="specialize_id">
                                        <option value="" selected disabled>{{ t('Specialize') }}</option>
                                        @foreach ($specializes as $specialize)
                                            <option {{ $user->specialize_id == $specialize->id ? 'selected' : '' }}
                                             value="{{ $specialize->id }}">{{ $specialize->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>{{ t('Degree') }}</label>
                                    <select class="form-control" name="degree_id">
                                        <option value="" selected disabled>{{ t('Degree') }}</option>
                                        @foreach ($degrees as $degree)
                                            <option {{ $user->degree_id == $degree->id ? 'selected' : '' }}
                                             value="{{ $degree->id }}">{{ $degree->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>{{ t('University') }}</label>
                                    <select class="form-control" name="university_id">
                                        <option value="" selected disabled>{{ t('University') }}</option>
                                        @foreach ($universities as $university)
                                            <option {{ $user->university_id == $university->id ? 'selected' : '' }}
                                            value="{{ $university->id }}">{{ $university->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4"></div>

                                <div class="col-md-12 mt-8">
                                    <label>{{ t('Skills') }}</label>
                                    <select class="form-control select2" id="kt_select2_3" multiple name="skills_id[]" >
                                        @foreach ($skills as $skill)
                                            <option
                                            @foreach ($user->skills as $user_skill)
                                                {{ $skill->id == $user_skill->id ? 'selected' : '' }}
                                            @endforeach
                                            value="{{ $skill->id }}">{{ $skill->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr><br>
                            <h5>{{ t('Links') }}</h5>
                            <div class="row mt-4">
                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label>{{ t('Website') }} </label>
                                        <input  value="{{ $user->link ?  $user->link->website_url : '' }}"  name="website_url" type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label>{{ t('Facebook') }} </label>
                                        <input  value="{{ $user->link ? $user->link->facebook_url : '' }}"  name="facebook_url" type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label>{{ t('Twitter') }} </label>
                                        <input  value="{{ $user->link ? $user->link->twitter_url : ''}}"  name="twitter_url" type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label>{{ t('Whatsapp') }} </label>
                                        <input  value="{{ $user->link ? $user->link->whatsapp_url : '' }}"  name="whatsapp_url" type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label>{{ t('Instagram') }} </label>
                                        <input  value="{{ $user->link ? $user->link->instagram_url : '' }}"  name="instagram_url" type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label>{{ t('Linkedin') }} </label>
                                        <input  value="{{ $user->link ? $user->link->linkedin_url : '' }}"  name="linkedin_url" type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label>{{ t('Behance') }} </label>
                                        <input  value="{{ $user->link ? $user->link->behance_url : '' }}"  name="behance_url" type="text" class="form-control" />
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">{{ t('Update') }}</button>
                            <a href="{{ route('user.index') }}">
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
