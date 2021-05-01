@extends('Manager.layout.index')
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
                        <h3 class="card-label">{{ t('Specializes') }}</h3>
                    </div>

                    <div class="card-toolbar">

                        <!--end::Dropdown-->
                        <!--begin::Button-->
                        <a href="{{ route('specialize.add') }}" class="btn btn-primary font-weight-bolder">
                            <span class="svg-icon svg-icon-md"><i class="fa fa-plus"></i></span>
                            {{ t("Add New") }}
                        </a>
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
                                            <th>{{ t("Name") }}</th>
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
                var url = "{{ route('specialize.delete',':id') }}";
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
                    ajax: "{{ route('specialize.getSpecializeData') }}",
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'name', name: 'name'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]

                });

            });
        </script>


    @endpush
@endsection
