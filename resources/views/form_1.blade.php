@extends('layouts.content')

@section('content')
<section class="content-header" >
  <h1 style="font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;">
    Form 1 Information
  </h1>
  <ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Forms</li>
    <li class="active">Form 1</li>
  </ol>
</section>

<div class="row box box-success" style="padding: 40px 0px 10px 0px; margin:15px;">
   <div class="col-md-12 col-sm-12" id="forms" style="display:none">
      <section class="content table-responsive">
         <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Reference No.</th>
                  <th>Policy No.</th>
                  <th>Moblie No.</th>
                  <th>Name</th>
                  <th>Holder Name</th>
                  <th>Insured Name</th>
                  <th>Claimant Name</th>
                  <th>Person Name</th>
                  <th>Email Address</th>
                  <th>Submission</th>
                  <th>Status</th>

               </tr>
            </thead>
            <tbody>
               @foreach($references as $key => $reference)
                  <tr>
                     <td>{{++$key}}</td>
                     <td>{{$reference->reference_id}}</td>
                     <td>{{$reference->Policy_No}}</td>
                     <td>{{$reference->Mobile_No}}</td>
                     <td>{{$reference->app_Name}}</td>
                     <td>{{$reference->Holder_Name}}</td>
                     <td>{{$reference->Insured_Name}}</td>
                     <td>{{$reference->Claimant_Name}}</td>
                     <td>{{$reference->Person_Name}}</td>
                     <td>{{$reference->Email_Address}}</td>
                     <td>{{$reference->app_Submission}}</td>
                     @if($read_edit == 1)
                        <td><a href="#" data-toggle="modal" data-target="#modal-xl" onclick="detail('{{$reference->reference_id}}')"><span class="label label-sm label-success" style="font-size: 100%">Edit</span></a></td>
                     @else
                        <td><a href="#" data-toggle="modal" data-target="#modal-xl" onclick="detail('{{$reference->reference_id}}')"><span class="label label-sm label-warning" style="font-size: 100%">Read</span></a></td>
                     @endif
                  </tr>
               @endforeach
            </tbody>

         </table>
      </section>
   </div>
</div>

