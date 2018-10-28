<?php
////////////////////////////////////////
// 1. spl_autoload_register(array($this, 'loader'))
///////////////////////////////////////


    class ClassAutoloader {
        public function __construct() {
            spl_autoload_register(array($this, 'loader'));
        }
        private function loader($className) {
            echo 'Trying to load ', $className, ' via ', __METHOD__, "()\n";
            include $className . '.php';
        }
    }

    $autoloader = new ClassAutoloader();

    $obj = new Class1();
    $obj = new Class2();

?>
Output:
--------
Trying to load Class1 via ClassAutoloader::loader()
Class1::__construct()
Trying to load Class2 via ClassAutoloader::loader()
Class2::__construct()


////////////////////////////////////////
// 2. str_replace ( mixed $search , mixed $replace , mixed $subject [, int &$count ] )
///////////////////////////////////////

<?php
$bodytag = str_replace("%body%", "black", "<body text='%body%'>");
// Provides: <body text='black'>

$vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
$onlyconsonants = str_replace($vowels, "", "Hello World of PHP");
// Provides: Hll Wrld f PHP

$phrase  = "You should eat fruits, vegetables, and fiber every day.";
$healthy = array("fruits", "vegetables", "fiber");
$yummy   = array("pizza", "beer", "ice cream");

$newphrase = str_replace($healthy, $yummy, $phrase);
// Provides: You should eat pizza, beer, and ice cream every day

$str = str_replace("ll", "", "good golly miss molly!", $count);
echo $count;
// Provides: 2
?>

////////////////////////////////////////
// 3. int strpos ( string $haystack , mixed $needle [, int $offset = 0 ] )
///////////////////////////////////////
<?php
$mystring = 'abc';
$findme   = 'a';
$pos = strpos($mystring, $findme);

// The !== operator can also be used.  Using != would not work as expected
// because the position of 'a' is 0. The statement (0 != false) evaluates
// to false.
if ($pos !== false) {
     echo "The string '$findme' was found in the string '$mystring'";
         echo " and exists at position $pos";
} else {
     echo "The string '$findme' was not found in the string '$mystring'";
}
?>

////////////////////////////////////////
// 4. string substr ( string $string , int $start [, int $length ] )
///////////////////////////////////////

<?php
echo substr('abcdef', 1);     // bcdef
echo substr('abcdef', 1, 3);  // bcd
echo substr('abcdef', 0, 4);  // abcd
echo substr('abcdef', 0, 8);  // abcdef
echo substr('abcdef', -1, 1); // f

// Accessing single characters in a string
// can also be achieved using "square brackets"
$string = 'abcdef';
echo $string[0];                 // a
echo $string[3];                 // d
echo $string[strlen($string)-1]; // f
?>

////////////////////////////////////////
// 4. string implode ( string $glue , array $pieces )
///////////////////////////////////////

<?php
$array = array('lastname', 'email', 'phone');
$comma_separated = implode(",", $array);

echo $comma_separated; // lastname,email,phone

// Empty string when using an empty array:
var_dump(implode('hello', array())); // string(0) ""
?>

////////////////////////////////////////
// 5. array explode ( string $delimiter , string $string [, int $limit = PHP_INT_MAX ] )
///////////////////////////////////////
<?php
// Example 1
$pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
$pieces = explode(" ", $pizza);
echo $pieces[0]; // piece1
echo $pieces[1]; // piece2

// Example 2
$data = "foo:*:1023:1000::/home/foo:/bin/sh";
list($user, $pass, $uid, $gid, $gecos, $home, $shell) = explode(":", $data);
echo $user; // foo
echo $pass; // *
?>

////////////////////////////////////////
// 6. array array_merge ( array $array1 [, array $... ] )
///////////////////////////////////////
<?php
$array1 = array("color" => "red", 2, 4);
$array2 = array("a", "b", "color" => "green", "shape" => "trapezoid", 4);
$result = array_merge($array1, $array2);
print_r($result);
?>
/* Result
Array
(
    [color] => green
    [0] => 2
    [1] => 4
    [2] => a
    [3] => b
    [shape] => trapezoid
    [4] => 4
)
*/

////////////////////////////////////////
// 7. bool sort ( array &$array [, int $sort_flags = SORT_REGULAR ] )
///////////////////////////////////////
/*
SORT_REGULAR - compare items normally (don't change types)
SORT_NUMERIC - compare items numerically
SORT_STRING - compare items as strings
SORT_LOCALE_STRING - compare items as strings, based on the current locale. It uses the locale, which can be changed using setlocale()
SORT_NATURAL - compare items as strings using "natural ordering" like natsort()
SORT_FLAG_CASE - can be combined (bitwise OR) with SORT_STRING or SORT_NATURAL to sort strings case-insensitively
*/
<?php
$fruits = array("lemon", "orange", "banana", "apple");
sort($fruits);
foreach ($fruits as $key => $val) {
    echo "fruits[" . $key . "] = " . $val . "\n";
}
?>
/*
fruits[0] = apple
fruits[1] = banana
fruits[2] = lemon
fruits[3] = orange
*/
