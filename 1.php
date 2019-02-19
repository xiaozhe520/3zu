<?php 
function smiddle($arr){
  $rev = [];
  $count = count($arr);
  for($i=0;$i<$count-1;$i++){
      if(isset($rev[$i-1])){
         array_unshift($rev,$arr[$i]+$arr[$i-1]); 
      }else{
      	$rev[] = $arr[$i];
      }
  }

  $tmp = '';
  for($i=$count-1;$i>0;$i--){
     $tmp = $arr[$i]+$arr[$i-1];
     if($rev[$i-2] == $tmp){
     	return $i-1;
     }
  }else{
  	return false;
  }
}

var_dump(smiddle([12,3,5,8,9,7,6,4,1]));


 ?>