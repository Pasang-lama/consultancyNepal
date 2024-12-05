<?php
include "header.php";
include "aside.php";
$datas = $db->CustomQuery("select * from consultancy_enquery where consultancy_id=".$_SESSION["consultancy"]);
?>
<style>
    table {
        border: 1px solid grey;
        border-collapse: collapse;
    }

    td {
        border: 1px solid grey;

    }

    th {
        border: 1px solid grey;
        background-color: #c5c5c5;


    }
</style>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Display Enquiries</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Enquiries</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Display Enquiries</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="row">
<?php include "suc_message.php"; ?>
    <?php include "warn-message.php"; ?>

</div>

<div class="row">
    <!-- ============================================================== -->
    <!-- basic table  -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Enquiries List</h5>
            <div class="card-body">
                <div class="table-responsive">
                <!-- <button class='btn btn-outline-danger btn-space btn-xs ' id='del_prog'>DELETE SELECTED DATAS</button> -->

                    <table class="table" id="myTable">
                        <thead>
                        
                            <th>id</th>
                            <th>Name </th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                           
                        </thead>
                        <tbody>
                            <?php
                           
                            foreach ($datas as $key=>$data) {
                            ?>
                                <tr>
                              

                                    <td><?= ++$key ?></td>
                                    <td><?= $data->name ?></td>
                                    <td><?= $data->email ?></td>
                                    <td><?= $data->number ?></td>
                                    <td><?= $data->message ?></td>
                                </tr>
                            <?php
                            }
                            ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end basic table  -->

</div>


<?php
include "footer.php";
?>