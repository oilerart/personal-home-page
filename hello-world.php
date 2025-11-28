<?php
declare(strict_types=1); // strict requirement

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


// ============================================
// SECTION 9: CONSTANTS
// ============================================

// Using define() - can be used anywhere
/* define("PLUGIN_NAME", "Pretty Links");
echo PLUGIN_NAME . "<br>";

// Using const - must be top-level
const COMPANY = "CaseProof";
echo COMPANY . "<br><br>";

// Constant arrays (PHP 7+)
define("PRODUCTS", [
  "MemberPress",
  "Pretty Links",
  "ThirstyAffiliates"
]);
echo PRODUCTS[0] . "<br><br>";

// Constants are global - accessible in functions
define("SUPPORT_EMAIL", "support@caseproof.com");
function getSupportContact() {
  echo SUPPORT_EMAIL;
}
getSupportContact();
echo "<br><br>";

// Built-in PHP constants
echo "PHP_VERSION: " . PHP_VERSION . "<br>";
echo "PHP_INT_MAX: " . PHP_INT_MAX . "<br><br>";

// ============================================
// MAGIC CONSTANTS
// ============================================

// __LINE__ - current line number
echo "Current line: " . __LINE__ . "<br>";

// __FILE__ - full path and filename
echo "File: " . __FILE__ . "<br>";

// __DIR__ - directory of current file
echo "Directory: " . __DIR__ . "<br><br>";

// __FUNCTION__ - function name
function myFunction() {
  echo "Function: " . __FUNCTION__ . "<br>";
}
myFunction();

// __CLASS__ and __METHOD__ - class context
class MemberPressTools {
  public function versionCheck() {
    echo "Class: " . __CLASS__ . "<br>";
    echo "Method: " . __METHOD__ . "<br>";
  }
}

$tools = new MemberPressTools();
$tools->versionCheck();
echo "<br>";

// ClassName::class - full class name
echo "Full class name: " .MemberPressTools::class. "<br>";

*/

// ============================================
// SECTION 10: OPERATORS
// ============================================

// Arithmetic: +, -, /, %, **
/* echo "2 + 3 = " . (2 + 3) . "<br>";
echo "2 ** 3 = " . (2 ** 3) . "<br><br>";

// Assignment: +=, -=, *=
$total = 100;
$total += 20;  // $total = $total + 20
echo "Initial value \$total = 100. After \$total += 20: $total<br><br>";

// Comparison: ==, ===, <, >=, <=>
var_dump(10 === 10);  // true
echo "<br>";
echo "Spaceship (10 <=> 15): " . (10 <=> 15) . "<br><br>";  // -1

// Increment/Decrement: ++, --
$counter = 5;
echo "Pre-increment: " . (++$counter) . "<br>";  // 6
echo "Post-increment: " . ($counter++) . "<br><br>";  // 6, then becomes 7

// Logical: &&, ||, !
var_dump(true && false);  // false
echo "<br>";
var_dump(true || false);  // true
echo "<br><br>";

// String: ., .=
$name = "MemberPress";
$message = "Welcome to " . $name;
$message .= " support!";
echo $message . "<br><br>";

// Array: + (union)
$a = ["plugin" => "Pretty Links"];
$b = ["version" => "4.0.0"];
var_dump($a + $b);
echo "<br><br>";

// Conditional: ternary (?:), null coalescing (??)
$plan = "Pro";
$msg = ($plan === "Pro") ? "Pro user!" : "Upgrade";
echo $msg . "<br>";
$username = $_GET['user'] ?? 'Guest';
echo "Username: $username<br>";
*/


// Exercise 1: done
// Exercise 2: debug a support ticket

/* $membership_price = "99.99";
$discount = 10;
$final_price = $membership_price - $discount;
echo "Final price: " . $final_price; */

// Ok, even though it has set the first variable as a string while it should be a number, PHP automatically detects it in the $final_price operation and convert the result to a number. We'd probably need to fix $membership_price but I don't see big issues here... Am I wrong?

