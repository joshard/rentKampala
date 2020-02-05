
<!DOCTYPE html>
<!-- saved from url=(0052)https://getbootstrap.com/docs/3.4/examples/carousel/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=2">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Template</title>

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
              <a class="navbar-brand" href="template.php">Rent Kampala</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="https://getbootstrap.com/docs/3.4/examples/carousel/#">Home</a></li>
                <li><a href="https://getbootstrap.com/docs/3.4/examples/carousel/#">About</a></li>
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


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">
      <div class="container">
    <form method="POST" action="template.php">
    <!-- Select options for your house Location
    ================================================== -->
    <div class= "form-group col-md-3">
    <label for="inputLocation">Location</label>
    <select name="location" id="inputLocation" class="form-control">
    <option selected>Kampala</option>
    <option>Kibuye</option>
    <option>Nakawa</option>
    <option>Kikoni</option>
    <option>Makindye</option>
    <option>Kasubi</option>
    <option>Nakulabye</option>

    </select>
    </div>

    <!-- End of select options -->

    <!-- Select options for your house Types
    ================================================== -->
    <div class= "form-group col-md-3">
    <label for="inputLocation">House Type</label>
    <select name="type" id="inputLocation" class="form-control">
    <option selected>Flat</option>
    <option>Banglow</option>
    <option>Masion</option>
    <option>Hostel</option>
    <option>Hotels</option>
    <option>Apartments</option>
    <option>Cottage</option>

    </select>
    </div>

    <!-- End of select options -->

       <!-- Select options for your house Prices
    ================================================== -->
    <div class= "form-group col-md-3">
    <label for="inputLocation">House Prices</label>
    <input type="text" name="price" id="priceID" class="form-control">
    </div>

    <!-- End of select options -->
    <div class= "form-group col-md-3">
    <br>
    <button type="submit" name="submit" id="submitID" class="btn btn-success">Submit</button>
    </div>

    </form>

<br>
      <!-- /END THE FEATURETTES -->

<br>


      <div class="row" align="center">
        
      
       
        
        <?php

        $db = mysqli_connect("localhost", "root", "", "photos");
        if(isset($_POST['submit'])){

        //$image = $_FILES['image']['name'];
        $location = $_POST['location'];
        $price = $_POST['price'];
        //$distance = $_POST['distance'];
        $type = $_POST['type'];

        if($location != "" || $price != "" || $distance != "" || $type != ""){
          $sql = "SELECT * FROM images WHERE location ='$location' || type = '$type' || price <= '$price' ";
          
          $search = mysqli_query($db, $sql) OR die('error');
          if(mysqli_num_rows($search) > 0){
            while($row = mysqli_fetch_assoc($search)){
              echo "<div class='col-lg-4' id=img_div>";

      echo"<img data-src='holder.js/200x200' class='img-thumbnail' style='width: 300px; height: 250px;' data-holder-rendered='true' src='".$row['image']."'>";
      echo"<p>".$row['location']."</p>";
      echo"<p>".$row['price']."</p>";
      echo"<p>".$row['distance']."</p>";
      echo"<p>".$row['type']."</p>";
      echo"<p>";
      echo"<a class='' role='button'>View details »</a>";
      echo"</p>";

      echo "</div>";

              

            }

          }else{
            ?>
            <tr>
            <td> <?php echo '<div><hr class="featurette-divider"></div>'?></td>
            <td><?php echo '<p align="center" class="alert alert-danger" role="alert" >records not found</p>';?></td>
            </tr>
            <?php
            }
          }
        
        }
        ?>
      </div><!-- /.row -->
      <!-- FOOTER -->

     <!-- <footer>
        <p class="pull-right"><a href="">Back to top</a></p>
        <p>© 2016 Company, Inc. · <a href="">Privacy</a> · <a href="">Terms</a></p>
      </footer>-->

      <script type="text/javascript">
        $(document).ready(function(){
          alert("Hello");
        });
      </script>

    </div>
    <!-- /.container -->


    
  

</body></html>