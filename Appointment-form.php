<?php
include 'header.php';
include 'Ajax/db_config.php'; // Database connection

// Fetch data from services table
$query = "SELECT Service_id, name FROM services";
$stmt = $conn->prepare($query);
$stmt->execute();
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT id, first_name FROM Employees";
$stmt = $conn->prepare($query);
$stmt->execute();
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
          <!-- /# row -->
          <section id="main-content">
            <div class="row">
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-title">
                    <h4>Appointment Booking Form</h4>
                  </div>
                  <div class="card-body">
                    <div class="basic-form">
                      <form action="Ajax/insert_appdata.php" method="POST">
                        <div class="form-group">
                          <p class="text-muted m-b-15 f-s-12">Customer Name</p>
                          <input
                            type="text"
                            name="customer_name"
                            class="form-control input-default"
                            placeholder="Customer Name"
                          />
                        </div>
                        <div class="form-group">
                          <p class="text-muted m-b-15 f-s-12">Mobile Number</p>
                          <input
                            type="number"
                            name="mobile_number"
                            class="form-control input-flat"
                            placeholder="Mobile Number"
                          />
                        </div>
                        <div class="form-group">
                          <p class="text-muted m-b-15 f-s-12">Email Address</p>
                          <input
                            type="email"
                            name="email"
                            class="form-control input-rounded"
                            placeholder="Email Address"
                          />
                        </div>
                        <div class="form-group">
                          <label>Appointment Date</label>
                          <input
                            type="date"
                            name="appointment_date"
                            class="form-control"
                            placeholder="Date"
                          />
                        </div>
                        <div class="form-group">
                          <label>Appointment time</label>
                          <input
                            type="time"
                            name="appointment_time"
                            class="form-control"
                            placeholder="Time"
                          />
                        </div>
                      
                        <div class="form-group">
  <p class="text-muted m-b-15 f-s-12">Select Services and Employees</p>
  <div id="service-employee-container">
    <div class="row" style="display: flex; gap: 10px;">
      <div>
        <select name="service_ids[]" class="form-control input-flat">
          <option value="">Select Service</option>
          <?php foreach ($services as $service): ?>
            <option value="<?php echo htmlspecialchars($service['service_id']); ?>">
              <?php echo htmlspecialchars($service['name']); ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div>
        <select name="employee_ids[]" class="form-control input-flat">
          <option value="">Select Employee</option>
          <?php foreach ($employees as $employee): ?>
            <option value="<?php echo htmlspecialchars($employee['id']); ?>">
              <?php echo htmlspecialchars($employee['first_name']); ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
  </div>
  <button type="button" class="btn btn-primary mt-3" id="add-more-button" onclick="addServiceEmployeeRow()">Add More</button>
</div>
                        
                        <div class="form-group">
                          <label>Service Duration</label>
                          <div class="d-flex">
    <input
      type="number"
      name="service_duration_hours"
      class="form-control"
      placeholder="Hours"
      min="0"
    />
    <input
      type="number"
      name="service_duration_minutes"
      class="form-control"
      placeholder="Minutes"
      min="0"
      max="59"
    />
  </div>
                        </div>
                      
                        <div class="form-group">
                          <p class="text-muted m-b-15 f-s-12">Appointment Status</p>
                          <select
                            name="enquiry_status"
                            class="form-control input-Webstrot"
                          >
                            <option value="" disabled selected>
                              Select an option
                            </option>
                            <option value="pending">Pending</option>
                            <option value="follow-up">Follow-up</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="rejected">Rejected</option>
                          </select>
                        </div>

                        <button type="submit" class="btn btn-primary">
                          Submit
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <div class="footer">
                  <p>2018 © mid Admin Board by <a href="#">webstrot.</a></p>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>

    <!-- jquery vendor -->
    <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <!-- bootstrap -->

    <script src="assets/js/lib/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <!-- scripit init-->
  </body>
  <style>
    input[type="checkbox"] {
      display: inline-block;
      margin-right: 10px;
      vertical-align: middle;
    }
    .service-options {
      margin-left: 20px;
    }
  </style>



<script>

    $(document).ready(function() {
        $('#preferred_date, #preferred_time').on('change', function() {
            var date = $('#preferred_date').val();
            var time = $('#preferred_time').val();

            if (date && time) {
                $.ajax({
                    url: 'fetch_available_employees.php',
                    type: 'POST',
                    data: { date: date, time: time },
                    success: function(response) {
                        var employees = JSON.parse(response);
                        var employeeSelect = $('select[name="employee_id[]"]');
                        employeeSelect.empty();
                        employeeSelect.append('<option value="">Select Employee</option>');
                        $.each(employees, function(index, employee) {
                            employeeSelect.append('<option value="' + employee.id + '">' + employee.first_name + '</option>');
                        });
                    }
                });
            }
        });
    });


function addServiceEmployeeRow() {
  var container = document.getElementById('service-employee-container');
  var newRow = document.createElement('div');
  newRow.className = 'row';
  newRow.style.display = 'flex';
  newRow.style.gap = '10px';
  newRow.innerHTML = `
    <div>
      <select name="service_ids[]" class="form-control input-flat">
        <option value="">Select Service</option>
        <?php foreach ($services as $service): ?>
          <option value="<?php echo htmlspecialchars($service['service_id']); ?>">
            <?php echo htmlspecialchars($service['name']); ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <div>
      <select name="employee_ids[]" class="form-control input-flat">
        <option value="">Select Employee</option>
        <?php foreach ($employees as $employee): ?>
          <option value="<?php echo htmlspecialchars($employee['id']); ?>">
            <?php echo htmlspecialchars($employee['first_name']); ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <button type="button" class="btn btn-danger" onclick="removeServiceEmployeeRow(this)">Remove</button>
  `;
  container.appendChild(newRow);
  container.appendChild(document.getElementById('add-more-button'));
}

function removeServiceEmployeeRow(button) {
  var row = button.parentNode;
  row.parentNode.removeChild(row);
}
</script>
</html>
