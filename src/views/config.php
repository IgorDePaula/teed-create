

	<div class="page-header">

		<h1> Hello! <small> Welcome to TeedCreate! </small> </h1>

	</div>

	<form class="col-sm-5"ng-submit="save()" ng-controller="ConfigController">

		<legend> Configure this app </legend>

		<div class="form-group">

			<label> My OS is: </label>

			<div class="btn-group">

				<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

					{{ change.os || 'Escolha' }} <span class="caret"></span>

				</button>

				<ul class="dropdown-menu" role="menu">

					<li><a href="javascript:void(0)" ng-click="changeType('os',os)" ng-hide="change.os==os" ng-repeat="(os,values) in opSystem" ng-bind="os"></a></li>

				</ul>

			</div>

		</div>

		<div class="form-group" ng-hide="!change.os">

			<label> My program is: </label>

			<div class="btn-group">

				<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

					{{ change.soft || 'Escolha' }} <span class="caret"></span>

				</button>

				<ul class="dropdown-menu" role="menu">

					<li><a href="javascript:void(0)" ng-click="changeType('soft',soft)" ng-hide="change.soft==soft" ng-repeat="(soft,values) in opSystem[change.os]" ng-bind="soft"></a></li>

				</ul>

			</div>

		</div>

		<div class="form-group">

			<label> Directory: </label>

			<input type="text" class="form-control" placeholder="{{ opSystem[change.os][change.soft].path }} " ng-model="change.directory">

		</div>

		<button class="btn btn-primary"> Save changes </button>

	</form>