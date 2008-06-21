
/**
$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($json, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);
    echo "<html>";

   // echo " INSERT INTO PARTIPANT ";
    $sql= "REPLACE INTO PARTICIPANT  set ";

    $arr = json_decode($json);


foreach ($jsonIterator as $key => $val) {

    if(is_array($val)) {
        //echo "<br> $key:\n";

    } else {
        //echo "$key => $val\n";
         $sql=  $sql."  $key = '$val' ";
    }
    $sql=  $sql. ",";
}
 echo "</html>";

 $connection = mysqli_connect(
   'localhost', 'root', '123456', 'participant'
 );
 */
