<?php include '../view/header.php'       ?>
<?php include('../model/database.php');   ?>
<?php include('../model/DoctorDB.php');   ?>
<?php
      
     
     

     
       $headings=Array('Name', 'State', 'Interest');

        $doctorDB = new DoctorDB(); 
        $state = filter_input(INPUT_POST, 'state_selected');
        $interest = filter_input(INPUT_POST, 'interest_selected');
        
        $doctor_list = Array();
        $doctor_list=$doctorDB->getDoctorReportByInterestArray($state, $interest);        
        
        if(empty($doctor_list)){ 
            echo "<h4 style='color: black'> <center>No Doctor found with interest: '{$interest}' in '{$state}'</center></h4>";
        }else{
            echo "<h4 style='color: black'> <center>Interest  '{$interest}'  Found in '{$state}'.</center></h4>";
        }
          

?>
<main>
    <?php  if(!empty($doctor_list)){  ?>
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

                                <td>
                                  <?php echo $doctor[$key];  ?>   
                                </td>
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
    <?php } ?>    <!-- doctor_list not empty -->
<a class="mt-2 btn btn-secondary btn-sm" href="index.php?action=list_doctors">Back: View Doctor List</a>    
<?php include '../view/footer.php'; ?>
        
    


