<?php
include 'header.php';
?>
          <section id="main-content">
            <div class="row">
              <div class="col-lg-6
            ">
                <div class="card">
                  <div class="card-title">
                    <h4>Customer Enquiry Details</h4>
                  </div>
                  <div class="card-body">
                    <div class="basic-form">
                      <form action="Ajax/insert_enquirydata.php" method="POST">
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
                          <p class="text-muted m-b-15 f-s-12">How to know us</p>
                          <select
                            name="source"
                            class="form-control input-Webstrot"
                          >
                            <option value="" disabled selected>
                              Select an option
                            </option>
                            <option value="online">newspaper</option>
                            <option value="offline">Offline</option>
                            <option value="instagram">Instagram</option>
                            <option value="google">Google Search</option>
                            <option value="others">Others</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Interested Service</label>
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
                          <label>Preferred Date</label>
                          <input
                            type="date"
                            name="preferred_date"
                            class="form-control"
                            placeholder="Date"
                          />
                        </div>
                        <div class="form-group">
                          <label>Preferred time</label>
                          <input
                            type="time"
                            name="preferred_time"
                            class="form-control"
                            placeholder="Time"
                          />
                        </div>
                        <div class="form-group">
                          <p class="text-muted m-b-15 f-s-12">Enquiry Status</p>
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
</html>
