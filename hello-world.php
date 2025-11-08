<?php

// ============================================
// SECTION 1: COMMENTS
// ============================================

# I am testing comments in PHP
// This is also a comment
/* This is a 
   multi-line comment */

# echo "Hello, world!<br>";
# echo "<br>";

# I don't need to close the PHP tag because I am not using any HTML after this, 
# and it's a good practice to keep the PHP tag open.


// ============================================
// SECTION 2: VARIABLES - BASICS
// ============================================

/* $my_first_variable = "Hello, world!";
echo $my_first_variable;
echo "<br>"; */

// Testing var_dump with different types
/* var_dump($my_first_variable);
echo "<br>";

var_dump(25);
echo "<br>";
var_dump(10.5);
echo "<br>";
var_dump(true);
echo "<br>";
var_dump(false);
echo "<br>";
var_dump(null);
echo "<br>"; */


// ============================================
// SECTION 3: VARIABLES - SCOPE (Global/Local)
// ============================================

# $x = 5;  // Global variable
# $y = 10; // Global variable

// Example: Using $GLOBALS array to modify global variables from function
/* function modify_globals() {
  $GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y'];
} 

modify_globals();
echo "Y after function: " . $y . "<br>";  // outputs 15 */


// ============================================
// SECTION 4: VARIABLES - STATIC
// ============================================

/* function get_data() {
  static $data = null;
  
  if ($data === null) {
    echo "Loading data...<br>";
    $data = "Important data";
  }
  
  return $data;
} */

# echo get_data();  // "Loading data..." + "Important data" - first call: the program recognizes $data variable as null, because it was declared at the beginning of the function as null. Therefore, the if statement returns true and runs the script inside it. That is, it displays on the screen "Loading data, break row", and sets the $data variable as "Important data". At the end, it returns $data. Now, because it is static, it saves the previous value set to $data and keeps it, instead of deleting the memory of this variable.
# echo "<br>";
# echo get_data();  // just "Important data" (no loading!) - second call: $data = still 'Important data' because the program reads it as 'already initialized' and does not (re)declare it again. Since data isn't the same as null, the script in the if statement is skipped. $data is still returned at the end of the function.
# echo "<br>";
# echo get_data();  // just "Important data" (no loading!) - third call: same as above
# echo "<br><br>";


// Real-world example: Caching database queries
/* function get_membership_levels() {
  static $levels = null;
  
  if ($levels === null) {
    // Only query database ONCE
    global $wpdb;
    $levels = $wpdb->get_results("SELECT * FROM memberships");
  }
  
  return $levels;
} */

// Called 100 times in one page load
// Only queries database ONCE

# get_membership_levels(); // the variable is null, so the if statement runs the script inside it. Oh, nice, now we're using native wp variables, I remember seeing $wpdb in many codes and places. Let's see.... we can use this variable inside the function by setting the 'global' keyword before invoking it. Then, we'll set the $levels variable to one of the methods inside this other $wpdb variable. It is then returned at the end of the function, fetching the results for whoever is calling it, whatever/'wherever' they want

# get_membership_levels(); // simple. $levels is not null anymore, so the if statement doesn't run. The function still returns the variable, for which the user can manipulate it as conveniently

// ============================================
// SECTION 3: ECHO AND PRINT
// ============================================

/* $name = "oiler";

echo $name;

print '<h1>Hello $name</h1>'; // it will be considered as one single string and displays 'Hello $name', instead of 'Hello, oiler', since we need to separate variables when using single quotes
print "<h1> Hello" . $name . "</h1>"; // when using double quotes we don't need to concatenate texts and strings/variables. It is possible, but it is a waste of time and will produce weird results if you don't put <br> into each block */

# $result = print "Hello";  // Outputs "Hello", $result = 1

