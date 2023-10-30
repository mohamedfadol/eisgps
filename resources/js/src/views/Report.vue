<template>
  <div>
      <loading :active.sync="isLoad"
               :background-color="loaderBgColor"
               :color="loaderColor"
               :height="loaderHeight"
               :is-full-page="fullPage"
               :loader="loaderType"
               :width="loaderWidth"></loading>

      <div class="breadcrumb-holder container-fluid">
          <div class="row">
              <div class="col-sm-12 col-md-6 col-lg-6">
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">{{ $trans('breadcrumb.dashboard') }}</a></li>
                      <li class="breadcrumb-item active">{{ $trans('menu.statistics') }}</li>
                  </ul>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-6 right">
              </div>
          </div>
      </div>

      <div class="top-dashboard">


          <section class="dashboard-header">
              <div class="container-fluid">
                  <div class="row">


                      <!-- Line Chart            -->
                      <div class="chart col-lg-8 col-12">
                          <div class="line-chart bg-white d-flex align-items-center justify-content-center has-shadow">
                              <div class="chartjs-size-monitor">
                                  <div class="chartjs-size-monitor-expand">
                                      <div class=""></div>
                                  </div>
                                  <div class="chartjs-size-monitor-shrink">
                                      <div class=""></div>
                                  </div>
                              </div>
                              <canvas id="lineCahrt" style="display: block; width: 633px; height: 316px;" width="633" height="316"
                                      class="chartjs-render-monitor"></canvas>
                          </div>
                      </div>
                      <div class="chart col-lg-4 col-12">
                          <!-- Bar Chart   -->
                          <div class="bar-chart has-shadow bg-white">
                              <div class="chartjs-size-monitor">
                                  <div class="chartjs-size-monitor-expand">
                                      <div class=""></div>
                                  </div>
                                  <div class="chartjs-size-monitor-shrink">
                                      <div class=""></div>
                                  </div>
                              </div>
                              <div class="title"><strong class="text-violet">95%</strong><br><small>Daily revenue</small></div>
                              <canvas id="barChartHome" width="302" height="151"
                                      style="display: block; width: 302px; height: 151px;" class="chartjs-render-monitor"></canvas>
                          </div>
                          <!-- Numbers-->
                          <div class="statistic d-flex align-items-center bg-white has-shadow">
                              <div class="icon bg-green"><i class="fa fa-line-chart"></i></div>
                              <div class="text"><strong>99.9%</strong><br><small>Success Rate</small></div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
          <br>
          <section class="client no-padding-top">
              <div class="container-fluid">
                  <div class="row">
                      <!-- Work Amount  -->
                      <div class="col-lg-4">
                          <div class="work-amount card">
                              <div class="card-close">
                                  <div class="dropdown">
                                      <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true"
                                              aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                      <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a
                                          href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#"
                                                                                                                        class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                                  </div>
                              </div>
                              <div class="card-body">
                                  <h3>Work Hours</h3><small>Lorem ipsum dolor sit amet.</small>
                                  <div class="chart text-center">
                                      <div class="chartjs-size-monitor">
                                          <div class="chartjs-size-monitor-expand">
                                              <div class=""></div>
                                          </div>
                                          <div class="chartjs-size-monitor-shrink">
                                              <div class=""></div>
                                          </div>
                                      </div>
                                      <div class="text"><strong>90</strong><br><span>Hours</span></div>
                                      <canvas id="pieChart" width="262" height="131"
                                              style="display: block; width: 262px; height: 131px;" class="chartjs-render-monitor"></canvas>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- Client Profile -->
                      <div class="col-lg-4">
                          <div class="overdue card">
                              <div class="card-close">
                                  <div class="dropdown">
                                      <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true"
                                              aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                      <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow"><a
                                          href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#"
                                                                                                                        class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                                  </div>
                              </div>
                              <div class="card-body">
                                  <h3>Total revenue</h3><small>Lorem ipsum dolor sit amet.</small>
                                  <div class="number text-center">$20,000</div>
                                  <div class="chart">
                                      <div class="chartjs-size-monitor">
                                          <div class="chartjs-size-monitor-expand">
                                              <div class=""></div>
                                          </div>
                                          <div class="chartjs-size-monitor-shrink">
                                              <div class=""></div>
                                          </div>
                                      </div>
                                      <canvas id="lineChart1" width="262" height="131"
                                              style="display: block; width: 262px; height: 131px;" class="chartjs-render-monitor"> </canvas>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- Total Overdue             -->
                      <div class="col-lg-4">
                          <div class="overdue card">
                              <div class="card-close">
                                  <div class="dropdown">
                                      <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true"
                                              aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                      <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow"><a
                                          href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#"
                                                                                                                        class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                                  </div>
                              </div>
                              <div class="card-body">
                                  <h3>Total revenue</h3><small>Lorem ipsum dolor sit amet.</small>
                                  <div class="number text-center">$20,000</div>
                                  <div class="chart">
                                      <div class="chartjs-size-monitor">
                                          <div class="chartjs-size-monitor-expand">
                                              <div class=""></div>
                                          </div>
                                          <div class="chartjs-size-monitor-shrink">
                                              <div class=""></div>
                                          </div>
                                      </div>
                                      <canvas id="lineChart1" width="262" height="131"
                                              style="display: block; width: 262px; height: 131px;" class="chartjs-render-monitor"> </canvas>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>



      </div>
