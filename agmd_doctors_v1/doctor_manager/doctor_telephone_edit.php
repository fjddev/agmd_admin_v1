<?php include '../view/header.php'; ?>
<?php require('../model/database.php'); ?>
<?php require('../model/doctor.php'); ?>
<?php require('../model/DoctorDB.php'); ?>
<?php require('../model/DoctorTelephone.php'); ?>

<?php 
    $doctor_id = filter_input(INPUT_GET, 'doctor_id');
    $telephone_id = filter_input(INPUT_GET, 'telephone_id');
    $address_id = filter_input(INPUT_GET, 'address_id');
    
    $doctorDB = new DoctorDB();
    $current_doctor = $doctorDB->getDoctor($doctor_id);
    
    $doctor_phone = $doctorDB->getOneDoctorTelephone_us($telephone_id, $doctor_id, $address_id);  
    $telephone_types = $doctorDB->getDoctorTelephoneTypes(); 
    
    $selected = $doctor_phone->getType();
    $address_list = $doctorDB->getDoctorDisplayAddresses($doctor_id);    
   


?>
    
    <h3>Edit Doctor Telephone: <?php echo $current_doctor->getFullName(); ?></h3>
    <form action="index.php" method="post" id="edit_doctor_address_form">
        <input type="hidden" name="action" value="update_doctor_telephone_db" />
        
        <input type="hidden" name="telephone_id" value="<?php echo $telephone_id; ?>" />
        <input type="hidden" name="doctor_id" value="<?php echo $doctor_id; ?>" />

        
        
        <div class="input-group">
             
                <div class="input-group-prepend">
                   <span class="input-group-text" id="">Telephone Type:</span>
                </div>          
                <select id="telephone_type" name="telephone_type">   
                    <?php foreach($telephone_types as $key => $type){ ?>
                          <option value="<?php echo $key; ?>"  <?php if ($selected == $key) echo ' selected="selected"'; ?> > <?php echo $type; ?> </option>
                            <?php } ?>
                </select>
         </div>   

         <div class="input-group">
             <div class="input-group-prepend">
                   <span class="input-group-text" id="">Phone Number:</span>
             </div>       
             <input type="text" name="dr_telephone" value="<?php echo $doctor_phone->getPhone();  ?>">
         </div>    
        
         <div class="input-group">
             <div class="input-group-prepend">
                   <span class="input-group-text" id="">Location:</span>
            </div>       
             <select id="address_id" name="address_id">
           
                <?php foreach($address_list as $key => $address){ ?>

                      <option value="<?php echo $key; ?>" 
                          <?php if ($address_id == $key) echo ' selected="selected"'; ?>    > <?php echo $address; ?> </option>
                 <?php } ?>
            </select>
         </div>    
   
 

        <br>
        <input class="btn btn-primary" type="submit" value="Submit">
    </form>
    <br>
   <a class="mt-2 btn btn-secondary btn-sm" href="index.php?action=list_doctors&doctor_id=<?php echo $doctor_id; ?>">Back: View Doctor List</a>
</main>
<?php include '../view/footer.php'; ?>