<template>
    <div>
        <loading :active.sync="isLoad"
                 :is-full-page="fullPage"
                 :height="loaderHeight"
                 :width="loaderWidth"
                 :color="loaderColor"
                 :loader="loaderType"
                 :background-color="loaderBgColor"></loading>
<!--        <form>-->
<!--            <div class="row">-->
<!--                <div class="col-12 col-xl-8">-->
<!--                    <div class="card card-body bg-white border-light shadow-sm mb-4">-->
<!--                        <h2 class="h5 mb-4 title_user">General information</h2>-->
<!--                        <div class="row">-->
<!--                            <div class="col-md-6 mb-3">-->
<!--                                <div>-->
<!--                                    <label for="fullname">Full Name</label>-->
<!--                                    <input v-model="user.name" class="form-control" id="fullname" type="text" placeholder="Enter your full name" >-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-md-6 mb-3">-->
<!--                                <div>-->
<!--                                    <label for="company_name">Company Name</label>-->
<!--                                    <input v-model="user.company.full_name_ar" class="form-control" id="company_name" type="text" placeholder="Also your company name" >-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="row align-items-center">-->
<!--                            <div class="col-md-6 mb-3">-->
<!--                                <label for="birthday">Birthday</label>-->
<!--                                <div class="input-group">-->
<!--                                    <span class="input-group-text"><span class="far fa-calendar-alt"></span></span>-->
<!--                                    <input v-model="user.user.birthday"  class="form-control" id="birthday" type="date" placeholder="dd/mm/yyyy" >-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-md-6 mb-3">-->
<!--                                <label for="gender">Gender</label>-->
<!--                                <select v-model="user.user.gender" class="form-select mb-0" id="gender" aria-label="Gender select example">-->
<!--                                    <option selected>Gender</option>-->
<!--                                    <option value="F">Female</option>-->
<!--                                    <option value="M">Male</option>-->
<!--                                </select>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="row">-->
<!--                            <div class="col-md-6 mb-3">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="email">Email</label>-->
<!--                                    <input readonly v-model="user.email" class="form-control" id="email" type="email" placeholder="name@company.com" >-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-md-6 mb-3">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="phone">Phone</label>-->
<!--                                    <input v-model="user.phone" class="form-control" id="phone" type="text" placeholder="+12-345 678 910" >-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="col-md-6 mb-3">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="mobile">Mobile</label>-->
<!--                                    <input v-model="user.user.mobile" class="form-control" id="mobile" type="text" placeholder="+12-345 678 910" >-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->


<!--                        <h2 class="h5 my-4 title_user">Location</h2>-->

<!--                        <div class="row">-->
<!--                            <div class="col-sm-9 mb-3">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="address">Address</label>-->
<!--                                    <input v-model="user.user.address" class="form-control" id="address" type="text" placeholder="Enter your home address" >-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-sm-3 mb-3">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="number">Number</label>-->
<!--                                    <input v-model="user.user.addressNo" class="form-control" id="number" type="number" placeholder="No." >-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="row">-->
<!--                            <div class="col-sm-4 mb-3">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="city">City</label>-->
<!--                                    <input v-model="user.user.city" class="form-control" id="city" type="text" placeholder="City" >-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-sm-4 mb-3">-->
<!--                                <label for="state">State</label>-->
<!--                                <input v-model="user.user.state" class="form-control" id="state" type="text" placeholder="State" >-->
<!--                            </div>-->
<!--                            <div class="col-sm-4">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="zip">ZIP</label>-->
<!--                                    <input v-model="user.user.zipCode" class="form-control" id="zip" type="tel" placeholder="ZIP" >-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->


<!--                        <h2 class="h5 mb-4 title_user">Options</h2>-->

<!--                        <div class="row">-->
<!--                            <div class="col-md-12 mb-3">-->
<!--                                <div>-->
<!--                                    <label for="maplayer">Map layer</label>-->
<!--                                    <input v-model="user.user.mapLayer" class="form-control" id="maplayer" type="text" placeholder="Map layer" >-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="col-sm-4 mb-3">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="long">longitude</label>-->
<!--                                    <input class="form-control" id="long" type="number" placeholder="longitude" >-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="col-sm-4 mb-3">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="lat">Latitude</label>-->
<!--                                    <input class="form-control" id="lat" type="number" placeholder="City" >-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="col-sm-4 mb-3">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="approx">Approximation</label>-->
<!--                                    <input class="form-control" id="approx" type="number" placeholder="number" >-->
<!--                                </div>-->
<!--                            </div>-->



