<!-- Modal -->
<div class="modal fade" id="for_authorization" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document" style="min-width: 90%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title col-11" id="exampleModalLabel">For Authorization<br>
          <div class="row">
              <div class="col-3">
                <div id="rowscount" hidden></div>
                  <input type="text" name="" id="id_training_code_for_auth" class="form-control" readonly>
                  <input type="hidden" name="" id="user_commit_sched" value="<?=$name;?>">
              </div>
              <div class="col-9">
                <p style="text-align:right">
                  <button class="btn btn-danger" id="close_scheds" onclick="close_sched()" disabled="">Close Schedule</button>
                </p>
              </div>

          </div>

        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="close()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="" id="id_for_auth">
        
        <div class="row">
          <div class="col-3">
              <label>Examiner:</label> <input type="text" name="trainer_for_auth" id="trainer_for_auth" class="form-control" autocomplete="off" readonly>
            </div>
          <div class="col-3">
              <label>Location: &nbsp;&nbsp;</label> 
              <input type="text" name="location_for_auth" id="location_for_auth" class="form-control" autocomplete="off" readonly> 
            </div>
       
         
          <div class="col-3">
              <label>Shift: &nbsp;&nbsp;</label>
              <input type="text" name="shift_for_auths" id="shift_for_auths" class="form-control" autocomplete="off" readonly> 
            </div>
            <div class="col-3">
              <label>Slot:</label> <input type="number" name="slot_for_auth" id="slot_for_auth" class="form-control" autocomplete="off" autocomplete="off" onkeypress="return event.charCode >= 48" min="1" readonly>
            </div>
        </div>

        <div class="row">
               <div class="col-3">
              <label>Start Date: &nbsp;&nbsp;</label> <input type="date" name="start_date_for_auth" id="start_date_for_auth" class="form-control" readonly>
            </div>    
            <div class="col-3">
              <label>End Date:</label> <input type="date" name="end_date_for_auth" id="end_date_for_auth" class="form-control" autocomplete="off" readonly>
            </div>
            <div class="col-3">
              <label>Start Time:</label> <input type="time" name="start_time_for_auth" id="start_time_for_auth" class="form-control" autocomplete="off" readonly>
            </div>
             <div class="col-3">
              <label>End Time:</label> <input type="time" name="end_time_for_auth" id="end_time_for_auth" class="form-control" autocomplete="off" readonly>
            </div>
        </div>
      </div>
<hr>
      <div class="row">
            <div class="col-3">
              <p style="text-align: center;">
              <button class="btn btn-secondary" onclick="uncheck_all()">Uncheck</button>
            </p>
            </div> 
            <div class="col-3">
                <select id="attendance_status_for_auth" class="form-control">
                <option value="">Select Attendance Status</option>
                <option value="Attend">Attend</option>
                <option value="Did_not_Attend">Did not Attend</option>
              </select>
            </div>    
             <div class="col-3">
              <select id="exam_status_for_auth" class="form-control">
                <option value="">Select Exam Status</option>
                <option value="Passed">Passed</option>
                <option value="Failed">Failed</option>
                <option value="Ongoing">Ongoing</option>
                <option value="Cancelled">Cancelled</option>
              </select>
            </div> 
            <div class="col-3">
              <p style="text-align:center;">
              <button class="btn btn-primary" onclick="submit()">Submit</button>
              </p>
            </div>    
      </div>
<hr>
      <div class="row">
          <div class="col-12">
             <div class="card-body table-responsive p-0" style="height: 420px;">
                <table class="table table-head-fixed text-nowrap table-hover" id="table_row">
                <thead style="text-align:center;">
                  <th style="text-align:center;">
                      <input type="checkbox" name="" id="check_all_for_auth" onclick="select_all_func()">
                    </th>
                    <th>#</th>
                    <th>Code</th>
                    <th>Process</th>
                    <th>Expiration on Month</th>
                    <th>Authorization No</th>
                    <th>Name</th>
                    <th>FALP ID No</th>
                    <th>SP ID No</th>
                    <th>Exam Status</th>
                    <th>Attendance Status</th>
            </thead>
            <tbody id="list_of_for_athorization" style="text-align:center;"></tbody>
                </table>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>