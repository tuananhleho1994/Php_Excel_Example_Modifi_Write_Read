<?php
error_reporting(E_ALL);
date_default_timezone_set('Europe/London');
require_once 'PHPExcel/PHPExcel/IOFactory.php';
require_once 'PHPExcel/PHPExcel.php';

$objReader = PHPExcel_IOFactory::createReader('Excel2007');

//we load the file that we want to read

$objPHPExcel = $objReader->load("data.xlsx");

//we change the file

$objPHPExcel->getActiveSheet()
->setCellValue('E1','EEEEEEEEE')
->setCellValue('A2','DDDDDDDDDDDD')
->setCellValue('E3','CCCCCCCCC')
->setCellValue('E4','BBBBBBBBBB')
->setCellValue('E5','AAAAAAAAAAAAA')
->setCellValue('E29','MaitrePylos');


//we create a new file
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

//we save
$objWriter->save('coco.xlsx');
?>