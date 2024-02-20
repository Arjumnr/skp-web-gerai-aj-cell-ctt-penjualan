@extends('admin._partials.index')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> Daftar User</h4>
        <table class="table table-striped" id="data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>No. Hp</th>
                    <th width="100px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
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
                ajax: "{{ route('users.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'level',
                        name: 'level'
                    },
                    {
                        data: 'no_hp',
                        name: 'no_hp'
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
                    "ajax": "{{ route('users.index') }}",
                    "columns": [{
                            "data": "name"
                        },
                        {
                            "data": "username"
                        },

                        {
                            "data": "action"
                        },
                    ]
                });
            }


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
                            url: "{{ route('users.store') }}" + '/' + id,

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
    </script>
@endpush
