@extends('admin._partials.index')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pencatatan /</span> Daftar Pencatatan</h4>
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
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Total</th>
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

        });
    </script>
@endpush
