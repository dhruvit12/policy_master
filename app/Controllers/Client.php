<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;
class Client extends BaseController
{
  public function __construct()
  {
       helper(['form', 'url']);
  }

  public function index()
  {
    $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }
   $M_client = new Models\ClientModel();
   $data['list'] = $M_client->where(['is_deleted'=>0])->findAll();
   $M_client_type = new Models\Client_typeModel();
   $data['client_type'] = $M_client_type->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_businesstype = new Models\BusinessTypeModel();
   $data['business_type'] = $M_businesstype->where(['is_deleted'=>0])->findAll();
   $data['page']='client/list';

   echo view('templete',$data);
 }
 public function search_client()
 {
  $data['search_data']=array('client_name'=>$_POST['client_name'],
                             'client_type'=>$_POST['client_type'],
                             'business_type'=>$_POST['business_type'],
                             'mobile_no'=>$_POST['mobile_no'],
                             'status'=>$_POST['status']);
  $M_client_type = new Models\Client_typeModel();
  $data['client_type'] = $M_client_type->where(['is_deleted'=>0])->findAll();
  $M_businesstype = new Models\BusinessTypeModel();
  $data['business_type'] = $M_businesstype->where(['is_deleted'=>0])->findAll();
  $M_client = new Models\ClientModel();
  $M_client->like('client_name',$_POST['client_name']);
  $M_client->like('client_type',$_POST['client_type']);
  $M_client->like('business_type',$_POST['business_type']);
  $M_client->like('mobile_number',$_POST['mobile_no']);
  $M_client->like('status',$_POST['status']);
  $data['list'] = $M_client->where(['is_deleted'=>0])->findAll();
  $data['page']='client/list';
 
  echo view('templete',$data);
}

public function client_type()
{
  $session = session();
  if (!isset($_SESSION['userdata'])) {
   return redirect()->to(site_url('auth'));
 }
    // print_r($data); exit;
 $M_client_type = new Models\Client_typeModel();
 $data['client_type'] = $M_client_type->where(['is_deleted'=>0])->findAll();
 $data['page']='client/masterlist';
 echo view('templete',$data);
}

public function store_client_type()
{
 
  $post = $this->request->getVar();
   $session=session();
  $session->setFlashdata('update',"Successfully Record Inserted");
  $M_client_type = new Models\Client_typeModel();
  $M_client_type->insert($_POST);
  return redirect()->to(site_url('client/client_type'));
}
public function delete_client_type($id)
{
   $session=session();
   $session->setFlashdata('error',"Successfully Record Deleted");
   $M_client_type = new Models\Client_typeModel();
   $_POST['is_deleted']=1;
   if ($M_client_type->update($id, $_POST)) {
    return redirect()->to(site_url('client/client_type'));
   }
}
public function edit_client_type(){
   $session=session();
  $session->setFlashdata('update', "Successfully Record Updated");
  $M_client_type = new Models\Client_typeModel();
  $M_client_type->update($_POST['id'],$_POST);
  return redirect()->to(site_url('client/client_type'));
}

public function changeStatus()
{
  $M_client_type = new Models\Client_typeModel();
  $row=$M_client_type->where('id',$_POST['id'])->first();
  if ($row['is_active'] == 0) {
    $trn = $M_client_type->where('id', $_POST['id'])->set(['is_active' => 1])->update();
  }else {
    $trn = $M_client_type->where('id', $_POST['id'])->set(['is_active' => 0])->update();
  }
  if ($trn) {
    echo $row['is_active'];
  }
}

public function view_client()
{

  $M_client = new Models\ClientModel();
 // $row = $M_client->first();
  $row = $M_client->where(['id'=>$_POST['id']])->first();
  $row['tel_no']=explode(',',$row['tel_no']);
  $row['tel_no1']=$row['tel_no'][0];
  $row['tel_no2']=$row['tel_no'][1];
  $row['tel_no3']=$row['tel_no'][2];
  $row['mobile_number']=explode(',',$row['mobile_number']);
  $row['mobile_number1']=$row['mobile_number'][0];
  $row['mobile_number2']=$row['mobile_number'][1];
  $row['mobile_number3']=$row['mobile_number'][2];
  $row['email']=explode(',',$row['email']);
  $row['email1']=$row['email'][0];
  $row['email2']=$row['email'][1];
  $row['email3']=$row['email'][2];
  $row['preferred_system_notice'] = ($row['preferred_system_notice'] == null)?"":$row['preferred_system_notice'];
  echo json_encode($row);
}

