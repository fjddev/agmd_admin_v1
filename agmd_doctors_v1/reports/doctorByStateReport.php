<?php include '../view/header.php'       ?>
<?php include('../model/database.php');   ?>
<?php include('../model/DoctorDB.php');   ?>
<?php require('../model/DoctorInterest.php');   ?>
<?php
      
     
     

     
     $headings=Array('Name', 'State', 'Interest');

        $doctorDB = new DoctorDB(); 
        $state = filter_input(INPUT_POST, 'state_selected');
        $interest = filter_input(INPUT_POST, 'interest_selected');

        $doctor_list = Array();
        $doctor_list=$doctorDB->getDoctorReportArray($state);
 
        
?>
<main>
    <table class="table table-striped">
        <tr>
            <?php foreach($headings as $heading) : ?>
            <th> <?php echo $heading ?></th>
            <?php endforeach; ?>
            <th><?php echo "Select"  ?></th>
            
        </tr>
        <?php foreach($doctor_list as $id=>$doctor) : ?>
            <tr>
                 <?php    foreach($doctor as $key=>$doctor_results) : ?>
                

                
                       <?php 
                       if($key == 'interest'){

                           $doctor_interest = $doctor_results; ?>
 
                           
                <td>
                           <select>
                           <?php foreach($doctor_interest as $interest): ?>
                                <option value="<?php $interest->getId(); ?>" >  <?php echo $interest->getInterest(); ?> </option>
                           <?php endforeach; ?>
                           
                           </select>
                </td>   

                 
                              
                       <?php }else{ ?>
            <td>
                            <?php echo $doctor[$key];  ?>   
            </td>
                             
                       <?php }?>

               
                     <?php endforeach; ?>
            <td>
                  <form action="../doctor_manager/index.php" method="post" id="doctor_report_by_state_interest">
                        <input type="hidden" name="action" value="doctor_report_by_state_interest" />
                        <input type="hidden" name="doctor_id" value="<?php echo $id?>"/>
                        <input class="btn btn-info" type="submit" value="Doctor Detail">
                  </form>      
            </td>            

            </tr>
        <?php endforeach; ?>
    </table>
</main>    
<a class="mt-2 btn btn-secondary btn-sm" href="index.php?action=list_doctors">Back: View Doctor List</a> 
<?php include '../view/footer.php'; ?>
        
    


