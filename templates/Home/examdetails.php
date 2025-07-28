
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 py-5">
        <div class="container">
            <h1 class="display-3 text-white mb-3 animated slideInDown">My Account</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>

   
                    <li class="breadcrumb-item text-white active" aria-current="page">Report Details  </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

<div class="container">
    <div class="row">
       
        <div class="col-lg-12">
<div class="main-content">
    <div id="tab4" class="tabcontent active">
        <div class="row">
            <div class="col-lg-12">
          
                <table class="table table-bordered" id="headerTable">
                                    <thead>
                                         <tr>
                                            <th><?= $this->Paginator->sort('sl no') ?></th>

                                            <th><?= $this->Paginator->sort('question_id') ?></th>


                                           <th><?= $this->Paginator->sort('options') ?></th>
                                           <th><?= $this->Paginator->sort('Correct ans') ?></th>
                                           <th><?= $this->Paginator->sort('given ans') ?></th>
                                           <th><?= $this->Paginator->sort('is correct?') ?></th>
										   <th><?= $this->Paginator->sort('explanation') ?></th>
                                        </tr>
                                    </thead>
                                   <tbody>
        <?php 
		
		$index=0;
		foreach ($examinations as $examinationQuestion):
		$index++;
		?>
            <?php 
                    $a="";
                    $i=0;
                    foreach($examinationQuestion->question->question_answers as $option)
                    {
                        $i++;
                         $a=$i.".".$option->q_option."".$a;
                         if($option->is_correct==1)
                         {
                             $ans=$option->q_option;
                         }
                         if($option->id==$examinationQuestion->answer_id)
                         {
                             $given=$option->q_option;
                             $cor=$option->is_correct;
                         }
                    }
                    
            ?>
            <tr>
                <td><?= $index ?></td>
                
            <td>
                    <?= $examinationQuestion->question->question ?>
                </td>
            
            
                <td>
                    <?php 
                    
                    echo $a;
                    ?>
                </td>
                <td>
                    <?php
                   echo $ans;
                    ?>
                </td>
                <td>
                    <?php
                   echo $given;
                    ?>
                </td>
                <td>
                    <?=$cor==1?'Yes':'No'?>
                </td>
           <td>
                    <?= $examinationQuestion->question->explan ?>
                </td>
                   
            </tr>

        <?php endforeach; ?>
        </tbody>
                                </table>
            </div>

        </div>
    </div>
  

</div>
        </div>
    </div>




</div>

