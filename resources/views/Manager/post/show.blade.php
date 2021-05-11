@extends('Manager.layout.index')
@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
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

                    @foreach ($post->skills as $skill)
                        <div class="badge badge-dark mt-4">{{ $skill->name }}</div>
                    @endforeach
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
                            <form action="{{ route('post.status',$post->id) }}" method="post">
                                @csrf
                                <button  class="btn btn-success font-weight-bold mr-2">{{ t('Active Applicant') }}</button>
                            </form>
                        @else
                            <form action="{{ route('post.status',$post->id) }}" method="post">
                                @csrf
                                <button  class="btn btn-danger font-weight-bold mr-2">{{ t('Stop Applicant') }}</button>
                            </form>
                        @endif

                    </div>
                </div>


                <div class="separator separator-solid my-7"></div>



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
                                                                <a href="{{ route('applicant.show',$applicant->id) }}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ $applicant->user->name }}</a>
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
                                                        <form class="form-inline " action="{{ route('applicant.status',['id' => $applicant->id,'post_id' => $post->id]) }}" method="post">
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
                                            @else
                                            <tr>
                                               <td>
                                                   <h6 class="text-danger">{{ t('The user not found') }}</h6>
                                                </td>
                                            </tr>
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
