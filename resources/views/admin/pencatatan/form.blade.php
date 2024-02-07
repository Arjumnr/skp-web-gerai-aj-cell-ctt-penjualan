{{-- modal form --}}
<div class="modal " id="modal-form" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Form Pencatatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form">
                    @csrf
                    <input type="hidden" name="data_id" id="data_id">
                    <div class="mb-3">
                        <label for="barang_id" class="form-label">Barang</label>
                        <select class="form-select" id="barang_id" name="barang_id">
                            <option selected>--- Pilih Provider ---</option>
                            @foreach ($barang as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga"
                            placeholder="Enter your Harga" />
                    </div>
                    <div class="mb-3">
                        <label for="provider_id" class="form-label">Provider</label>
                        <select class="form-select" id="provider_id" name="provider_id">
                            <option selected>--- Pilih Provider ---</option>
                            @foreach ($provider as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_provider }}</option>
                            @endforeach
                        </select>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" form="form" class="btn btn-primary" id="btn-simpan">Save</button>
            </div>
        </div>
    </div>
</div>
