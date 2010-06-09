<?php

require('config/config.inc');
require('config/header.inc');
require('config/top.inc');
require('useful.inc');
require('config/db.inc');
require('config/years.inc');

// we don't want to call common1.inc or we'll get an infinite loop of
// redirects.  Instead, we mostly duplicate the yearval code here.

// work out what year we're working with

$yeartext = "";
$yearval = "";
if (post_exists('yearval')) {
   $yearval = $_POST['yearval'];
}
if (get_exists('yearval')) {
   $yearval = $_GET['yearval'];
}
if ($yearval != "") {
   foreach (array_keys($valid_years) as $key) {
     if ($yearval == $valid_years[$key][0]) {

        $yeartext = $valid_years[$key][1];

     }
   }
} 

?>
<p>
The data for <?php echo "$yeartext"; ?> is not yet fully entered into
the database, and is therefore not necessarily self-consistent.  To
avoid confusion it is currently restricted access.
<p>
Please contact the teaching 
office if you believe you should be able to see it.
<p>
<a href="index.php">Click here to return to the teaching duties main page</a>.
</p>
<?php
require('config/footer.inc');
?>