<!--                            <div class="col-sm-6 mb-3">-->
<!--                                <label for="coord">Coordinate formula</label>-->
<!--                                <select class="form-select w-100 mb-0" id="coord" name="state" aria-label="State select example">-->
<!--                                    <option selected>select</option>-->
<!--                                    <option value="AL">Alabama</option>-->
<!--                                    <option value="AK">Alaska</option>-->
<!--                                    <option value="AZ">Arizona</option>-->
<!--                                    <option value="AR">Arkansas</option>-->
<!--                                    <option value="CA">California</option>-->
<!--                                    <option value="CO">Colorado</option>-->
<!--                                    <option value="CT">Connecticut</option>-->
<!--                                    <option value="DE">Delaware</option>-->
<!--                                    <option value="DC">District Of Columbia</option>-->
<!--                                    <option value="FL">Florida</option>-->
<!--                                    <option value="GA">Georgia</option>-->
<!--                                    <option value="HI">Hawaii</option>-->
<!--                                    <option value="ID">Idaho</option>-->
<!--                                    <option value="IL">Illinois</option>-->
<!--                                    <option value="IN">Indiana</option>-->
<!--                                    <option value="IA">Iowa</option>-->
<!--                                    <option value="KS">Kansas</option>-->
<!--                                    <option value="KY">Kentucky</option>-->
<!--                                    <option value="LA">Louisiana</option>-->
<!--                                    <option value="ME">Maine</option>-->
<!--                                    <option value="MD">Maryland</option>-->
<!--                                    <option value="MA">Massachusetts</option>-->
<!--                                    <option value="MI">Michigan</option>-->
<!--                                    <option value="MN">Minnesota</option>-->
<!--                                    <option value="MS">Mississippi</option>-->
<!--                                    <option value="MO">Missouri</option>-->
<!--                                    <option value="MT">Montana</option>-->
<!--                                    <option value="NE">Nebraska</option>-->
<!--                                    <option value="NV">Nevada</option>-->
<!--                                    <option value="NH">New Hampshire</option>-->
<!--                                    <option value="NJ">New Jersey</option>-->
<!--                                    <option value="NM">New Mexico</option>-->
<!--                                    <option value="NY">New York</option>-->
<!--                                    <option value="NC">North Carolina</option>-->
<!--                                    <option value="ND">North Dakota</option>-->
<!--                                    <option value="OH">Ohio</option>-->
<!--                                    <option value="OK">Oklahoma</option>-->
<!--                                    <option value="OR">Oregon</option>-->
<!--                                    <option value="PA">Pennsylvania</option>-->
<!--                                    <option value="RI">Rhode Island</option>-->
<!--                                    <option value="SC">South Carolina</option>-->
<!--                                    <option value="SD">South Dakota</option>-->
<!--                                    <option value="TN">Tennessee</option>-->
<!--                                    <option value="TX">Texas</option>-->
<!--                                    <option value="UT">Utah</option>-->
<!--                                    <option value="VT">Vermont</option>-->
<!--                                    <option value="VA">Virginia</option>-->
<!--                                    <option value="WA">Washington</option>-->
<!--                                    <option value="WV">West Virginia</option>-->
<!--                                    <option value="WI">Wisconsin</option>-->
<!--                                    <option value="WY">Wyoming</option>-->
<!--                                </select>-->
<!--                            </div>-->


