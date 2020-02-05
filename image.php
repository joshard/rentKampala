
<?php
$image = '';
$msg ="";
$dir ="uploads/";
$basename = basename($_FILES['image']['name']);

//if upload button is pressed
if(isset($_POST['upload'])){
    //the path to store uploaded image
    $target = $dir.$basename;

    //connect to the database
    $db = mysqli_connect("localhost", "root", "", "photos");

    // get all the submitted data from the form
    $image = $_FILES['image']['name'];
    $city = $_POST['city'];
    $town = $_POST['town'];
    $houseType = $_POST['houseType'];
    $price = $_POST['price'];
    $distance = $_POST['distance'];
    

    $sql = "INSERT INTO images (file_name, city, town, houseType, price, distance) VALUES ('$image', '$city', '$town', '$houseType', '$price', '$distance')";
    mysqli_query($db, $sql); //stores the ubmitted data into the database table:

    //now let's move the upload image into the folder:
    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        $msg = "Image upload successfully";

             
            echo '<div><hr class="featurette-divider"></div>';
            echo '<p align="center" class="alert alert-success" role="alert" >Upload successful</p>';
       
    }else{
        $msg = "There was a problem uploading image";
        echo '<div><hr class="featurette-divider"></div>';
        echo '<p align="center" class="alert alert-danger" role="alert" >Failed</p>';
    }
}


$connect = mysqli_connect("localhost", "root", "", "photos");

$city ='';

//query for city details from database
$query = "SELECT * from tb_city  Group By city_name order by city_name ASC";
$result = mysqli_query($connect, $query);
  while($row = mysqli_fetch_array($result))
  {
    $city .= '<option value="'.$row["city_name"].'">'.$row["city_name"].'</option>';
  }

?>


<!DOCTYPE html>
<!-- saved from url=(0052)https://getbootstrap.com/docs/3.4/examples/carousel/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=2">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>upload details</title>

    <!-- Bootstrap core CSS -->
    <link href="./Carousel Template for Bootstrap_files/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="./Carousel Template for Bootstrap_files/carousel.css" rel="stylesheet">
    <script type="text/javascript" src="bootstrap/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/jquery-ui-1.11.4/jquery-ui.js"></script>
    <link href="bootstrap/jquery-ui-1.11.4/jquery-ui.css" rel="stylesheet">

    </script>
  </head>
<!-- NAVBAR
================================================== -->
  <body>

  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="home.php">Rent Kampala</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="home.php">Home</a></li>
                <li><a href="image.php">About</a></li>
                <li><a href="https://getbootstrap.com/docs/3.4/examples/carousel/#">Contact</a></li>
                <li class="dropdown">
                  <a href="https://getbootstrap.com/docs/3.4/examples/carousel/#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="https://getbootstrap.com/docs/3.4/examples/carousel/#">Action</a></li>
                    <li><a href="https://getbootstrap.com/docs/3.4/examples/carousel/#">Another action</a></li>
                    <li><a href="https://getbootstrap.com/docs/3.4/examples/carousel/#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="https://getbootstrap.com/docs/3.4/examples/carousel/#">Separated link</a></li>
                    <li><a href="https://getbootstrap.com/docs/3.4/examples/carousel/#">One more separated link</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>
    </nav>
    <!-- End of NAVBAR
================================================== -->

      <hr class="featurette-divider">
      <div class="container">
    
    
        <form method="POST" action="image.php" enctype="multipart/form-data" class="form-group col-md-5" >
            <input type="hidden" name="size" value"1000000">
            <h2 class="alert alert-success">Enter Rental Details </h2>
            <div>
                <label class="label label-primary" for="inputImage">Select Image</label>
                <input class="alert alert-info" type="file" name="image">
            </div>
            <div>
                <label for="inputCity">City</label>
                <select name="city" id="city" class="form-control action">
                <option value="">Select City</option>
                <?php echo $city;?>
                </select>
            </div>
            <div>
                <label for="inputTown">Town</label>
                <select name="town" id="town" class="form-control action">
                <option value="">Select Town</option>
                <!--<?php //echo $town_name;?>-->
                </select>
            </div>
            <div>
                <label for="inputType">House Type</label>
                <select name="houseType" id="houseType" class="form-control action">
                <option value="">Select House Type</option>
               

                </select>
            
            </div>
            <div>
                <label for="inputPrice">Price</label>
                <input type="text" name="price" placeholder="price" class="form-control">
            </div>
            <div>
                <label for="inputDistance">Distance</label>
                <input type="text" name="distance" placeholder="distance from road" class="form-control">
            </div>
            
            <br>
            <div>
                <input class="btn btn-success" type="submit" name="upload" value="Upload Data">
            </div>
        </form>
        
    </div>
    </div>
</body>
</html>
<!--write the script to retirve data dynamically-->

<!--...................end of script .............-->
    <script type="text/javascript">
      $(document).ready(function(){ 
        $('.action').change(function(){
         
          if($(this).val()!='')
          {
            var action = $(this).attr("id");
            var query = $(this).val();
            var result = '';
            if(action == 'city')
            {
                result = 'town';
            }
            else
            {
                result = 'houseType';
            }
            $.ajax({
                url:"fetch_city.php",
                method:"POST",
                data:{action:action, query:query},
                success:function(data){
                if(result){
                $('#'+result).html(data);
                
              }
               if(result){
                    $('#result').html(data);
                
                }
            
              }
            })
          }

          });
        
      });
    


      </script>
