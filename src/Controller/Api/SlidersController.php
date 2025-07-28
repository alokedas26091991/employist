<?php
declare(strict_types=1);
namespace App\Controller\Api;

use App\Controller\Api\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class SlidersController extends AppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 5,
        'maxLimit' => 15,
        'sortWhitelist' => [
            'id', 'name'
        ]
    ];
     
    public function initialize(): void
    {
        parent::initialize();
        $this->Auth->allow(['homepage','menu','pages']);
		 
		// $this->autoRender = false;
		
    }
    
        public function homepage(){
            
            
            
            $Sliders = TableRegistry::getTableLocator()->get('Sliders');
            $slideralls=$Sliders->find("all",[
    "order"=>["id"=>"desc"]
    ])->where([ 'is_deleted' => "0",'is_active'=>1 ] );
    
    foreach($slideralls as $k){
	    $k->photo=\Cake\Routing\Router::url('/slider/'.$k->photo,true);
	}
    
    $banking = TableRegistry::getTableLocator()->get('Examinations');
    $bankingalls=$banking->find("all",[
    "order"=>["Examinations.id"=>"asc"]
    ])->contain(['Reviews'])->where([ 'Examinations.is_deleted' => "0",'Examinations.is_active'=>1,'Examinations.examination_category_id'=>1 ] )->limit(5);
	
	foreach($bankingalls as $k){
	    $k->pic=\Cake\Routing\Router::url('/paper/'.$k->pic,true);
	    $k->description=strip_tags(html_entity_decode($k->description));
	    $k->description = trim(preg_replace('/\s\s+/', ' ', $k->description));
	    $k->short_description=strip_tags(html_entity_decode($k->short_description));
	    $k->short_description = trim(preg_replace('/\s\s+/', ' ', $k->short_description));
	}
	
	 $insurancealls=$banking->find("all",[
    "order"=>["Examinations.id"=>"asc"]
    ])->contain(['Reviews'])->where([ 'Examinations.is_deleted' => "0",'Examinations.is_active'=>1,'Examinations.examination_category_id'=>3 ] )->limit(5);
      
   foreach($insurancealls as $k){
	    $k->pic=\Cake\Routing\Router::url('/paper/'.$k->pic,true);
	    $k->description=strip_tags(html_entity_decode($k->description));
	    $k->description = trim(preg_replace('/\s\s+/', ' ', $k->description));
	    $k->short_description=strip_tags(html_entity_decode($k->short_description));
	    $k->short_description = trim(preg_replace('/\s\s+/', ' ', $k->short_description));
	}
        
       

$this->set([
            'success' => true,
            'data' => ['slider'=>$slideralls,'banking'=>$bankingalls,'insurance'=>$insurancealls
            
            ],
            
            'message'=>"Home page Data",
            'code'=>200,
          
            '_serialize' => ['success', 'data','message','code']
        ]);
    }
   public function pages(){
$page = TableRegistry::getTableLocator()->get('StaticPages');
//topsell
$pg=$page->find("all")->select(['id','page_name','description'])->where(['is_deleted'=>0]);
        foreach($pg as $s){
	    //$s->description=htmlentities($s->description, ENT_QUOTES);
	    $s->description=strip_tags(html_entity_decode($s->description));
	    $s->description = trim(preg_replace('/\s\s+/', ' ', $s->description));
        }
	 $this->set([
            'success' => true,
            'data' => ['page'=>$pg
            
            ],
            
            'message'=>" page Data",
            'code'=>200,
          
            '_serialize' => ['success', 'data','message','code']
        ]);
} 
  
    
    public function contact(){
         $this->_jsonVars = $this->request->input('json_decode');
	     $name=$this->_jsonVars->name;
	     $email=$this->_jsonVars->email;
	     $mobile=$this->_jsonVars->mobile;
	     $message=$this->_jsonVars->message;

			$admin_email='biswajit20391@gmail.com';
			

            $this->loadComponent('SendMail');
            $this->SendMail->sendMail(8, $admin_email,['name' =>$name , 'email'=>$email , 'mobile'=>$mobile , 'message'=>$message ]);
           
            $this->set([
            'success' => true,
            'msg' => "We have received your Enquiry"
          
            
        ]);
    }

    
    