/* Exercise 3: Write a helper function
Create a function that:
Takes a membership level name (string)
Checks if it's empty
Returns "No level" if empty, otherwise returns "Level: [name]"
Uses a ternary operator */

/* function myfirstfunctionfromscratch($level) {
return empty($level)? "No level" : "Level: $level";

}

 echo myfirstfunctionfromscratch("Premium");
echo "<br>";
echo myfirstfunctionfromscratch("");

# OR:

$message1 = myfirstfunctionfromscratch("Premium");
echo $message1;

echo "<br>";

$message2 = myfirstfunctionfromscratch('');
echo $message2; */

// ============================================
// SECTION 11: CONDITIONALS (if/else/elseif)
// ============================================

// Simple if statement
/* $is_active = true;
if ($is_active) {
  echo "User has an active subscription.<br>";
}

// if...else
$clicks = 75;
if ($clicks > 50) {
  echo "URL performing well!<br>";
} else {
  echo "Needs more promotion.<br>";
}

// if...elseif...else
$status = 'paused';
if ($status == 'active') {
  echo "User can access content.<br>";
} elseif ($status == 'paused') {
  echo "User needs to renew soon.<br>";
} else {
  echo "User has no access.<br>";
}

// Logical operators (&&, ||)
$user_role = 'admin';
$has_license = true;
if ($user_role == 'admin' && $has_license) {
  echo "Access granted.<br>";
}

// Ternary operator (shorthand)
$clicks = 100;
$msg = ($clicks > 50) ? "Nice traffic!" : "Needs promotion.";
echo $msg . "<br>";

// Nested ifs
$member = true;
if ($member) {
  echo "User found.";
  $is_active = true;
  if ($is_active) {
    echo " Subscription is active.<br>";
  } else {
    echo " Subscription is inactive.<br>";
  }
}
*/


// ============================================
// SECTION 12: SWITCH
// ============================================

/* Syntax
switch (expression) {
  case label1:
    //code block
    break;
  case label2:
    //code block;
    break;
  case label3:
    //code block
    break;
  default:
    //code block
} */

# Example 1: Create a variable that holds the current hour. Use it as the expression for the switch parameter, then add three possible cases: 'good morning', 'good afternoon' or 'good night'

# echo date_default_timezone_get(); - outputs the server timezone
/* date_default_timezone_set('America/Sao_Paulo'); # let's first set the timezone to be the same as mine
$hours = date('H'); # it holds current hour (00-24 format) */
# echo $current_hours;

/* switch ($hours) { // but you could (perhaps should) use switch (true), since we are always comparing boolean values here
  
  case ($hours >= 0 and  $hours < 5):
    echo "Boa madruga fi";
    break;

  case ($hours >= 5 and $hours < 12):
    echo "Bom dia fi!";
    break;

  case ($hours >= 12 and $hours < 18):
    echo "Boa tarde meu fi";
    break;

  case ($hours >= 18 and $hours < 24):
    echo "Boa noite zé";
    break;

  # default is optional, we don't need to set it if we don't... need it, at all [?]
} */

// Example 2 - More than one case for each code block:

/*$d = -6;

# but let's convert it to 6 and display case 6
$d = abs($d);

switch ($d) {
  case 1:
  case 2:
  case 3:
  case 4:
  case 5:  
    echo "The weeks feels so long!";
    break;
  case 6:
  case 0:
    echo "Weekends are the best!";
    break;
  default:
    echo "Something is wrong and weird here";
} */


// Example 3: switch($variable) — when you want to match fixed values
/* $status = 'draft';

 switch ($status) {
  case 'draft':
    echo "This post is still being written.";
    break;
  case 'pending':
    echo "Waiting for review.";
    break;
  case 'published':
    echo "The post is live!";
    break;
  default:
    echo "Unknown post status.";
} */

// Example 4: switch(true) — when you want to evaluate conditions

