<?php require('database.php'); ?>
<?php

class DoctorJsonUtility{
    
  public function address_types_json(){
        $db = Database::getDB();
        $query = 'SELECT * FROM doctor_address_types';
   
        $statement = $db->prepare($query);
        $statement->execute();     
        
        
        //create an associative array of address types
        $address_types = array();
        
       foreach ($statement as $row) {
           $address_types[]  = array(
                    'type_code'=>$row['type_code'],
                     'type_value'=>$row['type_value']
                              
           );
       }
       
       $address_types_json = json_encode($address_types); 
       $file_name = '/agmd/web_2017/json/address_types.json';
       if(file_put_contents($file_name, $address_types_json)){
           
       }
  }  
    public function telephone_types_json(){
        $db = Database::getDB();
        $query = 'SELECT * FROM doctor_telephone_types';
   
        $statement = $db->prepare($query);
        $statement->execute();     
        
        
        //create an associative array of address types
        $telephone_types = array();
        
       foreach ($statement as $row) {
           $telephone_types[] = array(
               'type_code'=>$row['type_code'],
               'type_value'=>$row['type_value']
           );
       }
       
       $telephone_types_json = json_encode($telephone_types); 
       $file_name = '/agmd/web_2017/json/telephone_types.json';
       if(file_put_contents($file_name, $telephone_types_json)){
           
       }       
       

        
        
    }     
    public function care_types_json(){
        $db = Database::getDB();
        $query = 'SELECT * FROM doctor_care_level_types';
   
        $statement = $db->prepare($query);
        $statement->execute();     
        
        
        //create an associative array of care types
        $care_types = array();
        
       foreach ($statement as $row) {
           $care_types[] = array(
               'care_level_key'=>$row['care_level_key'],
               'care_type_value'=>$row['care_type_value']
           );
       }
       
       $care_types_json = json_encode($care_types); 
       $file_name = '/agmd/web_2017/json/care_level_types.json';
       if(file_put_contents($file_name, $care_types_json)){
           
       }       
       

        
        
    }       
    
    /**
     * doctor table
     */
    public function doctors_json() {
        $db = Database::getDB();
        $query = 'SELECT * FROM doctor';
        $statement = $db->prepare($query);
        $statement->execute();
     
        $doctors = array();
        foreach ($statement as $row) {
            $doctors[] = array(
            'doctor_id'=>$row['doctor_id'],
            'credentials'=>$row['credentials'],
            'first_name'=>$row['first_name'],  
            'last_name'=>$row['last_name'],
            'country_code'=>$row['country_code']  
            );
        }
       $doctors_json = json_encode($doctors); 
       $file_name = '/agmd/web_2017/json/doctors.json';
       if(file_put_contents($file_name, $doctors_json)){
           
       }         
    }    
 
    
   public function doctor_titles_json(){
         $db = Database::getDB();
        $query = 'SELECT * FROM doctor_titles';    
        $statement = $db->prepare($query);

        $statement->execute();    

        
        $titles = Array();
  
        foreach ($statement as $row) {
            $titles[] = array(
                'id'=>$row['id'],
                'doctor_id'=>$row['doctor_id'],
                'title'=>$row['title']
                
            );
        }      
       $statement->closeCursor();  
       $doctor_titles_json = json_encode($titles); 
       $file_name = '/agmd/web_2017/json/doctor_titles.json';
       if(file_put_contents($file_name, $doctor_titles_json)){
       }
   }   
   
   
   public function doctor_address_json(){
         $db = Database::getDB();
        $query = 'SELECT * FROM address_us';    
        $statement = $db->prepare($query);

        $statement->execute();    

        
        $addresses = Array();
  
        foreach ($statement as $row) {
            $addresses[] = array(
                'address_id'=>$row['address_id'],
                'address_type'=>$row['address_type'],
                'address_name'=>$row['address_name'],
                'status'=>$row['status'],                
                'address'=>$row['address'],   
                'address2'=>$row['address2'],
                'address3'=>$row['address3'],
                'address4'=>$row['address4'],
                'city'=>$row['city'],
                'state'=>$row['state'],
                'zip5'=>$row['zip5'],
                'zip4'=>$row['zip4'],
                'doctor_id'=>$row['doctor_id']
                
            );
        }      
       $statement->closeCursor();  
       $doctor_addresses_json = json_encode($addresses); 
       $file_name = '/agmd/web_2017/json/doctor_addresses.json';
       if(file_put_contents($file_name, $doctor_addresses_json)){
       }
   }    
  public function doctor_emails_json(){
        $db = Database::getDB();
        $query = 'SELECT * FROM doctor_email';    
        $statement = $db->prepare($query);

        $statement->execute();    

        
        $emails = Array();
  
        foreach ($statement as $row) {
            $emails[] = array(
                'id'=>$row['id'],
                'email'=>$row['email'],
                'primary_email'=>$row['primary_email'],
                'doctor_id'=>$row['doctor_id']
            );
        }     

       $statement->closeCursor();  
       $doctor_emails_json = json_encode($emails); 
       $file_name = '/agmd/web_2017/json/doctor_emails.json';
       if(file_put_contents($file_name, $doctor_emails_json)){
       }
   }       
   
 public function doctor_telephones_json(){
        $db = Database::getDB();
        $query = 'SELECT * FROM doctor_telephone';    
        $statement = $db->prepare($query);

        $statement->execute();    

        
        $telephones = Array();
  
        foreach ($statement as $row) {
            $telephones[] = array(
                'id'=>$row['id'],
                'phone'=>$row['phone'],
                'type'=>$row['type'],
                'doctor_id'=>$row['doctor_id'],
                'address_id'=>$row['address_id']
            );
        }     

       $statement->closeCursor();  
       $doctor_telephones_json = json_encode($telephones); 
       $file_name = '/agmd/web_2017/json/doctor_telephones.json';
       if(file_put_contents($file_name, $doctor_telephones_json)){
       }
   }          
   
 public function doctor_interests_json(){
        $db = Database::getDB();
        $query = 'SELECT * FROM doctor_interest';    
        $statement = $db->prepare($query);

        $statement->execute();    

        
        $interests = Array();
  
        foreach ($statement as $row) {
            $interests[] = array(
                'id'=>$row['id'],
                'interest'=>$row['interest'],
                'doctor_id'=>$row['doctor_id']
            );
        }     

       $statement->closeCursor();  
       $doctor_interests_json = json_encode($interests); 
       $file_name = '/agmd/web_2017/json/doctor_interests.json';
       if(file_put_contents($file_name, $doctor_interests_json)){
       }
   }             
}

$json_utility = new DoctorJsonUtility();
//$json_utility->address_types_json();
//$json_utility->telephone_types_json();
//$json_utility->care_types_json();
//$json_utility->doctors_json();
//
//$json_utility->doctor_titles_json();
//$json_utility->doctor_address_json();
//$json_utility->doctor_emails_json();
//$json_utility->doctor_telephones_json();

$json_utility->doctor_interests_json();


?>


