<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'header.php';

include 'Ajax/db_config.php'; // Database connection

// Fetch data from enquiries table
$query = "SELECT id,customer_name, mobile_number, email, interested_services, service_duration, preferred_date, preferred_time, enquiry_status, created_at FROM appointments";
$stmt = $conn->prepare($query);
$stmt->execute();
$enquiries = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

                <!-- /# row -->
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
                                    <th>Customer Name</th>
                                    <th>Mobile Number</th>
                                    <th>Email</th>
                                    <th>Interested Services</th>
                                    <th>Service Duration</th>
                                    <th>Preferred Date</th>
                                    <th>Preferred Time</th>
                                    <th>Enquiry Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
    <?php foreach ($enquiries as $enquiry): ?>
        <tr>
            <th scope="row"><?php echo htmlspecialchars($enquiry['id']); ?></th>
            <td><?php echo htmlspecialchars($enquiry['customer_name']); ?></td>
            <td><?php echo htmlspecialchars($enquiry['mobile_number']); ?></td>
            <td><?php echo htmlspecialchars($enquiry['email']); ?></td>
            
            <td><?php echo htmlspecialchars($enquiry['interested_services']); ?></td>
            <td><?php echo htmlspecialchars($enquiry['service_duration']); ?></td>
                        <td><?php echo htmlspecialchars($enquiry['preferred_date']); ?></td>
            <td><?php echo htmlspecialchars($enquiry['preferred_time']); ?></td>
            <td><?php echo htmlspecialchars($enquiry['enquiry_status']); ?></td>
            <td><?php echo htmlspecialchars($enquiry['created_at']); ?></td>
            <td>
                <button class="btn btn-primary edit-btn" data-id="<?php echo htmlspecialchars($enquiry['id']); ?>" data-toggle="modal" data-target="#editModal">
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

<!-- Bootstrap Modal for Editing Enquiry -->
<!-- Bootstrap Modal -->
<!-- Bootstrap Modal for Editing Enquiry -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Enquiry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="customer_name">Customer Name</label>
                        <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                    </div>
                    <div class="form-group">
                        <label for="mobile_number">Mobile Number</label>
                        <input type="text" class="form-control" id="mobile_number" name="mobile_number" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="source">Source</label>
                        <input type="text" class="form-control" id="source" name="source" required>
                    </div>
                    <div class="form-group">
                        <label for="interested_services">Interested Services</label>
                        <div class="service-options">
                            <label
                              ><input
                                type="checkbox"
                                name="interested_services[]"
                                value="Haircut"
                              />
                              Haircut</label
                            >
                            <label
                              ><input
                                type="checkbox"
                                name="interested_services[]"
                                value="Spa"
                              />
                              Spa</label
                            >
                            <label
                              ><input
                                type="checkbox"
                                name="interested_services[]"
                                value="Colouring"
                              />
                              Colouring</label
                            >
                            <label
                              ><input
                                type="checkbox"
                                name="interested_services[]"
                                value="Manicure"
                              />
                              Manicure</label
                            >
                            <label
                              ><input
                                type="checkbox"
                                name="interested_services[]"
                                value="Pedicure"
                              />
                              Pedicure</label
                            >
                            <label
                              ><input
                                type="checkbox"
                                name="interested_services[]"
                                value="Facial"
                              />
                              Facial</label
                            >
                            <label
                              ><input
                                type="checkbox"
                                name="interested_services[]"
                                value="Massage"
                              />
                              Massage</label
                            >
                            <label
                              ><input
                                type="checkbox"
                                name="interested_services[]"
                                value="Others"
                              />
                              Others</label
                            >
                          </div>
                    </div>
                    <div class="form-group">
                        <label for="enquiry_status">Enquiry Status</label>
                        <input type="text" class="form-control" id="enquiry_status" name="enquiry_status" required>
                    </div>
                    <div class="form-group">
                        <label for="enquiry_status">Preferred Date</label>
                        <input type="date" class="form-control" id="preferred_date" name="enquiry_status" required>
                    </div>
                    <div class="form-group">
                        <label for="enquiry_status">Preferred Time</label>
                        <input type="time" class="form-control" id="preferred_time" name="enquiry_status" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>


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

    <script>
$(document).ready(function() {
    $(".edit-btn").click(function() {
        var enquiryId = $(this).data("id");
        console.log("Enquiry ID: " + enquiryId); // Log the enquiry ID for debugging

        $.ajax({
            url: "Ajax/get-enquiry.php",
            type: "POST",
            data: { id: enquiryId },
            dataType: "json",
            success: function(data) {
                if (data.error) {
                    alert(data.error);
                } else {
                    // Populate the modal fields with existing data
                    $("#enquiry_id").val(data.id);
                    $("#customer_name").val(data.customer_name);
                    $("#mobile_number").val(data.mobile_number);
                    $("#email").val(data.email);
                    $("#source").val(data.source);
                    $("#interested_services").val(data.interested_services);
                    $("#enquiry_status").val(data.enquiry_status);
                    $("#preferred_date").val(data.preferred_date);
                    $("#preferred_time").val(data.preferred_time);
                    $('#editModal').modal('show'); // Show the modal
                }
            },
            error: function() {
                alert("Error fetching enquiry details");
            }
        });
    });
});
</script>



</body>



</html>