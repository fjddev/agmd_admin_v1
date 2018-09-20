<?php include '../view/header.php'; ?>
<?php require('../model/database.php');?>
<?php require('../model/DoctorDB.php');?>
<?php
       $doctor_id = filter_input(INPUT_GET, 'doctor_id');
       $full_name = filter_input(INPUT_GET, 'full_name');
       $doctorDB = new DoctorDB();
       $address_types = $doctorDB->getDoctorAddressTypes();



?>
<main>

    
    <h3>Add Doctor Address: <?php echo $full_name; ?></h3>
    <form action="index.php" method="post" id="edit_doctor_address_form">
        <input type="hidden" name="action" value="add_doctor_location_db" />
        <input type="hidden" name="doctor_id" value="<?php echo $doctor_id; ?>" />
        <div class="input-group">
             
                <div class="input-group-prepend">
                   <span class="input-group-text" id="">Type:</span>
                </div>               
                <select id="address_type" name="address_type">

                  <?php foreach($address_types as $key => $type){ ?>

                            <option value="<?php echo $key; ?>"    > <?php echo $type; ?> </option>
                  <?php } ?>
              </select><br>
        </div>
         <div class="input-group">
             
                <div class="input-group-prepend">
                   <span class="input-group-text" id="">Status:</span>
                </div>               
                <select id="address_status" name="address_status"> 
                    <option value="Active" >Active</option>
                    <option value="InActive">Inactive</option>
                </select><br>    
         </div>
          

        <div class="input-group">
                 <div class="input-group-prepend">
                   <span class="input-group-text" id="">Facility Name:</span>
                </div>   
                <input class="form-control"  type="text" name="dr_address_name" value="">
        </div>
        


        <div class="input-group">
                 <div class="input-group-prepend">
                   <span class="input-group-text" id="">Addresses:</span>
                </div>         
                <input class="form-control" type="text" name="dr_address" value="">
                <input class="form-control" type="text" name="dr_address2" value="">
                <input class="form-control" type="text" name="dr_address3" value="">
                <input class="form-control" type="text" name="dr_address4" value="">
        </div>
      <div class="input-group">
                 <div class="input-group-prepend">
                   <span class="input-group-text" id="">City/State/Zip:</span>
                </div>      
                <input class="form-control" type="text" name="dr_city" value="">

                <input class="form-control" type="text" name="dr_state" value="">

                <input class="form-control" type="text" name="dr_zip5" value="">

                <input  class="form-control" type="text" name="dr_zip4" value="">
      </div>
        <br>


        <input class="btn btn-primary" type="submit" value="Add Address">
        <br>
    </form>
        <a class="mt-2 btn btn-secondary btn-sm" href="index.php?action=list_doctors&doctor_id=<?php echo $doctor_id; ?>">Back: View Doctor List</a>
</main>
<?php include '../view/footer.php'; ?>