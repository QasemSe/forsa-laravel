@extends('Company.layout.index')
@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
                @include('Company.layout.notification')
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">
                           {{ t('Applicants') }}
                        </h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">
                                <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form id="form" method="POST" action="{{ route('myCompany.applicant.update',$applicant->id) }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="row">
                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label>{{ t('User Name') }} </label>
                                        <input  value="{{ $applicant->user_name }}" disabled   type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-8 ">
                                    <div class="form-group">
                                        <label>{{ t('Post Title') }} </label>
                                        <input  value="{{ $applicant->post_title }}" disabled  type="text" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-lg-12 ">
                                    <div class="form-group">
                                        <label>{{ t('Notes') }} </label>
                                        <textarea  disabled class="form-control" rows="10">{{ $applicant->notes }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>{{ t('Status') }}</label>
                                    <select class="form-control" name="status">
                                        <option value="" selected disabled>{{ t('Status') }}</option>
                                        <option {{ $applicant->status == 'review' ? 'selected' : '' }} value="review">{{ t('Review') }}</option>
                                        <option {{ $applicant->status == 'accepted' ? 'selected' : '' }} value="accepted">{{ t('Accepted') }}</option>
                                        <option {{ $applicant->status == 'canceled' ? 'selected' : '' }} value="canceled">{{ t('Canceled') }}</option>
                                    </select>
                                </div>

                            </div>


                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">{{ t('Submit') }}</button>
                            <a href="{{ route('myCompany.applicant.index') }}">
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



@endsection
