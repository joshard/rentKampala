
<?php

///new beginning of modification
//fetch.php
$output = '';
if(isset($_POST["action"]))
  {
    echo $output;
        $connect = mysqli_connect("localhost", "root", "", "photos");
        $output = '';
        $imageURL = '';
     if($_POST["action"] == "city")
     { 
      
        $sql = "SELECT * FROM images WHERE city = '".$_POST["query"]."'";
      
      $result = mysqli_query($connect, $sql);

      while($row = mysqli_fetch_array($result))
      {
        
      $output .="<div class='col-lg-4' >";
      
      $imageURL = 'uploads/'.$row['file_name'];
      $output .="<img data-src='holder.js/200x200' class='img-thumbnail' style='width: 300px; height: 250px;' data-holder-rendered='true' src='$imageURL'>";

      $output .="<div class='panel panel-danger'>";
    $output .= '<option value = '.$row["town"].'>'.$row["town"].'</option>';
    $output .="<p>".$row['houseType']."</p>";
    $output .="<p>".$row['price']."</p>";
    $output .="<p>".$row['distance']."</p>";
            
   
    //$output .="<a class='btn btn-success' id='contact-icon' name='details' role='button'>View details »»</a>";
    $output .="</div>";

    $output .="</div>";
      
  }
    
      
  } 
   if($_POST["action"] == "town")
     { 
      
        $sql = "SELECT * FROM images WHERE town = '".$_POST["query"]."' ";
      
      $result = mysqli_query($connect, $sql);

      while($row = mysqli_fetch_array($result))
      {
        
      $output .="<div class='col-lg-4'>";
      
      $imageURL = 'uploads/'.$row['file_name'];
      $output .="<img data-src='holder.js/200x200' class='img-thumbnail' style='width: 300px; height: 250px;' data-holder-rendered='true' src='$imageURL'>";

      $output .="<div class='panel panel-danger'>";
    $output .="<p>".$row['town']."</p>";
    $output .= '<option value = '.$row["houseType"].'>'.$row["houseType"].'</option>';
    $output .="<p>".$row['price']."</p>";
    $output .="<p>".$row['distance']."</p>";
            
    
    //$output .="<a class='btn btn-success' id='contact-icon' name='details' role='button'>View details »»</a>";
    $output .="</div>";

    $output .="</div>";
      
  }
    
      
  } 
  if($_POST["action"] == "houseType")
     { 
      
        $sql = "SELECT * FROM images WHERE houseType = '".$_POST["query"]."'";
       
      $result = mysqli_query($connect, $sql);

      while($row = mysqli_fetch_array($result))
      {
        
      $output .="<div class='col-lg-4'>";
      
      $imageURL = 'uploads/'.$row['file_name'];
      $output .="<img data-src='holder.js/200x200' class='img-thumbnail' style='width: 300px; height: 250px;' data-holder-rendered='true' src='$imageURL'>";

      $output .="<div class='panel panel-danger'>";
    $output .="<p>".$row['town']."</p>";
    $output .= '<option value = '.$row["houseType"].'>'.$row["houseType"].'</option>';
    $output .="<p>".$row['price']."</p>";
    $output .="<p>".$row['distance']."</p>";
            
   
    //$output .="<a class='btn btn-success' id='contact-icon' name='details' role='button'>View details »»</a>";
    $output .="</div>";

    $output .="</div>";
      
  }
    
      
  } 

       

}
if(isset($_POST["submit"]))
     { 
    $output = '';
    $imageURL = '';
    //connect to the database
    $db = mysqli_connect("localhost", "root", "", "photos");
    
    // get all the submitted data from the form

    $town = $_POST['town'];
    $city = $_POST['city'];
    $houseType = $_POST['houseType'];

    $sql = "SELECT * from images  where city='$city' and town='$town' and houseType='$houseType'";

    $result = mysqli_query($connect, $sql);

    while($row = mysqli_fetch_array($result))
      {
        
      $output .="<div class='col-lg-4'>";
      
      $imageURL = 'uploads/'.$row['file_name'];
      $output .="<img data-src='holder.js/200x200' class='img-thumbnail' style='width: 300px; height: 250px;' data-holder-rendered='true' src='$imageURL'>";

       $output .="<div class='panel panel-danger'>";
    $output .="<p>".$row['town']."</p>";
    $output .= '<option value = '.$row["houseType"].'>'.$row["houseType"].'</option>';
    $output .="<p>".$row['price']."</p>";
    $output .="<p>".$row['distance']."</p>";
            
    //$output .="<a class='btn btn-success' id='contact-icon' name='details' role='button'>View details »»</a>";
    $output .="</div>";

    $output .="</div>";
      
  }
    
      
  }
  echo $output;


?>

