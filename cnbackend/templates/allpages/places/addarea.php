  <?php
 include "layouts/header.php";
 include "layouts/aside.php";

require_once "database/database.php";
require_once "database/tables.php";
$db=Database::Instance();
 $city=$db->CustomQuery("Select * from city");

 ?><div class="main-panel">
      <div class="content-wrapper">
          <?php include "infos/message.php"; ?><div class="page-header">
              <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a class="link" href="<?=$base_url?>dashboard">Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page"><a class="link"
                        href="<?= $base_url ?>showarea">Display Area</a></li>
                  </ol>
              </nav>
          </div>
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="card-title">Add New city</h4>
                          <form action="database/actions/places/insert_area.php" class="cmxform"
                              enctype="multipart/form-data" id="signupForm" method="post" name="addmember"
                              onsubmit="return validateForm()">
                              <fieldset>
                                  <div class="row">
                                      <div class="col-4 form-group"><label for="firstname">Area Name</label> <input
                                              class="form-control" name="area" id="firstname" required>

                                      </div>
                                        

                                       

                                  </div><input class="btn btn-primary" name="addmember" type="submit" value="Submit">
                              </fieldset>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div><?php include "layouts/footer.php"; ?>