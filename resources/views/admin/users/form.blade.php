{{-- modal form --}}
{{-- <div class="modal " id="modal-form" tabindex="-1" aria-hidden="true" role="dialog"> --}}
<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    {{-- <div class="modal-dialog modal-lg" role="document"> --}}
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Form User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="data_id" id="data_id">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                             />
                    </div>
                  
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            />
                    </div>

                    {{-- level --}}
                    <div class="mb-3">
                        <label for="level" class="form-label">Level</label>
                        <select class="form-select" id="level" name="level">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            />
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
