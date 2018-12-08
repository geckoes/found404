<?php
class Webpage {

	public function __construct() {
    	die("You cannot use this class. It's a static class");
    }
    
	public static function getOpenPage() {
    	echo "<!DOCTYPE html>\n";
        echo "  <html lang=\"it\">";
    }
    
    public static function getClosePage() {
    	echo "</html>";
    }
}
