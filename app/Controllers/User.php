<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;
class User extends BaseController
{
  public function __construct()
	{
    // $this->checkLogin();
	}

	public function index()
	{
    $session = session();
    if (!isset($_SESSION['userdata'])) {
			return redirect()->to(site_url('auth'));
		}
    $M_branch = new Models\BranchModel();
    $data['branch'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();

    $M_role = new Models\User_RoleModel();
    $data['role'] = $M_role->where(['is_active'=>1,'is_deleted'=>0])->findAll();

    $M_user = new Models\UserModel();
    $M_user->select('tbl_user_maintenance.*,role.role_type');
    $M_user->join('role', 'role.id = tbl_user_maintenance.fk_role_id','left');
    $data['list'] = $M_user->where(['tbl_user_maintenance.is_deleted'=>0])->findAll();
    // echo "<pre>"; print_r($data['list']); exit;
    $data['page']='user/list';
		echo view('templete',$data);
  }

  public function store_user()
  {
      // echo "<pre>"; print_r($_POST); exit;
      $insert=$_POST;
      $insert['limit_branch_access']=isset($insert['limit_branch_access'])?$insert['limit_branch_access']:0;
      $settings=array(
        'override_rate'=>0,
        'risk_note_changes'=>0,
        'override_receipt'=>0,
        'quote_footer'=>0,
        'override_commission'=>0,
        'override_approval'=>0,
        'requires_4_Eye'=>0,
        'all_access'=>0,
        'reassign_sticker'=>0,
      );
      foreach ($settings as $key => $value) {
        if (isset($insert[$key])) {
          $settings[$key]=1;
        }
      }
      $insert['settings']=json_encode($settings);
      $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");
      $M_user = new Models\UserModel();
      $M_user->insert($insert);
      return redirect()->to(site_url('user'));
    }

  public function update_user()
  {
      // echo "<pre>"; print_r($_POST); exit;
      $update=$_POST;
      $update['limit_branch_access']=isset($update['limit_branch_access'])?$update['limit_branch_access']:0;
      $settings=array(
        'override_rate'=>0,
        'risk_note_changes'=>0,
        'override_receipt'=>0,
        'quote_footer'=>0,
        'override_commission'=>0,
        'override_approval'=>0,
        'requires_4_Eye'=>0,
        'all_access'=>0,
        'reassign_sticker'=>0,
      );
      foreach ($settings as $key => $value) {
        if (isset($update[$key])) {
          $settings[$key]=1;
        }
      }
      $update['settings']=json_encode($settings);
          $session=session();
      $session->setFlashdata('update', "Successfully Record Updated");

      $M_user = new Models\UserModel();
      $M_user->update($_POST['id'],$update);
      return redirect()->to(site_url('user'));
  }
  public function insurance_class_access()
  {
    $session = session();
    if (!isset($_SESSION['userdata'])) {
			return redirect()->to(site_url('auth'));
		}
    $M_user = new Models\UserModel();
    $M_user->select('tbl_user_maintenance.*,insurance_class_access.insurance_class_id');
    $M_user->join('insurance_class_access', 'insurance_class_access.fk_user_id = tbl_user_maintenance.id','left');
    $data['users'] = $M_user->where(['tbl_user_maintenance.is_deleted'=>0,'tbl_user_maintenance.status'=>1])->findAll();

    $M_insuranceclass = new Models\InsuranceClassModel();
    $data['insuranceclass']=$M_insuranceclass->where(['is_deleted'=>0,'is_active'=>1])->findAll();
    // echo "<pre>"; print_r($data); exit;
    $data['page']='user/insurance_class_access';
		echo view('templete',$data);
  }
  public function search_insurance_class_access()
  {
    $data['data']=array('user_code'=>$_POST['User_Code'],'user_name'=>$_POST['User_Name']);
    $M_user = new Models\UserModel();
    $M_user->select('tbl_user_maintenance.*,insurance_class_access.insurance_class_id');
    $M_user->join('insurance_class_access', 'insurance_class_access.fk_user_id = tbl_user_maintenance.id','left');
    $M_user->like('tbl_user_maintenance.user_code',$_POST['User_Code']);
    $M_user->like('tbl_user_maintenance.user_name',$_POST['User_Name']);
    $data['users'] = $M_user->where(['tbl_user_maintenance.is_deleted'=>0,'tbl_user_maintenance.status'=>1])->findAll();

    $M_insuranceclass = new Models\InsuranceClassModel();
    $data['insuranceclass']=$M_insuranceclass->where(['is_deleted'=>0,'is_active'=>1])->findAll();
    // echo "<pre>"; print_r($data); exit;
    $data['page']='user/insurance_class_access';
    echo view('templete',$data);
  }
  public function search_user()
  {
    $data['search_data']=array('user_name'=>$_POST['user_name'],'user_code'=>$_POST['user_code'],'status'=>$_POST['status']);
    $M_branch = new Models\BranchModel();
    $data['branch'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();

    $M_role = new Models\User_RoleModel();
    $data['role'] = $M_role->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_user = new Models\UserModel();
    $M_user->select('tbl_user_maintenance.*,role.role_type');
    $M_user->join('role', 'role.id = tbl_user_maintenance.fk_role_id','left');
    $M_user->like('tbl_user_maintenance.user_code',$_POST['user_code']);
    $M_user->like('tbl_user_maintenance.user_name',$_POST['user_name']);
    $M_user->like('tbl_user_maintenance.status',$_POST['status']);
    $data['list'] = $M_user->where(['tbl_user_maintenance.is_deleted'=>0])->findAll();
    $data['page']='user/list';
    echo view('templete',$data);

  }
  public function client_access()
  {
    $session = session();
    if (!isset($_SESSION['userdata'])) {
			return redirect()->to(site_url('auth'));
		}
    $M_user = new Models\UserModel();
    $M_user->select('tbl_user_maintenance.*,insurance_class_access.insurance_class_id');
    $M_user->join('insurance_class_access', 'insurance_class_access.fk_user_id = tbl_user_maintenance.id','left');
    $data['users'] = $M_user->where(['tbl_user_maintenance.is_deleted'=>0,'tbl_user_maintenance.status'=>1])->findAll();

    $M_client = new Models\ClientModel();
    $data['client'] = $M_client->where(['status'=>1,'is_deleted'=>0])->findAll();
    // echo "<pre>"; print_r($data); exit;
    $data['page']='user/client_access';
		echo view('templete',$data);
  }

  public function update_insurance_class_access()
  {
        $session=session();
      $session->setFlashdata('update', "Successfully Record Updated");

    $update = $_POST;
    if (isset($update['insurance_class_id'])) {
      $update['insurance_class_id']=implode(',',$update['insurance_class_id']);
    }else {
      $update['insurance_class_id'] = '';
    }
    $M_insuranceclassaccess = new Models\InsuranceClassAccessModel();
    $isExist = $M_insuranceclassaccess->where(['fk_user_id'=>$update['fk_user_id']])->first();
    if ($isExist) {
      $M_insuranceclassaccess->update($isExist['id'],$update);
    }else {
      $M_insuranceclassaccess->insert($update);
    }
    return redirect()->to(site_url('user/insurance_class_access'));
  }
  public function insert_client()
  {
     $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");

    $M_clientaccess = new Models\ClientAccessModel();
    $insert = array(
      'user_id'=>$_POST['id'],
      'client_id'=>$_POST['cid']
    );
    if ($M_clientaccess->insert($insert)) {
      echo "success";
    }
  }
  public function getClinteList()
  {
    $M_clientaccess = new Models\ClientAccessModel();
    $M_clientaccess->select('client_access.*,clients.client_name');
    $M_clientaccess->join('clients', 'clients.id = client_access.client_id');
    $data = $M_clientaccess->where(['client_access.user_id'=>$_POST['id'],'client_access.is_deleted'=>0])->findAll();
    $trs = ''; $i=1;
    foreach ($data as $key) {
      $trs.='<tr>
              <td>'.$i++.'</td>
              <td>'.$key['client_name'].'</td>
              <td><button type="button" class="btn btn-danger btn-sm" onclick="deleteClientAccess('.$key['id'].')"> <i class="fa fa-trash" aria-hidden="true"></i></button></td>
            </tr>';
    }
    echo $trs;
  }
  public function delete_client_access()
  {



    $M_clientaccess = new Models\ClientAccessModel();
    $_POST['is_deleted']=1;
    if ($M_clientaccess->update($_POST['id'], $_POST)) {
       $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
      echo $_POST['id'];
    }
  }
  public function get_user()
  {
    $M_user = new Models\UserModel();
    $row = $M_user->where(['id'=>$_POST['id'],'is_deleted'=>0])->first();
    // $row = $M_client->where(['id'=>$_POST['id']])->first();
    echo json_encode($row);
  }
}
