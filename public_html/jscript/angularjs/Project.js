angular.module('app',['app.controller']);

angular.module('app.controller',[]).

controller('HomeController', function($scope, $http)
{

	$http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';

	////

	$scope.project = {};

	$scope.configs = {};

	$scope.projects = [];

	$scope.message = '';

	///

	($scope.getProjects = function()
	{
		$http.post(

			'./response',

			ObjecttoParams({action:'getProjects'})
		).
		success(function(response)
		{

			if(typeof response != 'object') return;

			for(i in response.projects) response.projects[i].id = parseInt(i)+1;

			$scope.projects = response.projects;

			///

			$scope.configs = response.configs;
		});

	})();

	$scope.changeUrl = function(value)
	{
		$scope.project.url = $scope.project.name.replace(/ /gi, '').toLowerCase() + '.dev';
		$scope.changeFolder( $scope.project.url );
	}

	$scope.changeFolder = function(value)
	{

		if(value.split('.').length==1) value = value;
		else if(value.split('.').length==2) value = value.split('.')[0];
		else if(value.split('.').length==3) value = value.split('.')[1]  +'/'+ value.split('.')[0];

		$scope.project.folder = $scope.configs.directory +'/'+ value;
	}

	$scope.createProject = function()
	{

		if(!$scope.project.name||!$scope.project.url) return alert('Preencha os campos!');

		$http.post(

			'./response',

			ObjecttoParams({
				action:'create',
				name:$scope.project.name,
				url:$scope.project.url,
				folder:$scope.project.folder
			})
		).
		success(function(response)
		{

			if(typeof response != 'object')
			{
				$scope.message = response;
			}
			else
			{

				$scope.message = 'Successful!';

				if( $scope.projects)
				{

					response.id = $scope.projects.length+1;

					$scope.projects.push(response);

				}
				else
				{

					response.id = 1;

					$scope.projects = [];

					$scope.projects[0] = response;

				}

				$scope.project = {};

			}

			time = setTimeout(function()
			{
				$scope.$apply(function()
				{
					$scope.message = '';
				});
			}, 4000);

		});

	};

	$scope.remove = function(proj)
	{
		$scope.projects = $scope.projects.splice($scope.projects.indexOf(proj),1);
	}

}).

controller('ConfigController', function($scope, $http)
{

	$http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';

	////

	$scope.opSystem = {};

	$scope.change = {};

	$http.post('./response', ObjecttoParams({'action':'opSystem'})).
	success(function(response)
	{

		$scope.opSystem = response.array;

		if(response.config && response.config.os) $scope.changeType('os',response.config.os);

		if(response.config && response.config.soft) $scope.changeType('soft',response.config.soft);
	});

	$scope.changeType = function(type, value)
	{
		$scope.change[type] = value;
		localStorage['change_'+type] = value;
	}

	if(localStorage['change_os']&&localStorage['change_os']!=='') $scope.changeType('os', localStorage['change_os']);

	if(localStorage['change_soft']&&localStorage['change_soft']!=='') $scope.changeType('soft', localStorage['change_soft']);

	////

	$scope.save = function()
	{

		if(!$scope.change.os||!$scope.change.soft) return alert('Preencha todos os campos!');

		$http.post(
			'./response',
			ObjecttoParams({
				'action':'saveConfig',
				'os': $scope.change.os,
				'soft': $scope.change.soft,
				'directory': $scope.change.directory || $scope.opSystem[$scope.change.os][$scope.change.soft].path
			})).
		success(function(response)
		{

			location.href = './';

		});
	}

})