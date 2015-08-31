<?php
/**
 * Created by PhpStorm.
 * User: dritzel
 * Date: 31/08/2015
 * Time: 09:46
 */

class cfgLoader{

    private $loadType = "";
    private $jsonFile = "";
    private $iniFile = "";
    private $fullPath = "";
    private $arrayFile = "";

    function cfgLoader($loadType, $jsonFile, $iniFile, $fullPath, $arrayFile){
        $this->loadType = ($loadType==null) ? "FULL" : $loadType;

        //Default file names or provided names
        $this->jsonFile = ($jsonFile==null) ? "config.json" : $jsonFile;
        $this->iniFile = ($iniFile == null) ?  "config.ini" : $iniFile;
        $this->arrayFile = ($arrayFile == null) ? "arraycfg.php" : $arrayFile;

        //Default folder for cfg files
        $this->fullPath = ($fullPath == null) ? "../cfg/" : $fullPath;
    }

    private function loadJson(){

    }

    private function loadIni(){

    }

    private function loadArray($arCfg){
        $fileArray = $this->fullPath.$this->arrayFile;
        if(file_exists($fileArray)){
            include_once($this->fullPath.$this->arrayFile);
            if(!empty($arCfg)) {
                $arKeys = array_keys($arCfg);
                for($i=0;$i<count($arCfg);$i++){
                    $this->__set($arKeys[0],$arCfg[0]);
                }
            }
        }
    }

    public function __get($setting) {
        $this->internalData[$setting];
    }
    public function __set($setting, $value) {
        $this->internalData[$setting] = $value;
    }

}