<!--                            <div class="col-md-6 mb-3">-->
<!--                                <label for="pol">POL points the layer of interest</label>-->
<!--                                <select class="form-select w-100 mb-0" id="pol" name="state" aria-label="State select example">-->
<!--                                    <option selected>select</option>-->
<!--                                    <option value="AL">Alabama</option>-->
<!--                                    <option value="AK">Alaska</option>-->
<!--                                    <option value="AZ">Arizona</option>-->
<!--                                    <option value="AR">Arkansas</option>-->
<!--                                    <option value="CA">California</option>-->
<!--                                    <option value="CO">Colorado</option>-->
<!--                                    <option value="CT">Connecticut</option>-->
<!--                                    <option value="DE">Delaware</option>-->
<!--                                    <option value="DC">District Of Columbia</option>-->
<!--                                    <option value="FL">Florida</option>-->
<!--                                    <option value="GA">Georgia</option>-->
<!--                                    <option value="HI">Hawaii</option>-->
<!--                                    <option value="ID">Idaho</option>-->
<!--                                    <option value="IL">Illinois</option>-->
<!--                                    <option value="IN">Indiana</option>-->
<!--                                    <option value="IA">Iowa</option>-->
<!--                                    <option value="KS">Kansas</option>-->
<!--                                    <option value="KY">Kentucky</option>-->
<!--                                    <option value="LA">Louisiana</option>-->
<!--                                    <option value="ME">Maine</option>-->
<!--                                    <option value="MD">Maryland</option>-->
<!--                                    <option value="MA">Massachusetts</option>-->
<!--                                    <option value="MI">Michigan</option>-->
<!--                                    <option value="MN">Minnesota</option>-->
<!--                                    <option value="MS">Mississippi</option>-->
<!--                                    <option value="MO">Missouri</option>-->
<!--                                    <option value="MT">Montana</option>-->
<!--                                    <option value="NE">Nebraska</option>-->
<!--                                    <option value="NV">Nevada</option>-->
<!--                                    <option value="NH">New Hampshire</option>-->
<!--                                    <option value="NJ">New Jersey</option>-->
<!--                                    <option value="NM">New Mexico</option>-->
<!--                                    <option value="NY">New York</option>-->
<!--                                    <option value="NC">North Carolina</option>-->
<!--                                    <option value="ND">North Dakota</option>-->
<!--                                    <option value="OH">Ohio</option>-->
<!--                                    <option value="OK">Oklahoma</option>-->
<!--                                    <option value="OR">Oregon</option>-->
<!--                                    <option value="PA">Pennsylvania</option>-->
<!--                                    <option value="RI">Rhode Island</option>-->
<!--                                    <option value="SC">South Carolina</option>-->
<!--                                    <option value="SD">South Dakota</option>-->
<!--                                    <option value="TN">Tennessee</option>-->
<!--                                    <option value="TX">Texas</option>-->
<!--                                    <option value="UT">Utah</option>-->
<!--                                    <option value="VT">Vermont</option>-->
<!--                                    <option value="VA">Virginia</option>-->
<!--                                    <option value="WA">Washington</option>-->
<!--                                    <option value="WV">West Virginia</option>-->
<!--                                    <option value="WI">Wisconsin</option>-->
<!--                                    <option value="WY">Wyoming</option>-->
<!--                                </select>-->
<!--                            </div>-->

<!--                        </div>-->

<!--                        <div class="row">-->
<!--                            <div class="col-md-6 mb-3">-->
<!--                                <div class="form-check dashboard-check">-->
<!--                                    <input class="form-check-input" type="checkbox" value="" id="formula">-->
<!--                                    <label class="form-check-label" for="formula">-->
<!--                                        <label for="formula">12 hour formula</label>-->
<!--                                    </label>-->
<!--                                </div>-->
<!--                            </div>-->

<!--                        </div>-->

<!--                        <h2 class="h5 mb-4 title_user">Permissions</h2>-->

<!--                        <div class="row">-->


