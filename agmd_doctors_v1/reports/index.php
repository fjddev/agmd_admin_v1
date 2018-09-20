

<?php include '../view/header.php'; ?>
<?php require_once('../model/database.php');?>
<?php require_once('../model/DoctorDB.php');?>

<?php
             $us_states=Array(
                    'AL' => 'Alabama',
                    'AK' => 'Alaska',
                    'AZ' => 'Arizona',
                    'AR' => 'Arkansas',
                    'CA' => 'California',
                    'CO' => 'Colorado',
                    'CT' => 'Connecticut',
                    'DE' => 'Delaware',
                    'DC' => 'District Of Columbia',
                    'FL' => 'Florida',
                    'GA' => 'Georgia',
                    'HI' => 'Hawaii',
                    'ID' => 'Idaho',
                    'IL' => 'Illinois',
                    'IN' => 'Indiana',
                    'IA' => 'Iowa',
                    'KS' => 'Kansas',
                    'KY' => 'Kentucky',
                    'LA' => 'Louisiana',
                    'ME' => 'Maine',
                    'MD' => 'Maryland',
                    'MA' => 'Massachusetts',
                    'MI' => 'Michigan',
                    'MN' => 'Minnesota',
                    'MS' => 'Mississippi',
                    'MO' => 'Missouri',
                    'MT' => 'Montana',
                    'NE' => 'Nebraska',
                    'NV' => 'Nevada',
                    'NH' => 'New Hampshire',
                    'NJ' => 'New Jersey',
                    'NM' => 'New Mexico',
                    'NY' => 'New York',
                    'NC' => 'North Carolina',
                    'ND' => 'North Dakota',
                    'OH' => 'Ohio',
                    'OK' => 'Oklahoma',
                    'OR' => 'Oregon',
                    'PA' => 'Pennsylvania',
                    'RI' => 'Rhode Island',
                    'SC' => 'South Carolina',
                    'SD' => 'South Dakota',
                    'TN' => 'Tennessee',
                    'TX' => 'Texas',
                    'UT' => 'Utah',
                    'VT' => 'Vermont',
                    'VA' => 'Virginia',
                    'WA' => 'Washington',
                    'WV' => 'West Virginia',
                    'WI' => 'Wisconsin',
                    'WY' => 'Wyoming',
                  );  
             
    $doctorDB = new DoctorDB(); 


             
 
   ?>   
    <table class="table table-striped">


            <th> <?php echo "Report" ?></th>
            <th>Filter1</th>      
            <th>Filter2</th>
            <th><?php echo "Select" ?></th>   
        <tr>
          <form  method="post" action="../reports/doctorByStateReport.php" >
            <td>US Doctor Report by State and all interests  </td>
            <td>  
                <select name="state_selected" id="state_selected" >
                        <?php foreach($us_states as $key=>$state): ?>
                              <option value="<?php echo $key; ?>" >  <?php echo $state; ?> </option>
                        <?php endforeach; ?>

                </select>
            </td>
            <td>&nbsp;</td>
            <td>
                 <input class="btn btn-info" type="submit" value="Report"> 
            </td>                 
           </form>

 
        </tr>
        
        <tr>
          <form  method="post" action="../reports/doctorByStateInterestReport.php" >
            <td>US Doctor Report by State and interest  </td>
            <td>  
                <select name="state_selected" id="state_selected" >
                        <?php foreach($us_states as $key=>$state): ?>
                              <option value="<?php echo $key; ?>" >  <?php echo $state; ?> </option>
                        <?php endforeach; ?>

                </select>
            </td>
            <td>  
                <?php
                         $interests = Array();
                         $interests=$doctorDB->get_distinct_interests();
        
                ?>
                <select name="interest_selected" id="interest_selected" >
                        <?php foreach($interests as $interest): ?>
                              <option value="<?php echo $interest; ?>" >  <?php echo $interest; ?> </option>
                        <?php endforeach; ?>

                </select>
            </td>            
            <td>
                 <input class="btn btn-info" type="submit" value="Report"> 
            </td>                 
           </form>

 
        </tr>        
    </table>

<?php include '../view/footer.php'; ?>

