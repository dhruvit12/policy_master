<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Endorsement_insurer extends BaseController
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
    $M_endorsement = new Models\EndorsementModel();
    $M_endorsement->select('endorsement.*,branch_details.branch_name,insurance_company.insurance_company,clients.client_name,insurance_quotation.date_to,insurance_quotation.date_from,insurance_quotation.insured_name,insurance_quotation.covering_details,insurance_quotation.current_balance');
    $M_endorsement->join('insurance_quotation', 'insurance_quotation.id = endorsement.quot_id');
    $M_endorsement->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id','left');
    $M_endorsement->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
    $M_endorsement->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
    $data['list'] = $M_endorsement->where(['endorsement.is_deleted'=>0])->findAll();
    $M_endorsementType = new Models\EndorsementTypeModel();
    $data['endorsementType'] = $M_endorsementType->where(['is_deleted'=>0,'is_active'=>1])->findAll();
    $data['page']='endorsement/list_insurer';
    echo view('templete',$data);
  }
  public function issue_endorsement()
  {

   $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }
    $M_endorsement = new Models\EndorsementModel();
    $row = $M_endorsement->where('id',$_POST['id'])->first();
    if ($row['type'] == 3) {
      $M_ChangeOwnership = new Models\ChangeOwnershipModel();
      $change_ownership = $M_ChangeOwnership->where('id',$row['change_ownership_id'])->first();
      $M_Creditnote = new Models\CreditnoteModel();
      $M_Creditnote->set('client_id',$change_ownership['new_client_id'])->where('quot_id',$change_ownership['quot_id'])->update();
      $M_quotation = new Models\QuotationModel();
      $M_quotation->set('fk_client_id',$change_ownership['new_client_id'])->where('id',$change_ownership['quot_id'])->update();
      $InsuranceClassInsert = new Models\InsuranceClassInsertModel();
      $InsuranceClassInsert->set('client_id',$change_ownership['new_client_id'])->where('quot_id',$change_ownership['quot_id'])->update();
      $M_Vehicle_Insure_Class_Insert = new Models\Vehicle_Insure_Class_Insert_Model();
      $M_Vehicle_Insure_Class_Insert->set('client_id',$change_ownership['new_client_id'])->where('quot_id',$change_ownership['quot_id'])->update();
      $LifeInsuranceClassInsert = new Models\LifeInsuranceClassInsertModel();
      $LifeInsuranceClassInsert->set('client_id',$change_ownership['new_client_id'])->where('quot_id',$change_ownership['quot_id'])->update();
      $M_endorsement = new Models\EndorsementModel();
      $M_endorsement->set('status',1)->where('id',$row['id'])->update();
      echo $_POST['id'];
    }
  }
  public function delete($id)
  {
    
   $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }
    $_POST['is_deleted']=1;
    $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
    $M_endorsement = new Models\EndorsementModel();
     $M_endorsement->update($id,$_POST);
      return redirect()->to(site_url('Endorsement_insurer'));
  }
}

?>
