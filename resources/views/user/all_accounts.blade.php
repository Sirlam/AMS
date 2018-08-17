@extends('layout.front.master')

@section('title')
AMS - All Accounts
@endsection

@section('body')
<!-- Main content -->
<div class="main-content">
  <h1 class="page-title">Account Information</h1>
  <div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading clearfix">
							<h3 class="panel-title">All Accounts</h3><br>
              @if (Session::has('success'))
          				<span class="help-block text-primary"> {{ Session::get('success') }}</span>
              @elseif (Session::has('fail'))
          				<span class="help-block text-danger"> {{ Session::get('fail') }}</span>
              @endif
							<ul class="panel-tool-options">
								<li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
								<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
							</ul>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover" id="myTable" >
									<thead>
										<tr>
                      <th>Edit</th>
                      <th>Delete</th>
											<th>Account Name</th>
											<th>Description</th>
											<th>Starting Balance</th>
											<th>Current Balance</th>
											<th>Created By</th>
                      <th>Last Updated By</th>
										</tr>
									</thead>
									<tbody>
                    @foreach($accounts as $account)
                    <tr class="gradeX">
                      <td><a href="{{url('edit_account/'.$account->id)}}" type="button" class="btn btn-primary">Edit</a></td>
                      <td><a href="#" type="button" class="btn btn-danger">Delete</a></td>
                      <td>{{$account->name}}</td>
                      <td>{{$account->description}}</td>
                      <td>{{$account->starting_balance}}</td>
                      <td>{{$account->current_balance}}</td>
                      @foreach($users as $user)
                        @if($user->id == $account->created_by)
                          <td>{{$user->name}}</td>
                        @endif
                        @if($user->id == $account->last_updated_by)
                          <td>{{$user->name}}</td>
                        @endif
                      @endforeach
                    </tr>
                    @endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
@stop
