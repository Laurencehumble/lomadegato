<?php
include('../security/security.php');
include('../includes/header.php');
include('../includes/navbar.php');
?>

<?php
// switch($_SESSION['Access']){
//     case "admin":

?>

<style>

.tooltip{
  
  font-size: large;
  z-index: 100000000; /* Use half of the width (120/2 = 60), to center the tooltip */
}

</style>


<link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
 <!-- partial -->
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin">
              <div class="row mb-n5">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h6 class="font-weight-normal mb-0"></h6>
                </div>                
              </div>
            </div>            
          </div>
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
<?php if(isset($_SESSION['message'])): ?>
                    <div class="alert alert-<?php echo $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                   <?php unset($_SESSION['message']); ?>
                <?php endif ?>
                  <h4 class="card-title">
                    Resident List
                    <span data-toggle="tooltip" data-placement="top" title="Click to Add Resident">
                   <a href="#add" data-toggle="modal" class="btn btn-info btn-border btn-round btn-sm ">
                          <i class="fa fa-plus"></i>
                          Add Resident
                          </a>
                          </span>
                          <span data-toggle="tooltip" data-placement="top" title="Click to Print">
                          <a href="print_list_resident.php" class="btn btn-primary  btn-border btn-round btn-sm" target="_blank">
                            <i class="fa fa-print"></i>
                          Print
                        </a>
                        </span>
                  </h4>
                  <div class="table-responsive">
                    <table id="residentTable" class="table table-striped">
                      <thead>
                        <tr>
                        <th>
                            Barangay ID
                          </th>
                          <th>
                            Resident ID
                          </th>
                          <th>
                           Full Name
                          </th>
                          <th>
                            Birthday
                          </th>
                          <th>
                           Birth Place
                          </th>
                          <th>
                            Civil Status
                          </th>
                          <th>
                           Maiden's State
                          </th>
                          <th>
                            Gender
                          </th>
                          <th>
                           Occupation
                          </th>
                          <th>
                           citizenship
                          </th>
                          <th>
                            Voter Status
                          </th>
                          <th>
                           Precint No
                          </th>
                          <th>
                            Contact Tracer
                          </th>
                          <th>
                            Life Status
                          </th>
                          <th>
                          Province
                          </th>
                          <th>
                          City/Municipality
                          </th>
                          <th>
                          House#
                          </th>
                          <th>
                          Street Address
                          </th>
                          <th>
                          Barangay
                          </th>
                          <th>
                          Date
                          </th>
                          <th>
                          Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            $payments = "SELECT *,CONCAT(firstName, ' ' ,IF(middleName= 'NMN ', ' ', middleName),' ',
                          lastName , ' ',IF(suffixName= 'NSN', '', suffixName))
                          as name FROM `tbl_resident_list`";

                            $query = mysqli_query($conn,$payments);

                            if(mysqli_num_rows($query) > 0){
                                while($row = mysqli_fetch_assoc($query)){


                        ?>
                        <tr class="text-uppercase">
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['residentID']?></td>
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['birthday']?></td>
                            <td><?php echo $row['bplace']?></td>
                            <td><?php echo $row['civil_status']?></td>
                            <td><?php echo $row['maiden']?></td>
                            <td><?php echo $row['gender']?></td>
                            <td><?php echo $row['occupation']?></td>
                            <td><?php echo $row['citizenship']?></td>
                            <td><?php echo $row['voter']?></td>
                            <td><?php echo $row['precint']?></td>
                            <td><?php echo $row['contactTracer']?></td>
                            <td><?php echo $row['lifeStatus']?></td>
                            <td><?php echo $row['res_province']?></td>
                            <td><?php echo $row['res_city']?></td>
                            <td><?php echo $row['res_house']?></td>
                            <td><?php echo $row['res_street']?></td>
                            <td><?php echo $row['res_barangay']?></td>
                            <td><?php echo date("F d, Y",strtotime($row['date']));?></td>
                            <td>
                             <a  class="btn btn-warning btn-sm update"  data-id="<?php echo $row['id']?>" data-toggle="tooltip" data-placement="bottom" title="Click to Update"><i class="fa fa-pencil text-white"></i></a>
		<a href="../code/resident_list_delete.php?residentID=<?=$row['residentID']?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Click to Delete"><i class="fa fa-times text-white"></i></a>
                            </td>

                        </tr>
                        <?php
                              }
                            }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div> 
         
        </div>
 <!-- ======================================================================================= -->
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" style="max-width: 60%; " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Resident</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form class="pt-3" autocomplete="off" action="../code/addResidentcode.php" method="POST" class="needs-validation" id="add-resident-form">
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
                              <label for="validationCustom01">ID Number</label>
                              <input type="text" class="form-control resident_trig" id="id" placeholder="ID Number" name="id" style="color:black;" required>
                              <div class="valid-feedback">
                              </div>
                          </div>
                          </div>
                    <div class="form-row">
                          <div class="col-md-3 mb-3">
                              <label for="validationCustom01">First name</label>
                              <input type="text" class="form-control" id="validationCustom01" placeholder="First Name" name="firstName" style="color:black;" required>
                              <div class="valid-feedback">
                                Looks good!
                              </div>
                          </div>
                          <div class="form-group col-md-3">
                            <label>Middle Name</label>
                            <input type="text" class="form-control" name="middleName" placeholder="Middle Name" style="color:black;" required>
                          </div>
                          <div class="form-group col-md-3">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lastName" placeholder="Last Name" style="color:black;" required>
                          </div>
                          <div class="form-group col-md-3">
                              <label>Suffix Name</label>
                              <select name="suffixName" class="form-control" >
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
                            <input type="date" class="form-control" name="birthday" placeholder="Birthday" style="color:black;" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Birth Place</label>
                            <input type="text" class="form-control" name="bplace" placeholder="Birth Place" style="color:black;" required>
                        </div>
                        <div class="form-group col-md-4 pt-3">
                            <label>Civil Status</label>
                            <select name="civil_status" id="civil_status" class="form-control civil_status" style="color:black;" required>
                              <option selected>Choose...</option>
                              <option  value="single">Single</option>
                              <option value="married">Married</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 pt-3">
                            <label>Maiden's State</label>
                            <input type="text" class="form-control maiden" name="maiden" id="maiden" placeholder="Maiden's Name" style="color:black;" required>
                        </div>
                        <div class="form-group col-md-4 pt-3">
                            <label>Gender</label>
                            <select name="gender" class="form-control" style="color:black;" required>
                              <option selected>Choose...</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="Others">Others</option>
                            </select>
                        </div>
                       
                        <div class="form-group col-md-4 pb-3">
                            <label>Occupation</label>
                            <input type="text" class="form-control" name="occupation" placeholder="Occupation" style="color:black;" required>
                        </div>
                      </div>
                      <hr>
                      <div class="form-row">
                        <div class="form-group col-md-4 pt-3">
                            <label>Citizenship</label>
                            <input type="text" class="form-control"  name="citizenship" placeholder="Citizenship" style="color:black;" required>
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
                            <input type="text" class="form-control precint" name="precint" id="precint" placeholder="Precint No" style="color:black;" required>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Contact Tracer</label>
                            <select name="contactTracer" id="contactTracer" class="form-control" style="color:black;" required>
                            <option value="">Choose...</option>
                            <option  value="positive">Positive</option>
                            <option value="negative" >Negative</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Life Status</label>
                            <select name="lifeStatus" class="form-control" style="color:black;" required>
                              <option selected>Choose...</option>
                              <option value="alive">Alive</option>
                              <option  value="decease">Decease</option>
                            </select>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                              <label>Province</label>
                              <select name="res_province" id="res_province" class="form-control" style="color:black;" required>
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
                              <select name="res_city" id="res_city" class="form-control" style="color:black;" required>
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
                            <input type="text" class="form-control"  name="res_house"  id="res_house" placeholder="House#, block, lot, apt, suite, unit, building, floor, etc :" style="color:black;" required>
                        </div>
                        <div class="form-group col-md-6 ">
                            <label>Street address, village, etc :</label>
                            <input type="text" class="form-control"  name="res_street"  id="res_street" placeholder="Street address, village, etc :" style="color:black;" required>
                        </div>
                          </div>
                          <div class="form-row">
                        <div class="form-group col-md-6">
                              <label>Barangay :</label>
                              <select name="res_barangay" id="res_barangay" class="form-control" style="color:black;" required>
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit" form="add-resident-form">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        
          <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="max-width: 60%; " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Resident</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form class="pt-3" autocomplete="off" action="query.php" method="POST" class="needs-validation" id="update-resident-form" style="color:black;" required>
                      <div class="form-row">
                          <div class="col-md-3 mb-3">
                              <label>First name</label>
                              <input type="text" class="form-control"  placeholder="First Name" id="firstName" name="firstName" style="color:black;" required>
                              <div class="valid-feedback">
                                Looks good!
                              </div>
                          </div>
                          <div class="form-group col-md-3">
                            <label>Middle Name</label>
                            <input type="text" class="form-control" name="middleName" id="middleName" placeholder="Middle Name"  style="color:black;" required>
                          </div>
                          <div class="form-group col-md-3">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lastName" id="lastName"  placeholder="Last Name" style="color:black;" required>
                          </div>
                          <div class="form-group col-md-3">
                              <label>Suffix Name</label>
                              <select name="suffixName" id="suffixName" class="form-control" style="color:black;" >
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
                            <input type="date" class="form-control" name="birthday" id="birthday" placeholder="Birthday" style="color:black;" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Birth Place</label>
                            <input type="text" class="form-control" name="bplace" id="bplace" placeholder="Birth Place" style="color:black;" required>
                        </div>
                        <div class="form-group col-md-4 pt-3">
                            <label>Civil Status</label>
                            <select name="civil_status" id="civil_status" class="form-control civil_status" style="color:black;" required>
                              <option selected>Choose...</option>
                              <option  value="single">Single</option>
                              <option value="married">Married</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 pt-3 ">
                            <label>Maiden's State</label>
                            <input type="text" class="form-control maiden" name="maiden" id="maiden" placeholder="Maiden's Name" style="color:black;" required disabled>
                        </div>
                        <div class="form-group col-md-4 pt-3">
                            <label>Gender</label>
                            <select name="gender" id="gender" class="form-control" style="color:black;" required>
                              <option selected>Choose...</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 pb-3">
                            <label>Occupation</label>
                            <input type="text" class="form-control" name="occupation" id="occupation" placeholder="Occupation" style="color:black;" required>
                        </div>
                      </div>
                      <hr>
                      <div class="form-row">
                        <div class="form-group col-md-4 pt-3">
                            <label>Citizenship</label>
                            <input type="text" class="form-control"  name="citizenship"  id="citizenship" placeholder="Citizenship"style="color:black;" required>
                        </div>
                        <div class="form-group col-md-4 pt-3">
                            <label>Voter</label>
                            <select name="voter" id="voter" class="form-control voter"style="color:black;" required >
                              <option selected>Choose...</option>
                              <option  value="yes">YES</option>
                              <option value="no">NO</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 pt-3">
                            <label>Precint No</label>
                            <input type="text" class="form-control precint" name="precint" id="precint" placeholder="Precint No" style="color:black;" required disabled>
                        </div>
                      </div>
                      <input type="hidden" class="form-control" name="res-id"  >
                      <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Contact Tracer</label>
                            <select name="contactTracer" id="contactTracer" class="form-control contactTracer" style="color:black;" required>
                            <option value="">Choose...</option>
                            <option  value="positive">Positive</option>
                            <option value="negative" >Negative</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Life Status</label>
                            <select name="lifeStatus" id="lifeStatus" class="form-control" style="color:black;" required>
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
                            <input type="text" class="form-control res_house"  name="res_house"  id="res_house" placeholder="House#, block, lot, apt, suite, unit, building, floor, etc :" style="color:black;" required>
                        </div>
                        <div class="form-group col-md-6 ">
                            <label>Street address, village, etc :</label>
                            <input type="text" class="form-control res_street"  name="res_street"  id="res_street" placeholder="Street address, village, etc :" style="color:black;" required>
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="tooltip" data-placement="bottom" title="See Password">Close</button>
                        <button type="submit" class="btn btn-warning" name="updateResident" form="update-resident-form">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
       <!-- ======================================================================================= -->
