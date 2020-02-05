
<?php

///new beginning of modification
//fetch.php
$output = '';
if(isset($_POST["action"]))
  {
    echo $output;
        $connect = mysqli_connect("localhost", "root", "", "photos");
        $output = '';
       
     if($_POST["action"] == "city")
     { 
      
        $sql = "SELECT * FROM images WHERE city = '".$_POST["query"]."'";
      
      $result = mysqli_query($connect, $sql);

      while($row = mysqli_fetch_array($result))
      {
        

      
    $output .= '<option value = '.$row["town"].'>'.$row["town"].'</option>';

      
  }
    
      
  } 
   if($_POST["action"] == "town")
     { 
      
        $sql = "SELECT * FROM images WHERE town = '".$_POST["query"]."' ";
      
      $result = mysqli_query($connect, $sql);

      while($row = mysqli_fetch_array($result))
      {
        

    $output .= '<option value = '.$row["houseType"].'>'.$row["houseType"].'</option>';
      
  }
    
      
  } 
  if($_POST["action"] == "houseType")
     { 
      
        $sql = "SELECT * FROM images WHERE houseType = '".$_POST["query"]."'";
       
      $result = mysqli_query($connect, $sql);

      while($row = mysqli_fetch_array($result))
      {

    $output .= '<option value = '.$row["houseType"].'>'.$row["houseType"].'</option>';

  }
    
      
  } 

       

}

  echo $output;


?>

