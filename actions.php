<?php 

session_start();

//Register User
if (isset($_POST['regu'])) {
 $fname = $_POST['fname'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $type = $_POST['type'];
 $password = $_POST['password'];
 $passwordconfirm = $_POST['cpassword'];
 $mod = $_POST['mod'];

 require_once 'connection.php';

 if ($password == $passwordconfirm) {
  if ($mod == 0) {
  $sql = "INSERT INTO `users`(`Fullname`, `Phone_Number`, `Email_Address`,`User_Type`, `Password`) VALUES ('$fname','$phone','$email','User',md5('$password'))";
     mysqli_query($conn, $sql);
  header("Location: index.html?userregistration=success");
  }else if($mod == 1){
  $sql = "INSERT INTO `users`(`Fullname`, `Phone_Number`, `Email_Address`, `User_Type`, `Password`) VALUES ('$fname','$phone','$email','$type',md5('$password'))";
     mysqli_query($conn, $sql);
  header("Location: index.php?userregistration=success");
  }
 }else{
  echo "Passwords do not match.";
 }
}        

//Update Functions
if (isset($_POST['upu'])) {
 $fname = $_POST['fname'];
 $email = $_POST['email'];
 $uid = $_POST['uid'];
 $mod = $_POST['mod'];
 $phone = $_POST['phone'];
 $password = $_POST['password'];
 $passwordconfirm = $_POST['cpassword'];

 require_once 'connection.php';

 if ($password == $passwordconfirm) {
  if ($mod == 1) {
  $sql = "UPDATE `users` SET `Fullname`='$fname',`Email_Address`='$email',`Phone_Number`='$phone',`Password`=md5('$password') WHERE `User_ID`='$uid'";
     mysqli_query($conn, $sql);
  header("Location: index.php?updateadministrator=success");
  }else if ($mod == 2) {
  $sql = "UPDATE `users` SET `Fullname`='$fname',`Email_Address`='$email',`Phone_Number`='$phone',`Password`=md5('$password') WHERE `User_ID`='$uid'";
     mysqli_query($conn, $sql);
  header("Location: index1.php?updateuser=success");
  }
 }else{
  echo "Passwords do not match.";
 }
}

        if($_REQUEST['action'] == 'updateSD' && !empty($_REQUEST['id'])){ 
        require_once 'connection.php';
        $updateItem = $_REQUEST['id'];
        $sql = "UPDATE `symptoms` SET `Status` = 'Confirmed' WHERE `Symptom_ID` = '$updateItem'";
        mysqli_query($conn, $sql);        
        header("Location: index.php?updatesymptom&diagnosis=success");
        }

//Add Symptoms

     // 1. Is the user experiencing severe dehydration symptoms?
     // Severe dehydration symptoms include:
     // - Rapid heart rate 
     // - Sunken eyes 
     // - Dry mouth and skin 
     // - Rapid breathing 
     // - Low blood pressure 

     // If YES (S when Mod = 1): 
     // - **Emergency Alert: Cholera is suspected. Seek immediate medical attention.**

     // If NO:   

     // 2. Is the user experiencing moderate symptoms?
     // Moderate symptoms may include:
     // - Frequent watery diarrhea
     // - Vomiting
     // - Leg cramps
     // - Lethargy
     // - Decreased urine output

     // If YES (Mo when Mod = 2):
     // - Consider cholera as a possibility and seek medical evaluation.
      
     // If NO:

     // 3. Is the user experiencing mild symptoms?
     // Mild symptoms can include:
     // - Occasional diarrhea
     // - Some abdominal discomfort
     // - No signs of dehydration

     //  If YES (Mi when Mod = 3):
     // - Monitor the user's condition for any worsening of symptoms.
     // - Ensure good hygiene and fluid intake.

     //  If NO (Other Information - Location and Drinking History):

     // 4. Has the user traveled to or lived in an area with a recent cholera outbreak?
     // - Cholera outbreaks are more common in certain regions, especially after natural disasters.
            
     // 5. Does the user have a history of drinking untreated or contaminated water?
     // - Cholera is often transmitted through contaminated water or food.

     // If NO (when Mod = 4):
     // - It is less likely that the user has cholera.
     // - Continue monitoring for any changes in symptoms.


if (isset($_POST['adds'])) {
 $uid = $_SESSION['username'];
 $mod = $_POST['mod']; 

require_once 'connection.php';

if($_POST['loc'] == "None"){
 $loc = "User has not traveled to or lived in an area with a recent cholera outbreak";
}else{
 $loc = "User has traveled to or lived in an area with a recent cholera outbreak, which is; " . $_POST['loc'];    
}

if($_POST['history'] == "No"){
 $history = "User has no history of drinking untreated or contaminated water";
}else{
 $history = "User has a history of drinking untreated or contaminated water, which is; " . $_POST['history'];    
}

if($_POST['mod'] == 1)
{
     $Sarray = implode(", ", $_POST['S']);
    $symp = "User is experiencing the following symptoms; " . $Sarray . ". " . $loc . ". " . $history . "."; 

    $diag = "Cholera is highly suspected. Seek immediate medical attention.";

   $sql = "INSERT INTO `symptoms`(`User_ID`, `Details`) VALUES ('$uid','$symp')";
     mysqli_query($conn, $sql);

     $last_id = mysqli_insert_id($conn);

      $sql1 = "INSERT INTO `diagnostic`(`User_ID`, `Symptom_ID`, `Results`, `File`) VALUES ('$uid','$last_id','$diag','Cholera_Symptoms.pdf')";
     mysqli_query($conn, $sql1); 

header("Location: index1.php?addsymptoms=success");  

 }else if($_POST['mod'] == 2)
{
     $Moarray = implode(", ", $_POST['Mo']);
    $symp = "User is experiencing the following symptoms; " . $Moarray . ". " . $loc . ". " . $history . "."; 

    $diag = "Consider cholera as a possibility and seek medical evaluation.";

   $sql = "INSERT INTO `symptoms`(`User_ID`, `Details`) VALUES ('$uid','$symp')";
     mysqli_query($conn, $sql);

     $last_id = mysqli_insert_id($conn);

       $sql1 = "INSERT INTO `diagnostic`(`User_ID`, `Symptom_ID`, `Results`, `File`) VALUES ('$uid','$last_id','$diag','Cholera_Symptoms.pdf')";
     mysqli_query($conn, $sql1); 

  header("Location: index1.php?addsymptoms=success");

 }else if($_POST['mod'] == 3)
{
     $Miarray = implode(", ", $_POST['Mi']); 
    $symp = "User is experiencing the following symptoms; " . $Miarray . ". " . $loc . ". " . $history . "."; 

    $diag = "Monitor the user's condition for any worsening of symptoms. Also ensure good hygiene and fluid intake.";

   $sql = "INSERT INTO `symptoms`(`User_ID`, `Details`) VALUES ('$uid','$symp')";
     mysqli_query($conn, $sql);

     $last_id = mysqli_insert_id($conn);

        $sql1 = "INSERT INTO `diagnostic`(`User_ID`, `Symptom_ID`, `Results`, `File`) VALUES ('$uid','$last_id','$diag','Cholera_Symptoms.pdf')";
     mysqli_query($conn, $sql1);

  header("Location: index1.php?addsymptoms=success");

 }else if($_POST['mod'] == 4){

 echo "<script>alert('It is less likely that you have cholera. Continue monitoring for any changes in your symptoms, then kindly return to key in your symptoms and receive a diagnosis. Take Care :)');
                         window.location.href = 'index1.php?addsymptoms=fail';</script>";

 }


 }

//Delete Functions


        if($_REQUEST['action'] == 'deleteSD' && !empty($_REQUEST['id'])){ 
        require_once 'connection.php';
        $deleteItem = $_REQUEST['id'];
        $sql = "DELETE FROM `symptoms` WHERE `Symptom_ID` = '$deleteItem'";
        mysqli_query($conn, $sql); 
        $sql1 = "DELETE FROM `diagnostic` WHERE `Symptom_ID` = '$deleteItem'";
        mysqli_query($conn, $sql1);         
        header("Location: index1.php?deletesymptom&diagnosis=success");
        }

        if($_REQUEST['action'] == 'deleteU' && !empty($_REQUEST['id'])){ 
        require_once 'connection.php';
        $deleteItem = $_REQUEST['id'];
        $sql = "DELETE FROM `users` WHERE `User_ID` = '$deleteItem'";
        mysqli_query($conn, $sql); 
        header("Location: index.php?deleteuser=success");
        }

 ?>