@extends('main')
@section('content')

<div class="section">
   <!-- card stats start -->
   <div id="card-stats" class="pt-0">
      <!-- IT Section -->
      <div class="col-auto  d-sm-block">
         <h3>Information Technology Department</h3>
      </div>
      <div class="row">
         <div class="row ">
            <div class=" col-3">
               <div class="card text-white bg-info">
                  <div class="card-body">
                     <p class="card-stats-title text-center"><i class="material-icons"></i> Total Tickets</p>
                     <p class="card-stats-title text-center">{{ $totalICT }}</p>
                  </div>
               </div>
            </div>
           
            <div class=" col-3">
               <div class="card text-white bg-danger">
                  <div class="card-body">
                     <p class="card-stats-title text-center"><i class="material-icons"></i> Open Tickets</p>
                     <p class="card-stats-title text-center">{{  isset($ictAllTicets['1'])?  $ictAllTicets['1']->count():0 }}</p>
                  </div>
               </div>
            </div>

            <div class=" col-3">
               <div class="card text-white bg-success">
                  <div class="card-body">
                     <p class="card-stats-title text-center"><i class="material-icons"></i> Closed Tickets</p>
                     <p class="card-stats-title text-center">{{  isset($ictAllTicets['6'])?  $ictAllTicets['6']->count():0 }}</p>
                  </div>
               </div>
            </div>
            <div class=" col-3">
               <div class="card text-white bg-secondary">
                  <div class="card-body">
                     <p class="card-stats-title text-center"><i class="material-icons"></i> In Progress Tickets</p>
                     <p class="card-stats-title text-center">{{  isset($ictAllTicets['3'])?  $ictAllTicets['3']->count():0 }}</p>
                  </div>
               </div>
            </div>  
         </div>
      </div>
      <!--BME Section -->
      <div class="col-auto  d-sm-block">
         <h3>BIO Medical Engineering</h3>
      </div>
      <div class="row">
         <div class="row ">
            <div class=" col-3">
               <div class="card text-white bg-info">
                  <div class="card-body">
                     <p class="card-stats-title text-center"><i class="material-icons"></i> Total Tickets</p>
                     <p class="card-stats-title text-center">{{ $totalBME }}</p>
                  </div>
               </div>
            </div>
           
            <div class=" col-3">
               <div class="card text-white bg-danger">
                  <div class="card-body">
                     <p class="card-stats-title text-center"><i class="material-icons"></i> Open Tickets</p>
                     <p class="card-stats-title text-center">{{  isset($bmeAllTicets['1'])?  $bmeAllTicets['1']->count():0 }}</p>
                  </div>
               </div>
            </div>

            <div class=" col-3">
               <div class="card text-white bg-success">
                  <div class="card-body">
                     <p class="card-stats-title text-center"><i class="material-icons"></i> Closed Tickets</p>
                     <p class="card-stats-title text-center">{{  isset($bmeAllTicets['6'])?  $bmeAllTicets['6']->count():0 }}</p>
                  </div>
               </div>
            </div>
            <div class=" col-3">
               <div class="card text-white bg-secondary">
                  <div class="card-body">
                     <p class="card-stats-title text-center"><i class="material-icons"></i> In Progress Tickets</p>
                     <p class="card-stats-title text-center">{{  isset($bmeAllTicets['3'])?  $bmeAllTicets['3']->count():0 }}</p>
                  </div>
               </div>
            </div>  
         </div>
      </div>
    
   
      <!--BME Section -->
      <div class="col-auto  d-sm-block">
         <h3>Facility Management</h3>
      </div>
      <div class="row">
         <div class="row ">
            <div class=" col-3">
               <div class="card text-white bg-info">
                  <div class="card-body">
                     <p class="card-stats-title text-center"><i class="material-icons"></i> Total Tickets</p>
                     <p class="card-stats-title text-center">{{ $totalBFM  }}</p>
                  </div>
               </div>
            </div>
            <div class=" col-3">
               <div class="card text-white bg-danger">
                  <div class="card-body">
                     <p class="card-stats-title text-center"><i class="material-icons"></i> Open Tickets</p>
                     <p class="card-stats-title text-center">{{  isset($bfmAllTicets['1'])?  $bfmAllTicets['1']->count():0 }}</p>
                  </div>
               </div>
            </div>

            <div class=" col-3">
               <div class="card text-white bg-success">
                  <div class="card-body">
                     <p class="card-stats-title text-center"><i class="material-icons"></i> Closed Tickets</p>
                     <p class="card-stats-title text-center">{{  isset($bfmAllTicets['6'])?  $bfmAllTicets['6']->count():0 }}</p>
                  </div>
               </div>
            </div>
            <div class=" col-3">
               <div class="card text-white bg-secondary">
                  <div class="card-body">
                     <p class="card-stats-title text-center"><i class="material-icons"></i> In Progress Tickets</p>
                     <p class="card-stats-title text-center">{{  isset($bfmAllTicets['3'])?  $bfmAllTicets['3']->count():0 }}</p>
                  </div>
               </div>
            </div>  
         </div>
      </div>
      
     
      
   </div>