/*
switch (true) {
  case is_admin():
    echo "You’re in the dashboard!";
    break;
  case is_page('pricing'):
    echo "Welcome to the pricing page.";
    break;
  case is_user_logged_in():
    echo "Hi there, member!";
    break;
  default:
    echo "Hello, visitor!";
} */

// ============================================
// SECTION 13: STAY IN THE LOOP MF!!!!!!!!!!!!!
// ============================================

# 13.1 WHILE

// Exercise 1 — Count from 1 to 5. Print the numbers 1 through 5, one per line. This is the most classic while-loop pattern: initialize → check condition → increment.


/* $x = 1;

while ($x < 6) {

  echo $x;
  $x++;
  
} */

// Exercise 2 — Count down from 10 to 1. Start at 10 and count backwards to 1.

/* $x = 10;

while ($x > 0) {

  echo $x;
  $x--;
} */



// Exercise 3 — Skip a specific number. Count from 1 to 10, but skip the number 4 using continue.

/* $i = 0;
while ($i < 6) {
  $i++;
  if ($i == 3) continue;  
  echo $i;
} */

// Exercise 4 and 5 - also practice break; and endwhile;

// which is the best number? Break on before it

/* $e = 0;

while ($e <= 12) {
  if ($e == 12) {
    echo $e;
    echo "<< ¡that's the BEST NUMBER EVER!. 13 sucks";    
    break;
  }
  echo $e;
  $e++;
}

*/

// try to use endwhile somehow....

/*$l = 10;
while ($l <= 100) : echo $l; $l+=10;

  endwhile; */

  # Exercise A — Fix the infinite loop. This code is broken. Fix it:
  
  /*  $a = 1;

    while ($a < 20) {
      if ($a == 10) : $a++; continue; endif;
      echo $a;
      $a++;
    } */



  # Exercise B — Use endwhile to loop backwards. Count from 50 down to 5, stepping by 5, using: while, endwhile and no for

/*    $uai = 50;
    while ($uai >= 5) :
      echo $uai;
      $uai = $uai - 5;

    endwhile;
*/

  # 13.2 DO... WHILE


  # Exercise 1 — Count up at least once. Write a do…while loop that: starts $x at 10, prints $x, increments $x and stops when $x is greater than 12. Even though the condition fails after a few steps, the code must run at least once.

  /*  $e = 10;

    do {
      echo $e;
      $e++;
    }
    while ($e <= 12); */



  # Exercise 2 — Retry until success. Simulate a "retry an API call" loop: Create $success = false, inside the loop, randomly set $success to true (hint: rand(1, 5) == 3). Print “Trying…”. Stop once $success becomes true. It MUST run once even if it succeeds immediately.

/*    $success = false;

    do {
      print "Trying...";
      $number = rand(0, 12);
      if ($number == 12) {
        $success = true;
      }
    }
    while ($success == false); */


# Exercise 3 — Skip a specific number. Use continue inside a do…while: Count from 1 to 7, but skip printing number 4. Still continue the loop normally. MUST increment before continue.

/* $e = 0;
do {
  echo $e;
  if ($e == 4) {
    $e++;
    continue;
    
  }
  $e++;
} while ($e <= 7); */

// SMALL BREAK FOR print_r x var_dump section

