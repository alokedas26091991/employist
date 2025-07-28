 
<?php
$c_name = $this->request->getParam('controller');
$a_name = $this->request->getParam('action');
 $active=$this->request->getAttribute('params');
   

     
?>
<nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="#"><?=$this->Html->image('admin_template/images/logo/logo_icon.png',['pathPrefix' => '','class'=>'logo_icon img-responsive'])?></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
					
                                    
									
								
								<img src="/COLOR-LOGO.png" class="img-responsive" />
							
								
                       
                        
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                
                  <ul class="list-unstyled components">
                     <li >
                        <a href="/admin/users/dashboard"  ><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
                       
                     </li>
                                                      <?php
                 //pr($menu_array);die;
                    foreach ($menu_array as $controllerName=>$value){
                        $controller_class_active = '';
                        if(is_array($value)){
                            if($controllerName == $active['controller']){
                                $controller_class_active = 'active';
                            }
                            
                        ?>
                           
                              
                                    <li class="<?=$controller_class_active?>">
                                        <a href="#<?=$controllerName?>" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="<?=$value['icon']?>"></i>
                                            <?=$value['caption']?>
                                        </a>
                                   
                                        <ul class="collapse list-unstyled" id="<?=$controllerName?>">
                                        
                                <?php foreach ($value['links'] as $l=>$cap) 
                                {
                                    
                                    $method_class_active = '';
                                    if($l == $active['action'] && $controllerName == $active['controller']){
                                        $method_class_active = 'class="active"';
                                    }
                                    
                                    
                                    echo '<li '.$method_class_active .'>'.$this->Html->link('<span data-i18n="" class="menu-title">'.'> '.$cap.'</span>',['controller'=>  \Cake\Utility\Inflector::dasherize($controllerName),'action'=>\Cake\Utility\Inflector::dasherize($l),'prefix'=>'Admin','_full'=>true],['escape'=>false]).'</li>';
                                }
                                
                        
                         
                           
                                ?>
                                        </ul>
                                    </li>
                                

                        
                    <?php
                        }
                    }
                    ?>
                     
                     
                     
                     
                     
                    
                  </ul>
               </div>
            </nav>
           