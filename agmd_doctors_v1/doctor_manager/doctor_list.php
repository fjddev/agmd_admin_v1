<?php include '../view/header.php'; ?>
<main>

    <aside>
        <!-- display a list of doctors -->
 

        <nav style="width: 175px; padding-bottom: 50px;">
        <input  class="form-control" id="demo" type="text" placeholder="Search Doctors...">  
        <ul class="list-group" id = "newList"  style="width: 190px; height: 500px; overflow: auto; padding-top: 10px; " >
        <?php foreach ($doctors as $doctor) : ?>
            <li class="list-group-item">
            <a href="?doctor_id=<?php echo $doctor->getId(); ?>">
                <?php echo $doctor->getFullName(); ?>
            </a>
            </li>
        <?php endforeach; ?>
        </ul>
     <script>
         $(document).ready(function(){
            $("#demo").on("keyup", function() {
               var value = $(this).val().toLowerCase();
               $("#newList li").filter(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
               });
            });
         });
      </script>        
        </nav>
    </aside>
    
    <!-- Start HERE -->
    

    <section  style ="padding-left: 50px;" >


        <a class="btn btn-primary btn-sm"   href="doctor_add.php">Add Doctor</a>     
        <a class="btn btn-secondary btn-sm"  href="?action=view_doctor_report">Reports</a>  
        
        <?php //include "doctor_table1.php"; ?>
        <?php include "doctor_nav_tabs1.php"; ?>
        
        <!--<p><a  href="?action=add_doctor_selection">Add Doctor</a></p>-->
    </section>

</main>
<?php include '../view/footer.php'; ?>