<!--      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">-->
<!--          <div>-->
<!--              <button class="btn btn-secondary text-dark mr-2 ">-->
<!--                  view all-->
<!--              </button>-->
<!--              <div class="dropdown-menu dashboard-dropdown dropdown-menu-left mt-2">-->
<!--                  <a class="dropdown-item font-weight-bold" href="#"><span class="far fa-file-alt mr-2"></span>Document</a>-->
<!--                  <a class="dropdown-item font-weight-bold" href="#"><span class="far fa-comment-dots mr-2"></span>Message</a>-->
<!--                  <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-box-open mr-2"></span>Product</a>-->
<!--                  <div role="separator" class="dropdown-divider"></div>-->
<!--                  <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-rocket text-danger mr-2"></span>Subscription Plan</a>-->
<!--              </div>-->
<!--          </div>-->
<!--          <div>-->
<!--              <button type="button" class="btn btn-primary mr-2"><span class="fas fa-calendar-alt"></span></button>-->
<!--              <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                  <span class="fas fa-clipboard mr-2"></span>Reports-->
<!--                  <span class="icon icon-small ml-1"><span class="fas fa-chevron-down"></span></span>-->
<!--              </button>-->
<!--              <div class="dropdown-menu dashboard-dropdown dropdown-menu-left mt-2">-->
<!--                  <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-box-open mr-2"></span>Products</a>-->
<!--                  <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-store mr-2"></span>Customers</a>-->
<!--                  <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-cart-arrow-down mr-2"></span>Orders</a>-->
<!--                  <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-chart-pie mr-2"></span>Console</a>-->
<!--                  <div role="separator" class="dropdown-divider"></div>-->
<!--                  <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-rocket text-success mr-2"></span>All Reports</a>-->
<!--              </div>-->
<!--          </div>-->
<!--      </div>-->

<!--      <div class="px-2">-->
<!--          &lt;!&ndash;first row&ndash;&gt;-->
<!--          <div class="d-grid ">-->
<!--              <div class="row">-->
<!--                  &lt;!&ndash;left-side&ndash;&gt;-->
<!--                  <div class="left-side col-12 py-3">-->
<!--                      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">-->
<!--                          <ol class="carousel-indicators d-none">-->
<!--                              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>-->
<!--                              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>-->
<!--                              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>-->
<!--                          </ol>-->
<!--                          <div class="carousel-inner ">-->
<!--                              &lt;!&ndash;&ndash;&gt;-->
<!--                              <div class="carousel-item active d-grid">-->
<!--                                  <div class="row d-flex align-items-center justify-content-center">-->
<!--                                      &lt;!&ndash;  &ndash;&gt;-->
<!--                                      <div class="col-3">-->
<!--                                          <div class="text-center">-->
<!--                                              <img src="/assets/img/car1.png"  class="car-img" width="200px" height="100px">-->
<!--                                          </div>                                            <div class="under-photo d-flex flex-column text-center my-2 py-2 ">-->
<!--                                          <p class="m-0 car_name">Car Name</p>-->
<!--                                          <p class="yello m-0">SASA</p>-->
<!--                                      </div>-->
<!--                                      </div>-->
<!--                                      &lt;!&ndash; &ndash;&gt;-->
<!--                                      <div class="col-3 ">-->
<!--                                          <div class="text-center">-->
<!--                                              <img src="/assets/img/car1.png"  class="car-img" width="200px" height="100px">-->
<!--                                          </div>                                            <div class="under-photo d-flex flex-column text-center my-2 py-2 ">-->
<!--                                          <p class="m-0 car_name">Car Name</p>-->
<!--                                          <p class="yello m-0">ه ص ق 1234</p>-->
<!--                                      </div>-->
<!--                                      </div>-->
<!--                                      &lt;!&ndash; &ndash;&gt;-->
<!--                                      <div class="col-3 ">-->
<!--                                          <div class="text-center">-->
<!--                                              <img src="/assets/img/car1.png"  class="car-img" width="200px" height="100px">-->
<!--                                          </div>-->
<!--                                          <div class="under-photo d-flex flex-column text-center my-2 py-2 ">-->
<!--                                              <p class="m-0 car_name">Car Name</p>-->
<!--                                              <p class="yello m-0">ه ص ق 1234</p>-->
<!--                                          </div>-->
<!--                                      </div>-->
<!--                                      &lt;!&ndash; &ndash;&gt;-->
<!--                                      <div class="col-3 ">-->
<!--                                          <div class="text-center">-->
<!--                                              <img src="/assets/img/car1.png"  class="car-img" width="200px" height="100px">-->
<!--                                          </div>                                            <div class="under-photo d-flex flex-column text-center my-2 py-2 ">-->
<!--                                          <p class="m-0 car_name">Car Name</p>-->
<!--                                          <p class="yello m-0">ه ص ق 1234</p>-->
<!--                                      </div>-->
<!--                                      </div>-->
<!--                                      &lt;!&ndash; &ndash;&gt;-->
<!--                                  </div>-->
<!--                              </div>-->
<!--                              <div class="carousel-item d-grid">-->
<!--                                  <div class="row d-flex align-items-center justify-content-center">-->
<!--                                      &lt;!&ndash;  &ndash;&gt;-->
<!--                                      <div class="col-3">-->
<!--                                          <div class="text-center">-->
<!--                                              <img src="/assets/img/car1.png"  class="car-img" width="200px" height="100px">-->
<!--                                          </div>                                            <div class="under-photo d-flex flex-column text-center my-2 py-2 ">-->
<!--                                          <p class="m-0 car_name">Car Name</p>-->
<!--                                          <p class="yello m-0">SASA</p>-->
<!--                                      </div>-->
<!--                                      </div>-->
<!--                                      &lt;!&ndash; &ndash;&gt;-->
<!--                                      <div class="col-3 ">-->
<!--                                          <div class="text-center">-->
<!--                                              <img src="/assets/img/car1.png"  class="car-img" width="200px" height="100px">-->
<!--                                          </div>                                            <div class="under-photo d-flex flex-column text-center my-2 py-2 ">-->
<!--                                          <p class="m-0 car_name">Car Name</p>-->
<!--                                          <p class="yello m-0">ه ص ق 1234</p>-->
<!--                                      </div>-->
<!--                                      </div>-->
<!--                                      &lt;!&ndash; &ndash;&gt;-->
<!--                                      <div class="col-3 ">-->
<!--                                          <div class="text-center">-->
<!--                                              <img src="/assets/img/car1.png"  class="car-img" width="200px" height="100px">-->
<!--                                          </div>-->
<!--                                          <div class="under-photo d-flex flex-column text-center my-2 py-2 ">-->
<!--                                              <p class="m-0 car_name">Car Name</p>-->
<!--                                              <p class="yello m-0">ه ص ق 1234</p>-->
<!--                                          </div>-->
<!--                                      </div>-->
<!--                                      &lt;!&ndash; &ndash;&gt;-->
<!--                                      <div class="col-3 ">-->
<!--                                          <div class="text-center">-->
<!--                                              <img src="/assets/img/car1.png"  class="car-img" width="200px" height="100px">-->
<!--                                          </div>                                            <div class="under-photo d-flex flex-column text-center my-2 py-2 ">-->
<!--                                          <p class="m-0 car_name">Car Name</p>-->
<!--                                          <p class="yello m-0">ه ص ق 1234</p>-->
<!--                                      </div>-->
<!--                                      </div>-->
<!--                                      &lt;!&ndash; &ndash;&gt;-->
<!--                                  </div>-->
<!--                              </div>-->
<!--                              &lt;!&ndash;&ndash;&gt;-->

