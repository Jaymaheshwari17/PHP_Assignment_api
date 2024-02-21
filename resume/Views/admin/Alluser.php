<!-- main content start -->
<div class="main-content">

  <!-- content -->
  <div class="container-fluid content-top-gap">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb my-breadcrumb">
        <li class="breadcrumb-item"><a href="Dashboard">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Users</li>
      </ol>
    </nav>
    <div class="welcome-msg pt-3 pb-4">
      <h1>Hi <span class="text-primary">
          <?php echo $_SESSION['UserData']->username; ?>
        </span>, Welcome back</h1>
      <p>Very detailed & featured admin.</p>
    </div>


    <?php
    // echo "<pre>";
    // print_r("$_SESSION");
    // echo "</pre>";  
    ?>



    <!-- chatting -->
    <div class="data-tables">
      <div class="row">
        <div class="col-lg-12 chart-grid mb-4">
          <div class="card card_border p-4">
            <div class="card-header chart-grid__header pl-0 pt-0">
              <div class="row">
                <div class="col-10">

                  Allusers Data
                </div>
                <div class="col-2">
                  <a class="btn btn-sm btn-primary" href="addnewuser">New Add User</a>
                  
                </div>
              </div>
            </div>

            <table class="table table-bordered table-striped table-hover">
              <thead class="table-dark">
                <tr>
                  <td>Sr No</td>
                  <td>Username</td>
                  <td>Mobile</td>
                  <td>Email</td>
                  <td>Hobby</td>
                  <td>profile_pic</td>
                  <td>Action</td>

                </tr>
              </thead>

              <?php
              // print_r($allusers['Data']);
              foreach ($allusers['Data'] as $key => $value) { ?>

                <tr>
                  <td>
                    <?php echo $value->id; ?>
                  </td>
                  <td>
                    <?php echo $value->username; ?>
                  </td>
                  <td>
                    <?php echo $value->mobile; ?>
                  </td>
                  <td>
                    <?php echo $value->email; ?>
                  </td>                  <td>
                    <?php echo $value->hobby; ?>
                  </td>
                  <td>
										<img src="<?php echo $this->baseurl . "/uploads/".$value->profile_pic;?>" alt="Prof" height="100px" width="100px">
                    <!-- <?php echo $value->profile_pic; ?> -->
                  </td>
                  <td>
                    <a href="edituser?userid=<?php echo $value->id; ?>"><i class="fa fa-edit"></i></a>




                    <?php if ($value->id !== $_SESSION['UserData']->id) { ?>

                      <a href="deleteuser?userid=<?php echo $value->id; ?>"><i class="fa fa-trash"></i></a>


                    <?php }

                    ?>
                  </td>
                </tr>
              <?php } ?>
            </table>






          </div>
        </div>
      </div>
    </div>
    <!-- //chatting -->



  </div>
  <!-- //content -->
</div>
<!-- main content end-->