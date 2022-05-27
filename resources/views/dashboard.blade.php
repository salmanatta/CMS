@extends('main')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ url('/resources/css/dashboard.min.css') }}">
    <div class="section">
        <h3 style="color:black">Complain Management System</h3>
        <div class="section">
            <!-- card stats start -->
            <div id="card-stats" class="pt-0">
                <div class="row">
                    <div class="col s12 m6 l3">
                        <div class="card animate fadeLeft">
                            <div class="card-content cyan white-text">
                                <p class="card-stats-title"><i class="material-icons"></i> Total Complain</p>
                                <h4 class="card-stats-number white-text"> 123654 </h4>
                            </div>
                            <div class="card-action cyan darken-1">
                                <div id="clients-bar" class="center-align"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="card animate fadeLeft">
                            <div class="card-content red accent-2 white-text">
                                <p class="card-stats-title"><i class="material-icons"></i>ICT</p>
                                <h4 class="card-stats-number white-text">2325</h4>
                            </div>
                            <div class="card-action red">
                                <div id="sales-compositebar" class="center-align"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="card animate fadeLeft">
                            <div class="card-content orange lighten-1 white-text">
                                <p class="card-stats-title"><i class="material-icons"></i>BME</p>
                                <h4 class="card-stats-number white-text">213</h4>
                            </div>
                            <div class="card-action orange">
                                <div id="profit-tristate" class="center-align"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="card animate fadeRight">
                            <div class="card-content green lighten-1 white-text">
                                <p class="card-stats-title"><i class="material-icons"></i> FACILITIES</p>
                                <h4 class="card-stats-number white-text">555</h4>
                            </div>
                            <div class="card-action green">
                                <div id="invoice-line" class="center-align"></div>
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
                            <center><p class="" style="font-weight:bold">Admissions by Gender</p></center>
                        </div>
                    </div>

                    <div class="col s12 m6 l4" style="">
                        <div class="animate fadeLeft">
                            <div class="col s12 m12 l12">
                                <div id="doughnut-chart-wrapper">
                                    <canvas id="discharge-doughnat" height="250"></canvas>
                                </div>
                            </div>
                            <center><p class="" style="font-weight:bold">Discharge Status</p></center>
                        </div>
                    </div>

                    <div class="col s12 m6 l4" style="">
                        <div class="animate fadeLeft">
                            <div class="col s12 m12 l12">
                                <div id="doughnut-chart-wrapper">
                                    <canvas id="cities-doughnat" height="250"></canvas>
                                </div>
                            </div>
                            <center><p class="" style="font-weight:bold">Admissions by Cities</p></center>
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
                                <center><p class="" style="font-weight:bold">Patients Entry</p></center>
                            </div>
                            <div class="col s6 m6 l6">
                                <div id="doughnut-chart-wrapper">
                                    <canvas id="admissions-counts" height="80"></canvas>
                                </div>
                                <center><p class="" style="font-weight:bold">Admissions Entry</p></center>
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
    </div>
@endsection
