 @extends('layouts.app')

 @section('title', '|Stocks')
 @section('content')
<!-- One -->
<section id="one">
	<div class="container">
		<header class="major">
			<h2>Stocks</h2>
		</header>
		<div class="search">
			<input name="search" type='text'/>	<i class="fa fa-search fa-2x" aria-hidden="true"></i>
		</div>
		<div class="stk_list">
			@foreach($stocks as $stock)
			<div class='stk'>
				<h3 class="stk_title"><a href="{{url('/stocks/'.$stock->symbol)}}"> {{$stock->symbol}}: {{$stock->name}}</a></h3>
				<p class="stk_desc">asdfsadfsadfsadfa</p>
				<div class="stk_stats">
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
				<!--stock stats(price, current changes since open, % change since last open)-->
				<!--stock sector and industry-->
			</div>
			@endforeach
		</div>
	</div>
</section>
 
 @endsection