<?php include '../view/header.php'; ?>
<?php require('../model/database.php'); ?>
<?php require('../model/doctor.php'); ?>
<?php require('../model/DoctorDB.php'); ?>
<?php require('../model/DoctorAddress.php'); ?>
<?php
       $doctor_id = filter_input(INPUT_GET, 'doctor_id');
       $full_name = filter_input(INPUT_GET, 'full_name');
       
       $doctorDB = new DoctorDB();

       $current_doctor = $doctorDB->getDoctor($doctor_id);   
       $telephone_types = $doctorDB->getDoctorTelephoneTypes();
 
       $address_list = $doctorDB->getDoctorDisplayAddresses($doctor_id);
?>       
<main>
    
    <h3>Add Doctor Telephone: <?php echo $full_name; ?></h3>
    <form action="index.php" method="post" id="edit_doctor_address_form">
        <input type="hidden" name="action" value="add_doctor_telephone_db" />
        <input type="hidden" name="doctor_id" value="<?php echo $doctor_id; ?>" />

        <div class="input-group">
             
                <div class="input-group-prepend">
                   <span class="input-group-text" id="">Type:</span>
                </div> 
                    <select id="telephone_type" name="telephone_type">

                      <?php foreach($telephone_types as $key => $type){ ?>
                                <option value="<?php echo $key; ?>"    > <?php echo $type; ?> </option>
                      <?php } ?>
                  </select>
        </div>    

        <div class="input-group">
             
                <div class="input-group-prepend">
                   <span class="input-group-text" id="">Phone:</span>
                </div> 
                <input class="form-control" type="text" name="dr_telephone" value="">
        </div>
       
 
        <div class="input-group">
             
                <div class="input-group-prepend">
                   <span class="input-group-text" id="">Locations:</span>
                </div>      
                 <select id="address_list" name="address_list">
           
                <?php foreach($address_list as $key => $address){ ?>

                          <option value="<?php echo $key; ?>"    > <?php echo $address; ?> </option>
                <?php } ?>

            </select>
        </div>            
        <input class="btn btn-primary" type="submit" value="Add Telephone">
        <br>
    </form>
    <a class="mt-2 btn btn-secondary btn-sm" href="index.php?action=list_doctors&doctor_id=<?php echo $doctor_id; ?>">Back: View Doctor List</a>
</main>
<?php include '../view/footer.php'; ?>