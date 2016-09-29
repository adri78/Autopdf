<?php
/****************************************************************************************** */
/***************************  Configuracion  *************************************** */
/****************************************************************************************** */


define ('K_BLANK_IMAGE', '_blank.png');

define ('PDF_PAGE_FORMAT', 'A4');

define ('PDF_PAGE_ORIENTATION', 'P');

define ('PDF_CREATOR', 'escuela.digital');

define ('PDF_AUTHOR', 'escuela.digital');


define ('PDF_HEADER_TITLE', 'Manual ED GRID');

define ('PDF_HEADER_STRING', "por Álvaro Felipe - http://escuela.digital/edgrid\ncontacto@escuela.digital");


 $html =file_get_contents('http://escuela.digital/edgrid/docs');

/****************************************************************************************** */


// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Álvaro Felipe');
$pdf->SetTitle('Manual de EDGRID');
$pdf->SetSubject('Manual de EDGRID');
$pdf->SetKeywords('Manual de EDGRID');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 021', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/spa.php')) {
	require_once(dirname(__FILE__).'/lang/spa.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 9);

// add a page
$pdf->AddPage();




$pdf->writeHTML($html, true, 0, true, 0);

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('EDGRID.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
