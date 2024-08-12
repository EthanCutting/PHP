Basic PHP Syntax
- A PHP script can be placed anywhere in the document.  
- A PHP script starts with <?php and ends with ?>:
<?php
// PHP code goes here
?>
- The default file extension for PHP files is ".php".
-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
PHP Case Sensitivity
- In PHP, keywords (e.g. if, else, while, echo, etc.), classes, functions, and user-defined functions are not case-sensitive.
- In the example below, all three echo statements below are equal and legal:
        <!DOCTYPE html>
        <html>
        <body>
        <?php
            ECHO "Hello World!<br>";
            echo "Hello World!<br>";
            EcHo "Hello World!<br>";
        ?>
        </body>
        </html>
        Output:
                Hello World!
                Hello World!
                Hello World!

-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Creating (Declaring) PHP Variables
- In PHP, a variable starts with the $ sign, followed by the name of the variable:
                <!DOCTYPE html>
                <html>
                <body>
                <?php
                    $x = 5;
                    $y = "John";
                    echo $x;
                    echo "<br>";
                    echo $y;
                ?>
                </body>
                </html>
- In the example above, the variable $x will hold the value 5, and the variable $y will hold the value "John".
- Note: When you assign a text value to a variable, put quotes around the value.
- Note: Unlike other programming languages, PHP has no command for declaring a variable. It is created the moment you first assign a value to it.
-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
PHP Variables
A variable can have a short name (like $x and $y) or a more descriptive name ($age, $carname, $total_volume).
Rules for PHP variables:
- A variable starts with the $ sign, followed by the name of the variable
- A variable name must start with a letter or the underscore character
- A variable name cannot start with a number
- A variable name can only contain alpha-numeric characters and underscores (A-z, 0-9, and _ )
- Variable names are case-sensitive ($age and $AGE are two different variables)
- Remember that PHP variable names are case-sensitive!

Output Variables
- The PHP echo statement is often used to output data to the screen.
- The following example will show how to output text and a variable:
    <?php
        $txt = "W3Schools.com";
        echo "I love $txt!";
    ?> 
Output: I love W3Schools.com!

- The following example will produce the same output as the example above:
<?php
$txt = "W3Schools.com";
echo "I love " . $txt . "!";
?>
Output: I love W3Schools.com!

- The following example will output the sum of two variables:
<?php
$x = 5;
$y = 4;
echo $x + $y;
?>
Output: 9

PHP is a Loosely Typed Language
- In the example above, notice that we did not have to tell PHP which data type the variable is.
- PHP automatically associates a data type to the variable, depending on its value. Since the data types are not set in a strict sense, you can do things like adding a string to an integer without causing an error.
- In PHP 7, type declarations were added. This gives an option to specify the data type expected when declaring a function, and by enabling the strict requirement, it will throw a "Fatal Error" on a type mismatch.

Variable Types
- PHP has no command for declaring a variable, and the data type depends on the value of the variable.
        <?php
            $x = 5;      // $x is an integer
            $y = "John"; // $y is a string

            echo $x;
            echo $y;
        ?>
Output: 5John

PHP supports the following data types:
- String
- Integer
- Float (floating point numbers - also called double)
- Boolean
- Array
- Object
- NULL
- Resource

Get the Type
- To get the data type of a variable, use the var_dump() function.
- The var_dump() function returns the data type and the value:
<?php
$x = 5;
var_dump($x);
?>

- See what var_dump() returns for other data types:
        <!DOCTYPE html>
        <html>                                                            
        <body>
        <pre>
        <?php
            var_dump(5);
            var_dump("John");
            var_dump(3.14);
            var_dump(true);
            var_dump([2, 3, 56]);
            var_dump(NULL);
        ?>
        </pre>
        </body>
        </html>
 Output:
        int(5)
        string(4) "John"
        float(3.14)
        bool(true)
        array(3) {
        [0]=>
        int(2)
        [1]=>
        int(3)
        [2]=>
        int(56)
        }
        NULL



Assign String to a Variable
- Assigning a string to a variable is done with the variable name followed by an equal sign and the string:
<?php
$x = "John";
echo $x;
?>
Output: John
- String variables can be declared either by using double or single quotes, but you should be aware of the differences.

Assign Multiple Values
- All three variables get the value "Fruit":
<?php
$x = $y = $z = "Fruit";
echo $x;
echo $y;
echo $z;
?>
Output: FruitFruitFruit

-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

