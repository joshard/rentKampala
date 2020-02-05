<?php
$connect = mysqli_connect("localhost", "root", "", "photos");

$city='';

$query = "SELECT * from images  Group By city order by city ASC";
$result = mysqli_query($connect, $query);
  while($row = mysqli_fetch_array($result))
  {
  	$city .= '<option value="'.$row["city"].'">'.$row["city"].'</option>';
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
    
    <title>Home</title>

    <!-- Bootstrap core CSS -->
    <link href="./Carousel Template for Bootstrap_files/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="./Carousel Template for Bootstrap_files/carousel.css" rel="stylesheet">
    <script type="text/javascript" src="bootstrap/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/jquery-ui-1.11.4/jquery-ui.js"></script>
    <link href="bootstrap/jquery-ui-1.11.4/jquery-ui.css" rel="stylesheet">

    <script src="./vendor/jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css1/style.css" />
    
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
   <form method="POST" action="home.php">
    <!-- Select options for your house Location
    ================================================== -->
    <div class= "form-group col-md-3">
    <label for="inputCity">City</label>
    
    <select name="city" id="city" class="form-control action">
    
    <option value="">Select City</option>
    <?php echo $city;?> 
   

    </select>
    
    </div>

    <!-- End of select options -->

    <!-- Select options for your house Types
    ================================================== -->
    <div class= "form-group col-md-3">
    <label for="inputTown">Town</label>
    
    <select name="town" id="town" class="form-control action">
    
    <option value="">Select Town</option>
      
    </select>
    
    </div>

    <!-- End of select options -->

       <!-- Select options for your house Prices
    ================================================== -->
    <div class= "form-group col-md-3">
    <label for="inputType">House Type</label>
    
    <select name="houseType" id="houseType" class="form-control action">
    
    <option value="">Select House Type</option>
      
   

    </select>
    </div>

    <!-- End of select options -->
    <div class= "form-group col-md-3">
    <br>
    <button type="submit" name="submit" id="submit" class="btn btn-success">Submit »»</button>
    </div>

    </form>

<br>
      <!-- /END THE FEATURETTES -->
<br>
<div class="" align="center">
        
      <?php include_once ('fetch.php');?> 
      <?php echo "<div id='result'>  </div>";?>
      
       
      </div><!-- /.row -->

</body>
</html>



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
          		url:"fetch.php",
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
