var myApp = angular.module("questions", ['angularUtils.directives.dirPagination','ui.bootstrap', 'ngSanitize','ui.bootstrap.modal']);

myApp.directive('convertToNumber', function() {
  return {
    require: 'ngModel',
    link: function(scope, element, attrs, ngModel) {
      ngModel.$parsers.push(function(val) {
        return parseInt(val, 10);
      });
      ngModel.$formatters.push(function(val) {
        return '' + val;
      });
    }
  };
});

myApp.directive('multiSelectDirect', function () {
    return {
        link: function (scope, element, attrs) {

            var options = {
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                nonSelectedText: 'Select Option',
                maxHeight: 400,
                maxWidth: 200,
                includeSelectAllOption: true,
                onChange: function (optionElement, checked) {
                  
                    if (optionElement != null) {
                        $(optionElement).removeProp('selected');
                    }
                    if (checked) {
                        $(optionElement).prop('selected', 'selected');
                    }
                    element.change();
                }
            };

            //attrs are lowercased by Angular, but options must match casing of bootstrap-multiselect
            if (attrs.enablehtml)
                options.enableHTML = JSON.parse(attrs.enablehtml); //default:  false
            if (attrs.buttonclass)
                options.buttonClass = attrs.buttonclass; //default:  'btn btn-default'
            if (attrs.inheritclass)
                options.inheritClass = JSON.parse(attrs.inheritclass); //default:  false
            if (attrs.buttonwidth)
                options.buttonWidth = attrs.buttonwidth; //default:  'auto'
            if (attrs.buttoncontainer)
                options.buttonContainer = attrs.buttoncontainer; //default:  '<div class="btn-group" />'
            if (attrs.dropright)
                options.dropRight = JSON.parse(attrs.dropright); //default:  false
            if (attrs.dropup)
                options.dropUp = JSON.parse(attrs.dropup); //default:  false
            if (attrs.selectedclass)
                options.selectedClass = attrs.selectedclass; //default:  'active'
            if (attrs.maxheight)
                options.maxHeight = attrs.maxheight; //default:  false,  // Maximum height of the dropdown menu. If maximum height is exceeded a scrollbar will be displayed.
            if (attrs.includeselectalloption)
                options.includeSelectAllOption = JSON.parse(attrs.includeselectalloption); //default:  false
            if (attrs.includeselectallifmorethan)
                options.includeSelectAllIfMoreThan = attrs.includeselectallifmorethan; //default:  0
            if (attrs.selectalltext)
                options.selectAllText = attrs.selectalltext; //default:  ' Select all'
            if (attrs.selectallvalue)
                options.selectAllValue = attrs.selectallvalue; //default:  'multiselect-all'
            if (attrs.selectallname)
                options.selectAllName = JSON.parse(attrs.selectallname); //default:  false
            if (attrs.selectallnumber)
                options.selectAllNumber = JSON.parse(attrs.selectallnumber); //default:  true
            if (attrs.selectalljustvisible)
                options.selectAllJustVisible = JSON.parse(attrs.selectalljustvisible); //default:  true
            if (attrs.enablefiltering)
                options.enableFiltering = JSON.parse(attrs.enablefiltering); //default:  false
            if (attrs.enablecaseinsensitivefiltering)
                options.enablecaseinsensitivefiltering = JSON.parse(attrs.enableCaseInsensitiveFiltering); //default:  false
            if (attrs.enablefullvaluefiltering)
                options.enableFullValueFiltering = JSON.parse(attrs.enablefullvaluefiltering); //default:  false
            if (attrs.enableclickableoptgroups)
                options.enableClickableOptGroups = JSON.parse(attrs.enableclickableoptgroups); //default:  false
            if (attrs.enablecollapsibleoptgroups)
                options.enableCollapsibleOptGroups = JSON.parse(attrs.enablecollapsibleoptgroups); //default:  false
            if (attrs.filterplaceholder)
                options.filterPlaceholder = attrs.filterplaceholder; //default:  'Search'
            if (attrs.filterbehavior)
                options.filterBehavior = attrs.filterbehavior; //default:  'text', // possible options: 'text', 'value', 'both'
            if (attrs.includefilterclearbtn)
                options.includeFilterClearBtn = JSON.parse(attrs.includefilterclearbtn); //default:  true
            if (attrs.preventinputchangeevent)
                options.preventInputChangeEvent = JSON.parse(attrs.preventinputchangeevent); //default:  false
            if (attrs.nonselectedtext)
                options.nonSelectedText = attrs.nonselectedtext; //default:  'None selected'
            if (attrs.nselectedtext)
                options.nSelectedText = attrs.nselectedtext; //default:  'selected'
            if (attrs.allselectedtext)
                options.allSelectedText = attrs.allselectedtext; //default:  'All selected'
            if (attrs.numberdisplayed)
                options.numberDisplayed = attrs.numberdisplayed; //default:  3
            if (attrs.disableifempty)
                options.disableIfEmpty = JSON.parse(attrs.disableifempty); //default:  false
            if (attrs.disabledtext)
                options.disabledText = attrs.disabledtext; //default:  ''
            if (attrs.delimitertext)
                options.delimiterText = attrs.delimitertext; //default:  ', '

            element.multiselect(options);

            // Watch for any changes to the length of our select element
            scope.$watch(function () {
                //debugger;
                return element[0].length;
            }, function () {
                scope.$applyAsync(element.multiselect('rebuild'));
            });

            // Watch for any changes from outside the directive and refresh
            scope.$watch(attrs.ngModel, function () {
                element.multiselect('refresh');
                console.log(scope.examination_id)
            });
            
        }
    };
});

