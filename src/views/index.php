
	<div class="row" ng-controller="HomeController">

		<div class="col-sm-9" style="min-height:200px;border-right:1px solid #DDD">

			<form class="form-inline" style="margin:10px 0 30px 0" ng-submit="createProject()">

				<input type="text" class="form-control" placeholder="Project Name" ng-change="changeUrl(project.name)" ng-model="project.name">

				<input type="text" class="form-control" placeholder="project.dev or project.*" ng-change="changeFolder(project.url)" ng-model="project.url">

				<input type="text" class="form-control" placeholder="folder" ng-model="project.folder">

				<button class="btn btn-primary"> create </button>

			</form>

			<table class="table table-hover">

				<tr ng-show="projects.length" ng-repeat="proj in projects | orderBy:'-id'">

					<td ng-bind="proj.name"></td>

					<td>

						<a target="_blank" href="{{ proj.url }}" ng-bind="proj.url"></a>

					</td>

				</tr>

			</table>

		</div>

		<div class="col-sm-3">

			<h4> Teed Create </h4>

			<a href="http://gitthub.com/tadeubarbosa/teedcreate">GitHub</a> -

			<a href="http://youtube.com/">Youtube</a>

			<div class="alert alert-success" style="margin-top:10px" ng-show="message" ng-bind="message"></div>

		</div>

	</div>