<?php
include 'header.php';
?>
          <!-- /# row -->
          <section id="main-content">
            <div class="row">
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-title">
                    <h4>Employee Details</h4>
                  </div>
                  <div class="card-body">
                    <div class="basic-form">
                      <form action="Ajax/employee_add.php" method="POST">
                        <div class="form-group">
                          <label>First Name</label>
                          <input
                            type="text"
                            name="first_name"
                            class="form-control"
                            placeholder="First Name"
                            required
                          />
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input
                              type="text"
                              name="last_name"
                              class="form-control"
                              placeholder="Last Name"
                              required
                            />
                          </div>

                        <div class="form-group">
                          <label>Mobile Number</label>
                          <input
                            type="number"
                            name="mobile_number"
                            class="form-control"
                            placeholder="Mobile Number"
                            required
                          />
                        </div>

                        <div class="form-group">
                          <label>Email Address</label>
                          <input
                            type="email"
                            name="email"
                            class="form-control"
                            placeholder="Email Address"
                            required
                          />
                        </div>

                        <div class="form-group">
                          <label>Gender</label>
                          <select name="gender" class="form-control" required>
                            <option value="" disabled selected>
                              Select an option
                            </option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input
                              type="text"
                              name="address"
                              class="form-control"
                              placeholder="Address"
                            />
                          </div>

                        <div class="form-group">
                          <label>City</label>
                          <input
                            type="text"
                            name="city"
                            class="form-control"
                            placeholder="City"
                          />
                        </div>

                        <div class="form-group">
                          <label>State</label>
                          <input
                            type="text"
                            name="state"
                            class="form-control"
                            placeholder="State"
                          />
                        </div>

                        <div class="form-group">
                          <label>Pincode</label>
                          <input
                            type="number"
                            name="pincode"
                            class="form-control"
                            placeholder="Pincode"
                          />
                        </div>

                       

                        <div class="form-group">
                          <label>Date of Birth</label>
                          <input
                            type="date"
                            name="dob"
                            class="form-control"
                            required
                          />
                        </div>

                        <div class="form-group">
                          <label>Date of Joining</label>
                          <input
                            type="date"
                            name="joining_date"
                            class="form-control"
                            required
                          />
                        </div>

                        <div class="form-group">
                          <label>Department</label>
                          <input
                            type="text"
                            name="department"
                            class="form-control"
                            placeholder="Department"
                            required
                          />
                        </div>

                        <div class="form-group">
                          <label>Designation</label>
                          <input
                            type="text"
                            name="designation"
                            class="form-control"
                            placeholder="Designation"
                            required
                          />
                        </div>

                        <!-- <div class="form-group">
                          <label>Salary</label>
                          <input
                            type="number"
                            name="salary"
                            class="form-control"
                            placeholder="Salary"
                          />
                        </div> -->

                        <div class="form-group">
                          <label>Employment Type</label>
                          <select
                            name="employment_type"
                            class="form-control"
                            required
                          >
                            <option value="" disabled selected>
                              Select an option
                            </option>
                            <option value="Full-Time">Full-Time</option>
                            <option value="Part-Time">Part-Time</option>
                            <option value="Contract">Contract</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label>Employee Status</label>
                          <select
                            name="employee_status"
                            class="form-control"
                            required
                          >
                            <option value="" disabled selected>
                              Select an option
                            </option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Terminated">Terminated</option>
                          </select>
                        </div>

                        <button type="submit" class="btn btn-primary">
                          Register Employee
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
</html>
