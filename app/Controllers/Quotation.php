<?php namespace App\Controllers;
use App\Models;
class Quotation extends BaseController
{
    public function __construct()
    {
        $this->session = session();
    }

    public function index()
    {
        $session = session();
        if (!isset($_SESSION['userdata'])) {
            return redirect()->to(site_url('auth'));
        }

//         header('Content-Type:application/json; charset=utf8');
//         $consumerKey = 'D6ckQeVYhI4Fm1SA8nQENTuADHUa1soD';
//         $consumerSecret = 'cPqfvAA7QIJ4mnCs';
//         $headers = ['Content-Type:application/json; charset=utf8'];
//         $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
//         $curl = curl_init($url);
//         curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//         curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
//         curl_setopt($curl, CURLOPT_HEADER, FALSE);
//         curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
//         $curl_response = curl_exec($curl);
//         $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//         // echo "<pre>";print_r($curl_response);exit;
//         //check if authorization is ok
//         if($status == 200){
//         //Comment out the line below incase you want to get the full response
//         //echo $curl_response;
//         //decode response and extract access token(optional) use this block incase you want to get the access token directly
//         $data = json_decode($curl_response,true);
//         //fetch access token from response
//         $access_token = $data['access_token'];
//         echo $access_token;
//         } else {
//         //return error if authorization fails
//         $error = array(
//         'response' => "Invalid Credentials. Check your consumer key and secret",
//         'status code' => $status
//         );
//         echo json_encode($error,JSON_PRETTY_PRINT);
//         }
//         curl_close($curl); 
// exit;
        $M_quotation = new Models\QuotationModel();
        $M_quotation->select('insurance_quotation.*,branch_details.branch_name,clients.client_name,insurance_type.insurance_type_name');
        $M_quotation->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id', 'left');
        $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id', 'left');
        $M_quotation->join('insurance_type', 'insurance_type.id = insurance_quotation.fk_insurance_type_id', 'left');
        
        $M_quotation->orderby('insurance_quotation.id', 'desc');
        
        $data['quotation'] = $M_quotation->where(['insurance_quotation.is_deleted' => 0,'insurance_quotation.is_active' => 1])->findAll();
       // echo "<pre>";print_r($data['quotation']);exit;
        $M_insuranceType       = new Models\InsuranceTypeModel();
        $data['insuranceType'] = $M_insuranceType->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_currency            = new Models\CurrencyModel();
        $data['currencies']    = $M_currency->where(['is_active' => 1])->findAll();
        $M_issuerbank          = new Models\IssuerBankModel();
        $data['issuer_bank']   = $M_issuerbank->where(['is_deleted' => 0, 'is_active' => 1])->findAll();
        $data['page']          = 'quotation/list';
        echo view('templete', $data);
    }
    public function get_vat()
    {
        $branch_id=$_POST['branch_id'];
        $M_branch                 = new Models\BranchModel();
        $M_branch->select('vat');
        $branch         = $M_branch->where('id',$branch_id)->first();
        // echo "<pre>";print_r($M_branch->getLastQuery()->getQuery());
        echo json_encode($branch);

    }
    public function add_quatation($id)
    {
        $M_insuranceType = new Models\InsuranceTypeModel();
        $data            = $M_insuranceType->where(['id' => $id])->first();
        if($data['main'] == 1) {
            return redirect()->to(site_url('quotation/add_general_quatation/' . $data['id']));
        } elseif ($data['main'] == 2) {
            return redirect()->to(site_url('quotation/add_vehicle_quatation/' . $data['id']));
        } elseif ($data['main'] == 3) {
            return redirect()->to(site_url('quotation/add_life_quatation/' . $data['id']));
        } elseif ($data['main'] == 4) {
            return redirect()->to(site_url('quotation/add_medical_quatation/' . $data['id']));
        }
    }
    public function add_general_quatation($type)
    {
        //echo "<pre>";print_r($_POST);exit;
        $session = session();
        if (!isset($_SESSION['userdata'])) {
            return redirect()->to(site_url('auth'));
        }
        $data['insurance_type']   = $type;
        $M_client                 = new Models\ClientModel();
        $data['client']           = $M_client->where(['status' => 1, 'is_deleted' => 0])->findAll();
        $M_currency               = new Models\CurrencyModel();
        $data['currencies']       = $M_currency->where(['is_active' => 1])->findAll();
        $M_branch                 = new Models\BranchModel();
        $data['branches']         = $M_branch->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_businesstype           = new Models\BusinessTypeModel();
        $data['businesstype']     = $M_businesstype->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_insurancecompany       = new Models\InsuranceCompanyModel();
        $data['insurancecompany'] = $M_insurancecompany->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $data['token']            = uniqid() . time();
        // $data['token'] = "5f8ff3e57704f1603269605";
        $M_insuranceClass       = new Models\InsuranceClassModel();
        $data['insuranceClass'] = $M_insuranceClass->where(['insurance_type_id' => $type, 'is_active' => 1, 'is_deleted' => 0])->findAll();

        $M_borrower       = new Models\BorrowerModel();
        $data['borrower'] = $M_borrower->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        // echo "<pre>"; print_r($data); exit;
        $data['page'] = 'quotation/add';
        echo view('templete', $data);
    }
    public function add_life_quatation($type)
    {
        $session = session();
        if (!isset($_SESSION['userdata'])) {
            return redirect()->to(site_url('auth'));
        }
        $data['insurance_type']   = $type;
        $M_client                 = new Models\ClientModel();
        $data['client']           = $M_client->where(['status' => 1, 'is_deleted' => 0])->findAll();
        $M_currency               = new Models\CurrencyModel();
        $data['currencies']       = $M_currency->where(['is_active' => 1])->findAll();
        $M_branch                 = new Models\BranchModel();
        $data['branches']         = $M_branch->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_businesstype           = new Models\BusinessTypeModel();
        $data['businesstype']     = $M_businesstype->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_insurancecompany       = new Models\InsuranceCompanyModel();
        $data['insurancecompany'] = $M_insurancecompany->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $data['token']            = uniqid() . time();
        $M_borrower               = new Models\BorrowerModel();
        $data['borrower']         = $M_borrower->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        // echo "<pre>"; print_r($data); exit;
        $data['page'] = 'quotation/add3';
        echo view('templete', $data);
    }
    public function add_medical_quatation($type)
    {
        $session = session();
        if (!isset($_SESSION['userdata'])) {
            return redirect()->to(site_url('auth'));
        }
        $data['insurance_type']   = $type;
        $M_client                 = new Models\ClientModel();
        $data['client']           = $M_client->where(['status' => 1, 'is_deleted' => 0])->findAll();
        $M_currency               = new Models\CurrencyModel();
        $data['currencies']       = $M_currency->where(['is_active' => 1])->findAll();
        $M_branch                 = new Models\BranchModel();
        $data['branches']         = $M_branch->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_businesstype           = new Models\BusinessTypeModel();
        $data['businesstype']     = $M_businesstype->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_insurancecompany       = new Models\InsuranceCompanyModel();
        $data['insurancecompany'] = $M_insurancecompany->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $data['token']            = uniqid() . time();
        $M_borrower               = new Models\BorrowerModel();
        $data['borrower']         = $M_borrower->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_insuranceClass         = new Models\InsuranceClassModel();
        $data['insuranceClass']   = $M_insuranceClass->where(['insurance_type_id' => $type, 'is_active' => 1, 'is_deleted' => 0])->findAll();
        // print_r($data['insuranceClass']);exit;
        $data['page'] = 'quotation/add4';
        echo view('templete', $data);
    }
    public function get_client()
    {
        $M_client = new Models\ClientModel();
        $row      = $M_client->where(['id' => $_POST['id']])->first();
        echo json_encode($row);
    }
    public function get_currency()
    {
        $M_client = new Models\CurrencyModel();
        $row      = $M_client->where(['id' => $_POST['id']])->first();
        echo json_encode($row);
    }
    public function add_vehicle_quatation($type)
    {
        $session = session();
        if (!isset($_SESSION['userdata'])) {
            return redirect()->to(site_url('auth'));
        }
        //echo $type;exit;
        $data['insurance_type']          = $type;
        $M_client                        = new Models\ClientModel();
        $data['client']                  = $M_client->where(['status' => 1, 'is_deleted' => 0])->findAll();
        $M_currency                      = new Models\CurrencyModel();
        $data['currencies']              = $M_currency->where(['is_active' => 1])->findAll();
        $M_branch                        = new Models\BranchModel();
        $data['branches']                = $M_branch->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_businesstype                  = new Models\BusinessTypeModel();
        $data['businesstype']            = $M_businesstype->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_insurancecompany              = new Models\InsuranceCompanyModel();
        $data['insurancecompany']        = $M_insurancecompany->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_excessbenefitsdiscounts       = new Models\ExcessBenefitsDiscounts();
        $data['excessbenefitsdiscounts'] = $M_excessbenefitsdiscounts->first();
        $M_vehicle_insure_type           = new Models\Vehicle_Insure_Type();
        $data['vehicle_insure_type']     = $M_vehicle_insure_type->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_vehicle_maker                 = new Models\Vehicle_MakerModel();
        $data['vehicle_maker']           = $M_vehicle_maker->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_vehicle_type                  = new Models\VehicleModel();
        $data['vehicle_type']            = $M_vehicle_type->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $data['token']                   = uniqid() . time();
        $M_borrower       = new Models\BorrowerModel();
        $data['borrower'] = $M_borrower->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        // $data['token'] = "5fae8df0a737b1605275120";

        $data['page'] = 'quotation/add2';
        echo view('templete', $data);
    }

