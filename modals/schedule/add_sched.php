<div class="modal fade bd-example-modal-lg" id="add_sched" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Add Schedule</b>
          <br>
          <div id="trcode"></div>
        </h5>
         <input type="hidden" name="" id="user_add_sched" value="<?=$name;?>">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <div class="row">
           <div class="col-3">
              <label>Examiner:</label> <input type="text" name="trainer_add_sched" id="trainer_add_sched" class="form-control" autocomplete="off">
            </div>
          <div class="col-3">
              <label>Location: &nbsp;&nbsp;</label> 
            <!--   <input type="text" name="location_add_sched" id="location_add_sched" class="form-control" autocomplete="off"> -->

              <input list="location" name="location_add_sched" id="location_add_sched" class="form-control">
  <datalist id="location">
    <option value="Admin 1st Floor (Qualification Area)">
  </datalist>
            </div>
          
    
          <!--  <div class="col-4">
              <label>Process:</label> <input type="text" name="process_add_sched" id="process_add_sched" class="form-control" autocomplete="off">
            </div> -->
          <div class="col-3">
              <label>Shift: &nbsp;&nbsp;</label>
              <select class="form-control" id="shift_add_sched">
                <option value="">Select Shift</option>
                <option value="DS">DS</option>
                <option value="NS">NS</option>
              </select>
            </div>
            <div class="col-3">
              <label>Slot:</label> <input type="number" name="slot_add_sched" id="slot_add_sched" class="form-control" autocomplete="off" autocomplete="off" onkeypress="return event.charCode >= 48" min="1">
            </div>
                
        </div>

        <div class="row">  
            <div class="col-3">
              <label>Start Date: &nbsp;&nbsp;</label> <input type="date" name="start_date_add_sched" id="start_date_add_sched" class="form-control">
            </div>    
            <div class="col-3">
              <label>End Date:</label> <input type="date" name="end_date_add_sched" id="end_date_add_sched" class="form-control" autocomplete="off">
            </div>
            <div class="col-3">
              <label>Start Time:</label> <input type="time" name="start_time_add_sched" id="start_time_add_sched" class="form-control" autocomplete="off">
            </div>
             <div class="col-3">
              <label>End Time:</label> <input type="time" name="end_time_add_sched" id="end_time_add_sched" class="form-control" autocomplete="off">
            </div>
                
      </div>
<br>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="#" class="btn btn-primary" onclick="register_sched()">Register Schedule</a>
      </div>
    </div>
  </div>
</div>