<?php session_start(); ?>

<?php include '../view/header.php'; ?>

<?php 

    $doctorDB = new DoctorDB();
    $current_doctor = $doctorDB->getDoctor($doctor_id);

?>

<main>

    
    <h3>Edit Doctor: <?php echo $current_doctor->getFullName(); ?></h3>
    <form action="index.php" method="post" id="edit_doctor_form">
        <input type="hidden" name="action" value="update_doctor_db" />
        <input type="hidden" name="doctor_id" value="<?php echo $doctor_id; ?>" />

        <!--mx-sm-6 mb-2-->
        <div class="input-group">
<!--            <div class="row">-->
                <div class="input-group-prepend">
                   <span class="input-group-text" id="">Credentials First and Last Name</span>
                </div>     
                <input class="form-control" type="text" name="credentials" value="<?php echo $current_doctor->getCredentials();  ?>" placeholder="Enter Credentials">
                <input class="form-control " type="text" name="first_name" value="<?php echo $current_doctor->getFirst_name();  ?>" placeholder="Enter First Name">
                <input class="form-control" type="text" name="last_name" value="<?php echo $current_doctor->getLast_name();  ?>" placeholder="Enter Last Name">
        </div>
        <br>
        <div class="input-group">
                 <div class="input-group-prepend">
                   <span class="input-group-text" id="">Titles</span>
                </div>            
                <input class="form-control" type="text" name="title0" value="<?php echo $current_doctor->getTitle(0); ?>" placeholder="Optional: Enter Title 1"><br>
                <input class="form-control" type="text" name="title1" value="<?php echo $current_doctor->getTitle(1); ?>" placeholder="Optional: Enter Title 2"><br>
                <input class="form-control" type="text" name="title2" value="<?php echo $current_doctor->getTitle(2); ?>" placeholder="Optional: Enter Title 3"><br>
                <input class="form-control" type="text" name="title3" value="<?php echo $current_doctor->getTitle(3); ?>" placeholder="Optional: Enter Title 4"><br>
                <input class="form-control" type="text" name="title4" value="<?php echo $current_doctor->getTitle(4); ?>" placeholder="Optional: Enter Title 5">
 
                
        </div>    
        <br>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="carelevel">Care Level:</label>
          </div>
          <select class="custom-select" id="carelevel" name="care_level">
                    <option value="-1">Select Care Level:</option>
                    <?php foreach($careLevelArray as $key=>$value){ ?>
                              <option value="<?php echo $key; ?>" <?php if ($selected_care == $key) echo ' selected="selected"'; ?> > <?php echo $value; ?> </option>
                    <?php } ?>
          </select>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="country_code">Country:</label>
          </div>
          <select class="custom-select" id="country_code" name="country_code">
                    <?php foreach($countryArray as $value){ ?>
                              <option value="<?php echo $value['code']; ?>" <?php if ($selected_country == $value['code']) echo ' selected="selected"'; ?> > <?php echo $value['name']; ?> </option>
                    <?php } ?>
          </select>
        </div>
     
        
     
        <br>        
 

        <label>&nbsp;</label>
        <input class="btn btn-primary" type="submit" value="Update">
       
    </form>
    
    <a class="mt-2 btn btn-secondary btn-sm" href="index.php?action=list_doctors">Back: View Doctor List</a>
</main>
<?php include '../view/footer.php'; ?>