@extends('Manager.layout.index')
@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
                @include('Manager.layout.notification')
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">
                           <a href="{{ route('manager.index') }}">{{ t('Managers') }}</a> /  {{ t('Edit  Manager Data') }}
                        </h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">
                                <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form id="form" method="POST" action="{{ route('manager.update',$manager->id) }}" autocomplete="off">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ t('Email') }} </label>
                                        <input name="email" value="{{ $manager->email }}" type="email" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ t('Name') }} </label>
                                        <input  name="name" value="{{ $manager->name }}" type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ t('Password') }} </label>
                                        <input  name="password" type="text" class="form-control" />
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">{{ t('Update') }}</button>
                            <a href="{{ route('manager.index') }}">
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
