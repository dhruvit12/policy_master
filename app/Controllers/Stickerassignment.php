<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Stickerassignment extends BaseController
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
    $M_vehicle_insure_type = new Models\Vehicle_Insure_Type();
    $data['vehicle_insure_type'] = $M_vehicle_insure_type->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_branch = new Models\BranchModel();
    $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_insuranceClass = new Models\InsuranceClassModel();
    $data['insuranceClass'] = $M_insuranceClass->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_insurancecompany = new Models\InsuranceCompanyModel();
    $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_stickerassignment = new Models\StickerAssignmentModel();
    $M_stickerassignment->select('sticker_assignment.*,branch_details.branch_name,insurance_company.insurance_company,vehicle_insure_type.vehicle_insure_name');
    $M_stickerassignment->join('insurance_company', 'insurance_company.id = sticker_assignment.insurance_company_id','left');
    $M_stickerassignment->join('branch_details', 'branch_details.id = sticker_assignment.branch_id','left');
    $M_stickerassignment->join('vehicle_insure_type', 'vehicle_insure_type.id = sticker_assignment.insurance_type','left');
    $data['list'] = $M_stickerassignment->where(['sticker_assignment.is_deleted'=>0])->findAll();
    $data['page']='stickerassignment/list';
    // print_r($data); exit;
    echo view('templete',$data);
  }
  public function store_stickerassignment()
  {
     $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");

    $M_stickerassignment = new Models\StickerAssignmentModel();
    $M_stickerassignment->insert($_POST);
    return redirect()->to(site_url('stickerassignment'));
  }

  public function edit_stickerassignment(){
        $session=session();
      $session->setFlashdata('update', "Successfully Record Updated");

      $M_stickerassignment = new Models\StickerAssignmentModel();
      $M_stickerassignment->update($_POST['id'],$_POST);
      return redirect()->to(site_url('stickerassignment'));
    }

  public function delete_stickerassignment($id)
    {
       $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
      $M_stickerassignment = new Models\StickerAssignmentModel();
      $_POST['is_deleted']=1;
      if ($M_stickerassignment->update($id, $_POST)) {
     return redirect()->to(site_url('stickerassignment'));
       
      }
    }

  public function changeStatus()
      {
        $M_stickerassignment = new Models\StickerAssignmentModel();
          $row=$M_stickerassignment->where('id',$_POST['id'])->first();
          if ($row['is_active'] == 0) {
            $trn = $M_stickerassignment->where('id', $_POST['id'])->set(['is_active' => 1])->update();
          }else {
            $trn = $M_stickerassignment->where('id', $_POST['id'])->set(['is_active' => 0])->update();
          }
          if ($trn) {
            echo $row['is_active'];
          }
      }
      public function search()
      {
          $M_vehicle_insure_type = new Models\Vehicle_Insure_Type();
          $data['vehicle_insure_type'] = $M_vehicle_insure_type->where(['is_active'=>1,'is_deleted'=>0])->findAll();
          $M_branch = new Models\BranchModel();
          $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
          $M_insuranceClass = new Models\InsuranceClassModel();
          $data['insuranceClass'] = $M_insuranceClass->where(['is_active'=>1,'is_deleted'=>0])->findAll();
          $M_insurancecompany = new Models\InsuranceCompanyModel();
          $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
          $data['search_data']=array('insured_name'=>$_POST['insured_name'],
                                     'branch_name'=>$_POST['branch_name'],
                                     'vehicle_insure_type'=>$_POST['vehicle_insure_type'],
                                     'status'=>$_POST['status']);
          $M_stickerassignment = new Models\StickerAssignmentModel();
          $M_stickerassignment->select('sticker_assignment.*,branch_details.branch_name,insurance_company.insurance_company,vehicle_insure_type.vehicle_insure_name');
          $M_stickerassignment->join('insurance_company', 'insurance_company.id = sticker_assignment.insurance_company_id','left');
          $M_stickerassignment->join('branch_details', 'branch_details.id = sticker_assignment.branch_id','left');
          $M_stickerassignment->join('vehicle_insure_type', 'vehicle_insure_type.id = sticker_assignment.insurance_type','left');
          $M_stickerassignment->like('sticker_assignment.insurance_company_id',$_POST['insured_name']);
          $M_stickerassignment->like('sticker_assignment.branch_id',$_POST['branch_name']);
          $M_stickerassignment->like('sticker_assignment.insurance_type',$_POST['vehicle_insure_type']);
          $M_stickerassignment->like('sticker_assignment.status',$_POST['status']);
          $data['list'] = $M_stickerassignment->where(['sticker_assignment.is_deleted'=>0])->findAll();
          //echo "<pre>";print_r($data['list']);exit;
          $data['page']='stickerassignment/list';
          echo view('templete',$data);
      }
}

?>
