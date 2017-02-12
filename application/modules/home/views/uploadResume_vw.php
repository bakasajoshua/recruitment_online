<style type="text/css">
   #control-label:after { 
       font-family: 'FontAwesome';
      font-weight: normal;
      font-size: 7px;
      content: "\f069";
      color: red;
   }
</style>
<div id="wrapper">
  <header id="header">
    <!-- loads the avatar section -->
    <?php
    if($this->session->userdata('logged_in') == 1){
    ?>
    <?php $this->load->view('template/avatar_v'); ?>
    <?php 
    }
    ?>
    <!-- loads the avatar section -->
    <?php echo $this->load->view('template/menu_v'); ?>
  </header><!-- /#header -->
  <div id="content">
    <div class="container">
      <div class="row">
         <form class="form-horizontal form">
            <div class="col-md-12">
               <div  id="personalDetailsFormAlert">
                     
               </div>
               <!-- Begining of tabs -->
               <div>
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                     <li role="presentation" class="active"><a href="#person_details" aria-controls="person_details" role="tab" data-toggle="tab">Personal Details</a></li>
                     <li role="presentation"><a href="#qualification" aria-controls="qualification" role="tab" data-toggle="tab">Qualifications</a></li>
                     <li role="presentation"><a href="#employment" aria-controls="employment" role="tab" data-toggle="tab">Employment History</a></li>
                     <li role="presentation"><a href="#referee" aria-controls="referee" role="tab" data-toggle="tab">Referees</a></li>
                     <li role="presentation"><a href="#documents" aria-controls="documents" role="tab" data-toggle="tab">Documents</a></li>
                  </ul>
                  <!-- Nav tabs -->
                  <!-- Tab panes -->
                  <div class="tab-content">
                     <div role="tabpanel" class="tab-pane active" id="person_details">
                        <br><br>
                        <form id="personalDetailsForm">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="name" class="col-sm-2 control-label" id="control-label">First Name</label>
                                 <div class="col-sm-10">
                                    <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name">
                                 </div>
                              </div>
                           </div>
                           
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="email" class="col-sm-2 control-label" id="control-label">Middle Name</label>
                                 <div class="col-sm-10">
                                    <input type="text" name="mname" id="mname" class="form-control" id="email" placeholder="Middle Name">
                                 </div>
                              </div>           
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="email" class="col-sm-2 control-label" id="control-label">Last Name</label>
                                 <div class="col-sm-10">
                                    <input type="text" name="lname" id="lname" class="form-control" id="email" placeholder="Last Name">
                                 </div>
                              </div>           
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="email" class="col-sm-2 control-label" id="control-label">Mobile No.</label>
                                 <div class="col-sm-10">
                                    <input type="text" name="mobileNo" id="mobileNo" class="form-control" id="email" placeholder="Mobile No.">
                                 </div>
                              </div>           
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="email" class="col-sm-2 control-label" id="control-label">Postal Address</label>
                                 <div class="col-sm-10">
                                    <input type="text" name="address" id="address" class="form-control" id="email" placeholder="Address">
                                 </div>
                              </div>           
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="email" class="col-sm-2 control-label">Current Location</label>
                                 <div class="col-sm-10">
                                    <input type="text" name="currentLocation" id="currentLocation" class="form-control" id="email" placeholder="Address">
                                 </div>
                              </div>           
                           </div>
                           
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="country" class="col-sm-2 control-label" id="control-label">Country</label>
                                 <div class="col-sm-10">
                                    <select class="form-control" name="country" id="country">
                                       <?php $this->load->view('home/listOfCountries'); ?>
                                    </select>
                                 </div>
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="email" class="col-sm-2 control-label" id="control-label">PIN No.</label>
                                 <div class="col-sm-10">
                                    <input type="text" name="pinNo" id="pinNo" class="form-control" placeholder="KRA PIN">
                                 </div>
                              </div>           
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="email" class="col-sm-2 control-label">National ID No.</label>
                                 <div class="col-sm-10">
                                    <input type="text" name="nationalIDNO" id="nationalIDNO" class="form-control" placeholder="National ID No.">
                                 </div>
                              </div>           
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="email" class="col-sm-2 control-label">Passport No.</label>
                                 <div class="col-sm-10">
                                    <input type="text" name="passportNo" id="passportNo" class="form-control" id="passportNo" placeholder="(Optional)">
                                 </div>
                              </div>           
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="country" class="col-sm-2 control-label" id="control-label">Disabled?</label>
                                 <div class="col-sm-10">
                                    <select class="form-control" name="disabledStatus" id="disabledStatus">
                                       <option value="">Select</option>
                                          <option value="Yes">Yes</option>
                                          <option value="No">No</option>
                                    </select>
                                 </div>
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="country" class="col-sm-2 control-label" id="control-label">Marital Status?</label>
                                 <div class="col-sm-10">
                                    <select class="form-control" name="maritalStatus" id="maritalStatus">
                                       <option value="">Select</option>
                                          <option value="single">Single</option>
                                          <option value="married">Married</option>
                                          <option value="divorced">Divorced</option>
                                          <option value="separated">Separated</option>
                                          <option value="widow">Widow(er)</option>
                                          <option value="otjer">Other</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-2 col-md-offset-10">
                               <button class="btnSave btn btn-primary" value="1">Save Details</button>
                               <button class="btnNext btn btn-primary" value="1">Next</button>
                           </div>
                        </form>
                        <!-- <a href="<?php echo base_url("info/vacancies"); ?>" class="pull-right" id="editPersonalDetailsBtn">
                           <button type="button" class="btn btn-primary">Edit Personal Details</button>
                        </a> -->
                     </div>
                     <div role="tabpanel" class="tab-pane" id="qualification">
                     <br><br>
                     <div class="row">
                         <i class="fa fa-plus" aria-hidden="true" id="addQualifications" title="Add Qualification" style="cursor: pointer;">Add Qualification</i>
                     </div>
                        
                        <form id="qualificationsForm">
                           <div class="field_wrapperQualifications">
                              <div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <p>Institution</p>
                                       <div class="col-sm-10">
                                          <input type="text" name="school" value="" class="form-control" id="school" placeholder="Institution">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-2">
                                    <div class="form-group">
                                       <!-- <label for="school" class="col-sm-2 control-label">Certification</label> -->
                                       <p>Certification</p>
                                       <div class="col-sm-10">
                                          <select class="form-control" name="certification[]" id="certification">
                                             <option value="">Select</option>
                                                <option value="Professional Certificate">Professional Certificate</option>
                                                <option value="Diploma">Diploma</option>
                                                <option value="Degree">Degree</option>
                                                <option value="Masters">Masters</option>
                                                <option value="Doctorate">Doctorate</option>
                                                <option value="PHD">PHD</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>           
                                 <div class="col-md-5">
                                    <div class="form-group">
                                       <!-- <label for="school" class="col-sm-2 control-label">Description</label> -->
                                       <p>Description</p>
                                       <div class="col-sm-10">
                                          <input type="text" name="description" value="" class="form-control" id="description" placeholder="Description">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-2">
                                    <div class="form-group">
                                       <p>Years Completed</p>
                                       <div class="col-sm-10">
                                          <input type="number" name="years" min="1" value="" class="form-control" id="years" placeholder="Years"  style="width: 50%; display: inline-block;">
                                          
                                       </div>
                                    </div>
                                 </div>
                                
                              </div>
                           </div>
                            <div class="col-md-6 col-md-offset-8">
                               <button class="btnBack btn btn-primary" value="1">Previous</button>
                               <button class="btnSave btn btn-primary" value="2">Save Details</button>
                               <button class="btnNext btn btn-primary" value="1">Next</button>
                            </div>
                        </form>

                        <div class="table-responsive" id="qualificationListContainer">
                           <table class="table">
                              <thead>
                                 <td>Institution</td>          
                                 <td>Certification</td>
                                 <td>Description</td>
                                 <td>Years Completed</td>
                              </thead>

                              <tbody id="qualificationList">
                                 
                              </tbody>                               
                           </table>
                          
                           <a href="<?php echo base_url("info/vacancies"); ?>" class="pull-right" id="editQualificationDetailsBtn">
                              <button type="button" class="btn btn-primary">Edit Qualification Details</button>
                           </a>
                        </div>
                     </div>
                     <div role="tabpanel" class="tab-pane" id="employment">
                     <br><br>
                     <div class="row">
                         <i class="fa fa-plus" aria-hidden="true" id="addEmploymentHistory" title="Add Employment History" style="cursor:pointer;">Add Employment History</i>
                     </div>
                        <form id="employmentForm">
                           <div class="employmentHistoryfield_wrapper">
                              <div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <p>Institution</p>
                                       <div class="col-sm-10">
                                          <input type="text" name="employmentInstitution[]" value="" class="form-control" id="employmentInstitution" placeholder="Institution">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <p>Position</p>
                                       <div class="col-sm-10">
                                          <input type="text" name="employmentPosition[]" value="" class="form-control" id="employmentPosition" placeholder="Position">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <p>Responsibilities</p>
                                       <div class="col-sm-10">
                                          <input type="text" name="employmentResponsibilities[]" value="" class="form-control" id="employmentResponsibilities" placeholder="Responsibilities">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <p>Years</p>
                                       <div class="col-sm-10">
                                          <input type="number" min="1" name="employmentYears[]" value="" class="form-control" id="employmentYears" placeholder="Years" style="width: 50%; display: inline-block;">
                                          
                                       </div>
                                    </div>
                                 </div>
                                
                              </div>        
                           </div>
                           <div class="col-md-6 col-md-offset-6">
                               <button class="btnBack btn btn-primary" value="1">Previous</button>
                               <button class="btnSave btn btn-primary" value="3">Save Details</button>
                               <button class="btnNext btn btn-primary" value="1">Next</button>
                            </div>
                        </form>
                        <div class="table-responsive" id="employmentListContainer">
                           <table class="table">
                              <thead>
                                 <td>Institution</td>          
                                 <td>Certification</td>
                                 <td>Description</td>
                                 <td>Years Completed</td>
                              </thead>
                              <tbody id="employmentList">
                              </tbody>
                           </table>
                           
                           <a href="<?php echo base_url("info/vacancies"); ?>" class="pull-right" id="editEmploymentnDetailsBtn">
                              <button type="button" class="btn btn-primary">Edit Employment History Details</button>
                           </a>                             
                        </div>

                     </div>
                     <div role="tabpanel" class="tab-pane" id="referee">
                     <br><br>
                     <div class="row">
                         <i class="fa fa-plus" aria-hidden="true" id="addReferee" title="Add Referee" style="cursor: pointer;color: blue;">Add Referee</i>
                     </div>
                        <form id="refereesForm">
                           <div class="field_wrapperReferees" >
                              <div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <p>First Name</p>
                                          <input type="text" name="refereesFName" value="" class="form-control input-sm" id="refereesFName" placeholder="First Name">
                                       <p>Last Name</p>
                                          <input type="text" name="refereesLName" value="" class="form-control input-sm" id="refereesLName" placeholder="Last Name">
                                       <p>Referee Designation</p>
                                          <input type="text" name="refereesDesignation" value="" class="form-control input-sm" id="refereesDesignation" placeholder="Referee Designation">
                                       <p>Organization</p>
                                          <input type="text" name="refereesOrganization" value="" class="form-control input-sm" id="refereesOrganization" placeholder="Organization">
                                       <p>Phone</p>
                                          <input type="text" name="refereesPhone" value="" class="form-control input-sm" id="refereesPhone" placeholder="Phone">
                                       <p>Email</p>
                                          <input type="text" name="refereesEmail" value="" class="form-control input-sm" id="refereesEmail" placeholder="Email">
                                       <p>Website</p>
                                          <input type="text" name="refereesWebsite" value="" class="form-control input-sm" id="refereesWebsite" placeholder="Website">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6 col-md-offset-6">
                               <button class="btnBack btn btn-primary" value="1">Previous</button>
                               <button class="btnSave btn btn-primary" value="4">Save Details</button>
                               <button class="btnNext btn btn-primary" value="1">Next</button>
                            </div>
                        </form>

                        <div class="table-responsive" id="refereeListContainer">
                           <table class="table">
                              <thead>
                                 <td>Name</td>           
                                 <td>Organization</td>
                                 <td>Designation</td>
                                 <td>Phone</td>
                                 <td>Email</td>
                              </thead>
                              <tbody id="refereeList">
                              </tbody>
                           </table>
                           
                           <a href="<?php echo base_url("info/vacancies"); ?>" class="pull-right" id="editReferreeListBtn">
                              <button type="button" class="btn btn-primary">Edit Referee Details</button>
                           </a>                             
                        </div>
                     </div>
                     <div role="tabpanel" class="tab-pane" id="documents">
                     <br><br>
                     <p style="color: red;"><strong>N/B</strong>&nbsp;Only pdf file format accepted for these documents.</p>
                        <form id="documentsForm">
                           <div class="field_wrapper">
                              <div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <p>Comprehensive Curriculum Vitae</p>
                                       <div class="col-sm-10">
                                          <progress id="prog2" value="0" max="100"></progress>
                                          <input type="file" name="documentsCV" value="" class="form-control" id="documentsCV">
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <p>Application Letter</p>
                                       <div class="col-sm-10">
                                          <progress id="prog" value="0" max="100"></progress>
                                          <input type="file" name="documentsApplicationLetter" value="" class="form-control" id="documentsApplicationLetter">
                                       </div>
                                    </div>
                                 </div>
                              </div>                        
                           </div>
                           <div class="col-md-6 col-md-offset-6">
                                   <button class="btnBack btn btn-primary" value="1">Previous</button>
                                   <button class="btnSave btn btn-primary" value="5" id="submitCV">Save Details</button>
                                </div>
                        </form>

                        <div class="table-responsive" id="userDocsListContainer" style="margin-right: auto; margin-left: auto;">
                           <table class="table">
                              <thead>
                                 <td>C.V</td>         
                                 <td>Application Letter</td>
                              </thead>
                              <tbody id="userDocsList">
                              </tbody>
                           </table>
                           <a href="<?php echo base_url("info/vacancies"); ?>" id="editUserDocsListBtn">
                              <button type="button" class="btn btn-primary">Edit Application Letter</button>
                           </a>                             
                        </div>
                     </div>
                      
                  </div>
                  <!-- Tab panes -->
               </div>
               <!-- End of tabs -->
            </div>
            
         </form>
      </div>
    </div>
  </div>
  <footer id="footer">
    <div id="footer-text" class="container">
      Developed By Sepia      
    </div><!-- /#footer-text -->
  </footer><!-- /#footer -->