public function store_client()
{
   helper(['form', 'url']);
        $inputs = $this->validate([
            'client_name' => 'required|min_length[5]',
            'email1' => 'required|valid_email',
            'mobile_number1' => 'required|numeric|regex_match[/^[0-9]{10}$/]',
        ]);
        if (!$inputs) {
           // $data["validation"] = $validation->getErrors();
           return redirect()->to(site_url('client'));
        }
        else
        {
            $insert=$_POST;
            $insert['preferred_system_notice']=isset($update['notice'])?implode(',',$update['notice']):"";
            $insert['email']= array($_POST['email1'],$_POST['email2'],$_POST['email3']);
            $insert['email']=implode(',',$insert['email']);
            $insert['tel_no']= array($_POST['tel-no1'],$_POST['tel-no2'],$_POST['tel-no3']);
            $insert['tel_no']=implode(',',$insert['tel_no']);
            $insert['mobile_number']= array($_POST['mobile_number1'],$_POST['mobile_number2'],$_POST['mobile_number3']);
            $insert['mobile_number']=implode(',',$insert['mobile_number']);
            $unset=array('email1','email2','email3','tel-no1','tel-no2','tel-no3','mobile-number1','mobile-number2','mobile-number3','notice');
            foreach ($insert as $key => $value) {
              if (in_array($key,$unset)) {
                unset($insert[$key]);
              } 
            }
            $M_client = new Models\ClientModel();
            if ($M_client->insert($insert)) {
              $lastid=$M_client->insertID();
              $clientId=$lastid+5000;
              $insert['client_name']=$insert['title'].' '.$insert['client_name'];
              $M_clientRequest = new Models\ClientRequestModel();
              $M_clientRequest->insert(['client_id'=>$lastid,'client_name'=>$insert['client_name'],'status'=>0]);
              $M_client->update($lastid,['client_id'=>$clientId]);
              $session=session();
              $session->setFlashdata('update', "Successfully Record Inserted");
            }
            if (isset($_POST['quot'])) {
              $session = session();
             return redirect()->to($_POST['quot']);
            }else {
              return redirect()->to(site_url('client'));
            }
        }
            
}

public function update_client()
{
  $session=session();
  $session->setFlashdata('update', "Successfully Record Updated");
  $update=$_POST;
  //  echo "<pre>";print_r($update);exit;
  $update['preferred_system_notice']= isset($update['notice'])?$update['notice']:"";
  $update['email']= array($_POST['email1'],$_POST['email2'],$_POST['email3']);
  $update['email']=implode(',',$update['email']);
  $update['tel_no']= array($_POST['tel-no1'],$_POST['tel-no2'],$_POST['tel-no3']);
    //print_r($update['tel_no']);exit;
  $update['tel_no']=implode(',',$update['tel_no']);
  $update['mobile_number']= array($_POST['mobile_number1'],$_POST['mobile_number2'],$_POST['mobile_number3']);
  $update['mobile_number']=implode(',',$update['mobile_number']);
  $unset=array('email1','email2','email3','tel_no1','tel_no2','tel_no3','mobile_number1','mobile_number2','mobile_number3','notice');
  foreach ($update as $key => $value) {
    if (in_array($key,$unset)) {
      unset($update[$key]);
    }
  }
    // echo '<pre>'; print_r($update); exit;
  $M_client = new Models\ClientModel();
  if ($M_client->update($_POST['id'],$update)) {
  }
  return redirect()->to(site_url('client'));
}
public function delete_client($id)
{
   $session=session();
    $session->setFlashdata('delete', "Successfully Record Deleted");
  $M_client = new Models\ClientModel();
  $_POST['is_deleted']=1;
  if ($M_client->update($id, $_POST)) {
   return redirect()->to(site_url('client'));
 }
}

public function get_client()
{
  $M_client = new Models\ClientModel();
  $row = $M_client->where(['id'=>$_POST['id']])->first();
  echo json_encode($row);
}
public function edit($id)
{
  $M_businesstype = new Models\BusinessTypeModel();
  $data['business_type'] = $M_businesstype->where(['is_deleted'=>0])->findAll();
  $M_client = new Models\ClientModel();
  $data['list'] = $M_client->where('id',$id)->first();
  // echo "<pre>";print_r($data['list']);exit;
  $data['page']='client/edit';
  echo view('templete',$data);
}
public function search()
{
  $data['datas']=array('client_type'=>$_POST['client_type'],'description'=>$_POST['description']);
  $M_user_role = new Models\Client_typeModel();
  $M_user_role->like('client_type',$_POST['client_type']);
  $M_user_role->like('description',$_POST['description']);
  $data['list'] = $M_user_role->where(['is_deleted'=>0])->findAll();
  $data['page']='client/masterlist';
  echo view('templete',$data);
}
}
