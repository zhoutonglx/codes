<?php
/*
 * author :     zhoutong   zhoutonglx@qq.com
 * date   :     2016/12/23
 * task   :     用php程序统计excel文档中每个指标出现了多少次？每个指标的访问量之和？ 
 */

require_once("./PHPExcel_1.8.0_doc/Classes/PHPExcel/IOFactory.php");

$file = file_get_contents("http://172.287.xlsx");
$fp = fopen("C:/Users/admin/Desktop/sample.xlsx","wb+");
fwrite($fp, $file);
fclose($fp);
$inputFileName = "C:/Users/admin/Desktop/sample.xlsx";
$objPhpExcel = PHPExcel_IOFactory::load($inputFileName);
$sheetData = $objPhpExcel->getActiveSheet()->toArray(null,true,true,true);
array_shift($sheetData);
$vis = array();
$cot = array();
foreach ($sheetData as $row) {
    $indexName = $row['A'];
    $cnt = $row['B']; //count
    if ( ! isset($cot[$indexName])) {
        $cot[$indexName] = 1;
        $vis[$indexName] = $cnt;
    } else {
        $cot[$indexName]++;
        $vis[$indexName] += $cnt;
    }
}

$objPhpExcel->setActiveSheetIndex(0)
            ->setCellValue("A15","indexname")
            ->setCellValue("B15","出现次数")
            ->setCellValue("C15","总浏览量");
$i = 16;
foreach ($vis as $name => $cnt) {
    $objPhpExcel->setActiveSheetIndex(0)
                ->setCellValue("A" . $i, $name)
                ->setCellValue("B" . $i, $cot[$name])
                ->setCellValue("C". $i, $cnt);
    ++$i;
}

$objWriter = PHPExcel_IOFactory::createWriter($objPhpExcel,'Excel2007');
$objWriter->save(str_replace('.php','.xlsx',__FILE__));