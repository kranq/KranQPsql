  
  	<div style="width:900px; border:solid 1px #999999;">
		<div style="background: #1fb5ad none repeat scroll 0 0; min-height:70px;"><img src="<?php echo URL::to('/'); ?>/images/logocrop.png" style="width: 170px; margin-top: -15px;padding: 0.9em 22em;" alt="KranQ" title="KranQ"></div>
		<section class="panel">
			<header class="panel-heading"><b style=" line-height:27px;margin:0px 10px;"><?php echo $data['title']; ?></b>
				<span class="tools pull-right">
				  <div class="form-group btn-toolbar" style="line-height: 28px;margin: 0px 10px;"><?php echo $data['email']; ?> </div>
				</span>
			</header>
			<div class="panel-body">
				<div id="graph-area" class="main-chart" style="line-height: 28px;margin: 3px 10px;">
					 <?php echo $data['feedbackMessage']; ?>
				</div>
			</div>
		</section>
	</div>
    
  
   
