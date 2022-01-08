<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Daily_Transaction extends BaseController
{
  public function __construct()
  {
  }
  public function index()
  {
    $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }
   // $M_quotation = new Models\CaptureReceiptModel();
   // $M_quotation->select('capture_receipt.*,insurance_quotation.date_from,insurance_quotation.debitnoteno,insurance_quotation.vat_amount,insurance_quotation.debitnoteno,insurance_quotation.vat_amount,insurance_quotation.total_receivable');
   // $M_quotation->join('insurance_quotation', 'insurance_quotation.id = capture_receipt.quot_id','left');
   // $data['list'] = $M_quotation->where('insurance_quotation.date_from',date("m/d/Y"))->findAll();
   $M_quotation = new Models\DirectPaymentnewModel();
   $M_quotation->select('direct_payment1.*,insurance_company.insurance_company,insurance_quotation.debitnoteno,insurance_quotation.vat_amount,insurance_quotation.total_receivable');
   $M_quotation->join('insurance_company', 'insurance_company.id = direct_payment1.company_id','left');
   $M_quotation->join('insurance_quotation', 'insurance_quotation.id = direct_payment1.quot_id','left');
   $M_quotation->where('direct_payment1.date >=',date("Y-m-d"));
   $M_quotation->where('direct_payment1.date <=',date("Y-m-d"));
   $data['list'] = $M_quotation->where(['direct_payment1.is_active'=>1,'direct_payment1.is_deleted'=>0])->findAll();
   //echo "<pre>";print_r($M_quotation->getLastQuery()->getQuery());exit;
   //echo "<pre>";print_r($data['list']);exit;
   $data['page']='Daily_Transaction/list';
   echo view('templete',$data);
 }
 public function view_client()
 {
  $M_quotation = new Models\DirectPaymentnewModel();
  $M_quotation->select('direct_payment1.*,insurance_company.insurance_company,insurance_quotation.vat_amount,insurance_quotation.debitnoteno,insurance_quotation.total_receivable');
  $M_quotation->join('insurance_company', 'insurance_company.id = direct_payment1.company_id','left');
  $M_quotation->join('insurance_quotation', 'insurance_quotation.id = direct_payment1.quot_id','left');
  $row=$M_quotation->where('direct_payment1.id',$_POST['id'])->first(); 
  $row['created_at']=date("h:i:s",strtotime($row['created_at']));
  echo json_encode($row);
}
public function search()
{
   $data['search_data']=array('date_from'=>$_POST['date_from'],'date_to'=>$_POST['date_to']);
   $M_quotation = new Models\DirectPaymentnewModel();
   $M_quotation->select('direct_payment1.*,insurance_company.insurance_company,insurance_quotation.debitnoteno,insurance_quotation.vat_amount,insurance_quotation.total_receivable');
   $M_quotation->join('insurance_company', 'insurance_company.id = direct_payment1.company_id','left');
   $M_quotation->join('insurance_quotation', 'insurance_quotation.id = direct_payment1.quot_id','left');
   $M_quotation->where('direct_payment1.date >=',$_POST['date_from']);
   $M_quotation->where('direct_payment1.date <=',$_POST['date_to']);
   $data['list'] = $M_quotation->where(['direct_payment1.is_active'=>1,'direct_payment1.is_deleted'=>0])->findAll();
  // echo "<pre>";print_r($M_quotation->getLastQuery()->getQuery());exit;
   $data['page']='Daily_Transaction/list';
   echo view('templete',$data);
}
// public function view_client()
// {
//    $M_quotation = new Models\DirectPaymentnewModel();
//    $M_quotation->select('direct_payment1.*,insurance_company.insurance_company,insurance_quotation.debitnoteno,insurance_quotation.vat_amount,insurance_quotation.total_receivable');
//    $M_quotation->join('insurance_company', 'insurance_company.id = direct_payment1.company_id','left');
//    $M_quotation->join('insurance_quotation', 'insurance_quotation.id = direct_payment1.quot_id','left');
//    $row=$M_quotation->where('direct_payment1.id',$_POST['id'])->first(); 
//    echo json_encode($row);
// }
}