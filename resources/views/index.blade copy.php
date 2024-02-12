@extends('layouts.index')
@section('content')
    {{-- <div class=" brand_color row justify-content-center">
        <section class="slider_section">
            <div id="main_slider" class="carousel slide banner-main" data-ride="carousel">
                <img src="{{ asset('themes/images/provider.jpg') }}" />
            </div>
        </section>
    </div> --}}

    {{-- </section> --}}


    <div class="product">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>our <strong class="black">products</strong></h2>
                        <span>We package the products with best services to make you a happy customer.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-bg">
        <div class="product-bg-white">
            <div class="container">
                <div class="row">
                    {{-- @foreach ($barang as $v)
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                            <div class="product-box" id="product">
                                <i><img src="{{ asset('img/barang/' . $v->gambar) }}" /></i>
                                <h3>{{ $v->nama_barang }}</h3>
                                
                                <span>Rp. {{ number_format($v->harga) }}</span>
                            </div>
                        </div>
                    @endforeach --}}
                    @foreach ($barang as $v)
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                            <div class="product-box">
                                <h6 style="color: white;">{{ $v->id }}</h6>
                                <i><img src="{{ asset('img/barang/' . $v->gambar) }}" />
                                </i>
                                <h3>{{ $v->nama_barang }}</h3>
                                <span>Rp. {{ number_format($v->harga) }}</span>
                                <br>
                                <br>
                                <button class="open-modal btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Keranjang
                                </button>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
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

    <!-- end our product -->
    <!-- map -->
    <div class="container-fluid padi">
        <div class="map">
            <img src="{{ asset('themes/images/mapimg.jpg') }}" alt="img" />
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form" {{-- method="POST" action="{{ route('addKeranjang') }}" --}}>
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Modal body content goes here -->
                        <input hidden id="modalProductId" name="product_id">
                        <h3 id="modalProductName" name="product_name"></h3>
                        <h3 id="modalProductPrice" name="product_price"></h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btn-simpan">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            // $('#modalID').modal('show');
            // $.noConflict();



            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            var openModalButtons = document.querySelectorAll('.open-modal');
            openModalButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var productName = button.closest('.product-box').querySelector('h3')
                        .textContent;
                    var productPrice = button.closest('.product-box').querySelector('span')
                        .textContent;
                    var barangId = button.closest('.product-box').querySelector('h6')
                        .textContent; // Extract text content

                    // Set modal content based on the extracted information
                    var modalProductName = document.getElementById('modalProductName');
                    var modalProductPrice = document.getElementById('modalProductPrice');
                    var modalProductId = document.getElementById('modalProductId');

                    modalProductName.textContent = 'Barang : ' + productName;
                    modalProductPrice.textContent = 'Harga : ' + productPrice;
                    modalProductId.value =
                        barangId; // Set the value of the input instead of text content

                    // Show the modal
                    $('#exampleModal').modal('show');
                });
            });



            // $('#exampleModal').on('hidden.bs.modal', function() {
            //     $('.modal-backdrop').remove();
            //     // location.reload();
            // });
        });

        $('#form').on('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            console.log(formData.get('product_id'));
            // var id = $('#data_id').val();
            var url = "{{ route('addKeranjang') }}";
            // if (id != '') {
            //     //kirim id lewat form data 
            //     formData.append('data_id', id);
            // }
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


        // function addToCart() {
        //     var productName = document.getElementById('modalProductName').textContent;
        //     var productPrice = document.getElementById('modalProductPrice').textContent;
        //     var barangId = document.getElementById('modalProductId').value;

        // alert('Product added to cart!\n' + productName + '\nHargav: ' + productPrice +
        //     '\nBarang IDv: ' + barangId);

        // TODO: Send a POST request to your server with the data (productName, productPrice, quantity, barangId)
        // Example using fetch:


        // }
    </script>
@endpush
