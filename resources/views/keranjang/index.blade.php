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

                <div class="site-blocks-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Gambar</th>
                                <th class="product-name">Produk</th>
                                <th class="product-quantity">Jumlah</th>
                                <th class="product-quantity">Stok</th>
                                <th class="product-price">Harga</th>

                                {{-- <th class="product-total">Total</th> --}}
                                <th class="product-remove">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form id="formID" class="col-md-12" enctype="multipart/form-data" method="POST" >
                                {{  csrf_field()  }}
                                @csrf
                                @foreach ($keranjang as $v)
                                    <input type="hidden" name="id[]" value="{{ $v->barang_id }}">
                                    <tr class="text-center">
                                        <td class="product-thumbnail">
                                            <img src="{{ asset('img/barang/' . $v->getBarang->gambar) }}" alt="Image"
                                                class="img-fluid">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black">{{ $v->getBarang->nama_barang }}</h2>
                                        </td>

                                        <td>
                                            <div class="input-group mb-3 d-flex align-items-center quantity-container"
                                                style="max-width: 120px;">
                                                <div hidden class="input-group-prepend">
                                                    <button class="btn btn-outline-black decrease"
                                                        type="button">&minus;</button>
                                                </div>
                                                <input name="jml[]" id="jml[]" type="text"
                                                    class="form-control text-center quantity-amount" value="1"
                                                    placeholder="" aria-label="Example text with button addon"
                                                    aria-describedby="button-addon1">
                                                <div hidden class="input-group-append">
                                                    <button class="btn btn-outline-black increase"
                                                        type="button">&plus;</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <input type="hidden" id="stk[]" value="{{ $v->getBarang->stok }}">
                                            {{ $v->getBarang->stok }}
                                        </td>
                                        <td>
                                            <input type="hidden" id="hrg[]" name="hrg[]"
                                                value="{{ $v->getBarang->harga }}">
                                            Rp. {{ number_format($v->getBarang->harga, 0, ',', '.') }}
                                        </td>
                                        {{-- <td>
                                            Rp. {{ number_format($v->getBarang->harga, 0, ',', '.') }}</td> --}}
                                        <td>
                                            <a href="{{ route('delKeranjang', $v->id) }}" class="btn btn-black btn-sm">X</a>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- </form> --}}
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-6 text-center">
                            {{-- <button class="btn btn-black btn-sm btn-block">Update Cart</button> --}}
                            {{-- <div class="mb-3"> --}}

                            {{-- </div> --}}
                        </div>

                        <div class="col-md-6">
                            <label for="gambar" class="form-label text-black h4">Upload Bukti Pembayaran 081244923164
                                (DANA)</label>
                            <input required type="file" id="gambar" name="gambar" />
                            {{-- <button class="btn btn-outline-black btn-sm btn-block" id="btn-hitung">Hitung</button> --}}

                        </div>
                    </div>

                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Total Pesanan</h3>
                                </div>
                            </div>
                            {{-- <div class="row mb-3">
                                <div class="col-md-6">
                                    <span class="text-black" >Subtotal</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">Rp {{ number_format(13000, 0, ',', '.') }}</strong>
                                </div>
                            </div> --}}
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black" id="totalBayar">Rp
                                        {{ number_format(0, 0, ',', '.') }}</strong>
                                </div>
                            </div>

                            <div class="row">
                               
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-black btn-lg py-3 btn-block"
                                        id="btn-pesanan">Pesanan</button>
                                </div>
                            </form>

                                <div class="col-md-6">
                                    <button class="btn btn-black btn-lg py-3 btn-block" id="btn-hitung">Hitung</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('script2')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Initialize total
            let total = 0;
            let harga;
            let jumlah;
            let data;
            let jml;
            let barang_id;
            let hrg;


            var dataKeranjang = {!! json_encode($keranjang) !!};
            console.log("data keranjang = " + dataKeranjang);
            // var tes = dataKeranjang[0].get_barang.harga;
            // console.log(tes);
            // console.log("total  = " + dataKeranjang.length);
            for (let i = 0; i < dataKeranjang.length; i++) {
                total += parseFloat(dataKeranjang[i].get_barang.harga) * parseFloat(dataKeranjang[i].jumlah);
            }

            $('#btn-hitung').on('click', function() {
                // console.log("//btn-hitung");
                // var jum = document.getElementsByName("jml[]");
                // console.log(jum);
                // barang_id = $("input[name='id[]']").map(function() {
                //     return $(this).val();
                // });
                // console.log('ID value:', id);
                jml = $("input[name='jml[]']")
                    .map(function() {
                        return parseInt($(this).val());
                    }).get();
                console.log('Jumlah value:', jml);
                hrg = $("input[name='hrg[]']")
                    .map(function() {
                        return parseInt($(this).val());
                    }).get();
                console.log('Harga value:', hrg);

                //total 
                total = 0;
                for (let i = 0; i < jml.length; i++) {
                    total += hrg[i] * jml[i];
                }

                $('#totalBayar').text('Rp ' + total.toFixed(0).replace(/\d(?=(\d{3})+$)/g, '$&,'));
                console.log("total = " + total);

            });





            // $('#btn-pesanan').on('click', function() {
            $('#formID').on('submit', function(event) {
                event.preventDefault();

                if ($('#gambar').val() == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Bukti Pembayaran tidak boleh kosong!',
                        timer: 1500
                    })

                }
                var barang_id = $("input[name='id[]']").map(function() {
                    return $(this).val();
                }).get();

                jml = $("input[name='jml[]']")
                    .map(function() {
                        return parseInt($(this).val());
                    }).get();
                var formData = new FormData(this);

                // Append data to FormData object
                for (let i = 0; i < barang_id.length; i++) {
                    formData.append('id[]', barang_id[i]);
                }
                for (let i = 0; i < jml.length; i++) {
                    formData.append('jml[]', jml[i]);
                }
                formData.append('total', total);
                formData.append('gambar', $('#gambar').val());

                $.ajax({
                    url: "{{ route('pesan') }}", // Replace with your form submission URL
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
                            }).then(() => {
                                window.location.href = "{{ route('keranjang') }}";
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
                });

                // Close the modal after form submission
                // $('#basicModal').modal('hide');
            });


            // Update total function
            // function updateTotal() {
            //     total = 0;

            //     // Loop through all cart items and update total
            //     for (let i = 0; i < dataKeranjang.length; i++) {
            //         let price = dataKeranjang[i].getBarang.harga;
            //         let quantity = dataKeranjang[i].quantity;
            //         total += price * quantity;
            //     }

            //     // Update the totalBayar element
            //     $('#totalBayar').text('Rp ' + total.toFixed(0).replace(/\d(?=(\d{3})+$)/g, '$&,'));
            // }

            // // Initial total display
            // updateTotal();



            // Update total when a checkbox is checked or unchecked
            // $('input[name="check[]"]').change(function() {
            //     total = 0;

            //     // Loop through checked checkboxes and update total
            //     $('input[name="check[]"]:checked').each(function() {
            //         // get harga and quantity from name harga[] and jumlah[]
            //         let price = $(this).closest('.row').find('input[name="harga[]"]').val();
            //         let quantity = $(this).closest('.row').find('input[name="jumlah[]"]').val();
            //         console.log('Price:', price, 'Quantity:', quantity);

            //         // Try to parse as a float
            //         price = parseFloat(price.replace('Rp ', '').replace(',', ''));

            //         if (!isNaN(price)) {

            //             // Multiply the price by quantity and add to the total
            //             total += price * quantity;
            //         } else {
            //             console.error('Invalid price:', $(this).closest('.row').find(
            //                 '.text-center h3').text());
            //         }
            //     });
            //     console.log(total);
            //     $('#total').val(total);
            //     // Update the totalBayar element
            //     $('#totalBayar').text(total);

            //     // Log the total whenever it changes
            //     console.log('Total:', total);
            // });

            // console.log(total);
            // $('#form').on('submit', function(event) {
            //     event.preventDefault();
            //     let formData = new FormData(this);
            //     let cek = $('input[name="check[]"]:checked').length;
            //     console.log(cek);
            //     if (cek > 0) {
            //         formData = formData;
            //         console.log(cek);
            //         console.log(formData);
            //         // } else if (cek > 1) {
            //         //     console.log(cek);
            //         //     $('input[name="check[]"]:checked').each(function() {
            //         //         formData.append('check[]', $(this).val());
            //         //     });
            //     } else {
            //         formData = null;
            //         console.log('No checkboxes are checked.');
            //     }
            //     // formData = barang_id;
            //     var url = "{{ route('pesan') }}";

            //     $.ajax({
            //         url: url,
            //         method: "POST",
            //         data: formData,
            //         contentType: false,
            //         cache: false,
            //         processData: false,
            //         dataType: "json",
            //         success: function(data) {
            //             console.log(data);
            //             if (data.status == 'success') {
            //                 Swal.fire({
            //                     position: 'center',
            //                     icon: 'success',
            //                     title: 'Berhasil',
            //                     showConfirmButton: false,
            //                     timer: 1500
            //                 })
            //             } else {
            //                 Swal.fire({
            //                     position: 'center',
            //                     icon: 'error',
            //                     title: 'Gagal',
            //                     showConfirmButton: false,
            //                     timer: 1500
            //                 })
            //             }


            //         },
            //         error: function(data) {
            //             console.log(data);


            //         }
            //     })
            //     $('#exampleModal').modal('hide');
            //     // $("#exampleModal").removeClass("in");
            //     $(".modal-backdrop").remove();
            //     // $("#exampleModal").hide();
            // });
        })
    </script>
@endpush
