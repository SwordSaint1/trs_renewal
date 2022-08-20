<!-- Modal -->
<div class="modal fade" id="update_scheduless" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Schedule <br>
<input type="text" name="" id="id_training_code_update" class="form-control" readonly>
<input type="hidden" name="" id="user_update_sched" value="<?=$name;?>">
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="" id="id_sched_update">
        
        <div class="row">
          <div class="col-3">
              <label>Examiner:</label> <input type="text" name="trainer_update_sched" id="trainer_update_sched" class="form-control" autocomplete="off">
            </div>
          <div class="col-3">
              <label>Location: &nbsp;&nbsp;</label> 
             <!--  <input type="text" name="location_update_sched" id="location_update_sched" class="form-control" autocomplete="off"> -->
               <input list="location" name="location_update_sched" id="location_update_sched" class="form-control">
  <datalist id="location">
    <option value="Admin 1st Floor (Qualification Area)">
  </datalist>
            </div>
       
         
          <div class="col-3">
              <label>Shift: &nbsp;&nbsp;</label>
              <select class="form-control" id="shift_update_sched">
                <option value="">Select Shift</option>
                <option value="DS">DS</option>
                <option value="NS">NS</option>
              </select>
            </div>
            <div class="col-3">
              <label>Slot:</label> <input type="number" name="slot_update_sched" id="slot_update_sched" class="form-control" autocomplete="off" autocomplete="off" onkeypress="return event.charCode >= 48" min="1">
            </div>
        </div>

        <div class="row">
               <div class="col-3">
              <label>Start Date: &nbsp;&nbsp;</label> <input type="date" name="start_date_update_sched" id="start_date_update_sched" class="form-control">
            </div>    
            <div class="col-3">
              <label>End Date:</label> <input type="date" name="end_date_update_sched" id="end_date_update_sched" class="form-control" autocomplete="off">
            </div>
            <div class="col-3">
              <label>Start Time:</label> <input type="time" name="start_time_update_sched" id="start_time_update_sched" class="form-control" autocomplete="off">
            </div>
             <div class="col-3">
              <label>End Time:</label> <input type="time" name="end_time_update_sched" id="end_time_update_sched" class="form-control" autocomplete="off">
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="update_sched()">Update Schedule</button>
      </div>
    </div>
  </div>
</div>