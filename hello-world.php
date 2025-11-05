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
// SECTION 5: STRINGS AND NUMBERS
// ============================================