<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="format-detection" content="telephone=no">
        <!-- Google font -->
        <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Raleway:300,400,700,900' rel='stylesheet' type='text/css'>
        <!-- Css -->
        <?php echo $this->Html->css(['/e_site/css/library/bootstrap.min', '/e_site/css/library/font-awesome.min', '/e_site/css/library/owl.carousel', '/e_site/css/md-font', '/e_site/css/style', '/e_site/css/custom', '/e_site/css/loading-bar', '/e_site/css/preloader/main']) ?>

      
        <title>Exam Panel</title>
         <style>
            .div-selected-section 
            {
                border: .5px #2D85B7 dashed;
                border-top: 0;
            }
            .div-selected-chapter
            {
                border-bottom: .5px #37ABF2 dashed;

            }
            .section-learn-outline 
            {
                margin-top: .5%;
            }
            .section-title-color
            {
                background-color: #2D85B7!important;
            }
            .section-learn-outline .section-title{
                padding: 6px 21px 6px 16px;
            }
            .section-learn-outline .section-title{
                padding: 12px 46px 12px 16px;
                line-height: 23px!important;
            }
            .title_unit{
                padding: 0.5px 130px 0.5px 30px!important;
            }
            .add-button
            {
                margin:2% 0;
            }
            .textmarg{
                margin:2% 2%;
            }
            .add_section{
                background-color: #2D85B7!important;
            }
            .add_unit
            {
                background-color: #ccc!important;
            }

            #overlay {
                position: absolute;
                left: 0;
                top: 0;
                bottom: 0;
                right: 0;
                background: #fff;
                opacity: 0.8;
                filter: alpha(opacity=80);
                z-index: 10;
            }
            #loading {
                width: 50px;
                height: 57px;
                position: absolute;
                top: 50%;
                left: 50%;
                margin: -28px 0 0 -25px;
            }
            .edit{
                cursor: pointer;
            }
            .toggle-section {
                border: 1px solid #fff;
                height: 22px;
                line-height: 20px;
                text-align: center!important;
                width: 22px!important;
                color:#fff!important;
                display: inline-block;
                float:right;
                margin-right:-17px;
            }
            .toggle-section.active .fa {
                transform: rotate(90deg);
            }
            .section-outline{
                margin-top: .5%;

            }
            .title-section {
                background-color: #37abf2;
                padding: 12px 130px 12px 30px;
                position: relative;
            }
            .title-chapter {
                background-color: #37abf2;
                padding: 12px 46px 12px 30px;
                position: relative;
                font-size: 13px;
                font-weight: 700;
                line-height: 23px;
            }
            #loading-bar .bar {
                background: #C62828!important;
                top: 62px!important;
            }
            #loading-bar-spinner .spinner-icon {
                border-top-color:  #C62828!important;
                border-left-color: #C62828!important;
            }
            #loading-bar .peg {
                -moz-box-shadow: #C62828 1px 0 6px 1px;
                -ms-box-shadow: #C62828 1px 0 6px 1px;
                -webkit-box-shadow: #C62828 1px 0 6px 1px;
                box-shadow: #C62828 1px 0 6px 1px;
            }
            #loading-bar-spinner {
                top: 64px!important;

            }

            .glyphicon.spinning {
                animation: spin 1s infinite linear;
                -webkit-animation: spin2 1s infinite linear;
                color:#37abf2;
                font-size:26px;
                margin-right: 50px;
            }

            @keyframes spin {
                from { transform: scale(1) rotate(0deg); }
                to { transform: scale(1) rotate(360deg); }
            }

            @-webkit-keyframes spin2 {
                from { -webkit-transform: rotate(0deg); }
                to { -webkit-transform: rotate(360deg); }
            }
            .glyphicon.spining-button{
                margin-right: 25px;
                font-size:12px!important;
            }
            <!-- circle button  -->
            .btn-circle {
                width: 30px;
                height: 30px;
                text-align: center;
                padding: 6px 0;
                font-size: 12px;
                line-height: 1.428571429;
                border-radius: 15px;
            }
            .btn-circle.btn-lg {
                width: 50px;
                height: 50px;
                padding: 10px 16px;
                font-size: 18px;
                line-height: 1.33;
                border-radius: 25px;
            }
            .btn-circle.btn-xl {
                width: 70px;
                height: 70px;
                padding: 10px 16px;
                font-size: 24px;
                line-height: 1.33;
                border-radius: 35px;
            }
            .margin-top{
                margin-top:60px;
            }
            .voffset{ margin-top: 2px; 
                      min-width:41px;
            }
            .tit-section{
                cursor: pointer;
            }
            .marginspan25{
                margin-left:3px;
            }
            .marginspan4{
                margin-left:3px;
            }
            .discussion-learn-body .inner .list-discussion .list-body ul {

                padding-left: 40px;
            }
            .comment-meta {
                display: inline-block;
                margin-bottom: 14px;
            }
            .comment-reply-img{
                width:25px!important;
                height:25px!important;
            }
            .comment-title {
                position: relative;
            }
            .comment-title h5 {
                background-color: #11538c;
                color: #fff;
                display: block;
                font-family: "Lato",sans-serif;
                font-size: 18px;
                font-weight: 400;
                line-height: 40px;
                padding: 0 22px;
            }
            .table-text{

                color: #666;
                font-family: "Raleway",sans-serif;
                font-size: 14px;


            }
            .rating-static{
                font-size: 22px;
            }
            .rating-static .filled {
                color: #2a7504;
            }
            .rating-static span{
                color:#aaa;
            }
                .modal{z-index: 100000!important;}
            .modal-backdrop {
             z-index: 99999!important;
            }
            [ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak, .ng-hide {
                display: none !important;
            }
            .modal{
                z-index:100000;
            }
			.funkyradio div {
  clear: both;
  overflow: hidden;
}
.question-content-wrap .funkyradio p {
    margin-top: -35px;
    margin-bottom: 0;
}
.funkyradio label {
  width: 100%;
  border-radius: 3px;
  border: 1px solid #72e6df ;
  font-weight: normal;
  padding: 20px 20px 20px 55px;
}

.funkyradio input[type="radio"]:empty,
.funkyradio input[type="checkbox"]:empty {
  display: none;
}

.funkyradio input[type="radio"]:empty ~ label,
.funkyradio input[type="checkbox"]:empty ~ label {
  position: relative;
  line-height: 2.5em;
  /*text-indent: 3.25em;*/
  margin-top: 2em;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}
.question-content-wrap .question-content .md {
    color: #002147;
    margin-top: 5px;
    line-height: 1.5em;
    font-size: 35px;
    font-weight: bold;
}
.btn-style-sd, .btn-style-sd:focus {
    background-color: #002147;
    color: #fff;
}
.qst p{
    font-size: 18px;
}
.funkyradio input[type="radio"]:empty ~ label:before,
.funkyradio input[type="checkbox"]:empty ~ label:before {
  position: absolute;
  /*display: block;*/
  top: 0;
  bottom: 0;
  left: 0;
  content: '';
  width: 2.5em;
  background: #72e6df;
  border-radius: 3px 0 0 3px;
  display: flex;
    align-items: center;
}

.funkyradio input[type="radio"]:hover:not(:checked) ~ label,
.funkyradio input[type="checkbox"]:hover:not(:checked) ~ label {
  color: #888;
}

.funkyradio input[type="radio"]:hover:not(:checked) ~ label:before,
.funkyradio input[type="checkbox"]:hover:not(:checked) ~ label:before {
  content: '\2714';
  text-indent: .9em;
  color: #002147;
}

.funkyradio input[type="radio"]:checked ~ label,
.funkyradio input[type="checkbox"]:checked ~ label {
  color: #777;
      border-color: #002147;
}

.funkyradio input[type="radio"]:checked ~ label:before,
.funkyradio input[type="checkbox"]:checked ~ label:before {
  content: '\2714';
  text-indent: .9em;
  color: #333;
  background-color: #ccc;
}

.funkyradio input[type="radio"]:focus ~ label:before,
.funkyradio input[type="checkbox"]:focus ~ label:before {
  box-shadow: 0 0 0 3px #999;
}

.funkyradio-default input[type="radio"]:checked ~ label:before,
.funkyradio-default input[type="checkbox"]:checked ~ label:before {
  color: #333;
  background-color: #ccc;
}

.funkyradio-primary input[type="radio"]:checked ~ label:before,
.funkyradio-primary input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #337ab7;
}