<?php
// break;
// default : echo "<script>window.location.replace('http://localhost/bulacan/pages/samples/error-404.html');</script>";
// }
?>

<?php
include('../includes/footer.php');
include('../includes/script.php');
?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">
  
  <!--<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>-->
 
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
  
  
  <script>
    $(document).on('click','.update',function(){
        var id = $(this).data('id');
        $('input[name="res-id"]').val(id);
        $.post('query.php',{id:id,resident_details:'resident_details'},function(data){
            var new_data = JSON.parse(data);
            $('#firstName').val(new_data['firstName']);
            $('#middleName').val(new_data['middleName']);
            $('#lastName').val(new_data['lastName']);
            $('#suffixName').val(new_data['suffixName']);
            $('#birthday').val(new_data['birthday']);
            $('#bplace').val(new_data['bplace']);
            $('.civil_status').val(new_data['civil_status']);
            $('.maiden').val(new_data['maiden']);
            $('#occupation').val(new_data['occupation']);
            $('#nationalID').val(new_data['nationalID']);
            $('#citizenship').val(new_data['citizenship']);
            $('#gender').val(new_data['gender']);
            $('.voter').val(new_data['voter']);
            $('.precint').val(new_data['precint']);
            $('.contactTracer').val(new_data['contactTracer']);
            $('#lifeStatus').val(new_data['lifeStatus']);
            $('.res_province').val(new_data['res_province']);
            $('.res_city').val(new_data['res_city']);
            $('.res_house').val(new_data['res_house']);
            $('.res_street').val(new_data['res_street']);
            $('.res_barangay').val(new_data['res_barangay']);
            $('#update').modal('show');
        });
    });
    $(document).on('change','.voter',function(){
        var vote = $(this).val();
        if(vote=='yes'){
            $('.precint').prop('required',true);
        }else{
            $('.precint').prop('required',false);
        }
        
    });
    $(document).on('change','.voter',function(){
        var vals = $(this).val();
        if(vals=='no'){
            $('.precint').prop('disabled', 'disabled');
        }else{
            $('.precint').prop('disabled', false);
        }
    });
    $(document).on('change','.civil_status',function(){
        var civil = $(this).val();
        if(civil=='single'){
          $('.maiden').prop('disabled', 'disabled');
        }else{
            $('.maiden').prop('disabled', false);
        }
        
    });
    $(document).on('change','.civil_status',function(){
        var valssas = $(this).val();
        if(valss=='married'){
        $('.maiden').prop('required',true);
        }else{
            $('.maiden').prop('required',false);
        }
    });
