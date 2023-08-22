@extends('layout.main')

@section('content')
@section('title')
    Dashboard
@endsection
@section('active-dashboard')
    active
@endsection
@section('open-menu')
    menu-open
@endsection
@section('active-admin')
    active
@endsection
<div class="card card-primary card-outline my-2">

    <div class="card-body row">
        <div class="col-lg-6 col-12 row">
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $totalPesanan }}</h3>

                        <p>New Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('report') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $totalUsers }}</h3>

                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route('user') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>Rp. {{ number_format($totalHarga) }}</h3>

                        <p>Omset Today</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('report') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>Rp. {{ number_format($totalHargaMingguan) }}</h3>

                        <p>Earnings This Week</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-12">
            <div class="card bg-gradient-success">
                <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">

                    <h3 class="card-title">
                        <i class="far fa-calendar-alt"></i>
                        Calendar
                    </h3>
                    <!-- tools card -->
                    <div class="card-tools">
                        <!-- button with a dropdown -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"
                                data-offset="-52">
                                <i class="fas fa-bars"></i>
                            </button>
                            <div class="dropdown-menu" role="menu">
                                <a href="#" class="dropdown-item">Add new event</a>
                                <a href="#" class="dropdown-item">Clear events</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">View calendar</a>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body pt-0">
                    <!--The calendar -->
                    <div id="calendar" style="width: 100%">
                        <div class="bootstrap-datetimepicker-widget usetwentyfour">
                            <ul class="list-unstyled">
                                <li class="show">
                                    <div class="datepicker">
                                        <div class="datepicker-days" style="">
                                            <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th class="prev" data-action="previous"><span
                                                                class="fa fa-chevron-left"
                                                                title="Previous Month"></span></th>
                                                        <th class="picker-switch" data-action="pickerSwitch"
                                                            colspan="5" title="Select Month">August 2023</th>
                                                        <th class="next" data-action="next"><span
                                                                class="fa fa-chevron-right" title="Next Month"></span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="dow">Su</th>
                                                        <th class="dow">Mo</th>
                                                        <th class="dow">Tu</th>
                                                        <th class="dow">We</th>
                                                        <th class="dow">Th</th>
                                                        <th class="dow">Fr</th>
                                                        <th class="dow">Sa</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td data-action="selectDay" data-day="07/30/2023"
                                                            class="day old weekend">30</td>
                                                        <td data-action="selectDay" data-day="07/31/2023"
                                                            class="day old">31</td>
                                                        <td data-action="selectDay" data-day="08/01/2023"
                                                            class="day">1</td>
                                                        <td data-action="selectDay" data-day="08/02/2023"
                                                            class="day">2</td>
                                                        <td data-action="selectDay" data-day="08/03/2023"
                                                            class="day">3</td>
                                                        <td data-action="selectDay" data-day="08/04/2023"
                                                            class="day">4</td>
                                                        <td data-action="selectDay" data-day="08/05/2023"
                                                            class="day weekend">5</td>
                                                    </tr>
                                                    <tr>
                                                        <td data-action="selectDay" data-day="08/06/2023"
                                                            class="day weekend">6</td>
                                                        <td data-action="selectDay" data-day="08/07/2023"
                                                            class="day">7</td>
                                                        <td data-action="selectDay" data-day="08/08/2023"
                                                            class="day">8</td>
                                                        <td data-action="selectDay" data-day="08/09/2023"
                                                            class="day">9</td>
                                                        <td data-action="selectDay" data-day="08/10/2023"
                                                            class="day">10</td>
                                                        <td data-action="selectDay" data-day="08/11/2023"
                                                            class="day">11</td>
                                                        <td data-action="selectDay" data-day="08/12/2023"
                                                            class="day weekend">12</td>
                                                    </tr>
                                                    <tr>
                                                        <td data-action="selectDay" data-day="08/13/2023"
                                                            class="day weekend">13</td>
                                                        <td data-action="selectDay" data-day="08/14/2023"
                                                            class="day">14</td>
                                                        <td data-action="selectDay" data-day="08/15/2023"
                                                            class="day">15</td>
                                                        <td data-action="selectDay" data-day="08/16/2023"
                                                            class="day active today">16</td>
                                                        <td data-action="selectDay" data-day="08/17/2023"
                                                            class="day">17</td>
                                                        <td data-action="selectDay" data-day="08/18/2023"
                                                            class="day">18</td>
                                                        <td data-action="selectDay" data-day="08/19/2023"
                                                            class="day weekend">19</td>
                                                    </tr>
                                                    <tr>
                                                        <td data-action="selectDay" data-day="08/20/2023"
                                                            class="day weekend">20</td>
                                                        <td data-action="selectDay" data-day="08/21/2023"
                                                            class="day">21</td>
                                                        <td data-action="selectDay" data-day="08/22/2023"
                                                            class="day">22</td>
                                                        <td data-action="selectDay" data-day="08/23/2023"
                                                            class="day">23</td>
                                                        <td data-action="selectDay" data-day="08/24/2023"
                                                            class="day">24</td>
                                                        <td data-action="selectDay" data-day="08/25/2023"
                                                            class="day">25</td>
                                                        <td data-action="selectDay" data-day="08/26/2023"
                                                            class="day weekend">26</td>
                                                    </tr>
                                                    <tr>
                                                        <td data-action="selectDay" data-day="08/27/2023"
                                                            class="day weekend">27</td>
                                                        <td data-action="selectDay" data-day="08/28/2023"
                                                            class="day">28</td>
                                                        <td data-action="selectDay" data-day="08/29/2023"
                                                            class="day">29</td>
                                                        <td data-action="selectDay" data-day="08/30/2023"
                                                            class="day">30</td>
                                                        <td data-action="selectDay" data-day="08/31/2023"
                                                            class="day">31</td>
                                                        <td data-action="selectDay" data-day="09/01/2023"
                                                            class="day new">1</td>
                                                        <td data-action="selectDay" data-day="09/02/2023"
                                                            class="day new weekend">2</td>
                                                    </tr>
                                                    <tr>
                                                        <td data-action="selectDay" data-day="09/03/2023"
                                                            class="day new weekend">3</td>
                                                        <td data-action="selectDay" data-day="09/04/2023"
                                                            class="day new">4</td>
                                                        <td data-action="selectDay" data-day="09/05/2023"
                                                            class="day new">5</td>
                                                        <td data-action="selectDay" data-day="09/06/2023"
                                                            class="day new">6</td>
                                                        <td data-action="selectDay" data-day="09/07/2023"
                                                            class="day new">7</td>
                                                        <td data-action="selectDay" data-day="09/08/2023"
                                                            class="day new">8</td>
                                                        <td data-action="selectDay" data-day="09/09/2023"
                                                            class="day new weekend">9</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="datepicker-months" style="display: none;">
                                            <table class="table-condensed">
                                                <thead>
                                                    <tr>
                                                        <th class="prev" data-action="previous"><span
                                                                class="fa fa-chevron-left"
                                                                title="Previous Year"></span></th>
                                                        <th class="picker-switch" data-action="pickerSwitch"
                                                            colspan="5" title="Select Year">2023</th>
                                                        <th class="next" data-action="next"><span
                                                                class="fa fa-chevron-right" title="Next Year"></span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="7"><span data-action="selectMonth"
                                                                class="month">Jan</span><span
                                                                data-action="selectMonth"
                                                                class="month">Feb</span><span
                                                                data-action="selectMonth"
                                                                class="month">Mar</span><span
                                                                data-action="selectMonth"
                                                                class="month">Apr</span><span
                                                                data-action="selectMonth"
                                                                class="month">May</span><span
                                                                data-action="selectMonth"
                                                                class="month">Jun</span><span
                                                                data-action="selectMonth"
                                                                class="month">Jul</span><span
                                                                data-action="selectMonth"
                                                                class="month active">Aug</span><span
                                                                data-action="selectMonth"
                                                                class="month">Sep</span><span
                                                                data-action="selectMonth"
                                                                class="month">Oct</span><span
                                                                data-action="selectMonth"
                                                                class="month">Nov</span><span
                                                                data-action="selectMonth" class="month">Dec</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="datepicker-years" style="display: none;">
                                            <table class="table-condensed">
                                                <thead>
                                                    <tr>
                                                        <th class="prev" data-action="previous"><span
                                                                class="fa fa-chevron-left"
                                                                title="Previous Decade"></span></th>
                                                        <th class="picker-switch" data-action="pickerSwitch"
                                                            colspan="5" title="Select Decade">2020-2029</th>
                                                        <th class="next" data-action="next"><span
                                                                class="fa fa-chevron-right"
                                                                title="Next Decade"></span></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="7"><span data-action="selectYear"
                                                                class="year old">2019</span><span
                                                                data-action="selectYear"
                                                                class="year">2020</span><span
                                                                data-action="selectYear"
                                                                class="year">2021</span><span
                                                                data-action="selectYear"
                                                                class="year">2022</span><span
                                                                data-action="selectYear"
                                                                class="year active">2023</span><span
                                                                data-action="selectYear"
                                                                class="year">2024</span><span
                                                                data-action="selectYear"
                                                                class="year">2025</span><span
                                                                data-action="selectYear"
                                                                class="year">2026</span><span
                                                                data-action="selectYear"
                                                                class="year">2027</span><span
                                                                data-action="selectYear"
                                                                class="year">2028</span><span
                                                                data-action="selectYear"
                                                                class="year">2029</span><span
                                                                data-action="selectYear" class="year old">2030</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="datepicker-decades" style="display: none;">
                                            <table class="table-condensed">
                                                <thead>
                                                    <tr>
                                                        <th class="prev" data-action="previous"><span
                                                                class="fa fa-chevron-left"
                                                                title="Previous Century"></span></th>
                                                        <th class="picker-switch" data-action="pickerSwitch"
                                                            colspan="5">2000-2090</th>
                                                        <th class="next" data-action="next"><span
                                                                class="fa fa-chevron-right"
                                                                title="Next Century"></span></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="7"><span data-action="selectDecade"
                                                                class="decade old"
                                                                data-selection="2006">1990</span><span
                                                                data-action="selectDecade" class="decade"
                                                                data-selection="2006">2000</span><span
                                                                data-action="selectDecade" class="decade"
                                                                data-selection="2016">2010</span><span
                                                                data-action="selectDecade" class="decade active"
                                                                data-selection="2026">2020</span><span
                                                                data-action="selectDecade" class="decade"
                                                                data-selection="2036">2030</span><span
                                                                data-action="selectDecade" class="decade"
                                                                data-selection="2046">2040</span><span
                                                                data-action="selectDecade" class="decade"
                                                                data-selection="2056">2050</span><span
                                                                data-action="selectDecade" class="decade"
                                                                data-selection="2066">2060</span><span
                                                                data-action="selectDecade" class="decade"
                                                                data-selection="2076">2070</span><span
                                                                data-action="selectDecade" class="decade"
                                                                data-selection="2086">2080</span><span
                                                                data-action="selectDecade" class="decade"
                                                                data-selection="2096">2090</span><span
                                                                data-action="selectDecade" class="decade old"
                                                                data-selection="2106">2100</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </li>
                                <li class="picker-switch accordion-toggle"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>


</div>
@endsection