<!--                              &lt;!&ndash;&ndash;&gt;-->
<!--                              <div class="carousel-item  d-grid ">-->
<!--                                  <div class="row d-flex align-items-center justify-content-center">-->
<!--                                      &lt;!&ndash;  &ndash;&gt;-->
<!--                                      <div class="col-3 ">-->
<!--                                          <img src="/assets/img/car1.png" width="200px" height="100px">-->
<!--                                          <div class="under-photo d-flex flex-column text-center my-2 py-2 px-3 ">-->
<!--                                              <p class="m-0">Car Name</p>-->
<!--                                              <p class="yello m-0">ه ص ق 1234</p>-->
<!--                                          </div>-->
<!--                                      </div>-->
<!--                                      &lt;!&ndash; &ndash;&gt;-->
<!--                                      &lt;!&ndash;  &ndash;&gt;-->
<!--                                      <div class="col-3 ">-->
<!--                                          <img src="/assets/img/car1.png" width="200px" height="100px">-->
<!--                                          <div class="under-photo d-flex flex-column text-center my-2 py-2 px-3">-->
<!--                                              <p class="m-0">Car Name</p>-->
<!--                                              <p class="yello m-0">ه ص ق 1234</p>-->
<!--                                          </div>-->
<!--                                      </div>-->
<!--                                      &lt;!&ndash; &ndash;&gt;-->
<!--                                      <div class="col-3 ">-->
<!--                                          <img src="/assets/img/car1.png" width="200px" height="100px">-->
<!--                                          <div class="under-photo d-flex flex-column text-center my-2 py-2 px-3">-->
<!--                                              <p class="m-0">Car Name</p>-->
<!--                                              <p class="yello m-0">ه ص ق 1234</p>-->
<!--                                          </div>-->
<!--                                      </div>-->
<!--                                      &lt;!&ndash; &ndash;&gt;-->

<!--                                      &lt;!&ndash;  &ndash;&gt;-->
<!--                                      <div class="col-3 ">-->
<!--                                          <img src="/assets/img/car1.png" width="200px" height="100px">-->
<!--                                          <div class="under-photo d-flex flex-column text-center my-2 py-2 px-3">-->
<!--                                              <p class="m-0">Car Name</p>-->
<!--                                              <p class="yello m-0">ه ص ق 1234</p>-->
<!--                                          </div>-->
<!--                                      </div>-->
<!--                                      &lt;!&ndash; &ndash;&gt;-->

<!--                                  </div>-->
<!--                              </div>-->
<!--                              &lt;!&ndash;&ndash;&gt;-->

<!--                              &lt;!&ndash;&ndash;&gt;-->
<!--                              <div class="carousel-item  d-grid ">-->
<!--                                  <div class="row d-flex align-items-center justify-content-center">-->
<!--                                      &lt;!&ndash;  &ndash;&gt;-->
<!--                                      <div class="col-3 ">-->
<!--                                          <img src="/assets/img/car1.png" width="200px" height="100px">-->
<!--                                          <div class="under-photo d-flex flex-column text-center my-2 py-2 px-3 ">-->
<!--                                              <p class="m-0">Car Name</p>-->
<!--                                              <p class="yello m-0">ه ص ق 1234</p>-->
<!--                                          </div>-->
<!--                                      </div>-->
<!--                                      &lt;!&ndash; &ndash;&gt;-->
<!--                                      &lt;!&ndash;  &ndash;&gt;-->
<!--                                      <div class="col-3 ">-->
<!--                                          <img src="/assets/img/car1.png" width="200px" height="100px">-->
<!--                                          <div class="under-photo d-flex flex-column text-center my-2 py-2 px-3">-->
<!--                                              <p class="m-0">Car Name</p>-->
<!--                                              <p class="yello m-0">ه ص ق 1234</p>-->
<!--                                          </div>-->
<!--                                      </div>-->
<!--                                      &lt;!&ndash; &ndash;&gt;-->

