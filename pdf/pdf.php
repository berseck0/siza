<?php

$kual=$_GET['k'];
if($kual=="1"){
    // get the HTML
    ob_start();
    include(dirname(__FILE__).'/res/cobro.php');
   // include(dirname(__FILE__).'/res/exemple07b.php');
    $content = ob_get_clean();

    // convert to PDF
    require_once(dirname(__FILE__).'/html2pdf cobro.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'es');
       $html2pdf->pdf->SetDisplayMode('fullwidth');
		//$html2pdf->pdf->SetProtection(array('print'), 'spipu'); contraseña alos pdf 
		//$html2pdf->pdf->setPrintHeader(false);
		$html2pdf->pdf->setPrintFooter(false);
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('SIZA LAB.pdf');
        
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
    }
    else
    {
    // get the HTML
    ob_start();
    include(dirname(__FILE__).'/res/exemple07a.php');
   // include(dirname(__FILE__).'/res/exemple07b.php');
    $content = ob_get_clean();

    // convert to PDF
    require_once(dirname(__FILE__).'/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es');
        $html2pdf->pdf->SetDisplayMode('fullwidth');
//      $html2pdf->pdf->SetProtection(array('print'), 'spipu');
		$html2pdf->pdf->setPrintFooter(false);
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('SIZA LAB.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }}
