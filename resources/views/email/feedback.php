  
  	<div style="width:900px; border:solid 1px #999999;">
		<div style="background: #1fb5ad none repeat scroll 0 0; min-height:70px;"><img src="<?php echo URL::to('/'); ?>/images/logocrop.png" style="width: 170px; margin-top: -15px;" alt="KranQ" title="KranQ"></div>
		<section class="panel">
			<header class="panel-heading"><b><?php echo $data['title']; ?></b>
				<span class="tools pull-right">
				  <div class="form-group btn-toolbar"><?php echo $data['email']; ?> </div>
				</span>
			</header>
			<div class="panel-body">
				<div id="graph-area" class="main-chart">
					 <?php echo $data['feedbackMessage']; ?>
				</div>
			</div>
		</section>
	</div>
    
  
