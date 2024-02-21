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
            <div class="row">
              <div class="col-8">
              
              <div class="card">
            <div class="card-header text-center"> Add New User </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col">
                    <input type="text" placeholder="Enter User Name" class="form-control"
                      name="username" id="">
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col">
                    <input type="password" placeholder="Enter Password" class="form-control"
                      name="password" id="">
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col">
                    <input type="text" placeholder="Enter First Name" class="form-control" name="fname"
                      id="">
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col">
                    <input type="text" placeholder="Enter Last Name" class="form-control" name="lname"
                      id="">
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col">
                    <input type="text" placeholder="Enter Date Of Birth" class="form-control" name="dob"
                      id="">
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col">
                    <input type="text" placeholder="Enter Mobile" class="form-control" name="mobile"
                      id="">
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col">
                    <input type="email" placeholder="Enter Email" class="form-control" name="email"
                      id="">
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col">
                    <input type="radio" value="Male" name="gender" id="Male"> <label
                      for="Male">Male</label>
                    <input type="radio" value="Female" name="gender" id="Female"> <label
                      for="Female">Female</label>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col">
                    <input type="checkbox" name="chk[]" id="Cricekt" value="Cricekt"> <label
                      for="Cricekt">Cricekt</label>
                    <input type="checkbox" name="chk[]" id="Music" value="Music"> <label
                      for="Music">Music</label>
                    <input type="checkbox" name="chk[]" id="Reading" value="Reading"> <label
                      for="Reading">Reading</label>
                    <input type="checkbox" name="chk[]" id="Travelling" value="Travelling"> <label
                      for="Travelling">Travelling</label>
  
                  </div>
                </div>
                <br>
                <div class="row mt-3">
                  <div class="col text-center">
                    <?php
                    // echo "<pre>";
                    // print_r($allcity['Data']);
                    // echo "</pre>";
                    
                    ?>
                    <select name="city" class="form-control" id="city">
                      <option value="">--Select City--</option>
                      <?php
                        foreach ($allcity['Data'] as $c) { ?>
                          <option value="<?php echo $c->c_id; ?>">
                            <?php echo $c->ctiy_name; ?>
                            <?php
                        }
                        ?>
                      <!-- <option value="Ahmedabad">Ahmedabad</option>
                    <option value="Surat">Surat</option>
                    <option value="Baroda">Baroda</option> -->
                    </select>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" class="form-control" cols="30"
                      rows="3"></textarea>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col">
                    <label for="profile_pic">Profile Pic</label>
                    <input type="file" class="form-control" name="profile_pic" accept="image/*"
                      id="profile_pic">
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col text-center">
                    <input type="submit" class="btn btn-primary" value="Add" name="btn-regist"
                      id="">
                    <input type="reset" class="btn btn-danger" name="" id="">
                  </div>
                </div>
              </form>
            </div>
          </div>
          </div>
            </div>







          </div>
        </div>
      </div>
    </div>
    <!-- //chatting -->



  </div>
  <!-- //content -->
</div>
<!-- main content end-->