.funkyradio-success input[type="radio"]:checked ~ label:before,
.funkyradio-success input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #5cb85c;
}

.funkyradio-danger input[type="radio"]:checked ~ label:before,
.funkyradio-danger input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #d9534f;
}

.funkyradio-warning input[type="radio"]:checked ~ label:before,
.funkyradio-warning input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #f0ad4e;
}
.question-content-wrap .question-content .sm {
    color: #002147;
    margin-top: 5px;
    font-weight: bold;
    font-size: 22px;
}
.question-sidebar .title-sb {
    color: #002147;
}
.funkyradio-info input[type="radio"]:checked ~ label:before,
.funkyradio-info input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #002147;
  display: flex;
    align-items: center;
}
.question-sidebar {
    position: relative;
     background-color: #fff; 
    padding-bottom: 90px;
    border: solid 1px #ccc;
	margin: 18px;
	border-radius: 20px;
}
.question-content-wrap .question-content {
    padding: 60px 30px 60px 60px;
    min-height: 700px;
    border: 1px solid #ccc;
	margin: 18px;
	border-radius: 23px;
	background: #fff;
}
.continue-btn {
    margin-top: 25px;
    border: none;
    font-size: 1.7rem;
    background: #1c69ab;
    color: #fff;
    padding-left: 22px;
    padding-right: 14px;
    padding-top: 1px;
    padding-bottom: 4px;
    border-radius: 10px;
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.16), 0 3px 1px -2px rgba(0, 0, 0, .2), 0 1px 5px 0 rgba(21, 21, 21, 0.4);
    border: 2px solid #1c69ab;
    position: relative;
}
.mc-btn{
border-radius: 21px!important;
}

