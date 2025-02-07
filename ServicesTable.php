<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'header.php';

include 'Ajax/db_config.php'; // Database connection

// Fetch data from services table
$query = "SELECT Service_id, name, price, duration, created_at, updated_at FROM services";
$stmt = $conn->prepare($query);
$stmt->execute();
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                                    <th>#</th>
                                    <th>Service Name</th>
                                    <th>Price</th>
                                    <th>Duration</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                                                    </tr>
                            </thead>
                            <tbody>
    <?php foreach ($services as $enquiry): ?>
        <tr>
            <th scope="row"><?php echo htmlspecialchars($enquiry['Service_id']); ?></th>
            <td><?php echo htmlspecialchars($enquiry['name']); ?></td>
            <td><?php echo htmlspecialchars($enquiry['price']); ?></td>
            <td><?php echo htmlspecialchars($enquiry['duration']); ?></td>
            <td><?php echo htmlspecialchars($enquiry['created_at']); ?></td>
            <td><?php echo htmlspecialchars($enquiry['updated_at']); ?></td>
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