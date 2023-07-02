<!-- Modal Import Excel-->
<div class="modal fade" id="importmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('bobotpertanyaan.import') }}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Import Data</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="file" id="file" name="file" required="required">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i>&nbspClose</button>
                    <button type="submit" class="btn btn-success"><i class="bi bi-file-earmark-plus"></i>&nbspImport</button>
                </div>
            </div>
        </form>
    </div>
</div>