.d-flex{
    display: flex;
}
.justify-content-center{
    justify-content: center;
}
.bg-transparent{
    background: transparent !important;
}
.start-test{
    text-align:center;
    display:grid;
    place-items:center;
  
}

.intro-text{
    font-size:20px;
    color:black;
    text-align:justify;
}
.desk-done{
    display:none;
}
    .result-h2{
 font-size:26px;  
 color:black;
}
.explana{
    background: #4c9c73;
    color: white;
    padding: 12px;
        border-radius: 20px;
}
.explana span{
    text-align:justify;
    font-size:18px;
    font-weight:700;
    line-height:1.5;
}
.expla-text{
          font-size: 18px;
    color: black;
    background-color: white;
    padding: 10px;
    text-align: center;
    border-radius: 10px;
      font-weight:700;
      margin-bottom: 12px;
}
.correc .th-correc{
    font-size:25px;
    background-color:#FF4917 !important;
    color:white;
     font-weight:700;
     text-align:center;
         border-radius: 20px 20px 0px 0px;
}
.dghasgd{
    color:black;
    font-size:20px;
    font-weight:700;
}
@media(max-width:767px){
    .intro-text{
    padding:20px;
}
    .mob-dis{
        flex-direction:column;
    }
    .question-sidebar{
        display:none;
    }
    .desk-done{
        display:block;
    }
    .result-h2{
 font-size:16px;  
 color:black;
}
.question-content-wrap .question-content{
    width:100%;
    padding:10px;
    margin:0;
}
.explana span{
    text-align:justify;
    font-size:14px;
    font-weight:700;
}
.correc .th-correc{
    font-size:20px;
    background-color:#FF4917 !important;
    color:white;
     font-weight:700;
         border-radius: 20px 20px 0px 0px;
}
}



        </style>
        
        <script>
        // Disable right-click
        document.addEventListener('contextmenu', function(event) {
            event.preventDefault();
        });

        // Disable copy
        document.addEventListener('copy', function(event) {
            event.preventDefault();
        });
    </script>
    </head>
    <body id="page-top">

        <!-- PAGE WRAP -->
        <div id="page-wrap"  ng-app="display" ng-controller="displayBatch" data-ng-init="course_id = '1'; loadingStatus = 'true';loadsectionData = false;startUnit = 0;batch_id = '';" ng-cloak>

            <div class="top-nav">

                <h4 class="sm black bold"> Paper Name - {{nameOfTest}} </h4>

                <ul class="top-nav-list">
                   
                    <li class="backpage">
                        <?php
                        $prefix = NULL;
                        if ($this->request->getSession()->read('Auth.User.is_admin') == 1) {
                            echo $this->Html->link('<i class="icon md-close-1"></i>', [], ['escape' => FALSE, 'onclick' => 'closePage()']);
                            ?>
                            <script>
                                        function closePage() {
                                            window.close();
                                        };
                            </script>
                            <?php
                        } else {
                            if ($this->request->getSession()->read('Auth.User.is_author') == 1) {
                                $prefix = 'author';
                            } elseif ($this->request->getSession()->read('Auth.User.is_student') == 1) {
                                $prefix = 'student';
                            }
                           // echo $this->Html->link('<i class="icon md-close-1">Dashboard</i>', ['controller' => 'Home', 'action' => 'dashboard', 'prefix' => 'student'], ['escape' => FALSE]);
                        }
                        ?>
                    </li>
                </ul>

            </div>
                <section id="quizz-intro-section" class="quizz-intro-section learning-section learn-section learning-section-fly" ng-if="startUnit == 1">
                <div class="container">

                    

                    <div class="question-content-wrap">

                        <div class="row">

                            <div class="col-md-12" >
                                <div class="question-content">

                                    
                                    <p style="font-size:17px!important;">Please wait before load this examination......</p>
                                   
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </section>


                  <section id="quizz-intro-section" class="quizz-intro-section learning-section learn-section learning-section-fly" ng-if="startUnit == 2">
                <div class="container">

                    

                    <div class="question-content-wrap">
							
                        <div class="row">
									
                            <div class="col-md-12" >
                                <div class="question-content">

                                
                                    <p style="font-size:17px!important;">   Time Taken : {{HHMMSS(userAttemptedTestDetails.time_taken)}} </p>
                       
                                
                                   <table class="table-question">
                                        <thead>
                                            <tr >
                                                <th colspan="2">Correction</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="rs in correctionAnswer">
                                                <td class="td-quest">{{$index + 1}}</td>


                                                <td class="td-quest" >
                                                    <h2 ng-bind-html="rs.examination_question.question.question" class="result-h2"></h2>
                                                    <ul class="list-group"> 
                                                        <li class="list-group-item" ng-repeat="ans in rs.examination_question.question.question_answers" ng-class="(rs.examination_answer_id > 0 && ans.id == rs.examination_answer_id) ? ' list-group-item-info' : 'list-group-item-default'">  
                                                            <span>
                                                                <i ng-if="ans.is_correct" class="icon icon-val md-check-2" ></i>

                                                                  <i ng-if="rs.examination_answer_id > 0 && !rs.is_correct && ans.id == rs.examination_answer_id" class="icon icon-err md-close-2"></i>
                                                            </span>
                                                            <span ng-class="( ans.id == rs.examination_answer_id) ? 'marginspan4' : 'marginspan25'"  ng-bind-html="ans.q_option | htmlToPlaintext"></span>
                                                        </li>
                                                    </ul>
                                                </td>  </tr>


                                        </tbody>
                                    </table>

                              
                                </div>
                                  

                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <section id="quizz-intro-section" class="quizz-intro-section learning-section learn-section learning-section-fly" ng-if="startUnit == 4">
                <div class="container">

                    

                    <div class="question-content-wrap">

                        <div class="row">
							
                            <div class="col-md-12" >
                                <div class="question-content">
                                    <h4 class="md">Introduction</h4>
                                    <p  ng-bind-html="questions.description"></p>
                
                                    <p><strong>Examination yet not started. Please wait remaining time:</strong> {{remainTime}}</p>
                                    <div class="form-action"  ng-cloak>
                                        <input type="submit" ng-click="isStart && startManualQuestion()" value="Start Examination" class="continue-btn btn-style-sd">
                                        <span class="total-time">Total time : {{questions.time_alloted}} minutes</span>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <section id="quizz-intro-section" class="quizz-intro-section learning-section learn-section learning-section-fly" ng-if="startUnit == 5">
                <div class="container">

                    

                    <div class="question-content-wrap">

                        <div class="row">

                            <div class="col-md-12" >
                                <div class="question-content">

                                    <p class="dghasgd"> Dear Participant, </p>
                                    <p class="dghasgd;">Time Over  <br/>The details are as follows -  </p>
                                   
                                    <p class="dghasgd;">You're not allowed to take this test again.for any further assistance.</p>
                                    <p class="dghasgd">Best Regards</p>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <section id="quizz-intro-section" class="quizz-intro-section learning-section learn-section learning-section-fly" ng-if="startUnit == 6">
                <div class="container">

                    

                    <div class="question-content-wrap">

                        <div class="row">

                            <div class="col-md-12" >
                                <div class="question-content">

                                    <p class="dghasgd"> Dear Participant, </p>
                                    <p class="dghasgd">Please Wait for your result at end of examination. </p>
                                   
                                     <p class="dghasgd">Best Regards</p>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </section>


              <section id="quizz-intro-section" class="quizz-intro-section learning-section learn-section learning-section-fly" ng-if="startUnit == 3" >
                <div class="container">

                    

                    <div class="question-content-wrap bg-transparent">
						
                        <div class="row d-flex justify-content-center mob-dis">
                            <div class="col-md-8" ng-if="startQuizz == 0">
                                <div class="question-content start-test">
                                     <h4 class="md">{{nameOfTest}}</h4 
                                    
                                 
                                    <div class="form-action"  ng-cloak>
                                        <input type="submit" ng-click="questions.examination_mock_test_questions.length > 0 && startQuizzQuestion()" value="Start Test" class="mc-btn btn-style-sd">
                                        <h6 class="total-time">Total time : {{questions.time_alloted}} minutes</h6>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-8" ng-if="startQuizz == 1">
                                <div class="question-content" ng-hide="loadquestiondata">
                                    <div class="text-center"> <i class="glyphicon glyphicon-refresh spinning"></i></div>
                                </div>							
                                <div class="question-content"  ng-show="loadquestiondata">
     <div class="desk-done">
            <span ng-if=" timealloted == 0"> {{timeData}}</span>
                                            <span ng-if="timealloted > 0">Time: {{timeRemaining}}</span>
     </div>
                                    <h4 class="sm">Question {{activeIndex + 1}} </h4>
                                    <p class="qst" ng-bind-html="question.question.question"></p>
                                    <div class="answer">
                                        <h4 class="sm">Answer</h4>
                                        <!--ul class="answer-list">
                                            <li ng-repeat="ops in question.examination_question_answers">
                                                <div >
                                                    <input type="radio" name="radio[]" ng-model="data.laststoreId" id="radio-{{$index + 1}}" ng-true-value="1" ng-false-value="0" value="{{$index + 1}}" ng-checked="ops.is_correct == 1">
                                                    <label for="radio-{{$index + 1}}">
                                                        <i class="icon icon_radio"></i><span ng-bind-html="ops.q_option | htmlToPlaintext"></span>

                                                    </label>
                                                </div>
                                            </li>

                                        </ul-->
											<div class="funkyradio">
												<div class="funkyradio-info" ng-repeat="ops in question.examination_question_answers">
													<input type="radio" name="radio[]" ng-model="data.laststoreId" id="radio-{{$index + 1}}" ng-true-value="1" ng-false-value="0" value="{{$index + 1}}" ng-checked="ops.is_correct == 1">
                                                    <label for="radio-{{$index + 1}}">
                                                        <i class="icon icon_radio"></i><span ng-bind-html="ops.q_option"></span>

                                                    </label>
												</div>
											</div>
                                    </div>

                                    <a href="javascript:void(0)" class="mc-btn btn-success" ng-click="previousQuestion($event)" ng-if="activeIndex > 0">&laquo; Previous</a>
                                    <a href="javascript:void(0)" class="mc-btn btn-success" ng-click="nextQuestion($event)" ng-if="activeIndex >= 0 && activeIndex < lastactiveIndex">Next &raquo;</a>
                                    <a href="javascript:void(0)" ng-if=" activeIndex === lastactiveIndex && questions.allow_one_time" class="mc-btn btn-style-sd" ng-click="openSubmitAnswer($event)">Submit the test</a>
                                    <a href="javascript:void(0)" ng-if=" activeIndex === lastactiveIndex && !questions.allow_one_time" class="mc-btn btn-style-sd" ng-click="submitAnswer()">Submit the test</a>
										<div style="text-align:center"><span class="voffset" ng-if="istimeStart"><ul class="pagination">
											<li ng-if="istimeStart" ng-repeat="q in questions.examination_mock_test_questions">
											<a ng-class="activeIndex == $index ? 'active btn-danger' : ((q.is_attemped == '1') ? 'active btn-info' : 'btn-default')" ng-click="loadquestionfromnumber($index)">{{$index + 1}}</a></li>
											
									  </ul></span></div>
									  
                                </div>
                            </div>
                            <div class="col-md-12" ng-if="startQuizz == 2">
                                  <div class="question-content">
                                     
                                    <p class="dghasgd"> Dear Participant, </p>
                     
                                    <p class="dghasgd">  You Have Taken : {{HHMMSS(result.time_taken)}} </p>
                                      <p style="font-size:17px!important;">Total Marks : {{total_marks}}</p>
                                    <p class="dghasgd"> Marks Obtained : {{result.marks_obtained}} <strong ng-if="percentage > 0">( {{percentage}}% )</strong> </p>
                         
                                    <table class="table-question">
                                        <thead>
                                            <tr class="correc">
                                                <th colspan="2" class="th-correc">Correction</th>
                                                <!--<th class="right-answer">% Right Answer</th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="rs in resultdata">
                                                <td class="td-quest" ng-show="rs.is_correct == 0">{{$index + 1}}</td>

                                               <!-- <td  class="td-quest">-->
                                               <!--        <i ng-if="rs.examination_answer_id>0 && rs.is_correct==1" class="icon icon-val md-check-2" ></i><i ng-if="rs.examination_answer_id>0 && rs.is_correct==0" class="icon icon-err md-close-2"></i> -->
                                               <!--</td>-->

                                                <td class="td-quest" ng-show="rs.is_correct == 0">
                                                    <h2 ng-bind-html="questions.examination_mock_test_questions[$index].question.question" class="result-h2"></h2>
                                                    <ul class="list-group"> 
                                                        <li class="list-group-item" ng-repeat="ans in questions.examination_mock_test_questions[$index].examination_question_answers" ng-class="(rs.answer_id > 0 && ans.id == rs.answer_id) ? ' list-group-item-info' : 'list-group-item-default'">  
                                                            <span>
                                                                
                                                                <svg ng-if="ans.id == rs.correct_answer" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#7ed321" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                                                <svg ng-show="rs.answer_id > 0 && rs.is_correct == 0 && ans.id == rs.answer_id" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#f5a623" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                                                </span>
                                                            <span ng-class="(ans.id == rs.correct_answer || ans.id == rs.answer_id) ? 'marginspan4' : 'marginspan25'"  ng-bind-html="ans.q_option | htmlToPlaintext"></span>
                                                        </li>
                                                    </ul>
                                                    <div class="explana">
                                                        <div class="expla-text">Explanation</div>
                                                        <span   ng-bind-html="questions.examination_mock_test_questions[$index].question.explan"></span>
                                                    </div>
                                                </td>

                                             
                                            </tr>


                                        </tbody>
                                    </table>

                                </div>
                           
                            </div>
							




                            <div class="col-md-4" ng-hide="startQuizz == 2 || startQuizz == 0">
                                <aside class="question-sidebar">
                                    <div class="score-sb" style="height: auto; max-height: none;">
                                        <h4 class="title-sb sm bold" ng-if="istimeStart">
                                            <span ng-if=" timealloted == 0"> {{timeData}}</span>
                                            <span ng-if="timealloted > 0">Time: {{timeRemaining}}</span>
                                        </h4>
                                       
                                        <span class="voffset text-center"> 
                                           <canvas id="canvas" width="200" height="200" style="margin-left:15%">
