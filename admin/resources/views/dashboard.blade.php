                      
        @extends('layout')
        @section('content') 
        @section('title', 'Dashboard')
         
                      
                      <div class="content-box">
                            <div class="row">
                                <div class="col-sm-8">
                                    <!-- <div class="element-wrapper">
                                        <h6 class="element-header">Bar Charts</h6>
                                        <div class="element-box">
                                            <h5 class="form-header">Powered by Chart.js</h5>
                                            <div class="form-desc">Simple yet flexible JavaScript charting for designers & developers. <a href="http://www.chartjs.org/" target="_blank">Learn More about Chart.js</a></div>
                                            <div class="el-chart-w"><canvas height="145" id="barChart1" width="300"></canvas></div>
                                        </div>
                                    </div> -->
                                
                                 <div class="element-wrapper">
                                        <h6 class="element-header">Today</h6>
                                        <div class="element-box el-tablo">
                                            <div class="label">Orders for today</div>
                                            <div class="value">{{$totalOrdersToday}}</div>
                                           
                                        </div>

                                        <div class="element-box el-tablo">
                                            <div class="label">Product Items Uploaded Today</div>
                                            <div class="value">{{$totalProductsToday}}</div>
                                           
                                        </div>
                                        <div class="element-box el-tablo">
                                            <div class="label">Registered Customers Today</div>
                                            <div class="value">{{$totalNumberOfCustomersToday}}</div>
                                            
                                        </div>
                                        
                                 </div>
                                 
                                 

                                 <!-- <div class="element-wrapper">
                                        <h6 class="element-header">Small Infos</h6>
                                        <div class="element-box el-tablo">
                                            <div class="label">Products Sold</div>
                                            <div class="value">574</div>
                                           
                                        </div>
                                 </div>  -->
                             </div>   
                            
                                <div class="col-sm-4">
                                    <div class="element-wrapper">
                                        <h6 class="element-header">Total</h6>
                                        <div class="element-box el-tablo">
                                            <div class="label">Total Orders</div>
                                            <div class="value">{{$totalOrders}}</div>
                                           
                                        </div>

                                        <div class="element-box el-tablo">
                                            <div class="label">Total Products</div>
                                            <div class="value">{{$totalProducts}}</div>
                                           
                                        </div>
                                        <div class="element-box el-tablo">
                                            <div class="label">Total Number of Registerd Customers</div>
                                            <div class="value">{{$totalNumberOfCustomers}}</div>
                                           
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="element-wrapper" style="height:400px">
                                <!-- <h6 class="element-header">Line Chart with Tabs</h6>
                                <div class="element-box">
                                    <div class="os-tabs-w">
                                        <div class="os-tabs-controls">
                                            <ul class="nav nav-tabs smaller">
                                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab_overview">Overview</a></li>
                                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab_sales">Sales</a></li>
                                            </ul>
                                            <ul class="nav nav-pills smaller">
                                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#">Today</a></li>
                                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#">7 Days</a></li>
                                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#">14 Days</a></li>
                                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#">Last Month</a></li>
                                            </ul>
                                        </div>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_overview">
                                                <div class="el-tablo">
                                                    <div class="label">Unique Visitors</div>
                                                    <div class="value">12,537</div>
                                                </div>
                                                <div class="el-chart-w"><canvas height="150px" id="lineChart" width="600px"></canvas></div>
                                            </div>
                                            <div class="tab-pane" id="tab_sales"></div>
                                            <div class="tab-pane" id="tab_conversion"></div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                          
                            
                            
                            
                        </div>

                        <div class="content-panel">
                            <!-- <div class="content-panel-close"><i class="os-icon os-icon-close"></i></div>
                            <div class="element-wrapper">
                                <h6 class="element-header">Charts in sidebar</h6>
                                <div class="element-box">
                                    <h5 class="form-header">Doughnut Chart</h5>
                                    <div class="form-desc">Pie and doughnut charts are probably the most commonly used charts there are. <a href="http://www.chartjs.org/" target="_blank">Learn More about Chart.js</a></div>
                                    <div class="el-chart-w">
                                        <canvas height="160" id="donutChart" width="160"></canvas>
                                        <div class="inside-donut-chart-label"><strong>142</strong><span>Total Orders</span></div>
                                    </div>
                                    <div class="el-legend">
                                        <div class="legend-value-w">
                                            <div class="legend-pin" style="background-color: #6896f9;"></div>
                                            <div class="legend-value">Processed</div>
                                        </div>
                                        <div class="legend-value-w">
                                            <div class="legend-pin" style="background-color: #85c751;"></div>
                                            <div class="legend-value">Cancelled</div>
                                        </div>
                                        <div class="legend-value-w">
                                            <div class="legend-pin" style="background-color: #d97b70;"></div>
                                            <div class="legend-value">Pending</div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            
                        </div>
        @stop                   