<!--                            <div class="col-md-6 mb-3">-->
<!--                                <div class="form-check dashboard-check">-->
<!--                                    <input v-model="user.disabled" class="form-check-input" type="checkbox" value="" id="disabled">-->
<!--                                    <label class="form-check-label" for="disabled">-->
<!--                                        <label for="disabled">Disabled</label>-->
<!--                                    </label>-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="col-md-6 mb-3">-->
<!--                                <div class="form-check dashboard-check">-->
<!--                                    <input v-model="user.administrator" class="form-check-input" type="checkbox" value="" id="admin">-->
<!--                                    <label class="form-check-label" for="admin">-->
<!--                                        <label for="admin">Admin</label>-->
<!--                                    </label>-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="col-md-6 mb-3">-->
<!--                                <div class="form-check dashboard-check">-->
<!--                                    <input v-model="user.deviceReadonly" class="form-check-input" type="checkbox" value="" id="devicereadonly">-->
<!--                                    <label class="form-check-label" for="devicereadonly">-->
<!--                                        <label for="devicereadonly">Device Readonly</label>-->
<!--                                    </label>-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="col-md-6 mb-3">-->
<!--                                <div class="form-check dashboard-check">-->
<!--                                    <input v-model="user.readonly" class="form-check-input" type="checkbox" value="" id="readonly">-->
<!--                                    <label class="form-check-label" for="readonly">-->
<!--                                        <label for="readonly">Read only</label>-->
<!--                                    </label>-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="col-md-6 mb-3">-->
<!--                                <div class="form-check dashboard-check">-->
<!--                                    <input v-model="user.user.wassel" class="form-check-input" type="checkbox" value="" id="wassel">-->
<!--                                    <label class="form-check-label" for="wassel">-->
<!--                                        <label for="wassel">wassel</label>-->
<!--                                    </label>-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="col-md-6 mb-3">-->
<!--                                <div class="form-check dashboard-check">-->
<!--                                    <input v-model="user.limitCommands" class="form-check-input" type="checkbox" value="" id="limit_cmd">-->
<!--                                    <label class="form-check-label" for="limit_cmd">-->
<!--                                        <label for="limit_cmd">Limit commands</label>-->
<!--                                    </label>-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="row align-items-center">-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <label for="expdate">Expiry date</label>-->
<!--                                    <div class="input-group">-->
<!--                                        <span class="input-group-text"><span class="far fa-calendar-alt"></span></span>-->
<!--                                        <input v-model="user.expirationTime" class="form-control datepicker-input" id="expdate" type="date" placeholder="dd/mm/yyyy" >-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="maxdevices">The maximum devices</label>-->
<!--                                        <input v-model="user.deviceLimit" class="form-control" id="maxdevices" type="number" placeholder="0" >-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->


<!--                            <div class="row align-items-center">-->

<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="maxusers">Maximum users</label>-->
<!--                                        <input v-model="user.userLimit" class="form-control" id="maxusers" type="number" placeholder="0" >-->
<!--                                    </div>-->
<!--                                </div>-->


<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="limit">Limitation limit</label>-->
<!--                                        <input class="form-control" id="limit" type="number" placeholder="" disapled>-->


<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->



<!--                        </div>-->

<!--                        <h2 class="h5 mb-4 title_user">Properties</h2>-->


<!--                        <div class="row" v-for="(attr, index ) in user.properties">-->
<!--                            <div class="col-sm-6 mb-3">-->
<!--                                <label for="prop_name">Property name </label>-->
<!--                                <select v-model="attr.name"  class="form-select w-100 mb-0" id="prop_name"-->
<!--                                        aria-label="State select example">-->

<!--                                    <option selected value=""></option>-->
<!--                                    <option value="mail.smtp.host">{{$trans('attr.attributeMailSmtpHost')}}</option>-->
<!--                                    <option value="mail.smtp.port">{{$trans('attr.attributeMailSmtpPort')}}</option>-->
<!--                                    <option value="mail.smtp.starttls.enable">{{$trans('attr.attributeMailSmtpStarttlsEnable')}}</option>-->
<!--                                    <option value="mail.smtp.starttls.required">{{$trans('attr.attributeMailSmtpStarttlsRequired')}}</option>-->
<!--                                    <option value="mail.smtp.ssl.enable">{{$trans('attr.attributeMailSmtpSslEnable')}}</option>-->
<!--                                    <option value="mail.smtp.ssl.trust">{{$trans('attr.attributeMailSmtpSslTrust')}}</option>-->
<!--                                    <option value="mail.smtp.ssl.protocols">{{$trans('attr.attributeMailSmtpSslProtocols')}}</option>-->
<!--                                    <option value="mail.smtp.from">{{$trans('attr.attributeMailSmtpFrom')}}</option>-->
<!--                                    <option value="mail.smtp.auth">{{$trans('attr.attributeMailSmtpAuth')}}</option>-->
<!--                                    <option value="mail.smtp.username">{{$trans('attr.attributeMailSmtpUsername')}}</option>-->
<!--                                    <option value="mail.smtp.password">{{$trans('attr.attributeMailSmtpPassword')}}</option>-->
<!--                                    <option value="web.liveRouteLength">{{$trans('attr.attributeWebLiveRouteLength')}}</option>-->
<!--                                    <option value="web.selectZoom">{{$trans('attr.attributeWebSelectZoom')}}</option>-->
<!--                                    <option value="web.maxZoom">{{$trans('attr.attributeWebMaxZoom')}}</option>-->
<!--                                    <option value="ui.disableReport">{{$trans('attr.attributeUiDisableReport')}}</option>-->
<!--                                    <option value="ui.disableEvents">{{$trans('attr.attributeUiDisableEvents')}}</option>-->
<!--                                    <option value="ui.disableVehicleFetures">{{$trans('attr.attributeUiDisableVehicleFetures')}}</option>-->
<!--                                    <option value="ui.disableDrivers">{{$trans('attr.attributeUiDisableDrivers')}}</option>-->
<!--                                    <option value="ui.disableComputedAttributes">{{ $trans('attr.attributeUiDisableComputedAttributes') }}</option>-->
<!--                                    <option value="ui.disableCalendars">{{ $trans('attr.attributeUiDisableCalendars') }}</option>-->
<!--                                    <option value="ui.disableMaintenance">{{ $trans('attr.attributeUiDisableMaintenance') }}</option>-->
<!--                                    <option value="ui.hidePositionAttributes">{{ $trans('attr.attributeUiHidePositionAttributes') }}</option>-->
<!--                                    <option value="distanceUnit">{{ $trans('attr.settingsDistanceUnit') }}</option>-->
<!--                                    <option value="speedUnit">{{ $trans('attr.settingsSpeedUnit') }}</option>-->
<!--                                    <option value="volumeUnit">{{ $trans('attr.settingsVolumeUnit') }}</option>-->
<!--                                    <option value="timezone">{{ $trans('attr.sharedTimezone') }}</option>-->
<!--                                    <option value="notificationTokens">{{ $trans('attr.attributeNotificationTokens') }}</option>-->

