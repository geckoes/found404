var app = angular.module('app', []);
app.controller('found404Ctrl', function($scope) {
	if (startFound404("config.php")) {
		$scope.title = "Title";
		$scope.main_container = "html/article.html";
	} else {
		$scope.title = "Create DB";
		$scope.main_container = "core/html/installation/inst_db.html";
	}

});
app.directive('includeReplace', function() {
	return {
		require : 'ngInclude',
		restrict : 'A', /* optional */
		link : function(scope, el, attrs) {
			el.replaceWith(el.children());
		}
	};
});
app.controller('createDbCtrl', function($scope) {
	$scope.prefixid = prefixid();
	$scope.createDb = function() {
		alert("ok");
	};
});

/*
 * Check if the site has already configured.
 */
function startFound404(url) {

	var xhr = new XMLHttpRequest();
	xhr.open('GET', url, true);
	xhr.send();

	if (xhr.status == "404") {
		return false;
	} 
	return true;
}

/*
 * create a prefix of 3 letters followed by a _
 * it's used to create a 
 */
function prefixid() {
	var text = "";
	var possible = "abcdefghijklmnopqrstuvwxyz";
	for (var i = 0; i < 4; i++) {
		text += possible.charAt(Math.floor(Math.random() * possible.length));
	}
	text += "_";

	return text;
}
