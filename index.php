<?php 
//luu cac thong tin member vao file excel
// http://stackoverflow.com/questions/27659170/laravel-excel-php-excel-import-modify-download
// http://www.widecodes.com/CxVVggeggk/laravel-excelphp-excel-import-modify-download.html
require_once 'PHPExcel/PHPExcel.php';
$objPHPExcel = new PHPExcel();

$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A1', 'Tên')
->setCellValue('B1', 'Email')
->setCellValue('C1', 'Số điện thoại');

$lists = array(
		array(
				'name' => 'Nobita',
				'email' => 'nobitacnt@gmail.com',
				'phone' => '0123.456.789',
		),
		array(
				'name' => 'Xuka',
				'email' => 'xuka@gmail.com',
				'phone' => '0222.333.444',
		),
		array(
				'name' => 'Chaien',
				'email' => 'chaien@gmail.com',
				'phone' => '0111.333.444',
		),
);

$i = 2;
foreach ($lists as $row)
{
	$objPHPExcel->setActiveSheetIndex(0)
	->setCellValue('A'.$i, $row['name'])
	->setCellValue('B'.$i, $row['email'])
	->setCellValue('C'.$i, $row['phone']);
	$i++;
}
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$full_path = 'data.xlsx';	
$objWriter->save($full_path);
?> 


	
	
