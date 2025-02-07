<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'header.php';
include 'Ajax/db_config.php'; // Database connection

// Fetch data from services table
$query = "SELECT id, first_name, last_name, email, mobile_number, date_of_birth, gender, city,state, pincode, address,department, designation,joining_date,employment_type,employee_status, created_at, updated_at   FROM Employees";
$stmt = $conn->prepare($query);
$stmt->execute();
$employee = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

                <section id="main-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h4>Enquiries Table</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                                    <th>ID</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email</th>
                                                    <th>Mobile Number</th>
                                                    <th>Date of Birth</th>
                                                    <th>Gender</th>
                                                    <th>City</th>
                                                    <th>State</th>
                                                    <th>Pincode</th>
                                                    <th>Address</th>
                                                    <th>Department</th>
                                                    <th>Designation</th>
                                                    <th>Joining Date</th>
                                                    <th>Employment Type</th>
                                                    <th>Employee Status</th>
                                                    <th>Created At</th>
                                                    <th>Updated At</th>
                                                </tr>
                            </thead>
                            <tbody>
    <?php foreach ($employee as $employee): ?>
        <tr>
        <th scope="row"><?php echo htmlspecialchars($employee['id'] ?? ''); ?></th>
            <td><?php echo htmlspecialchars($employee['first_name'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($employee['last_name'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($employee['email'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($employee['mobile_number'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($employee['date_of_birth'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($employee['gender'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($employee['city'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($employee['state'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($employee['pincode'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($employee['address'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($employee['department'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($employee['designation'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($employee['joining_date'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($employee['employment_type'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($employee['employee_status'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($employee['created_at'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($employee['updated_at'] ?? ''); ?></td>
            <td>                
                <button class="btn btn-primary edit-btn" data-id="<?php echo htmlspecialchars($enquiry['Service_id']); ?>" data-toggle="modal" data-target="#editModal">
                    Edit
                </button>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
                        </table>
                    </div>
                </div>
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
    <script src="assets/js/lib/bootstrap.min.js"></script><script src="assets/js/scripts.js"></script>
    <!-- scripit init-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>




</body>



</html>