    public function view_vehicle_quatation($id)
    {
        $session = session();
        if (!isset($_SESSION['userdata'])) {
            return redirect()->to(site_url('auth'));
        }
        $data['insurance_type']          = $id;
        $M_client                      = new Models\ClientModel();
        $data['client']                = $M_client->where(['status' => 1, 'is_deleted' => 0])->findAll();
        $M_currency                    = new Models\CurrencyModel();
        $data['currencies']            = $M_currency->where(['is_active' => 1])->findAll();
        $M_branch                      = new Models\BranchModel();
        $data['branches']              = $M_branch->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_businesstype                = new Models\BusinessTypeModel();
        $data['businesstype']          = $M_businesstype->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_insurancecompany            = new Models\InsuranceCompanyModel();
        $data['insurancecompany']      = $M_insurancecompany->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_borrower                    = new Models\BorrowerModel();
        $data['borrower']              = $M_borrower->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_quotation                   = new Models\QuotationModel();
        $data['quotation']             = $M_quotation->where('id', $id)->first();
       // echo "<pre>";print_r($data['quotation']);exit;
        $M_excessbenefitsdiscounts       = new Models\ExcessBenefitsDiscounts();
        $data['excessbenefitsdiscounts'] = $M_excessbenefitsdiscounts->first();
        $M_vehicle_insure_type           = new Models\Vehicle_Insure_Type();
        $data['vehicle_insure_type']     = $M_vehicle_insure_type->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_vehicle_maker                 = new Models\Vehicle_MakerModel();
        $data['vehicle_maker']           = $M_vehicle_maker->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_vehicle_type                  = new Models\VehicleModel();
        $data['vehicle_type']            = $M_vehicle_type->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $data['token']                   = uniqid() . time();
        $M_vehicleInsuranceClassInsert = new Models\Vehicle_Insure_Class_Insert_Model();
        $data['vehicle']                           = $M_vehicleInsuranceClassInsert->where(['quot_id'=>$id])->findAll();
      //  echo "<pre>":print_r($data['vehicle']);exit;
        $total_premium=0;
        $sticker_other_fee=0;
        $vat_amount=0;
        $ph_guaranty_fund=0;
        $training_insurance_levy = 0;
        $stamp_duty=0;
        $withhold_tax=0;
        $total_receivable=0;
        $commission_rate=0;
        $broker_commission=0;
        $vat_on_commission=0;
        $insurer_settlement=0;
        $discount_on_commission=0;
        $discount_commission=0;
        $final_receivable=0;
        $vat_amount=0;
        foreach($data['vehicle'] as $vehicle)
        {
        $total_premium=$total_premium + $vehicle['total_premium'];  
        $sticker_other_fee=$sticker_other_fee + $vehicle['sticker_other_fee'];  
        $vat_amount = $vat_amount + $vehicle['vat_amount'];  
        $ph_guaranty_fund = $ph_guaranty_fund +$vehicle['ph_guaranty_fund'];
        $training_insurance_levy = $training_insurance_levy + $vehicle['training_insurance_levy'];
        $stamp_duty =$stamp_duty + $vehicle['stamp_duty'];
        $withhold_tax = $withhold_tax + $vehicle['withhold_tax'];
        $total_receivable = $total_receivable + $vehicle['total_receivable'];
        $commission_rate = $commission_rate + $vehicle['commission_rate'];
        $broker_commission = $broker_commission + $vehicle['broker_commission'];
        $vat_on_commission = $vat_on_commission + $vehicle['vat_on_commission'];
        $insurer_settlement = $insurer_settlement + $vehicle['insurer_settlement'];
        $discount_on_commission = $discount_on_commission + $vehicle['discount_on_commission'];
        $discount_commission = $discount_commission + $vehicle['discount_commission'];
        $final_receivable = $final_receivable + $vehicle['final_receivable'];
        $vat_amount= $vat_amount +$vehicle['vat_amount'];
        $M_vehicleInsuranceClassInserts = new Models\InsuranceClassModel();
        $data['insurance_class']= $M_vehicleInsuranceClassInserts->where(['id'=>$vehicle['insurance_type_id']])->first();
        }
        $data['total_premium']=$total_premium;
        $data['sticker_other_fee']=$sticker_other_fee;
        $data['vat_amount']= $vat_amount;
        $data['ph_guaranty_fund']=$ph_guaranty_fund;
        $data['training_insurance_levy']=$training_insurance_levy;
        $data['stamp_duty']=$stamp_duty;
        $data['withhold_tax']=$withhold_tax;
        $data['total_receivable']=$total_receivable;
        $data['commission_rate']=$commission_rate;
        $data['broker_commission']=$broker_commission;
        $data['vat_on_commission']=$vat_on_commission;
        $data['insurer_settlement']=$insurer_settlement;
        $data['discount_on_commission'] =$discount_on_commission;
        $data['discount_commission']= $discount_commission;
        $data['final_receivable'] = $final_receivable;
        $data['vat_amount']=$vat_amount;
        $M_vehicleInsuranceClassInsert = new Models\Vehicle_Insure_Class_Insert_Model();
        // $data = $M_vehicleInsuranceClassInsert->where('token',$_POST)->findAll();
        $M_vehicleInsuranceClassInsert->select('vehicle_insurance_class_insert.*,vehicle_insure_class.name as insurance_class_name');
        $M_vehicleInsuranceClassInsert->join('vehicle_insure_class', 'vehicle_insure_class.id = vehicle_insurance_class_insert.insurance_class_id');
        $data['insertpaneltb'] = $M_vehicleInsuranceClassInsert->where(['vehicle_insurance_class_insert.quot_id' => $id, 'vehicle_insurance_class_insert.is_added' => 1])->findAll();
        $data['page']          = 'quotation/display2';
        echo view('templete', $data);
    }

