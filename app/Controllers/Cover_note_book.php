<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Cover_note_book extends BaseController
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
   $M_service = new Models\Covernotebook_Model();
   $data['data'] = $M_service ->where(['is_deleted'=>0])->findAll();
   $data['page']='Cover_note_book/list';
   echo view('templete',$data);
 }
 public function insert()
 {
   $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");
  $M_service = new Models\Covernotebook_Model();
  $M_service->insert($_POST);
  $id=$M_service->insertID();
  $quotid=5000+$id;
  $update=array('supplier_id'=>$quotid);
  $M_currency = new Models\Covernotebook_Model();
  $row = $M_currency->where(['id'=>$id])->first();
  $M_currency->update($id, $update);
  return redirect()->to(site_url('Cover_note_book'));
}
public function view_client()
{
  $M_quotation = new Models\Covernotebook_Model();
  $row=$M_quotation->where('id',$_POST['id'])->first(); 
  echo json_encode($row);
}
public function edit($id)
{
 $M_quotation = new Models\Covernotebook_Model();
 $data['edit']=$M_quotation->where('id',$id)->first();
 $data['page']='Cover_note_book/edit';
 echo view('templete',$data);
}
public function update_record()
{
          $session=session();
      $session->setFlashdata('update', "Successfully Record Updated");

 $M_occupation = new Models\Covernotebook_Model();
 $M_occupation->update($_POST['id'],$_POST);
 return redirect()->to(site_url('Cover_note_book'));
}
public function delete($id)
{
  $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
    $_POST['is_deleted']=1;
 $M_borrower = new Models\Covernotebook_Model();
 $M_borrower->update($id,$_POST);
 return redirect()->to(site_url('Cover_note_book'));
}
public function changeStatus()
{
  $M_vehicle_type = new Models\Covernotebook_Model();
  $row=$M_vehicle_type->where('id',$_POST['id'])->first();
  if ($row['is_active'] == 0) {
    $trn = $M_vehicle_type->where('id', $_POST['id'])->set(['is_active' => 1])->update();
  }else {
    $trn = $M_vehicle_type->where('id', $_POST['id'])->set(['is_active' => 0])->update();
  }
  if ($trn) {
    echo $row['is_active'];
  }
}
public function fetch()
{
 $M_vehicle_type = new Models\Covernotebook_Model();
 $M_vehicle_type->like('supplier_name',$_POST['supplier_name']);
 $M_vehicle_type->like('phone_no',$_POST['mobile']);
 $M_vehicle_type->like('email',$_POST['email']);
 $data['data']=$M_vehicle_type->findAll();
 $data['page']='Cover_note_book/list';
 $data['datas']=$_POST;
 echo view('templete',$data);
}


}