<!--                                </select>-->
<!--                            </div>-->


<!--                            <div class="col-md-6 mb-3">-->
<!--                                <label for="proprety_val">Property value</label>-->
<!--                                <input  v-model="attr.value" class="form-control" id="proprety_val" type="text" >-->
<!--                            </div>-->



<!--                        </div>-->

<!--                        <a @click="addElement(user.properties)">-->
<!--                            <span data-brackets-id="25270" class="fas fa-plus mr-2"></span>More-->
<!--                        </a>-->

<!--                        <div class="mt-3 text-right" style="margin-top: 5%;">-->
<!--                            <button type="submit" class="btn btn-success">Add Now</button>-->
<!--                        </div>-->


<!--                    </div>-->

<!--                    <div class="card card-body bg-white border-light mb-4 mb-lg-0">-->
<!--                        <h2 class="h5 mb-4">Alerts & Notifications</h2>-->
<!--                        <ul class="list-group list-group-flush">-->
<!--                            <li class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom">-->
<!--                                <div>-->
<!--                                    <h3 class="h6 mb-1">Web Notifications</h3>-->
<!--                                    <p class="small pr-4">Allow push notifications to be sent on your default web browser</p>-->
<!--                                </div>-->
<!--                                <div>-->
<!--                                    <div class="form-check form-switch">-->
<!--                                        <input class="form-check-input" type="checkbox" id="user-notification-1">-->
<!--                                        <label class="form-check-label" for="user-notification-1"></label>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </li>-->
<!--                            <li class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom">-->
<!--                                <div>-->
<!--                                    <h3 class="h6 mb-1">SMS Notifications</h3>-->
<!--                                    <p class="small pr-4">Allow SMS notifications to be sent to your phone number</p>-->
<!--                                </div>-->
<!--                                <div>-->
<!--                                    <div class="form-check form-switch">-->
<!--                                        <input class="form-check-input" type="checkbox" id="user-notification-2" checked>-->
<!--                                        <label class="form-check-label" for="user-notification-2"></label>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </li>-->
<!--                            <li class="list-group-item d-flex align-items-center justify-content-between px-0">-->
<!--                                <div>-->
<!--                                    <h3 class="h6 mb-1">E-Mail Notifications</h3>-->
<!--                                    <p class="small pr-4">Get an email when you make any transaction</p>-->
<!--                                </div>-->
<!--                                <div>-->
<!--                                    <div class="form-check form-switch">-->
<!--                                        <input class="form-check-input" type="checkbox" id="user-notification-3" checked>-->
<!--                                        <label class="form-check-label" for="user-notification-3"></label>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </div>-->


