 <?php
$session = session();
$userdata = $session->get('userdata');
?><div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="col-md-12">
                            <div class="caption" style="font-size:large">
                                <h5 class="card-header bg-primary" style="height: 35px;padding: 5px;"> <i class="fa fa-briefcase"></i> Inbox</h5>
                            </div>
                         <div class="caption" style="font-size: large">
                                    <span id="MainContent_Label11">Risk Note : </span>
                                    <span id="MainContent_lblEmailRnNb"><?php echo $number['risk_note']; ?></span>
                         <!--            <span id="MainContent_Label9">Claim Number : </span>
                                    <span id="MainContent_lblEmailClaimId">38</span> -->
                                </div>
                       
                        <ul class="nav nav-tabs">
                            <li id="liCustomer" class="active">
                                <a href="#tab_customer" data-toggle="tab" class="btn btn-default"><i class="fa fa-users" style="top: 1px !important; margin-right: 3px !important"></i>
                                    <label>
                                        To Customer</label>
                                </a>
                            </li>
                            <li id="liInsurer">
                                <a href="#tab_insurer" data-toggle="tab" class="btn btn-default">
                                    <i class="fa fa-user" style="top: 1px !important; margin-right: 3px !important"></i>
                                    <label>
                                        To Insurer</label>
                                </a>
                            </li>  
                             <li class="" id="liAll">
                                 <a href="#tab_inbox" data-toggle="tab" class="btn btn-default">
                                     <i class="fa fa-check-square" style="top: 1px !important; margin-right: 3px !important"></i>
                                     <label>
                                         All
                                     </label>
                                 </a>
                            </li>  
                            <li id="liInbox">
                                 <a href="#tab_inbox" data-toggle="tab" class="btn btn-default">
                                     <i class="fa fa-inbox" style="top: 1px !important; margin-right: 3px !important"></i>
                                     <label>
                                        Inbox</label>
                                 </a>
                            </li> 
                            <li id="lisent">
                                 <a href="#tab_inbox" data-toggle="tab" class="btn btn-default">
                                     <i class="fa fa-upload" style="top: 1px !important; margin-right: 3px !important"></i>
                                     <label>
                                        Sent</label>
                                 </a>
                            </li> 
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_customer">
                                    <div class="col-md-12">
                                 <?php  if($msg=$session->getFlashdata('success')):?>
                                              <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong><?= $msg ?></strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                            <?php  endif; ?>
                                              <?php  if($msg=$session->getFlashdata('error')):?>
                                              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong><?= $msg ?></strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                            <?php  endif; ?>
                                <div class="modal-dialog" style="width: 100%;">
                                    <div class="modal-content">
                                        <div class="modal-header" style="height: 50px">
                                        
                                           <h5 class="modal-title" id="exampleModalLongTitle">Email Send To Customer</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <form method="post" action="<?php echo base_url('manageclaims_alli/send_mail')?>">
                                            <div class="modal-body">
                                                <div class="row form-row">
                                                    <div class="col-md-12">
                                                        <span>Client Name :</span><br>
                                                        <input type="hidden" name="risknoteno"  value="<?php echo $number['risk_note']; ?>">
                                                        <input type="hidden" name="uid" value="<?php echo $number['id'];?>">
                                                        <input type="hidden" name="mode" value="client">
                                                        <input type="text"  class="form-control" readonly="readonly" name="client_name" value="<?php echo $client['client_name'];?>">
                                                    </div>
                                                </div>
                                                <div class="row form-row">
                                                    <div class="col-md-12">
                                                        <span>Email :</span><br>
                                                         <?php $data=explode(',',$client['email']);
                                                           ?>
                                                        <input type="text" name="email"  class="form-control" style="height:50px;" value="<?php echo $data[0];?>">
                                                        <span>Use: Email separator ","</span>
                                                    </div>
                                                </div>
                                                <div class="row form-row">
                                                    <div class="col-md-12">
                                                        <div style="border-top: 1px solid grey; margin-bottom: 10px; margin-top: 10px">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row form-row">
                                                    <div class="col-md-12">
                                                        <span>Subject :</span>
                                                        <input type="text" class="form-control" name="subject">
                                                    </div>
                                                </div>
                                                <div class="row form-row">
                                                    <div class="col-md-12">
                                                        <span>Body :</span><br>
                                                        <textarea name="message" rows="2" cols="20" id="MainContent_txtBodyCust" class="form-control" style="height:150px;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                  <div class="col-md-11 offset-2">
                                                        <input type="submit" class="btn btn-primary" value="Send Email">
                                                        <button class="btn btn-primary" type="button" >
                                                            Send Email with All Documents
                                                        </button>
                                                        <button data-dismiss="modal" class="btn btn-default" type="button" id="btnCustomerExit">
                                                            Exit</button>
                                                    </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab_insurer">
                                <div class="modal-dialog" style="width: 70%; margin-top: 5%">
                                    <div class="modal-content">
                                        <div class="modal-header" style="height: 50px">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Email Send to Insurer</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                           
                                        </div>
                                        <form method="post" action="<?php echo base_url('manageclaims_alli/send_mail')?>">
                                        <div class="modal-body">
                                            <div class="row form-row">
                                                <div class="col-md-12">
                                                    <span>Insurer Name :</span><br>
                                                    <input type="hidden" name="risknoteno"  value="<?php echo $number['risk_note']; ?>">
                                                        <input type="hidden" name="uid" value="<?php echo $number['id'];?>">
                                                        <input type="hidden" name="mode" value="insurer">
                                                    <select name="company_id" class="form-control"> 
                                                        <option value="">Select option</option>
                                                        <?php 
                                                        foreach($insurance_company as $d)
                                                        {
                                                            ?>
                                                            <option value="<?php echo $d['id']; ?>">
                                                            <?php   echo $d['insurance_company']; ?>
                                                        </option>
                                                      <?php } ?>
                                                  </select>
                                                </div>
                                            </div>

                                            <div class="row form-row">
                                                <div class="col-md-12">
                                                    <span>Email :</span><br>
                                                    <input type="text" name="email" class="form-control">
                                                </div>
                                            </div>
                                           
                                            <div class="row form-row">
                                                <div class="col-md-12">
                                                    <span>Subject :</span>
                                                    <input type="text"  name="subject" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-row">
                                                <div class="col-md-12">
                                                    <span>Body :</span><br>
                                                    <textarea name="message" rows="2" cols="20"  class="form-control" style="height:150px;"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="col-md-4 offset-8">
                                                    <input type="submit" class="btn btn-primary" value="Send ">
                                                    <button data-dismiss="modal" class="btn btn-default" type="button" id="btnCustomerExit">
                                                            Exit</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>                            
                            <div class="tab-pane fade" id="tab_inbox">
                                <div id="divrptEmail">
                                <div class="card-body">
                                       <div class="table-fluide">
                                        <table id="example1" class="table table-bordered table-striped">
                                      <thead>
                                        <tr>
                                          <th scope="col">No</th>
                                          <th scope="col">From</th>
                                          <th scope="col">Subject</th>
                                          <th scope="col">Date</th>
                                          <th scope="col">Type</th>
                                          <th></th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                       <?php $i=1;foreach($manageclaims_email_all as $data){?>
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $data['email'];?></td>
                                        <td><?php echo $data['subject'];?></td>
                                        <td><?php echo date('d-m-Y',strtotime($data['created_at']));?></td>
                                        <td><?php if($data['mode']=='client'){
                                            ?>
                                                  <strong>Client</strong> 
                                            <?php
                                        } else
                                        {
                                          ?>
                                                  <strong>Insurer</strong> 
                                            <?php
                                        }?></td>
                                         <td><a href="<?php echo base_url('manageclaims_alli/delete_cliam')?>/<?php echo $data['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a></td>

                                        </tr>
                                    <?php $i++;} ?>
                                        
                                      </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                               
                                <div class="row form-row">
                                    <div class="col-md-10" style="text-align: left;">
                                        <span id="MainContent_lblErrorEmails" style="color: Red;"></span>
                                    </div>
                                </div>
                            </div>    
                            <div id="preview-email" style="display: none; background-color: White;">
                                <div class="row">
                                    <div class="col-md-12" id="preview-email-wrapper">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="grid simple">
                                                    <div class="grid-body no-border" style="background-color: rgba(221, 221, 221, 1); padding: 10px 10px 10px 10px; border: 2px solid rgba(128, 128, 128, 1) !important;">
                                                        <h3>
                                                            <span id="lblEmailSubject"></span>
                                                        </h3>
                                                        <div class="control">
                                                            <div class="pull-left">
                                                                <label class="inline" id="lblEmailFrom">
                                                                </label>
                                                            </div>
                                                            <div class="pull-right">
                                                                <span class="muted small-text"></span>
                                                                <label id="lblEmailDate">
                                                                </label>
                                                            </div>
                                                            <div class="clearfix">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="email-body">
                                                        <p>
                                                            
                                                            <textarea name="ctl00$MainContent$txtEmailBody" rows="2" cols="20" id="MainContent_txtEmailBody" class="form-control" style="height:300px;"></textarea>
                                                        </p>
                                                    </div>
                                                    <div class="row form-row">
                                                        <div class="col-md-12">
                                                            
                                                                    <table style="width: 100%" id="Atch4" class="table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th align="left" style="width: 70%">Document (Click on the document to open)
                                                                                </th>

                                                                                <th></th>
                                                                                <th></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                
                                                                    </tbody></table>
                                                                
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div style="border-top: 1px solid grey; margin-bottom: 10px; margin-top: 10px">
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-md-2" style="text-align: left;">
                                        <button style="min-width: 90px;" class="btn btn-info" type="button" id="btnEmailReply">
                                            <i class="fa fa-mail-reply"></i>&nbsp; <span class="bold">Reply</span></button>
                                    </div>
                                    <div class="col-md-8">
                                    </div>
                                    <div class="col-md-2" style="text-align: right;">
                                        <div class="button-set">
                                            <button id="btnEmailPopupExit" class="btn btn-default" type="button" data-dismiss="modal">
                                                Back</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>                              
</div>
