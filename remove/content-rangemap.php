<section class="rangemap">
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="map--container col-md-12">
				Draggable area
				<div id="top"></div>
				<div id="bottom"></div>
				<div id="posY"></div>
				<div id="perc"></div>
				<div id="draggable">					
					<svg id="range" width="400" height="300" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
					 <g>
					   <path stroke="#000000" style="vector-effect: non-scaling-stroke;" fill-opacity="0.5" fill="#ff0000" stroke-dasharray="null" stroke-linejoin="null" stroke-linecap="null" d="m20,150c-9,-73.62984 -33.07735,-147 180,-147c213.07735,0 190,73.37016 180,147c-10,73.62984 -61.92265,147 -180,147c-118.07735,0 -171,-73.37016 -180,-147z" id="svg_1"/>
					 </g>
					</svg>
					<img id="rangedragger" src="https://omniaircraftsales.com/wp-content/uploads/2018/08/plane.svg" alt="" />
				</div>
			</div>
		</div>
	</div>
</section>

<style>
	.rangemap .row {
		height: 100vh;
	}
	.map--container {
		height: 60vh;
		background: #eee;
	}
	#draggable {
		position: absolute;
		width: 48px;
		height: 48px;
		top: 50%;
		left: 50%;
		transform: translate3d(-50%,-50%,0);		
	}
	#rangedragger, #range {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate3d(-50%,-50%,0);
	}
	
	.rangemap {
	    height: 100vh;
	    position: relative;
	}
	#svg_1, #svg_2 {
		/*transition: all .5s ease-in-out; */
	}
</style>

<script
  src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
  integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
  crossorigin="anonymous"></script>
  
<script>
	
	
</script>  