    public function store_quatation()
    {
         // echo "<pre>";print_r($_POST);exit;
        // $session=session();
        // $session->setFlashdata('update', "Successfully Record Inserted");
        $insert = $_POST;
        unset($insert['token']);
        $brokercommission = $_POST['total_receivable'] * 12.5 / 100;  


        $M_quotation = new Models\QuotationModel();
        if ($M_quotation->insert($insert)) {
            $lastid = $M_quotation->insertID();
            $quotid = 2000 + $lastid;
            $M_quotation->update($lastid, ['quotation_id' => $quotid,'broker_commission'=>$brokercommission,'commission_percentage'=>12.5]);
            $M_insuranceClassInsert = new Models\InsuranceClassInsertModel();
            $M_insuranceClassInsert->set(['quot_id' => $lastid, 'is_added' => 1, 'client_id' => $_POST['fk_client_id']]);
            $M_insuranceClassInsert->where('token', $_POST['token']);
            $M_insuranceClassInsert->update();
            return redirect()->to(site_url('quotation'));
        }
    }
    public function life_store_quatation()
    {
      //  echo "<pre>";print_r($_POST);exit;
        $insert = $_POST;
        $M_quotation = new Models\QuotationModel();
        if ($M_quotation->insert($insert)) {
            $lastid = $M_quotation->insertID();
            $quotid = 2000 + $lastid;
            $M_quotation->update($lastid,['quotation_id' => $quotid]);
            $M_insuranceClassInsert = new Models\LifeInsurancequotationModel();
            $M_insuranceClassInsert->set(['quot_id' => $lastid, 'client_id' => $_POST['fk_client_id']]);
            $M_insuranceClassInsert->where('token', $_POST['token']);
            $M_insuranceClassInsert->update();
            $M_insuranceClassInsert = new Models\Life_insurance_second_quotation();
            $M_insuranceClassInsert->set(['quot_id' => $lastid, 'client_id' => $_POST['fk_client_id']]);
            $M_insuranceClassInsert->where('token', $_POST['token']);
            $M_insuranceClassInsert->update();
            return redirect()->to(site_url('quotation'));
        }
    }
    public function medical_store_quatation()
    {
         // echo "<pre>";print_r($_POST);exit;
        $insert = $_POST;
        unset($insert['token']);
        $M_quotation = new Models\QuotationModel();
        if ($M_quotation->insert($insert)) {
            $lastid = $M_quotation->insertID();
            $quotid = 2000 + $lastid;
            $M_quotation->update($lastid, ['quotation_id' => $quotid]);
            $M_insuranceClassInsert = new Models\MedicalInsurancequotationModel();
            $M_insuranceClassInsert->set(['quot_id' => $lastid, 'client_id' => $_POST['fk_client_id']]);
            $M_insuranceClassInsert->where('token', $_POST['token']);
            $M_insuranceClassInsert->update();
            $M_insuranceClassInsert = new Models\Medical_Insurance_second_quotation_Model();
            $M_insuranceClassInsert->set(['quot_id' => $lastid, 'client_id' => $_POST['fk_client_id']]);
            $M_insuranceClassInsert->where('token', $_POST['token']);
            $M_insuranceClassInsert->update();
            return redirect()->to(site_url('quotation'));
        }
    }
    public function store_life_quatation()
    {
        $session = session();
        $session->setFlashdata('update', "Successfully Record Inserted");
        $insert = $_POST;
        unset($insert['token']);
        $M_quotation = new Models\QuotationModel();
        if ($M_quotation->insert($insert)) {
            $lastid = $M_quotation->insertID();
            $quotid = 2000 + $lastid;
            $M_quotation->update($lastid, ['quotation_id' => $quotid]);
            $M_lifeInsuranceClassInsert = new Models\LifeInsuranceClassInsertModel();
            $M_lifeInsuranceClassInsert->set(['quot_id' => $lastid, 'is_added' => 1, 'client_id' => $_POST['fk_client_id']]);
            $M_lifeInsuranceClassInsert->where('token', $_POST['token']);
            $M_lifeInsuranceClassInsert->update();
            return redirect()->to(site_url('quotation'));
        }
    }
    public function vehicle_store_quatation()
    {
        $brokercommission = $_POST['total_receivable'] * 12.5 / 100;  

        $session = session();
        $session->setFlashdata('success', "success");
        $session->setFlashdata('update', "Successfully Record Inserted");
        $M_vehicleInsuranceClassInsert   = new Models\Vehicle_Insure_Class_Insert_Model();
        $vici[]                          = $M_vehicleInsuranceClassInsert->select('SUM(broker_commission) as broker_commission,SUM(vat_on_commission) as vat_on_commission')->where('token', $_POST['token'])->first();
        $vici[]                          = $M_vehicleInsuranceClassInsert->select('commission_rate')->where('token', $_POST['token'])->first();
        $insert                          = $_POST;
        $insert['broker_commission']     = $vici[0]['broker_commission'];
        $insert['vat_on_commission']     = $vici[0]['vat_on_commission'];
        $insert['commission_percentage'] = $vici[1]['commission_rate'];
        unset($insert['token']);
       // echo "<pre>"; print_r($insert); exit;
        $M_quotation = new Models\QuotationModel();
        if ($M_quotation->insert($insert)) {
            $lastid = $M_quotation->insertID();
            $quotid = 2000 + $lastid;
            $endorsementid = 200 + $lastid;
            $M_quotation->update($lastid,['quotation_id' => $quotid,'endorsementid'=> $endorsementid,'broker_commission'=>$brokercommission,'commission_percentage'=>12.5]);
            $M_vehicleInsuranceClassInsert = new Models\Vehicle_Insure_Class_Insert_Model();
            $M_vehicleInsuranceClassInsert->set(['quot_id' => $lastid, 'is_added' => 1, 'client_id' => $_POST['fk_client_id']]);
            $M_vehicleInsuranceClassInsert->where('token', $_POST['token']);
            $M_vehicleInsuranceClassInsert->update();
            return redirect()->to(site_url('quotation'));
        }
    }
    public function changeStatus()
    {
        $M_quotation = new Models\QuotationModel();
        $row         = $M_quotation->where('id', $_POST['id'])->first();
        if ($row['is_active'] == 0) {
            $trn = $M_quotation->where('id', $_POST['id'])->set(['is_active' => 1])->update();
        } else {
            $trn = $M_quotation->where('id', $_POST['id'])->set(['is_active' => 0])->update();
        }
        if ($trn) {
            echo $row['is_active'];
        }
    }
    public function view_quatation($id)
    {

        $M_quotation     = new Models\QuotationModel();
        $row             = $M_quotation->where('id', $id)->first();
        $M_insuranceType = new Models\InsuranceTypeModel();
        $data            = $M_insuranceType->where(['id' => $row['fk_insurance_type_id']])->first();
        if ($data['main'] == 1) {
            return redirect()->to(site_url('quotation/view_general_quatation/' . $id));
        } elseif ($data['main'] == 2) {
            return redirect()->to(site_url('quotation/view_vehicle_quatation/' . $id));
        } elseif ($data['main'] == 3) {
            return redirect()->to(site_url('quotation/view_life_quatation/' . $id));
        } elseif ($data['main'] == 4) {
            return redirect()->to(site_url('quotation/view_medical_quatation/' . $id));
        }
    }
    public function edit_quatation($id)
    {
        $M_quotation     = new Models\QuotationModel();
        $row             = $M_quotation->where('id', $id)->first();
    //echo "<pre>"; print_r($row);
        $M_insuranceType = new Models\InsuranceTypeModel();
        $data            = $M_insuranceType->where(['id' => $row['fk_insurance_type_id']])->first();
       // echo "<pre>"; print_r($data);exit;
        if ($data['main'] == 1) {
            return redirect()->to(site_url('quotation/edit_general_quatation/' . $id));
        } elseif ($data['main'] == 2) {
            return redirect()->to(site_url('quotation/edit_vehicle_quatation/' . $id));
        } elseif ($data['main'] == 3) {
            return redirect()->to(site_url('quotation/edit_life_quatation/' . $id));
        } elseif ($data['main'] == 4) {
            return redirect()->to(site_url('quotation/edit_medical_quatation/' . $id));
        }
    }
    public function edit_general_quatation($id)
    {
        
        $session = session();
        if (!isset($_SESSION['userdata'])) {
            return redirect()->to(site_url('auth'));
        }
        $M_quotation              = new Models\QuotationModel();
        $data['quotation']        = $M_quotation->where('id', $id)->first();
        $data['insurance_type']= $data['quotation']['fk_insurance_type_id'];
        // echo "<pre>";print_r($data['quotation']);
        $M_client                 = new Models\ClientModel();
        $data['client']           = $M_client->where(['status' => 1, 'is_deleted' => 0])->findAll();
        //echo "<pre>";print_r($data['client']);exit;

        $M_currency               = new Models\CurrencyModel();
        $data['currencies']       = $M_currency->where(['is_active' => 1])->findAll();
        $M_branch                 = new Models\BranchModel();
        $data['branches']         = $M_branch->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_businesstype           = new Models\BusinessTypeModel();
        $data['businesstype']     = $M_businesstype->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_insurancecompany       = new Models\InsuranceCompanyModel();
        $data['insurancecompany'] = $M_insurancecompany->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $data['token']            = uniqid() . time();
       
        // $data['token'] = "5f8ff3e57704f1603269605";
        $M_insuranceClass       = new Models\InsuranceClassModel();
        $data['insuranceClass'] = $M_insuranceClass->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_insuranceClassInsert = new Models\InsuranceClassInsertModel();
        $M_insuranceClassInsert->select('insurance_class_insert.*,insurance_class.name');
        $M_insuranceClassInsert->join('insurance_class', 'insurance_class.id = insurance_class_insert.insurance_class_id');
        $data['insertpaneldata'] = $M_insuranceClassInsert->where(['insurance_class_insert.quot_id' => $id, 'insurance_class_insert.is_added' => 1])->findAll();
        //echo "<pre>";print_r($data['insertpaneldata']);

        // $data['insertpaneldata'] = $M_insuranceClassInsert->where(['quot_id'=>$id,'is_added'=>1])->findAll();
        $M_borrower       = new Models\BorrowerModel();
        $data['borrower'] = $M_borrower->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $data['page']     = 'quotation/edit1';
        // echo "<pre>"; print_r($data); exit;
        echo view('templete', $data);
    }
    public function edit_vehicle_quatation($id)
    {
        $session = session();
        if (!isset($_SESSION['userdata'])) {
            return redirect()->to(site_url('auth'));
        }
        $M_quotation              = new Models\QuotationModel();
        $data['quotation']        = $M_quotation->where('id', $id)->first();
        // echo "<pre>";print_r($data['quotation']);
        $data['insurance_type']          =  $data['quotation']['fk_insurance_type_id'];
        $M_client                        = new Models\ClientModel();
        $data['client']                  = $M_client->where(['status' => 1, 'is_deleted' => 0])->findAll();
        $M_currency                      = new Models\CurrencyModel();
        $data['currencies']              = $M_currency->where(['is_active' => 1])->findAll();
        $M_branch                        = new Models\BranchModel();
        $data['branches']                = $M_branch->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_businesstype                  = new Models\BusinessTypeModel();
        $data['businesstype']            = $M_businesstype->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_insurancecompany              = new Models\InsuranceCompanyModel();
        $data['insurancecompany']        = $M_insurancecompany->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_excessbenefitsdiscounts       = new Models\ExcessBenefitsDiscounts();
        $data['excessbenefitsdiscounts'] = $M_excessbenefitsdiscounts->first();
        $M_vehicle_insure_type           = new Models\Vehicle_Insure_Type();
        $data['vehicle_insure_type']     = $M_vehicle_insure_type->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_vehicle_maker                 = new Models\Vehicle_MakerModel();
        $data['vehicle_maker']           = $M_vehicle_maker->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_vehicle_type                  = new Models\VehicleModel();
        $data['vehicle_type']            = $M_vehicle_type->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $data['token']                   = uniqid() . time();
        $M_borrower                    = new Models\BorrowerModel();
        $data['borrower']              = $M_borrower->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        // $data['token'] = "5fae8df0a737b1605275120";

        $data['page'] = 'quotation/edit2';
        echo view('templete', $data);
    }
    public function edit_life_quatation($id)
    {
        $session = session();
        if (!isset($_SESSION['userdata'])) {
            return redirect()->to(site_url('auth'));
        }
        $M_quotation              = new Models\QuotationModel();
        $data['quotation']        = $M_quotation->where('id', $id)->first();
        $client_id=$data['quotation']['fk_client_id'];
      // echo "<pre>";print_r($id);exit;
        $M_client                 = new Models\ClientModel();
        $data['client_name']           = $M_client->where('id',$client_id)->first();
       // echo "<pre>";print_r($data['client']);exit;
        $data['insurance_type']          = $data['quotation']['fk_insurance_type_id'];
        $M_client                 = new Models\ClientModel();
        $data['client']           = $M_client->where(['status' => 1, 'is_deleted' => 0])->findAll();
        $M_currency               = new Models\CurrencyModel();
        $data['currencies']       = $M_currency->where(['is_active' => 1])->findAll();
        $M_branch                 = new Models\BranchModel();
        $data['branches']         = $M_branch->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_businesstype           = new Models\BusinessTypeModel();
        $data['businesstype']     = $M_businesstype->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_insurancecompany       = new Models\InsuranceCompanyModel();
        $data['insurancecompany'] = $M_insurancecompany->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $data['token']            = uniqid() . time();
        $M_borrower               = new Models\BorrowerModel();
        $data['borrower']         = $M_borrower->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $data['page'] = 'quotation/edit3';
        echo view('templete', $data); 
     }
     public function edit_medical_quatation($id)
        {
         $session = session();
        if (!isset($_SESSION['userdata'])) {
            return redirect()->to(site_url('auth'));
        }
        $M_quotation              = new Models\QuotationModel();
        $data['quotation']        = $M_quotation->where('id', $id)->first();
       //echo "<pre>";print_r($data['quotation']);exit;
        $data['insurance_type']          = $data['quotation']['fk_insurance_type_id'];
        $M_client                 = new Models\ClientModel();
        $data['client']           = $M_client->where(['status' => 1, 'is_deleted' => 0])->findAll();
        $M_currency               = new Models\CurrencyModel();
        $data['currencies']       = $M_currency->where(['is_active' => 1])->findAll();
        $M_branch                 = new Models\BranchModel();
        $data['branches']         = $M_branch->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_businesstype           = new Models\BusinessTypeModel();
        $data['businesstype']     = $M_businesstype->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_insurancecompany       = new Models\InsuranceCompanyModel();
        $data['insurancecompany'] = $M_insurancecompany->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $data['token']            = uniqid() . time();
        // $data['token'] = "5f8ff3e57704f1603269605";
        $M_insuranceClass       = new Models\InsuranceClassModel();
        $data['insuranceClass'] = $M_insuranceClass->where(['insurance_type_id' => $data['insurance_type'], 'is_active' => 1, 'is_deleted' => 0])->findAll();

        $M_borrower       = new Models\BorrowerModel();
        $data['borrower'] = $M_borrower->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        // echo "<pre>"; print_r($data); exit;
        $data['page'] = 'quotation/edit4';
        echo view('templete', $data);
     }
    public function first_quotation_update()
    {
        // echo "<pre>"; print_r($_POST);exit;
        $session = session();
        $session->setFlashdata('success', "success");
        $session->setFlashdata('update', "Record Update Successfully");
        $M_quotation         = new Models\QuotationModel();
       // $_POST['is_deleted'] = 1;
        if ($M_quotation->update($_POST['id'], $_POST)) {
            //  print_r($M_quotation->getLastQuery()->getQuery());exit;
            return redirect()->to(site_url('quotation'));
        }
    }
    public function update_life_quatation()
    {
        $insured_name = $_POST['insured_name'];
        $session = session();
        $session->setFlashdata('success', "success");
        $session->setFlashdata('update', "Record Update Successfully");
        $M_quotation         = new Models\QuotationModel();
        if ($M_quotation->update($_POST['id'], $_POST)) {
            $M_quotation         = new Models\QuotationModel();
            $data=array('insured_name'=>$insured_name);
            $M_quotation->update($_POST['id'], ['insured_name'=>$data]);
            return redirect()->to(site_url('quotation'));
        }  
    }
    public function update_medical_quatation()
    {
        $session = session();
        $session->setFlashdata('success', "success");
        $session->setFlashdata('update', "Record Update Successfully");
        $M_quotation         = new Models\QuotationModel();
        if ($M_quotation->update($_POST['id'], $_POST)) {
            return redirect()->to(site_url('quotation'));
        }   
    }
    public function update_store_quatation()
    {
     // echo "<pre>";print_r($_POST);exit;
        $session = session();
        $session->setFlashdata('error_class', "success");
        $session->setFlashdata('error', "Record Update Successfully");
        $M_quotation         = new Models\QuotationModel();
        if ($M_quotation->update($_POST['id'], $_POST)) {
            return redirect()->to(site_url('quotation'));
        }
    }
    public function view_general_quatation($id)
    {
        $session = session();
        if (!isset($_SESSION['userdata'])) {
            return redirect()->to(site_url('auth'));
        }
        $M_quotation              = new Models\QuotationModel();
        $data['quotation']        = $M_quotation->where('id', $id)->first();
        $M_client                 = new Models\ClientModel();
        $data['client']           = $M_client->where(['status' => 1, 'is_deleted' => 0])->findAll();
        $M_currency               = new Models\CurrencyModel();
        $data['currencies']       = $M_currency->where(['is_active' => 1])->findAll();
        $M_branch                 = new Models\BranchModel();
        $data['branches']         = $M_branch->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_businesstype           = new Models\BusinessTypeModel();
        $data['businesstype']     = $M_businesstype->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_insurancecompany       = new Models\InsuranceCompanyModel();
        $data['insurancecompany'] = $M_insurancecompany->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $data['token']            = uniqid() . time();
        // $data['token'] = "5f8ff3e57704f1603269605";
        $M_insuranceClass       = new Models\InsuranceClassModel();
        $data['insuranceClass'] = $M_insuranceClass->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_insuranceClassInsert = new Models\InsuranceClassInsertModel();
        $M_insuranceClassInsert->select('insurance_class_insert.*,insurance_class.name');
        $M_insuranceClassInsert->join('insurance_class', 'insurance_class.id = insurance_class_insert.insurance_class_id');
        $data['insertpaneldata'] = $M_insuranceClassInsert->where(['insurance_class_insert.quot_id' => $id, 'insurance_class_insert.is_added' => 1])->findAll();
        // $data['insertpaneldata'] = $M_insuranceClassInsert->where(['quot_id'=>$id,'is_added'=>1])->findAll();
        $M_borrower       = new Models\BorrowerModel();
        $data['borrower'] = $M_borrower->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $data['page']     = 'quotation/display';
        // echo "<pre>"; print_r($data); exit;
        echo view('templete', $data);
    }
    public function view_life_quatation($id)
    {
       // echo "<pre>";print_r($id);exit;
        $session = session();
        if (!isset($_SESSION['userdata'])) {
            return redirect()->to(site_url('auth'));
        }
        $M_insuranceClassInsert = new Models\LifeInsurancequotationModel();
        $M_insuranceClassInsert->orderby('id', 'desc');
      
        $data['insertpaneldata'] = $M_insuranceClassInsert->where(['quot_id'=>$id])->findAll();
       // echo "<pre>";print_r($data['insertpaneldata']);exit;
        $M_lifeInsuranceClassInsert = new Models\Life_insurance_second_quotation();
        $data['insertpaneldata2']= $M_lifeInsuranceClassInsert->where(['quot_id' => $id])->findAll();
       // echo "<pre>";print_r($data['insertpaneldata2']);exit;
        $M_quotation       = new Models\QuotationModel();
        $data['quotation'] = $M_quotation->where('id', $id)->first();
       //echo "<pre>";print_r($data['quotation']);exit;
        $M_client                   = new Models\ClientModel();
        $data['client']             = $M_client->where(['status' => 1, 'is_deleted' => 0])->findAll();
        $M_currency                 = new Models\CurrencyModel();
        $data['currencies']         = $M_currency->where(['is_active' => 1])->findAll();
        $M_branch                   = new Models\BranchModel();
        $data['branches']           = $M_branch->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_businesstype             = new Models\BusinessTypeModel();
        $data['businesstype']       = $M_businesstype->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_insurancecompany         = new Models\InsuranceCompanyModel();
        $data['insurancecompany']   = $M_insurancecompany->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_insuranceClass           = new Models\InsuranceClassModel();
        $data['insuranceClass']     = $M_insuranceClass->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        
        // $M_lifeInsuranceClassInsert = new Models\LifeInsuranceClassInsertModel();
        // $data['insertpaneldata']    = $M_lifeInsuranceClassInsert->where(['quo_id' => $id, 'is_added' => 1])->findAll();
        //echo "<pre>";print_r($data['insertpaneldata']);exit;
        $M_borrower       = new Models\BorrowerModel();
        $data['borrower'] = $M_borrower->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $data['page']     = 'quotation/display3';
        echo view('templete', $data);
    }
    public function view_medical_quatation($id)
    {
        $session = session();
        if (!isset($_SESSION['userdata'])) {
            return redirect()->to(site_url('auth'));
        }
        $M_quotation       = new Models\QuotationModel();
        $data['quotation'] = $M_quotation->where('id', $id)->first();
       // echo "<pre>";print_r($data['quotation']);exit;
        $M_client                 = new Models\ClientModel();
        $data['client']           = $M_client->where(['status' => 1, 'is_deleted' => 0])->findAll();
        $M_currency               = new Models\CurrencyModel();
        $data['currencies']       = $M_currency->where(['is_active' => 1])->findAll();
        $M_branch                 = new Models\BranchModel();
        $data['branches']         = $M_branch->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_businesstype           = new Models\BusinessTypeModel();
        $data['businesstype']     = $M_businesstype->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_insurancecompany       = new Models\InsuranceCompanyModel();
        $data['insurancecompany'] = $M_insurancecompany->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_insuranceClass           = new Models\InsuranceClassModel();
        $data['insuranceClass']     = $M_insuranceClass->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_MedicalInsuranceClassInsert = new Models\MedicalInsurancequotationModel();
        $data['insertpaneldata']    =$M_MedicalInsuranceClassInsert->where(['quot_id'=>$id])->findAll();
        $M_lifeInsuranceClassInsert = new Models\Medical_Insurance_second_quotation_Model();
        $data['insertpaneldata2']    = $M_lifeInsuranceClassInsert->where(['quot_id' => $id])->findAll();
        $M_borrower       = new Models\BorrowerModel();
        $data['borrower'] = $M_borrower->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $data['page']     = 'quotation/display4';
        echo view('templete', $data);
    }
    public function delete_quotation($id)
    {
        $session = session();
        $session->setFlashdata('error_class', "danger");
        $session->setFlashdata('error', "Record deleted Successfully");
        $M_quotation         = new Models\QuotationModel();
        $_POST['is_deleted'] = 1;
        if ($M_quotation->update($id, $_POST)) {
            //  print_r($M_quotation->getLastQuery()->getQuery());exit;
            return redirect()->to(site_url('quotation'));
        }
    }
    public function get_insuranceclass()
    {
        $M_insuranceClass = new Models\InsuranceClassModel();
        $row              = $M_insuranceClass->where(['id' => $_POST['id']])->first();
        echo json_encode($row);
    }
    public function get_insertpaneldata()
    {
        $M_insuranceClassInsert = new Models\InsuranceClassInsertModel();
        $row                    = $M_insuranceClassInsert->where(['id' => $_POST['id']])->first();
        echo json_encode($row);
    }
    public function get_life_quotationdata()
    {
        $M_insuranceClassInsert = new Models\LifeInsurancequotationModel();
        $row                    = $M_insuranceClassInsert->where(['id' => $_POST['id']])->first();
        echo json_encode($row);
    }

