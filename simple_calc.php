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
     
     function division($a, $b){
            if (!$b){
                  throw new Exception("Can't divide by 0!");
            }     

            return $a / $b;
      }

      $s = $_POST["submit"];
      $res = "Result";
      
      $num1 = filter_input(INPUT_POST, 'n1', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $num2 = filter_input(INPUT_POST, 'n2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      
      if ($num1 == NULL || $num2 == NULL){
            echo "<div> <p class=\"c1\"> <input style=\"color:gray\" value=\"Enter two numbers\" disabled class=\"res\">  </p> </div>";
      }
      else{
            if (isset($_POST["submit"])){
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
                                    try{
                                          $res = division($num1, $num2);
                                          echo "<div> 
                                                      <p class=\"c1\"> 
                                                      <input value=\"$num1 $s $num2 = $res\" disabled class=\"res\">  
                                                      </p> 
                                                </div>";

                                    }catch(Exception $e){
                                          $msg = $e->getMessage();
                                          echo "<div> 
                                                      <p class=\"c1\">
                                                      <input value=\"$msg\" disabled class=\"res2\"> 
                                                      </p>
                                                </div>";
                                    }
                                    break;
                  }

                  if ($s != '÷'){     
                        echo  "<div> 
                                    <p class=\"c1\"> 
                                    <input value=\"$num1 $s $num2 = $res\" disabled class=\"res\">  
                                    </p> 
                              </div>";
                  }
            }
      }
      
?>
