<?php 
include('database/dbconfig.php');
session_start();

$query = "SELECT * FROM tbl_resident_list 
LEFT JOIN tbl_resident_cert
ON tbl_resident_cert.resident_id = tbl_resident_list.id
ORDER BY tbl_resident_list.id ASC";
$result = $conn->query($query);



$certificates = array();
while($row = $result->fetch_assoc()){
    $position[] = $row; 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Clearance Automate - Resident Form</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  
  <!-- endinject -->
  <link rel="shortcut icon" href="images/Brgy-logo.png" />
  <script src="https://kit.fontawesome.com/89c7bdb9b2.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="col-lg-12 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">

                <script>
    $(document).ready(function(){
        $('#id').change(function(){ //subject nya is reference_id
            //dom manipulation
            id = $(this).val();// this = 'nya' sya mismo yung sinelect

            // $('#id').val(id);

            $('.trigger').trigger('keypress');
        });
        
        $('#id').keyup(function(){
         
            // Form
            $.ajax({
                url: 'ajax.php',//action
                type:'POST',
                dataType: 'JSON',
                data:{    
                    'id': $(this).val(),
                },
                success:function(data){//returned as json object
                  console.log(data);
                  if(data != null){
                    // $('#input_resident_id').val(data.input_resident_id);
                    $('#id').val(data.id);
                    $('#validationCustom01').val(data.validationCustom01);
                    $('#middleName').val(data.middleName);
                    $('#lastName').val(data.lastName);
                    $('.suffixName').val(data.suffixName);
                    $('.birthday').val(data.birthday);
                    $('#bplace').val(data.bplace);
                    $('#civil_status').val(data.civil_status);
                    $('#maiden').val(data.maiden);
                    $('.gender').val(data.gender);
                    $('#occupation').val(data.occupation);
                    $('#citizenship').val(data.citizenship);
                    $('.voter').val(data.voter);
                    $('#precint').val(data.precint);
                    $('.contactTracer').val(data.contactTracer);
                    $('.lifeStatus').val(data.lifeStatus);
                    $('.res_province').val(data.res_province);
                    $('.res_city').val(data.res_city);
                    $('#res_house').val(data.res_house);
                    $('#res_street').val(data.res_street);
                    $('.res_barangay').val(data.res_barangay);
                  }else{
                    $("#validationCustom01, #middleName, #lastName, .suffixName, .birthday, #bplace, #maiden, .gender, #occupation, #citizenship, .voter, #precint, .contactTracer, .lifeStatus, .res_province, .res_city, #res_house, #res_street, .res_barangay").val("");
                  }
                   
                },
                error:function(data){
                  console.log('error:' + data)
                },

            });
        });
    });

    
</script>
<div class="brand-logo text-center">
                <img src="images/logo.png" alt="logo" class="img-fluid" style="max-width: 100%; height: auto; width: 23rem;">
              </div>
<!-- <button hidden class="trigger"></button> -->
<form class="pt-3" autocomplete="off" action="addResidentForm.php" method="POST" class="needs-validation" id="add-resident-form">
                              <!-- <input type="hidden" class="form-control" id="id" name="id" required> -->
                              <!-- <div class="form-row">
                              <div class="col-md-3 mb-3">
                              <label>Purpose</label>
                              <select name="purpose_res" id="purpose_res" class="form-control purpose_res" required>
                                <option value="">Choose...</option>
                                <option value="Barangay Clearance">Barangay Clearance</option>
                                <option value="Barangay Certificate">Barangay Certificate</option>
                                <option value="Indigency Certificate">Indigency Certificate</option>
                                <option value="Business Clearance">Business Clearance</option>
                                <option value="Create Service">Create Service</option>
                              </select>
                          </div>
                          </div> -->
                              <div class="form-row">
                              <div class="col-md-3 mb-3">
                              <!-- <label>ID Number</label> -->
                              <!-- <select name="input_resident_id" id="input_resident_id" class="form-control input_resident_id" required>
                                <option value="">Choose...</option>
                                <?php
                                  // $query = "SELECT * FROM tbl_resident_list GROUP BY input_resident_id ";
                                  // $result = mysqli_query($conn,$query);

                                  //   if (mysqli_num_rows($result) > 0) {
                                  //     while ($row = mysqli_fetch_array($result)) {
                                  //         echo "<option value='".$row['input_resident_id']."'>".$row['input_resident_id']."</option>";
                                  //     }
                                  //   }
                                ?>
                              </select> -->
                              <label for="">ID Number</label>
                              <input type="text" class="form-control id" id="id" style="color:black;" placeholder="Input Complete ID number" name="id" required>
                              <div class="valid-feedback">
                              </div>
                          </div>
                          </div>
                        <div class="form-row">
                          <div class="col-md-3 mb-3">
                              <label for="validationCustom01">First name</label>
                              <input type="text" class="form-control" id="validationCustom01" style="color:black;" placeholder="First Name" name="firstName" required>
                              <div class="valid-feedback">
                                Looks good!
                              </div>
                          </div>
                          <div class="form-group col-md-3">
                            <label>Middle Name</label>
                            <input type="text" class="form-control middleName" id="middleName" style="color:black;" name="middleName" placeholder="Middle Name" >
                          </div>
                          <div class="form-group col-md-3">
                            <label>Last Name</label>
                            <input type="text" class="form-control" id="lastName" style="color:black;" name="lastName" placeholder="Last Name" required>
                          </div>
                          <div class="form-group col-md-3">
                              <label>Suffix Name</label>
                              <select name="suffixName" id="suffixName"  class="form-control suffixName" style="color:black;">
                                <option value="">Choose...</option>
                                <option value="SR">SR</option>
                                <option value="JR">JR</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                                <option value="V">V</option>
                                <option value="VI">VI</option>
                                <option value="VII">VII</option>
                                <option value="VIII">VIII</option>
                                <option value="IX">IX</option>
                                <option value="X">X</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Birthday</label>
                            <input type="date" class="form-control birthday" id="birthday" style="color:black;" name="birthday" placeholder="Birthday" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Birth Place</label>
                            <input type="text" class="form-control" id="bplace" name="bplace" style="color:black;" placeholder="Birth Place" required>
                        </div>
                        <div class="form-group col-md-4 pt-3">
                            <label>Civil Status</label>
                            <select name="civil_status" id="civil_status" style="color:black;" class="form-control civil_status"required>
                              <option selected>Choose...</option>
                              <option  value="single">Single</option>
                              <option value="married">Married</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 pt-3">
                            <label>Maiden's State</label>
                            <input type="text" class="form-control maiden" style="color:black;" name="maiden" id="maiden" placeholder="Maiden's Name" >
                        </div>
                        <div class="form-group col-md-4 pt-3">
                            <label>Gender</label>
                            <select name="gender" id="gender" class="form-control gender" style="color:black;" required>
                              <option selected>Choose...</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="Others">Others</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4 pb-3">
                            <label>Occupation</label>
                            <input type="text" class="form-control" id="occupation" style="color:black;" name="occupation" placeholder="Occupation" required>
                        </div>
                      </div>
                      <hr>
                      <div class="form-row">
                        <div class="form-group col-md-4 pt-3">
                            <label>Citizenship</label>
                            <input type="text" class="form-control"  id="citizenship" style="color:black;" name="citizenship" placeholder="Citizenship"required>
                        </div>
                        <div class="form-group col-md-4 pt-3">
                            <label>Voter</label>
                            <select name="voter" id="voter" class="form-control voter" style="color:black;" required>
                              <option selected>Choose...</option>
                              <option  value="yes">YES</option>
                              <option value="no">NO</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 pt-3">
                            <label>Precint No</label>
                            <input type="text" class="form-control precint" style="color:black;" name="precint" id="precint" placeholder="Precint No" >
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Contact Tracer</label>
                            <select name="contactTracer" id="contactTracer" style="color:black;" class="form-control contactTracer" required>
                            <option value="">Choose...</option>
                            <option  value="positive">Positive</option>
                            <option value="negative" >Negative</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Life Status</label>
                            <select name="lifeStatus" id="lifeStatus" style="color:black;" class="form-control lifeStatus" required>
                              <option selected>Choose...</option>
                              <option value="alive">Alive</option>
                              <option  value="decease">Decease</option>
                            </select>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                              <label>Province</label>
                              <select name="res_province" id="res_province" class="form-control res_province" style="color:black;" required>
                                <option value="">Select Province...</option>
                                <option value="ABRA">ABRA</option>
                                <option value="AGUSAN DEL NORTE">AGUSAN DEL NORTE</option>
                                <option value="AGUSAN DEL SUR">AGUSAN DEL SUR</option>
                                <option value="AKLAN">AKLAN</option>
                                <option value="ALBAY">ALBAY</option>
                                <option value="ANTIQUE">ANTIQUE</option>
                                <option value="APAYAO">APAYAO</option>
                                <option value="AURORA">AURORA</option>
                                <option value="BASALIN">BASALIN</option>
                                <option value="BATAAN">BATAAN</option>
                                <option value="BATANES">BATANES</option>
                                <option value="BULACAN">BULACAN</option>
                              </select>
                          </div>
                      <div class="form-group col-md-6">
                              <label>City/Municipality :</label>
                              <select name="res_city" id="res_city" class="form-control res_city" style="color:black;" required>
                                <option value="">Select City/Municipal...</option>
                                <option value="Angat">Angat</option>
                                <option value="Balagtas">Balagtas</option>
                                <option value="Baliwag">Baliwag</option>
                                <option value="Bocaue">Bocaue</option>
                                <option value="Bulakan">Bulakan</option>
                                <option value="Bustos">Bustos</option>
                                <option value="Calumpit">Calumpit</option>
                                <option value="Dona Remedios Trinidad"> Dona Remedios Trinidad</option>
                                <option value="Guiguinto">Guiguinto</option>
                                <option value="Hagonoy">Hagonoy</option>
                                <option value="Malolos">Malolos</option>
                                <option value="Marilao">Marilao</option>
                                <option value="Meycauayan">Meycauayan</option>
                                <option value="Norzagaray">Norzagaray</option>
                                <option value="Obando">Obando</option>
                                <option value="Pandi">Pandi</option>
                                <option value="Paombong">Paombong</option>
                                <option value="Plaridel">Plaridel</option>
                                <option value="Pulilan">Pulilan</option>
                                <option value="San Ildefonso">San Ildefonso</option>
                                <option value="San Jose Del Monte">San Jose Del Monte</option>
                                <option value="San Miguel">San Miguel</option>
                                <option value="San Rafael">San Rafael</option>
                                <option value="Santa Maria">Santa Maria</option>
                              </select>
                      </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>House#, block, lot, apt, suite, unit, building, floor, etc :</label>
                            <input type="text" class="form-control"  name="res_house" style="color:black;"   id="res_house" placeholder="House#, block, lot, apt, suite, unit, building, floor, etc :"required>
                        </div>
                        <div class="form-group col-md-6 ">
                            <label>Street address, village, etc :</label>
                            <input type="text" class="form-control"  name="res_street" style="color:black;"  id="res_street" placeholder="Street address, village, etc :"required>
                        </div>
                          </div>
                          <div class="form-row">
                        <div class="form-group col-md-6">
                              <label>Barangay :</label>
                              <select name="res_barangay" id="res_barangay" class="form-control res_barangay" style="color:black;" required>
                                <option value="">Choose Barangay...</option>
                                <option value="Abangan Norte">Abangan Norte</option>
                                <option value="Abangan Sur">Abangan Sur</option>
                                <option value="Ibayo">Ibayo</option>
                                <option value="Lambakin">Lambakin</option>
                                <option value="Lias">Lias</option>
                                <option value="Loma de Gato">Loma de Gato</option>
                                <option value="Nagbalon">Nagbalon</option>
                                <option value="	Patubig">Patubig</option>
                                <option value="Poblacion 1st">Poblacion 1st</option>
                                <option value="Poblacion 2nd">Poblacion 2nd</option>
                                <option value="Prenza 1st">Prenza 1st</option>
                                <option value="Prenza 2nd">Prenza 2nd</option>
                                <option value="Santa Rosa 1st">Santa Rosa 1st</option>
                                <option value="Santa Rosa 2nd">Santa Rosa 2nd</option>
                                <option value="Saog">Saog</option>
                                <option value="Tabing-ilog">Tabing-ilog</option>
                              </select>
                          </div>
                      </div>
                      </form>
                      <div class="d-flex">
                      <button type="submit" class="btn btn-primary p-4"  name="submit" form="add-resident-form" >Submit</button>
                      <button type="button" class="btn btn-primary ml-auto p-4"  onclick="window.location.href='index2.php';"  >Back</button>
                                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>


            <script src="vendors/js/vendor.bundle.base.js"></script>
  
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <script src="js/custom.js"></script>
<script>
  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});


$(document).on('change','#civil_status',function(){
  var val = $(this).val();
    if(val=='married') {
      $('.maiden').show('#middleName');
      $('.maiden').prop('required',true);
      $('.maiden').val();
      $('#maiden').attr('type','show');
  }else{
      $('.maiden').prop('required',false);
      $('.maiden').hide('#middleName');
      $('#maiden').attr('type','hidden');
  }
});
$('.civil_status').change(function(){
    var val = $(this).val();
    if(val=='single'){
        $('.maiden').prop('disabled', 'disabled');
    }else{
        $('.maiden').prop('disabled', false);
    }
});
</script>
<footer class="footer mt-n5 p-3">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022.  Barangay Loma De Gato Clearance Automate System.</span>
          </div>         
        </footer> 
  <!-- endinject -->
 
</body>
</html>