/* $data = array(
    'name' => 'John Doe',
    'age' => 30,
    'hobbies' => array('reading', 'hiking', 'coding')
);

echo "<h1>var_dump()</h1>";
echo "<pre>"; // Optional: for better formatting in a browser
var_dump($data);
echo "</pre>";


echo "<h1>print_r()</h1>";
echo "<pre>"; // Optional: for better formatting in a browser
print_r($data);
echo "</pre>";

$output_string = print_r($data, true);
echo "The output as a string: " . $output_string;
?> */

  # 13.3 FOR

  # Exercise 1 — Count Only Even Numbers. Print all even numbers between 2 and 20 using a for loop. Requirements: Use a for, only print even numbers and no if allowed inside the loop


 /* for ($e = 2; $e <= 20; $e+=2) {
    echo "$e <br>";
  } */

  # Exercise 2 — Stop at the First “Forbidden” Number. Simulate scanning link IDs from 1 to 15, but stop completely if you hit ID 9.
  
  /* Output example idea:
  Checking ID: 1
  Checking ID: 2
  ...
  Checking ID: 9 ← loop stops here
  
  Requirements:
  
  Use for
  
  Use break
  
  Print each step */

  /* for ($e = 1; $e <= 15; $e++) {

    if ($e > 9) {
      break;
    }
    echo "Checking ID: $e <br>";
    
  } */

  # Exercise 3 — Skip One, Process the Rest. Loop from 1 to 12, but skip number 7 and do NOT print it. Everything else should print normally.

  /* for ($e = 1; $e <= 12; $e++) {

    if ($e == 7) {
      continue;
    }
    print $e;
  } */

  # 13.4 FOR EACH

  // Exercise 1 — Sum Values of an Array. Given an array of numbers, loop through it with foreach and echo the total sum. Array: $nums = [10, 20, 5, 3, 2];

  /* $nums = [10, 20, 5, 3, 2];
  $e = 0;

  foreach ($nums as $x) {
    
    $e++;
  }

  echo $e; */

 // Exercise 2 — Skip One Value. Loop through: $colors = ["red", "green", "blue", "yellow"]; But do not print “blue”. Use continue.

 /* $colors = ["red", "green", "blue", "yellow"];

 foreach ($colors as $x) {
  if ($x == 'blue') {
    continue;
  }
  echo "$x <br>";
 } */

// Exercise 3 — Change One Value By Reference. Given: $statuses = ["active", "expired", "trial", "active"]; Change “trial” to “pending” using foreach by reference, then print the modified array.


/* $statuses = ["active", "expired", "trial", "active"];




// without byref
foreach ($statuses as $x) {
  if ($x == "trial") {
    $x = 'pending';
  }
}


var_dump($statuses);

echo "<br>";

// byref
foreach ($statuses as &$x) {
  if ($x == "trial") {
    $x = 'pending';
  }
}

var_dump($statuses);
# unset($x); - use unset() to break the reference from the previous byref foreach */

/* Exercise 1 — Find the First Active Membership

You have:

$memberships = [
  ['id' => 1, 'status' => 'expired'],
  ['id' => 2, 'status' => 'pending'],
  ['id' => 3, 'status' => 'active'],
  ['id' => 4, 'status' => 'active'],
];


Task:
Loop through and print only the ID of the first active membership, then stop immediately using break.

(If you’re doing it right, you should never even touch ID 4.) */

/* $memberships = [
  ['id' => 1, 'status' => 'expired'],
  ['id' => 2, 'status' => 'pending'],
  ['id' => 3, 'status' => 'active'],
  ['id' => 4, 'status' => 'active'],
];


foreach ($memberships as $item) {
  
  echo "Membership ID: {$item['id']}, Membership Status: {$item['status']} <br>";
  if ($item['status'] == 'active') {
    break;
  }
} */



/* curiosity: the following won't work because PHP doesn't know how to echo an array directly

foreach ($memberships as $x => $y) {
  echo "$x : $y";
} 


another example:
$test_array = array('1', '2', '3', '4');
echo $test_array;



To make this work:

// Option 1: Use print_r() inside the loop (quick debugging style)
/*foreach ($memberships as $x => $y) {
  echo "$x : ";
  print_r($y);
  echo "<br>";
}*/

// Option 2: Echo individual values (cleaner for real output)

/* foreach ($memberships as $item) {
   echo "ID: {$item['id']} - Status {$item['status']} <br>";
}
*/


/* Exercise 2 — Skip Non-Pretty Links

Given:

$links = ["google.com", "/go/course", "https://github.com", "/go/deals"];


Think of /go/... as Pretty Links.

Task:
Loop through the array and print only the Pretty Links.
Use continue to skip anything that does not start with /go/. */
 
