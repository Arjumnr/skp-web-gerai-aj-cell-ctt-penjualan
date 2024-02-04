@extends('_partials.index')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Barang /</span> Daftar Barang</h4>
        <table class="table table-striped" id="data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Barang</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Provider</th>
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

        });
    </script>
@endpush
