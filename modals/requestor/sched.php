<!-- Modal -->
<div class="modal fade" id="sched_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Schedule for Renewal<br>
<input type="text" name="" id="id_training_code_update" class="form-control" readonly>
<input type="hidden" name="" id="sched_by" value="<?=$name;?>">
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="close()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="" id="id_view_req">
        
        <div class="row">
          <div class="col-3">
              <label>Examiner:</label> <input type="text" name="trainer_view_req" id="trainer_view_req" class="form-control" autocomplete="off" readonly>
            </div>
          <div class="col-3">
              <label>Location: &nbsp;&nbsp;</label> 
              <input type="text" name="location_view_req" id="location_view_req" class="form-control" autocomplete="off" readonly> 
            </div>
       
         
          <div class="col-3">
              <label>Shift: &nbsp;&nbsp;</label>
              <input type="text" name="shift_view_req" id="shift_view_req" class="form-control" autocomplete="off" readonly> 
            </div>
            <div class="col-3">
              <label>Slot:</label> <input type="number" name="slot_view_req" id="slot_view_req" class="form-control" autocomplete="off" autocomplete="off" onkeypress="return event.charCode >= 48" min="1" readonly>
            </div>
        </div>

        <div class="row">
               <div class="col-3">
              <label>Start Date: &nbsp;&nbsp;</label> <input type="date" name="start_date_view_req" id="start_date_view_req" class="form-control" readonly>
            </div>    
            <div class="col-3">
              <label>End Date:</label> <input type="date" name="end_date_view_req" id="end_date_view_req" class="form-control" autocomplete="off" readonly>
            </div>
            <div class="col-3">
              <label>Start Time:</label> <input type="time" name="start_time_view_req" id="start_time_view_req" class="form-control" autocomplete="off" readonly>
            </div>
             <div class="col-3">
              <label>End Time:</label> <input type="time" name="end_time_view_req" id="end_time_view_req" class="form-control" autocomplete="off" readonly>
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
              <input type="text" name="" id="fname_for_sched" placeholder="Full Name" class="form-control">
            </div>    
             <div class="col-3">
              <!-- <input type="text" name="" id="process_for_sched" placeholder="Process" class="form-control"> -->
               <input type="text" list="list" name="process_for_sched" id="process_for_sched" class="form-control" placeholder="Process">
                    <datalist id="list" name="">
                      <?php
                            require '../../process/conn2.php';
                            $query = "SELECT DISTINCT eprocess FROM trs_category";
                            $stmt = $conn2->prepare($query);
                            $stmt->execute();
                            foreach($stmt->fetchALL() as $row){
                             echo '<option value="'.$row['eprocess'].'">';
                            }
                           
                     ?>
                    </datalist>
            </div> 
            <div class="col-3">
              <p style="text-align:center;">
              <button class="btn btn-primary" onclick="sched()">Schedule</button>
              </p>
            </div>    
      </div>
<hr>
      <div class="row">
          <div class="col-12">
             <div class="card-body table-responsive p-0" style="height: 420px;">
                <table class="table table-head-fixed text-nowrap table-hover" id="">
                <thead style="text-align:center;">
                  <th style="text-align:center;">
                      <input type="checkbox" name="" id="check_all_req_for_sched" onclick="select_all_func()">
                    </th>
                    <th>#</th>
                    <th>Code</th>
                    <th>Process</th>
                    <th>Expiration on Month</th>
                    <th>Authorization No</th>
                    <th>Name</th>
                    <th>FALP ID No</th>
                    <th>SP ID No</th>
            </thead>
            <tbody id="list_of_req_for_sched" style="text-align:center;"></tbody>
                </table>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>