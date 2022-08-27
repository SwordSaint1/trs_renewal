<!-- Modal -->
<div class="modal fade" id="passed" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document" style="min-width: 90%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title col-11" id="exampleModalLabel">List of Passed<br>
          <div class="row">
              <div class="col-3">
                <div id="rowscount" hidden></div>
                  <input type="text" name="" id="id_training_code_passed" class="form-control" readonly>
                  <input type="hidden" name="" id="user_commit_sched" value="<?=$name;?>">
              </div>
              <div class="col-9">
                <p style="text-align:right;">
                    <a href="#" class="btn btn-success" onclick="export_passed('table_passed')">Export Data</a>
                </p>
              </div>
          </div>

        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="close()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="" id="id_passed">
        
        <div class="row">
          <div class="col-3">
              <label>Examiner:</label> <input type="text" name="trainer_passed" id="trainer_passed" class="form-control" autocomplete="off" readonly>
            </div>
          <div class="col-3">
              <label>Location: &nbsp;&nbsp;</label> 
              <input type="text" name="location_passed" id="location_passed" class="form-control" autocomplete="off" readonly> 
            </div>
       
         
          <div class="col-3">
              <label>Shift: &nbsp;&nbsp;</label>
              <input type="text" name="shift_passeds" id="shift_passeds" class="form-control" autocomplete="off" readonly> 
            </div>
            <div class="col-3">
              <label>Slot:</label> <input type="number" name="slot_passed" id="slot_passed" class="form-control" autocomplete="off" autocomplete="off" onkeypress="return event.charCode >= 48" min="1" readonly>
            </div>
        </div>

        <div class="row">
               <div class="col-3">
              <label>Start Date: &nbsp;&nbsp;</label> <input type="date" name="start_date_passeds" id="start_date_passeds" class="form-control" readonly>
            </div>    
            <div class="col-3">
              <label>End Date:</label> <input type="date" name="end_date_passed" id="end_date_passed" class="form-control" autocomplete="off" readonly>
            </div>
            <div class="col-3">
              <label>Start Time:</label> <input type="time" name="start_time_passed" id="start_time_passed" class="form-control" autocomplete="off" readonly>
            </div>
             <div class="col-3">
              <label>End Time:</label> <input type="time" name="end_time_passed" id="end_time_passed" class="form-control" autocomplete="off" readonly>
            </div>
        </div>
      </div>
      <div class="row">
          <div class="col-12">
             <div class="card-body table-responsive p-0" style="height: 420px;">
                <table class="table table-head-fixed text-nowrap table-hover" id="table_passed">
                <thead style="text-align:center;">
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
                    <th>Exam Start Date</th>
                    <th>Examiner</th>
            </thead>
            <tbody id="list_of_passed" style="text-align:center;"></tbody>
                </table>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>