<?php
if($_POST){
    $field_values_array = array_filter($_POST['field_name']);
    if($field_values_array){
        foreach ($field_values_array as $value){
            echo $value[0], $value[1]. '<br />';

            //your mysql goes here
            //$sql="INSERT INTO stock_port (name, ticker) VALUES ('$value[0]', '$value[1]')";          
        }
    }
}
?>