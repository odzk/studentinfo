<div class="modal fade" id="confirm">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                <p class="text-center"><strong>Are you sure you, want to delete?</strong></p>
            </div>
            <div class="modal-footer">


            {{ Form::open(['url' => [''], 'method' => 'delete', 'id'=>'deleteForm']) }}


                <button type="submit" class="btn btn-sm btn-danger">Delete</button></a>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            
            {{ Form::close() }}

            <script>
                function deleteRecord(id) {
                document.getElementById('deleteForm').action = window.location.href + "/delete/" + id;
                }
            </script>

            </div>
        </div>
    </div>
</div>
