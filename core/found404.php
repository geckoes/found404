<?php
require_once("core/classes/webpage.php");
class Found404 {

	const CFG_FILE = "config.php";
	private $main_page = "";
	private $message_alert = "";
    private $warning = "";

	function start() {
	    	Webpage::getOpenPage();
		if (file_exists(self::CFG_FILE)) {
			$fh = fopen($newfile, 'a');
			fwrite($fh, 'd');
			$this->main_page = "html/index.php";
		} else {
			$this->main_page = "core/html/installation/inst_db.php";
		}
		return $this->main_page;

	}

	function setMainPage($url) {
	    	$this->main_page = $url;
    }
	function getMainpage() {
		return $this->main_page;
	}
    function setWarning($string_warning) {
    		echo ($string_warning);
	    	$this->warning = $warning;
    }
    function getWarning() {
	    	return $this->warning;
    }
    function getClosePage() {
    		Webpage::getClosePage();
    }
}
