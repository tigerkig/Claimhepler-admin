@extends('admin.layouts.content')

@section('original')
<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->

			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
                User Information
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Login Information</a>
					</li>
				</ul>
				<div class="page-toolbar">
					<div class="btn-group pull-right">
						<button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
						Actions <i class="fa fa-angle-down"></i>
						</button>
						<ul class="dropdown-menu pull-right" role="menu">
							<li>
								<a href="#">Action</a>
							</li>
							<li>
								<a href="#">Another action</a>
							</li>
							<li>
								<a href="#">Something else here</a>
							</li>
							<li class="divider">
							</li>
							<li>
								<a href="#">Separated link</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->

			<div class="row">
				<div class="col-md-12 col-sm-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>User Table
							</div>
							<div class="actions">
								<a href="#" class="btn btn-default btn-sm" data-target="#static" data-toggle="modal" id="user_add">
								<i class="fa fa-pencil"></i> Add </a>

								<div class="btn-group">
									<a class="btn btn-default btn-sm" href="#" data-toggle="dropdown">
									<i class="fa fa-cogs"></i> Tools <i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="#" id="user_edit">
											<i class="fa fa-pencil"></i> Edit </a>
											<button id="toggle" data-target="#update" data-toggle="modal" style="display:none"></button>
										</li>
										<li>
											<a href="#" id="user_delete">
											<i class="fa fa-trash-o"></i> Delete </a>
										</li>

									</ul>
								</div>
							</div>
						</div>

						<!-- Add modal show -->
						<div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
							<div class="modal-body row">
								<div class="col-md-12 text-center" >
									<h3>
											Please insert your information.
									</h3>
								</div>
								<div class="col-md-12 input-padding" >
									<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-user"></i>
										</span>
										<input type="text" id="UserName"  placeholder="Enter the user name..."
										class="form-control"/>
									</div>
								</div>

								<div class="col-md-12 input-padding">
									<div class="input-group">
										<span class="input-group-addon">
										<i class="icon-envelope-open"></i>
										</span>
										<input type="email" id="UserEmail" placeholder="Enter the user email..." class="form-control"/>
									</div>
								</div>

								<div class="col-md-12 input-padding">
									<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-key"></i>
										</span>
										<input type="password" id="UserPassword" placeholder="Enter the user password..." class="form-control"/>
									</div>
								</div>

								<div class="col-md-12 input-padding">
									<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-key"></i>
										</span>
										<input type="password" id="ConfirmPassword" placeholder="Enter the confirm password..." class="form-control"/>
									</div>
								</div>

								<div class="col-md-12 row input-padding">
									<div class="col-md-4">
										<div>
											<label>Read and Edit</label>
										</div>
										<div>
											<input type="checkbox" id="read-edit" class="make-switch" checked data-on-color="info" data-off-color="success" data-on-text="Read" data-off-text="Edit">
										</div>
										
									</div>

									<div class="col-md-8">
										<div>
											<label>Form Permission</label>
										</div>
										<div class="icheck-style row">
											<div class="col-md-4 checkbox-padding-none">
												<label>
												<input type="checkbox" id="form_1" class="icheck" value="1">Form 1 </label>
											</div>
											<div class="col-md-4 checkbox-padding-none">
												<label>
												<input type="checkbox" id="form_2" class="icheck" value="2">Form 2 </label>
											</div>
											<div class="col-md-4 checkbox-padding-none">
												<label>
												<input type="checkbox" id="form_3" class="icheck" value="3">Form 3 </label>
											</div>
												
										</div>
									</div>
								</div>


							</div>
							<div class="modal-footer">
								<button type="button" data-dismiss="modal" class="btn btn-default" id="cancel">Cancel</button>
								<button type="button" class="btn blue" id="info_save">Save</button>
							</div>
						</div>

						<!-- update modal show -->
						<div id="update" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
							<div class="modal-body row">
								<div class="col-md-12 text-center" >
									<h3>
											Please update your information.
									</h3>
								</div>
								<input type="hidden" id="update_id">
								<div class="col-md-12 input-padding" >
									<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-user"></i>
										</span>
										<input type="text" id="UserName_update"  placeholder="Enter the user name..."
										class="form-control"/>
									</div>
								</div>

								<div class="col-md-12 input-padding">
									<div class="input-group">
										<span class="input-group-addon">
										<i class="icon-envelope-open"></i>
										</span>
										<input type="email" id="UserEmail_update" placeholder="Enter the user email..." class="form-control"/>
									</div>
								</div>

								<div class="col-md-12 input-padding">
									<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-key"></i>
										</span>
										<input type="password" id="UserPassword_update" placeholder="Enter the user password..." class="form-control"/>
									</div>
								</div>

								<div class="col-md-12 input-padding">
									<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-key"></i>
										</span>
										<input type="password" id="ConfirmPassword_update" placeholder="Enter the confirm password..." class="form-control"/>
									</div>
								</div>

								<div class="col-md-12 row input-padding">
									<div class="col-md-4">
										<div>
											<label>Read and Edit</label>
										</div>
										<div>
											<input type="checkbox" id="read-edit_update" class="make-switch" checked data-on-color="info" data-off-color="success" data-on-text="Read" data-off-text="Edit">
										</div>
										
									</div>

									<div class="col-md-8">
										<div>
											<label>Form Permission</label>
										</div>
										<div class="icheck-style row">
											<div class="col-md-4 checkbox-padding-none">
												<label>
												<input type="checkbox" id="form_1_update" class="icheck" value="1">Form 1 </label>
											</div>
											<div class="col-md-4 checkbox-padding-none">
												<label>
												<input type="checkbox" id="form_2_update" class="icheck" value="2">Form 2 </label>
											</div>
											<div class="col-md-4 checkbox-padding-none">
												<label>
												<input type="checkbox" id="form_3_update" class="icheck" value="3">Form 3 </label>
											</div>
												
										</div>
									</div>
								</div>


							</div>
							<div class="modal-footer">
								<button type="button" data-dismiss="modal" class="btn btn-default" id="cancel_update">Cancel</button>
								<button type="button" class="btn blue" id="info_save_update">Save</button>
							</div>
						</div>
						
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							
							<tr>
								<th class="table-checkbox">
									<input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes"/>
								</th>
								<th>
									 No
								</th>
								<th>
									 UserName
								</th>
								<th>
									 Email
								</th>
								<th>
									 Form Permission
								</th>
								<th>
									 Read and Edit
								</th>
							</tr>
							</thead>
							<tbody>
								@foreach($users as $key => $user)
									<tr class="odd gradeX">
										<td>
											<input type="checkbox" class="checkboxes" value="{{$user->id}}"/>
										</td>
										<td>
												{{++$key}}
										</td>
										<td>
											{{$user->name}}
										</td>
										<td>
											<a href="#">
											{{$user->email}} </a>
										</td>
										<td>
											@foreach(explode('||', $user->form_permission) as $form) 
												@if($form != 0)
													<span class="label label-sm label-success">FORM {{$form}}</span>
												@endif
											@endforeach
										</td>
										<td>
											@if($user->read_edit == 0)
												<span class="label label-sm label-warning">
												Read-only </span>
											@else
												<span class="label label-sm label-danger">
												Edit-only </span>
											@endif
										</td>
									</tr> 
								@endforeach
							
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div> 
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
@endsection