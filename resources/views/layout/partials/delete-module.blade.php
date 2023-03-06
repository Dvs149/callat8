{{-- logout model pop up --}}
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Yes" below if you are ready to delete the record or else click no.</div>
        <div class="modal-footer">
          <input type="hidden" id="delete-id" value="">
          {{-- <button class="btn btn-primary" type="button" id='delete-id' data-dismiss="modal" >Yes</button> --}}
          
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="delete-user">Yes</button>


          <button class="btn btn-secondary" type="button" data-dismiss="modal">NO</button>
        </div>
      </div>
    </div>
  </div>
{{-- logout model pop up ends here--}}