<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Manage_bids extends BaseController
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
	$M_currency = new Models\CurrencyModel();
    $data['allcurrency'] = $M_currency->where(['is_active'=>1])->findAll();
    $M_occupation = new Models\ManagebidsModel();
    $M_occupation->select('manage_bids.*,currency.name');
    $M_occupation->join('currency', 'currency.id = manage_bids.currency_id','left');
    $data['list'] = $M_occupation->where(['manage_bids.is_active'=>1])->findAll();
    $data['page']='Manage_bids/list';
    echo view('templete',$data);
  }
   public function insert()
   {
   	  $M_occupation = new Models\ManagebidsModel();
      $M_occupation->insert($_POST);
      return redirect()->to(site_url('Manage_bids'));
   }
   public function view_client()
{
    $M_occupation = new Models\ManagebidsModel();
    $M_occupation->select('manage_bids.*,currency.name');
    $M_occupation->join('currency', 'currency.id = manage_bids.currency_id','left');
    $row = $M_occupation->where(['manage_bids.id'=>$_POST['id']])->findAll();
    echo json_encode($row);
}
	public function edit($id)
	{
	$M_occupation = new Models\ManagebidsModel();
    $M_occupation->select('manage_bids.*,currency.name');
    $M_occupation->join('currency', 'currency.id = manage_bids.currency_id','left');
    $data['occupation'] = $M_occupation->where(['manage_bids.id'=>$id])->first();
    $M_currency = new Models\CurrencyModel();
    $data['allcurrency'] = $M_currency->where(['is_active'=>1])->findAll();
    $data['page']='Manage_bids/edit';
    echo view('templete',$data);
	}
	public function update($id)
	{
	
	 $M_occupation = new Models\ManagebidsModel();
     $M_occupation->update($id,$_POST);
   
     return redirect()->to(site_url('Manage_bids'));
	}
	public function delete($id)
	{
	$M_borrower = new Models\ManagebidsModel();
    $M_borrower->where(['id'=>$id])->delete();
    return redirect()->to(site_url('Manage_bids'));
	}
  
}

?>
