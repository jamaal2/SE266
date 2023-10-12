    <?php
    // Define the fizzBuzz function
    function fizzBuzz($num) {
        if ($num % 2 == 0 && $num % 3 == 0) {
            return "Fizz Buzz";
        } 
        elseif ($num % 2 == 0) {
            return "Fizz";
        } 
        elseif ($num % 3 == 0) {
            return "Buzz";
        } 
        else {
            return $num;
        }
    }

    // Loop through numbers from 1 to 100 and display the result
    for ($count = 1; $count  <= 100; $count++) {
        echo fizzBuzz($count) . " ";
    }
    ?>