<!--                                      <div class="col-3 ">-->
<!--                                          <img src="/assets/img/car1.png" width="200px" height="100px">-->
<!--                                          <div class="under-photo d-flex flex-column text-center my-2 py-2 px-3">-->
<!--                                              <p class="m-0">Car Name</p>-->
<!--                                              <p class="yello m-0">ه ص ق 1234</p>-->
<!--                                          </div>-->
<!--                                      </div>-->
<!--                                      &lt;!&ndash; &ndash;&gt;-->

<!--                                      &lt;!&ndash;  &ndash;&gt;-->
<!--                                      <div class="col-3 ">-->
<!--                                          <img src="/assets/img/car1.png" width="200px" height="100px">-->
<!--                                          <div class="under-photo d-flex flex-column text-center my-2 py-2 px-3">-->
<!--                                              <p class="m-0">Car Name</p>-->
<!--                                              <p class="yello m-0">ه ص ق 1234</p>-->
<!--                                          </div>-->
<!--                                      </div>-->
<!--                                      &lt;!&ndash; &ndash;&gt;-->

<!--                                  </div>-->
<!--                              </div>-->
<!--                              &lt;!&ndash;&ndash;&gt;-->

<!--                          </div>-->
<!--                          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">-->
<!--                              <span class="fas fa-chevron-left" aria-hidden="true"></span>-->
<!--                              <span class="sr-only">Previous</span>-->
<!--                          </a>-->
<!--                          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">-->
<!--                              <span class="fas fa-chevron-right" aria-hidden="true" ></span>-->
<!--                              <span class="sr-only">Next</span>-->
<!--                          </a>-->
<!--                      </div>-->
<!--                  </div>-->
<!--                  &lt;!&ndash;./left-side&ndash;&gt;-->

<!--              </div>-->
<!--          </div>-->
<!--          &lt;!&ndash;./first row&ndash;&gt;-->
<!--      </div>-->

<!--      <div class="filter_divMap">-->

<!--          <div class="row">-->

<!--              <div class="col-md-5">-->
<!--                  <div class="div-search5" style="display: flex;">-->
<!--                      <input type="search" placeholder="Enter Car Name" class="search_boxcar">-->

<!--                  </div>-->

<!--                  <Div class="div-words">-->
<!--                      <div class="row">-->
<!--                          <div class="col-md-4">-->
<!--                              <button class="keywordsbtn">-->
<!--                                  <i class="fa fa-times-circle icon-btnsearch" aria-hidden="true"></i>-->
<!--                                  <p class="p_btn">Car Name</p>-->
<!--                              </button>-->

<!--                          </div>-->
<!--                          <div class="col-md-4">-->
<!--                              <button class="keywordsbtn">-->
<!--                                  <i class="fa fa-times-circle icon-btnsearch" aria-hidden="true"></i>-->
<!--                                  <p class="p_btn">Car Name</p>-->
<!--                              </button>-->

<!--                          </div>-->
<!--                          <div class="col-md-4">-->
<!--                              <button class="keywordsbtn">-->
<!--                                  <i class="fa fa-times-circle icon-btnsearch" aria-hidden="true"></i>-->
<!--                                  <p class="p_btn">Car Name</p>-->
<!--                              </button>-->

<!--                          </div>-->

<!--                      </div>-->
<!--                      <div class="row" style="margin-top: 10px;">-->
<!--                          <div class="col-md-4">-->
<!--                              <button class="keywordsbtn">-->
<!--                                  <i class="fa fa-times-circle icon-btnsearch" aria-hidden="true"></i>-->
<!--                                  <p class="p_btn">Car Name</p>-->
<!--                              </button>-->

<!--                          </div>-->
<!--                          <div class="col-md-4">-->
<!--                              <button class="keywordsbtn">-->
<!--                                  <i class="fa fa-times-circle icon-btnsearch" aria-hidden="true"></i>-->
<!--                                  <p class="p_btn">Car Name</p>-->
<!--                              </button>-->

<!--                          </div>-->
<!--                          <div class="col-md-4">-->
<!--                              <button class="keywordsbtn">-->
<!--                                  <i class="fa fa-times-circle icon-btnsearch" aria-hidden="true"></i>-->
<!--                                  <p class="p_btn">Car Name</p>-->
<!--                              </button>-->

<!--                          </div>-->
<!--                      </div>-->
<!--                  </Div>-->
<!--              </div>-->

<!--              <div class="col-md-7">-->
<!--                  <div class="divs_contats">-->
<!--                      <div class="col-sm-12 col-md-6 div_selceted">-->
<!--                          <div class="date-time">-->
<!--                              <div class="title_dateTime">Date</div>-->
<!--                          </div>-->
<!--                          <div class="select_action">-->
<!--                              <div class="row">-->

<!--                                  <div class="col-md-6 mb-3 ">-->
<!--                                      <label for="birthday">From</label>-->
<!--                                      <div class="input-group" style="border-radius: 2px; border: 2px solid  #262B40;">-->
<!--                                          <span class="input-group-text "  style="border-radius: 2px;"><span class="far fa-calendar-alt"></span></span>-->
<!--                                          <input data-datepicker="" class="form-control datepicker-input" style="border-radius: 2px;" id="birthday1" type="text" placeholder="dd/mm/yyyy" required="">-->
<!--                                      </div>-->
<!--                                  </div>-->
<!--                                  <div class="col-md-6 mb-3 ">-->
<!--                                      <label for="birthday">At</label>-->
<!--                                      <div class="input-group" style="border-radius: 2px; border: 2px solid  #262B40;">-->
<!--                                          <span class="input-group-text "  style="border-radius: 2px;"><span class="far fa-calendar-alt"></span></span>-->
<!--                                          <input data-datepicker="" class="form-control datepicker-input" style="border-radius: 2px;" id="birthday" type="text" placeholder="dd/mm/yyyy" required="">-->
<!--                                      </div>-->
<!--                                  </div>-->
<!--                              </div>-->
<!--                          </div>-->
<!--                      </div>-->

