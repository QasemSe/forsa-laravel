
@extends('User.layout.index')
@section('content')

    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <!--begin::Stats Widget 31-->
                    <div class="card card-custom bg-white card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-dark">
                                <i class="fa fa-cart-arrow-down text-dark fa-3x"></i>
                            </span>
                            <span class="card-title font-weight-bolder text-dark font-size-h2 mb-0 mt-6 d-block">{{ isset($applicants_review_count) ? $applicants_review_count : 0 }}</span>
                            <span class="font-weight-bold text-dark font-size-sm">{{ t('Review Applicants') }}</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 31-->
                </div>
                <div class="col-md-4">
                    <!--begin::Stats Widget 31-->
                    <div class="card card-custom bg-success card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-white">
                                <i class="fa fa-cart-arrow-down text-white fa-3x"></i>
                            </span>
                            <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{ isset($applicants_accepted_count) ? $applicants_accepted_count : 0 }}</span>
                            <span class="font-weight-bold text-white font-size-sm">{{ t('Accepted Applicants') }}</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 31-->
                </div>
                <div class="col-md-4">
                    <!--begin::Stats Widget 31-->
                    <div class="card card-custom bg-danger card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-white">
                                <i class="fa fa-cart-arrow-down text-white fa-3x"></i>
                            </span>
                            <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{ isset($applicants_caceled_count) ? $applicants_caceled_count : 0 }}</span>
                            <span class="font-weight-bold text-white font-size-sm">{{ t('Canceled Applicants') }}</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 31-->
                </div>

            </div>

            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">{{ t('Latest Applicants') }}</span>
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-0 pb-3">
                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                            <thead>
                                <tr class="text-uppercase">
                                    <th style="min-width: 250px" class="pl-7">
                                        <span class="text-dark-75">{{ t('Company Detail') }}</span>
                                    </th>
                                    <th style="min-width: 100px">{{ t('Post Title') }}</th>
                                    <th style="min-width: 100px">{{ t('Status') }}</th>
                                    <th style="min-width: 100px">{{ t('View') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($applicants) && $applicants->count() > 0)
                                    @foreach ($applicants as $applicant)
                                        <tr>
                                            @if ($applicant->post)
                                                @if ($applicant->post->company)
                                                    <td class="pl-0 py-8">
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                                                <div class="symbol-label" style="background-image: url({{ $applicant->post->company->profile_image }})"></div>
                                                            </div>
                                                            <div>
                                                                <a  class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ $applicant->post->company->name }}</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                @endif
                                            @endif

                                            @if ($applicant->post)
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ \Str::limit($applicant->post_title, 50) }}</span>
                                                    <span class="text-muted font-weight-bold">{{ $applicant->post->expire_date->format('Y-m-d') }}</span>
                                                </td>
                                            @endif

                                            <td>
                                                {!! $applicant->status_value !!}
                                            </td>
                                            <td>
                                                <a href="{{ route('me.applicant.show',$applicant->id) }}" class="btn btn-sm btn-default btn-text-primary btn-success btn-icon mr-2" title="Edit details">
                                                   <i class="fa fa-eye"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Body-->
            </div>

        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection
