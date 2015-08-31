<?php
/**
 * Created by PhpStorm.
 * User: dipievil
 * Date: 31/08/2015
 * Time: 12:45
 *
 * File for testing the class
 */

    include 'class/class.phpcfgloader.php';

    $cfg = new cfgLoader();
    //$cfg = new cfgLoader("JSON"); //Loads only json config file
    //$cfg = new cfgLoader("INI"); //Loads only ini config file
    //$cfg = new cfgLoader("ARRAY"); //Loads the default $arCfg

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
