<?php include 'includes/session.php'; ?>
<?php include 'insert_referral.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition sidebar-mini">
 <div class="wrapper">

  <!-- sidebar activity -->
  <?php
$sb_dashboard = "";
$sb_manage_records ="menu-open";
$sb_ordinances = "";
$sb_referrals = "active";
$sb_resolutions = "";
$sb_main_navigation = "";
$sb_sp_members = "";
$sb_committees = "";
$sb_account_settings = "";
$sb_my_profile = "";
?>

 <?php include 'includes/navbar.php'; ?>
 <?php include 'includes/sidebar.php'; ?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">

<!-- Content Header (Page header) -->
<div class="content-header">

</div>
<!-- Content Header End -->

   <!-- Main content -->
<section class="content animationIN">

 <div class="row animationOUT">
   <div class="col-md-1"></div>
     <div class="col-md-10">
       <!-- <div class="card card-outline card-primary"> -->
       <div class="card">
          
            
            <!-- /.box-header -->
            <!-- form start -->
         <form role="form" enctype="multipart/form-data" method="post" action="<?php htmlspecialchars("PHP_SELF"); ?>">
           <div class="card-body">

             <div>
                 <?php echo $alert_msg; ?>
                 <?php echo $alert_msg1; ?>
                 <?php echo $alert_msg2; ?>
             </div>

             <div class="card card-success">
              <div class="card-header">

                <h3 class="card-title">REFERRAL DETAILS</h3>
              </div>
              <div class="card-body">
               <div class="col-md-12">
                 <input type="text" class="form-control" name="ref_no" placeholder="Referral Number" value="<?php echo $refno; ?>" required>
             </div></br>

               <div class="col-md-12">
                     <!-- Date -->
                  <div class="form-group">
                      <!-- <label>Date:</label> -->
                     <div class="input-group date mb-3" data-provide="datepicker" >
                       <div class="input-group-addon input-group-prepend">
                       <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                       </div>
                          <input type="text" class="form-control pull-right" id="datepicker" name="date_received" placeholder="Date Received" value="<?php echo $date_received; ?>">
                     </div>
                   </div>
               </div>

               <div class="col-md-12">
                 <textarea class="form-control" name="description" placeholder="Description" required><?php echo $description; ?></textarea>
               </div></br>
         
       
           
               <div class="col-md-12">
               <select class="form-control select2" id="select_office" style="width: 100%;" name="office" value="<?php echo
$office; ?>">
                                                    <option selected="selected">Please select...</option>
<?php while ($department = $get_departments_data->fetch(PDO::FETCH_ASSOC)) { ?>
                                                        <option value="<?php echo
    $department['objid']; ?>"><?php echo $department['department']; ?></option>
<?php } ?>
                                                </select>
               </div>
                   </div>
             </div>
                   

              <!-- iCheck -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">ATTACHMENT (PDF FILE)</h3>
              </div>
              
              <div align="center" class="card-body">
                <!-- Minimal style -->
                      
                          <input type ="file" name="myFile" id="fileToUpload">
                          <!-- <p align="center">Upload .pdf file only.</p> -->
                    
                
                
                   </div>
            
                    
            </div>
            <!-- /.card -->
       
                     

           
            <!-- iCheck -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">REVIEW</h3>
              </div>
              <div  align="center" class="card-body">
                <!-- Minimal style -->

                <!-- checkbox -->
                <div class="form-group">
                    <label>
                      <input <?php if ($review == 1) echo 'checked="checked"'; ?> type="checkbox" name="review" class="minimal" value="reviewed">
                    </label>
                    Reviewed
                  </label>
                
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  
                  <label>
                    <input  <?php if ($referral == 1) echo 'checked="checked"'; ?> type="radio" name="r1" class="minimal" value="Referral">
                    Referral
                  </label>
                  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                  <label>
                    <input  <?php if ($urgent == 1) echo 'checked="checked"'; ?>type="radio" name="r1" class="minimal" value="Urgent">
                    Urgent
                  </label>
                  
                </div>

         
            <!-- /.card -->
           </div> 

           <!-- iCheck -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">COMMITTEE</h3>
              </div>
              <div  align="center" class="card-body">
              

                    <!-- /.col -->
             
               <div class="col-md-12  ">
                 <div class="form-group">

                 <select class="form-control select2"  style="width: 100%" placeholder="Please select committee" multiple="" name="committee[]" >
                  <?php while ($committee = $committee_data->fetch(PDO::FETCH_ASSOC)) { ?>
                  <option value="<?php echo $committee['objid']; ?>"><?php echo $committee['committee']; ?></option><?php } ?>
                 </select>

           
              </div>
             </div>   


           
                           </div>
            <!-- /.card -->
           </div> 

             <!-- iCheck -->
             <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">ACTION TAKEN</h3>
              </div>
              <div  align="center" class="card-body">  
         
                                            <div class="col-md-12 ">
                                                <textarea type="text" class="form-control" name="remarks" placeholder="Remarks"><?php echo $remarks;?></textarea>
                                            </div></br> 

                                            <input type ="file" name="myFile" id="fileToUpload"  placeholder="Upload .pdf file only.">
                                       
                                                
                                        </div>
            <!-- /.card -->
           </div> 

                    <!-- /.box-body -->
                    <div align="center" class="card-footer">
                        <input type="submit"  <?php echo $btnNew; ?> name="add" class="btn btn-primary" value="New">
                        <input type="submit"  <?php echo $btnStatus; ?> name="insert_referral" class="btn btn-primary" value="Save">
                        <a href="ordinances">
                            <input type="button" name="cancel" class="btnOUT2 btn btn-default" value="Cancel">       
                        </a>
                    </div>
         </form>
       </div>
  
        <!-- /.box -->
   </div>
    <div class="col-md-1"></div>
    </div>
 </div>

</section>
    <!-- Main Content End -->

 </div> 
   <!-- Content-Wrapper End -->


 <?php include 'includes/footer.php'; ?>
 </div>
 <!-- Wrapper End -->

 <?php include 'includes/scripts.php'; ?>

</body>
</html>


