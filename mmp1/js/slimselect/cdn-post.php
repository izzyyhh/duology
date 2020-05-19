<?php
var_dump( $_POST["champions"]);
echo $_POST["champions"][2];
echo "ähm";

if(count($_POST["champions"]) == 3){
    echo "super";
} else{
    header("location: cdn.html");
}

?>