// Used in expression:
/* if (print "$name") {
  // This runs because print returns 1 (truthy)

  print "Ronaldo";
} /*

# $result = echo "test";  // ERROR - can't do this (Parse error: syntax error, unexpected token "echo")


/* Real talk: This is almost never used in practice. It's a weird PHP quirk.
99% of the time: Use echo - it's faster and clearer.
When to use print: Basically never, unless you have a very specific edge case. */

// ============================================
// SECTION 4: DATA TYPES
// ============================================

// Basic types
/* var_dump("Hello");
echo "<br>";
var_dump(42);
echo "<br>";
var_dump(3.14);
echo "<br>";
var_dump(12e12);
echo "<br>";
var_dump(true);
echo "<br>";
var_dump(null);
echo "<br><br>"; */

// Exponential notation = always float
/* var_dump(2.5e3);       // float(2500)
echo "<br>";
var_dump(1.8e-2);      // float(0.018)
echo "<br><br>"; */

// Casting - change data types
/* $x = 5;
var_dump((string) $x); // "5"
echo "<br>";
var_dump((float) $x);  // 5.0
echo "<br>";
var_dump((bool) $x);   // true
echo "<br><br>"; */

// Casting converts the type, not the notation. The value stays the same.
/* var_dump(12e12);
echo "<br>";
var_dump((int) 12e12);
echo "<br>"; */

// ============================================
// SECTION 5: STRINGS
// ============================================

/* Testing this exercise on w3schools, I have no f. idea what will be output:

What will be the result of $z in the following code example:
$x = 5;
$y = 10;
$z = $x . $y; */

/* $x = 5;
$y = 10;
$z = $x . $y;

echo $z; // 510. interesting...
echo "<br><br>";

// ============================================
// STRING EXAMPLES
// ============================================

// Slicing with substr()
$text = "Hello, world!";
echo "Original: $text<br>";
echo "substr(\$text, 5): " . substr($text, 5) . "<br>";  // ", world!"
echo "substr(\$text, -5): " . substr($text, -5) . "<br>";  // "orld!"
echo "substr(\$text, 7, 5): " . substr($text, 7, 5) . "<br><br>";  // "world"

// Explode - split string into array
$plugins = "MemberPress,Pretty Links,ThirstyAffiliates";
$list = explode(",", $plugins);
echo "Explode result and show the best plugins with the best support in WP:<br>";
print_r($list);
echo "<br><br>";

// Escape characters
echo "Quotes: \"Vikings\" from the north<br>";
echo "Path: C:\\Users\\Files<br>";
echo "Newline next:\nSee?<br>";
echo "<pre>Newline next:\nSee?</pre><br>";
echo "<pre>Tab:\there<br></pre><br>";

// nl2br() - converts \n to <br> for HTML
$multiline = "Line 1\nLine 2\nLine 3";
echo "Without nl2br(): $multiline<br>";
echo "With nl2br(): " . nl2br($multiline) . "<br><br>";

// Common string functions
$sample = "  Pretty Links  ";
echo "Original: '$sample'<br>";
echo "trim(): '" . trim($sample) . "'<br>";
echo "strlen(): " . strlen($sample) . "<br>";
echo "strtoupper(): " . strtoupper($sample) . "<br>";
echo "str_replace(): " . str_replace("Links", "URLs", $sample) . "<br>";
*/

// ============================================
// SECTION 6: NUMBERS
// ============================================

