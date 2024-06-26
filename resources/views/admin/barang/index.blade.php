@extends('admin._partials.index')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Barang /</span> Daftar Barang</h4>
        <div class="d-flex justify-content-end mb-3">
            <button type="button" class="btn btn-primary " id="btnTambah" data-bs-toggle="modal" data-bs-target="#basicModal">
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
                    <th>Modal</th>
                    <th>Harga</th>
                    <th>Stok</th>
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
            // $('#modalID').modal('show');
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
                        data: 'modal',
                        name: 'modal'
                    },
                    {
                        data: 'harga',
                        name: 'harga'
                    },
                    {
                        data: 'stok',
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

            $('#btnTambah').on('click', function() {
                console.log('click');
                $('#modal-form').trigger("reset");
                $('#form').trigger("reset");
                // $('#modal-form').modal('show');
                // $('#form').attr('action', "{{ route('barang.store') }}");
            });



            //add 
            // $('#btn-simpan').on('click', function(e) {
            //     // console.log($("#form").serialize())
            //     e.preventDefault();
            //     $(this).html('Sending..');
            //     var formData = new FormData(this);
            //     var id = $('#data_id').val();
            //     if (id != '') {
            //         //kirim id lewat form data 
            //         formData.append('data_id', id);
            //     }
            //     $.ajax({
            //         url: "{{ route('barang.store') }}",
            //         dataType: 'json',
            //         data: formData,
            //         type: 'POST',
            //         success: function(data) {
            //             console.log(data);
            //             if (data.status == 'success') {
            //                 Swal.fire({
            //                     position: 'center',
            //                     icon: 'success',
            //                     title: 'Berhasil',
            //                     showConfirmButton: false,
            //                     timer: 1500
            //                 }).then(function() {
            //                     table.draw();

            //                 })
            //             } else {
            //                 Swal.fire({
            //                     position: 'center',
            //                     icon: 'error',
            //                     title: 'Gagal',
            //                     showConfirmButton: false,
            //                     timer: 1500
            //                 }).then(function() {
            //                     table.draw();

            //                 })
            //             }
            //             $("#basicModal").removeClass("in");
            //             $(".modal-backdrop").remove();
            //             $("#basicModal").hide();

            //             $('#form').trigger("reset");

            //         },
            //         error: function(data) {
            //             console.log(data);


            //         }
            //     })
            // })

            $('#form').on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                var id = $('#data_id').val();
                var url = "{{ route('barang.store') }}";
                if (id != '') {
                    //kirim id lewat form data 
                    formData.append('data_id', id);
                }
                $.ajax({
                    url: url,
                    method: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        if (data.status == 'success') {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Berhasil',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                table.draw();

                            })
                        } else {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Gagal',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                table.draw();

                            })
                        }
                        $("#basicModal").removeClass("in");
                        $(".modal-backdrop").remove();
                        $("#basicModal").hide();

                        $('#form').trigger("reset");

                    },
                    error: function(data) {
                        console.log(data);


                    }
                })
            });

            //edit
            $('body').on('click', '.edit', function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // $('#btnSave').html('Update Data')

                var id = $(this).data('id');

                $.get("{{ route('barang.index') }}" + '/' + id + '/edit', function(data) {
                    console.log("data_id = " + data.id);
                    // $('#modalHeading').html("Edit User");
                    // $('#btnSave').val("edit-data");
                    // $('#basicModal').modal('show');
                    $('#data_id').val(id);
                    $('#nama_barang').val(data.nama_barang);
                    $('#kategori').val(data.kategori).trigger('change');
                    $('#modal').val(data.modal);
                    $('#harga').val(data.harga);
                    $('#stok').val(data.stok);

                })

            });


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
