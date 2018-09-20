<?php include '../view/header.php'; ?>
<?php require('../model/database.php');?>
<?php require('../model/DoctorDB.php');?>
<?php     

    $doctorDB = new DoctorDB();   
    
    $countryArray = $doctorDB->getCountryArray();

    
    $careLevelArray = $doctorDB->getCareLevelArray();

//     $titles = [];
//  function addAnotherTitle(){
//      $t = $_POST["title"];
//      echo "php " . $t;
//  }
?> 


<main>
    <h1>Add A Doctor</h1>
    

    <form action="index.php" method="post" id="edit_doctor_address_form">
        <input type="hidden" name="action" value="add_doctor_db" />

        
        <div class="input-group">
             
                <div class="input-group-prepend">
                   <span class="input-group-text" id="">Credentials/First and Last Name:</span>
                </div>   
            <input class="form-control" type="text" name="credentials" value="" placeholder="Enter Credentials" >
            <input class = "form-control" type="text" name="dr_fname" value="" placeholder="Enter First Name">
            <input class="form-control" type="text" name="dr_lname" value="" placeholder="Enter Last Name" >
        </div>    

        <div class="input-group">
             
                <div class="input-group-prepend">
                   <span class="input-group-text" id="">Titles:</span>
                </div>   
 
            <input class="form-control title" type="text" name="title[]" value="" placeholder="Enter Title" >
            <input class="form-control title" type="text" name="title[]" value="" placeholder="Enter Title">
            <input class="form-control title" type="text" name="title[]" value="" placeholder="Enter Title">
            <input class="form-control title" type="text" name="title[]" value="" placeholder="Enter Title">
            <input class="form-control title" type="text" name="title[]" value="" placeholder="Enter Title">
        </div>

        <br>
        <div class="input-group">
             
                <div class="input-group-prepend">
                   <span class="input-group-text" id="">Care Level:</span>
                </div>   
                <select id="care_level" name="dr_care_level">   
                    <?php foreach($careLevelArray as $key=>$value){ ?>
                        <option value="<?php echo $key; ?>"> <?php echo $value; ?> </option>
                    <?php } ?>
                </select>
        </div>   
        <br>             
        <div class="input-group">
             
                <div class="input-group-prepend">
                   <span class="input-group-text" id="">Country:</span>
                </div>   
                 <select id="country_code" name="dr_country_code">   
                      <?php foreach($countryArray as $value){ ?>
                          <option value="<?php echo $value['code']; ?>"> <?php echo $value['name']; ?> </option>
                <?php } ?>
                </select>
        </div>   
        <br>        
        

        <input class="btn btn-primary" type="submit" value="Add Doctor">
        <br>
    </form>
        <a class="mt-2 btn btn-secondary btn-sm" href="index.php?action=list_doctors">Back: View Doctor List</a>
</main>
<?php include '../view/footer.php'; ?>