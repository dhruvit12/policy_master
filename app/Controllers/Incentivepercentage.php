<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Incentivepercentage extends BaseController
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
    $M_broker_details = new Models\Broker_DetailsModel();
    $data['brokers'] = $M_broker_details->where(['is_deleted'=>0])->findAll();

    $data['page']='incentivepercentage/list';
    $M_incentivepercentage = new Models\IncentivePercentageModel();
    // $data['incentivepercentage'] = $M_incentivepercentage->where(['is_deleted'=>0,'is_active'=>1])->findAll();
    $M_incentivepercentage->select('incentive_percentage.*,broker_details.company_name');
    $M_incentivepercentage->join('broker_details','incentive_percentage.broker_id = broker_details.id');
    $data['incentivepercentage'] = $M_incentivepercentage->where(['incentive_percentage.is_deleted'=>0])->findAll();
    // echo "<pre>"; print_r($data); exit;
    echo view('templete',$data);
  }

  public function store_incentivepercentage()
  {
     $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");

    $M_incentivepercentage = new Models\IncentivePercentageModel();
    $M_incentivepercentage->insert($_POST);
    return redirect()->to(site_url('incentivepercentage'));
  }

  public function update_incentivepercentage(){
                 $session=session();
      $session->setFlashdata('update', "Successfully Record Updated");
    $M_incentivepercentage = new Models\IncentivePercentageModel();
    $M_incentivepercentage->update($_POST['id'],$_POST);
    return redirect()->to(site_url('incentivepercentage'));
  }

  public function delete_incentivepercentage($id)
  {
    $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
    $M_incentivepercentage = new Models\IncentivePercentageModel();
    $_POST['is_deleted']=1;
    if ($M_incentivepercentage->update($id, $_POST)) {
     return redirect()->to(site_url('incentivepercentage'));
    }
  }
  public function changeStatus()
  {
    $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");

    $M_incentivepercentage = new Models\IncentivePercentageModel();
    $row=$M_incentivepercentage->where('id',$_POST['id'])->first();
    if ($row['is_active'] == 0) {
      $trn = $M_incentivepercentage->where('id', $_POST['id'])->set(['is_active' => 1])->update();
    }else {
      $trn = $M_incentivepercentage->where('id', $_POST['id'])->set(['is_active' => 0])->update();
    }
    if ($trn) {
      echo $row['is_active'];
    }
  }
}
?>