<div class="modal fade" id="modal-xl" style="display: none;" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <div class="modal-header-style">
               <div><p class="modal-title" style="font-size: 25px">From Detail</p></div>
               <div>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                  </button>
               </div>
            </div>
         </div>

         <div class="modal-body">
            <div class="row box box-success" style="padding: 20px;margin:15px;">
               <div class="col-md-12 col-sm-12">
                  <div class="card card-primary card-outline card-outline-tabs">
                     <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">

                           <li class="nav-item active">
                              <a class="nav-link" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="false">Detail</a>
                           </li>

                           <li class="nav-item ">
                              <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Remark</a>
                           </li>

                        </ul>
                     </div>
                     <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">

                              <div class="tab-pane fade active in" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                 <section class="content">

                                       <div class="box-body" id="detail_information">
                                          <div class="row" style="padding:0px !important;">
                                             <!-- //////////////////////////////////////////// -->
                                             <div class="col-md-12 preview_top" id="Employee2" style="">
                                                <div class="title">Employee's Compensation</div>
                                                <div class="preview">
                                                      <div>
                                                         <label class="subject">Date of Injury:</label>
                                                         <label id="Employee_show_1"></label>
                                                      </div>

                                                      <div>
                                                         <label class="subject">Description of Incident:</label>
                                                         <label id="Employee_show_2"></label>
                                                      </div>

                                                      <div>
                                                         <label class="subject">Sick Leave:</label>
                                                         <label style="padding-right:30px">From: <sapn id="Employee_show_3"></span></label>
                                                         <label >To: <sapn id="Employee_show_4"></span></label>
                                                      </div>

                                                      <div>
                                                         <label class="subject">Nature of Injury:</label>
                                                         <label id="Employee_show_5"></label>
                                                      </div>

                                                      <div class="upload_layout">
                                                         <div class="subject"><label >Uploaded files:</label></div>
                                                         <div><label id="Employee_show_6"></label></div>
                                                      </div>

                                                </div>
                                             </div>

                                             <div class="col-md-12 preview_top" id="Personal2" style="">
                                                <div class="title">Personal Accident</div>
                                                <div class="preview">
                                                      <div>
                                                      <label class="subject">Date of Injury:</label>
                                                      <label id="Personal_show_1"></label>
                                                      </div>

                                                      <div>
                                                      <label class="subject">Description of Incident:</label>
                                                      <label id="Personal_show_2"></label>
                                                      </div>

                                                      <div>
                                                      <label class="subject">Sick Leave:</label>
                                                      <label style="padding-right:30px">From: <sapn id="Personal_show_3"></span></label>
                                                      <label >To: <sapn id="Personal_show_4"></span></label>
                                                      </div>

                                                      <div>
                                                      <label class="subject">Nature of Injury:</label>
                                                      <label id="Personal_show_5"></label>
                                                      </div>

                                                      <div id="Personal_recovered">
                                                      <label class="subject">Is the Insured person fully recovered?</label>
                                                      <label >No, <sapn id="Personal_show_6"></span></label>
                                                      </div>

                                                      <div class="upload_layout">
                                                      <div class="subject"><label >Uploaded files:</label></div>
                                                      <div><label id="Personal_show_7"></label></div>
                                                      </div>

                                                </div>
                                             </div>
                                             
                                             <div class="col-md-12 preview_top" id="Repatriation2" style="">
                                                <div class="title">Repatriation</div>
                                                <div class="preview">
                                                      <div>
                                                      <label class="subject">Date of Death / Serious Sickness / Injury:</label>
                                                      <label id="Repatriation_show_1"></label>
                                                      </div>

                                                      <div>
                                                      <label class="subject">Description of Incident:</label>
                                                      <label id="Repatriation_show_2"></label>
                                                      </div>

                                                      <div>
                                                      <label class="subject">Reason of Injury:</label>
                                                      <label id="Repatriation_show_3"></label>
                                                      </div>

                                                      <div id="Repatriation_recovered">
                                                      <label class="subject">Is the Insured person fully recovered?</label>
                                                      <label >No, <sapn id="Repatriation_show_4"></span></label>
                                                      </div>

                                                      <div class="upload_layout">
                                                         <div class="subject"><label >Uploaded files:</label></div>
                                                         <div><label id="Repatriation_show_5"></label></div>
                                                      </div>

                                                </div>
                                             </div>

                                             <div class="col-md-12 preview_top" id="Clinical2" style="">
                                                <div class="title">Clinical Expenses</div>
                                                <div class="preview">
                                                      <div>
                                                         <label class="subject">Date of Medical Consulation:</label>
                                                         <label id="Clinical_show_1"></label>
                                                      </div>

                                                      <div class="check-box row check-box-padding-bottom" style="padding-top:0px !important;padding-bottom:8px !important;">
                                                      <div class="subject">
                                                         <input class="form-check-input" type="radio" name="example1" id="Clinical_show_check_1" disabled="" checked="">
                                                         <label class="form-check-label" for="Clinical_show_check_1">
                                                         Clinical Expense
                                                         </label>
                                                      </div>
                                                      
                                                      <div>
                                                         <input class="form-check-input" type="radio" name="example1" id="Clinical_show_check_2" disabled="">
                                                         <label class="form-check-label" for="Clinical_show_check_2">
                                                         Bonesetter Expense
                                                         </label>
                                                      </div>
                                                      </div>

                                                      <div>
                                                         <label class="subject">Diagnosis:</label>
                                                         <label id="Clinical_show_2"></label>
                                                      </div>

                                                      <div>
                                                         <label class="subject">Total Claimed Expense(s) HK$:</label>
                                                         <label id="Clinical_show_3"></label>
                                                      </div>

                                                      <div id="Clinical_recovered">
                                                      <label class="subject">Is the Insured person fully recovered?</label>
                                                      <label >No, <sapn id="Clinical_show_4"></span></label>
                                                      </div>

                                                      <div class="upload_layout">
                                                      <div class="subject"><label >Uploaded files:</label></div>
                                                      <div><label id="Clinical_show_5"></label></div>
                                                      </div>

                                                </div>
                                             </div>

                                             <div class="col-md-12 preview_top" id="Surgical2" style="">
                                                <div class="title">Surgical &amp; Hospitalization Expense</div>
                                                <div class="preview">
                                                      <div>
                                                      <label class="subject">Date of Sickness / Injury:</label>
                                                      <label id="Surgical_show_1"></label>
                                                      </div>

                                                      <div>
                                                      <label class="subject">Description of Incident:</label>
                                                      <label id="Surgical_show_2"></label>
                                                      </div>

                                                      <div>
                                                      <label class="subject">Diagonsis:</label>
                                                      <label id="Surgical_show_3"></label>
                                                      </div>

                                                      <div>
                                                      <label class="subject">Total Claimed Expense(s) HK$:</label>
                                                      <label id="Surgical_show_4"></label>
                                                      </div>

                                                      <div class="upload_layout">
                                                      <div class="subject"><label >Uploaded files:</label></div>
                                                      <div><label id="Surgical_show_5"></label></div>
                                                      </div>

                                                </div>
                                             </div>

                                             <div class="col-md-12 preview_top" id="Dental2" style="">
                                                <div class="title">Dental Expenses</div>
                                                <div class="preview">
                                                      <div>
                                                      <label class="subject">Date of Medical Consulation:</label>
                                                      <label id="Dental_show_1"></label>
                                                      </div>

                                                      <div>
                                                      <label class="subject">Diagonsis:</label>
                                                      <label id="Dental_show_2"></label>
                                                      </div>

                                                      <div>
                                                      <label class="subject">Total Claimed Expense(s) HK$:</label>
                                                      <label id="Dental_show_3"></label>
                                                      </div>

                                                      <div class="upload_layout">
                                                      <div class="subject"><label >Uploaded files:</label></div>
                                                      <div><label id="Dental_show_4"></label></div>
                                                      </div>

                                                </div>
                                             </div>

                                             <div class="col-md-12 preview_top" id="Loss2" style="">
                                                <div class="title">Loss of Services Cash Allowance</div>
                                                <div class="preview">
                                                      <div>
                                                      <label class="subject">Date of Medical Consulation:</label>
                                                      <label id="Loss_show_1"></label>
                                                      </div>

                                                      <div>
                                                      <label class="subject">Diagonsis:</label>
                                                      <label id="Loss_show_2"></label>
                                                      </div>

                                                      <div>
                                                      <label class="subject">Period of Hospital Confinement:</label>
                                                      <label style="padding-right:30px">From: <sapn id="Loss_show_3"></span></label>
                                                      <label >To: <sapn id="Loss_show_4"></span></label>
                                                      </div>

                                                      <div class="upload_layout">
                                                      <div class="subject"><label >Uploaded files:</label></div>
                                                      <div><label id="Loss_show_5"></label></div>
                                                      </div>

                                                </div>
                                             </div>
                                              
                                             <div class="col-md-12 preview_top" id="Replacement2" style="">

                                                <div class="title">Replacement of Helper Expenses</div>
                                                <div class="preview">
                                                      <div>
                                                      <label class="subject">Date of Medical Consulation:</label>
                                                      <label id="Replacement_show_1"></label>
                                                      </div>

                                                      <div>
                                                      <label class="subject">Total Claimed Expense(s) HK$:</label>
                                                      <label id="Replacement_show_2"></label>
                                                      </div>

                                                      <div class="upload_layout">
                                                      <div class="subject"><label >Uploaded files:</label></div>
                                                      <div><label id="Replacement_show_3"></label></div>
                                                      </div>

                                                </div>
                                             </div>
                                             <!-- //////////////////////////////////////// -->
                                          </div>
                                       </div>

                                 </section>
                              </div>

                              <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                 <section class="content">

                                    <div class="box-body">
                                       <div class="form-group">
                                          <label>Remark</label>
                                          <textarea class="form-control" id="remark" rows="3" placeholder="Enter ..."></textarea>
                                       </div>

                                       <div class="form-group">
                                          <label>Status</label>
                                          <input type="text" class="form-control" id="status" placeholder="Enter ...">
                                       </div>

                                       <div class="form-group" style="text-align: end">
                                          <button type="button" id="save_change" onclick="remark_status_save()" class="btn btn-primary">Save changes</button>
                                       </div>

                                    </div>

                                 </section>
                              </div>

                        </div>
                     </div>
                     <!-- /.card -->
                  </div>
               </div>
            </div>
         </div>

         <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<input type="hidden" id="is_read_edit" value="{{$read_edit}}">
<script src="./assets/bower_components/jquery/dist/jquery.min.js"></script>
<script>
$(document).ready(function (){
   $('#forms').show(1000);
})
</script>

@endsection