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
    private $internalData = "";

    /**
     *
     * Loads the config with optional parameters
     *
     * @param null $loadType Try to Loads all files or specific: JSON, INI OR ARRAY
     * @param null $jsonFile Name of the Json file
     * @param null $iniFile Name of the Ini file
     * @param null $fullPath Path to get the cfg files
     * @param null $arrayFile Name of the array file with $arCfg
     */
    function cfgLoader($loadType = null, $jsonFile = null, $iniFile = null , $fullPath = null, $arrayFile = null){
        $this->loadType = ($loadType==null) ? "ANY" : $loadType;

        //Default file names or provided names
        $this->jsonFile = ($jsonFile==null) ? "config.json" : $jsonFile;
        $this->iniFile = ($iniFile == null) ?  "config.ini" : $iniFile;
        $this->arrayFile = ($arrayFile == null) ? "arraycfg.php" : $arrayFile;

        //Default folder for cfg files
        $this->fullPath = ($fullPath == null) ? "../cfg/" : $fullPath;

        switch ($this->loadType){
            case "ANY":
                $this->loadJson();
                $this->loadIni();
                $this->loadArray();
                break;

            case "JSON":
                $this->loadJson();
                break;

            case "INI":
                $this->loadIni();
                break;

            case "ARRAY":
                $this->loadArray();
                break;
        }
    }

    /**
     * Load parameters from .json
     */
    private function loadJson(){
        if(file_exists($this->fullPath.$this->jsonFile)) {
            $arCfg = json_decode(file_get_contents($this->fullPath.$this->iniFile));
            $this->loadConfigs($arCfg);
        }
    }

    /**
     * Load parameters from .ini file
     */
    private function loadIni(){
        if(file_exists($this->fullPath.$this->iniFile)) {
            $arCfg = parse_ini_file($this->fullPath.$this->iniFile);
            $this->loadConfigs($arCfg);
        }
    }


    /**
     * Load values from default array
     */
    private function loadArray(){
        if(file_exists($this->fullPath.$this->arrayFile)){
            include_once($this->fullPath.$this->arrayFile);
            if(!empty($arCfg)){
                $this->loadConfigs($arCfg);
            }
        }
    }

    /**
     *
     * Load parameters from array
     * @param $arConfig array with parameters
     */
    private function loadConfigs($arConfig){
        print_r($arConfig);
        if(!empty($arConfig)) {
            $arKeys = array_keys($arConfig);
            for($i=0;$i<count($arConfig);$i++){
                $this->__set($arKeys[$i],$arConfig[$arKeys[$i]]);
            }
        }
    }

    /**
     *
     * Dynamic getter
     * @param $setting string with parameter name
     */
    public function __get($setting) {
        $this->internalData[$setting];
    }

    /**
     *
     * Dynamic setter
     *
     * @param $setting  string with parameter name
     * @param $value string with parameter value
     */
    public function __set($setting, $value) {
        $this->internalData[$setting] = $value;
    }
}