</canvas>

<script>
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var radius = canvas.height / 2;
ctx.translate(radius, radius);
radius = radius * 0.90
setInterval(drawClock, 1000);

function drawClock() {
  drawFace(ctx, radius);
  drawNumbers(ctx, radius);
  drawTime(ctx, radius);
}

function drawFace(ctx, radius) {
  var grad;
  ctx.beginPath();
  ctx.arc(0, 0, radius, 0, 2*Math.PI);
  ctx.fillStyle = 'white';
  ctx.fill();
  grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
  grad.addColorStop(0, '#333');
  grad.addColorStop(0.5, 'white');
  grad.addColorStop(1, '#333');
  ctx.strokeStyle = grad;
  ctx.lineWidth = radius*0.1;
  ctx.stroke();
  ctx.beginPath();
  ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
  ctx.fillStyle = '#333';
  ctx.fill();
}

function drawNumbers(ctx, radius) {
  var ang;
  var num;
  ctx.font = radius*0.15 + "px arial";
  ctx.textBaseline="middle";
  ctx.textAlign="center";
  for(num = 1; num < 13; num++){
    ang = num * Math.PI / 6;
    ctx.rotate(ang);
    ctx.translate(0, -radius*0.85);
    ctx.rotate(-ang);
    ctx.fillText(num.toString(), 0, 0);
    ctx.rotate(ang);
    ctx.translate(0, radius*0.85);
    ctx.rotate(-ang);
  }
}

