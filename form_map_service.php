<?php
include 'header.php';
include 'Ajax/db_config.php'; // Database connection

// Fetch employees
$stmt = $conn->prepare("SELECT id, first_name FROM Employees");
$stmt->execute();
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch services
$stmt = $conn->prepare("SELECT service_id, name FROM services");
$stmt->execute();
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<section id="main-content">
  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-title">
          <h4>Employee and Service Mapping</h4>
        </div>
        <div class="card-body">
          <div class="basic-form">
            <form action="Ajax/assign_services.php" method="POST">
              
              <!-- Employee Selection -->
              <div class="form-group">
                <p class="text-muted m-b-15 f-s-12">Select Employee</p>
                <select name="employee_id" class="form-control input-flat">
                  <option value="">Select Employee</option>
                  <?php foreach ($employees as $employee): ?>
                    <option value="<?php echo htmlspecialchars($employee['id']); ?>">
                      <?php echo htmlspecialchars($employee['first_name']); ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>

              <!-- Services Selection -->
              <div class="form-group">
                <p class="text-muted m-b-15 f-s-12">Select Services</p>
                <select name="service_id" class="form-control input-flat">
                  <option value="">Select Service</option>
                  <?php foreach ($services as $service): ?>
                    <option value="<?php echo htmlspecialchars($service['service_id']); ?>">
                      <?php echo htmlspecialchars($service['name']); ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                <!-- <small>Hold Ctrl (Windows) or Command (Mac) to select multiple services.</small> -->
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Scripts -->
<script src="assets/js/lib/jquery.min.js"></script>
<script src="assets/js/lib/bootstrap.min.js"></script>
<script src="assets/js/scripts.js"></script>

<style>
  input[type="checkbox"] {
    display: inline-block;
    margin-right: 10px;
    vertical-align: middle;
  }
</style>
</body>
</html>