</script>
  
<script>
  $(function () {
    $('#residentTable').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excelHtml5',
            customize: function(xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
 
                // Loop over the cells in column `C`
                $('row c[r^="C"]', sheet).each( function () {
                    // Get the value
                    if ( $('is t', this).text() == 'New York' ) {
                        $(this).attr( 's', '20' );
                    }
                });
            }
        }]
    });
    
  });

</script>

  <!-- $('.voter').change(function(){
        var val = $(this).val();
        if(val=='no'){
            $('.precint').prop('disabled', 'disabled');
        }else{
            $('.precint').prop('disabled', false);
        }

    });

    function myFunction(x) {
        x.classList.toggle("change");
        $("#mobile-menu").toggleClass("menu-hidden", 800, "easeOutQuint");
      };
      
    $('.voter_add').change(function(){
      var val = $(this).val();
      if(val=='no'){
          $('.precint_add').prop('disabled', 'disabled');
      }else{
          $('.precint1').prop('disabled', false);
      }
  });


      
        function myFunction(x) {
          x.classList.toggle("change");
          $("#mobile-menu").toggleClass("menu-hidden", 800, "easeOutQuint");
        }; -->

<script>
  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

<script>
  
  $(document).on('change','.voter',function(){
        var vals = $(this).val();
        if(val=='no'){
            $('.precint').prop('disabled', 'disabled');
        }else{
            $('.precint').prop('disabled', true);
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
