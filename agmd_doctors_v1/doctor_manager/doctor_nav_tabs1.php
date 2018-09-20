<!-- Nav tabs -->
<?php 
      global $current_doctor;
      $doctor_id = $current_doctor->getId();
      $doctorDB = new DoctorDB();
      $address_types = $doctorDB->getDoctorAddressTypes();

?>
<br><br>
        <table class="table table-bordered table-striped">
            <tr >
              
                <th  class="col-9" id="th_width">Doctor</th>               
                <th class="col-3 right">Edit</th>  
            </tr>   
            <br>
            <tr>
                <td><?php echo $current_doctor->getFullName() ; ?></td>

               <td><form action="." method="post"
                          id="edit_doctor_form">
                    <input type="hidden" name="action"
                           value="edit_doctor_selection">
                    <input type="hidden" name="doctor_id"
                           value="<?php  echo $current_doctor->getId(); ?>">
                    <input class="btn btn-success btn-sm" type="submit" value="Edit">
                </form></td> 
        </table>        
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true">Address</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#telephone" role="tab" aria-controls="telephone" aria-selected="false">Telephone</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="messages-tab" data-toggle="tab" href="#email" role="tab" aria-controls="email" aria-selected="false">Email</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="settings-tab" data-toggle="tab" href="#interests" role="tab" aria-controls="interests" aria-selected="false">Interests</a>
  </li>
</ul>

<!-- Location/Address -->
<div class="tab-content">
  <div class="tab-pane active" id="address" role="tabpanel" aria-labelledby="address-tab">
      <table class="table table-bordered table-striped">
             <tr >  
                <th id="th_width">Location</th>
                <th>City</th>
                <th>State</th>    
                <th>Status</th>    
                <th><a class="btn btn-primary btn-sm"  href="doctor_address_add.php?doctor_id=<?php echo $doctor_id; ?>&full_name=<?php echo $current_doctor->getFullName(); ?>">Add</a></th> 
                
    
            </tr>   
            <?php foreach ($facilities_us as $facility) : ?>
            <tr>
                <?php if(!empty($facility->getAddress_name())) {?>
                   <td><?php echo $facility->getAddress_name(); ?></td>
                   <td><?php echo $facility->getCity(); ?></td>
                   <td><?php echo $facility->getState(); ?></td>  
                   <td><?php echo $facility->getStatus(); ?></td>  
                    
                    <td><a class="btn btn-success btn-sm"  href="doctor_address_edit.php?doctor_id=<?php echo $doctor_id; ?> &address_id=<?php echo $facility->getAddress_id(); ?>" >Edit</a></td> 
                   <td><a class="btn btn-danger btn-sm"  href="?action=reset_doctor_address_db&doctor_id=<?php echo $doctor_id; ?>&address_id=<?php echo $facility->getAddress_id(); ?>">Remove</a></td> 
                <?php } ?>   
            </tr>
            <?php endforeach; ?>            
      </table>    
  </div>
    
  <!--telephone-->  
  <div class="tab-pane" id="telephone" role="tabpanel" aria-labelledby="telephone-tab">
      <table class="table table-bordered table-striped">
          <tr>
                <th>phone</th>
                <th>Location</th>
                <th><a class="btn btn-primary btn-sm"  href="doctor_telephone_add.php?doctor_id=<?php echo $doctor_id; ?>&full_name=<?php echo $current_doctor->getFullName(); ?>">Add</a></th>                
          </tr>
          <?php foreach ($telephones as $telephone) : ?>
           <tr>
               <td><?php echo $telephone->getPhone(); ?></td>
               <!--Match the Address name based on the telephone address_id-->
               <td><?php echo $facilities_us[$telephone->getAddress_id()]->getAddress_name(); ?></td>
               <td> 
                   <a class="btn btn-success btn-sm" 
                 href= "doctor_telephone_edit.php?doctor_id=<?php echo $telephone->getDoctor_id(); ?>
                  &telephone_id=<?php echo $telephone->getTelephoneId(); ?>
                  &address_id=<?php echo $telephone->getAddress_id(); ?>
                                                 " >Edit</a>
                  
               </td> 
               
               <td><a class="btn btn-danger btn-sm"  href="?action=delete_doctor_telephone_db&doctor_id=<?php echo $telephone->getDoctor_id(); ?>&telephone_id=<?php echo $telephone->getTelephoneId(); ?>">Remove</a></td> 
           </tr>    
          <?php endforeach; ?>          
      </table>
  </div>
    
  <!--eMail-->
  <div class="tab-pane" id="email" role="tabpanel" aria-labelledby="email-tab">
      <table class="table table-bordered table-striped">
            <tr>
                <th>Email</th>      
                
                <th><a class="btn btn-primary btn-sm"  href="doctor_email_add.php?doctor_id=<?php echo $doctor_id; ?>&full_name=<?php echo $current_doctor->getFullName(); ?>">Add</a></th>
            </tr>          
            <?php foreach ($email_addresses as $key=>$email) : ?>
                    <tr>
                        <td><?php echo $email->getEmail(); ?></td>
                        <td><a class="btn btn-success btn-sm"  href="doctor_email_edit.php?doctor_id=<?php echo $doctor_id; ?>&full_name=<?php echo $current_doctor->getFullName(); ?>&email_id=<?php echo $email->getId(); ?>&email=<?php echo $email->getEmail(); ?>">Edit</a></td> 
                        <td><a class="btn btn-danger btn-sm"  href="?action=delete_doctor_email_db&doctor_id=<?php echo $doctor_id; ?>&email_id=<?php echo $email->getId(); ?>">Remove</a></td> 
                    </tr>
            <?php endforeach; ?>                      
      </table>
  </div>
  <!--
  
          Interests        
  
  -->
  <div class="tab-pane" id="interests" role="tabpanel" aria-labelledby="settings-tab">
      
      <table class="table table-bordered table-striped">
           <tr>
                <th>Interests</th>     
                <th><a class="btn btn-primary btn-sm"  href="doctor_interest_add.php?doctor_id=<?php echo $doctor_id; ?>&full_name=<?php echo $current_doctor->getFullName(); ?>">Add</a></th>

            </tr>   

            
            <?php foreach ($interests as $interest) : ?>
                <tr>
                    <td><?php echo $interest->getInterest(); ?></td>   
                    <td><a class="btn btn-danger btn-sm"  href="?action=delete_doctor_interest_db&doctor_id=<?php echo $doctor_id; ?>&interest_id=<?php echo $interest->getId(); ?>">Remove</a></td>   
                </tr>                  
            <?php endforeach; ?>                     
          
      </table>      
  </div>
</div>