</div>
<script type="text/javascript" src="<?php echo base_url('assets/xhr2/xhr2FileUpload.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/customScripts/personalDetails.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/customScripts/employmentHistory.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/customScripts/referee.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/customScripts/qualifications.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/customScripts/uploadDocuments.js'); ?>"></script>

<script type="text/javascript">
    $(document).ready(function(){
        //Save CV URLS
        $savePersonalDetailsURL = "<?php echo base_url('home/uploadResume/savePersonalDetails'); ?>";
        $saveQualificationDetailsURL = "<?php echo base_url('home/uploadResume/saveQualificationDetails'); ?>";
        $saveEmploymentHistoryDetailsURL = "<?php echo base_url('home/uploadResume/saveEmploymentHistoryDetails'); ?>";
        $saveRefereeDetailsURL = "<?php echo base_url('home/uploadResume/saveRefereeDetails'); ?>";
        $saveApplicationLetterURL  = "<?php echo base_url('home/uploadResume/saveDocuments'); ?>";
        $saveCVURL = "<?php echo base_url('home/uploadResume/saveCV'); ?>";
        $savePathsToDocumentsURL = "<?php echo base_url('home/uploadResume/saveFilePaths'); ?>";
        //Save CV URLS

        //Get CV Details URLs
        $getPersonalDetailsURL = "<?php echo base_url('home/uploadResume/getPersonalDetailsFromDB'); ?>";
        $getEmploymentHistoryDetailsFromDBURL = "<?php echo base_url('home/uploadResume/getEmploymentHistoryDetailsFromDB'); ?>";
        $getQualificationDetailsURL = "<?php echo base_url('home/uploadResume/getQualificationDetailsFromDB'); ?>";
        $getRefereeDetailsFromDBURL = "<?php echo base_url('home/uploadResume/getRefereeDetailsFromDB'); ?>";
        $getUserDocsFromDBURL = "<?php echo base_url('home/uploadResume/getUserDocuments'); ?>";
        //Get CV Details URLs

        $refreshUploadResumePage = "<?php echo base_url('home/uploadResume'); ?>";

        getPersonalDetailsFromDB(9999,"onPageLoad");//pre-populate the personal details if the user has already provided these details
        getQualificationsFromDB(9999,"onPageLoad");//pre-populate the qualities if the user has alread provided these details
        getEmploymentHistoryDetailsFromDb(9999,"onPageLoad");//pre-populate the qualities if the user has alread provided these details
        getRefereeDetails(9999,"onPageLoad");//pre-populate the Referee details if user has alread provided these details
        getUserDocuements(9999, "onPageLoad");//pre-populates the application letter and CV if provided

        $(".btnSave").click(function(e){
            e.preventDefault();
            current = $(this).val();
            if (current == 1){
                // //validate personal details
                    $response = validatePersonalDetails();
                    if($response == "Valid Form"){//the form is valid proceed and save information
                        //savePersonalDetails
                        $.post($getPersonalDetailsURL,{}, function(data, status){
                            $(".overlay").show();
                            $data = JSON.parse(data);
                            $status = $data['status'];

                            if($status == 1){
                                $message = $data['message'];
                                savePersonalDetails(current);
                                $(".overlay").hide();
                            }else if($status == 0){
                                $message = $data['message'];
                                $dataReturned = $data['data'];
                                $("#editPersonalDetailsBtn").show();
                                //redirect to next form
                                $(".overlay").hide();
                            }else{}         
                        });
                         $('.nav-tabs a[href="#qualification"]').tab('show');    
                    }else{//the form is invalid
                        $message = "<center>";
                            $message += "<strong>Error.</strong> <br/>"+$response;
                        $message += "</center>";
                        showAlert('alert alert-danger','alert alert-success',$message);
                    }
               
            }else if (current == 2){
                //validate Qualifications
                    if($("#qualificationsForm").is(":visible")){
                        $response = validateQualifications();
                    }else{
                        $response = "Valid Form";
                    }

                    //console.log("Response from validate Qualifications "+$response );
                    if($response == "Valid Form"){
                        $.post($getQualificationDetailsURL,{}, function(data, status){//check if user has provided these qualifications
                            $data = JSON.parse(data);
                            $status = $data['status'];

                            if($status == 1){//no qualification details have been provided, thus save the qualification details
                            //  $message = $data['message'];
                            //  //save Qualification Details
                                $qualificationsFormValues = $('#qualificationsForm').serializeArray();
                                $savePersonalDetailsResponse = '';
                                $.post($saveQualificationDetailsURL,
                                    {
                                        'qualificationsFormValues':$qualificationsFormValues
                                    },function(data, status){
                                        if(data == "Inserted"){
                                            $message = "<center>";
                                                $message += "<strong>Success.</strong> <br/> Successfully saved your qualification details.";
                                            $message += "</center>";
                                            showAlert('alert alert-success','alert alert-danger',$message);

                                            // if(current < widget.length){ 
                                            //     widget.show();
                                            //     widget.not(':eq('+(current++)+')').hide();
                                            //     setProgress(current);
                                            // }
                                            // hideButtons(current);
                                        }else{
                                            $message = "<center>";
                                                $message += "<strong>Error.</strong> <br/> Error occurred while saving";
                                            $message += "</center>";
                                            showAlert('alert alert-danger','alert alert-success',$message);
                                        }
                                    }
                                );
                            //  //save Qualification Details
                            }else if($status == 0){//qualification details have been provided
                            //  //redirect to next form
                                
                                // hideButtons(current);
                            }else{}         
                        });
                        $('.nav-tabs a[href="#employment"]').tab('show');
                    }else{
                        $message = "<center>";
                            $message += "<strong>Error.</strong> <br/> Please fill in all the fields.";
                        $message += "</center>";
                        showAlert('alert alert-danger','alert alert-success',$message);
                    }
                
            }else if (current == 3){
                //validate employment history
                    if($("#employmentForm").is(":visible")){
                        $response = validateEmploymentHistory();
                    }else{
                        $response = "Valid Form";//the user has previously given data on the employement history
                    }
                    
                    if($response == "Valid Form"){
                        //proceed to save the details
                        // saveEmploymentHistoryDetails(current);
                        $.post($getEmploymentHistoryDetailsFromDBURL,{}, function(data, status){
                            console.log(data);
                            $data = JSON.parse(data);
                            $status = $data['status'];

                            if($status == 1){//no employment history details havev been saved so far
                                $message = $data['message'];
                                
                                $employmentHistoryFormValues = $('#employmentForm').serializeArray();
                                $.post($saveEmploymentHistoryDetailsURL,
                                    {
                                        'employmentHistoryFormValues':$employmentHistoryFormValues
                                    },function(data, status){
                                        console.log(data+" save employment history");
                                        if(data == "Inserted"){
                                            
                                            $message = "<center>";
                                                $message += "<strong>Success.</strong> <br/> Successfully saved your employment details.";
                                            $message += "</center>";
                                            showAlert('alert alert-success','alert alert-danger',$message);
                                        // if(current < widget.length){
                                        //     widget.show();
                                        //     widget.not(':eq('+(current++)+')').hide();
                                        //     setProgress(current);
                                        // }
                                        // hideButtons(current);
                                        }else{
                                            $message = "<center>";
                                                $message += "<strong>Error.</strong> <br/> Error occurred while saving.";
                                            $message += "</center>";
                                            showAlert('alert alert-danger','alert alert-success',$message);
                                        }
                                    }
                                );
                            }else if($status ==0){//some employment history has been saved therefore list it
                                $message = $data['message'];
                                $dataReturned = $data['data'];
                                //redirect to next form
                                // if(current < widget.length){ 
                                //     widget.show();
                                //     widget.not(':eq('+(current++)+')').hide();
                                //     setProgress(current);
                                // }
                                // hideButtons(current);
                            }else{}
                        });
                        $('.nav-tabs a[href="#referee"]').tab('show');
                    }else{
                        $message = "<center>";
                            $message += "<strong>Error.</strong> <br/> Please fill in all the fields.";
                        $message += "</center>";
                        showAlert('alert alert-danger','alert alert-success',$message);
                    }
                
            }else if (current == 4){
                if($("#refereesForm").is(":visible")){
                        $response = validateReferences();
                    }else{
                        $response = "Valid Form";//the user has previously given data on the referee history
                    }

                    if($response == "Valid Form"){
                        //proceed to save the details
                        $.post($getRefereeDetailsFromDBURL,{}, function(data, status){
                            console.log("response from $getRefereeDetailsFromDBURL"+data);
                            $data = JSON.parse(data);
                            $status = $data['status'];

                            if($status == 2){//no referee details have been saved so far                        
                                $refereeFormValues = $('#refereesForm').serializeArray();
                                $.post($saveRefereeDetailsURL,
                                    {
                                        'refereeFormValues':$refereeFormValues
                                    },function(data, status){
                                        console.log(data+" save referee history");
                                        if(data == "Inserted"){
                                            
                                            $message = "<center>";
                                                $message += "<strong>Success.</strong> <br/> Successfully saved your referee details.";
                                            $message += "</center>";
                                            showAlert('alert alert-success','alert alert-danger',$message);
                                        // if(current < widget.length){
                                        //     widget.show();
                                        //     widget.not(':eq('+(current++)+')').hide();
                                        //     setProgress(current);
                                        // }
                                        // hideButtons(current);
                                        }else{
                                            $message = "<center>";
                                                $message += "<strong>Error.</strong> <br/> Error occurred while saving you referee details.";
                                            $message += "</center>";
                                            showAlert('alert alert-danger','alert alert-success',$message);
                                        }
                                    }
                                );
                            }else if($status ==0){//some referee details have been save and have been listed
                                //redirect to next form
                                // if(current < widget.length){
                                //     widget.show();
                                //     widget.not(':eq('+(current++)+')').hide();
                                //     setProgress(current);
                                // }
                                // hideButtons(current);
                            }else{}
                            $('.nav-tabs a[href="#documents"]').tab('show');
                        });
                    }else{
                        $message = "<center>";
                            $message += "<strong>Error.</strong> <br/> Please fill in all the fields.";
                        $message += "</center>";
                        showAlert('alert alert-danger','alert alert-success',$message);
                    }
                
            }else if (current == 5){
                //Documents
                $respose = validateDocuments();
            }
            
        });
    });
    
</script>