// Integers vs Floats
/* $int = 42;
$float = 3.14;
var_dump($int);    // int(42)
echo "<br>";
var_dump($float);  // float(3.14)
echo "<br><br>";

// Float operand rule - result becomes float if ANY operand is float
var_dump(4 * 2.5);  // float(10) - not int!
echo "<br>";
var_dump(4 * 2);    // int(8)
echo "<br><br>";

// Type checking functions
$x = 5985;
var_dump(is_int($x));       // bool(true)
echo "<br>";
var_dump(is_float($x));     // bool(false)
echo "<br>";
var_dump(is_numeric($x));   // bool(true)
echo "<br><br>";

// Number strings
$num_string = "123";
var_dump(is_numeric($num_string));  // bool(true)
echo "<br>";
$result = $num_string + 100;
var_dump($result);  // int(223) - PHP auto-converts!
echo "<br><br>";

// Integer limits - exceeding converts to float
$max_int = 9223372036854775807;  // PHP_INT_MAX
var_dump($max_int);              // int
echo "<br>";
$exceed = 9223372036854775808;   // One more
var_dump($exceed);               // float! (too big for int)
echo "<br><br>";

// Infinity - numbers too big
$inf = 1.9e411;
var_dump($inf);           // float(INF)
echo "<br>";
var_dump(is_infinite($inf));  // bool(true)
echo "<br><br>";

// NaN - invalid math operations
$nan = acos(8);  // Invalid: acos only works for -1 to 1
var_dump($nan);  // float(NAN)
echo "<br>";
var_dump(is_nan($nan));  // bool(true)
echo "<br>"; */

// ============================================
// SECTION 7: CASTING
// ============================================

// Cast to string
/* $a = 5;
$b = 5.34;
$c = true;
var_dump((string) $a);  // "5"
echo "<br>";
var_dump((string) $b);  // "5.34"
echo "<br>";
var_dump((string) $c);  // "1"
echo "<br><br>";

// Cast to int - PHP tries to extract numbers
var_dump((int) "25 plugins");  // 25 (starts with number)
echo "<br>";
var_dump((int) "plugins 25");  // 0 (starts with text)
echo "<br>";
var_dump((int) true);          // 1
echo "<br>";
var_dump((int) NULL);          // 0
echo "<br><br>";

// Cast to float
var_dump((float) "25.9 hours");  // 25.9
echo "<br>";
var_dump((float) "42");         // 42.0
echo "<br><br>";

// Cast to bool - 0, "", false, NULL = false, everything else = true
var_dump((bool) 0);      // false
echo "<br>";
var_dump((bool) "");     // false
echo "<br>";
var_dump((bool) -1);     // true (even negative!)
echo "<br>";
var_dump((bool) "hello"); // true
echo "<br><br>";

// Cast to array
$x = 42;
$arr = (array) $x;
var_dump($arr);  // [0 => 42]
echo "<br><br>";

// Cast array to object
$tools = ["MemberPress", "Pretty Links", "ThirstyAffiliates"];
$obj = (object) $tools;
var_dump($obj);
echo "<br><br>";

// What if we try to cast other data types to object?
$obj_test = 42;
$newobjtest = (object) $obj_test;
var_dump($newobjtest);
echo "<br><br>";

// Cast associative array to object
$assoc = ["name" => "MemberPress", "active" => true];
$obj2 = (object) $assoc;
var_dump($obj2);
echo "<br><br>";

// Note: (unset) cast was removed in PHP 7.2+
// To set to NULL, just assign: $x = null; */


// ============================================
// SECTION 8: MATH
// ============================================

/* // pi() - mathematical constant
echo "pi(): " . pi() . "<br><br>";
echo (pi());
echo "<br><br>";

// min() and max() - find smallest/largest
echo "min(0, 150, 30, 20, -8, -200): " . min(0, 150, 30, 20, -8, -200) . "<br>";
echo "max(0, 150, 30, 20, -8, -200): " . max(0, 150, 30, 20, -8, -200) . "<br><br>";

// abs() - absolute value (removes negative sign)
echo "abs(-6.7): " . abs(-6.7) . "<br>";
echo "abs(42): " . abs(42) . "<br><br>";

// sqrt() - square root
echo "sqrt(64): " . sqrt(64) . "<br>";
echo "sqrt(25): " . sqrt(25) . "<br><br>";

// round() - rounds to nearest integer
echo "round(0.60): " . round(0.60) . "<br>";
echo "round(0.49): " . round(0.49) . "<br>";
echo "round(3.7): " . round(3.7) . "<br><br>";

// rand() - random number generation
echo "rand(): " . rand() . "<br>";
echo "rand(10, 100): " . rand(10, 100) . "<br>"; */