public function menu(){
 
 $exam_cat = TableRegistry::getTableLocator()->get('ExaminationCategories');
 
 $Pro1=$exam_cat->find("all",[
		"order"=>["ExaminationCategories.id"=>"ASC"]
		])->where(['ExaminationCategories.is_active' => "1" , 'ExaminationCategories.is_deleted' => "0" ]);

	
	 $this->set([
            'success' => true,
            'data' => ['paper_category'=>$Pro1],
            'message'=>"Menu Created",
            'code'=>"200",
          
            '_serialize' => ['success', 'data','message','code']
        ]);
}

public function homeProduct(){
    
            $currentDate = date('Y-m-d');
             $advertisements = TableRegistry::get('Advertisements');


		$Pro1=$advertisements->find("all",[
		"order"=>["Advertisements.id"=>"ASC"],'contain' => ['AdvertisementItems.Products']
		])->where(['start_date <= ' => "$currentDate" , 'end_date >= ' => "$currentDate" ,'Advertisements.is_active' => "1" , 'Advertisements.is_deleted' => "0",'Advertisements.adv_type'=>'6' ]);
		
			foreach($Pro1 as $k1){
			    
			    foreach($k1->advertisement_items as $k2)
			    {
			    
			        
			        	    $k2->product->photo=\Cake\Routing\Router::url('/upload/product/'.$k2->product->photo,true);
			    }
			    

			}
			
		$Pro2=$advertisements->find("all",['order' => 'rand()',
		'limit' => 8,'contain' => ['AdvertisementItems.Products']
		])->where(['start_date <= ' => "$currentDate" , 'end_date >= ' => "$currentDate" ,'Advertisements.is_active' => "1" , 'Advertisements.is_deleted' => "0",'Advertisements.adv_type'=>'3' ]);
		
		foreach($Pro2 as $k3){
		    $k3->photo=\Cake\Routing\Router::url('/upload/homepageimage/'.$k3->photo,true);
		}
		
			 $this->set([
            'success' => true,
            'data' => ['home_products'=>$Pro1,'last_section'=>$Pro2],
          
            '_serialize' => ['success', 'data']
        ]);
}
public function allproduct(){

$Products1 = TableRegistry::get('Products');
//topsell
$Products=$Products1->find("all",[
		"order"=>["id"=>"desc"]])->where(['is_featured' => "1" , 'is_live' => "1" , 'is_active' => "1" , 'is_deleted' => "0"]);	 
	 
	foreach($Products as $k){
	    $k->photo=\Cake\Routing\Router::url('/upload/product/'.$k->photo,true);
	}
	//recent product
	$Recent_Products=$Products1->find("all",[
		"order"=>["id"=>"desc"]])->where(['is_live' => "1" , 'is_active' => "1" , 'is_deleted' => "0"]);
	 
	foreach($Recent_Products as $k1){
	    $k1->photo=\Cake\Routing\Router::url('/upload/product/'.$k1->photo,true);
	}

	
	 $this->set([
            'success' => true,
            'data' => ['slider'=>$slider,'topsell'=>$Products,'recent_product'=>$Recent_Products],
          
            '_serialize' => ['success', 'data']
        ]);
}
public function adv(){

$adv = TableRegistry::get('Advertisements');
//topsell
$adv1=$adv->find("all",[
		"order"=>["Advertisements.id"=>"DESC"],'contain' => ['AdvertisementItems']
		])->where(['is_active' => "1" , 'is_deleted' => "0",'adv_type'=>2])->orWhere(['is_active' => "1" , 'is_deleted' => "0",'adv_type'=>3])->limit(5);
	 
	foreach($adv1 as $ad){
	    $ad->photo=\Cake\Routing\Router::url('/upload/homepageimage/'.$ad->photo,true);
	}

	
	 $this->set([
            'success' => true,
            'data' => ['adv'=>$adv1],
          
            '_serialize' => ['success', 'data']
        ]);
}
public function todaydeal(){
$currentDate = date('Y-m-d');
$adv = TableRegistry::get('Advertisements');
//topsell
$adv1=$adv->find("all",[
		"order"=>["Advertisements.id"=>"ASC"],'contain' => ['AdvertisementItems','AdvertisementItems.Products']
		])->where(['start_date <= ' => "$currentDate" , 'end_date >= ' => "$currentDate" ,'Advertisements.is_active' => "1" , 'Advertisements.is_deleted' => "0",'Advertisements.adv_type'=>"7" ])->first();
	 
	foreach($adv1->advertisement_items as $ad){
	    
	        $ad->product->photo=\Cake\Routing\Router::url('/upload/product/'.$ad->product->photo,true);
	        
	        if($ad->product->offer_price==$ad->product->actual_price)
            {
				$ad->product->discount_percentage=0;
			}
			else
			{
				$ad->product->discount_percentage=number_format((100-((100 * $k->offer_price)/$k->actual_price)) , 3);
			}
			// review section
			
						 //review show section
			$Reviews = TableRegistry::get('Reviews');
		    $reviewlist=$Reviews->find("all")->contain(['Users'=> function($q) {
                return $q->autoFields(false)
                        ->select(['first_name', 'last_name', 'email', 'mobile']);
            }])->where(['Reviews.slug' => $ad->product->slug , 'Reviews.is_active' => 1]); 
          
            //debug($reviewlist->id->first());die;
			
			$ad->product->totalreviews=$reviewlist->count();
		
			$res =$Reviews->find("all")->contain(['Users'=> function($q) {
                return $q->autoFields(false)
                        ->select(['first_name', 'last_name', 'email', 'mobile']);
            }])->where(['Reviews.slug' => $ad->product->slug, 'Reviews.is_active' => 1])->select(['sum' => $reviewlist->func()->sum('Reviews.rating')])->first();
		     $ad->product->total_review_sum = $res->sum; //your total sum result
		    $average=$ad->product->total_review_sum/$ad->product->totalreviews;
			//Review count of 1,2,3,4,5
			$ad->product->average1=round($average);
	    
	    
	}

	
	 $this->set([
            'success' => true,
            'data' => ['adv'=>$adv1],
          
            '_serialize' => ['success', 'data']
        ]);
}

