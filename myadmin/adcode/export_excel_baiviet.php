<?php
    include "plugins/PHPExcel-1.8/Classes/PHPExcel.php";
 
    $excel = new PHPExcel();
    $excel->setActiveSheetIndex(0);
    $excel->getActiveSheet()->setTitle('FILE EXPORT '.date('d-m-Y'));

    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);

    $excel->getActiveSheet()->getStyle('A1:E1')->getFont()->setBold(true);

    $excel->getActiveSheet()->setCellValue('A1', 'Mã hàng');
    $excel->getActiveSheet()->setCellValue('B1', 'Tên hàng hóa');
    $excel->getActiveSheet()->setCellValue('C1', 'Giá bán');
    $excel->getActiveSheet()->setCellValue('D1', 'Giá khuyến mãi');
    $excel->getActiveSheet()->setCellValue('E1', 'Áp dụng khuyến mãi');

    $danhsach = DB_fet("*", "`#_baiviet`","`step` = '$step'","`id` DESC");
    $numRow = 2;
    while ($r = mysql_fetch_assoc($danhsach)) {
        $excel->getActiveSheet()->setCellValue('A'.$numRow, $r['id_import_data']);
        $excel->getActiveSheet()->setCellValue('B'.$numRow, $r['tenbaiviet_vi']);
        $excel->getActiveSheet()->setCellValue('C'.$numRow, $r['giatien']);
        $excel->getActiveSheet()->setCellValue('D'.$numRow, $r['giakm']);
        $excel->getActiveSheet()->setCellValue('E'.$numRow, $r['opt_km']);
        $numRow++;
    }

    $fileName = "File_export_".date('d-m-Y H:i:s', time()).".xlsx";
    header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="'.$fileName.'"');
    PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');

?>