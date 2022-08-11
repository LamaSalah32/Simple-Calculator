<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style.css">
    <title> Calculator </title>
    
</head>

<body>
      <p class="par"> Simple Calculator</p>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="div1">
                  <input type="text" placeholder="First Number" autocomplete="off" name="n1">
                  <input type="submit" value="+" name= "submit">
                  <input type="submit" value="×" name= "submit"> 

                  <br>

                  <input type="text" placeholder="Second Number" autocomplete="off" name="n2">
                  <input type="submit" value="-" name= "submit">
                  <input type="submit" value="÷" name= "submit">

            </div>
      </form>
</body>

</html>

<?php
     
      $s = $_POST["submit"];
      $res = "Result";

      $num1 = $_POST['n1'];
      $num2 = $_POST['n2'];
      
      if ($num1 == NULL || $num2 == NULL){
            echo "<div> <p class=\"c1\"> <input value=\"\" disabled class=\"res\">  </p> </div>";
      }
      else{
            switch($s){
                  case '+':
                              $res =  $num1 +  $num2;
                              break;
                  case '-':
                              $res = $num1 -  $num2;
                              break; 
                  
                  case '×':
                              $res = $num1 *  $num2;
                              break;

                  case '÷':
                              if ($num2 == 0){
                                    echo "<div> <p class=\"c1\"> <input value=\"Can't divide by 0!\" disabled class=\"res\">  </p> </div>";
                              }
                              else {
                                    $res = $num1/$num2;
                                    echo "<div> <p class=\"c1\"> <input value=\"$num1 $s $num2 = $res\" disabled class=\"res\">  </p> </div>";
                              }
                              break;
            }

            if ($s != '÷')      
            echo "<div> <p class=\"c1\"> <input value=\"$num1 $s $num2 = $res\" disabled class=\"res\">  </p> </div>";
      }
      
?>
