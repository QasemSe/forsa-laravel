@extends('Company.layout.index')
@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            @include('Company.layout.notification')
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <!--begin: Title-->
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <div class="mr-3">
                                    <!--begin::Name-->
                                    <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{ $post->title }}
                                    <i class="flaticon2-correct text-success icon-md ml-2"></i></a>

                                    <!--end::Contacts-->
                                </div>
                                <div class="my-lg-0 my-1">
                                    <span class="mr-4">{{ $post->expire_date->format('Y-m-d')  }}</span>
                                    {!! $post->status_value !!}
                                </div>

                            </div>
                            <!--end: Title-->
                        </div>
                    </div>
                    <div class="separator separator-solid my-7"></div>
                    <!--begin: Items-->
                    <div class="d-flex align-items-center flex-wrap">
                        <div class="flex-grow-1 font-weight-bold text-dark-50 py-5 py-lg-2 mr-5">{{ $post->description }}</div>
                    </div>
                    <div class="mt-3">
                        @foreach ($post->skills as $skill)
                            <div class="badge badge-dark mt-4">{{ $skill->name }}</div>
                        @endforeach
                    </div>

                    <!--begin: Items-->
                </div>

                <div class="separator separator-solid my-7"></div>

                <div class="row text-center">
                    <div class="col-md-4">
                        <h4>{{ t('Applicants') }}</h4>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        @if ($post->status == 0)
                            <form action="{{ route('myCompany.post.status',$post->id) }}" method="post">
                                @csrf
                                <button  class="btn btn-success font-weight-bold mr-2">{{ t('Active Applicant') }}</button>
                            </form>
                        @else
                            <form action="{{ route('myCompany.post.status',$post->id) }}" method="post">
                                @csrf
                                <button  class="btn btn-danger font-weight-bold mr-2">{{ t('Stop Applicant') }}</button>
                            </form>
                        @endif

                    </div>
                </div>


                <div class="separator separator-solid my-7"></div>


                <!-- Button trigger modal-->




                <div class="card-body pt-0 pb-3 mt-5">
                    <div class="tab-content">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                <thead>
                                    <tr class="text-left text-uppercase">
                                        <th style="min-width: 250px" class="pl-7">
                                            <span class="text-dark-75">{{ t('Image') }}</span>
                                        </th>
                                        <th style="min-width: 100px">{{ t('Email') }}</th>
                                        <th style="min-width: 100px">{{ t('Mobile Number') }}</th>
                                        <th style="min-width: 100px">{{ t('Specialize') }}</th>
                                        <th style="min-width: 100px">{{ t('Applicant Date') }}</th>
                                        <th style="min-width: 100px">{{ t('Details') }}</th>
                                        <th style="min-width: 200px">{{ t('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($applicants) && $applicants->count() > 0)
                                        @foreach ($applicants as $applicant)
                                            @if ($applicant->user)
                                                <tr>
                                                    <td class="pl-0 py-8">
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-50 symbol-light mr-4">
                                                                <span class="symbol-label">
                                                                    <img src="{{ $applicant->user->image }}" class="h-75 align-self-center" alt="">
                                                                </span>
                                                            </div>
                                                            <div>
                                                                <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ $applicant->user->name }}</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $applicant->user->email }}</span>
                                                    </td>
                                                    <td>
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $applicant->user->mobile_number }}</span>
                                                    </td>
                                                    <td>
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $applicant->user->specialize_name }}</span>
                                                    </td>
                                                    <td>
                                                        {{ $applicant->created_at->format('Y-m-d H:i') }}
                                                    </td>

                                                    <td>
                                                        <button type="button" class="btn btn-secondary btn-icon btn-sm" data-toggle="modal" data-target="#exampleModal{{ $applicant->user->id }}">
                                                            <i class="fa fa-eye"></i>
                                                        </button>
                                                        <a href="{{ route('myCompany.applicant.show', $applicant->id) }}" class="btn btn-secondary btn-icon btn-sm">
                                                            <i class="fa fa-info-circle"></i>
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <form class="form-inline " action="{{ route('myCompany.post.ApplicantStatus',['id' => $applicant->id,'post_id' => $post->id]) }}" method="post">
                                                            @csrf
                                                            <select class="form-control" name="status" style="width: 150px">
                                                                <option value="" selected disabled>{{ t('Status') }}</option>
                                                                <option {{ $applicant->status == 'review' ? 'selected' : '' }} value="review">{{ t('Review') }}</option>
                                                                <option {{ $applicant->status == 'accepted' ? 'selected' : '' }} value="accepted">{{ t('Accepted') }}</option>
                                                                <option {{ $applicant->status == 'canceled' ? 'selected' : '' }} value="canceled">{{ t('Canceled') }}</option>
                                                            </select>
                                                            <button type="submit" class="btn btn-success btn-sm font-weight-bold ml-4">{{ t('Chnage Status') }}</button>
                                                        </form>

                                                    </td>

                                                </tr>


                                                <div class="modal fade" id="exampleModal{{ $applicant->user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">{{ t('User Detials') }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <div class="d-flex align-items-center mb-7">
                                                                    <!--begin::Pic-->
                                                                    <div class="flex-shrink-0 mr-4">
                                                                        <div class="symbol symbol-circle symbol-lg-75">
                                                                            <img src="{{ $applicant->user->image }}" alt="image">
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Pic-->
                                                                    <!--begin::Title-->
                                                                    <div class="d-flex flex-column">
                                                                        <a  class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">{{ $applicant->user->name }}</a>
                                                                    </div>
                                                                    <!--end::Title-->
                                                                </div>

                                                                <div class="mb-7">
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <span class="text-dark-75 font-weight-bolder mr-2">{{ t('Mobile Number') }}:</span>
                                                                        <a  class="text-muted text-hover-primary">{{ $applicant->user->mobile_number }}</a>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between align-items-cente my-1">
                                                                        <span class="text-dark-75 font-weight-bolder mr-2">{{ t('Avarage') }}:</span>
                                                                        <a  class="text-muted text-hover-primary">{{ $applicant->user->avarage }}</a>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between align-items-cente my-1">
                                                                        <span class="text-dark-75 font-weight-bolder mr-2">{{ t('Specialize') }}:</span>
                                                                        <a  class="text-muted text-hover-primary">{{ $applicant->user->specialize_name }}</a>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between align-items-cente my-1">
                                                                        <span class="text-dark-75 font-weight-bolder mr-2">{{ t('Degree') }}:</span>
                                                                        <a  class="text-muted text-hover-primary">{{ $applicant->user->degree_name }}</a>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between align-items-cente my-1">
                                                                        <span class="text-dark-75 font-weight-bolder mr-2">{{ t('University') }}:</span>
                                                                        <a  class="text-muted text-hover-primary">{{ $applicant->user->university_name }}</a>
                                                                    </div>
                                                                    <div class="mt-4">

                                                                        @if ($applicant->user->skills && $applicant->user->skills->count() > 0 )
                                                                            @foreach ($applicant->user->skills as $user_skill)
                                                                                <span class="badge badge-dark mt-4">{{ $user_skill->name }}</span>
                                                                            @endforeach
                                                                        @endif
                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                            @endif

                                        @endforeach
                                    @else
                                        <tr>
                                           <td>
                                                <h6 class="text-danger mt-5">{{ t('No Applicants For This Post') }}</h6>
                                            </td>
                                        </tr>
                                    @endif


                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                </div>
                <!--end::Body-->







            </div>




        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->



@endsection
