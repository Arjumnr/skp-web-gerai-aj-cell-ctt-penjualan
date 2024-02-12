{{-- modal form --}}
{{-- <div class="modal " id="modal-form" tabindex="-1" aria-hidden="true" role="dialog"> --}}
<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    {{-- <div class="modal-dialog modal-lg" role="document"> --}}
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Form Provider</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form">
                    @csrf
                    <input type="hidden" name="data_id" id="data_id">
                    <div class="mb-3">
                        <label for="nama_provider" class="form-label">Nama Provider</label>
                        <input type="text" class="form-control" id="nama_provider" name="nama_provider"
                            placeholder="Enter your Provider" />
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" form="form" class="btn btn-primary" id="btn-simpan">Simpan</button>
            </div>
        </div>
    </div>
</div>