<!--                      <div class="col-sm-12 col-md-6 div_selceted">-->
<!--                          <div class="date-time">-->
<!--                              <div class="title_dateTime">Time</div>-->
<!--                          </div>-->
<!--                          <div class="select_action">-->
<!--                              <div class="row">-->

<!--                                  <div class="col-md-6 mb-3 ">-->
<!--                                      <label for="birthday">From</label>-->
<!--                                      <div class="input-group" style="border-radius: 2px; border: 2px solid  #262B40;">-->
<!--                                          <span class="input-group-text "  style="border-radius: 2px;"></span>-->
<!--                                          <input  class="form-control " style="border-radius: 2px;"  type="time"  placeholder="00:00 P.M" required="">-->
<!--                                      </div>-->
<!--                                  </div>-->
<!--                                  <div class="col-md-6 mb-3 ">-->
<!--                                      <label for="birthday">At</label>-->
<!--                                      <div class="input-group" style="border-radius: 2px; border: 2px solid  #262B40;">-->
<!--                                          <span class="input-group-text "  style="border-radius: 2px;"></span>-->
<!--                                          <input  class="form-control " style="border-radius: 2px;"  type="time"  placeholder="00:00 P.M" required="">                                                </div>-->
<!--                                  </div>-->
<!--                              </div>-->
<!--                          </div>-->
<!--                      </div>-->

<!--                  </div>-->

<!--              </div>-->

<!--              &lt;!&ndash;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;***************-&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&ndash;&gt;-->
<!--              <div class="btn_5actions">-->
<!--                  <div class="row div-controld" >-->

<!--                      <div class="col-md-8">-->
<!--                          <div class="row">-->
<!--                              <div class="col-sm-12 col-md-2 div-btnaction">-->
<!--                                  <button class="btn btn-actions mr-2 ">-->
<!--                                      show-->
<!--                                  </button>-->
<!--                              </div>-->
<!--                              <div class="col-sm-12 col-md-2 div-btnaction">-->
<!--                                  <button class="btn btn-actions  mr-2 ">-->
<!--                                      Export-->
<!--                                  </button>-->
<!--                              </div>-->
<!--                              <div class="col-sm-12 col-md-2 div-btnaction">-->
<!--                                  <button class="btn btn-actions  mr-2 ">-->
<!--                                      Report Email-->
<!--                                  </button>-->
<!--                              </div>-->
<!--                              <div class="col-sm-12 col-md-2 div-btnaction">-->
<!--                                  <button class="btn btn-actions  mr-2 ">-->
<!--                                      Clear fields-->
<!--                                  </button>-->
<!--                              </div>-->
<!--                          </div>-->
<!--                      </div>-->

<!--                      <div class="col-md-4">-->
<!--                          <div class="col-sm-12 text-centerdiv-btnaction">-->
<!--                              <div class="form-check dashboard-check" style="padding-top: 10px;">-->
<!--                                  <input class="form-check-input" type="checkbox" value="" id="userCheck55">-->
<!--                                  <label class="form-check-label" for="userCheck55">-->
<!--                                      <label style="color: #fff;">Show signs</label>-->
<!--                                  </label>-->
<!--                              </div>-->
<!--                          </div>-->
<!--                      </div>-->
<!--                  </div>-->
<!--              </div>-->

<!--          </div>-->
<!--      </div>-->


