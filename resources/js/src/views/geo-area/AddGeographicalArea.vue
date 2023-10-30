<template>
    <div>
<!--        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">-->
<!--            <div>-->
<!--                <button class="btn btn-secondary text-dark mr-2 ">-->
<!--                    Add a geographic area-->
<!--                </button>-->
<!--                <div class="dropdown-menu dashboard-dropdown dropdown-menu-left mt-2">-->
<!--                    <a class="dropdown-item font-weight-bold" href="#"><span class="far fa-file-alt mr-2"></span>Document</a>-->
<!--                    <a class="dropdown-item font-weight-bold" href="#"><span class="far fa-comment-dots mr-2"></span>Message</a>-->
<!--                    <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-box-open mr-2"></span>Product</a>-->
<!--                    <div role="separator" class="dropdown-divider"></div>-->
<!--                    <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-rocket text-danger mr-2"></span>Subscription Plan</a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div>-->
<!--                <button type="button" class="btn btn-primary mr-2"><span class="fas fa-calendar-alt"></span></button>-->
<!--                <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                    <span class="fas fa-clipboard mr-2"></span>Reports-->
<!--                    <span class="icon icon-small ml-1"><span class="fas fa-chevron-down"></span></span>-->
<!--                </button>-->
<!--                <div class="dropdown-menu dashboard-dropdown dropdown-menu-left mt-2">-->
<!--                    <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-box-open mr-2"></span>Products</a>-->
<!--                    <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-store mr-2"></span>Customers</a>-->
<!--                    <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-cart-arrow-down mr-2"></span>Orders</a>-->
<!--                    <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-chart-pie mr-2"></span>Console</a>-->
<!--                    <div role="separator" class="dropdown-divider"></div>-->
<!--                    <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-rocket text-success mr-2"></span>All Reports</a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="row">-->
<!--            <div class="col-12 col-xl-12">-->
<!--                <div class="card card-body bg-white border-light shadow-sm mb-4">-->
<!--                    <h2 class="h5 mb-4 title_user">Geofence</h2>-->
<!--                    <form>-->
<!--                        <div class="row">-->
<!--                            <div class="col-md-6 mb-3">-->
<!--                                <div>-->
<!--                                    <label for="area_name">Area Name</label>-->
<!--                                    <input class="form-control" id="area_name"  type="text"  required>-->
<!--                                </div>-->
<!--                            </div>-->


<!--                            <div class="col-md-6 mb-3">-->
<!--                                <div>-->
<!--                                    <label for="desc">Description</label>-->
<!--                                    <input class="form-control" id="desc"  type="text"  required>-->
<!--                                </div>-->
<!--                            </div>-->



<!--                            <div class="col-md-6 mb-3">-->
<!--                                <label for="birthday">Calender</label>-->
<!--                                <div class="input-group">-->
<!--                                    <span class="input-group-text"><span class="far fa-calendar-alt"></span></span>-->
<!--                                    <input data-datepicker="" class="form-control" id="birthday" type="text" placeholder="dd/mm/yyyy" required>-->
<!--                                </div>-->
<!--                            </div>-->


<!--                            <div class="col-md-6 mb-3">-->
<!--                                <label for="sel_area">Select Area</label>-->

<!--                                <br>-->

<!--                                <div class="ui icon input col-md-12">-->
<!--                                    <input id="sel_area" class="form-control" type="text">-->

<!--                                    <a href="#"></a><i class="fas fa-street-view" style="margin-left: -5%; padding-right: 15px;"></i>-->
<!--                                </div>-->

<!--                            </div>-->


<!--                        </div>-->



<!--                        &lt;!&ndash;***************************************************************&ndash;&gt;-->

<!--                        <h2 class="h5 mb-4 title_user">Proparites</h2>-->
<!--                        <form>-->
<!--                            <div class="row">-->
<!--                                <div class="col-sm-6 mb-3">-->
<!--                                    <label for="state">Property name</label>-->
<!--                                    <select class="form-select w-100 mb-0" id="state" name="state" aria-label="State select example">-->
<!--                                        <option selected="">State</option>-->
<!--                                        <option value="AL">Alabama</option>-->
<!--                                        <option value="AK">Alaska</option>-->
<!--                                        <option value="AZ">Arizona</option>-->
<!--                                        <option value="AR">Arkansas</option>-->
<!--                                        <option value="CA">California</option>-->
<!--                                        <option value="CO">Colorado</option>-->
<!--                                        <option value="CT">Connecticut</option>-->
<!--                                        <option value="DE">Delaware</option>-->
<!--                                        <option value="DC">District Of Columbia</option>-->
<!--                                        <option value="FL">Florida</option>-->
<!--                                        <option value="GA">Georgia</option>-->
<!--                                        <option value="HI">Hawaii</option>-->
<!--                                        <option value="ID">Idaho</option>-->
<!--                                        <option value="IL">Illinois</option>-->
<!--                                        <option value="IN">Indiana</option>-->
<!--                                        <option value="IA">Iowa</option>-->
<!--                                        <option value="KS">Kansas</option>-->
<!--                                        <option value="KY">Kentucky</option>-->
<!--                                        <option value="LA">Louisiana</option>-->
<!--                                        <option value="ME">Maine</option>-->
<!--                                        <option value="MD">Maryland</option>-->
<!--                                        <option value="MA">Massachusetts</option>-->
<!--                                        <option value="MI">Michigan</option>-->
<!--                                        <option value="MN">Minnesota</option>-->
<!--                                        <option value="MS">Mississippi</option>-->
<!--                                        <option value="MO">Missouri</option>-->
<!--                                        <option value="MT">Montana</option>-->
<!--                                        <option value="NE">Nebraska</option>-->
<!--                                        <option value="NV">Nevada</option>-->
<!--                                        <option value="NH">New Hampshire</option>-->
<!--                                        <option value="NJ">New Jersey</option>-->
<!--                                        <option value="NM">New Mexico</option>-->
<!--                                        <option value="NY">New York</option>-->
<!--                                        <option value="NC">North Carolina</option>-->
<!--                                        <option value="ND">North Dakota</option>-->
<!--                                        <option value="OH">Ohio</option>-->
<!--                                        <option value="OK">Oklahoma</option>-->
<!--                                        <option value="OR">Oregon</option>-->
<!--                                        <option value="PA">Pennsylvania</option>-->
<!--                                        <option value="RI">Rhode Island</option>-->
<!--                                        <option value="SC">South Carolina</option>-->
<!--                                        <option value="SD">South Dakota</option>-->
<!--                                        <option value="TN">Tennessee</option>-->
<!--                                        <option value="TX">Texas</option>-->
<!--                                        <option value="UT">Utah</option>-->
<!--                                        <option value="VT">Vermont</option>-->
<!--                                        <option value="VA">Virginia</option>-->
<!--                                        <option value="WA">Washington</option>-->
<!--                                        <option value="WV">West Virginia</option>-->
<!--                                        <option value="WI">Wisconsin</option>-->
<!--                                        <option value="WY">Wyoming</option>-->
<!--                                    </select>-->
<!--                                </div>-->


