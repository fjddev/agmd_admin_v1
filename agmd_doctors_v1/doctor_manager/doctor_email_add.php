<?php include '../view/header.php'; ?>
<?php
//       global $current_doctor;
       $doctor_id = filter_input(INPUT_GET, 'doctor_id');
       $full_name = filter_input(INPUT_GET, 'full_name');



?>
<main>
    <h1>Add Doctor Email</h1>
    
    <h3>Doctor: <?php echo $full_name; ?></h3>
    <form action="index.php" method="post" id="add_email_form">
        <input type="hidden" name="action" value="add_doctor_email_db" />
        <input type="hidden" name="doctor_id" value="<?php echo $doctor_id; ?>" />
        
        <div class="input-group">
             
                <div class="input-group-prepend">
                   <span class="input-group-text" id="">Email:</span>
                </div>     
                <input type="text" name="dr_email" value="" placeholder="Enter Email">
        </div>
        <br>

        <input class="btn btn-primary" type="submit" value="Add Email">
        <br>
    </form>
     <a class="mt-2 btn btn-secondary btn-sm" href="index.php?action=list_doctors&doctor_id=<?php echo $doctor_id; ?>">Back: View Doctor List</a>
</main>
<?php include '../view/footer.php'; ?>