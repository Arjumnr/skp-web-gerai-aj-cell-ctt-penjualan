@extends('admin._partials.index')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Provider /</span> Daftar Provider</h4>
        <div class="d-flex justify-content-end mb-3">
            <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modal-form" id="btn-tambah">
                <i class="menu-icon tf-icons  bx bx-plus">
                </i>
            </button>
        </div>

        <table class="table table-striped" id="data-table">
            <thead>

                <tr>
                    <th>No</th>
                    <th>Provider</th>
                    <th width="200px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    {{-- modal form  --}}
    @include('admin.provider.form')
@endsection
@push('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $.noConflict();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('provider.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama_provider',
                        name: 'nama_provider'
                    },



                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],


            });

            if ($.fn.dataTable.isDataTable('#data-table')) {
                table = $('#data-table').DataTable();
            } else {
                table = $('#data-table').DataTable({
                    "ajax": "{{ route('provider.index') }}",
                    "columns": [{
                            "data": "nama_provider"
                        },

                        {
                            "data": "action"
                        },
                    ]
                });
            }

            $('#btn-simpan').on('click', function() {
                $.ajax({
                    url: "{{ route('provider.store') }}",
                    dataType: 'json',
                    data: $("#form").serialize(),
                    type: 'POST',
                    success: function(data) {
                        // console.log(data).then(function(data) {
                        table.draw();
                        // })
                        $('#modal-form').trigger("reset");

                    },
                    error: function(data) {
                        console.log(data)
                    }
                })
            })

            //delete 
            $('body').on('click', '.delete', function() {

                var id = $(this).data("id");
                console.log(id)
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ route('provider.store') }}" + '/' + id,

                            success: function(data) {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Data berhasil dihapus',
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(function() {
                                    table.draw();
                                })

                            },
                            error: function(data) {
                                console.log(data)
                            }
                        });

                    }
                })

            });

        });


        //modal
    </script>
@endpush
