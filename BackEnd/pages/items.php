<?php
session_start();
include('../Actions/connection.php');
if($_SESSION['u']==''){
    header("location:../../frontEnd/index.php");
}
else{
  $q=mysqli_query($connection,"SELECT * FROM security WHERE username='".$_SESSION['u']."'");
  $rows=mysqli_fetch_array($q);
  $r=mysqli_query($connection,"SELECT * FROM accounts WHERE username='".$_SESSION['u']."'");
  $rowsR=mysqli_fetch_array($r);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BES | ITEMS</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
   <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
  
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index.php" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">BES</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block"><?php echo $rowsR[2]." ".$rowsR[1];?></a>
        </div>
      </div>

      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="../index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class=""></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Setup
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Category.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="UOM.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit of Measurements</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="Items.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Items</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Transaction
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="ReviewItems.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Review Items</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Security
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               <?php 
                if($rows[2]=='Administrator'){
              ?>
              <li class="nav-item">
                <a href="Accounts.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Accounts</p>
                </a>
              </li>
              <?php 
                }
              ?>
               <li class="nav-item">
                <a href="../Actions/logout.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li> 
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Item List</h1>
          </div>
     
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                   <button type="button" class="btn  btn-success btn-sm" id="add" data-toggle="modal" data-target="#modal-default">NEW RECORD</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Measurement</th>
                    <th>Username</th>
                    <th>Posted</th>
                    <th>Status</th>
                    <th width="200">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                     <?php 
                      if($rows[2]=='User'){

                        $q1=mysqli_query($connection,"SELECT items.item_id,category.cat_desc,items.item_name,items.qty,uom.uom_desc,items.username,items.date_posted,items.status FROM items INNER JOIN category ON items.cat_id=category.cat_id INNER JOIN uom ON items.uom_id=uom.uom_id WHERE username='".$_SESSION['u']."' ORDER BY date_posted ASC");
                         }
                         else{
                          $q1=mysqli_query($connection,"SELECT items.item_id,category.cat_desc,items.item_name,items.qty,uom.uom_desc,items.username,items.date_posted,items.status FROM items INNER JOIN category ON items.cat_id=category.cat_id INNER JOIN uom ON items.uom_id=uom.uom_id  order by date_posted ASC ");
                         } 


                        while($rows1=mysqli_fetch_array($q1)){
                      ?>
                  <tr>
                    <td><?php echo $rows1[1]; ?></td>
                    <td><?php echo $rows1[2]; ?></td>
                    <td><?php echo $rows1[3]; ?></td>
                    <td><?php echo $rows1[4]; ?></td>
                    <td><?php echo $rows1[5]; ?></td>
                    <td><?php echo $rows1[6]; ?></td>
                    <td><?php if($rows1[7]=='1') {?> <button class="btn btn-xs btn-primary" disabled="disabled">Approved </button>   <?php } else {?> <button class="btn btn-xs btn-danger" disabled="disabled">Pending</button>    <?php } ?></td>
                    <td>
                      <button class="btn btn-sm btn-primary edit" value="<?php echo $rows1[0]; ?>" >EDIT</button>
                      <button class="btn btn-sm btn-danger delete" value="<?php echo $rows1[0]; ?>" >DELETE</button>
                      <?php 
                      if($rows[2]=="Administrator" && $rows1[7]=="0"){
                      ?>
                      <button class="btn btn-sm btn-warning approve" value="<?php echo $rows1[0]; ?>" >APPROVE</button>
                      <?php 
                      }
                      ?>
                    </td>
                  </tr>
                   <?php  
                   }
                   ?>
                  </tbody>
               
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!-- modal -->
  <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Item Form</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form id='frm'>
                <div class="card-body">
                  <div class="form-group">
                  <label for="exampleSelectRounded0">Category</label>
                  <select class="custom-select rounded-0" id="Category" name="Category">
                    <?php 
                      $t=mysqli_query($connection,"SELECT * FROM category");
                      while($rowsT=mysqli_fetch_array($t)){
                    ?>
                    <option value="<?php echo $rowsT[0];?>"><?php echo  $rowsT[1]; ?></option> 
                  <?php } ?>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input type="text" class="form-control" id="itemDesc" name="itemDesc" placeholder="Description">
                  </div>
                  <div class="form-group">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Quantity</label>
                    <input type="text" class="form-control" id="QTY" name="QTY" placeholder="Description">
                  </div>
                  <div class="form-group">
                  <label for="exampleSelectRounded0">Unit of Measurement</label>
                  <select class="custom-select rounded-0" id="UOM" name="UOM">
                    <?php 
                      $y=mysqli_query($connection,"SELECT * FROM uom");
                      while($rowsY=mysqli_fetch_array($y)){
                    ?>
                    <option value="<?php echo $rowsY[0];?>"><?php echo  $rowsY[1]; ?></option> 
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Price</label>
                    <input type="text" class="form-control" id="Price" name="Price" placeholder="Price">
                  </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" class="form-control" id="Image" name="Image" placeholder="Image">
                </div>
                

                </div>
                <!-- /.card-body -->
            </div>
            <div class="modal-footer justify-content-between">
              <input type="hidden" id="p_id" name="p_id">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="save" name="save">Save changes</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<!-- modal -->

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>LMS</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
 
  <!-- SweetAlert2 -->
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../plugins/toastr/toastr.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });


    
$(document).ready(function(){

  $("#save").click(function(e){
           e.preventDefault();
            var formData = $("#frm").serialize();
        $.ajax({
            type:'POST',
            url: '../Actions/Items/Add.php',
            data: formData,
            success: function(data){
                alert(data);
               //location.reload(); 
            }
        });
  });

  $(".delete").click(function(e){
      e.preventDefault();
      var id = $(this).val();
       $.ajax({
            type:'POST',
            url: '../Actions/Items/Delete.php',
            data: {id:id},
            success: function(data){
                
                 location.reload();
            }
        });



  });


  $("#add").click(function(e){
     e.preventDefault();
     $("#frm")[0].reset();
  }); 


  $(".edit").click(function(e){
      e.preventDefault();
      var id = $(this).val();
      $.ajax({
            type:'POST',
            url: '../Actions/Items/Get.php',
            data: {id:id},
            dataType: 'json',
            success: function(data){
                $("#UomDesc").val(data.uom_desc);
                $("#p_id").val(data.uom_id);
                $("#modal-default").modal("show");
            }
        });
  });

  $(".approve").click(function(e){
      e.preventDefault();
      var id = $(this).val();
      $.ajax({
            type:'POST',
            url: '../Actions/Items/approve.php',
            data: {id:id},
            success: function(data){
               location.reload();
            }
        });
  });


});


  



</script>
</body>
</html>
