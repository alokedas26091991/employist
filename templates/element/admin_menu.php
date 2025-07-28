

  <?php $active=$this->request->getAttribute('params')?>
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
         <div class="menu_section">
                <h3>General</h3>  
			
		<ul id="main-menu-navigation" data-menu="menu-navigation" class="nav side-menu">
                <li <?php if($active['action']=='dashboard'){ echo 'class="has-sub nav-item active"';($active['controller']='');}?>>
                    
                    <?php echo $this->Html->link('<i class="fa fa-home"></i><span>Dashboard</span>',
                            ['controller' => 'Users', 'action' => 'dashboard', 'plugin' => NULL,
					'_matchedRoute' => '/admin','prefix' => 'Admin'],['escape'=>false]);?>
                    
                         
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
                                
                        <li class="has-sub nav-item <?=$controller_class_active?>"><a href="#"><i class="fa <?=$value['icon']?>"></i> <span><?=$value['caption']?></span></a>
                            <ul class="nav child_menu">
                                <?php foreach ($value['links'] as $l=>$cap) 
                                {
                                    
                                    $method_class_active = '';
                                    if($l == $active['action'] && $controllerName == $active['controller']){
                                        $method_class_active = 'class="active"';
                                    }
                                    echo '<li '.$method_class_active .'>'.$this->Html->link('<span data-i18n="" class="menu-title">'.$cap.'</span>',['controller'=>  \Cake\Utility\Inflector::dasherize($controllerName),'action'=>\Cake\Utility\Inflector::dasherize($l),'prefix'=>'Admin','_full'=>true],['escape'=>false]).'</li>';
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
			<div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
          </div>
      