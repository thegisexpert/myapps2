 <?php
include('database.php');
if(isset($_GET['editId'])){
   $id= $_GET['editId'];
    edit_data($connection, $id);
}
if(isset($_POST['updateId'])){
   $id= $_POST['updateId'];
   update_data($connection,$id);
}
// edit data query
function edit_data($connection, $id){
    $query="SELECT * from usertable WHERE id=$id";
    $exec=mysqli_query($connection, $query);
    $row=mysqli_fetch_assoc($exec);
    echo json_encode($row);


}
// update data query
function update_data($connection, $id){
      $fullName= legal_input($_POST['fullName']);
      $emailAddress= legal_input($_POST['emailAddress']);
      $city = legal_input($_POST['city']);
      $country = legal_input($_POST['country']);
      $query="UPDATE participant
              SET participant_name='$fullName',
                participant_email='$emailAddress'
              ";
      $exec= mysqli_query($connection,$query);

      if($exec){

         echo "data was updated";

      }else{
         $msg= "Error: " . $query . "<br>" . mysqli_error($connection);
         echo $msg;
      }
}

// convert illegal input to legal input
function legal_input($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}
?>