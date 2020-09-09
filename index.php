<?php 

  $weather = ""; 
  $error = ""; 

  if ( $_POST['location'] )  {
    $urlContents =  file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=" .$_POST['location']."&appid=edb0987f65930fcd131c1131887d66b5");

    $weatherArray = json_decode($urlContents, true); 

 //   print_r($weatherArray);
  //  print_r($urlContents);
    //echo $cityName; 

    if ( $weatherArray['cod'] != 200 )  {
      $error .= "This place cannot be found.";
    }
  
    $weather = "The weather in " .$_POST['location']. " is currently " . $weatherArray['weather'][0]['description'] . ".";
   // echo $weather;
  //  echo "<br>";

    $tempInCelcius = floor($weatherArray['main']['temp'] - 273.15);

    $weather .= " The temperature is " . $tempInCelcius . "&deg;C and the windspeed is " . $weatherArray['wind']['speed'] . ".";

   // echo $tempInCelcius; 
  } else  {

  }

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel = "stylesheet" href = "styles.css" type = "text/css">;

    <title>Hello, world!</title>


    </head>
  <body>

  <div id = "header_container">
      <h2> Weather Scrapper </h2>
   </div>

  <div id = "input_container">
    <form method="post">
      <div class="form-group">
         <div class="input-group mb-3">
                <div class = "label_above">
                    <label for = "location" id = "place"> Enter a location. </label></br>  
                    <input type="text" class="form-control" id = "location" placeholder = "Eg: New-York, London" name = "location">
                </div>
         </div>
    </form>
                <button class = "btn btn-primary">Get the Weather.</button>
        </div>
  </div>

  <div id = "information_container">
      <div id = "info"> 
      <? if ( $weather != "" && $error == "" )  {
            echo '<div class = "alert alert-success" role = "alert">' . $weather . '</div>'; 
          } else if ( $error != "" )  {
            echo '<div class = "alert alert-danger role = "alert">' . $error . '</div>';
          }
      ?>
      </div>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
    <script type = "text/javascript">



    </script>
  </body>
</html>