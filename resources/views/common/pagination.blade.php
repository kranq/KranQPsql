<div class="row">
		<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
			<div class="col-sm-7 col-xs-9 col-md-8 col-lg-8" style="margin: 20px 0;">
				@if ($paginator->total() === 0)
					<h4><p align="center"> {!!trans('main.norecords') !!}</p></h4>
				@else($paginator->total() >= 1)	
					<div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
						{!! trans('main.show') !!}
						<select id="paginate_size_select" class="paginate_size_select">
							<option value="10" {!! Session::get('paginate_size') == 10 ? 'selected' : '' !!}>10</option>
							<option value="20" {!! Session::get('paginate_size') == 20 ? 'selected' : '' !!} >20</option>
							<option value="30" {!! Session::get('paginate_size') == 30 ? 'selected' : '' !!}>30</option>
							<option value="50" {!! Session::get('paginate_size') == 50 ? 'selected' : '' !!}>50</option>
						</select> 
						{!! trans('main.entries') !!}
						<br>
						{!!trans('main.noofrecords') !!}  {!! $paginator->total() !!}
					</div>
				@endif
			</div> 
			<?php 
				$extedorderby = '';
				if (isset($orderby)) {
				 	foreach ($orderby as $k=>$by) {
				 		if ($k<>'page') {
				  			$extedorderby .='&'.$k.'='.$by;
				 		}
				 	}
				}
			 ?>
			  
			<div class="col-sm-5 col-md-4 col-lg-4 hidden-xs" style="align:right;"> 
				@if ($paginator->lastPage() > 1)
				<ul class="pagination">
					<li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
						<a href="{{ $paginator->url(1) }}{{$extedorderby}}">{!!trans('main.first') !!}</a>
					 </li>
					@for ($i = 1; $i <= $paginator->lastPage(); $i++)
						<?php
						$half_total_links = floor(Config::get('pagination.limit') / 2);
						$from = $paginator->currentPage() - $half_total_links;
						$to = $paginator->currentPage() + $half_total_links;
						if ($paginator->currentPage() < $half_total_links) {
						   $to += $half_total_links - $paginator->currentPage();
						}
						if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
							$from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
						}
						?>
						@if ($from < $i && $i < $to)
							<li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
								<a href="{{ $paginator->url($i) }}{{$extedorderby}}">{{ $i }}</a>
							</li>
						@endif
					@endfor
					<li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
						<a href="{{ $paginator->url($paginator->lastPage()) }}{{$extedorderby}}">{!!trans('main.last') !!}</a>
					</li>
				</ul>
				@endif
			</div>
			 
			<div class="col-xs-12 visible-xs" style="align:left;"> 
			
				@if ($paginator->lastPage() > 1)
				<ul class="pagination">
					<li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
						<a href="{{ $paginator->url(1) }}{{$extedorderby}}">{!!trans('main.first') !!}</a>
					 </li>
					@for ($i = 1; $i <= $paginator->lastPage(); $i++)
						<?php
						$half_total_links = floor(Config::get('pagination.limit') / 2);
						$from = $paginator->currentPage() - $half_total_links;
						$to = $paginator->currentPage() + $half_total_links;
						if ($paginator->currentPage() < $half_total_links) {
						   $to += $half_total_links - $paginator->currentPage();
						}
						if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
							$from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
						}
						?>
						@if ($from < $i && $i < $to)
							<li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
								<a href="{{ $paginator->url($i) }}{{$extedorderby}}">{{ $i }}</a>
							</li>
						@endif
					@endfor
					<li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
						<a href="{{ $paginator->url($paginator->lastPage()) }}{{$extedorderby}}">{!!trans('main.last') !!}</a>
					</li>
				</ul>
				@endif
			 </div> 
		</div> 
</div> 
