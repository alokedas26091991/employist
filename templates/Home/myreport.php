
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 py-5">
        <div class="container">
            <h1 class="display-3 text-white mb-3 animated slideInDown">My Account</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>

   
                    <li class="breadcrumb-item text-white active" aria-current="page">My Reports  </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="tab-container">
                <div class="tabs">
                    <a class="tablinks" href="/home/myaccount">
                      <img src="/assets/img/edit.png" alt="" height="30" class="image-my">  Edit Your information</a>
                    <a class="tablinks" href="/home/changepassword"> <img src="/assets/img/password.png" alt="" height="30" class="image-my"> Change Your Password</a>
                    <a class="tablinks" href="/home/addressbook"> <img src="/assets/img/address1.png" alt="" height="30" class="image-my"> My Addresses</a>
                    <a class="tablinks" href="/home/myorders"> <img src="/assets/img/purchase.png" alt="" height="30" class="image-my"> Purchased History</a>
				   <a class="tablinks" href="/home/mymocktest"> <img src="/assets/img/purchase.png" alt="" height="30" class="image-my">My Mocktest</a>
					 <a class="tablinks active" href="/home/myreport"> <img src="/assets/img/purchase.png" alt="" height="30" class="image-my">My Reports</a>
					<a class="tablinks" href="/login/logout"> <img src="/assets/img/logout.jpg" alt="" height="30" class="image-my">Logout</a>
                </div>
         
            </div>
        </div>
        <div class="col-lg-9">
<div class="main-content">
    <div id="tab4" class="tabcontent active">
        <div class="row">
            <div class="col-lg-12">
          
                <table class="table table-striped">
                    <thead class="paper-name">
                      <tr >
					    <th colspan="2">Date</th>
                        <th colspan="2">Category</th>
                        <th  colspan="2">Paper</th>
                        <th  colspan="2">Mocktest</th>
						<th  colspan="2">Action</th>
                 
                      </tr>
                    </thead>
                    <tbody >
					<?php
					if($mytest->count()>0)
					{
						foreach($mytest as $mytest)
						{
					?>
                      <tr style="color:black;">
                        <th colspan="2"><?=$mytest->attempt_date?></th>
            
                        <td  colspan="2"><?=$mytest->examination_category->name?></td>
                        <td  colspan="2"><?=$mytest->examination->name?></td>
						 <td  colspan="2"><?=$mytest->mock_test->name?></td>
                        <td  colspan="2">
                            <a href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"examdetails",$mytest->id]); ?>" target="_blank" style="background-color: orange; padding: 5px;">
                                <i class="fa fa-eye text-white"></i>
                            </a>
                        </td>
                      </tr>
                  <?php
					}
					}
					else
					{
						echo "No Record Found";
					}
					?>
                  
                    </tbody>
                  </table>
            </div>
            <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
        </div>
    </div>
  

</div>
        </div>
    </div>




</div>

