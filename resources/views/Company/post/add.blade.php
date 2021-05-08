@extends('Company.layout.index')

@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
                @include('Company.layout.notification')
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">
                           <a href="{{ route('myCompany.post.index') }}">{{ t('Posts') }}</a> /  {{ t('Add New post') }}
                        </h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">
                                <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form id="form" method="POST" action="{{ route('myCompany.post.store') }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="row">
                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label>{{ t('Title') }} </label>
                                        <input  value="{{ old('title') }}"  name="title" type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <label>{{ t('Expire Date') }} </label>
                                        <input  value="{{ old('expire_date') }}"  name="expire_date" type="text" class="form-control datetimepicker1" />
                                    </div>
                                </div>



                                <div class="col-lg-12 ">
                                    <div class="form-group">
                                        <label>{{ t('Description') }} </label>
                                        <textarea name="description" class="form-control" rows="15">{{ old('description') }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-8">
                                    <label>{{ t('Skills') }}</label>
                                    <select class="form-control select2" id="kt_select2_3" multiple name="skills_id[]" >
                                        @foreach ($skills as $skill)
                                            <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-md-4 mt-5">
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



                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">{{ t('Submit') }}</button>
                            <a href="{{ route('myCompany.post.index') }}">
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
        <script type="text/javascript" src="{{ asset('Backend/plugins/bootstrap-datetime-picker/bootstrap-datetimepicker.js')}}"></script>

        {!! $validator->selector('#form') !!}

        <script>
            $(function () {
                    $('.datetimepicker1').datepicker({
                        autoclose : true,
                        todayHighlight: true,
                        orientation: "bottom left",
                        format: 'yyyy-mm-dd'
                    });
                });
        </script>
    @endpush


@endsection