function drawTime(ctx, radius){
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    //hour
    hour=hour%12;
    hour=(hour*Math.PI/6)+
    (minute*Math.PI/(6*60))+
    (second*Math.PI/(360*60));
    drawHand(ctx, hour, radius*0.5, radius*0.07);
    //minute
    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
    drawHand(ctx, minute, radius*0.8, radius*0.07);
    // second
    second=(second*Math.PI/30);
    drawHand(ctx, second, radius*0.9, radius*0.02);
}

function drawHand(ctx, pos, length, width) {
    ctx.beginPath();
    ctx.lineWidth = width;
    ctx.lineCap = "round";
    ctx.moveTo(0,0);
    ctx.rotate(pos);
    ctx.lineTo(0, -length);
    ctx.stroke();
    ctx.rotate(-pos);
}
</script>
                                        </span>

                                    </div>
                                  
                                    <div class="text-center">
                                        <a href="javascript:void(0)" ng-if="activeIndex > 0" class="mc-btn btn-style-sd" ng-click=" activeIndex > 0 && submitAnswer()">Submit the test</a>
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
          <div modal="showModal_conf" class="modal fade" tabindex="-1" role="dialog" style="display: none; z-index: 1050;margin-top:200px; ">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" ng-click="cancelstartalt($event)"><span aria-hidden="true">&times;</span></button>
                            Alert!
                        </div>
                        <div class="modal-body" id="confirmMessage">
                            <strong>Wait! </strong>You are about to start a certification test. Once you click the OK button, you will have to attempt the test. Only single attempt is allowed.<br/> Do you want to start your test?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" ng-click="continueTest($event)">Ok</button>
                            <button type="button" class="btn btn-default" ng-click="cancelstartalt($event)">Cancel</button>
                        </div>
                    </div>
                </div>
            </div> 
            <div modal="modalEndTest" class="modal fade" tabindex="-1" role="dialog" style="display: none; z-index: 1050;margin-top:200px; ">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" ng-click="cancelstartalt($event)"><span aria-hidden="true">&times;</span></button>
                            Alert!
                        </div>
                        <div class="modal-body" id="confirmMessage">
                            Time is over. Test is automatically submitted for evaluation.</div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" ng-click=" autoendcancel($event)">Ok</button>
                        </div>
                    </div>
                </div>
            </div> 
            <div modal="modalEndAlert" class="modal fade" tabindex="-1" role="dialog" style="display: none; z-index: 1050;margin-top:200px; ">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" ng-click="cancelstartalt($event)"><span aria-hidden="true">&times;</span></button>
                            Alert!
                        </div>
                        <div class="modal-body" id="confirmMessage">
                            <strong>Wait! </strong> You are about to finish your test. Once you click the OK button, you will not be able to return to these questions.​<br/> ​Do you want to finish your test?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" ng-click=" submitConfAnswer($event)">Ok</button>
                            <button type="button" class="btn btn-default" ng-click=" endcancel($event)">Cancel</button>

                        </div>
                    </div>
                </div>
            </div>
          
        </div>
        <!-- END / PAGE WRAP -->

        <!-- Load jQuery -->



        <script>
            var e_siteResourcePath = '<?php echo $this->Url->build('/e_site/') ?>';
             var token = "<?= $this->request->getAttribute('csrfToken') ?>";
        </script>    
        <?php echo $this->Html->script(['/e_site/js/library/jquery-1.11.0.min', '/e_site/js/library/bootstrap.min', '/e_site/js/library/jquery.owl.carousel', '/e_site/js/library/jquery.appear.min', '/e_site/js/library/perfect-scrollbar.min', '/e_site/js/library/jquery.easing.min']) ?>

        <script>
            var ajxUrl = '<?php echo $this->Url->build('/examinations') ?>';
            var slug = '<?= $slug ?>';
            var s3link = '';
              var user_name = '<?=$this->request->getSession()->read('Auth.User.first_name'). ' '.$this->request->getSession()->read('Auth.User.last_name')?>';
    var user_image = '<?=$this->request->getSession()->read('Auth.User.photo')?>';
            </script>

        <?php echo $this->Html->script(['/e_site/js/library/jquery-ui.min', '/admin_template/js/angular-1.8.2/angular.min.js', '/e_site/js/library/angular-ui-bootstrap-modal', '/admin_template/js/angular-1.8.2/angular-animate.min', '/e_site/js/loading-bar.js', '/e_site/js/library/jquery.magnific-popup.min', '/admin_template/js/angular-1.8.2/angular-sanitize.min', '/e_site/js/library/lazy-scroll.min']) ?>

        <?php echo $this->Html->script('/e_site/js/scripts') ?>
        <?php echo $this->Html->script('/e_site/js/carrier.js?v=1') ?>

    </body>
</html>