/* $links = ["google.com", "/go/course", "https://github.com", "/go/deals"];

foreach ($links as $e) {
  if (substr($e, 0, 4) != '/go/') {
    continue;
  }  */
  /*or
  if (substr($e, 0, 4) != '/go/') {
    continue;
  }
  }
  echo $e;
} */


// ============================================
// SECTION 14: FUNCTIONS
// ============================================

# Exercise 1 - first ultra-simple exercise:
/* Create a function called sayHello() that returns the string "Hello, Euler!"
—not echo, RETURNS.
Then call the function and echo the result.
So your final output on the page should show:
Hello, Euler!

Try to write it now (and feel free to add your Canadian accent version if you want — “Hello, Euler, eh?”). */

/* function sayHelloTo ($name) {
  $e = "Hello $name, eh?";
  return $e;
}

echo sayHelloTo("Euler"); */

# Exercise 2 - default parameter values

/* 

Write a function called calcDiscount() that:

accepts one parameter: $amount
accepts one optional parameter: $rate (default 0.10 → 10% discount)
returns the discounted price

*/

/* function calcDiscount ($amount, $rate = 0.10) {
  $discountedPrice = $amount - ($amount * $rate);
  return $discountedPrice;
}

echo calcDiscount(100) . "<br>";
echo calcDiscount(100, 0.6); */

# Exercise 3 - parameter type hints

/* 

Create a function where:

name: square
accepts one integer
returns an integer (use : int after the function)
just returns the number squared

Then call it twice:

With 4 → should print 16
With "5" → should throw a TypeError because of strict types (that’s the point)

*/

/* function square(int $x) : int {
  $e = $x ** 2;
  return $e;
}

echo square(4);
echo square("5"); */

# Exercise 4 - pass-by-reference (&)

/*

Make a function called applyCoupon(). It receives a price by reference. It subtracts 20 from it. It returns nothing (just modifies the original)

Then echo the price outside to confirm the change

*/

/* function applyCoupon (&$price) {
  $price = $price - 20;
  return;
} 


$price = 32;
applyCoupon ($price);

echo $price;
*/

# Exercise 5 - strict types + multiple arguments + a clean return type

/*

Create a function called calcTotal() that:

expects two floats (price and tax)
returns a float
strict_types must be turned on
inside, calculate: total = price + (price * tax)
return that total

Call the function twice and echo the results

*/


/* function calcTotal(float $price, float $tax) : float {

  $total = $price + ($price * $tax);
  return $total;

}

echo calcTotal(10, 0.10);
echo "<br>";
echo calcTotal(120.12, 0.3);
*/

# Exercise 6 - variadic functions, but in the chill “Euler pace”, nothing dramatic


/*

Create a function called addAll() that:

accepts any number of numbers using ...$nums
sums all of them
returns the total

*/

/* function addAll(...$nums) {

  $e = 0;
  
  foreach ($nums as $x) {
    $e = $e + $x;
  }

  return $e;
}

echo addAll(1, 2, 3);
echo "<br>";
echo addAll(12, 100, 8);
*/

# Exercise 7 - mixed parameters + variadic


/*

Create a function called greetGroup() that takes:

a normal first argument: $greeting (like "Hello" or "Hey"),
then a variadic list: ...$names

Inside the function, build and return one single string that includes the greeting for each name.

*/

/* function greetGroup($greeting, ...$names) {

  $single_message = '';

  foreach ($names as $x) {
    $single_message = "$single_message $greeting, $x! ";
  }

  return $single_message;
}

echo greetGroup("Hello", "Euler", "Letícia", "Luma"); */


# Exercise 8 - FINAL substantial exercise

/* 

Create processMembers() with strict_types.

Parameters:
- int $minYear (default 2020)
- bool $addEligibleFlag (default false)  
- array &...$members (variadic, by reference)

Return: array

Filter members where status = 'active' AND joined >= $minYear.
If $addEligibleFlag is true, add 'eligible' => true to matched members (modifies originals).
Return array of filtered members.

Test data:
$member1 = ['name' => 'Alice', 'status' => 'active', 'joined' => 2021];
$member2 = ['name' => 'Bob', 'status' => 'inactive', 'joined' => 2022];
$member3 = ['name' => 'Carol', 'status' => 'active', 'joined' => 2019];
$member4 = ['name' => 'Dave', 'status' => 'active', 'joined' => 2023];


*/

