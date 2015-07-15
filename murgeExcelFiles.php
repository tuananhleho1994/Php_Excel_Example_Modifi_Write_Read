<?php
require_once 'PHPExcel/PHPExcel/IOFactory.php';
require_once 'PHPExcel/PHPExcel.php';

// $file1="Excel_01.xlsx";
// $file2="Excel_02.xlsx";
// $outputFile = "final.xlsx";

// // Files are loaded to PHPExcel using the IOFactory load() method
// $objPHPExcel1 = PHPExcel_IOFactory::load($file1);
// $objPHPExcel2 = PHPExcel_IOFactory::load($file2);

// // Copy worksheets from $objPHPExcel2 to $objPHPExcel1
// foreach($objPHPExcel2->getAllSheets() as $sheet) {
//     $objPHPExcel1->addExternalSheet($sheet);
// }

// // Save $objPHPExcel1 to browser as an .xls file
// $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel1, "Excel5");
// header("Content-Type: application/vnd.ms-excel");
// header("Content-Disposition: attachment; filename=$outputFile");
// header("Cache-Control: max-age=0");
// $objWriter->save('php://output');

$inputFileType1 = 'Excel2007';
$inputFileName1 = 'Excel_01.xlsx';

$inputFileType2 = 'Excel2007';
$inputFileName2 = 'Excel_02.xlsx';

$inputFileType3 = 'Excel2007';
$inputFileName3 = 'Excel_03.xlsx';

$outputFileType = 'Excel2007';
$outputFileName = 'outputData.xlsx';

// Load the first workbook (an xlsx file)
$objPHPExcelReader1 = PHPExcel_IOFactory::createReader($inputFileType1);
$objPHPExcel1 = $objPHPExcelReader1->load($inputFileName1);

// Load the second workbook (an xls file)
$objPHPExcelReader2 = PHPExcel_IOFactory::createReader($inputFileType2);
$objPHPExcel2 = $objPHPExcelReader2->load($inputFileName2);

// Load the second workbook (an xls file)
$objPHPExcelReader3 = PHPExcel_IOFactory::createReader($inputFileType3);
$objPHPExcel3 = $objPHPExcelReader3->load($inputFileName3);

// Merge the second workbook into the first
$objPHPExcel2->getActiveSheet()->setTitle('file_02');
$objPHPExcel1->addExternalSheet($objPHPExcel2->getActiveSheet());

$objPHPExcel3->getActiveSheet()->setTitle('file_03');
$objPHPExcel1->addExternalSheet($objPHPExcel3->getActiveSheet());

// Save the merged workbook under a new name (could save under the original name)
// as an xls file
$objPHPExcelWriter = PHPExcel_IOFactory::createWriter($objPHPExcel1,$outputFileType);
$objPHPExcelWriter->save($outputFileName);
?>
<a href="outputData.xlsx">Download file</a>