<!--      <div class="row" style="margin-top: 3%">-->
<!--          <div class="col-md-12">-->
<!--              <div class="card map_tracking">-->
<!--                  <div id="mapbox" class="p-4 leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" tabindex="0" style="position: relative; outline: none;"><div class="leaflet-pane leaflet-map-pane" style="transform: translate3d(-35px, 0px, 0px);"><div class="leaflet-pane leaflet-tile-pane"><div class="leaflet-layer " style="z-index: 1; opacity: 1;"><div class="leaflet-tile-container leaflet-zoom-animated" style="z-index: 17; transform: translate3d(120px, 163px, 0px) scale(0.5);"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/light-v10/tiles/10/165/397?access_token=pk.eyJ1Ijoiem9sdGFudGhlbWVzYmVyZyIsImEiOiJjazZqaWUwcWswYTBvM21td2Jmcm5mYmdyIn0.7_5YCbbOFRnvqZzCNDo9fw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(723px, 419px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/light-v10/tiles/10/166/395?access_token=pk.eyJ1Ijoiem9sdGFudGhlbWVzYmVyZyIsImEiOiJjazZqaWUwcWswYTBvM21td2Jmcm5mYmdyIn0.7_5YCbbOFRnvqZzCNDo9fw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(979px, -93px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/light-v10/tiles/10/166/397?access_token=pk.eyJ1Ijoiem9sdGFudGhlbWVzYmVyZyIsImEiOiJjazZqaWUwcWswYTBvM21td2Jmcm5mYmdyIn0.7_5YCbbOFRnvqZzCNDo9fw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(979px, 419px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/light-v10/tiles/10/166/396?access_token=pk.eyJ1Ijoiem9sdGFudGhlbWVzYmVyZyIsImEiOiJjazZqaWUwcWswYTBvM21td2Jmcm5mYmdyIn0.7_5YCbbOFRnvqZzCNDo9fw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(979px, 163px, 0px); opacity: 0.295;"></div><div class="leaflet-tile-container leaflet-zoom-animated" style="z-index: 18; transform: translate3d(-239px, -326px, 0px) scale(1);"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/light-v10/tiles/9/82/198?access_token=pk.eyJ1Ijoiem9sdGFudGhlbWVzYmVyZyIsImEiOiJjazZqaWUwcWswYTBvM21td2Jmcm5mYmdyIn0.7_5YCbbOFRnvqZzCNDo9fw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(592px, 570px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/light-v10/tiles/9/82/197?access_token=pk.eyJ1Ijoiem9sdGFudGhlbWVzYmVyZyIsImEiOiJjazZqaWUwcWswYTBvM21td2Jmcm5mYmdyIn0.7_5YCbbOFRnvqZzCNDo9fw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(592px, 314px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/light-v10/tiles/9/81/198?access_token=pk.eyJ1Ijoiem9sdGFudGhlbWVzYmVyZyIsImEiOiJjazZqaWUwcWswYTBvM21td2Jmcm5mYmdyIn0.7_5YCbbOFRnvqZzCNDo9fw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(336px, 570px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/light-v10/tiles/9/83/198?access_token=pk.eyJ1Ijoiem9sdGFudGhlbWVzYmVyZyIsImEiOiJjazZqaWUwcWswYTBvM21td2Jmcm5mYmdyIn0.7_5YCbbOFRnvqZzCNDo9fw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(848px, 570px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/light-v10/tiles/9/82/199?access_token=pk.eyJ1Ijoiem9sdGFudGhlbWVzYmVyZyIsImEiOiJjazZqaWUwcWswYTBvM21td2Jmcm5mYmdyIn0.7_5YCbbOFRnvqZzCNDo9fw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(592px, 826px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/light-v10/tiles/9/81/197?access_token=pk.eyJ1Ijoiem9sdGFudGhlbWVzYmVyZyIsImEiOiJjazZqaWUwcWswYTBvM21td2Jmcm5mYmdyIn0.7_5YCbbOFRnvqZzCNDo9fw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(336px, 314px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/light-v10/tiles/9/83/197?access_token=pk.eyJ1Ijoiem9sdGFudGhlbWVzYmVyZyIsImEiOiJjazZqaWUwcWswYTBvM21td2Jmcm5mYmdyIn0.7_5YCbbOFRnvqZzCNDo9fw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(848px, 314px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/light-v10/tiles/9/81/199?access_token=pk.eyJ1Ijoiem9sdGFudGhlbWVzYmVyZyIsImEiOiJjazZqaWUwcWswYTBvM21td2Jmcm5mYmdyIn0.7_5YCbbOFRnvqZzCNDo9fw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(336px, 826px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/light-v10/tiles/9/83/199?access_token=pk.eyJ1Ijoiem9sdGFudGhlbWVzYmVyZyIsImEiOiJjazZqaWUwcWswYTBvM21td2Jmcm5mYmdyIn0.7_5YCbbOFRnvqZzCNDo9fw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(848px, 826px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/light-v10/tiles/9/80/198?access_token=pk.eyJ1Ijoiem9sdGFudGhlbWVzYmVyZyIsImEiOiJjazZqaWUwcWswYTBvM21td2Jmcm5mYmdyIn0.7_5YCbbOFRnvqZzCNDo9fw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(80px, 570px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/light-v10/tiles/9/84/198?access_token=pk.eyJ1Ijoiem9sdGFudGhlbWVzYmVyZyIsImEiOiJjazZqaWUwcWswYTBvM21td2Jmcm5mYmdyIn0.7_5YCbbOFRnvqZzCNDo9fw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(1104px, 570px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/light-v10/tiles/9/80/197?access_token=pk.eyJ1Ijoiem9sdGFudGhlbWVzYmVyZyIsImEiOiJjazZqaWUwcWswYTBvM21td2Jmcm5mYmdyIn0.7_5YCbbOFRnvqZzCNDo9fw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(80px, 314px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/light-v10/tiles/9/84/197?access_token=pk.eyJ1Ijoiem9sdGFudGhlbWVzYmVyZyIsImEiOiJjazZqaWUwcWswYTBvM21td2Jmcm5mYmdyIn0.7_5YCbbOFRnvqZzCNDo9fw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(1104px, 314px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/light-v10/tiles/9/80/199?access_token=pk.eyJ1Ijoiem9sdGFudGhlbWVzYmVyZyIsImEiOiJjazZqaWUwcWswYTBvM21td2Jmcm5mYmdyIn0.7_5YCbbOFRnvqZzCNDo9fw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(80px, 826px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/light-v10/tiles/9/84/199?access_token=pk.eyJ1Ijoiem9sdGFudGhlbWVzYmVyZyIsImEiOiJjazZqaWUwcWswYTBvM21td2Jmcm5mYmdyIn0.7_5YCbbOFRnvqZzCNDo9fw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(1104px, 826px, 0px); opacity: 1;"></div></div></div><div class="leaflet-pane leaflet-shadow-pane"></div><div class="leaflet-pane leaflet-overlay-pane"></div><div class="leaflet-pane leaflet-marker-pane"><img src="/assets/img/marker.svg" class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive" alt="" tabindex="0" style="margin-left: -22px; margin-top: -94px; width: 38px; height: 95px; transform: translate3d(329px, 253px, 0px); z-index: 253;"><img src="/assets/img/marker.svg" class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive" alt="" tabindex="0" style="margin-left: -22px; margin-top: -94px; width: 38px; height: 95px; transform: translate3d(336px, 303px, 0px); z-index: 303;"><img src="/assets/img/marker.svg" class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive" alt="" tabindex="0" style="margin-left: -22px; margin-top: -94px; width: 38px; height: 95px; transform: translate3d(373px, 335px, 0px); z-index: 335;"><img src="/assets/img/marker.svg" class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive" alt="" tabindex="0" style="margin-left: -22px; margin-top: -94px; width: 38px; height: 95px; transform: translate3d(434px, 404px, 0px); z-index: 404;"><img src="/assets/img/marker.svg" class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive" alt="" tabindex="0" style="margin-left: -22px; margin-top: -94px; width: 38px; height: 95px; transform: translate3d(500px, 409px, 0px); z-index: 409;"></div><div class="leaflet-pane leaflet-tooltip-pane"></div><div class="leaflet-pane leaflet-popup-pane"></div><div class="leaflet-proxy leaflet-zoom-animated" style="transform: translate3d(21167px, 50744px, 0px) scale(256);"></div></div><div class="leaflet-control-container">-->

<!--                      <div class="leaflet-top leaflet-right">-->

<!--                          <div class="leaflet-control-zoom leaflet-bar leaflet-control"><a class="leaflet-control-zoom-in" href="#" title="Zoom in" role="button" aria-label="Zoom in">+</a><a class="leaflet-control-zoom-out" href="#" title="Zoom out" role="button" aria-label="Zoom out">−</a>-->

<!--                          </div>-->

<!--                      </div>-->


<!--                      <div style="float: left;">-->

<!--                          <div class=" leaflet-bar leaflet-control"><a class="leaflet-control" href="#"  role="button">-->
<!--                              <span class="fas fa-layer-group layer-icon"></span></a>-->

<!--                          </div>-->

<!--                      </div>-->




<!--                      <div class="leaflet-top leaflet-right"></div><div class="leaflet-bottom leaflet-right"></div><div class="leaflet-bottom leaflet-right"><div class="leaflet-control-attribution leaflet-control">-->

<!--                      <a href="https://leafletjs.com" title="A JS library for interactive maps">Leaflet</a> | Map data © <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a></div></div></div></div>-->
<!--              </div>-->
<!--          </div>-->

<!--      </div>-->


<!--      <div class="col-md-6 mb-3 mt-4">-->
<!--          <label style="float: left;">Type</label>-->
<!--          <select class="form-select mb-0" id="gender" aria-label="Gender select example">-->
<!--              <option selected=""></option>-->
<!--              <option value="1" class="Route">Route</option>-->
<!--              <option value="2" class="Events">Events</option>-->
<!--              <option value="3" class="Trips">Trips</option>-->
<!--              <option value="4" class="Stops">Stops</option>-->
<!--              <option value="5" class="Summary">Summary</option>-->
<!--              <option value="6" class="Daily_Summary">Daily Summary</option>-->
<!--              <option value="7" class="chart">chart</option>-->
<!--          </select>-->
<!--      </div>-->

<!--      <div class="row" style="margin-top: 5%;">-->
<!--          <div class="col-12">-->
<!--              <div class="row">-->
<!--                  <div class="col-12 mb-4">-->
<!--                      <div class="card border-light shadow-sm table_events">-->
<!--                          <div class=" title_charts1 row">-->

<!--                              <div class="col-md-6 mb-3">-->
<!--                                  <h2 class="title_tap">Events</h2>-->
<!--                              </div>-->

<!--                              <div class="col-md-6 mb-3  table-tap" >-->
<!--                                  <div id="list1" class="dropdown-check-list" tabindex="100">-->

<!--                                      <span class="fa fa-filter anchor" aria-hidden="true"></span>-->
<!--                                      <ul class="items" style="background: #262B40;">-->
<!--                                          <li>-->
<!--                                              <input type="checkbox" id="chk1" onclick="myFunction(1)"><label>First Checkbox</label><br><br>-->
<!--                                          </li>-->
<!--                                          <li>-->
<!--                                              <input type="checkbox" id="chk2" onclick="myFunction(2)"><label>Second Checkbox</label><br><br>-->
<!--                                          </li>-->
<!--                                          <li>-->
<!--                                              <input type="checkbox" id="chk3" onclick="myFunction(3)"><label>Third Checkbox</label><br><br>-->
<!--                                          </li>-->


<!--                                      </ul>-->
<!--                                  </div>-->
<!--                              </div>-->


<!--                          </div>-->
<!--                          <div class="table-responsive">-->

<!--                              <div id="div2">-->
<!--                                  <table id="mtTbl">-->
<!--                                      <tr id="Head"></tr>-->

<!--                                      <tr id="Tr1"></tr>-->

<!--                                      <tr id="Tr2"></tr>-->

<!--                                      <tr id="Tr3"></tr>-->


<!--                                  </table>-->
<!--                              </div>-->
<!--                              <div id="ClearFix"></div>-->
<!--                          </div>-->
<!--                      </div>-->


<!--                  </div>-->
<!--              </div>-->
<!--          </div>-->


<!--      </div>-->


<!--      <p>-->
<!--          <a class="btn text-dark btndisplay show-more collapsed" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">-->
<!--              Click to show more details-->
<!--          </a>-->

<!--      </p>-->

<!--      <div class="collapse" id="collapseExample" >-->
<!--          <div class="row">-->
<!--              <div class="col-12">-->
<!--                  <div class="row">-->

<!--                      <div class="col-12">-->
<!--                          <div class="card border-light shadow-sm">-->
<!--                              <div class="card-header border-bottom border-light">-->
<!--                                  <button class="btn btn-secondary text-primary mr-2 ">-->
<!--                                      <i class="fa fa-share-alt" aria-hidden="true"></i>-->
<!--                                  </button>-->

<!--                              </div>-->
<!--                              <div class="card-body">-->
<!--                                  <div class="row">-->
<!--                                      <div class="col-sm-12 col-md-3 col-lg-3">-->
<!--                                          <div class="properti1">-->
<!--                                              <h6 class="title_proparity">Vehicle speed</h6>-->
<!--                                              <div class="img_proparity">-->
<!--                                                  <img src="/assets/img/driving-speed.png" class="img_prpr">-->
<!--                                              </div>-->

<!--                                              <h6 class="num-prop">100 k.m</h6>-->
<!--                                          </div>-->
<!--                                      </div>-->

<!--                                      &lt;!&ndash;&#45;&#45;***************************************&ndash;&gt;-->


<!--                                      <div class="col-sm-12 col-md-3 col-lg-3">-->
<!--                                          <div class="properti1">-->
<!--                                              <h6 class="title_proparity">Flight distance</h6>-->
<!--                                              <div class="img_proparity">-->
<!--                                                  <img src="/assets/img/track-flight.png" class="img_prpr">-->
<!--                                              </div>-->

<!--                                              <h6 class="num-prop">100 k.m</h6>-->
<!--                                          </div>-->
<!--                                      </div>-->

<!--                                      &lt;!&ndash;&#45;&#45;***************************************&ndash;&gt;-->



<!--                                      <div class="col-sm-12 col-md-3 col-lg-3">-->
<!--                                          <div class="properti1">-->
<!--                                              <h6 class="title_proparity">Total distance</h6>-->
<!--                                              <div class="img_proparity">-->
<!--                                                  <img src="/assets/img/distance (1).png" class="img_prpr">-->
<!--                                              </div>-->

<!--                                              <h6 class="num-prop">100 k.m</h6>-->
<!--                                          </div>-->
<!--                                      </div>-->

<!--                                      &lt;!&ndash;&#45;&#45;***************************************&ndash;&gt;-->


<!--                                      <div class="col-sm-12 col-md-3 col-lg-3">-->
<!--                                          <div class="properti1">-->
<!--                                              <h6 class="title_proparity">Vehicle weight</h6>-->
<!--                                              <div class="img_proparity">-->
<!--                                                  <img src="/assets/img/vehicle-weight.png" class="img_prpr">-->
<!--                                              </div>-->

<!--                                              <h6 class="num-prop">100 k.g</h6>-->
<!--                                          </div>-->
<!--                                      </div>-->




<!--                                  </div>-->
<!--                                  <div class="row" style="margin-top: 5%">-->

<!--                                      &lt;!&ndash;&#45;&#45;***************************************&ndash;&gt;-->
<!--                                      <div class="col-sm-12 col-md-3 col-lg-3">-->
<!--                                          <div class="properti1">-->
<!--                                              <h6 class="title_proparity">Device protocol</h6>-->
<!--                                              <div class="img_proparity">-->
<!--                                                  <img src="/assets/img/responsive-design.png" class="img_prpr">-->
<!--                                              </div>-->

<!--                                              <h6 class="num-prop">teltonika</h6>-->
<!--                                          </div>-->
<!--                                      </div>-->

<!--                                      &lt;!&ndash;&#45;&#45;***************************************&ndash;&gt;-->
<!--                                      <div class="col-sm-12 col-md-3 col-lg-3">-->
<!--                                          <div class="properti1">-->
<!--                                              <h6 class="title_proparity">Vehicle State</h6>-->
<!--                                              <div class="img_proparity">-->
<!--                                                  <img src="/assets/img/self-driving-car.png" class="img_prpr" height="128px">-->
<!--                                              </div>-->

<!--                                              <h6 class="num-prop">online</h6>-->
<!--                                          </div>-->
<!--                                      </div>-->

<!--                                      &lt;!&ndash;&#45;&#45;***************************************&ndash;&gt;-->
<!--                                      <div class="col-sm-12 col-md-3 col-lg-3">-->
<!--                                          <div class="properti1">-->
<!--                                              <h6 class="title_proparity">Battery case</h6>-->
<!--                                              <div class="img_proparity">-->
<!--                                                  <img src="/assets/img/uncharged-battery.png" class="img_prpr">-->
<!--                                              </div>-->

<!--                                              <h6 class="num-prop">25.62 V</h6>-->
<!--                                          </div>-->
<!--                                      </div>-->

<!--                                      &lt;!&ndash;&#45;&#45;***************************************&ndash;&gt;-->
<!--                                      <div class="col-sm-12 col-md-3 col-lg-3">-->
<!--                                          <div class="properti1">-->
<!--                                              <h6 class="title_proparity">Operating hours</h6>-->
<!--                                              <div class="img_proparity">-->
<!--                                                  <img src="/assets/img/time.png" class="img_prpr">-->
<!--                                              </div>-->

<!--                                              <h6 class="num-prop">20</h6>-->
<!--                                          </div>-->
<!--                                      </div>-->

<!--                                      &lt;!&ndash;&#45;&#45;***************************************&ndash;&gt;-->
<!--                                  </div>-->
<!--                              </div>-->
<!--                          </div>-->
<!--                      </div>-->
<!--                  </div>-->
<!--              </div>-->


<!--          </div>-->
<!--      </div>-->

  </div>
</template>