<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <label for="prop_val">Property value</label>-->
<!--                                    <select class="form-select w-100 mb-0" id="prop_val" name="state" aria-label="State select example">-->
<!--                                        <option selected="">State</option>-->
<!--                                        <option value="AL">Alabama</option>-->
<!--                                        <option value="AK">Alaska</option>-->
<!--                                        <option value="AZ">Arizona</option>-->
<!--                                        <option value="AR">Arkansas</option>-->
<!--                                        <option value="CA">California</option>-->
<!--                                        <option value="CO">Colorado</option>-->
<!--                                        <option value="CT">Connecticut</option>-->
<!--                                        <option value="DE">Delaware</option>-->
<!--                                        <option value="DC">District Of Columbia</option>-->
<!--                                        <option value="FL">Florida</option>-->
<!--                                        <option value="GA">Georgia</option>-->
<!--                                        <option value="HI">Hawaii</option>-->
<!--                                        <option value="ID">Idaho</option>-->
<!--                                        <option value="IL">Illinois</option>-->
<!--                                        <option value="IN">Indiana</option>-->
<!--                                        <option value="IA">Iowa</option>-->
<!--                                        <option value="KS">Kansas</option>-->
<!--                                        <option value="KY">Kentucky</option>-->
<!--                                        <option value="LA">Louisiana</option>-->
<!--                                        <option value="ME">Maine</option>-->
<!--                                        <option value="MD">Maryland</option>-->
<!--                                        <option value="MA">Massachusetts</option>-->
<!--                                        <option value="MI">Michigan</option>-->
<!--                                        <option value="MN">Minnesota</option>-->
<!--                                        <option value="MS">Mississippi</option>-->
<!--                                        <option value="MO">Missouri</option>-->
<!--                                        <option value="MT">Montana</option>-->
<!--                                        <option value="NE">Nebraska</option>-->
<!--                                        <option value="NV">Nevada</option>-->
<!--                                        <option value="NH">New Hampshire</option>-->
<!--                                        <option value="NJ">New Jersey</option>-->
<!--                                        <option value="NM">New Mexico</option>-->
<!--                                        <option value="NY">New York</option>-->
<!--                                        <option value="NC">North Carolina</option>-->
<!--                                        <option value="ND">North Dakota</option>-->
<!--                                        <option value="OH">Ohio</option>-->
<!--                                        <option value="OK">Oklahoma</option>-->
<!--                                        <option value="OR">Oregon</option>-->
<!--                                        <option value="PA">Pennsylvania</option>-->
<!--                                        <option value="RI">Rhode Island</option>-->
<!--                                        <option value="SC">South Carolina</option>-->
<!--                                        <option value="SD">South Dakota</option>-->
<!--                                        <option value="TN">Tennessee</option>-->
<!--                                        <option value="TX">Texas</option>-->
<!--                                        <option value="UT">Utah</option>-->
<!--                                        <option value="VT">Vermont</option>-->
<!--                                        <option value="VA">Virginia</option>-->
<!--                                        <option value="WA">Washington</option>-->
<!--                                        <option value="WV">West Virginia</option>-->
<!--                                        <option value="WI">Wisconsin</option>-->
<!--                                        <option value="WY">Wyoming</option>-->
<!--                                    </select>-->
<!--                                </div>-->

<!--                                <a href="#">-->
<!--                                    <span data-brackets-id="25270" class="fas fa-plus mr-2"></span>More-->
<!--                                </a>-->

<!--                            </div>-->
<!--                        </form>-->


<!--                        <div class="mt-3 text-right" style="margin-top: 5%;">-->
<!--                            <button type="submit" class="btn btn-success">Add Now</button>-->
<!--                        </div>-->



<!--                        &lt;!&ndash;*****************************************************************&ndash;&gt;-->


<!--                    </form>-->
<!--                </div>-->


<!--            </div>-->
<!--        </div>-->

    </div>
</template>
