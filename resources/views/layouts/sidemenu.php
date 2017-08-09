<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="" href="<?php echo url('/'); ?>">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php 
                $active = isset($_REQUEST['c']);
                if($active)
                { ?>
                <li class="sub-menu side-menu-color" >
                    <a href="javascript:;">
                        <i class="fa fa-laptop" ></i>
                        <span>Category</span>
                    </a>
                    
                        <li class="menu-left sub-menu side-menu-color"><a  href="<?php echo URL::to('category/create'); ?>?c=1">Add</a></li>
                        <li class="menu-left sub-menu side-menu-color"><a  href="<?php echo URL::to('category'); ?>?c=1">List</a></li>

                </li>
                <?php
                }else
                {?>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-laptop"></i>
                        <span>Category</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo URL::to('category/create'); ?>?c=1">Add</a></li>
                        <li><a href="<?php echo URL::to('category'); ?>?c=1">List</a></li>
                    </ul>
                </li>
                  <?php }?>
				  <?php 
                $active = isset($_REQUEST['s']);
                if($active)
                { ?>
                <li class="sub-menu dcjq-parent-li side-menu-color">
                    <a href="javascript:;" class="dcjq-parent">
                        <i class="fa fa-plus-square"></i>
                        <span>Service Provider</span>
                        <span class="dcjq-icon"></span>
                    </a>
                    
                         <li class="menu-left sub-menu side-menu-color"><a href="<?php echo URL::to('provider/create'); ?>?s=2">Add</a></li>
                        <li class="menu-left sub-menu side-menu-color"><a href="<?php echo URL::to('provider'); ?>?s=2">List</a></li>
                   
                </li>
				 <?php
                }else
                {?>
			<li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent">
                        <i class="fa fa-plus-square"></i>
                        <span>Service Provider</span>
                        <span class="dcjq-icon"></span>
                    </a>
                    <ul class="sub">
                         <li ><a href="<?php echo URL::to('provider/create'); ?>?s=2">Add</a></li>
                        <li ><a href="<?php echo URL::to('provider'); ?>?s=2">List</a></li>
                    </ul>
                </li>
				<?php }?>
				
				<?php 
                $active = isset($_REQUEST['r']);
                if($active)
                { ?>
                <li class="sub-menu side-menu-color">
                    <a href="javascript:;">
                        <i class="fa fa-comments"></i>
                        <span>Reviews</span>
                    </a>
                   
                        <li class="menu-left sub-menu side-menu-color"><a href="<?php echo URL::to('review'); ?>?r=3">List</a></li>
                   
                </li>
				<?php
                }else
                {?>
			 <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-comments"></i>
                        <span>Reviews</span>
                    </a>
                    <ul class="sub">
                        <li ><a href="<?php echo URL::to('review'); ?>?r=3">List</a></li>
                    </ul>
                </li>
				<?php }?>
				
				<?php 
                $active = isset($_REQUEST['ra']);
                if($active)
                { ?>
                <li class="sub-menu side-menu-color">
                    <a href="javascript:;">
                        <i class="fa fa-star"></i>
                        <span>Ratings</span>
                    </a>
                   
                        <li class="menu-left sub-menu side-menu-color"><a href="<?php echo URL::to('rating'); ?>?ra=4">List</a></li>
                   
                </li>
				<?php
                }else
                {?>
				 <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-comments"></i>
                        <span>Reviews</span>
                    </a>
                    <ul class="sub">
                        <li ><a href="<?php echo URL::to('rating'); ?>?ra=4">List</a></li>
                    </ul>
                </li>
				<?php }?>
                <!--li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-bookmark" aria-hidden="true"></i>
                        <span>Bookmarks</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php //echo URL::to('bookmark'); ?>">List</a></li>
                    </ul>
                </li-->
				
				<?php 
                $active = isset($_REQUEST['u']);
                if($active)
                { ?>
                <li class="sub-menu side-menu-color">
                    <a href="javascript:;">
                        <i class="fa fa-users"></i>
                        <span>Users</span>
                    </a>
                        <li class="menu-left sub-menu side-menu-color"><a href="<?php echo URL::to('user/create'); ?>?u=5">Add</a></li>
                        <li class="menu-left sub-menu side-menu-color"><a href="<?php echo URL::to('user'); ?>?u=5">List</a></li>
                </li>
				<?php
                }else
                {?>
			<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-users"></i>
                        <span>Users</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo URL::to('user/create'); ?>?u=5">Add</a></li>
                        <li><a href="<?php echo URL::to('user'); ?>?u=5">List</a></li>
                    </ul>
                </li>
				<?php }?>
				
				<?php 
                $active = isset($_REQUEST['d']);
                if($active)
                { ?>
                <li class="sub-menu side-menu-color">
                    <a href="javascript:;">
                        <i class="fa fa-cogs"></i>
                        <span>Defaults</span>
                    </a>
                  
                        <li class="menu-left sub-menu side-menu-color"><a href="<?php echo URL::to('city'); ?>?d=6">City</a></li>
                        <!-- <li><a href="#">State</a></li>
                        <li><a href="<?php //echo URL::to('employee'); ?>">Employee</a></li> -->
                        <li class="menu-left sub-menu side-menu-color"><a href="<?php echo URL::to('location/'); ?>?d=6">Locality</a></li>
                   
                </li>
				<?php
                }else
                {?>
			<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-cogs"></i>
                        <span>Defaults</span>
                    </a>
                    <ul class="sub">
                        <li class="menu-left sub-menu side-menu-color"><a href="<?php echo URL::to('city'); ?>?d=6">City</a></li>
                        <!-- <li><a href="#">State</a></li>
                        <li><a href="<?php //echo URL::to('employee'); ?>">Employee</a></li> -->
                        <li class="menu-left sub-menu side-menu-color"><a href="<?php echo URL::to('location/'); ?>?d=6">Locality</a></li>
                    </ul>
                </li>
				<?php }?>
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
