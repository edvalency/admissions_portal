<?php
require_once "../conn.php";
$db = new DB();

  $characters = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O",
  "P","Q","R","S","T","U","V","W","X","Y","Z","a","b","c","d","e","f","g","h","i",
  "j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","1","2","3","4",
  "5","6","7","8","9","0");

  $ser = array("1","2","3","4","5","6","7","8","9","0");

//  for($e=0;$e<10;$e++){
// //   $serial ="";
//    $id= "KN";

//     for($i=0;$i<=10;$i++){
//   $cha = rand(0,count($characters)-1);
//   $id .= $characters[$cha];
//   }

  
//   echo $id."<br>";
// }

  
$set = "donw";

// for($i=0;$i<=14;$i++){  
//     $sc = rand(0,9);
//     $serial .= $ser[$sc];
//     }
// echo $serial;

//   function generate(){
    if(isset($set)){
      for($a=0;$a<20;$a++){
      $serial= "KN";
      $pin ="";
      for($i=0;$i<=10;$i++){
      $cha = rand(0,count($characters)-1);
      $serial .= $characters[$cha];
      }

  for($i=0;$i<=14;$i++){  
      $sc = rand(0,9);
      $pin .= $ser[$sc];
      }

 echo $serial." ".$pin."<br>";

 $db->insertvoucher($serial,$pin);
  }
    }
      
    
//   echo $serial.'<br>';
//   }

//   generate();

?> 