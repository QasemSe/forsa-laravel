
@extends('Company.layout.index')
@section('content')

    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="row">
                <div class="col-xl-6    ">
                    <!--begin::Stats Widget 29-->
                    <div class="card card-custom   card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-info">
                                <i class="fa fa-paper-plane fa-3x"></i>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{ isset($posts_count) ? $posts_count : 0 }}</span>
                            <span class="font-weight-bold text-muted font-size-sm">{{ t('Posts') }}</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 29-->
                </div>
                <div class="col-xl-6">
                    <!--begin::Stats Widget 30-->
                    <div class="card card-custom  bg-info card-stretch gutter-b" >
                        <!--begin::Body-->
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-white">
                                <i class="fa fa-cart-arrow-down fa-3x text-white"></i>
                            </span>
                            <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{ isset($applicants_count) ? $applicants_count : 0 }}</span>
                            <span class="font-weight-bold text-white font-size-sm">{{ t('Applicants') }}</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 30-->
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
                                        <span class="text-dark-75">{{ t('User Details') }}</span>
                                    </th>
                                    <th style="min-width: 100px">{{ t('Post Title') }}</th>
                                    <th style="min-width: 100px">{{ t('Applicant Date') }}</th>
                                    <th style="min-width: 100px">{{ t('Status') }}</th>
                                    <th style="min-width: 100px">{{ t('View') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($applicants) && $applicants->count() > 0)
                                    @foreach ($applicants as $applicant)
                                        <tr>
                                            <td class="pl-0 py-8">
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                                        <div class="symbol-label" style="background-image: url({{ $applicant->user->image }})"></div>
                                                    </div>
                                                    <div>
                                                        <a href="{{ route('myCompany.applicant.show', $applicant->id) }}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ $applicant->user->name }}</a>
                                                    </div>
                                                </div>
                                            </td>
                                            @if ($applicant->post)
                                                <td>
                                                    <a href="{{ route('myCompany.post.show',$applicant->post->id) }}">
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ \Str::limit($applicant->post_title, 50) }}</span>
                                                    </a>
                                                </td>
                                            @endif
                                            <td>
                                                {{ $applicant->created_at->format('Y-m-d H:i') }}
                                            </td>
                                            <td>
                                                {!! $applicant->status_value !!}
                                            </td>
                                            <td>
                                                <a href="{{ route('myCompany.applicant.show',$applicant->id) }}" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2" title="Edit details">
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
