angular.module("ngRoutingnum", [])
  .directive('ngRoutingnum', function () {
  // Routing # Lookup Directive
  // Uses API from http://www.routingnumbers.info/index.html
  // @author naterchrdsn (http://naterichardson.com)
  return {
    restrict: 'A',
    require: '?ngModel',
    controller: ['$scope', '$http', function($scope, $http) {
      $scope.getBank = function (routeIn) {
        $http.jsonp('https://routingnumbers.herokuapp.com/api/name.json?rn=' + routeIn + '&callback=JSON_CALLBACK')
          .success(function (routeData) {
            $scope.formData.bankName = routeData.name;
            $scope.routingData = routeData;
          }).error(function (response) {
            console.log('no routing number details to return, moving on...');
          });
      };
    }],
    link: function (scope, element, attrs, ngModel) {
      if (!ngModel) return;
      element.bind('blur', function () {
        scope.getBank(element[0].value);
      });
    }
  };
});