<!-- Modal -->
<div class="modal fade" id="failed_req" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document" style="min-width: 90%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title col-11" id="exampleModalLabel">List of Failed<br>
          <div class="row">
              <div class="col-3">
                <div id="rowscount" hidden></div>
                  <input type="text" name="" id="id_training_code_failed_req" class="form-control" readonly>
                  <input type="hidden" name="" id="failed_requested_by_prev" value="<?=$name;?>">
              </div>
              <div class="col-9">
                <p style="text-align:right;">
                    <a href="#" class="btn btn-success" onclick="export_failed_req('table_failed_req')">Export Data</a>
                </p>
              </div>
          </div>
          <div class="row">
            <div class="col-12">
              <table style="width:100%; font-size: 20px;">
                <tr>
                  <th style="border: 1px solid black; border-collapse: collapse; width: 33%;"><label style="color:blue;">Retain</label>
              - Must Undergo & Passed Ojt Before Taking Authorization Renewal</th>
                  <th style="border: 1px solid black; border-collapse: collapse; width: 33%;"><label style="color:blue">Stop Processing</label>
              - Authorized to Other Process</th> 
                  <th style="border: 1px solid black; border-collapse: collapse; width: 33%;"><label style="color:blue">Transfer To Other Process</label>
              - P.I.C. Must Process Training Requisition</th>
                </tr>
              </table>
            </div>
          </div>
          
          

        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="close()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="" id="id_failed_req">
        
        <div class="row">
          <div class="col-3">
              <label>Examiner:</label> <input type="text" name="trainer_failed_req" id="trainer_failed_req" class="form-control" autocomplete="off" readonly>
            </div>
          <div class="col-3">
              <label>Location: &nbsp;&nbsp;</label> 
              <input type="text" name="location_failed_req" id="location_failed_req" class="form-control" autocomplete="off" readonly> 
            </div>
       
         
          <div class="col-3">
              <label>Shift: &nbsp;&nbsp;</label>
              <input type="text" name="shift_failed_reqs" id="shift_failed_reqs" class="form-control" autocomplete="off" readonly> 
            </div>
            <div class="col-3">
              <label>Slot:</label> <input type="number" name="slot_failed_req" id="slot_failed_req" class="form-control" autocomplete="off" autocomplete="off" onkeypress="return event.charCode >= 48" min="1" readonly>
            </div>
        </div>

        <div class="row">
               <div class="col-3">
              <label>Start Date: &nbsp;&nbsp;</label> <input type="date" name="start_date_failed_reqs" id="start_date_failed_reqs" class="form-control" readonly>
            </div>    
            <div class="col-3">
              <label>End Date:</label> <input type="date" name="end_date_failed_req" id="end_date_failed_req" class="form-control" autocomplete="off" readonly>
            </div>
            <div class="col-3">
              <label>Start Time:</label> <input type="time" name="start_time_failed_req" id="start_time_failed_req" class="form-control" autocomplete="off" readonly>
            </div>
             <div class="col-3">
              <label>End Time:</label> <input type="time" name="end_time_failed_req" id="end_time_failed_req" class="form-control" autocomplete="off" readonly>
            </div>
        </div>
      </div>

      <div class="row">
        <div class="col-4">
          <p style="text-align:center;"><a href="#" class="btn btn-secondary" onclick="uncheck_all()">Uncheck</a></p>
        </div>
        <div class="col-4">
          <select id="final_status" class="form-control">
            <option value="">Select Status</option>
            <option value="Retain">Retain</option>
            <option value="Stop_Processing">Stop Processing</option>
            <option value="Transfer">Transfer to Other Process</option>
          </select>
        </div>
        <div class="col-4">
         <p style="text-align:center;"> <a href="#" class="btn btn-primary" onclick="submit_final_status()">Submit</a></p>
        </div>
      </div>

      <div class="row">
          <div class="col-12">
             <div class="card-body table-responsive p-0" style="height: 420px;">
                <table class="table table-head-fixed text-nowrap table-hover" id="table_failed_req">
                <thead style="text-align:center;">
                    <th style="text-align:center;">
                      <input type="checkbox" name="" id="check_all_final_status" onclick="select_all_func()">
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
                    <th>Remarks</th>
            </thead>
            <tbody id="list_of_failed_req" style="text-align:center;"></tbody>
                </table>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>