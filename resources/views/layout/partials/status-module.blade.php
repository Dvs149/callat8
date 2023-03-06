{{-- status model pop up --}}
<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to status?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Click on "Save" if you are ready to change the status of the record or else click no.</div>
        <div class="modal-footer">
          <input type="hidden" id="status-id" name="id" value="">
          <input type="hidden" id="booking_status" name="booking_status" value="">
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="status-booking">Save</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">NO</button>
        </div>
      </div>
    </div>
  </div>
{{-- status model pop up ends here--}}