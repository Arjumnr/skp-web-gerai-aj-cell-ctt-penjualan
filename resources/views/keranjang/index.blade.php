@extends('layouts.index')
@section('content')
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Keranjang</h1>
                    </div>
                </div>
                <div class="col-lg-7">

                </div>
            </div>
        </div>
    </div>
    <div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="row mb-5 ">
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Gambar</th>
                                    <th class="product-name">Produk</th>
                                    <th class="product-price">Harga</th>
                                    <th class="product-quantity">Jumlah</th>
                                    <th class="product-quantity">Stok</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-remove">Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keranjang as $v)
                                    <tr class="text-center">
                                        <td class="product-thumbnail">
                                            <img src="{{ asset('img/barang/' . $v->getBarang->gambar) }}" alt="Image"
                                                class="img-fluid">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black">{{ $v->getBarang->nama_barang }}</h2>
                                        </td>
                                        <td>Rp. {{ number_format($v->getBarang->harga, 0, ',', '.') }}</td>
                                        <td>
                                            <div class="input-group mb-3 d-flex align-items-center quantity-container"
                                                style="max-width: 120px;">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-black decrease"
                                                        type="button">&minus;</button>
                                                </div>
                                                <input type="text" class="form-control text-center quantity-amount"
                                                    value="1" placeholder=""
                                                    aria-label="Example text with button addon"
                                                    aria-describedby="button-addon1">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-black increase"
                                                        type="button">&plus;</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $v->getBarang->stok }}</td>
                                        <td>Rp. {{ number_format($v->getBarang->harga, 0, ',', '.') }}</td>
                                        <td>
                                            <a href="{{ route('delKeranjang', $v->id) }}" class="btn btn-black btn-sm">X</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-6 mb-3 mb-md-0">
                            {{-- <button class="btn btn-black btn-sm btn-block">Update Cart</button> --}}
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-outline-black btn-sm btn-block">Hitung</button>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5" id="btn-hitung">
                                    <h3 class="text-black h4 text-uppercase">Total Pesanan</h3>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <span class="text-black">Subtotal</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">Rp {{ number_format(13000, 0, ',', '.') }}</strong>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">Rp {{ number_format(13000, 0, ',', '.') }}</strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-black btn-lg py-3 btn-block"
                                        onclick="window.location='checkout.html'">Pesanan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Initialize total
            let total = 0;
            let harga = [];
            let jumlah = [];

            // Update total when a checkbox is checked or unchecked
            $('input[name="check[]"]').change(function() {
                total = 0;

                // Loop through checked checkboxes and update total
                $('input[name="check[]"]:checked').each(function() {
                    // get harga and quantity from name harga[] and jumlah[]
                    let price = $(this).closest('.row').find('input[name="harga[]"]').val();
                    let quantity = $(this).closest('.row').find('input[name="jumlah[]"]').val();
                    console.log('Price:', price, 'Quantity:', quantity);

                    // Try to parse as a float
                    price = parseFloat(price.replace('Rp ', '').replace(',', ''));

                    if (!isNaN(price)) {

                        // Multiply the price by quantity and add to the total
                        total += price * quantity;
                    } else {
                        console.error('Invalid price:', $(this).closest('.row').find(
                            '.text-center h3').text());
                    }
                });
                console.log(total);
                $('#total').val(total);
                // Update the totalBayar element
                $('#totalBayar').text(total);

                // Log the total whenever it changes
                console.log('Total:', total);
            });

            console.log(total);
            $('#form').on('submit', function(event) {
                event.preventDefault();
                let formData = new FormData(this);
                let cek = $('input[name="check[]"]:checked').length;
                console.log(cek);
                if (cek > 0) {
                    formData = formData;
                    console.log(cek);
                    console.log(formData);
                    // } else if (cek > 1) {
                    //     console.log(cek);
                    //     $('input[name="check[]"]:checked').each(function() {
                    //         formData.append('check[]', $(this).val());
                    //     });
                } else {
                    formData = null;
                    console.log('No checkboxes are checked.');
                }
                // formData = barang_id;
                var url = "{{ route('pesan') }}";

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
                            })
                        } else {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Gagal',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }


                    },
                    error: function(data) {
                        console.log(data);


                    }
                })
                $('#exampleModal').modal('hide');
                // $("#exampleModal").removeClass("in");
                $(".modal-backdrop").remove();
                // $("#exampleModal").hide();
            });
        })
    </script>
@endpush
