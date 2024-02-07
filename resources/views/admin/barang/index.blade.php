@extends('_partials.index')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Barang /</span> Daftar Barang</h4>
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
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Provider</th>
                    <th width="200px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    {{-- modal form  --}}
    @include('admin.barang.form')
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
                ajax: "{{ route('barang.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama_barang',
                        name: 'nama_barang'
                    },
                    {
                        data: 'kategori',
                        name: 'kategori'
                    },
                    {
                        data: 'harga',
                        name: 'harga'
                    },
                    {
                        data: 'provider_id',
                        name: 'provider_id'
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
                    "ajax": "{{ route('barang.index') }}",
                    "columns": [{
                            "data": "nama_barang"
                        },
                        {
                            "data": "kategori"
                        },
                        {
                            "data": "harga"
                        },
                        {
                            "data": "provider_id"
                        },

                        {
                            "data": "action"
                        },
                    ]
                });
            }

            //add 
            $('#btn-simpan').on('click', function() {
                console.log($("#form").serialize())
                $.ajax({
                    url: "{{ route('barang.store') }}",
                    dataType: 'json',
                    data: $("#form").serialize(),
                    type: 'POST',
                    success: function(data) {

                        table.draw();

                    },
                    error: function(data) {
                        console.log(data)
                    }
                })
            })


            //del
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
                            url: "{{ route('barang.store') }}" + '/' + id,

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