myApp.controller('questionsCrt', ['$scope', '$http', '$timeout',  function($scope, $http, $timeout) {
 
$scope.totalItems = 0;
    $scope.data_view = getResultsPage(1);
    //$scope.totalL = 0;
    $scope.recPerPage = totalRecInPage;

    $scope.pagination = {
        current: 1
    };
    $scope.pageChanged = function (newPage) {
        getResultsPage(newPage);
    };
    $scope.currentPage = 1;
    function getResultsPage(pageNumber) {
        $scope.currentPage = pageNumber;
        //$scope.contained_progressbar.start();
        
        var postData;

       // postData = {'request': 'XmlHttp', 'subject_id': $scope.subject_id, 'like_name': $scope.like_name};
       postData ={};
        $http.post(ajxUrl + '/getdataajax?page=' + pageNumber, postData, {
                headers: {
                    'X-CSRF-Token': token
                }}).then(function (data, status, header, config) {
            //console.log($scope.data_view);
            $scope.data_view = data.data.dataset;
            angular.forEach($scope.data_view, function(question) {
      question.select = false;
    });
            $scope.totalItems = data.data.count;
            console.log($scope.data_view);
        });
    }
	
		$scope.deleteExamination=function(id,question_id){
			
			


        $http.post(ajxUrl + '/deleteexam', {'id': id},{
                headers: {
                    'X-CSRF-Token': token
                }}).then(function (resp) {
            
           
					
					$scope.getData(question_id);
					
					
        });
			
		};
		
		$scope.questionstatus = function(id) {
        if (confirm('Are you sure you want to Change the Status?')) {
             $http.post(ajxUrl + '/questionstatus', {'id': id},{
                headers: {
                    'X-CSRF-Token': token
                }}).then(function (resp) {
            
           //alert(resp.data.msg)
           getResultsPage($scope.currentPage);
					
					//$scope.getData(question_id);
					
					
        });
        }
    };

 
$scope.categories = categories;
$scope.examination_id = examination_id;
$scope.examination_category_id = examination_category_id;

 $scope.subcategories = [];
 $scope.type = [];
 $scope.categorieslist = function() {
  //$scope.category_id = id;
  console.log($scope.categories);
  $scope.subcategories = $scope.categories[$scope.categories.findIndex(x => x.id == $scope.examination_category_id)].examinations;
  
 };
  $scope.assignUser = function($event){
      $event.preventDefault();
      $http.post(ajxUrl + '/assignUser', {"user_id":$scope.user_id,"listQuestion":$scope.data_view}, {
                headers: {
                    'X-CSRF-Token': token
                }}).then(function (data, status, header, config) {
               
                $scope.getData($scope.questionId);
                $scope.loadingStatus = true;
				

            });
			
			
				location.reload();
  }; 
  $scope.selectAll = false;
  $scope.checkAll = function() {
      //alert( $scope.selectAll);
    angular.forEach($scope.data_view, function(question) {
      question.select = !$scope.selectAll;
    });
    console.log($scope.data_view);
};

 if ($scope.examination_category_id > 0) {
     
  $scope.categories = categories;
$scope.examination_id = examination_id;
$scope.examination_category_id = examination_category_id;
  $scope.categorieslist();
 
 }
 $scope.examinationQuestion =[];
  $scope.examinationQuestionLoading =false;
   $scope.loadingStatus = false;
  $scope.selectExamination = function(id){
     
  };
  $scope.addData=function(e){
      if(parseInt($scope.examination_id)===0){
          alert("please select");
          return false;
      }
      $http.post(ajxUrl + '/addExam', {"examination_id":$scope.examination_id,"examination_category_id":$scope.examination_category_id,"question_id":$scope.questionId}, {
                headers: {
                    'X-CSRF-Token': token
                }}).then(function (data, status, header, config) {
               
                $scope.getData($scope.questionId);
                $scope.loadingStatus = true;

            });
  };
  $scope.questionId =-1;
$scope.openModal =function(id){
      $scope.showModal= true;
      $scope.getData(id);
};
$scope.getData= function(id){
    $scope.examinationQuestion =[];
      $scope.examinationQuestionLoading =false;
    $scope.questionId =id;
        $http.get(ajxUrl + '/getdata/' + id).then(function(response) {
   
 $scope.examinationQuestion =response.data.data;
            $scope.examinationQuestionLoading =true;
           
            
     });
};

$scope.importQuestion =function(id){
      $scope.showModal1= true;
};
}]);
$(document).ready(function () {

    $('.multiselect_select').multiselect({
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        nonSelectedText: 'Select Option',
        maxHeight: 400,
        maxWidth: 200,
        includeSelectAllOption: false
    });
    //$('.multiselect_select').multiselect('select', examination_id);

//    $('.default-date-picker').datepicker({
//       // format: 'dd/mm/yyyy'
//    });
    
    });