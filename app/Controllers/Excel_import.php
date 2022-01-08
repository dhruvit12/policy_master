<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Excel_import extends BaseController
{
  public function __construct()
  {

  }
 function import()
 {
  if(isset($_FILES["file"]["name"]))
  {
   $path = $_FILES["file"]["tmp_name"];
   print_r($path);exit;
   $object = PHPExcel_IOFactory::load($path);
   foreach($object->getWorksheetIterator() as $worksheet)
   {
    $highestRow = $worksheet->getHighestRow();
    $highestColumn = $worksheet->getHighestColumn();
    for($row=2; $row<=$highestRow; $row++)
    {
     $customer_name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
     $address = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
     $city = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
     $postal_code = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
     $country = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
     $data[] = array(
      'CustomerName'  => $customer_name,
      'Address'   => $address,
      'City'    => $city,
      'PostalCode'  => $postal_code,
      'Country'   => $country
     );
    }
   }
}
?>
