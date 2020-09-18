<?php

include('../config/db_config.php');
//include('import_pdf.php');

echo "<pre>";
print_r($_POST);
echo "</pre>";

$alert_msg = '';
$alert_msg1 = '';
$alert_msg2 = '';
if (isset($_POST['insert_referral'])) {

    $refno = $_POST['ref_no'];
    $date_received = date('Y-m-d', strtotime($_POST['date_received']));
    $description = $_POST['description'];
    $office = $_POST['office'];

    $checkVal = $_POST['review'];

    if ($checkVal == "reviewed") {
        $review = 1;
    } else {
        $review =  0;
    };

    $radioVal = $_POST['r1'];

    if ($radioVal == "Referral") {
        $referral = 1;
    } elseif ($radioVal == "Urgent") {
        $urgent  =  1;
    };



    $remarks = $_POST['remarks'];




    // catch error for empty array select2
    if (empty($_POST['committee'])) {
        $committee = "";
    } else {
        $committee  =  implode(",", $_POST['committee']);
    };

    // upload image
    $currentDir = getcwd();
    $uploadDirectory = "../upload/";

    $errors = [];

    $fileExtensions = ['pdf'];

    $fileName = $_FILES['myFile']['name'];
    $fileSize = $_FILES['myFile']['size'];
    $fileTmpName = $_FILES['myFile']['tmp_name'];
    $fileType = $_FILES['myFile']['type'];
    $target_file = $uploadDirectory . basename($_FILES['myFile']['name']);
    $fileExtension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // $fileExtension = strtolower(end(explode('.',$fileName)));
    $uploadPath = $uploadDirectory . basename($fileName);

    // check if ordinance number is available to avoid duplciation
    $check_ordinance_no_sql = "SELECT * FROM ordinances where OrdinanceNumber = :ordinanceno";

    $ordinance_no_data = $con->prepare($check_ordinance_no_sql);
    $ordinance_no_data->execute([
        ':ordinanceno' => $ordinance
    ]);

    if ($ordinance_no_data->rowCount() > 0) {
        $alert_msg2 = ' 
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fa fa-warning"></i>
            Ordinance Number already exist!
        </div>     
    ';
    } else {

        if (!in_array($fileExtension, $fileExtensions)) {
            $errors[] = "Warning!";
        }
        if (empty($errors)) {
            $dipUpload = move_uploaded_file($fileTmpName, $uploadPath);

            if ($dipUpload) {
                $alert_msg1 .= ' 
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fa fa-check"></i>
            File has been uploaded
            </div>  
   ';
                // $fname = $mname = $lname = $contact_number = $email = $uname = $upass = '';

            } else {
                $alert_msg1 .= ' 
            <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            An Error Occured
            </div>   
   ';
                // $fname = $mname = $lname = $contact_number = $email = $uname = $upass = '';

                $btnStatus = 'disabled';
                $btnNew = 'disabled';
            }
        } else {
            foreach ($errors as $error) {
                $alert_msg1 .= "
            <div class='alert alert-warning alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <i class='icon fa fa-warning'></i>
            $error No pdf Uploaded \n
            </div>  ";
            }
        }

        $insert_referral_sql = "INSERT INTO referrals SET 
        ref_no              = :ref_no,
        date_received       = :date_received,
        office              = :office,
        description         = :description,
        pdf                 = :pdf,
        review              = :review,
        referral            = :referral,
        urgent              = :urgent,
        committee           = :committee,
        remarks             = :remarks,
        Filenames           = :filenames";

        $ordinance_data = $con->prepare($insert_referral_sql);
        $ordinance_data->execute([
            ':ref_no'           => $refno,
            ':date_received'    => $date_received,
            ':office'           => $office,
            ':description'      => $description,
            ':pdf'              => $fileName,
            ':review'           => $review,
            // ':dateNow'              => now() ,
            ':referral'         => $referral,
            ':urgent'           => $urgent,
            ':committee'        => $committee,
            ':remarks'          => $remarks,
            ':filenames'        => $fileName
        ]);


        $alert_msg .= ' 
    <div class="card-body">
    <button type="button" class"btn btn-success toastrDefaultSuccess">
    </button>
    </div>
   
      ';

        $btnStatus = 'disabled';
        $btnNew = 'enabled';
    }
}
