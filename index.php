<?php
/**
 * Created by PhpStorm.
 * User: dritzel
 * Date: 31/08/2015
 * Time: 12:45
 *
 * File for testing the class
 */

    include 'class/class.phpcfgloader.php';


    $cfg = new cfgLoader();
?>

<html>
<head>

</head>
<body>

<?php
echo "Name (from json file): ".$cfg->Name."<br />\n\n";
echo "Age (from ini file): ".$cfg->age."<br />\n\n";
echo "Street (from array): ".$cfg->street."<br />\n\n";

?>
</body>

</html>
