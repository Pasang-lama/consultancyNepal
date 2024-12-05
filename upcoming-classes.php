<?php
require_once "header.php";
?>
<nav class="breadcrumb breadcrumb-bg">
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= $base_url ?>"><i class="fa-solid fa-house"></i></a></li>
      <li class="breadcrumb-item active" aria-current="page">Upcomming Classes</li>
    </ol>
  </div>
</nav>

<?php $upcoming_classes = $db->SelectByCriteria("consultancy_test_prep join class_table on consultancy_test_prep.cid= class_table.cid join consultancies on class_table.cid=consultancies.id join test_preparation on class_table.tid = test_preparation.id", "consultancies.consultancy_name,test_preparation.title,class_table.*", "test_preparation.status AND class_table.date >= CURDATE()", [1],  "GROUP BY id  order by consultancy_test_prep.rank asc");
?>
<section class="page-content comming-classes my-5">
  <div class="container">
    <div class="date-title">
      <div class="heading-filter-wrapper">
        <h1 class="title">Upcoming <span>Classes</span></h1>
        <div class="filter-wrapper">
          <div class="filter-item">
            <select class="form-select testPreparation" name="forPreparationType">
              <option value="none">Select Test</option>
              <option value="">IELTS</option>
              <option value="">PTE</option>
              <option value="">OET</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <?php
    ?>
    <div class="table-wrapper mt-4 desktop-design d-lg-block d-none">
      <table class="table">
        <thead>
          <tr>
            <th>S.N</th>
            <th>Test Preparation</th>
            <th>Consultancy Name</th>
            <th>Start Date</th>
            <th>Class Time</th>
            <th>Offers</th>
            <th>Register Now</th>
          </tr>
        </thead>
        <tbody>
          <?php if (count($upcoming_classes) == 0) { ?>
            <tr>
              <td colspan="7" class="text-center"><strong>No Classes For Now</strong></td>
            </tr>

          <?php } else { ?>
            <?php foreach ($upcoming_classes as $key => $class) { ?>
              <tr>
                <td><?= ++$key ?></td>
                <td><?= $class->title ?></td>
                <td><?= $class->consultancy_name ?></td>
                <td><?= dateConvert($class->date) ?></td>
                <td><?= timeConvert($class->time) ?></td>
                <td class="Offer"> <?= $class->offer != "" ?  "<span>" . $class->offer . "</span>" : "No Offer" ?></td>
                <td>
                  <div class="action-buttons">
                    <button type="button" class="view-details-btn" onclick="testDetails(<?= $class->id ?>)" data-bs-toggle="modal" data-bs-target="#classDetailsModal" data-id=<?= $class->id ?>>
                      View Details
                    </button>
                    <button type="button" class=" register-now-btn" data-bs-toggle="modal" data-bs-target="#classRegisterForm">
                      Register Now
                    </button>
                  </div>
                </td>
              </tr>
          <?php }
          }
          ?>
        </tbody>
      </table>
    </div>
    <div class="table-wrapper mt-4 mobileTablet-design d-lg-none d-block">
      <table class="table">
        <thead>
          <tr>
            <th>Class Details</th>
            <th>Enquiry</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($upcoming_classes as $key => $class) : ?>
            <tr>
              <td><?= $class->title ?> | <?= $class->consultancy_name ?></td>
              <td>
                <div class="action-buttons">
                  <button type="button" class="view-details-btn" onclick="testDetails(<?= $class->id ?>)" data-bs-toggle="modal" data-bs-target="#classDetailsModal" data-id=<?= $class->id ?>>
                    View Details
                  </button>
                  <button type="button" class=" register-now-btn" data-bs-toggle="modal" data-bs-target="#classRegisterForm">
                    Register Now
                  </button>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
<?php include_once "footer.php"; ?>