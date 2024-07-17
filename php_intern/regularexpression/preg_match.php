<?php
$String="php is a best language nd   is used in server side language ";
   $exp = preg_match("/php/",$String);
   echo $exp;
if($exp){
    echo "match was found";
}
else{
    echo "match was not found";

}
?>