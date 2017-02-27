<div>
	<input type="text" placeholder="Search by name" ng-model="search">
	<div class="btn btn-primary" ng-click="show = !show ">Add User</div>
</div>

<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>Stt</th>
				<th ng-click="oderByMe('id')">Id</th>
				<th ng-click="oderByMe('name')">Name</th>
				<th ng-click="oderByMe('email')">Email</th>
				<th ng-click="oderByMe('group')">Group</th>
				<th>Active</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="x in users | orderBy: myOder | filter: search">
				<td><% $index + 1 %></td>
				<td><% x.id %></td>
				<td><% x.name %></td>
				<td><% x.email %></td>
				<td><% x.group_id %></td>
				<td><% x.active %></td>
				<td ng-if="x.group_id != 1">
					<div class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
					<div class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></div>
				</td>
			</tr>
		</tbody>
		
	</table>
	
</div>

<div ng-show="show">
	<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form">
                        <!-- <input type="hidden" id="token" name="_token" value="{{ csrf_field() }}" ng-model="_token"> -->

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" ng-model="name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" ng-model="email">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" ng-model="password">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" ng-model="password_confirmation">
                            </div>
                        </div>
						
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button ng-click="register()" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>