   public function get_life_second_quotationdata()
    {
        $M_insuranceClassInsert = new Models\Life_insurance_second_quotation();
        $row                    = $M_insuranceClassInsert->where(['id' => $_POST['id']])->first();
        echo json_encode($row);
    }

    public function get_medical_quotationdata()
    {
        $M_insuranceClassInsert = new Models\Medical_Insurance_second_quotation_Model();
        $row                    = $M_insuranceClassInsert->where(['id' => $_POST['id']])->first();
        echo json_encode($row);
    }
    public function get_medical_first_quotationdata()
    {
        $M_insuranceClassInsert = new Models\MedicalInsurancequotationModel();
        $row                    = $M_insuranceClassInsert->where(['id' => $_POST['id']])->first();
        echo json_encode($row);
    }
    public function get_lifeinsertpaneldata()
    {
        $M_lifeInsuranceClassInsert = new Models\LifeInsuranceClassInsertModel();
        $row                        = $M_lifeInsuranceClassInsert->where(['id' => $_POST['id']])->first();
        echo json_encode($row);
    }
    public function get_insertpaneldata2()
    {
        // echo json_encode($_POST);
        // exit;
        $M_vehicleInsuranceClassInsert = new Models\Vehicle_Insure_Class_Insert_Model();
        $row                           = $M_vehicleInsuranceClassInsert->where(['id' => $_POST['id']])->first();
        $ebd                           = json_decode($row['excess_benefits_discounts'], true);
        $checkbox                      = array();
        if (isset($ebd['excessbuy'])) {
            $excess_benefits_discounts['excessbuy'] = $ebd['excessbuy'];
            $checkbox['excessbuy']                  = 1;
        } else {
            $checkbox['excessbuy'] = 0;
        }
        if (isset($ebd['geographical_extension'])) {
            $excess_benefits_discounts['geographical_extension'] = $ebd['geographical_extension'];
            $checkbox['geographical_extension']                  = 1;
        } else {
            $checkbox['geographical_extension'] = 0;
        }
        if (isset($ebd['loss_use'])) {
            $excess_benefits_discounts['loss_use'] = $ebd['loss_use'];
            $checkbox['loss_use']                  = 0;
        } else {
            $checkbox['loss_use'] = 0;
        }
        if (isset($ebd['increased_tppd'])) {

            $excess_benefits_discounts['increased_tppd'] = $ebd['increased_tppd'];
            $checkbox['increased_tppd']                  = 1;
        } else {
            $checkbox['increased_tppd'] = 0;
        }
        if (isset($ebd['excess_protector'])) {
            $excess_benefits_discounts['excess_protector'] = $ebd['excess_protector'];
            $checkbox['excess_protector']                  = 1;
        } else {
            $checkbox['excess_protector'] = 0;
        }
        if (isset($ebd['excess_pvt'])) {
            $excess_benefits_discounts['excess_pvt'] = $ebd['excess_pvt'];
            $checkbox['excess_pvt']                  = 1;
        } else {
            $checkbox['excess_pvt'] = 0;
        }
        if (isset($ebd['accident'])) {
            $excess_benefits_discounts['accident'] = $ebd['accident'];
            $checkbox['accident']                  = 0;
        } else {
            $checkbox['accident'] = 0;
        }
        if (isset($ebd['membership_discount'])) {
            $excess_benefits_discounts['membership_discount'] = $ebd['membership_discount'];
            $checkbox['membership_discount']                  = 1;
        } else {
            $checkbox['membership_discount'] = 0;
        }
        if (isset($ebd['gps_tracking_installalled'])) {
            $excess_benefits_discounts['gps_tracking_installalled'] = $ebd['gps_tracking_installalled'];
            $checkbox['gps_tracking_installalled']                  = 1;
        } else {
            $checkbox['gps_tracking_installalled'] = 0;
        }
        if (isset($ebd['fleet_claim'])) {
            $excess_benefits_discounts['fleet_claim'] = $ebd['fleet_claim'];
        } else {
            $excess_benefits_discounts['fleet_claim'] = 0;
        }
        if (isset($ebd['additional_discount'])) {
            $excess_benefits_discounts['additional_discount'] = $ebd['additional_discount'];
        } else {
            $excess_benefits_discounts['additional_discount'] = 0;
        }
        $row['excess_benefits_discounts'] = $excess_benefits_discounts;
        $row['checkbox']                  = $checkbox;
        echo json_encode($row);
    }
    public function insurance_class_insert()
    {
        $session = session();
        $session->setFlashdata('update', "Successfully Record Inserted");
        $insert               = $_POST;
        
        $insert['is_added']   = 0;
        // $insert['adjpremium'] = is_numeric($insert['adjpremium']) ? $insert['adjpremium'] : 0;
        // $insert['premium'] += $insert['adjpremium'];
        $M_insuranceClassInsert = new Models\InsuranceClassInsertModel();
        $row                    = $M_insuranceClassInsert->insert($insert);
        echo json_encode($row);
    }
    public function life_insurance_class_insert()
    {
        $insert                     = $_POST;
        $M_lifeInsuranceClassInsert = new Models\LifeInsurancequotationModel();
        $row                        = $M_lifeInsuranceClassInsert->insert($insert);
      //  $lastid = $M_lifeInsuranceClassInsert->insertID();
        $M_lifeInsuranceClassInsert = new Models\LifeInsurancequotationModel();
        $data                       = $M_lifeInsuranceClassInsert->where('token',$_POST['token'])->findAll();
        $i                          = 0;
        foreach ($data as $key) {
            $i = $i + $key['premium'];
        }
        echo json_encode($i);

    }
    public function medical_quotation_insertpanel()
    {
        $M_lifeInsuranceClassInsert = new Models\MedicalInsurancequotationModel();
        $row                        = $M_lifeInsuranceClassInsert->insert($_POST);
        echo json_encode($row);
    }
    public function edit_life_insurance_class_insert()
    {
        $insert = $_POST;
        $M_lifeInsuranceClassInsert = new Models\LifeInsuranceClassInsertModel();
        $row                        = $M_lifeInsuranceClassInsert->update($_POST['id'], $insert);
        echo $row;
    }
    public function edit_insurance_class_insert()
    {
        $insert = $_POST;
        // $insert['is_added']=0;
        // $insert['adjpremium'] = is_numeric($insert['adjpremium']) ? $insert['adjpremium'] : 0;
        // $insert['premium'] += $insert['adjpremium'];
        $M_insuranceClassInsert = new Models\InsuranceClassInsertModel();
        $row                    = $M_insuranceClassInsert->update($_POST['id'], $insert);
        echo $row;
    }
    public function life_quotation_secondtab_store()
    {
        $M_insuranceClassInsert = new Models\Life_insurance_second_quotation();
        $row                    = $M_insuranceClassInsert->insert($_POST);
        $M_lifeInsuranceClassInsert = new Models\Life_insurance_second_quotation();
        $data                       = $M_lifeInsuranceClassInsert->findAll();
        $i                          = 0;
        foreach ($data as $key) {
            $i = $i + $key['actual_premium'];
        }
        echo json_encode($i);

    }
    public function medical_quotation_second_insertdata()
    {
        $M_insuranceClassInsert = new Models\Medical_Insurance_second_quotation_Model();
        $row                    = $M_insuranceClassInsert->insert($_POST);
        $M_lifeInsuranceClassInsert = new Models\Medical_Insurance_second_quotation_Model();
        $data                       = $M_lifeInsuranceClassInsert->findAll();
        $i                          = 0;
        foreach ($data as $key) {
            $i = $i + $key['actual_premium'];
        }
        echo json_encode($i);
    }
    // public function medical_quotation_secondtab_store()
    // {
    //     // print_r($_POST);exit();
    //     $M_insuranceClassInsert = new Models\MedicalInsurancequotationModel();
    //     $M_insuranceClassInsert->orderby('id', 'desc');
    //     $lastid                 = $M_insuranceClassInsert->first();
    //     $M_insuranceClassInsert = new Models\MedicalInsurancequotationModel();
    //     $row                    = $M_insuranceClassInsert->update($lastid, $_POST);
    //     echo json_encode($row);

    // }

    public function edit_life_quotations()
    {
        $insert                 = $_POST;
       // echo "<pre>";print_r($insert);exit;
        $M_insuranceClassInsert = new Models\LifeInsurancequotationModel();
        $row                    = $M_insuranceClassInsert->update($_POST['id'], $insert);
        $M_lifeInsuranceClassInsert = new Models\LifeInsurancequotationModel();
        $data                       = $M_lifeInsuranceClassInsert->where('quot_id',$_POST['quot_id'])->findAll();
   //    echo "<pre>";print_r($data);exit;
        $i                          = 0;
        
        foreach ($data as $key) {
             $i = $i + $key['premium'];
        }
      echo json_encode($i);
    }
    public function edit_life_quotation()
    {
        $insert                 = $_POST;
       // echo "<pre>";print_r($insert);exit;
        $M_insuranceClassInsert = new Models\LifeInsurancequotationModel();
        $row                    = $M_insuranceClassInsert->update($_POST['id'], $insert);
        $M_lifeInsuranceClassInsert = new Models\LifeInsurancequotationModel();
        $data                       = $M_lifeInsuranceClassInsert->where('quot_id',$_POST['quot_id'])->findAll();
   //    echo "<pre>";print_r($data);exit;
        $i                          = 0;
        
        foreach ($data as $key) {
             $i = $i + $key['premium'];
        }
      echo json_encode($i);
    }
    public function edit_life_secondquotation()
    {
     $insert                 = $_POST;
       // echo "<pre>";print_r($insert);exit;
        $M_insuranceClassInsert = new Models\Life_insurance_second_quotation();
        $row                    = $M_insuranceClassInsert->update($_POST['id'], $insert);
        $M_lifeInsuranceClassInsert = new Models\Life_insurance_second_quotation();
        $data                       = $M_lifeInsuranceClassInsert->where('id',$_POST['id'])->findAll();
   //    echo "<pre>";print_r($data);exit;
        $i                          = 0;
        
        foreach ($data as $key) {
             $i = $i + $key['actual_premium'];
        }
      echo json_encode($i);   
    }
    public function add_page_life_edit_quotation_first()
    {
        $insert                 = $_POST;
        //echo "<pre>";print_r($insert);exit;
        $M_insuranceClassInsert = new Models\LifeInsurancequotationModel();
        $row                    = $M_insuranceClassInsert->update($_POST['id'], $insert);
   //      $M_lifeInsuranceClassInsert = new Models\LifeInsurancequotationModel();
   //      $data                       = $M_lifeInsuranceClassInsert->where('quot_id',$_POST['quot_id'])->findAll();
   // //    echo "<pre>";print_r($data);exit;
   //      $i                          = 0;
        
   //      foreach ($data as $key) {
   //           $i = $i + $key['premium'];
   //      }
      echo json_encode($row);
    }
    
