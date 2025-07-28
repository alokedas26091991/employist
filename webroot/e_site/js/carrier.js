

var app = angular.module('display', [ 'ngAnimate', 'ngSanitize', 'ui.bootstrap.modal']);

app.run(['$anchorScroll', function ($anchorScroll) {
        $anchorScroll.yOffset = 50;   // always scroll by 50 extra pixels
    }]);
app.directive('loading', function () {
    return {
        restrict: 'E',
        replace: true,
        template: '<div id="overlay"><img id="loading" src="' + siteResourcePath + 'images/loading.gif" width="20" height="20" /></div>',
        link: function (scope, element, attr) {
            scope.$watch('loading', function (val) {
                if (val)
                    scope.loadingStatus = true;
                else
                    scope.loadingStatus = false;
            });
        }
    }
});


app.filter('htmlToPlaintext', function ()
{
    return function (text)
    {
        text = String(text).replace(/&nbsp;/g, '');
        return  text ? String(text).replace(/<[^>]+>/gm, '') : '';
    };
});
app.controller('displayBatch', ['$scope', '$http', '$log', '$sce',  '$anchorScroll', '$location', '$timeout', function ($scope, $http, $log, $sce, $anchorScroll, $location, $timeout) {
         $scope.slug=slug;
        $scope.currentIndex = -1;
        $scope.lastactiveIndex = 0;
        //.start();
        $scope.startQuizz = 0;
        $scope.LastTotalSecond = 0;
        $scope.istimeStart = false;
        $scope.data = [];
        $scope.pdffile = "";
        $scope.result = [];
		$scope.resultdata=[];
        $scope.msgSuccess = false;
        $scope.msgError = false;
        $scope.errmsg = "";
        $scope.loadquestiondata = true;
        $scope.startUnit = 0;
        /* comment parameter set*/
        $scope.totalComment = 0;
        $scope.isParmitComment = false;
        $scope.submitPost = false;
        $scope.sumitReplyPost = false;
        $scope.loadcommentdata = false;
        $scope.isParmitCommentReply = false;
        $scope.loadmodeData = false;
        $scope.postComment = [];
        $scope.postReply = [];
        $scope.markaslearnunit = [];
        $scope.remark = "";
        $scope.percentage = 0;
        var lastAnswerId = 0;
        $scope.nameOfTest="";
        $scope.start = function () {
           // .start();
            $scope.questions = [];
            $scope.question = []
            $scope.currentunitObj = [];
            $scope.timealloted = 0;
            $scope.timeRemaining = "00:00:00";

            $scope.wordExaminations = [];
            $scope.wordExamination = [];
            $scope.msgSuccess = false;
            $scope.msgError = false;
            $scope.errmsg = "";
            $scope.autoSubmit=false;

        };


        $scope.complete = function () {

            //.complete();
        };
        $scope.picFile = [];
        $scope.loadsectionData = false;
       
        /* Play Video Jw Player*/
        $scope.has_hd = 0;
        

        //.complete();
         $scope.loadQuize = function (slug) {
            
            $scope.percentage = 0;
            $scope.remark = "";
            $scope.activeIndex = 0;
            $scope.lastactiveIndex = 0;
            $scope.loadtestComp = false;
            $scope.istimeStart = false;
            $scope.isReview = false;
            $scope.startUnit = 3;
			 
            testnum = 0;
            $scope.timeData = '00:00';
            minutesSet = 0;
            hoursSet = 0;
            seccondSet = 0;
            hourData = 00;
            minData = 00;
            secData = 00;
            
            //.start();

              $scope.startUnit = 1;

            $scope.questions = [];
           
            $scope.loadingStatus = true;
            $scope.activeIndex = -1;
            $scope.difference=0;
             $scope.correctionAnswer=[];
            $http.get(ajxUrl + '/loadQuizzQuestionTest/' + slug).then(function (response) {
                if (response.data.success == 1) {
                    $scope.loadtestComp = true;
                    $scope.startUnit = 3;
					console.log('hi-bidesh1');
                    $scope.startQuizz = 0;
                    $scope.questions = response.data.data;
                    $scope.timealloted = $scope.questions.time_alloted;
                    $scope.nameOfTest=$scope.questions.name;
                    
                    $scope.total_marks=response.data.data.question_no;
                    
                    
                    

                    if ($scope.questions.is_lastquestion_index < 0) {
                        //console.log('hi-bidesh');
                    } else {
                        $timeout($scope.RestartQuizzQuestion(), 1500);
                    }
                    if($scope.autoSubmit){
                        
                        $scope.startQuizzQuestion();
                    }
                    if($scope.questions.needSubmit){
                         $scope.submitAnswer();
                     }

                    //console.log($scope.timealloted);

                } else if (response.data.success == 2){
                    $scope.startUnit = 2;
					
                    $scope.userAttemptedTestDetails = response.data.data;
                    
                    $scope.total_marks=response.data.result.question_no;
                    
                    
                    
                     $scope.questions = response.data.data;
                     $scope.correctionAnswer=response.data.result;
					  $scope.resultdata=response.data.result;
					  //console.log($scope.resultdata);
                     $scope.nameOfTest=$scope.questions.examination.name;
                    $scope.percentage = ($scope.userAttemptedTestDetails.marks_obtained / ($scope.userAttemptedTestDetails.examination.examination_mock_test_questions.length * $scope.userAttemptedTestDetails.examination.each_question_mark)) * 100;
                     if ($scope.percentage >= 50) {
                        $scope.remark = "Congratulations you've passed the test";
                    } else {
                        $scope.remark = "Sorry you failed the test";
                    }

                }else if (response.data.success == 3){
                    $scope.autoSubmit=true;
                    $scope.startUnit = 4;
                     $scope.questions = response.data.data;
//                    $scope.timealloted = $scope.questions.time_alloted;
                    $scope.difference=parseInt(response.data.difference);
                    $scope.comedownTime($scope.difference);
                    $scope.nameOfTest=$scope.questions.name;
                   $timeout(function(){$scope.loadQuize($scope.slug);},parseInt(response.data.difference)*1000);
                   
                }else if (response.data.success ==4){
                    $scope.startUnit = 5;
                     $scope.questions = response.data.data;
//                    $scope.timealloted = $scope.questions.time_alloted;
                    $scope.nameOfTest=$scope.questions.name;

                }else if (response.data.success ==5){
                    $scope.startUnit = 5;
                     $scope.questions = response.data.data;
//                    $scope.timealloted = $scope.questions.time_alloted;
                    $scope.nameOfTest=$scope.questions.name;

                }else if (response.data.success ==6){
                    $scope.startUnit = 6;
                     $scope.questions = response.data.data;
//                    $scope.timealloted = $scope.questions.time_alloted;
                    $scope.nameOfTest=$scope.questions.name;

                }
                $scope.loadingStatus = false;
                //.complete();

            });
            
        };
         $scope.loadQuize($scope.slug);
        /*
         *
         */
        $scope.askstartQuizzQuestion = function () {
            $scope.showModal_conf = true;
        };

        $scope.continueTest = function ($event) {
            $event.preventDefault();
            $scope.startQuizzQuestion();
            $scope.showModal_conf = false;
        };
        /*** load Html description*****/
        
               $scope.alertmsg = function (msg, type) {
            if (type == 'success') {
                $scope.msgSuccess = true;
                $scope.msgError = false;
                $scope.errmsg = "";
                $scope.successMsg = msg;
            } else if (type == 'error') {
                $scope.msgSuccess = false;
                $scope.msgError = true;
                $scope.errmsg = msg;
                $scope.successMsg = "";
            }
            $timeout($scope.hidealert, 2000);

        };
        $scope.hidealert = function () {
            $scope.msgSuccess = false;
            $scope.msgError = false;
            $scope.errmsg = "";
            $scope.successMsg = "";
        };
      
        $scope.startQuizzQuestion = function () {
            $scope.activeIndex = 0;
            $scope.lastactiveIndex = 0;
            $scope.startQuizz = 1;
            $scope.istimeStart = true;
            $scope.isReview = false;

            
           $scope.timeData = getsecondToHHMMSS(parseInt($scope.questions.time_taken));
            var res = $scope.timeData.split(':');
            $scope.timeRemaining = getRemainToHHMMSS($scope.timealloted * 60 - parseInt($scope.questions.time_taken));

            $scope.lastactiveIndex = $scope.questions.examination_mock_test_questions.length - 1;
            $scope.loadquestiondata = false;

            $timeout($scope.loadQuestion, 1000);
            $timeout(function () {
                $scope.istimeStart = true;
                testnum = parseInt($scope.questions.time_taken);
                $scope.timeRemaining = getRemainToHHMMSS($scope.timealloted * 60 - testnum);
                minutesSet = parseInt(res[0]);
                hoursSet = 0;
                seccondSet = parseInt(res[1]);
                hourData = 00;
                minData = 00;
                secData = 00;
                $scope.updateValue();
            }, 2000);
          
            //$scope.updateValue();
        };

        $scope.startManual=function(){
             $scope.autoSubmit=true;
            $scope.loadQuize($scope.slug);
            
        };
        $scope.RestartQuizzQuestion = function () {
            $scope.activeIndex = $scope.questions.is_lastquestion_index;
            $scope.lastactiveIndex = 0;
            $scope.startQuizz = 1;
            $scope.istimeStart = false;

            $scope.isReview = false;



            $scope.timeData = getsecondToHHMMSS(parseInt($scope.questions.time_taken));
            var res = $scope.timeData.split(':');
            $scope.timeRemaining = getRemainToHHMMSS($scope.timealloted * 60 - parseInt($scope.questions.time_taken));

            $scope.lastactiveIndex = $scope.questions.examination_mock_test_questions.length - 1;
            $scope.loadquestiondata = false;

            $timeout($scope.loadQuestion, 1000);

            $timeout(function () {
                $scope.istimeStart = true;
                testnum = parseInt($scope.questions.time_taken);
                $scope.timeRemaining = getRemainToHHMMSS($scope.timealloted * 60 - testnum);
                minutesSet = parseInt(res[0]);
                hoursSet = 0;
                seccondSet = parseInt(res[1]);
                hourData = 00;
                minData = 00;
                secData = 00;
                $scope.updateValue();
            }, 2000);
            //$scope.updateValue();
        };


        $scope.nextQuestion = function () {
            if ($scope.data.laststoreId > 0) {
                lastAnswerId = 0;
                for (var i = 0; i < $scope.questions.examination_mock_test_questions[$scope.activeIndex].examination_question_answers.length; i++) {
                    if (i == $scope.data.laststoreId - 1) {
                        //console.log($scope.data.laststoreId-1);
                        $scope.questions.examination_mock_test_questions[$scope.activeIndex].examination_question_answers[i].is_correct = 1;

                        lastAnswerId = $scope.questions.examination_mock_test_questions[$scope.activeIndex].examination_question_answers[i].id;
                    } else {

                        $scope.questions.examination_mock_test_questions[$scope.activeIndex].examination_question_answers[i].is_correct = 0;
                    }

                }
				console.log($scope.questions);
                $scope.questions.examination_mock_test_questions[$scope.activeIndex].is_attemped = 1;
                $scope.updateQuestionAnswer($scope.questions.id, $scope.questions.examination_mock_test_questions[$scope.activeIndex].question_id, lastAnswerId);
                //console.log($scope.questions.examination_mock_test_questions);
            }
            $scope.data.laststoreId = 0;
            if ($scope.lastactiveIndex === $scope.activeIndex) {
                return true;
            }
            $scope.loadquestiondata = false;
            //console.log($scope.data.laststoreId);

            $scope.activeIndex = $scope.activeIndex + 1;
            $timeout($scope.loadQuestion, 500);

        };
        $scope.updateQuestionAnswer = function (examinationid, questionid, answerid) {
            $http.post(ajxUrl + '/saveQuizEachStep', {'examinationid': examinationid, 'timeTaken': $scope.LastTotalSecond, 'questionid': questionid, 'answerid': answerid}, {
                headers: {
                    'X-CSRF-Token': token
                }}).then(function (data, status, header, config) {

            });
        };
        /*
         * open popup for submit answer
         */
        $scope.openSubmitAnswer = function (event) {
            event.preventDefault();
            $scope.modalEndAlert = true;
        };
        $scope.submitConfAnswer = function (event) {
            event.preventDefault();
            $scope.modalEndAlert = false;
            $scope.submitAnswer();
        };
        $scope.user_data_score = [];
        $scope.submitAnswer = function () {

            $scope.istimeStart = false;
            if ($scope.data.laststoreId > 0) {
                $scope.questions.examination_mock_test_questions[$scope.activeIndex].examination_question_answers[$scope.data.laststoreId - 1].is_correct = 1;
            }
            $scope.loadquestiondata = false;
            $scope.data.laststoreId = 0;
          
            $http.post(ajxUrl + '/saveQuizAnswerTest', {'data': $scope.questions, 'timeTaken': $scope.LastTotalSecond}, {
                headers: {
                    'X-CSRF-Token': token
                }}).then(function (data, status, header, config) {
                $scope.result = data.data.data;
				 $scope.resultdata=$scope.result.user_examination_answers;
                $scope.startQuizz = 2;
                $scope.loadquestiondata = true;
                $scope.user_data_score = data.data.user_data;
                
                    $scope.percentage = (($scope.result.marks_obtained / $scope.questions.examination_mock_test_questions.length) * 100).toFixed(2);
                    if ($scope.percentage >= 50) {
                        $scope.remark = "Congratulations you've passed the test";
                    } else {
                        $scope.remark = "Sorry you failed the test";
                    }
               
             
            });
            $scope.activeIndex = 0;
            $scope.lastactiveIndex = 0;




            var testnum = 0;
            $scope.timeData = '00:00';
            var minutesSet = 0;
            var hoursSet = 0;
            var seccondSet = 0;
            var hourData = 00;
            var minData = 00;
            var secData = 00;
            
           
        };
        $scope.loadQuestion = function () {
        $scope.question = $scope.questions.examination_mock_test_questions[$scope.activeIndex];
            
            $scope.loadquestiondata = true;
            
        };
        $scope.loadquestionfromnumber = function ($index) {
            lastAnswerId = 0;
            if ($scope.data.laststoreId > 0) {
                for (var i = 0; i < $scope.questions.examination_mock_test_questions[$scope.activeIndex].examination_question_answers.length; i++) {
                    if (i == $scope.data.laststoreId - 1) {
                        //console.log($scope.data.laststoreId-1);
                        $scope.questions.examination_mock_test_questions[$scope.activeIndex].examination_question_answers[i].is_correct = 1;

                        lastAnswerId = $scope.questions.examination_mock_test_questions[$scope.activeIndex].examination_question_answers[i].id;
                    } else {

                        $scope.questions.examination_mock_test_questions[$scope.activeIndex].examination_question_answers[i].is_correct = 0;
                    }

                }
                $scope.questions.examination_mock_test_questions[$scope.activeIndex].is_attemped = 1;
                $scope.updateQuestionAnswer($scope.questions.id, $scope.questions.examination_mock_test_questions[$scope.activeIndex].question_id, lastAnswerId);
             }
            $scope.data.laststoreId = 0;
            $scope.loadquestiondata = false;
            $scope.activeIndex = $index;
            $timeout($scope.loadQuestion, 1000);
        };

        $scope.previousQuestion = function () {
            lastAnswerId = 0;
           
            if ($scope.data.laststoreId > 0) {
                for (var i = 0; i < $scope.questions.examination_mock_test_questions[$scope.activeIndex].examination_question_answers.length; i++) {
                    if (i == $scope.data.laststoreId - 1) {
                      
                        $scope.questions.examination_mock_test_questions[$scope.activeIndex].examination_question_answers[i].is_correct = 1;
                        lastAnswerId = $scope.questions.examination_mock_test_questions[$scope.activeIndex].examination_question_answers[i].id;
                    } else {

                        $scope.questions.examination_mock_test_questions[$scope.activeIndex].examination_question_answers[i].is_correct = 0;
                    }

                }
                $scope.questions.examination_mock_test_questions[$scope.activeIndex].is_attemped = 1;
                $scope.updateQuestionAnswer($scope.questions.id, $scope.questions.examination_mock_test_questions[$scope.activeIndex].question_id, lastAnswerId);

               }
            $scope.data.laststoreId = 0;
            $scope.loadquestiondata = false;
            $scope.activeIndex = $scope.activeIndex - 1;
            $timeout($scope.loadQuestion, 1000);

           
        };
        /*clock*/
        /*############timer##############*/
        var testnum = 0;
        $scope.LastTotalSecond = 0;
        $scope.timeData = '00:00:00';
        var minutesSet = 0;
        var hoursSet = 0;
        var seccondSet = 0;
        var hourData = 00;
        var minData = 00;
        var secData = 00;

        $scope.updateValue = function () {
            if ($scope.istimeStart === true) {
                // console.log('hi'+testnum);
                $timeout(function () {

                    testnum++;
                    seccondSet++;

                    if (seccondSet > 59) {
                        minutesSet++;
                        seccondSet = 0;
                    }
                    
                    if (seccondSet < 10) {
                        secData = '0' + seccondSet;
                    } else {
                        secData = seccondSet;
                    }
                    if (minutesSet < 10) {
                        minData = '0' + minutesSet;
                    } else {
                        minData = minutesSet;
                    }
                   
                    $scope.LastTotalSecond = testnum;
                    
                    $scope.timeData = minData + ':' + secData;

                    if ($scope.timealloted > 0 && $scope.timealloted * 60 <= testnum) {
                        if ($scope.startUnit === 3) {
                            if ($scope.questions.allow_one_time) {
                                $scope.modalEndTest = true;
                            }
                            $scope.submitAnswer();
                        }

                    } else if ($scope.timealloted > 0 && $scope.timealloted * 60 > testnum) {

                        $scope.timeRemaining = getRemainToHHMMSS($scope.timealloted * 60 - testnum);

                        //console.log($scope.timeRemaining);
                    }
                    //console.log($scope.timealloted);
                    $scope.updateValue();


                }, 1000);

            } else {
                //$scope.timealloted=0;
                $scope.LastTotalSecond = testnum - 1;
                //$scope.LastTotalSecond=getsecondToHHMMSS();
                testnum = parseInt("0");
                $scope.timeData = '00:00';
                minutesSet = parseInt("0");
                hoursSet = parseInt("0");
                seccondSet = parseInt("0");
                hourData = 00;
                minData = 00;
                secData = 00;

                //alert('hi');
               


            }
        };
        function getsecondToHHMMSS() {
            var secData = $scope.LastTotalSecond;
            var hours = Math.floor(secData / 3600) < 10 ? ("00" + Math.floor(secData / 3600)).slice(-2) : Math.floor(secData / 3600);
            var minutes = ("00" + Math.floor((secData % 3600) / 60)).slice(-2);
            //var minutes = ("00" + Math.floor(secData / 60)).slice(-2);
            var seconds = ("00" + (secData % 3600) % 60).slice(-2);

            //return   minutes + ":" + seconds;
            return hours + ":" + minutes + ":" + seconds;


        };
        function getRemainToHHMMSS(remaining) {
            var secData = remaining;
            var hours = Math.floor(secData / 3600) < 10 ? ("00" + Math.floor(secData / 3600)).slice(-2) : Math.floor(secData / 3600);
            var minutes = ("00" + Math.floor((secData % 3600) / 60)).slice(-2);
            //var minutes = ("00" + Math.floor(secData / 60)).slice(-2);
            var seconds = ("00" + (secData % 3600) % 60).slice(-2);

            //return   minutes + ":" + seconds;
            return hours + ":" + minutes + ":" + seconds;


        } ;
        $scope.HHMMSS = function (SecondData) {
            var secData = SecondData;
            var hours = Math.floor(secData / 3600) < 10 ? ("00" + Math.floor(secData / 3600)).slice(-2) : Math.floor(secData / 3600);
            var minutes = ("00" + Math.floor((secData % 3600) / 60)).slice(-2);
            //var minutes = ("00" + Math.floor(secData / 60)).slice(-2);
            var seconds = ("00" + (secData % 3600) % 60).slice(-2);

            //return   minutes + ":" + seconds;
            return hours + ":" + minutes + ":" + seconds;


        };
        $scope.isStart=false;
        $scope.remainTime="00:00:00";
        $scope.comedownTime=function(remaining){
            
            if(remaining>0){
                 
                $timeout(function(){
                    $scope.remainTime=getComeDownToHHMMSS(remaining);
                    $scope.comedownTime(remaining-1);
                },1000);
            }else{
                $scope.isStart=true;
            }
           
        };
       function getComeDownToHHMMSS(remaining) {
            var secData = remaining;
            var hours = Math.floor(secData / 3600) < 10 ? ("00" + Math.floor(secData / 3600)).slice(-2) : Math.floor(secData / 3600);
            // var minutes = ("00" + Math.floor((secData % 3600) / 60)).slice(-2);
            var minutes = ("00" + Math.floor(secData / 60)).slice(-2);
            var seconds = ("00" + (secData % 3600) % 60).slice(-2);

           // return   minutes + ":" + seconds;
            return hours + ":" + minutes + ":" + seconds;


        } ;
        $scope.questionTittle = "";
        $scope.showModal = false;
        $scope.isPause = false;
        $scope.questionType = 0;
        $scope.questionDescription = "";
        /*
         * cancel confirm alert start one time test
         */
        $scope.cancelstartalt = function (event) {
            event.preventDefault();
            $scope.showModal_conf = false;

        };
        
        $scope.autoendcancel = function () {
            $scope.modalEndTest = false;
        };
        $scope.endcancel = function (event) {
            event.preventDefault();
            $scope.modalEndAlert = false;
        };

        
            }]);

