 @extends('layouts.app')

 @section('title', '|'.$stock->symbol)
 @section('content')
<section>
	<div class="container one_stock_con">
		<header class="major stk_header">
			<h2 class="stk_title">{{$stock->name}}</h2>
			<p class="stk_symbol">{{$stock->symbol}}</p>
		</header>
		<div class="one_stk_stats">
			<!--stk basic stats (float top right)-->
				<div class="stat">
					<h4 class="stat_num">$30</h4>
					<p class="stat_title">price</p>
				</div>
				<div class="stat">
					<h4 class="stat_num">+$30</h4>
					<p class="stat_title">change</p>
				</div>
				<div class="stat">
					<h4 class="stat_num">+30%</h4>
					<p class="stat_title">% change</p>
				</div>
		</div>
		<p class="one_stk_desc">cibus sed lobortis aliquam lorem blandit. Lorem eu nunc metus col. Commodo id in arcu ante lorem ipsum sed accumsan erat praesent faucibus commodo ac mi lacus. Adipiscing mi ac commodo. Vis aliquet tortor ultricies non ante erat nunc integer eu ante ornare amet commetus vestibulum blandit integer in curae ac faucibus integer non. Adipiscing cubilia elementum.</p>
		
		<div><!--stk more stats (center below title)--></div>
		<div class="prediction_box"><!--stk predictions (listed below stock description and stats)-->
			<h3>Predictions</h3>
			<div class="row pred_row">
				<div class="col-sm-4 ">
					<div class="prediction">
						<div class="pred_info">
						<h5 class="pred_creator">Ryan Bright</h5>
						<p class="pred_desc">blah blah blah</p>
						<p class="pred_start_end">May 1st</p>
							
						</div>
						
						<div class="pred_up_down">
							<i class="fa fa-caret-square-o-up fa-3x" aria-hidden="true"></i>
							<p class="pred_amount"></p>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="prediction">
						<div class="pred_info">
							<h5 class="pred_creator">Ryan Bright</h5>
							<p class="pred_desc">blah blah blah</p>
							<p class="pred_start_end">May 1st - August 3rd</p>							
						</div>

						<div class="pred_up_down">
							<p class="pred_date">3 days</p>
							<i class="fa fa-caret-square-o-down fa-3x" aria-hidden="true"></i>
							<p class="pred_amount"></p>
						</div>
					</div>
				</div>
				<div class="col-sm-4 ">
					<div class="prediction">
						<h5 class="pred_creator">Ryan Bright</h5>
						<p class="pred_desc">blah blah blah</p>
						<p class="pred_start_end">May 1st</p>
						<div class="pred_up_down">
							<p class="pred_amount"></p>
						</div>
					</div>
				</div>
			</div>
			
			
		</div>
	</div>
</section>
 
 @endsection