<?php session_start(); ?>

<?php

require('../model/database.php');
require('../model/doctor.php');
require('../model/DoctorDB.php');
require('../model/DoctorAddress.php');
?>

<?php
    $address_id = filter_input(INPUT_GET, 'address_id');
    $doctor_id = filter_input(INPUT_GET, 'doctor_id');
//    echo "address_id {$address_id}<br>";
//    die($doctor_key);
    $doctorDB = new DoctorDB();
    $current_doctor = $doctorDB->getDoctor($doctor_id);
    
    $address_types = $doctorDB->getDoctorAddressTypes();
    
    $doctor_facility = $doctorDB->getOneDoctorAddress_us($doctor_id, $address_id); 
    
    
    
    
    $selected = $doctor_facility->getAddress_type();
    
 
?>
<?php include '../view/header.php'; ?>
<main>
    
    <h3>Edit Doctor Address: <?php echo $current_doctor->getFullName(); ?></h3>
    <form action="index.php" method="post" id="edit_doctor_address_form">
        <input type="hidden" name="action" value="update_doctor_location_db" />
        <input type="hidden" name="facility_id" value="<?php echo $address_id; ?>" />
        <input type="hidden" name="doctor_id" value="<?php echo $doctor_id; ?>" />
        
        <div class="input-group">
             
                <div class="input-group-prepend">
                   <span class="input-group-text" id="">Type:</span>
                </div>        
          <select id="address_type" name="address_type">
           
            <?php foreach($address_types as $key => $type){ ?>
              <option value="<?php echo $key; ?>"  <?php if ($selected == $key) echo ' selected="selected"'; ?> > <?php echo $type; ?> </option>
              

            <?php } ?>
        </select>
        </div>    

        
         <div class="input-group">
             
                <div class="input-group-prepend">
                   <span class="input-group-text" id="">Status:</span>
                </div>      
                <input class="form-control" type="text" name="status" id="address_status" value="<?php echo $doctor_facility->getStatus();?>" >    
         </div>
        <br>
                      
        
        <div class="input-group">
                 <div class="input-group-prepend">
                   <span class="input-group-text" id="">Facility Name:</span>
                </div>       
                <input class="form-control" type="text" name="address_name" id="name" value="<?php echo $doctor_facility->getAddress_name();  ?>" >
        </div>
            

        <div class="input-group">
                 <div class="input-group-prepend">
                   <span class="input-group-text" id="">Addresses:</span>
                </div>         

            <input class="form-control" type="text" name="dr_address" value="<?php echo $doctor_facility->getAddress();  ?> " placeholder="Enter Address1"><br>

            <input class="form-control" type="text" name="dr_address2" value="<?php echo $doctor_facility->getAddress2();  ?>" placeholder="Enter Address2"><br>

            <input class="form-control" type="text" name="dr_address3" value="<?php echo $doctor_facility->getAddress3();  ?>"  placeholder="Enter Address3"><br>

            <input class="form-control" type="text" name="dr_address4" value="<?php echo $doctor_facility->getAddress4();  ?>"  placeholder="Enter Address4"><br>
        </div>
        
        
      <div class="input-group">
                 <div class="input-group-prepend">
                   <span class="input-group-text" id="">City/State/Zip:</span>
                </div>      
            <input class="form-control" type="text" name="dr_city" value="<?php echo $doctor_facility->getCity();  ?>" placeholder="Enter City">
            <input class="form-control" type="text" name="dr_state" value="<?php echo $doctor_facility->getState();  ?>" placeholder="Enter State">
            <input class="form-control" type="text" name="dr_zip5" value="<?php echo $doctor_facility->getZip5();  ?>" placeholder="Enter Zip(5)">
            <input class="form-control" type="text" name="dr_zip4" value="<?php echo $doctor_facility->getZip4();  ?>" placeholder="Zip(4)">
         </div>   
        <br>        


        <input class="btn btn-primary" type="submit" value="Submit">
        <br>
    </form>
    <a class="mt-2 btn btn-secondary btn-sm" href="index.php?action=list_doctors&doctor_id=<?php echo $doctor_id; ?>">Back: View Doctor List</a>
</main>

<?php include '../view/footer.php'; ?>