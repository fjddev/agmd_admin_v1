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
       
       $interests = $doctorDB->get_available_interests($doctor_id);
?>    
<main>
    
    <h3>Add Doctor Interest: <?php echo $current_doctor->getFullName(); ?></h3>
    <form action="index.php" method="post" id="edit_doctor_address_form">
        <input type="hidden" name="action" value="add_doctor_interest_db" />
        <input type="hidden" name="doctor_id" value="<?php echo $doctor_id; ?>" />
        

        <div class="input-group">
             <div class="input-group-prepend">
                   <span class="input-group-text" id="">Interests:</span>
             </div>      
                   <select name="dr_interest" id="interest_selected" >
                        <?php foreach($interests as $interest): ?>
                              <option value="<?php echo $interest; ?>" >  <?php echo $interest; ?> </option>
                        <?php endforeach; ?>

                    </select>
        </div>

       <input class="btn btn-primary" type="submit" value="Add Interest">
        <br>
    </form>
    <a class="mt-2 btn btn-secondary btn-sm" href="index.php?action=list_doctors&doctor_id=<?php echo $doctor_id; ?>">Back: View Doctor List</a>
</main>
<?php include '../view/footer.php'; ?>