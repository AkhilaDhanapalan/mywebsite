<!DOCTYPE html>
<html lang="en">
<head>
  <title>ToysWorld</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="../user_js/reg.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>


  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  
.laybuy-logo-checkout {
  
  border: 0px solid #d1d2d3;
}

tr.highlighted td {
    background:#E43A3A;
	color:#FFFFFF;

}
</style>

  
</head>
<body>

<?php include "header.php" ;?>

<div class="container" style="margin-top:30px">
  <div class="row">
    
    <div class="col-sm-6">
  
        <div class="form-group">
        <label for="usr">First Name:</label>
        <input type="text" id="txtregid">
            <input type="text" class="form-control" id="txtfname" name="txtfname">
        </div>
        <div class="form-group">
        <label for="usr">Last Name:</label>
            <input type="text" class="form-control" id="txtlname" name="txtlname">
        </div>
        <div class="form-group">
        <label for="usr">Address:</label>
            <input type="text" class="form-control" id="txtaddress" name="txtaddress">
        </div>
        <div class="form-group">
        <label for="usr">Contact Number:</label>
            <input type="text" class="form-control" id="txt_contact" name="txt_contact">
            
        </div>
        <div class="form-group">
        <label for="div1">Sex:</label>
                <div class="form-check-inline" id="div_sex">
                <!-- <label class="form-check-label" for="radio1"> -->
                    <input type="radio" class="form-check-input" id="radio_male" name="radio_sex" value="Male">Male
                <!-- </label> -->
                </div>
                <div class="form-check-inline">
                <!-- <label class="form-check-label" for="radio2"> -->
                 <input type="radio" class="form-check-input" id="radio_female" name="radio_sex" value="Female">Female
                <!-- </label> -->
            </div>
        </div>
        <div class="form-group" id="div_country">
       
        </div>
        
        
    </div>
    <div class="col-sm-6">
        <div class="form-group" id="div_state">
        
        </div>
        <div class="form-group">
        <label for="usr">Pincode:</label>
            <input type="text" class="form-control" id="txt_pin" name="txt_pin">
        </div>
        <div class="form-group">
        <label for="email">Email address:</label>
            <input type="email" class="form-control" placeholder="Enter email" id="txt_email">
        </div>

        <div class="form-group">
        <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="txt_pwd" name="txt_pwd">
        </div>
        <div class="form-group">
        <label for="pwd">Confirm Password:</label>
            <input type="password" class="form-control" id="re_pwd" name="re_pwd">
        </div>
        <button type="button" class="btn btn-primary" id="reg_submit">Submit</button>
        <button type="button" class="btn btn-warning" id="reg_edit_btn">Edit</button>
  
    </div>
  </div>

    <div class="row">
        <div class="col-sm-12" id="div_tbl_reg_dis">
        <table id="reg_list_display" class="table table-bordered" style="width:100%">
        <thead>
            <tr> 
                <th>Sl.No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Sex</th>
                <th>Country Id</th>
                <th>Country</th>
                <th>State Id</th>
                <th>State</th>
                <th>Pin</th>
                <th>Email</th>
                <th>Join Date</th>
               
            </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <tr>
            <th>Sl.No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Sex</th>
                <th>Country Id</th>
                <th>Country</th>
                <th>State Id</th>
                <th>State</th>
                <th>Pin</th>
                <th>Email</th>
                <th>Join Date</th>
            </tr>
        </tfoot>
    </table>
        </div>
    </div>
</div>
<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div>

</body>

</html>
