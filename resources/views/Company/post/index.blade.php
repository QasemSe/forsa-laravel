@extends('Company.layout.index')
@section('style')
@if (app()->getlocale() == "ar")
    <link href="{{ asset('Backend/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>
@else
    <link href="{{ asset('Backend/plugins/custom/datatables/datatables.bundle_en.css')}}" rel="stylesheet" type="text/css"/>

@endif

@endsection
@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">{{ t('Posts') }}</h3>
                    </div>

                    <div class="card-toolbar">

                        <!--end::Dropdown-->
                        <!--begin::Button-->
                        @if (Auth::guard('company')->user()->status == 0)
                            <a class="btn btn-primary font-weight-bolder disabled">
                                <span class="svg-icon svg-icon-md"><i class="fa fa-plus"></i></span>
                                {{ t("Add New") }}
                            </a>
                        @else
                            <a href="{{ route('myCompany.post.add') }}" class="btn btn-primary font-weight-bolder">
                                <span class="svg-icon svg-icon-md"><i class="fa fa-plus"></i></span>
                                {{ t("Add New") }}
                            </a>
                        @endif

                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div id="kt_datatable_wrapper" class=" dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="datatable table table-bordered text-center  "
                                         role="grid" aria-describedby="kt_datatable_info"
                                       style="width: 1149px;">
                                    <thead>
                                        <tr >
                                            <th>#</th>
                                            <th>{{ t("Title") }}</th>
                                            <th>{{ t("Expire Date") }}</th>
                                            <th>{{ t("Applicants Count") }}</th>
                                            <th>{{ t("Status") }}</th>
                                            <th>{{ t("Actions") }}</th>
                                        </tr>

                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div id="confirmModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title"> {{ t('Confirmation') }} </h2>
                                    </div>
                                    <div class="modal-body">
                                        <h4 align="center" style="margin:0;">{{ t('Are you sure you want to remove this item ?') }} </h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" name="ok_button" id="ok_button"
                                                style="background-color: rgb(236, 67, 67);color:white" class="btn ">{{ t('Delete') }}
                                        </button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ t('Cancle') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--end: Datatable-->
                </div>
            </div>

        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->



    @push('scripts')
        <script src="{{ asset('Backend/plugins/custom/datatables/datatables.bundle.js')}}"></script>

        <script type="text/javascript">
            var id;
            $(document).on('click', '.delete', function(){
                 id = $(this).attr('id');
                    $('#confirmModal').modal('show');
            });
            $('#ok_button').click(function(){
                var url = "{{ route('myCompany.post.delete',':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    url:url,
                    type: "POST",

                    success:function(data)
                    {
                        setTimeout(function(){
                        $('#confirmModal').modal('hide');
                            $('.datatable').DataTable().ajax.reload();
                        }, 400);
                        toastr.success("{{ t("Success To Delete Data") }}")
                    }
                })
            });
        </script>


        <script type="text/javascript">
            $(function () {
                var table = $('.datatable').DataTable({
                    language: {
                        url: "@lang('site.datatable_lang')"
                    },
                    processing: true,
                    lengthChange:false,
                    serverSide: true,
                    info: false,
                    ajax: "{{ route('myCompany.post.getPostData') }}",
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'title', name: 'profile_image'},
                        {data: 'expire_date', name: 'expire_date'},
                        {data: 'applicants_count', name: 'applicants_count'},
                        {data: 'status_value', name: 'status_value'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]

                });

            });
        </script>


    @endpush
@endsection