public function category(){
$Categories = TableRegistry::get('Categories');
//topsell

	 
		    $cat=$Categories->find("all",[
		    "order"=>["Categories.id"=>"ASC"]])->contain(['SubCategories'=> function($q) {
                return $q->autoFields(false)
                        ->select(['SubCategories.id', 'SubCategories.name','SubCategories.category_id','SubCategories.image'])->where(['SubCategories.is_active'=>1]);
            },'SubCategories.Types'=> function($q) {
                return $q->autoFields(false)
                        ->select(['Types.id', 'Types.name','Types.sub_category_id','Types.header_image'])->where(['Types.is_active'=>1]);
            }])->select(['Categories.id', 'Categories.name','Categories.header_image'])->where(['Categories.is_active'=>1]);
            
	foreach($cat as $ad){
	    
	    if($ad->header_image)
	    {
	    $ad->header_image=\Cake\Routing\Router::url('/upload/headerimages/'.$ad->header_image,true);
	    }
	    else
	    {
	        $ad->header_image="";
	    }
	    $ad->category_id=$ad->id;
	    
        	  foreach($ad->sub_categories as $ad1){
        	    if($ad1->image) 
        	    {
        	    $ad1->image=\Cake\Routing\Router::url('/upload/headerimages/'.$ad1->image,true);
        	    $ad1->header_image=$ad1->image;
        	    }
        	    else
        	    {
        	        $ad1->header_image="";
        	    }
        	    $ad1->sub_category_id=$ad1->id;
        	    
        	    
        	    $ad1->master_category_id=$ad1->category_id;
        	    
                	    foreach($ad1->types as $ad2){
                	    
                	    $ad2->type_id=$ad2->id;
                	    $ad2->master_sub_category_id=$ad2->sub_category_id;
                	    if($ad2->header_image)
                	    {
                	    $ad2->header_image=\Cake\Routing\Router::url('/upload/headerimages/'.$ad2->header_image,true);
                	    }
                	    else
                	    {
                	        $ad2->header_image="";
                	    }
                	}
        	} 
	}  
	
 
         
            
            
	 $this->set([
            'success' => true,
            'data' => ['cat'=>$cat],
          
            '_serialize' => ['success', 'data']
        ]);
}


}
   
       
        
           
        
      