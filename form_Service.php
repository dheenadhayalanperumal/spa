<?php
include 'header.php';
?>
          <section id="main-content">
            <div class="row">
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-title">
                    <h4>Manage Service</h4>
                  </div>
                  <div class="card-body">
                    <div class="basic-form">
                      <form action="Ajax/service_add.php" method="POST">
                        <div class="form-group">
                          <p class="text-muted m-b-15 f-s-12">Service Name</p>
                          <input
                            type="text"
                            name="service_name"
                            class="form-control input-default"
                            placeholder="Service Name"
                          />
                        </div>
                        <div class="form-group">
                          <p class="text-muted m-b-15 f-s-12">Price</p>
                          <input
                            type="number"
                            name="service_price"
                            class="form-control input-flat"
                            placeholder="Price"
                          />
                        </div>
                        <div class="form-group">
                          <p class="text-muted m-b-15 f-s-12">Duration (minutes)</p>
                          <input
                            type="minutes"
                            name="service_duration"
                            class="form-control input-flat"
                            placeholder="Service Duration"
                          />
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
