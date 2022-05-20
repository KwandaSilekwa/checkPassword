<?php 

function StringChallenge($str) {

  $lowLimit = 7;
  $highLimit = 31;
  $capital = false;
  $symbol = false;
  $number = false;
  $temp = "password";

  if(strlen($str) >= 31 || strlen($str) < 7){
    return false;
  }

  for($x = 0; $x < strlen($str); $x++){
    if($str[$x] >= '0' && $str[$x] <= '9'){
      $number = true;
    }
    else if(ctype_upper($str[$x])){
      $capital = true;
    }
    else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $str[$x])){
      $symbol = true;
    }

    if(strtolower($str[$x]) == 'p'){
      $index = 0;
      $found = true;

      for($y = $x; $y < $x + strlen($temp); $y++){
        if(strtolower($str[$y]) != $temp[$index]){
          $found = false;
          break;
        }
        $index++;
      }
      if($found){
        return "false";
      }
    }
  }
  if($capital && $symbol && $number){
    return "true";
  }
  else{
    return "false";
  }
  return $str;

}
 
?>
