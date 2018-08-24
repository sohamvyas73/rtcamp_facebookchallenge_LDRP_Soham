<?php
    $i = 0;
    while($i < 5) {
        echo "<input type='checkbox' name='hobbies[]'/>".$i."";
        $i++;
    }
    print_r($_POST['hobbies']);
?>