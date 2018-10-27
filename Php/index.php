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