/*
$m1 = ['name' => 'Alice', 'status' => 'active', 'joined' => 2021];
$m2 = ['name' => 'Bob', 'status' => 'inactive', 'joined' => 2022];
$m3 = ['name' => 'Carol', 'status' => 'active', 'joined' => 2019];
$m4 = ['name' => 'Dave', 'status' => 'active', 'joined' => 2023];

function processMembers(int $minYear = 2020, bool $addEligibleFlag = false, &...$members) : array {

  $results = [];

  foreach ($members as &$member) {
    if ($member['status'] == 'active' && $member['joined'] >= $minYear) {
      if ($addEligibleFlag === true) {

        $member['eligible'] = true;        

      }
    $results[] = $member;
    }
  }

  return $results;

}

$test = processMembers(2020, false, $m1, $m2, $m3, $m4);

print_r($test); */


// ============================================
// SECTION 15: ARRAYS
// ============================================

// intro

# Exercise 1 - arrays meet loops, a love story

/*
Create an array called $memberships with these statuses as strings:
"active", "expired", "active", "cancelled", "active", "pending"

Then:
1. Use count() to echo the total number of memberships
2. Create a variable $activeCount and manually count how many are "active" 
   using a foreach loop (check each one with an if statement)
3. Echo the active count
*/


/* $memberships = array("active", "expired", "active", "cancelled", "active", "pending");

#1

echo count($memberships);
echo "<br>";

#2

$activeCount = 0;

foreach ($memberships as $x) {
  if ($x == 'active') {
    $activeCount++ ;
  }

}

#3

echo $activeCount; */


# Exercise 2 - the gap filler

/*
Create an indexed array with these specific indexes and values:
$plugins[2] = "MemberPress"
$plugins[5] = "Pretty Links"  
$plugins[9] = "Affiliate Royale"

Then:
1. Echo the value at index 5
2. Use array_push() to add "Easy Affiliate" to the array
3. Use var_dump() to see the entire array and find what index "Easy Affiliate" got
4. Manually add a new plugin at index 15: "Popup Domination"
5. Use count() to see how many items are in the array (spoiler: it's NOT 16)
*/

/* $plugins[2] = "MemberPress";
$plugins[5] = "Pretty Links";  
$plugins[9] = "Affiliate Royale";

#1

echo $plugins[5];
echo "<br>";

#2

array_push($plugins, "Easy Affiliate");

#3

var_dump($plugins);
echo "<br>";

#4

$plugins[15] = "Popup Domination";

#5

echo count($plugins);
echo "<br>";
print_r($plugins); */

# Exercise 3 - the membership profile (welcome to real WordPress data)

/*
Create an associative array called $member with these keys and values:
'user_id' => 4729
'email' => 'euler@caseproof.com'
'status' => 'active'
'plan' => 'Pro Annual'
'expires' => '2025-12-31'

Then:
1. Echo just the email
2. Change the status to 'expired'
3. Add a new key 'last_login' with value '2024-11-28'
4. Loop through the entire array and display each key-value pair like:
   "user_id: 4729"
   "email: euler@caseproof.com"
   etc.
*/

$membership_profile = array("user_id" => 4729, "email" => "euler@caseproof.com", "status" => "active", "plan" => "Pro Annual", "expires" => "2024-11-28");

#1

echo $membership_profile["email"];
echo "<br>";
#2

$membership_profile["status"] = 'expired';

// print_r($membership_profile);

#3

$membership_profile["last_login"] = "2024-11-28";

// print_r($membership_profile);

#4

foreach ($membership_profile as $x => $y) {
  echo "$x : $y"; 
  echo "<br>";
}