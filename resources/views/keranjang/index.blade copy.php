@extends('layouts.index')
@section('content')
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Cart</h1>
                    </div>
                </div>
                <div class="col-lg-7">

                </div>
            </div>
        </div>
    </div>
    <div class="brand_color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Keranjang</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-bg">
            <div class="product-bg-white">
                <form id="form">
                    @csrf
                    @foreach ($keranjang as $v)
                        {{-- <input type="hidden" name="barang_id[]" value="{{ $v->id }}"> --}}
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" name="check[]" value="{{ $v->id }}">
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" value="1" name="jumlah[]">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input disabled type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col text-center">
                                    <input hidden name="harga[]" value="{{ $v->getBarang->harga }}">
                                    <h3>Rp
                                        {{ number_format($v->getBarang->harga) }}
                                    </h3>
                                </div>


                                <div class="col text-center">
                                    <i><img src="{{ asset('img/barang/' . $v->getBarang->gambar) }}" width="100"
                                            height="100" /></i>
                                    <h3>{{ $v->getBarang->nama_barang }}</h3>
                                </div>

                            </div>
                        </div>
                    @endforeach
                    {{-- button simpan --}}
                    {{-- total Bayar  --}}
                    <input type="hidden" name="total" id="total">
                    <hr>

                    <div class="container text-end ">
                        <h3>Total Bayar = Rp <span id="totalBayar">0</span></h3>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-danger">Pesan</button>
                    </div>
                </form>
            </div>


            <div class="container">
                <div class="yellow_bg">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                            <div class="yellow-box">
                                <h3>REQUEST A FREE QUOTE<i><img src="{{ asset('themes/icon/calll.png') }}" /></i></h3>

                                <p>Get answers and advice from people you want it from.</p>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                            <div class="yellow-box">
                                <a href="#">Get Quote</a>
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
