<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Performance_monitoring extends BaseController
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
      $data['page']='performance_monitoring/list';
      $M_quotation = new Models\QuotationModel();
      $M_quotation->select('insurance_quotation.*,branch_details.branch_name,clients.client_name,capture_receipt.risk_note_no,insurance_company.insurance_company');
      $M_quotation->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id','left');
      $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
      $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id','left');
      $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
      $data['list'] = $M_quotation->where(['insurance_quotation.is_active'=>1,'insurance_quotation.is_deleted'=>0])->findAll();
  // echo "<pre>"; print_r($data['list']); exit;
  		echo view('templete',$data);
  }
  public function search()
  {
      $data['datas']=array('risk_note_no'=>$_POST['risk_note_no'],'insured_name'=>$_POST['insured_name'],'date'=>$_POST['date']);
      $M_quotation = new Models\QuotationModel();
      $M_quotation->select('insurance_quotation.*,branch_details.branch_name,clients.client_name,capture_receipt.risk_note_no,insurance_company.insurance_company');
      $M_quotation->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id','left');
      $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
      $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id','left');
      $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
      $M_quotation->like('capture_receipt.risk_note_no',$_POST['risk_note_no']);
      $M_quotation->like('insurance_quotation.insured_name',$_POST['insured_name']);
      $M_quotation->like('insurance_quotation.date_from',$_POST['date']);
      $data['list']= $M_quotation->where(['insurance_quotation.is_active'=>1,'insurance_quotation.is_deleted'=>0])->findAll();
     //  echo "<pre>";print_r($data['list']);exit;
      $data['page']='performance_monitoring/list';
      echo view('templete',$data);
 }
}

?>