    public function edit_life_second_insertpanel()
    {
        $insert                 = $_POST;
        // echo "<pre>";print_r($insert);exit;
        $M_insuranceClassInsert = new Models\Life_insurance_second_quotation();
        $row                    = $M_insuranceClassInsert->update($_POST['id'], $insert);
        $M_lifeInsuranceClassInsert = new Models\Life_insurance_second_quotation();
        $data                       = $M_lifeInsuranceClassInsert->where('id',$_POST['id'])->findAll();
   //    echo "<pre>";print_r($data);exit;
        $i                          = 0;
        
        foreach ($data as $key) {
             $i = $i + $key['actual_premium'];
        }
      echo json_encode($i);
    }
    public function edit_medical_quotation()
    {
        $insert                 = $_POST;
        $M_insuranceClassInsert = new Models\Medical_Insurance_second_quotation_Model();
        $row                    = $M_insuranceClassInsert->update($_POST['id'], $insert);
        echo $row;
    }
    public function edit_medical_first_quotation()
    {
        $insert                 = $_POST;
        $M_insuranceClassInsert = new Models\MedicalInsurancequotationModel();
        $row                    = $M_insuranceClassInsert->update($_POST['id'], $insert);
        echo $row;
    }
    public function delete_insertpanel()
    {
        $session = session();
        $session->setFlashdata('error', "Successfully Record Deleted");
        $M_insuranceClassInsert = new Models\InsuranceClassInsertModel();
        if ($M_insuranceClassInsert->delete(['id' => $_POST['id']])) {
            echo $_POST['id'];
        }
    }
    public function delete_life_quotation()
    {
        $M_insuranceClassInsert = new Models\LifeInsurancequotationModel();
        if ($M_insuranceClassInsert->delete(['id' => $_POST['id']])) {
            echo $_POST['id'];
        }
    }
     public function delete_life_second_quotation()
    {
      //  echo $_POST['id'];exit;
        $M_insuranceClassInsert = new Models\Life_insurance_second_quotation();
        if ($M_insuranceClassInsert->delete(['id' => $_POST['id']])) {
            echo $_POST['id'];
        }
    }
    public function delete_medical_quotation()
    {
        $id = $_POST['id'];

        $insert                 = ['is_deleted' => 1];
        $M_insuranceClassInsert = new Models\MedicalInsurancequotationModel();
        $row                    = $M_insuranceClassInsert->update($id, $insert);
        echo $row;
    }
    public function delete_lifeinsertpanel()
    {
        $session = session();
        $session->setFlashdata('error', "Successfully Record Deleted");

        $M_lifeInsuranceClassInsert = new Models\LifeInsuranceClassInsertModel();
        if ($M_lifeInsuranceClassInsert->delete(['id' => $_POST['id']])) {
            echo $_POST['id'];
        }
    }
    public function delete_insertpanel2()
    {
        $session = session();
        $session->setFlashdata('error', "Successfully Record Deleted");

        // echo "<pre>"; print_r($_POST);
        $M_vehicleInsuranceClassInsert = new Models\Vehicle_Insure_Class_Insert_Model();
        if ($M_vehicleInsuranceClassInsert->delete(['id' => $_POST['id']])) {
            echo $_POST['id'];
        }
    }
    public function get_insertpaneltb()
    {
     //  echo "<pre>";print_r($_POST);exit;
      if(!empty($_POST['token']))
      {
       $M_insuranceClassInsert = new Models\InsuranceClassInsertModel();
        $M_insuranceClassInsert->select('insurance_class_insert.*,insurance_class.name');
        $M_insuranceClassInsert->join('insurance_class', 'insurance_class.id = insurance_class_insert.insurance_class_id');
        $data = $M_insuranceClassInsert->where(['insurance_class_insert.token' => $_POST['token']])->findAll();
       // print_r($M_insuranceClassInsert->getLastQuery()->getQuery());exit;
        $trs  = '';
        $i    = 1;
        foreach ($data as $key) {
            $trs .= '<tr>
                        <td>' . $i++ . '</td>
                        <td>' . $key['description'] . '</td>
                        <td>' . $key['name'] . '</td>
                        <td>' . $key['sum_insured'] . '</td>
                        <td>' . $key['rate'] . '</td>
                        <td>' . $key['override'] . '</td>
                        <td>' . $key['premium'] . '</td>
                        <td><button type="button" class="btn btn-xs btn-info" onclick="edit_insertpanel(' . $key['id'] . ')"><i class="fa fa-edit" aria-hidden="true"></i> </button><button type="button" class="btn btn-xs btn-danger" onclick="delete_insertpanel(' . $key['id'] . ')"><i class="fa fa-trash" aria-hidden="true"></i> </button></td>
                  </tr>';

                }
                echo $trs;
                $premium=0;
                foreach($data as $total){
                    $premium = $premium + $total['premium'];
                }
                ?> <script>$("#total-receivable").val(<?php echo $premium + $_POST['vat_amount']?> ) </script><?php
               //print_r(array('data'=>$data[0]['premium']));

      }
      else
      {
        $M_insuranceClassInsert = new Models\InsuranceClassInsertModel();
        $M_insuranceClassInsert->select('insurance_class_insert.*,insurance_class.name');
        $M_insuranceClassInsert->join('insurance_class', 'insurance_class.id = insurance_class_insert.insurance_class_id');
        $data = $M_insuranceClassInsert->where(['insurance_class_insert.quot_id' => $_POST['id']])->findAll();
       // print_r($M_insuranceClassInsert->getLastQuery()->getQuery());exit;
        $trs  = '';
        $i    = 1;
        foreach ($data as $key) {
            $trs .= '<tr>
                        <td>' . $i++ . '</td>
                        <td>' . $key['description'] . '</td>
                        <td>' . $key['name'] . '</td>
                        <td>' . $key['sum_insured'] . '</td>
                        <td>' . $key['rate'] . '</td>
                        <td>' . $key['override'] . '</td>
                        <td>' . $key['premium'] . '</td>
                        <td><button type="button" class="btn btn-xs btn-info" onclick="edit_insertpanel(' . $key['id'] . ')"><i class="fa fa-edit" aria-hidden="true"></i> </button><button type="button" class="btn btn-xs btn-danger" onclick="delete_insertpanel(' . $key['id'] . ')"><i class="fa fa-trash" aria-hidden="true"></i> </button></td>
                  </tr>';

                }
                echo $trs;
                $premium=0;
                foreach($data as $total){
                    $premium = $premium + $total['premium'];
                }
                ?> <script> 
                            $("#total-premium-b-tax").val(<?php echo $premium ;?>);

                               </script><?php
               //print_r(array('data'=>$data[0]['premium']));

      }
        
    }
  
