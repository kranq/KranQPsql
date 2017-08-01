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
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-laptop"></i>
                        <span>Category</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo URL::to('category/create'); ?>">Add</a></li>
                        <li><a href="<?php echo URL::to('category'); ?>">List</a></li>
                    </ul>
                </li>
                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent">
                        <i class="fa fa-plus-square"></i>
                        <span>Service Provider</span>
                        <span class="dcjq-icon"></span>
                    </a>
                    <ul class="sub">
                         <li class="active"><a href="<?php echo URL::to('provider/create'); ?>">Add</a></li>
                        <li><a href="<?php echo URL::to('provider'); ?>">List</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-comments"></i>
                        <span>Reviews</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo URL::to('review'); ?>">List</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-star"></i>
                        <span>Ratings</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo URL::to('rating'); ?>">List</a></li>
                    </ul>
                </li>
                <!--li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-bookmark" aria-hidden="true"></i>
                        <span>Bookmarks</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php //echo URL::to('bookmark'); ?>">List</a></li>
                    </ul>
                </li-->
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-users"></i>
                        <span>Users</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo URL::to('user/create'); ?>">Add</a></li>
                        <li><a href="<?php echo URL::to('user'); ?>">List</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-cogs"></i>
                        <span>Defaults</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo URL::to('city'); ?>">City</a></li>
                        <!-- <li><a href="#">State</a></li>
                        <li><a href="<?php //echo URL::to('employee'); ?>">Employee</a></li> -->
                        <li><a href="<?php echo URL::to('location/'); ?>">Locality</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
