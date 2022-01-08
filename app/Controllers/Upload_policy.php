<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Upload_policy extends BaseController
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
		$M_insuranceclass = new Models\Upload_policy_Model();
		$M_insuranceclass->select('upload_policy.*,vehicle_insure_type.vehicle_insure_name,vehicle_insure_class.name');
        $M_insuranceclass->join('vehicle_insure_type','vehicle_insure_type.id = upload_policy.insurance_type_id','left');
        $M_insuranceclass->join('vehicle_insure_class','vehicle_insure_class.id = upload_policy.insurance_class_id','left');
		$data['list'] = $M_insuranceclass ->where(['upload_policy.is_active'=>1,'upload_policy.is_deleted'=>0])->findAll();
		$data['page']='Upload_policy/list';
		echo view('templete',$data);
	}
	public function upload()
	{

		 $path_parts = pathinfo($_POST['attached_by']);
		 $file=$path_parts['basename'];
         $data=array('insurance_type_id'=>$_POST['insurance_type_id'],'insurance_class_id'=>$_POST['insurance_class_id'],'name'=>$file);
		if(!empty($path_parts['basename']))
		{
			$datas = new Models\Upload_policy_Model();
			$datas->insert($data);
			return redirect()->to(site_url('Upload_policy'));
		}
		return redirect()->to(site_url('Upload_policy'));
     }
     public function delete($id)
     {
     	  $session=session();
          $session->setFlashdata('error', "Successfully Record Deleted");
     	  $_POST['is_deleted']=1;
          $M_insuranceClassInsert = new Models\Upload_policy_Model();
	      if($M_insuranceClassInsert->update($id,$_POST)){
	        return redirect()->to(site_url('Upload_policy'));
	      }
     }
}
?>

	