    public function get_lifequotationtbl()
    {
        if(!empty($_POST['token']))
        {
           $M_insuranceClassInsert = new Models\LifeInsurancequotationModel();
        $M_insuranceClassInsert->orderby('id', 'desc');
        $data = $M_insuranceClassInsert->where(['token' => $_POST['token']])->findAll();
        $trs  = '';
        $i    = 1;

        foreach ($data as $key) {
            $trs .= '<tr>
                  <td>' . $i++ . '</td>
                  <td>' . $key['insured_name'] . '</td>
                  <td>' . $key['gender'] . '</td>
                  <td>' . $key['age'] . '</td>
                  <td>' . $key['annual_salary'] . '</td>
                  <td>' . $key['sum_assured'] . '</td>
                  <td>' . $key['premium'] . '</td>
                  <td><button type="button" class="btn btn-xs btn-info" onclick="edit_life_quotation(' . $key['id'] . ')"><i class="fa fa-edit" aria-hidden="true"></i> </button><button type="button" class="btn btn-xs btn-danger" onclick="delete_life_quotation(' . $key['id'] . ')"><i class="fa fa-trash" aria-hidden="true"></i> </button></td>
                  </tr>';
        }
        echo $trs;  


        }
        else{
        $M_insuranceClassInsert = new Models\LifeInsurancequotationModel();
        $M_insuranceClassInsert->orderby('id', 'desc');
        $data = $M_insuranceClassInsert->where(['quot_id' => $_POST['id']])->findAll();
        $trs  = '';
        $i    = 1;

        foreach ($data as $key) {
            $trs .= '<tr>
                  <td>' . $i++ . '</td>
                  <td>' . $key['insured_name'] . '</td>
                  <td>' . $key['gender'] . '</td>
                  <td>' . $key['age'] . '</td>
                  <td>' . $key['annual_salary'] . '</td>
                  <td>' . $key['sum_assured'] . '</td>
                  <td>' . $key['premium'] . '</td>
                  <td><button type="button" class="btn btn-xs btn-info" onclick="edit_life_quotation(' . $key['id'] . ')"><i class="fa fa-edit" aria-hidden="true"></i> </button><button type="button" class="btn btn-xs btn-danger" onclick="delete_life_quotation(' . $key['id'] . ')"><i class="fa fa-trash" aria-hidden="true"></i> </button></td>
                  </tr>';
        }
        echo $trs;
        }
         $premium=0;
                foreach($data as $total){
                    $premium = $premium + $total['premium'];
                }
                ?> <script> $("#total-receivable").val(<?php echo $premium;?>) </script><?php
      
    }
    public function get_lifequotationsecondtb()
    {
        if(!empty($_POST['token']))
        {
        $M_insuranceClassInsert = new Models\Life_insurance_second_quotation();
        $M_insuranceClassInsert->orderby('id', 'desc');
        $data = $M_insuranceClassInsert->where(['token' => $_POST['token']])->findAll();
        $trs  = '';
        $i    = 1;
     //    echo "<pre>";print_r($M_insuranceClassInsert->getLastQuery()->getQuery());exit;
        foreach ($data as $key) {
            $trs .= '<tr>
              <td>' . $i++ . '</td>
              <td>' . $key['description'] . '</td>
              <td>' . $key['sum_insured2'] . '</td>
              <td>' . $key['rate'] . '</td>
              <td>' . $key['actual_premium'] . '</td>
             <td><button type="button" class="btn btn-xs btn-info" onclick="edit_life_quotationsecondtab(' . $key['id'] . ')"><i class="fa fa-edit" aria-hidden="true"></i> </button><button type="button" class="btn btn-xs btn-danger" onclick="delete_life_quotationsecondtab(' . $key['id'] . ')"><i class="fa fa-trash" aria-hidden="true"></i> </button></td>
              </tr>';
          }
       }
       else
       {
        $M_insuranceClassInsert = new Models\Life_insurance_second_quotation();
        $M_insuranceClassInsert->orderby('id', 'desc');
        $data = $M_insuranceClassInsert->where(['quot_id' => $_POST['id']])->findAll();
        $trs  = '';
        $i    = 1;
     //    echo "<pre>";print_r($M_insuranceClassInsert->getLastQuery()->getQuery());exit;
        foreach ($data as $key) {
            $trs .= '<tr>
              <td>' . $i++ . '</td>
              <td>' . $key['description'] . '</td>
              <td>' . $key['sum_insured2'] . '</td>
              <td>' . $key['rate'] . '</td>
              <td>' . $key['actual_premium'] . '</td>
             <td><button type="button" class="btn btn-xs btn-info" onclick="edit_life_quotationsecondtab(' . $key['id'] . ')"><i class="fa fa-edit" aria-hidden="true"></i> </button><button type="button" class="btn btn-xs btn-danger" onclick="delete_life_quotationsecondtab(' . $key['id'] . ')"><i class="fa fa-trash" aria-hidden="true"></i> </button></td>
              </tr>';
          }
       }
    
        echo $trs;
    }
    public function get_medicalquotationsecondtb()
    {
        if(!empty($_POST['token']))
        {
        $M_insuranceClassInsert = new Models\Medical_Insurance_second_quotation_Model();
        $M_insuranceClassInsert->orderby('id', 'desc');
        $data = $M_insuranceClassInsert->where(['token' =>$_POST['token']])->findAll();
        $trs  = '';
        $i    = 1;

        foreach ($data as $key) {
        $trs .= '<tr>
                  <td>' . $i++ . '</td>
                  <td>' . $key['description2'] . '</td>
                  <td>' . $key['extension'] . '</td>
                  <td>' . $key['sum_insured2'] . '</td>
                  <td>' . $key['rate'] . '</td>
                  <td>' . $key['actual_premium'] . '</td>
                  <td><button type="button" class="btn btn-xs btn-info" onclick="edit_medical_quotationsecondtab(' . $key['id'] . ')"><i class="fa fa-edit" aria-hidden="true"></i> </button><button type="button" class="btn btn-xs btn-danger" onclick="delete_medical_quotationsecondtab(' . $key['id'] . ')"><i class="fa fa-trash" aria-hidden="true"></i> </button></td>
                  </tr>';
         }
      }
      else
      {
        $M_insuranceClassInsert = new Models\Medical_Insurance_second_quotation_Model();
        $M_insuranceClassInsert->orderby('id', 'desc');
        $data = $M_insuranceClassInsert->where(['quot_id' =>$_POST['id']])->findAll();
        $trs  = '';
        $i    = 1;

        foreach ($data as $key) {
        $trs .= '<tr>
                  <td>' . $i++ . '</td>
                  <td>' . $key['description2'] . '</td>
                  <td>' . $key['extension'] . '</td>
                  <td>' . $key['sum_insured2'] . '</td>
                  <td>' . $key['rate'] . '</td>
                  <td>' . $key['actual_premium'] . '</td>
                  <td><button type="button" class="btn btn-xs btn-info" onclick="edit_medical_quotationsecondtab(' . $key['id'] . ')"><i class="fa fa-edit" aria-hidden="true"></i> </button><button type="button" class="btn btn-xs btn-danger" onclick="delete_medical_quotationsecondtab(' . $key['id'] . ')"><i class="fa fa-trash" aria-hidden="true"></i> </button></td>
                  </tr>';
         }
      }
                 echo $trs;
                 $premium=0;
              foreach($data as $key)
                {
                     $premium=$premium + $key['actual_premium'];
                }
                 ?><script> 
                 $("#addon_premium").val(<?php echo $premium;?>);</script><?php
    }
    public function get_medicalquotationtbl()
    {
        if(!empty($_POST['token']))
        {
            $M_insuranceClassInsert = new Models\medicalInsurancequotationModel();
            $M_insuranceClassInsert->orderby('id', 'desc');
            $data = $M_insuranceClassInsert->where(['token' =>$_POST['token']])->findAll();
            $trs  = '';
            $i    = 1;

            foreach ($data as $key) {
                $trs .= '<tr>
                          <td>' . $i++ . '</td>
                          <td>' . $key['description'] . '</td>
                          <td>' . $key['dob'] . '</td>
                          <td>' . $key['age'] . '</td>
                          <td>' . $key['id_type'] . '/' . $key['id_number'] . '</td>
                          <td>' . $key['relationship'] . '</td>
                          <td>' . $key['gender'] . '</td>
                          <td>' . $key['sum_assured'] . '</td>
                          <td>' . $key['Total_Premium'] . '</td>
                          <td><button type="button" class="btn btn-xs btn-info" onclick="edit_medical_quotation(' . $key['id'] . ')"><i class="fa fa-edit" aria-hidden="true"></i> </button><button type="button" class="btn btn-xs btn-danger" onclick="delete_medical_quotation(' . $key['id'] . ')"><i class="fa fa-trash" aria-hidden="true"></i> </button></td>
                          </tr>';   
            }
        }
        else
        {
        $M_insuranceClassInsert = new Models\medicalInsurancequotationModel();
        $M_insuranceClassInsert->orderby('id', 'desc');
        $data = $M_insuranceClassInsert->where(['quot_id' =>$_POST['id']])->findAll();
        $trs  = '';
        $i    = 1;

        foreach ($data as $key) {
            $trs .= '<tr>
                      <td>' . $i++ . '</td>
                      <td>' . $key['description'] . '</td>
                      <td>' . $key['dob'] . '</td>
                      <td>' . $key['age'] . '</td>
                      <td>' . $key['id_type'] . '/' . $key['id_number'] . '</td>
                      <td>' . $key['relationship'] . '</td>
                      <td>' . $key['gender'] . '</td>
                      <td>' . $key['sum_assured'] . '</td>
                      <td>' . $key['Total_Premium'] . '</td>
                      <td><button type="button" class="btn btn-xs btn-info" onclick="edit_medical_quotation(' . $key['id'] . ')"><i class="fa fa-edit" aria-hidden="true"></i> </button><button type="button" class="btn btn-xs btn-danger" onclick="delete_medical_quotation(' . $key['id'] . ')"><i class="fa fa-trash" aria-hidden="true"></i> </button></td>
                      </tr>';     
           }
        }
                 echo $trs;
                 $premium=0;
              foreach($data as $key)
                {
                     $premium=$premium + $key['Total_Premium'];
                }
                 ?><script> 
                 $("#total_receivable").val(<?php echo $premium;?>); </script><?php
    }
    public function get_lifeinsertpaneltb()
    {
$M_lifeInsuranceClassInsert = new Models\LifeInsuranceClassInsertModel();
$data                       = $M_lifeInsuranceClassInsert->where(['token' => $_POST['token'], 'is_added' => 0])->findAll();
        $trs                        = '';
        $i                          = 1;
        foreach ($data as $key) {
            $trs .= '<tr>
    <td>' . $i++ . '</td>
    <td>' . $key['insured_name'] . '</td>
    <td>' . $key['gender'] . '</td>
    <td>' . $key['age'] . '</td>
    <td>' . $key['annual_salary'] . '</td>
    <td>' . $key['sum_assured'] . '</td>
    <td>' . $key['premium'] . '</td>
    <td><button type="button" class="btn btn-xs btn-info" onclick="edit_insertpanel(' . $key['id'] . ')"><i class="fa fa-edit" aria-hidden="true"></i> </button><button type="button" class="btn btn-xs btn-danger" onclick="delete_insertpanel(' . $key['id'] . ')"><i class="fa fa-trash" aria-hidden="true"></i> </button></td>
    </tr>';
        }
        echo $trs;
    }
    public function calculation()
    {
        // $M_vehicleInsuranceClassInsert = new Models\Vehicle_Insure_Class_Insert_Model();
        // $row                           = $M_vehicleInsuranceClassInsert->update($_POST['quot_id'], $_POST);
        // $totalpremium             = $_POST['total_premium'];
        // $total_receivable= $_POST['total_premium'] + $_POST['vat'];
        // $_POST['vat']             = is_numeric($_POST['vat']) ? $_POST['vat'] : 0;
        // $_POST['otherfee']        = is_numeric($_POST['otherfee']) ? $_POST['otherfee'] : 0;
        // $_POST['commission_rate'] = is_numeric($_POST['commission_rate']) ? $_POST['commission_rate'] : 0;
        // $vat_amount               = ($totalpremium * $_POST['vat']) / 100;
        // $alltotalpremium          = $totalpremium + $vat_amount + $_POST['otherfee'];
        // $vatcommission            = ($vat_amount * $_POST['commission_rate']) / 100;
        // $brokercommission         = ($totalpremium * $_POST['commission_rate']) / 100;
        // $insurer_settlement       = $alltotalpremium - ($brokercommission + $vatcommission);
        // $r                        = array(
        //     'totalpremium'       => number_format($totalpremium, 2, ".", ""),
        //     'vat_amount'         => number_format($vat_amount, 2, ".", ""),
        //     'alltotalpremium'    => number_format($alltotalpremium, 2, ".", ""),
        //     'vatcommission'      => number_format($vatcommission, 2, ".", ""),
        //     'brokercommission'   => number_format($brokercommission, 2, ".", ""),
        //     'insurer_settlement' => number_format($insurer_settlement, 2, ".", ""),
        //     'total_receivable' => number_format($total_receivable, 2, ".", ""),
              
        // );
        // echo json_encode($r);
    }
    public function life_calculation()
    {
        $M_lifeInsuranceClassInsert = new Models\LifeInsuranceClassInsertModel();
        $data                       = $M_lifeInsuranceClassInsert->selectSum('premium')->where(['token' => $_POST['token'], 'is_added' => 0])->first();
        $totalpremium               = $data['premium'];
        $_POST['otherfee']          = is_numeric($_POST['otherfee']) ? $_POST['otherfee'] : 0;
        $alltotalpremium            = $totalpremium + $_POST['otherfee'];
        $r                          = array(
            'totalpremiumbtax'  => number_format($totalpremium, 2, ".", ""),
            'otherfee'          => number_format($_POST['otherfee'], 2, ".", ""),
            'othertotalpremium' => number_format($alltotalpremium, 2, ".", ""),
            'totalreceivable'   => number_format($alltotalpremium, 2, ".", ""),
            'insurersettlement' => number_format($alltotalpremium, 2, ".", ""),
        );
        echo json_encode($r);
    }
    public function calculation2()
    {
        $post                             = $_POST;
        $M_vehicle_insure_class           = new Models\Vehicle_Insure_Class_Model();
        $row                              = $M_vehicle_insure_class->where('id', $_POST['insuranceclass'])->first();
        $M_individual_insurer_level_setup = new Models\IndividualInsurerLevelSetupModel();
        $iil                              = $M_individual_insurer_level_setup->where(['company_id' => $_POST['insurance_company'], 'insure_type_id' => $_POST['main_insurance_type']])->first();
        // echo json_encode($row); exit;
        $actualpremium             = (is_numeric($post['suminsured']) ? $post['suminsured'] : 0) * $row['rate'] / 100;
        $excessbuy                 = 0;
        $geographical_extension    = 0;
        $loss_use                  = 0;
        $increased_tppd            = 0;
        $excess_protector          = 0;
        $excess_pvt                = 0;
        $accident                  = 0;
        $membership_discount       = 0;
        $gps_tracking_installalled = 0;
        $fleet_claim               = 0;
        $additional_discount       = 0;
        if (isset($post['excessbuy'])) {
            if (is_numeric($post['excessbuy'])) {
                $excessbuy = $actualpremium * $post['excessbuy'] / 100;
            }
        }
        if (isset($post['geographical_extension'])) {
            if (is_numeric($post['geographical_extension'])) {
                $geographical_extension = $actualpremium * $post['geographical_extension'] / 100;
            }
        }
        if (isset($post['loss_use'])) {
            if (is_numeric($post['loss_use'])) {
                $loss_use = $post['loss_use'];
            }
        }
        if (isset($post['increased_tppd'])) {
            if (is_numeric($post['increased_tppd'])) {
                $increased_tppd = $actualpremium * $post['increased_tppd'] / 100;
            }
        }
        if (isset($post['excess_protector'])) {
            if (is_numeric($post['excess_protector'])) {
                $excess_protector = $actualpremium * $post['excess_protector'] / 100;
            }
        }
        if (isset($post['excess_pvt'])) {
            if (is_numeric($post['excess_pvt'])) {
                $excess_pvt = $actualpremium * $post['excess_pvt'] / 100;
            }
        }
        if (isset($post['accident'])) {
            if (is_numeric($post['accident'])) {
                $accident = $actualpremium * $post['accident'] / 100;
            }
        }
        if (isset($post['membership_discount'])) {
            if (is_numeric($post['membership_discount'])) {
                $membership_discount = $actualpremium * $post['membership_discount'] / 100;
            }
        }
        if (isset($post['gps_tracking_installalled'])) {
            if (is_numeric($post['gps_tracking_installalled'])) {
                $gps_tracking_installalled = $actualpremium * $post['gps_tracking_installalled'] / 100;
            }
        }
        if ($post['fleet_claim'] > 0) {
            if (is_numeric($post['fleet_claim'])) {
                $fleet_claim = $actualpremium * $post['fleet_claim'] / 100;
            }
        }
        if ($post['additional_discount'] > 0) {
            if (is_numeric($post['additional_discount'])) {
                $additional_discount = $actualpremium * $post['additional_discount'] / 100;
            }
        }
        $_POST['sticker_fee'] = is_numeric($_POST['sticker_fee']) ? $_POST['sticker_fee'] : 0;
        $actualpremium        = $actualpremium + ($excessbuy + $geographical_extension + $loss_use + $increased_tppd + $excess_protector + $excess_pvt + $accident);
        $actualpremium        = $actualpremium - ($membership_discount + $gps_tracking_installalled + $fleet_claim + $additional_discount);
        $totalpremium         = (is_numeric($post['adjust_premium']) ? $post['adjust_premium'] : 0) + $actualpremium;
        $vat_amount           = $totalpremium * $post['vat_discount'] / 100;
        $total_receivable     = $totalpremium + $vat_amount + $_POST['sticker_fee'];
        $vatcommission        = ($vat_amount * $iil['commission_rate']) / 100;
        $brokercommission     = ($totalpremium * $iil['commission_rate']) / 100;
        $insurer_settlement   = $total_receivable - ($brokercommission + $vatcommission);
        $r                    = array(
            'actualpremium'      => number_format($actualpremium, 2, ".", ""),
            'totalpremium'       => number_format($totalpremium, 2, ".", ""),
            'vat_amount'         => number_format($vat_amount, 2, ".", ""),
            'total_receivable'   => number_format($total_receivable, 2, ".", ""),
            'rate'               => number_format($row['rate'], 2, ".", ""),
            'override'           => number_format($row['override'], 2, ".", ""),
            'commission_rate'    => number_format($iil['commission_rate'], 2, ".", ""),
            'vatcommission'      => number_format($vatcommission, 2, ".", ""),
            'brokercommission'   => number_format($brokercommission, 2, ".", ""),
            'insurer_settlement' => number_format($insurer_settlement, 2, ".", ""),
        );
        echo json_encode($r);
    }
    public function vehicle_insurance_class_insert()
    {
  //  echo "<pre>";print_r($_POST);exit;
        $post = $_POST;
        $excess_benefits_discounts = array();
        if (isset($post['excessbuy'])) {
            if (is_numeric($post['excessbuy'])) {
                $excess_benefits_discounts['excessbuy'] = $post['excessbuy'];
            }
            unset($post['excessbuy']);
        }
        if (isset($post['geographical_extension'])) {
            if (is_numeric($post['geographical_extension'])) {
                $excess_benefits_discounts['geographical_extension'] = $post['geographical_extension'];
            }
            unset($post['geographical_extension']);
        }
        if (isset($post['loss_use'])) {
            if (is_numeric($post['loss_use'])) {
                $excess_benefits_discounts['loss_use'] = $post['loss_use'];
                unset($post['loss_use']);
            }
        }
        if (isset($post['increased_tppd'])) {
            if (is_numeric($post['increased_tppd'])) {
                $excess_benefits_discounts['increased_tppd'] = $post['increased_tppd'];
                unset($post['increased_tppd']);
            }
        }
        if (isset($post['excess_protector'])) {
            if (is_numeric($post['excess_protector'])) {
                $excess_benefits_discounts['excess_protector'] = $post['excess_protector'];
            }
            unset($post['excess_protector']);
        }
        if (isset($post['excess_pvt'])) {
            if (is_numeric($post['excess_pvt'])) {
                $excess_benefits_discounts['excess_pvt'] = $post['excess_pvt'];
            }
            unset($post['excess_pvt']);
        }
        if (isset($post['accident'])) {
            if (is_numeric($post['accident'])) {
                $excess_benefits_discounts['accident'] = $post['accident'];
            }
            unset($post['accident']);
        }
        if (isset($post['membership_discount'])) {
            if (is_numeric($post['membership_discount'])) {
                $excess_benefits_discounts['membership_discount'] = $post['membership_discount'];
            }
            unset($post['membership_discount']);
        }
        if (isset($post['gps_tracking_installalled'])) {
            if (is_numeric($post['gps_tracking_installalled'])) {
                $excess_benefits_discounts['gps_tracking_installalled'] = $post['gps_tracking_installalled'];
            }
            unset($post['gps_tracking_installalled']);
        }
        if ($post['fleet_claim'] > 0) {
            if (is_numeric($post['fleet_claim'])) {
                $excess_benefits_discounts['fleet_claim'] = $post['fleet_claim'];
            }
            unset($post['fleet_claim']);
        }
        if ($post['additional_discount'] > 0) {
            if (is_numeric($post['additional_discount'])) {
                $excess_benefits_discounts['additional_discount'] = $post['additional_discount'];
            }
            unset($post['additional_discount']);
        }
        $post['excess_benefits_discounts'] = json_encode($excess_benefits_discounts);
        // echo json_encode($excess_benefits_discounts); exit;
        $insert  = $post;
        $session = session();
        $session->setFlashdata('update', "Successfully Record Inserted");
        $M_vehicleInsuranceClassInsert = new Models\Vehicle_Insure_Class_Insert_Model();
        $row                           = $M_vehicleInsuranceClassInsert->insert($insert);
        echo $row;
    }
    public function vehicle_insurance_class_update()
    {
        $post                      = $_POST;
        $excess_benefits_discounts = array();
        if (isset($post['excessbuy'])) {
            if (is_numeric($post['excessbuy'])) {
                $excess_benefits_discounts['excessbuy'] = $post['excessbuy'];
            }
            unset($post['excessbuy']);
        }
        if (isset($post['geographical_extension'])) {
            if (is_numeric($post['geographical_extension'])) {
                $excess_benefits_discounts['geographical_extension'] = $post['geographical_extension'];
            }
            unset($post['geographical_extension']);
        }
        if (isset($post['loss_use'])) {
            if (is_numeric($post['loss_use'])) {
                $excess_benefits_discounts['loss_use'] = $post['loss_use'];
                unset($post['loss_use']);
            }
        }
        if (isset($post['increased_tppd'])) {
            if (is_numeric($post['increased_tppd'])) {
                $excess_benefits_discounts['increased_tppd'] = $post['increased_tppd'];
                unset($post['increased_tppd']);
            }
        }
        if (isset($post['excess_protector'])) {
            if (is_numeric($post['excess_protector'])) {
                $excess_benefits_discounts['excess_protector'] = $post['excess_protector'];
            }
            unset($post['excess_protector']);
        }
        if (isset($post['excess_pvt'])) {
            if (is_numeric($post['excess_pvt'])) {
                $excess_benefits_discounts['excess_pvt'] = $post['excess_pvt'];
            }
            unset($post['excess_pvt']);
        }
        if (isset($post['accident'])) {
            if (is_numeric($post['accident'])) {
                $excess_benefits_discounts['accident'] = $post['accident'];
            }
            unset($post['accident']);
        }
        if (isset($post['membership_discount'])) {
            if (is_numeric($post['membership_discount'])) {
                $excess_benefits_discounts['membership_discount'] = $post['membership_discount'];
            }
            unset($post['membership_discount']);
        }
        if (isset($post['gps_tracking_installalled'])) {
            if (is_numeric($post['gps_tracking_installalled'])) {
                $excess_benefits_discounts['gps_tracking_installalled'] = $post['gps_tracking_installalled'];
            }
            unset($post['gps_tracking_installalled']);
        }
        if ($post['fleet_claim'] > 0) {
            if (is_numeric($post['fleet_claim'])) {
                $excess_benefits_discounts['fleet_claim'] = $post['fleet_claim'];
            }
            unset($post['fleet_claim']);
        }
        if ($post['additional_discount'] > 0) {
            if (is_numeric($post['additional_discount'])) {
                $excess_benefits_discounts['additional_discount'] = $post['additional_discount'];
            }
            unset($post['additional_discount']);
        }
        $post['excess_benefits_discounts'] = json_encode($excess_benefits_discounts);
        // echo json_encode($excess_benefits_discounts); exit;
        $insert                        = $post;
        $M_vehicleInsuranceClassInsert = new Models\Vehicle_Insure_Class_Insert_Model();
        $row                           = $M_vehicleInsuranceClassInsert->update($_POST['id'], $insert);
        echo $_POST['id'];
    }
    public function vehicle_insurance_class_insert_table()
    {
     // print_r($_POST);exit;
        if(!empty($_POST['token']))
        {
         $M_vehicleInsuranceClassInsert = new Models\Vehicle_Insure_Class_Insert_Model();
        // $data = $M_vehicleInsuranceClassInsert->where('token',$_POST)->findAll();
        $M_vehicleInsuranceClassInsert->select('vehicle_insurance_class_insert.*,vehicle_insure_class.name as insurance_class_name');
        $M_vehicleInsuranceClassInsert->join('vehicle_insure_class', 'vehicle_insure_class.id = vehicle_insurance_class_insert.insurance_class_id');
        $data = $M_vehicleInsuranceClassInsert->where(['vehicle_insurance_class_insert.token' => $_POST['token'], 'vehicle_insurance_class_insert.is_added' => 1])->findAll();
        // echo json_encode($data);
        $tr = '';
        $i  = 1;
        foreach ($data as $key) {
            $tr .= '<tr>
                <td>' . $i++ . '</td>
                <td>' . $key['insured_name'] . '</td>
                <td>' . $key['insurance_class_name'] . '</td>
                <td>' . $key['registration_no'] . '</td>
                <td>' . $key['sum_insured'] . '</td>
                <td>' . $key['rate'] . '</td>
                <td>' . $key['override'] . '</td>
                <td>' . $key['final_receivable'] . '</td>
                <td><button type="button" class="btn btn-xs btn-info" onclick="edit_insertpanel(' . $key['id'] . ')"><i class="fa fa-edit" aria-hidden="true"></i> </button><button type="button" class="btn btn-xs btn-danger" onclick="delete_insertpanel(' . $key['id'] . ')"><i class="fa fa-trash" aria-hidden="true"></i> </button></td>
                </tr>';
        }
        echo $tr;   
        }
        else
            {
        $M_vehicleInsuranceClassInsert = new Models\Vehicle_Insure_Class_Insert_Model();
        // $data = $M_vehicleInsuranceClassInsert->where('token',$_POST)->findAll();
        $M_vehicleInsuranceClassInsert->select('vehicle_insurance_class_insert.*,vehicle_insure_class.name as insurance_class_name');
        $M_vehicleInsuranceClassInsert->join('vehicle_insure_class', 'vehicle_insure_class.id = vehicle_insurance_class_insert.insurance_class_id');
        $data = $M_vehicleInsuranceClassInsert->where(['vehicle_insurance_class_insert.quot_id' => $_POST['id'], 'vehicle_insurance_class_insert.is_added' => 1])->findAll();
        // echo json_encode($data);
        $tr = '';
        $i  = 1;
        foreach ($data as $key) {
            $tr .= '<tr>
                <td>' . $i++ . '</td>
                <td>' . $key['insured_name'] . '</td>
                <td>' . $key['insurance_class_name'] . '</td>
                <td>' . $key['registration_no'] . '</td>
                <td>' . $key['sum_insured'] . '</td>
                <td>' . $key['rate'] . '</td>
                <td>' . $key['override'] . '</td>
                <td>' . $key['final_receivable'] . '</td>
                <td><button type="button" class="btn btn-xs btn-info" onclick="edit_insertpanel(' . $key['id'] . ')"><i class="fa fa-edit" aria-hidden="true"></i> </button><button type="button" class="btn btn-xs btn-danger" onclick="delete_insertpanel(' . $key['id'] . ')"><i class="fa fa-trash" aria-hidden="true"></i> </button></td>
                </tr>';
                    }
        echo $tr;
            }
            $premium = 0;
            foreach ($data as $key ) {
                $premium = $premium + $key['final_receivable'];
            }
            ?>
            <script type="text/javascript">$("#total_receivable").val(<?php echo $premium;?>);</script>
            <?php
        
    }
    public function get_all_final_receivable()
    {

        $M_vehicleInsuranceClassInsert = new Models\Vehicle_Insure_Class_Insert_Model();
        $sum                           = $M_vehicleInsuranceClassInsert->selectSum('final_receivable')->where(['token' => $_POST['token'], 'is_added' => 0])->first();

        $all_final_receivable          = $sum['final_receivable'] + (is_numeric($_POST['administration_charges']) ? $_POST['administration_charges'] : 0);
        echo number_format($all_final_receivable, 2, ".", "");
    }
    public function setVehicleInsertPanel()
    {
        $M_excessbenefitsdiscounts       = new Models\ExcessBenefitsDiscounts();
        $data['excessbenefitsdiscounts'] = $M_excessbenefitsdiscounts->first();
        $M_vehicle_insure_type           = new Models\Vehicle_Insure_Type();
        $data['vehicle_insure_type']     = $M_vehicle_insure_type->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_vehicle_maker                 = new Models\Vehicle_MakerModel();
        $data['vehicle_maker']           = $M_vehicle_maker->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_vehicle_type                  = new Models\VehicleModel();
        $data['vehicle_type']            = $M_vehicle_type->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        echo view('quotation/vehicle_insert_panel', $data);
    }
    public function add_capture_receipt()
    {
        $M_quotation   = new Models\QuotationModel();
        $quot          = $M_quotation->where('id', $_POST['quot_id'])->first();
        $clientBalance = ['client_id' => $quot['fk_client_id'], 'currency_id' => $_POST['fk_currency_id'], 'x_rate' => $_POST['rate'], 'quot_id' => $quot['id']];
//echo "<pre>"; print_r($clientBalance); exit;
        $M_quotation->update($_POST['quot_id'], ['current_balance' => $_POST['equivalent_amount'], 'status' => 1]);
        $M_capturereceipt = new Models\CaptureReceiptModel();
        $M_capturereceipt->insert($_POST);
        $M_clientBalance = new Models\ClientBalanceModel();
        $M_clientBalance->insert($clientBalance);
        return redirect()->to(site_url('quotation'));
    }
     public function add_vehicle_capture_receipt()
    {
        $M_quotation   = new Models\QuotationModel();
        $quot          = $M_quotation->where('id', $_POST['quot_id'])->first();
        $clientBalance = ['client_id' => $quot['fk_client_id'], 'currency_id' => $_POST['fk_currency_id'], 'x_rate' => $_POST['rate'], 'quot_id' => $quot['id']];
//echo "<pre>"; print_r($clientBalance); exit;
        $M_quotation->update($_POST['quot_id'], ['current_balance' => $_POST['equivalent_amount'], 'status' => 1]);
        $M_capturereceipt = new Models\CaptureReceiptModel();
        $M_capturereceipt->update($_POST['quot_id'],$_POST);
        $M_clientBalance = new Models\ClientBalanceModel();
        $M_clientBalance->insert($clientBalance);
        return redirect()->to(site_url('endorsement'));
    }
    public function issue_risk_note()
    {
        $M_quotation = new Models\QuotationModel();
        $M_quotation->update($_POST['id'], ['status' => 2]);
        $M_capturereceipt = new Models\CaptureReceiptModel();
        $capturereceipt   = $M_capturereceipt->where(['quot_id' => $_POST['id']])->first();
        $risknoteno       = $capturereceipt['id'] + 1234;
        

        $M_capturereceipt->where(['quot_id' => $_POST['id']])->set(['status' => 1, 'risk_note_no' => $risknoteno])->update();
        echo $_POST['id'];
    }
    public function attach_document($id)
    {
        
        $M_quotation = new Models\QuotationModel();
        $M_quotation->select('insurance_quotation.*,branch_details.branch_name,clients.client_name,insurance_company.insurance_company,capture_receipt.status as capture_receipt_status,capture_receipt.risk_note_no');
        $M_quotation->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id', 'left');
        $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id', 'left');
        $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id');
        $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id', 'left');
        $data['risknote'] = $M_quotation->where(['capture_receipt.status' => 1, 'insurance_quotation.id' => $id, 'insurance_quotation.is_deleted' => 0])->first();
        //echo "<pre>";print_r($M_quotation->getLastQuery()->getQuery());exit;
        $M_QuotationDocument = new Models\QuotationDocumentModel();
        $M_QuotationDocument->select('quotation_document.*,admin.name as attached_by,attach_type.document_type');
        $M_QuotationDocument->join('admin', 'admin.id = quotation_document.attached_by', 'left');
        $M_QuotationDocument->join('attach_type', 'attach_type.id = quotation_document.document_type', 'left');

        $data['attachment_document'] = $M_QuotationDocument->where(['quotation_document.quot_id' => $id, 'quotation_document.is_active' => 1, 'quotation_document.is_deleted' => 0])->findAll();
        $M_attachtype                = new Models\AttachTypeModel();
        $data['attachment_type']     = $M_attachtype->where(['is_deleted' => 0, 'is_active' => 1])->findAll();
        $data['page']                = 'quotation/upload';
        echo view('templete', $data);
    }
    public function upload_attach_document()
    {
        $session    = session();
        $userdata   = $session->get('userdata');
        $allowedEXt = array('jpg', 'jpeg', 'png', 'pdf', 'doc');
        $doc_file   = $this->request->getFile('doc_file');
        if (!isset($_POST['attachment_type'])) {
            $session->setFlashdata('alert_class', 'info');
            $session->setFlashdata('msg', 'Please select Attachment Type.');
            return redirect()->to(site_url('quotation/attach_document/' . $_POST['id']));
        }
        if (!(in_array($doc_file->getClientExtension(), $allowedEXt))) {
            $session->setFlashdata('alert_class', 'danger');
            $session->setFlashdata('msg', 'This Filetype is not allowed!!');
            return redirect()->to(site_url('quotation/attach_document/' . $_POST['id']));
        }
        if ($doc_file->getError() < 1) {
            if ($doc_file->getSize() < (500 * 1024)) {
                $M_capturereceipt = new Models\CaptureReceiptModel();
                $row              = $M_capturereceipt->where(['quot_id' => $_POST['id']])->first();
                $newName          = $doc_file->getRandomName();
                $doc_file->move(FCPATH . 'public/uploads/quotation/doc', $newName);
                $insert = array(
                    'quot_id'       => $_POST['id'],
                    'capture_id'    => $row['id'],
                    'document_name' => $newName,
                    'document_type' => $_POST['attachment_type'],
                    'attached_by'   => $userdata['id'],
                );
                $M_QuotationDocument = new Models\QuotationDocumentModel();
                if ($M_QuotationDocument->insert($insert)) {
                    $session->setFlashdata('alert_class', 'success');
                    $session->setFlashdata('msg', 'Documents Upload Successfully');
                    return redirect()->to(base_url('quotation/attach_document/' . $_POST['id']));
                }
            } else {
                $session->setFlashdata('alert_class', 'warning');
                $session->setFlashdata('msg', 'File size is larger then 500kb');
                return redirect()->to(base_url('quotation/attach_document/' . $_POST['id']));
            }
        } else {
            $session->setFlashdata('alert_class', 'danger');
            $session->setFlashdata('msg', 'Invalid File!!');
            return redirect()->to(base_url('quotation/attach_document/' . $_POST['id']));
        }

    }
    public function delete_attachment()
    {
        $userdata = $this->session->get('userdata');
        // echo "<pre>"; print_r($userdata); exit;
        $M_QuotationDocument = new Models\QuotationDocumentModel();
        $row                 = $M_QuotationDocument->where(['id' => $_POST['id']])->first();
        if ($row) {
            if (file_exists('public/uploads/quotation/doc/' . $row['document_name'])) {
                unlink('public/uploads/quotation/doc/' . $row['document_name']);
            }
            if ($M_QuotationDocument->delete(['id' => $_POST['id']])) {
                $this->session->setFlashdata('alert_class', 'success');
                $this->session->setFlashdata('msg', 'Documents Deleted Successfully');
                echo $_POST['id'];
            }
        }
    }
    public function search_quotation()
    {
        //print_r(date($_POST['date_from']));exit;

        $data['datas'] = array('client-name' => $_POST['client-name'], 'quote-no' => $_POST['quote-no'], 'insurance_type_name' => $_POST['insurance_type_name'], 'date_from' => $_POST['date_from'], 'date_to' => $_POST['date_to']);
        $M_quotation   = new Models\QuotationModel();
        $M_quotation->select('insurance_quotation.*,branch_details.branch_name,clients.client_name,insurance_type.insurance_type_name');
        $M_quotation->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id', 'left');
        $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id', 'left');
        $M_quotation->join('insurance_type', 'insurance_type.id = insurance_quotation.fk_insurance_type_id', 'left');
        $M_quotation->like('clients.client_name', $_POST['client-name']);
        $M_quotation->like('insurance_quotation.quotation_id', $_POST['quote-no']);
        $M_quotation->like('insurance_type.insurance_type_name', $_POST['insurance_type_name']);
        if (!empty($_POST['date_from']) && !empty($_POST['date_to'])) {
            $data['quotation'] = $M_quotation->where('insurance_quotation.date_from >=', $_POST['date_from'])->where('insurance_quotation.date_to <=', $_POST['date_to'])->where(['insurance_quotation.is_active' => 1, 'insurance_quotation.is_deleted' => 0])->findAll();
        } else {
            $data['quotation'] = $M_quotation->where(['insurance_quotation.is_active' => 1, 'insurance_quotation.is_deleted' => 0])->findAll();
        }

        //echo "<pre>";print_r($M_quotation->getLastQuery()->getQuery());exit;
        $M_insuranceType       = new Models\InsuranceTypeModel();
        $data['insuranceType'] = $M_insuranceType->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_currency            = new Models\CurrencyModel();
        $data['currencies']    = $M_currency->where(['is_active' => 1])->findAll();
        $M_issuerbank          = new Models\IssuerBankModel();
        $data['issuer_bank']   = $M_issuerbank->where(['is_deleted' => 0, 'is_active' => 1])->findAll();
        $data['page']          = 'quotation/list';
        // print_r($data); exit;
        echo view('templete', $data);
    }
    public function importFile()
    {
        $input = $this->validate([
            'file' => 'uploaded[uploadFile]|max_size[file,1024]|ext_in[file,csv],',
        ]);
        if ($file = $this->request->getFile('uploadFile')) {
            if ($file->isValid() && !$file->hasMoved()) {

                $newName = $file->getRandomName();
                $file->move(FCPATH . "/public\pdf\medicalexcel", $newName);
///print_r(FCPATH);exit();
                $file = fopen(FCPATH . "public/pdf/medicalexcel/" . $newName, "r");

                $file_handle = $file;
                while (!feof($file_handle)) {
                    $line_of_text[] = fgetcsv($file_handle, 5);
                }
                echo "<pre>";
                print_r($line_of_text);
                exit();
                //fclose($file_handle);

//     $i = 0;
                //     $numberOfFields = 7; // Total number of fields
                //     $importData_arr = array();
                //     while (( $filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                //       $data=array_map('str_getcsv',$filedata );
                //       $num = count($data);

//       if($i > 0 && $num == $numberOfFields){

// // Key names are the insert table field names - name, email, city, and status
                //     $importData_arr[$i]['firstname'] = $filedata[0];
                //     $importData_arr[$i]['lastname'] = $filedata[1];
                //     $importData_arr[$i]['gender'] = $filedata[2];
                //     $importData_arr[$i]['country'] = $filedata[3];
                //     $importData_arr[$i]['age'] = $filedata[4];
                //     $importData_arr[$i]['date'] = $filedata[5];
                //     $importData_arr[$i]['id'] = $filedata[6];

//   }
                //   print_r($data);
                //   exit();

//   $i++;
                // fclose($file);
                // // Insert data
                // $count = 0;
                // foreach($importData_arr as $userdata){
                //   $users = new Users();
                // // Check record
                //   $checkrecord = $users->where('email',$userdata['email'])->countAllResults();
                //   if($checkrecord == 0){
                // ## Insert Record
                //     if($users->insert($userdata)){
                //       $count++;
                //     }
                //   }
                //}
                // Set Session
                // session()->setFlashdata('message', $count.' Record inserted successfully!');
                // session()->setFlashdata('alert-class', 'alert-success');
                // }else{
                // // Set Session
                //   session()->setFlashdata('message', 'File not imported.');
                //   session()->setFlashdata('alert-class', 'alert-danger');
                // }
                // }else{
                // // Set Session
                //   session()->setFlashdata('message', 'File not imported.');
                //   session()->setFlashdata('alert-class', 'alert-danger');
                // }

//return redirect()->route('/');
            }
        }
    }
}
