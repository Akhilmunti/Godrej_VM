<?php
/*
* Author: onlinecode
* start Pdf.php file
* Location: ./application/libraries/Pdf.php
*/

 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //error_reporting(E_ALL);

//require_once dirname(__FILE__) . '\TCPDF-main\examples\tcpdf_include.php' or die("exiting"); 
require_once dirname(__FILE__) . '/TCPDF-main/examples/tcpdf_include.php' ; 

require_once dirname(__FILE__) . '/TCPDF-main/tcpdf.php';
 

class Pdf extends TCPDF
{
function __construct()
{
parent::__construct();
}
}
/* end Pdf.php file */