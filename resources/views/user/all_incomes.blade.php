@extends('layout.front.master')

@section('title')
AMS - All Incomes
@endsection

@section('body')
<!-- Main content -->
<div class="main-content">
  <h1 class="page-title">Income Information</h1>
  <div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading clearfix">
							<h3 class="panel-title">All Incomes</h3><br>
              @if (Session::has('success'))
          				<span class="help-block text-primary"> {{ Session::get('success') }}</span>
              @elseif (Session::has('fail'))
          				<span class="help-block text-danger"> {{ Session::get('fail') }}</span>
              @endif
							<ul class="panel-tool-options">
								<li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
								<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
							</ul>

              <form role="form">
                <select id="on_account" name="on_account" class="form-control">
                  <option value="0">All</option>
                @foreach($accounts as $account)
                  <option value="{{$account->id}}">{{$account->name}}</option>
                @endforeach
                </select>
              </form>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover" id="myTable" >
									<thead>
										<tr>
                      <th>Edit</th>
                      <th>Delete</th>
											<th>Description</th>
											<th>Amount</th>
                      <th>Account</th>
											<th>Created By</th>
                      <th>Last Updated By</th>
										</tr>
									</thead>
									<tbody>
                    @foreach($incomes as $income)
                    <tr class="gradeX">
                      <td><a href="{{url('edit_income/'.$income->id)}}" type="button" class="btn btn-primary">Edit</a></td>
                      <td><a href="#" type="button" class="btn btn-danger">Delete</a></td>
                      <td>{{$income->description}}</td>
                      <td>{{$income->amount}}</td>
                      @foreach($accounts as $account)
                        @if($account->id == $income->on_account)
                          <td>{{$account->name}}</td>
                        @endif
                      @endforeach
                      @foreach($users as $user)
                        @if($user->id == $income->created_by)
                          <td>{{$user->name}}</td>
                        @endif
                        @if($user->id == $income->last_updated_by)
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
