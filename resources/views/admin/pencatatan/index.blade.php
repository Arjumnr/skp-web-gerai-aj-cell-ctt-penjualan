@extends('admin._partials.index')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pencatatan /</span> Daftar Pencatatan</h4>
        <div class="container">
            <form action="{{ route('export') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group col-md-6">
                            <label><b>Tanggal Mulai</b></label>
                            <input type="date" class="form-control" name="start_date" id="start_date" required="">
                        </div>

                    </div>
                    <div class="col">
                        <div class="form-group col-md-6">
                            <label><b>Tanggal Selesai</b></label>
                            <input type="date" class="form-control" name="end_date" id="end_date" required="">
                        </div>
                    </div>
                    <div class="col pt-3">
                        <button type="submit" class="btn btn-success btn-sm" id="btnExport"><span class="btn-label mt-3 ">
                                <i class="fa fa-print"></i>
                            </span>
                            Export Excel</button>
                        <button type="reset" class="btn btn-danger btn-sm" id="btnReset">Reset</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="d-flex justify-content-end mb-3">
            {{-- <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modal-form" id="btn-tambah">
                <i class="menu-icon tf-icons  bx bx-plus">
                </i>
            </button> --}}
        </div>
        <table class="table table-striped" id="data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Customer</th>
                    <th width="200px">Action</th>
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
                ajax: "{{ route('pencatatan.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function(data, type, full, meta) {
                            let date = new Date(data);

                            // Subtract one day
                            date.setDate(date.getDate() - 1);

                            // Format the date
                            let formattedDate = date.getDate() + '/' + (date.getMonth() + 1) + '/' +
                                date.getFullYear();

                            return formattedDate;
                        }
                    },
                    {
                        data: 'get_barang.nama_barang',
                        name: 'get_barang.nama_barang'
                    },
                    {
                        data: 'jumlah',
                        name: 'jumlah'
                    },

                    {
                        data: 'total',
                        name: 'total'
                    },
                    {
                        data: 'get_user.name',
                        name: 'get_user.name'
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
                    "ajax": "{{ route('pencatatan.index') }}",
                    "columns": [{
                            "data": "barang_id"
                        },
                        {
                            "data": "jumlah"
                        },
                        {
                            "data": "total"
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
                            url: "{{ route('pencatatan.store') }}" + '/' + id,

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