<!--                </div>-->
<!--                <div class="col-12 col-xl-4">-->
<!--                    <div class="row">-->
<!--                        <div class="col-12 mb-4">-->
<!--                            <div class="card border-light text-center p-0">-->
<!--                                <div class="profile-cover rounded-top" data-background="/assets/img/profile-cover.jpg"></div>-->
<!--                                <div class="card-body pb-5">-->
<!--                                    <img src="/assets/img/team/user.png" class="user-avatar large-avatar rounded-circle mx-auto mt-n7 mb-4" alt="Neil Portrait">-->
<!--                                    <h4 class="h3">Neil Sims</h4>-->
<!--                                    <h5 class="font-weight-normal">Senior Software Engineer</h5>-->
<!--                                    <p class="text-gray mb-4">New York, USA</p>-->
<!--                                    <a class="btn btn-sm btn-primary mr-2" href="#"><span class="fas fa-user-plus mr-1"></span> Connect</a>-->
<!--                                    <a class="btn btn-sm btn-secondary" href="#">Send Message</a>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-12">-->
<!--                            <div class="card card-body bg-white border-light shadow-sm mb-4">-->
<!--                                <h2 class="h5 mb-4">Select profile photo</h2>-->
<!--                                <div class="d-xl-flex align-items-center">-->
<!--                                    <div>-->
<!--                                        &lt;!&ndash; Avatar &ndash;&gt;-->
<!--                                        <div class="user-avatar xl-avatar mb-3">-->
<!--                                            <img class="rounded" src="/assets/img/team/user.png" alt="change avatar">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="file-field">-->
<!--                                        <div class="d-flex justify-content-xl-center ml-xl-3">-->
<!--                                            <div class="d-flex">-->
<!--                                                <span class="icon icon-md"><span class="fas fa-paperclip mr-3"></span></span> <input type="file">-->
<!--                                                <div class="d-md-block text-left">-->
<!--                                                    <div class="font-weight-normal text-dark mb-1">Choose Image</div>-->
<!--                                                    <div class="text-gray small">JPG, GIF or PNG. Max size of 800K</div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-12 col-sm-6 col-xl-12">-->
<!--                            <form action="/file-upload" class="dropzone rounded mb-4">-->
<!--                                <div class="fallback">-->
<!--                                    <input name="file" type="file" multiple />-->
<!--                                </div>-->
<!--                            </form>-->
<!--                        </div>-->
<!--                        <div class="col-12 col-sm-6 col-xl-12">-->
<!--                            <div class="card card-body bg-white border-light shadow-sm mb-4">-->
<!--                                <h2 class="h5 mb-4">Select cover photo</h2>-->
<!--                                <div class="d-xl-flex align-items-center">-->
<!--                                    <div>-->
<!--                                        &lt;!&ndash; Avatar &ndash;&gt;-->
<!--                                        <div class="user-avatar xl-avatar mb-3">-->
<!--                                            <img class="rounded" src="/assets/img/profile-cover.jpg" alt="change cover photo">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="file-field">-->
<!--                                        <div class="d-flex justify-content-xl-center ml-xl-3">-->
<!--                                            <div class="d-flex">-->
<!--                                                <span class="icon icon-md"><span class="fas fa-paperclip mr-3"></span></span> <input type="file">-->
<!--                                                <div class="d-md-block text-left">-->
<!--                                                    <div class="font-weight-normal text-dark mb-1">Choose Image</div>-->
<!--                                                    <div class="text-gray small">JPG, GIF or PNG. Max size of 800K</div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </form>-->
    </div>
</template>
<script>
export default {
    data () {
        return {
            user: {
                company:{
                    full_name_ar:null
                },
                user:{
                    birthday:null,
                    gender:null,
                    properties:[{
                        name:null,
                        value:null
                    }]
                }
            }
        }
    },
    mounted () {
        this.getMyProfile()
    },
    methods: {
        getMyProfile() {
            this.isLoad = true;
            axios.get('/account/'+localStorage.getItem('eisgps-token'), {
                headers: this.tokenHeader
            }).then(({data}) => {
                this.isLoad = false;
                this.user = data.data;

                let attrs = [];
                $.each(data.data.attributes, function(key, value) {
                    attrs.push({
                        name:key,
                        value:value
                    })


                });
                this.user.properties = attrs;


            }).catch(({errors}) => {
                this.isLoad = false;
            });

        },
        addElement(obj){
            obj.push({
                name:null,
                value:null
            })
        },
    }
}
</script>

