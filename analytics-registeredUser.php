<?php 
session_start();
include_once "header-registeredUser.php";
?>

<div class="container">
<div class="accordion" id="accordionExample">
    <h3 class="h6">Some common abbreviatons typically seen are:
        <br><strong>HEV</strong> - hybrid-electric vehicle (think Prius)
        <br><strong>AFV</strong> - alternate-fuel vehicle (namely a "Flex-Fuel" or E85 capable vehicles for example as well as CNG or compressed natural gas vehicles such as certain tractor-trucks)
        <br><strong>PEV</strong> - plug-in electric vehicle (namely Tesla and Nissan Leaf for example. A.K.A "All-electric" vehicles)
    </h3>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <h5 class="card-title"> Alternate Fuel & Hybrid-Electric Vehicles, By Maker
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <div class="d-flex justify-content-center m-2">
        <div class="card text-center" style="width: 1500px;">
            <div class="d-flex justify-content-center">
                <iframe class="card-img-top" style="width: 1000px; height: 600px;" 
                    src="https://afdc.energy.gov/data/widgets/10304?chart_only=true" 
                    frameborder="0" marginwidth="0" marginheight="0" scrolling="yes">
                </iframe>
            </div>
            <div class="card-body align-contents-center">
                <p class="card-text">In the chart above, we can see the available alternate fuel & hybrid-electric vehicle model offerings by vehicle manufacturers. This provides quantaties beginning in 1991 through the year 2020.</p>
                <a href="https://afdc.energy.gov/data/10304" rel="noopener noreferer" target="_blank" class="btn btn-primary">U.S. Dept of Energy Data</a>
            </div>
        </div>
    </div>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
      <h5 class="card-title">U.S. Plug-In EV Sales, By Model</h5>
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <div class="d-flex justfiy-content-center m-2">
        <div class="card text-center" style="width: 1500px;">
            <div class="d-flex justify-content-center m-2">
                <iframe class="card-img-top" style="width: 900px; height: 558.5333px;" 
                    src="https://afdc.energy.gov/data/widgets/10567?chart_only=true" 
                    frameborder="0" marginwidth="0" marginheight="0" scrolling="no">
                </iframe>
            </div>
            <div class="card-body justify-content-center">
                <p class="card-text">In this chart, similarly to the data above, we can see the upward trend of availability of plug-in electric vehicles in the United States. This began in 2011 when Nissan and Chevy released the Leaf and Volt respectively in the North American Market.</p>
                <a href="https://afdc.energy.gov/data/10567" rel="noopener noreferer" target="_blank" class="btn btn-primary">U.S. Dept of Energy Data</a>
            </div>
        </div>
    </div>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        <h5 class="card-title">Efficiency of All-Electric Vehicles in US</h5>
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <div class="d-flex justfiy-content-center m-2">
        <div class="card text-center" style="width: 1500px;">
            <div class="d-flex justify-content-center m-2">
                <iframe class="card-img-top" style="width: 900px; height: 590.533px;" 
                    src="https://afdc.energy.gov/data/widgets/10963?chart_only=true" 
                    frameborder="0" marginwidth="0" marginheight="0" scrolling="no">
                </iframe>

            </div>
            <div class="card-body justify-content-center">
                <p class="card-text">In this chart, the U.S. Department of Energy outlines the calculations of EV Range in comparison to their miles. The Department took the estimated range from the FuelEconomy.gov by model and per year.  The range efficiency was then calculated using the Autonomie model, which was developed by Argonne National Laboratory, which essentially takes the mass of the vehicle, powertrain characteristics and assumptions of fuel/energy consumption as well as drag coefficients and other physics related quantifications and produces an output of a vehicle's energy consumption, performance and cost for vehicle class, fuelds and drive cycles.</p>
                <p>The calculation yields the average range for vehicles at 257 miles, corresponding to an efficiency factor of 3.51 which indicates that, on average, an electric vehicle is approximately 3.51 times more efficient than a traditional gasoline-powered car. </p>
                <a href="https://afdc.energy.gov/data/10963" rel="noopener noreferer" target="_blank" class="btn btn-primary">Efficiency Data</a>
            </div>
        </div>
    </div>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
        <h5 class="card-title">Analysis and Perspective</h5>
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <div class="d-flex justfiy-content-center m-2">
        <div class="card text-center" style="width: 1500px;">
            <div class="card-body justify-content-center">
                <p class="card-text">In evaluating the data presented above, there would appear to be a correlation between the increase in Alternate-Fuel vehicles available in the U.S. with the rise in All-Electric vehicle sales.  Though it is colloquially clear the rise in all-electric vehicles is due to a desire to remove dependance on fossil fuels from the U.S automarket.  The United States government is clearly hedging its bets on a fully electric auto-market at some eventual point in time. <a href="https://www2.deloitte.com/us/en/insights/focus/future-of-mobility/electric-vehicle-trends-2030.html" rel="noopener noreferrer" target="_blank">(click here for more info)</a></p>
                <p>While the average efficiency of electric vehicles has dramatically increased over the course of the last 10-12 years, there is still a question as to whether these ends justify the means. A strong case can be made for this by considering the fact that each year, on average, all-electric vehicles saw an increase in the mileage range. It is evident the increase of all-electric vehicle prescence in the North American auto market has driven R&D efforts by auto makers to enhance the capabilities of EV batteries and propulsion systems to extract every ounce of efficiency, and this can be witnessed in the data analyzed for calculation of the efficiency factor. Most EV models have had increases of their range of approximately 50 miles every 2-3 years, in some cases adding consistant milage increases each year. Examples of this are Nissan Leaf increasing its mile range from 75 miles in 2013, to 84 in 2014 and then 96 by 2015.  Similarly, the Tesla Model S at 238 mile range in 2014, to a 253 mile range in 2015 through 2017 followed by a 290 mile range by 2018.</p>
            </div>
        </div>
    </div>
      </div>
</div>

</div>


<?php 
include_once "footer.php";
?>