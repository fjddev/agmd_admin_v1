<?php include '../view/header.php'; ?>
<?php
       $doctor_id = filter_input(INPUT_GET, 'doctor_id');
       $full_name = filter_input(INPUT_GET, 'full_name');
       $email_id = filter_input(INPUT_GET, 'email_id');
       $doctor_email = filter_input(INPUT_GET, 'email');

?>

<main>
    <h1>Edit Doctor Email</h1>
    
    <h3>Doctor: <?php echo $full_name; ?></h3>
    <form action="index.php" method="post" id="edit_doctor_address_form">
        <input type="hidden" name="action" value="update_doctor_email_db" />
        
        <input type="hidden" name="email_id" value="<?php echo $email_id; ?>" />
        <input type="hidden" name="doctor_id" value="<?php echo $doctor_id; ?>" />

        <div class="input-group">
             
                <div class="input-group-prepend">
                   <span class="input-group-text" id="">Email:</span>
                </div> 
                <input type="text" name="dr_email" value="<?php echo $doctor_email;  ?>">
        </div>
        <br>

        <input class="btn btn-primary" type="submit" value="Edit Email">
    </form>
    <br>
   <a class="mt-2 btn btn-secondary btn-sm" href="index.php?action=list_doctors&doctor_id=<?php echo $doctor_id; ?>">Back: View Doctor List</a>
</main>
<?php include '../view/footer.php'; ?>