</div>

<br><br>

<div id="card-stats" class="pt-0">
   <div class="row">
      <div class="col s12 m6 l4" style="">
         <div class="animate fadeLeft">
            <div class="col s12 m12 l12">
               <div id="doughnut-chart-wrapper">
                  <canvas id="gender-doughnat" height="250"></canvas>
               </div>
            </div>
            <center>
               <p class="" style="font-weight:bold">Admissions by Gender</p>
            </center>
         </div>
      </div>

      <div class="col s12 m6 l4" style="">
         <div class="animate fadeLeft">
            <div class="col s12 m12 l12">
               <div id="doughnut-chart-wrapper">
                  <canvas id="discharge-doughnat" height="250"></canvas>
               </div>
            </div>
            <center>
               <p class="" style="font-weight:bold">Discharge Status</p>
            </center>
         </div>
      </div>

      <div class="col s12 m6 l4" style="">
         <div class="animate fadeLeft">
            <div class="col s12 m12 l12">
               <div id="doughnut-chart-wrapper">
                  <canvas id="cities-doughnat" height="250"></canvas>
               </div>
            </div>
            <center>
               <p class="" style="font-weight:bold">Admissions by Cities</p>
            </center>
         </div>
      </div>

   </div>
</div>

<br>
<br>
<div id="card-stats" class="pt-0">
   <div class="row">
      <div class="col s12 m6 l6" style="">
         <div class="animate fadeLeft">
            <div class="col s12 m12 l12">
               <div id="doughnut-chart-wrapper">
                  <canvas id="procedures-horizontal-bar" height="120"></canvas>
               </div>
            </div>
         </div>
      </div>
      <div class="col s12 m6 l6" style="">
         <div class="animate fadeLeft">
            <div class="col s12 m12 l12">
               <div id="doughnut-chart-wrapper">
                  <canvas id="age-vertical-bar" height="120"></canvas>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<br>
<br>
<div id="card-stats" class="pt-0">
   <div class="row">
      <div class="col s6 m12 l12" style="">
         <div class="animate fadeLeft">
            <div class="col s6 m6 l6">
               <div id="doughnut-chart-wrapper">
                  <canvas id="consultants-vertical-bar" height="80"></canvas>
               </div>
            </div>
            <div class="col s6 m6 l6">
               <div id="doughnut-chart-wrapper">
                  <canvas id="cardiology-consultants-vertical-bar" height="80"></canvas>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<br>
<br>
<div id="card-stats" class="pt-0">
   <div class="row">
      <div class="col s6 m12 l12" style="">
         <div class="animate fadeLeft">
            <div class="col s6 m6 l6">
               <div id="doughnut-chart-wrapper">
                  <canvas id="patients-count" height="80"></canvas>
               </div>
               <center>
                  <p class="" style="font-weight:bold">Patients Entry</p>
               </center>
            </div>
            <div class="col s6 m6 l6">
               <div id="doughnut-chart-wrapper">
                  <canvas id="admissions-counts" height="80"></canvas>
               </div>
               <center>
                  <p class="" style="font-weight:bold">Admissions Entry</p>
               </center>
            </div>
         </div>
      </div>
   </div>
</div>
<br>
<br>
<div id="card-stats" class="pt-0">
   <div class="row">
      <div class="col s12 m12 l12" style="">
         <div class="animate fadeLeft">
            <div class="col s12 m12 l12">
               <div id="doughnut-chart-wrapper">
                  <canvas id="month-wise-admissions" height="100"></canvas>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
@endsection

@section('scripts')

<script type="text/javascript" src="{{ url('resources/js/jquery.sparkline.min.js') }}"></script>
<script type="text/javascript" src="{{ url('resources/js/chart.min.js') }}"></script>
<script type="text/javascript" src="{{ url('resources/js/dashboard-analytics.min.js') }}"></script>

<script>

</script>
@endsection