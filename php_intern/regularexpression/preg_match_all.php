<?php
$String="php is a best language nd php   is used in server side language ";
$xp=preg_match_all("/php/i",$String, $pan);
if($xp){
    echo "match was found";
}
else{
    echo "match was not found";

}
echo "$xp"."<br>";
print_r($pan);
?>
