<template>
    <div>
        <loading :active.sync="isLoad"
                 :is-full-page="fullPage"
                 :height="loaderHeight"
                 :width="loaderWidth"
                 :color="loaderColor"
                 :loader="loaderType"
                 :background-color="loaderBgColor"></loading>
        <!-- TODO show vehicles numbers / device numbers / Lists /driver /-->
<!--        <form @submit.prevent="addNewEntry">-->
<!--            <div class="row mt-5">-->
<!--                <div class="col-12">-->
<!--                    <div class="card card-body bg-white border-light shadow-sm mb-4">-->

<!--                        <a class=" show-more collapsed"-->
<!--                           style="background: none !important;" data-toggle="collapse" href="#step1"-->
<!--                           role="button" aria-expanded="false" aria-controls="step">-->
<!--                            <h2 class="h5 mb-4 title_user">General information</h2>-->
<!--                        </a>-->
<!--&lt;!&ndash;                        <div class="collapse" id="step1">&ndash;&gt;-->


<!--&lt;!&ndash;                            <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label>Full name <span class="required">*</span></label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div>{{user.fullname}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label >Account type <span class="required">*</span></label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div v-if="user.account_type === '1'">{{$trans('main.company')}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div v-else-if="user.account_type === '2'">{{$trans('main.customer')}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div v-else>{{$trans('main.partner')}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            <div class="row align-items-center">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <label >Birthday Hijri <span class="required">*</span></label>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div>{{user.birthday}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <label>Gender</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div v-if="user.user_gender === 'M'">{{$trans('main.male')}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div v-else-if="user.user_gender === 'F'">{{$trans('main.female')}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div v-else></div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label>Email <span class="required">*</span></label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div>{{user.email}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label>Phone <span class="required">*</span></label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div>{{user.phone}}</div>&ndash;&gt;-->

<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->

<!--&lt;!&ndash;                            &lt;!&ndash;***************************************************************&ndash;&gt;&ndash;&gt;-->

<!--&lt;!&ndash;                            <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-sm-9 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label>Address</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div>{{user.address}} {{user.addressNo}} {{user.zipCode}} {{user.city}} {{user.state}} </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->

<!--&lt;!&ndash;                            </div>&ndash;&gt;-->


<!--&lt;!&ndash;                            <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-12 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label>Map layer</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div>{{user.maplayer}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                <div class="col-sm-4 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label >Longitude</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div>{{user.long}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                <div class="col-sm-4 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label >Latitude</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div>{{user.lat}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                <div class="col-sm-4 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label>Approximation</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div>{{user.approximation}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->


<!--&lt;!&ndash;                                <div class="col-sm-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <label>Coordinate format</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div>{{user.coordinate_format}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->


<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <label >POL points the layer of interest</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div>{{user.pol}}</div>&ndash;&gt;-->

<!--&lt;!&ndash;                                </div>&ndash;&gt;-->

<!--&lt;!&ndash;                            </div>&ndash;&gt;-->


<!--&lt;!&ndash;                            <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-check dashboard-check">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <input v-model="user.twelveHour" class="form-check-input"&ndash;&gt;-->
<!--&lt;!&ndash;                                               type="checkbox" disabled id="12hours">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label class="form-check-label" for="12hours">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label for="12hours">12 hour formula</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </label>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->

<!--&lt;!&ndash;                            </div>&ndash;&gt;-->


<!--&lt;!&ndash;                            <div class="row">&ndash;&gt;-->


<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-check dashboard-check">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <input v-model="user.isDisabled" class="form-check-input"&ndash;&gt;-->
<!--&lt;!&ndash;                                               type="checkbox" disabled id="disabled">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label class="form-check-label" for="disabled">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label for="disabled">Disabled</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </label>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-check dashboard-check">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <input v-model="user.isAdmin" class="form-check-input" type="checkbox"&ndash;&gt;-->
<!--&lt;!&ndash;                                               disabled id="admin">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label class="form-check-label" for="admin">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label for="admin">Admin</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </label>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-check dashboard-check">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <input v-model="user.deviceReadOnly" class="form-check-input"&ndash;&gt;-->
<!--&lt;!&ndash;                                               type="checkbox" disabled id="device_readonly">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label class="form-check-label" for="device_readonly">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label for="device_readonly">Device Readonly</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </label>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-check dashboard-check">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <input v-model="user.readOnly" class="form-check-input" type="checkbox"&ndash;&gt;-->
<!--&lt;!&ndash;                                               disabled id="realonly">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label class="form-check-label" for="realonly">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label for="realonly">Read only</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </label>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-check dashboard-check">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <input v-model="user.wassel" class="form-check-input" type="checkbox"&ndash;&gt;-->
<!--&lt;!&ndash;                                               id="wassel" disabled>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label class="form-check-label" for="wassel">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label for="wassel">Wassel</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </label>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-check dashboard-check">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <input v-model="user.limitCommands" class="form-check-input"&ndash;&gt;-->
<!--&lt;!&ndash;                                               type="checkbox" disabled id="limit_command">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label class="form-check-label" for="limit_command">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label for="limit_command">Limit commands</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </label>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                <div class="row align-items-center">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label>Expiry date</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div >&ndash;&gt;-->
<!--&lt;!&ndash;                                            {{user.expiry_date}}&ndash;&gt;-->
<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label >The maximum devices</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <div>{{user.max_devices}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->


<!--&lt;!&ndash;                                <div class="row align-items-center">&ndash;&gt;-->

<!--&lt;!&ndash;                                    <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label >Maximum users</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <div>{{user.max_users}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->


<!--&lt;!&ndash;                                    <div class="col-md-6 mb-3" v-if="user.account_type === '2'">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label > Identification Number <span&ndash;&gt;-->
<!--&lt;!&ndash;                                                class="required">*</span></label>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <div>{{user.ident_number}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->


<!--&lt;!&ndash;                            </div>&ndash;&gt;-->

<!--&lt;!&ndash;                            &lt;!&ndash;                            <div class="row" v-for="(attr, index ) in addData.user.properties">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                <div class="col-sm-6 mb-3">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                    <label for="proprety">Property name </label>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                    <select v-model="attr.name" class="form-select w-100 mb-0" id="proprety"&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                            aria-label="State select example">&ndash;&gt;&ndash;&gt;-->

<!--&lt;!&ndash;                            &lt;!&ndash;                                        <option value="mail.smtp.host">{{ $trans('attr.attributeMailSmtpHost') }}&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        </option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        <option value="mail.smtp.port">{{ $trans('attr.attributeMailSmtpPort') }}&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        </option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        <option value="mail.smtp.starttls.enable">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                            {{ $trans('attr.attributeMailSmtpStarttlsEnable') }}&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        </option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        <option value="mail.smtp.starttls.required">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                            {{ $trans('attr.attributeMailSmtpStarttlsRequired') }}&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        </option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        <option value="mail.smtp.ssl.enable">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                            {{ $trans('attr.attributeMailSmtpSslEnable') }}&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        </option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        <option value="mail.smtp.ssl.trust">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                            {{ $trans('attr.attributeMailSmtpSslTrust') }}&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        </option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        <option value="mail.smtp.ssl.protocols">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                            {{ $trans('attr.attributeMailSmtpSslProtocols') }}&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        </option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        <option value="mail.smtp.from">{{ $trans('attr.attributeMailSmtpFrom') }}&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        </option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        <option value="mail.smtp.auth">{{ $trans('attr.attributeMailSmtpAuth') }}&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        </option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        <option value="mail.smtp.username">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                            {{ $trans('attr.attributeMailSmtpUsername') }}&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        </option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        <option value="mail.smtp.password">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                            {{ $trans('attr.attributeMailSmtpPassword') }}&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        </option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        <option value="web.liveRouteLength">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                            {{ $trans('attr.attributeWebLiveRouteLength') }}&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        </option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        <option value="web.selectZoom">{{ $trans('attr.attributeWebSelectZoom') }}&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        </option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        <option value="web.maxZoom">{{ $trans('attr.attributeWebMaxZoom') }}</option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        <option value="ui.disableReport">{{ $trans('attr.attributeUiDisableReport') }}&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        </option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        <option value="ui.disableEvents">{{ $trans('attr.attributeUiDisableEvents') }}&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        </option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        <option value="ui.disableVehicleFetures">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                            {{ $trans('attr.attributeUiDisableVehicleFetures') }}&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        </option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        <option value="ui.disableDrivers">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                            {{ $trans('attr.attributeUiDisableDrivers') }}&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        </option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        <option value="ui.disableComputedAttributes">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                            {{ $trans('attr.attributeUiDisableComputedAttributes') }}&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        </option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        <option value="ui.disableCalendars">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                            {{ $trans('attr.attributeUiDisableCalendars') }}&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        </option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        <option value="ui.disableMaintenance">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                            {{ $trans('attr.attributeUiDisableMaintenance') }}&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        </option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        <option value="ui.hidePositionAttributes">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                            {{ $trans('attr.attributeUiHidePositionAttributes') }}&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        </option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        <option value="distanceUnit">{{ $trans('attr.settingsDistanceUnit') }}</option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        <option value="speedUnit">{{ $trans('attr.settingsSpeedUnit') }}</option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        <option value="volumeUnit">{{ $trans('attr.settingsVolumeUnit') }}</option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        <option value="timezone">{{ $trans('attr.sharedTimezone') }}</option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        <option value="notificationTokens">{{&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                                $trans('attr.attributeNotificationTokens')&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                            }}&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                        </option>&ndash;&gt;&ndash;&gt;-->

<!--&lt;!&ndash;                            &lt;!&ndash;                                    </select>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                </div>&ndash;&gt;&ndash;&gt;-->


<!--&lt;!&ndash;                            &lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                    <label for="proprety_val">Property value</label>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                            &lt;!&ndash;                                    <input v-model="attr.value" class="form-control" id="proprety_val" type="text">&ndash;&gt;&ndash;&gt;-->

<!--&lt;!&ndash;                            &lt;!&ndash;                                </div>&ndash;&gt;&ndash;&gt;-->


<!--&lt;!&ndash;                            &lt;!&ndash;                            </div>&ndash;&gt;&ndash;&gt;-->



<!--&lt;!&ndash;                        </div>&ndash;&gt;-->

<!--&lt;!&ndash;                        <a class=" show-more collapsed"&ndash;&gt;-->
<!--&lt;!&ndash;                           v-if="user.account_type !== '2'"&ndash;&gt;-->
<!--&lt;!&ndash;                           style="background: none !important;" data-toggle="collapse" href="#step2"&ndash;&gt;-->
<!--&lt;!&ndash;                           role="button" aria-expanded="false" aria-controls="step">&ndash;&gt;-->
<!--&lt;!&ndash;                            <h2 class="h5 mb-4 title_user">Data Facility</h2>&ndash;&gt;-->
<!--&lt;!&ndash;                        </a>&ndash;&gt;-->
<!--&lt;!&ndash;                        <div class="collapse" id="step2">&ndash;&gt;-->
<!--&lt;!&ndash;                            <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label >The number at the Ministry of Interior <span&ndash;&gt;-->
<!--&lt;!&ndash;                                            class="required">*</span></label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div>{{company.num_at_ministry}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->


<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <label >Commercial register date issuance <span v-if="addData.user.account_type !== '2'" class="required">*</span></label>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div>{{company.commercial_register_date_issuance}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->


<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label >Commercial Registration No</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div>{{company.commercial_reg_number}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->


<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <label >Commercial register expiry date</label>&ndash;&gt;-->

<!--&lt;!&ndash;                                    <div>{{company.commercial_reg_expiry_date}}</div>&ndash;&gt;-->

<!--&lt;!&ndash;                                </div>&ndash;&gt;-->


<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label>Company Full name [Arabic]</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div>{{company.full_name_ar}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->


<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label>Company Full name [English]</label>&ndash;&gt;-->

<!--&lt;!&ndash;                                        <div>{{company.full_name_en}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->


<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label >Company Short name [Arabic]</label>&ndash;&gt;-->

<!--&lt;!&ndash;                                        <div>{{company.short_name_ar}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->


<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label >Company Short name [English]</label>&ndash;&gt;-->

<!--&lt;!&ndash;                                        <div>{{company.short_name_en}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->


<!--&lt;!&ndash;                                &lt;!&ndash;***************************************************************&ndash;&gt;&ndash;&gt;-->


<!--&lt;!&ndash;                                <div class="row">&ndash;&gt;-->


<!--&lt;!&ndash;                                    <div class="col-sm-12 ">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label for="address_company">Address</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <div>{{company.address}} {{company.zipCode}} {{company.city}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                    <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label for="phone_number">Phone number <span v-if="user.account_type !== '2'" class="required">*</span></label>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <div>{{company.phone}}</div>&ndash;&gt;-->

<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                    <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label for="fax">Fax Number</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <div>{{company.fax}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->


<!--&lt;!&ndash;                                    <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label for="website">The company's website</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <div>{{company.website}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                    <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label>Company E-mail <span v-if="user.account_type !== '2'" class="required">*</span></label>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <div>{{company.email}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                    <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label for="id_number"> Identification Number <span&ndash;&gt;-->
<!--&lt;!&ndash;                                                class="required">*</span></label>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <div>{{company.ident_number}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->


<!--&lt;!&ndash;                                </div>&ndash;&gt;-->


<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label for="manager_name">Manager Name <span v-if="user.account_type !== '2'" class="required">*</span></label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div>{{company.manager_name}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->


<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label >Manager Mobile number <span v-if="user.account_type !== '2'" class="required">*</span></label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div>{{company.manager_mobile}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label >Manager phone number <span v-if="user.account_type !== '2'" class="required">*</span></label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div>{{company.manager_phone}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->


<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label >Manager E-mail</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div>{{company.manager_email}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->


<!--&lt;!&ndash;                                <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="col-md-12">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div class="form-check dashboard-check">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <input class="form-check-input"&ndash;&gt;-->
<!--&lt;!&ndash;                                                   v-model="company.veh_rental_management_service"&ndash;&gt;-->
<!--&lt;!&ndash;                                                   type="checkbox" disabled id="veh_rental_management_service">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label class="form-check-label" for="veh_rental_management_service">&ndash;&gt;-->
<!--&lt;!&ndash;                                                <label for="veh_rental_management_service">Vehicle rental management&ndash;&gt;-->
<!--&lt;!&ndash;                                                    service</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                            </label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                    &lt;!&ndash;&#45;&#45;&#45;&#45;&#45;&#45;***-&#45;&#45;&#45;&#45;&#45;&#45;&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="col-md-12">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div class="form-check dashboard-check">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <input class="form-check-input" type="checkbox"&ndash;&gt;-->
<!--&lt;!&ndash;                                                   v-model="company.veh_maintenance_service" disabled&ndash;&gt;-->
<!--&lt;!&ndash;                                                   id="veh_maintenance_service">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label class="form-check-label" for="veh_maintenance_service">&ndash;&gt;-->
<!--&lt;!&ndash;                                                <label for="veh_maintenance_service">Vehicle maintenance and operation&ndash;&gt;-->
<!--&lt;!&ndash;                                                    management service</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                            </label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                    &lt;!&ndash;&#45;&#45;&#45;&#45;&#45;&#45;***-&#45;&#45;&#45;&#45;&#45;&#45;&ndash;&gt;&ndash;&gt;-->

<!--&lt;!&ndash;                                    <div class="col-md-12">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div class="form-check dashboard-check">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <input class="form-check-input" type="checkbox"&ndash;&gt;-->
<!--&lt;!&ndash;                                                   v-model="company.veh_tracking_service" disabled&ndash;&gt;-->
<!--&lt;!&ndash;                                                   id="veh_tracking_service">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label class="form-check-label" for="veh_tracking_service">&ndash;&gt;-->
<!--&lt;!&ndash;                                                <label for="veh_tracking_service">Vehicle tracking service, including&ndash;&gt;-->
<!--&lt;!&ndash;                                                    operation and maintenance&ndash;&gt;-->
<!--&lt;!&ndash;                                                    management</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                            </label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                    &lt;!&ndash;&#45;&#45;&#45;&#45;&#45;&#45;***-&#45;&#45;&#45;&#45;&#45;&#45;&ndash;&gt;&ndash;&gt;-->


<!--&lt;!&ndash;                                </div>&ndash;&gt;-->


<!--&lt;!&ndash;                            </div>&ndash;&gt;-->


<!--&lt;!&ndash;                        </div>&ndash;&gt;-->

<!--&lt;!&ndash;                        <a class=" show-more collapsed"&ndash;&gt;-->
<!--&lt;!&ndash;                           style="background: none !important;" data-toggle="collapse" href="#step3"&ndash;&gt;-->
<!--&lt;!&ndash;                           role="button" aria-expanded="false" aria-controls="step">&ndash;&gt;-->
<!--&lt;!&ndash;                            <h2 class="h5 mb-4 title_user ">Step {{ noStep3 }}: Add New Device</h2>&ndash;&gt;-->
<!--&lt;!&ndash;                        </a>&ndash;&gt;-->
<!--&lt;!&ndash;                        <div class="collapse" id="step3">&ndash;&gt;-->


<!--&lt;!&ndash;                            <div class="row">&ndash;&gt;-->


<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label for="device_name">Devices Name<span class="required">*</span></label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <input v-model="addData.device.device_name" class="form-control"&ndash;&gt;-->
<!--&lt;!&ndash;                                               id="device_name" type="text">&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->


<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <label for="branch">Branch</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <input v-model="addData.device.device_branch" class="form-control" id="branch"&ndash;&gt;-->
<!--&lt;!&ndash;                                           type="text">&ndash;&gt;-->


<!--&lt;!&ndash;                                </div>&ndash;&gt;-->


<!--&lt;!&ndash;                                <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label for="imei">PIDENTIFIER / IMEI <span class="required">*</span></label>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <input v-model="addData.device.imei" class="form-control" id="imei"&ndash;&gt;-->
<!--&lt;!&ndash;                                                   type="text">&ndash;&gt;-->
<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                    <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label for="dev_model">Device Model</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <input v-model="addData.device.device_model" class="form-control"&ndash;&gt;-->
<!--&lt;!&ndash;                                                   id="dev_model" type="text">&ndash;&gt;-->
<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                    <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label for="protocol">Protocol</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <input v-model="addData.device.device_protocol" class="form-control"&ndash;&gt;-->
<!--&lt;!&ndash;                                                   id="protocol" type="text">&ndash;&gt;-->
<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    &lt;!&ndash;&ndash;&gt;-->
<!--&lt;!&ndash;                                                          <div class="dropdown-menu dropdown-primary">&ndash;&gt;-->
<!--&lt;!&ndash;                          <a class="dropdown-item" href="#"Pay</a>&ndash;&gt;-->
<!--&lt;!&ndash;                          <a class="dropdown-item" href="#"><i class="fas fa-bell-slash"></i>&nbsp;&nbsp;Disable alertss</a>&ndash;&gt;-->
<!--&lt;!&ndash;                          <a class="dropdown-item" href="#"><i class="far fa-envelope"></i>&nbsp;&nbsp;Check mail</a>&ndash;&gt;-->
<!--&lt;!&ndash;                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                      </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        &ndash;&gt;&ndash;&gt;-->

<!--&lt;!&ndash;                                    <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div class="d-flex flex-column">&ndash;&gt;-->

<!--&lt;!&ndash;                                            <div class="d-flex flex-column">&ndash;&gt;-->
<!--&lt;!&ndash;                                                <label for="device_cat">Device Category</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                                <select v-model="addData.device.device_category" id="device_cat"&ndash;&gt;-->
<!--&lt;!&ndash;                                                        class="form-select mb-0">&ndash;&gt;-->
<!--&lt;!&ndash;                                                    <option value="car">Car</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                    <option value="van">Van</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                    <option value="bus">Bus</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                    <option value="truck">Truck</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                    <option value="trailer">Trailer</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                    <option value="pick up">Pick up</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                    <option value="motorcycle">Motorcycle</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                    <option value="winch">Winch</option>&ndash;&gt;-->

<!--&lt;!&ndash;                                                </select>&ndash;&gt;-->
<!--&lt;!&ndash;                                            </div>&ndash;&gt;-->


<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->


<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->


<!--&lt;!&ndash;                                    &lt;!&ndash;                                    <div class="col-md-6 mb-3">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                    &lt;!&ndash;                                        <label>SIM CARD</label>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                    &lt;!&ndash;                                        <select v-model="addData.device.sim_card" class="form-select mb-0">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                    &lt;!&ndash;                                            <option selected value=""></option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                    &lt;!&ndash;                                            <option selected value="">A</option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                    &lt;!&ndash;                                            <option value="1">B</option>&ndash;&gt;&ndash;&gt;-->

<!--&lt;!&ndash;                                    &lt;!&ndash;                                        </select>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                    &lt;!&ndash;                                    </div>&ndash;&gt;&ndash;&gt;-->


<!--&lt;!&ndash;                                    &lt;!&ndash;                                    <div class="col-md-6 mb-3">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                    &lt;!&ndash;                                        <label>List CARD</label>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                    &lt;!&ndash;                                        <select v-model="addData.device.list_card" class="form-select mb-0">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                    &lt;!&ndash;                                            <option selected value=""></option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                    &lt;!&ndash;                                            <option selected value="">A</option>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                    &lt;!&ndash;                                            <option value="1">B</option>&ndash;&gt;&ndash;&gt;-->

<!--&lt;!&ndash;                                    &lt;!&ndash;                                        </select>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                    &lt;!&ndash;                                    </div>&ndash;&gt;&ndash;&gt;-->


<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="row" v-for="(attr, index ) in addData.device.attributes">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="col-sm-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label for="attr_name2">Attribute Name</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <select v-model="attr.name" class="form-select w-100 mb-0" id="attr_name2"&ndash;&gt;-->
<!--&lt;!&ndash;                                                aria-label="State select example">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="web.reportColor">&ndash;&gt;-->
<!--&lt;!&ndash;                                                {{ $trans('attr.attributeWebReportColor') }}&ndash;&gt;-->
<!--&lt;!&ndash;                                            </option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="devicePassword">&ndash;&gt;-->
<!--&lt;!&ndash;                                                {{ $trans('attr.attributeDevicePassword') }}&ndash;&gt;-->
<!--&lt;!&ndash;                                            </option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="processing.copyAttributes">&ndash;&gt;-->
<!--&lt;!&ndash;                                                {{ $trans('attr.attributeProcessingCopyAttributes') }}&ndash;&gt;-->
<!--&lt;!&ndash;                                            </option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="decoder.timezone">{{ $trans('attr.sharedTimezone') }}&ndash;&gt;-->
<!--&lt;!&ndash;                                            </option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="deviceInactivityStart">&ndash;&gt;-->
<!--&lt;!&ndash;                                                {{ $trans('attr.attributeDeviceInactivityStart') }}&ndash;&gt;-->
<!--&lt;!&ndash;                                            </option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="deviceInactivityPeriod">&ndash;&gt;-->
<!--&lt;!&ndash;                                                {{ $trans('attr.attributeDeviceInactivityPeriod') }}&ndash;&gt;-->
<!--&lt;!&ndash;                                            </option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="speedLimit">{{ $trans('attr.attributeSpeedLimit') }}</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="report.ignoreOdometer">&ndash;&gt;-->
<!--&lt;!&ndash;                                                {{ $trans('attr.attributeReportIgnoreOdometer') }}&ndash;&gt;-->
<!--&lt;!&ndash;                                            </option>&ndash;&gt;-->

<!--&lt;!&ndash;                                        </select>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->


<!--&lt;!&ndash;                                    <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label for="attr_val">Attribute Value</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <input v-model="attr.value" class="form-control" id="attr_val" type="text">&ndash;&gt;-->

<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                <a @click="addElement(addData.device.attributes)">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <span data-brackets-id="25270" class="fas fa-plus mr-2"></span>More&ndash;&gt;-->
<!--&lt;!&ndash;                                </a>&ndash;&gt;-->


<!--&lt;!&ndash;                                &lt;!&ndash;                                <div class="row">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                    <div class="col-sm-6 mb-3">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                        <label for="description">Description </label>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                    </div>&ndash;&gt;&ndash;&gt;-->


<!--&lt;!&ndash;                                &lt;!&ndash;                                </div>&ndash;&gt;&ndash;&gt;-->


<!--&lt;!&ndash;                                &lt;!&ndash;                                <div class="row">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                    <div class="col-sm-12">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                        <label for="state">Type of notification</label>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                        <div class="form-check dashboard-check checked_DIV">&ndash;&gt;&ndash;&gt;-->


<!--&lt;!&ndash;                                &lt;!&ndash;                                            <input class="form-check-input" type="checkbox" value="" id="userCheck55">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                            <label class="form-check-label" for="userCheck55">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                                <label for="">Select All</label>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                            </label>&ndash;&gt;&ndash;&gt;-->

<!--&lt;!&ndash;                                &lt;!&ndash;                                            <br>&ndash;&gt;&ndash;&gt;-->


<!--&lt;!&ndash;                                &lt;!&ndash;                                            <input class="form-check-input" type="checkbox" value="" id="userCheck55">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                            <label class="form-check-label" for="userCheck55">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                                <label for="">Vehicle rental management service</label>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                            </label>&ndash;&gt;&ndash;&gt;-->

<!--&lt;!&ndash;                                &lt;!&ndash;                                            <input class="form-check-input" type="checkbox" value="" id="userCheck55">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                            <label class="form-check-label" for="userCheck55">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                                <label for="">Vehicle rental management service</label>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                            </label>&ndash;&gt;&ndash;&gt;-->

<!--&lt;!&ndash;                                &lt;!&ndash;                                            <input class="form-check-input" type="checkbox" value="" id="userCheck55">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                            <label class="form-check-label" for="userCheck55">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                                <label for="">Vehicle rental management service</label>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                            </label>&ndash;&gt;&ndash;&gt;-->

<!--&lt;!&ndash;                                &lt;!&ndash;                                            <input class="form-check-input" type="checkbox" value="" id="userCheck55">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                            <label class="form-check-label" for="userCheck55">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                                <label for="">Vehicle rental management service</label>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                            </label>&ndash;&gt;&ndash;&gt;-->

<!--&lt;!&ndash;                                &lt;!&ndash;                                            <input class="form-check-input" type="checkbox" value="" id="userCheck55">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                            <label class="form-check-label" for="userCheck55">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                                <label for="">Vehicle rental management service</label>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                            </label>&ndash;&gt;&ndash;&gt;-->

<!--&lt;!&ndash;                                &lt;!&ndash;                                            <input class="form-check-input" type="checkbox" value="" id="userCheck55">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                            <label class="form-check-label" for="userCheck55">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                                <label for="">Vehicle rental management service</label>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                            </label>&ndash;&gt;&ndash;&gt;-->

<!--&lt;!&ndash;                                &lt;!&ndash;                                            <input class="form-check-input" type="checkbox" value="" id="userCheck55">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                            <label class="form-check-label" for="userCheck55">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                                <label for="">Vehicle rental management service</label>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                            </label>&ndash;&gt;&ndash;&gt;-->

<!--&lt;!&ndash;                                &lt;!&ndash;                                            <input class="form-check-input" type="checkbox" value="" id="userCheck55">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                            <label class="form-check-label" for="userCheck55">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                                <label for="">Vehicle rental management service</label>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                            </label>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                        </div>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                &lt;!&ndash;                                    </div>&ndash;&gt;&ndash;&gt;-->


<!--&lt;!&ndash;                                &lt;!&ndash;                                </div>&ndash;&gt;&ndash;&gt;-->




<!--&lt;!&ndash;                            </div>&ndash;&gt;-->
<!--&lt;!&ndash;                        </div>&ndash;&gt;-->

<!--&lt;!&ndash;                        <a class=" show-more collapsed"&ndash;&gt;-->
<!--&lt;!&ndash;                           style="background: none !important;" data-toggle="collapse" href="#step4"&ndash;&gt;-->
<!--&lt;!&ndash;                           role="button" aria-expanded="false" aria-controls="step">&ndash;&gt;-->
<!--&lt;!&ndash;                            <h2 class="h5 mb-4 title_user">Step {{ noStep4 }}: Add New SIM Card</h2>&ndash;&gt;-->
<!--&lt;!&ndash;                        </a>&ndash;&gt;-->
<!--&lt;!&ndash;                        <div class="collapse" id="step4">&ndash;&gt;-->


<!--&lt;!&ndash;                            <div class="row">&ndash;&gt;-->

<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    &lt;!&ndash;                                   TODO Save this field&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                    <label for="comm_company">Name Communication company<span class="required">*</span></label>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <input id="comm_company" v-model="addData.simCard.telecom_company"&ndash;&gt;-->
<!--&lt;!&ndash;                                           class="form-control" type="text" placeholder="">&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label for="sim">Add SIM Card <span class="required">*</span></label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <input id="sim" v-model="addData.simCard.sim_card"&ndash;&gt;-->
<!--&lt;!&ndash;                                               class="form-control" type="text" placeholder="">&ndash;&gt;-->
<!--&lt;!&ndash;                                        &lt;!&ndash;                                        <select id="sim" v-model="addData.simCard.sim_card" class="form-select mb-0"&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                        &lt;!&ndash;                                                aria-label="">&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                        &lt;!&ndash;                                            <option v-for="sim in simCards" :value="sim.iccid">{{sim.iccid}}</option>&ndash;&gt;&ndash;&gt;-->

<!--&lt;!&ndash;                                        &lt;!&ndash;                                        </select>&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->

<!--&lt;!&ndash;                            </div>&ndash;&gt;-->

<!--&lt;!&ndash;                        </div>&ndash;&gt;-->

<!--&lt;!&ndash;                        <a class=" show-more collapsed"&ndash;&gt;-->
<!--&lt;!&ndash;                           style="background: none !important;" data-toggle="collapse" href="#step5"&ndash;&gt;-->
<!--&lt;!&ndash;                           role="button" aria-expanded="false" aria-controls="step">&ndash;&gt;-->
<!--&lt;!&ndash;                            <h2 class="h5 mb-4 title_user">Step {{ noStep5 }}: Add New Vehicle</h2>&ndash;&gt;-->
<!--&lt;!&ndash;                        </a>&ndash;&gt;-->
<!--&lt;!&ndash;                        <div class="collapse" id="step5">&ndash;&gt;-->

<!--&lt;!&ndash;                            <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label for="veh_code">Vehicle code</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <input v-model="addData.vehicle.vehicle_code" class="form-control" id="veh_code"&ndash;&gt;-->
<!--&lt;!&ndash;                                               type="text" placeholder="">&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label>Plate Number <span class="required">*</span></label>&ndash;&gt;-->

<!--&lt;!&ndash;                                        <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <div class="col-md-4">&ndash;&gt;-->
<!--&lt;!&ndash;                                                <the-mask class="form-control"  v-model="plateNumber.fournumbers" mask="####" type="text"&ndash;&gt;-->
<!--&lt;!&ndash;                                                          placeholder="1111"></the-mask>&ndash;&gt;-->

<!--&lt;!&ndash;                                            </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <div class="col-md-8">&ndash;&gt;-->
<!--&lt;!&ndash;                                                <div class="row">&ndash;&gt;-->

<!--&lt;!&ndash;                                                    <select v-model="plateNumber.rightLetter" class="form-select minius"&ndash;&gt;-->
<!--&lt;!&ndash;                                                            aria-label="">&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="أ">أ</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ب">ب</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ح">ح</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="د">د</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ر">ر</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="س">س</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ص">ص</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ط">ط</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ع">ع</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ق">ق</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ك">ك</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ل">ل</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="م">م</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ن">ن</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ه">ه</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="و">و</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ي">ي</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                    </select>&ndash;&gt;-->

<!--&lt;!&ndash;                                                    <select v-model="plateNumber.middleLetter" class="form-select minius"&ndash;&gt;-->
<!--&lt;!&ndash;                                                            aria-label="">&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="أ">أ</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ب">ب</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ح">ح</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="د">د</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ر">ر</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="س">س</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ص">ص</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ط">ط</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ع">ع</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ق">ق</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ك">ك</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ل">ل</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="م">م</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ن">ن</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ه">ه</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="و">و</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ي">ي</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                    </select>&ndash;&gt;-->

<!--&lt;!&ndash;                                                    <select v-model="plateNumber.leftLetter" class="form-select minius"&ndash;&gt;-->
<!--&lt;!&ndash;                                                            aria-label="">&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="أ">أ</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ب">ب</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ح">ح</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="د">د</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ر">ر</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="س">س</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ص">ص</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ط">ط</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ع">ع</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ق">ق</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ك">ك</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ل">ل</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="م">م</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ن">ن</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ه">ه</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="و">و</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <option value="ي">ي</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                    </select>&ndash;&gt;-->

<!--&lt;!&ndash;                                                </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                            </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->

<!--&lt;!&ndash;                            <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label for="veh_type">Vehicle Type</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <select id="veh_type" v-model="addData.vehicle.vehicle_type" class="form-select mb-0"&ndash;&gt;-->
<!--&lt;!&ndash;                                                aria-label="">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="car">Car</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="van">Van</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="bus">Bus</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="truck">Truck</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="trailer">Trailer</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="pick up">Pick up</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="motorcycle">Motorcycle</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="winch">Winch</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </select>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label for="phone">Manufacture Company</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <select v-model="addData.vehicle.manufacture_company" class="form-select mb-0"&ndash;&gt;-->
<!--&lt;!&ndash;                                                aria-label="">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="انفنيتي">انفنيتي</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="اوبل">اوبل</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="اودي">اودي</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="ايسوزو">ايسوزو</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="بورش">بورش</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="بي ام دبليو">بي ام دبليو</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="بيجو">بيجو</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="تشيري">تشيري</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="تويوتا">تويوتا</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="جاكوار">جاكوار</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="جي ام سي">جي ام سي</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="جيب">جيب</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="جيلي">جيلي</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="دايو">دايو</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="دودج">دودج</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="ديهاتسو">ديهاتسو</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="رينو">رينو</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="سانج يونج">سانج يونج</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="سوزوكي">سوزوكي</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="سيتروين">سيتروين</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="شيفروليه">شيفروليه</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="فورد">فورد</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="فولفو">فولفو</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="فولكس واجن">فولكس واجن</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="كاديلاك">كاديلاك</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="كرايزلر">كرايزلر</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="كيا">كيا</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="لاند روفر">لاند روفر</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="لكزس">لكزس</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="لنكولن">لنكولن</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="مازدا">مازدا</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="مان">مان</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="مرسيدس">مرسيدس</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="ميتسوبيشي">ميتسوبيشي</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="ميركوري">ميركوري</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="نيسان">نيسان</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="همر">همر</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="هوندا">هوندا</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="هونداي">هونداي</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </select>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->


<!--&lt;!&ndash;                            <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label for="model">Model</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <select v-model="addData.vehicle.vehicle_model" id="model"&ndash;&gt;-->
<!--&lt;!&ndash;                                                class="form-select mb-0" aria-label="">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="H1">H1</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="H2">H2</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="H3">H3</option>&ndash;&gt;-->

<!--&lt;!&ndash;                                        </select>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label for="manufacturing_year">Manufacturing year</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <select v-model="addData.vehicle.manufacturing_year" id="manufacturing_year"&ndash;&gt;-->
<!--&lt;!&ndash;                                                class="form-select mb-0" aria-label="">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option v-for="year in years" :value="year">{{ year }}</option>&ndash;&gt;-->

<!--&lt;!&ndash;                                        </select>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->


<!--&lt;!&ndash;                            <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label for="city">Vehicle color</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <select v-model="addData.vehicle.vehicle_color" class="form-select mb-0"&ndash;&gt;-->
<!--&lt;!&ndash;                                                aria-label="">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="ابيض">ابيض</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="احمر">احمر</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="اخضر">اخضر</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="ازرق">ازرق</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="اسود">اسود</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="اصفر">اصفر</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="برتقالي">برتقالي</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="بنفسجي">بنفسجي</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="بني">بني</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="بيج">بيج</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="ذهبي">ذهبي</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="رمادي">رمادي</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="فضي">فضي</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="لؤلؤي">لؤلؤي</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </select>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <label for="state">Current counter's readers</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <input v-model="addData.vehicle.current_counter_reader" class="form-control"&ndash;&gt;-->
<!--&lt;!&ndash;                                           type="text" placeholder="">&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->

<!--&lt;!&ndash;                            <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label>Fuel type</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <select v-model="addData.vehicle.fuel_type" class="form-select mb-0"&ndash;&gt;-->
<!--&lt;!&ndash;                                                aria-label="">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="بنزين 91">بنزين 91</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="بنزين 95">بنزين 95</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="ديزل">ديزل</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </select>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->

<!--&lt;!&ndash;                                    <label for="fuel_cost">Fuel cost</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <input v-model="addData.vehicle.fuel_cost" id="fuel_cost" class="form-control"&ndash;&gt;-->
<!--&lt;!&ndash;                                           type="number" placeholder="00.00">&ndash;&gt;-->

<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->

<!--&lt;!&ndash;                            <div class="row">&ndash;&gt;-->

<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label for="fuel_cons_liters">Fuel consumption in liters / km</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <input class="form-control" v-model="addData.vehicle.fuel_cons_liters"&ndash;&gt;-->
<!--&lt;!&ndash;                                               id="fuel_cons_liters" type="number" placeholder="00.00">&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label for="tank_capacity">Tank capacity</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <input v-model="addData.vehicle.tank_capacity" id="tank_capacity"&ndash;&gt;-->
<!--&lt;!&ndash;                                               class="form-control" type="number" placeholder="00.00">&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->

<!--&lt;!&ndash;                            </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label for="type_licence">Plate type <span class="required">*</span></label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <select v-model="addData.vehicle.plate_type" id="type_licence"&ndash;&gt;-->
<!--&lt;!&ndash;                                                class="form-select mb-0" aria-label="">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="8">تصدير</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="9">دبلوماسي</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="11">مؤقت</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="2">رخصة سير نقل عام</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="3">رخصة سير نقل خاص</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="7">رخصة سير مركبة أشغال عامة</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="6">رخصة سير سيارة أجرة</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="10">رخصة سير دراجة الية</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="1">رخصة سير خاصة</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="5">رخصة سير حافلة صغيرة خاصة</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="4">رخصة سير حافلة صغيرة عامة</option>&ndash;&gt;-->

<!--&lt;!&ndash;                                        </select>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->


<!--&lt;!&ndash;                                <div class="col-sm-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <label for="insurance_type">Insurance type</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <select v-model="addData.vehicle.insurance_type" id="insurance_type"&ndash;&gt;-->
<!--&lt;!&ndash;                                            class="form-select mb-0" aria-label="">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <option value="Comprehensive">Comprehensive</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <option value="Third party">Third party</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </select>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->


<!--&lt;!&ndash;                            <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <label for="sim_number">SIM number</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div> {{ addData.simCard.sim_card }}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <label for="telecom">Telecom Company</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div>{{ addData.simCard.telecom_company }}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->

<!--&lt;!&ndash;                            </div>&ndash;&gt;-->

<!--&lt;!&ndash;                            <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <label for="state">Tracking ID / IMEI code</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div>{{ addData.device.imei }}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <label for="gender">Branch</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div>{{ addData.device.device_branch }}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->

<!--&lt;!&ndash;                            </div>&ndash;&gt;-->


<!--&lt;!&ndash;                            <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <label for="state">Device model</label>&ndash;&gt;-->

<!--&lt;!&ndash;                                    <div>{{ addData.device.device_model }}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <label for="state">Facility Name</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div>{{ addData.company.full_name_ar }}</div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->

<!--&lt;!&ndash;                            </div>&ndash;&gt;-->


<!--&lt;!&ndash;                            <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label for="vehicle_serial_number">Vehicle Serial Number <span class="required">*</span></label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <the-mask mask="#########" class="form-control" id="vehicle_serial_number"&ndash;&gt;-->
<!--&lt;!&ndash;                                                  v-model="addData.vehicle.vehicle_serial_number" type="text"&ndash;&gt;-->
<!--&lt;!&ndash;                                                  placeholder="123456789"></the-mask>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->

<!--&lt;!&ndash;                            </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            <div class="row align-items-center">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <label> Date Expiration library form </label>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <input v-model="addData.vehicle.date_exp_library_form" class="form-control"&ndash;&gt;-->
<!--&lt;!&ndash;                                           type="date" placeholder="">&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <label for="history_periodic_exam">History of the periodic examination</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <input id="history_periodic_exam" v-model="addData.vehicle.history_periodic_exam"&ndash;&gt;-->
<!--&lt;!&ndash;                                           class="form-control" type="date" placeholder="">&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label for="structure_no">Structure No</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <input v-model="addData.vehicle.structure_no" id="structure_no"&ndash;&gt;-->
<!--&lt;!&ndash;                                               class="form-control" type="text" placeholder="">&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label for="engine_serial_number">Engine serial number</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <input id="engine_serial_number" v-model="addData.vehicle.engine_serial_number"&ndash;&gt;-->
<!--&lt;!&ndash;                                               class="form-control" type="text" placeholder="">&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->

<!--&lt;!&ndash;                            &lt;!&ndash;***************************************************************&ndash;&gt;&ndash;&gt;-->

<!--&lt;!&ndash;                            <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label for="supplier">Supplier</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <input v-model="addData.vehicle.supplier" id="supplier" class="form-control"&ndash;&gt;-->
<!--&lt;!&ndash;                                               type="text" placeholder="">&ndash;&gt;-->


<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label for="purshase_date">Date of purchase</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <input v-model="addData.vehicle.purchase_date" id="purshase_date"&ndash;&gt;-->
<!--&lt;!&ndash;                                               class="form-control" type="date" placeholder="">&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->


<!--&lt;!&ndash;                            <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label for="insurance_company">Insurance company</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <input id="insurance_company" class="form-control"&ndash;&gt;-->
<!--&lt;!&ndash;                                               v-model="addData.vehicle.insurance_company" type="text" placeholder="">&ndash;&gt;-->

<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <label for="insurance_number">Insurance number</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <input id="insurance_number" class="form-control"&ndash;&gt;-->
<!--&lt;!&ndash;                                           v-model="addData.vehicle.insurance_number" type="text" placeholder="">&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->

<!--&lt;!&ndash;                            <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label for="start_insurance_date">Start insurance date </label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <input id="start_insurance_date" v-model="addData.vehicle.start_insurance_date"&ndash;&gt;-->
<!--&lt;!&ndash;                                               class="form-control" type="date" placeholder="">&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->

<!--&lt;!&ndash;                                    <label for="insur_end_date">Insurance end date</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <input id="insur_end_date" class="form-control"&ndash;&gt;-->
<!--&lt;!&ndash;                                           v-model="addData.vehicle.end_insurance_date" type="date">&ndash;&gt;-->

<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->

<!--&lt;!&ndash;                            <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label for="storage_box">Storage box capacity</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <input id="storage_box" class="form-control"&ndash;&gt;-->
<!--&lt;!&ndash;                                               v-model="addData.vehicle.storage_box_capacity" type="number"&ndash;&gt;-->
<!--&lt;!&ndash;                                               placeholder="">&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label for="doors_no">Number of doors</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <input id="doors_no" v-model="addData.vehicle.number_doors" class="form-control"&ndash;&gt;-->
<!--&lt;!&ndash;                                               type="number" placeholder="">&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            <div class="row align-items-center">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <label for="seats_no">Number of seats</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <input id="seats_no" v-model="addData.vehicle.seats_number" class="form-control"&ndash;&gt;-->
<!--&lt;!&ndash;                                           type="number" placeholder="">&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <label for="motion_vector">Motion vector</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                    &lt;!&ndash;                       TODO check about this field&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                                    <select v-model="addData.vehicle.motion_vector" class="form-select mb-0"&ndash;&gt;-->
<!--&lt;!&ndash;                                            id="motion_vector" aria-label="Gender select example">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <option value="1">A</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <option value="2">B</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </select>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->

<!--&lt;!&ndash;                            <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div class="col-md-6">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label for="gender">Motion vector</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div class="col-md-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <input v-model="addData.vehicle.have_motion_vector" type="radio"&ndash;&gt;-->
<!--&lt;!&ndash;                                                   value="yes">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label>Yes</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div class="col-md-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <input v-model="addData.vehicle.have_motion_vector" type="radio" value="no">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label>No</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->


<!--&lt;!&ndash;                            <div class="collapse show" id="stepx" tabindex="-1" style="outline: none;">&ndash;&gt;-->
<!--&lt;!&ndash;                                <table class="table user-table table-hover">&ndash;&gt;-->

<!--&lt;!&ndash;                                    <tbody>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <tr class="child-table"&ndash;&gt;-->
<!--&lt;!&ndash;                                        style="text-align: center; font-weight: bold; background: #dde9f1;">&ndash;&gt;-->

<!--&lt;!&ndash;                                        <th class="border-bottom">Weight In Tons</th>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <th class="border-bottom">Reading sensor in volts</th>&ndash;&gt;-->

<!--&lt;!&ndash;                                    </tr>&ndash;&gt;-->

<!--&lt;!&ndash;                                    </tbody>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <tbody>&ndash;&gt;-->


<!--&lt;!&ndash;                                    <tr>&ndash;&gt;-->

<!--&lt;!&ndash;                                        <td><span class="font-weight-normal">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <input type="number" placeholder="00.00">&ndash;&gt;-->
<!--&lt;!&ndash;                                      </span></td>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <td><span class="font-weight-normal">&ndash;&gt;-->
<!--&lt;!&ndash;                                      <input type="number" placeholder="00.00">&ndash;&gt;-->
<!--&lt;!&ndash;                                     </span></td>&ndash;&gt;-->

<!--&lt;!&ndash;                                    </tr>&ndash;&gt;-->


<!--&lt;!&ndash;                                    <tr>&ndash;&gt;-->

<!--&lt;!&ndash;                                        <td><span class="font-weight-normal">&ndash;&gt;-->
<!--&lt;!&ndash;                                      <input type="number" placeholder="00.00">&ndash;&gt;-->
<!--&lt;!&ndash;                                    </span></td>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <td><span class="font-weight-normal">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <input type="number" placeholder="00.00">&ndash;&gt;-->
<!--&lt;!&ndash;                                   </span></td>&ndash;&gt;-->

<!--&lt;!&ndash;                                    </tr>&ndash;&gt;-->


<!--&lt;!&ndash;                                    <tr>&ndash;&gt;-->

<!--&lt;!&ndash;                                        <td><span class="font-weight-normal">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <input type="number" placeholder="00.00">&ndash;&gt;-->
<!--&lt;!&ndash;                                  </span></td>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <td><span class="font-weight-normal">&ndash;&gt;-->
<!--&lt;!&ndash;                                  <input type="number" placeholder="00.00">&ndash;&gt;-->
<!--&lt;!&ndash;                                 </span></td>&ndash;&gt;-->

<!--&lt;!&ndash;                                    </tr>&ndash;&gt;-->


<!--&lt;!&ndash;                                    <tr>&ndash;&gt;-->

<!--&lt;!&ndash;                                        <td><span class="font-weight-normal">&ndash;&gt;-->
<!--&lt;!&ndash;                                  <input type="number" placeholder="00.00">&ndash;&gt;-->
<!--&lt;!&ndash;                                </span></td>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <td><span class="font-weight-normal">&ndash;&gt;-->
<!--&lt;!&ndash;                                <input type="number" placeholder="00.00">&ndash;&gt;-->
<!--&lt;!&ndash;                               </span></td>&ndash;&gt;-->

<!--&lt;!&ndash;                                    </tr>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </tbody>&ndash;&gt;-->
<!--&lt;!&ndash;                                </table>&ndash;&gt;-->


<!--&lt;!&ndash;                            </div>&ndash;&gt;-->


<!--&lt;!&ndash;                        </div>&ndash;&gt;-->

<!--&lt;!&ndash;                        <a class=" show-more collapsed"&ndash;&gt;-->
<!--&lt;!&ndash;                           style="background: none !important;" data-toggle="collapse" href="#step6"&ndash;&gt;-->
<!--&lt;!&ndash;                           role="button" aria-expanded="false" aria-controls="step">&ndash;&gt;-->
<!--&lt;!&ndash;                            <h2 class="h5 mb-4 title_user">Step {{ noStep6 }}: Add New Driver</h2>&ndash;&gt;-->
<!--&lt;!&ndash;                        </a>&ndash;&gt;-->
<!--&lt;!&ndash;                        <div class="collapse" id="step6">&ndash;&gt;-->

<!--&lt;!&ndash;                            <div class="card card-body bg-white border-light shadow-sm mb-4">&ndash;&gt;-->

<!--&lt;!&ndash;                                <div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label for="fullname_driver">Driver Full name <span class="required">*</span></label>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <input id="fullname_driver" v-model="addData.driver.full_name"&ndash;&gt;-->
<!--&lt;!&ndash;                                                   class="form-control" type="text"&ndash;&gt;-->
<!--&lt;!&ndash;                                                   placeholder="Enter driver full name">&ndash;&gt;-->
<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label for="driver_id_number">Identity number <span&ndash;&gt;-->
<!--&lt;!&ndash;                                                class="required">*</span></label>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <the-mask mask="##########" id="driver_id_number"&ndash;&gt;-->
<!--&lt;!&ndash;                                                      v-model="addData.driver.driver_id_number" class="form-control"&ndash;&gt;-->
<!--&lt;!&ndash;                                                      type="text" placeholder="1234567890"></the-mask>&ndash;&gt;-->

<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                    <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label for="driver_birthday">Birthday Hijri <span&ndash;&gt;-->
<!--&lt;!&ndash;                                            class="required">*</span></label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div class="input-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <span class="input-group-text"><span&ndash;&gt;-->
<!--&lt;!&ndash;                                                class="far fa-calendar-alt"></span></span>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <input v-model="addData.driver.driver_birthday" class="form-control"&ndash;&gt;-->
<!--&lt;!&ndash;                                                   id="driver_birthday" type="date" placeholder="dd/mm/yyyy">&ndash;&gt;-->
<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label for="driver_gender">Gender</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <select v-model="addData.driver.driver_gender" class="form-select mb-0"&ndash;&gt;-->
<!--&lt;!&ndash;                                                id="driver_gender" aria-label="Gender select example">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="F">Female</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <option value="M">Male</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </select>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->


<!--&lt;!&ndash;                                    <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label for="driver_email">Email</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <input v-model="addData.driver.driver_email" class="form-control"&ndash;&gt;-->
<!--&lt;!&ndash;                                                   id="driver_email" type="email" placeholder="name@company.com">&ndash;&gt;-->
<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label for="driver_mobile">Mobile number <span&ndash;&gt;-->
<!--&lt;!&ndash;                                                class="required">*</span></label>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <the-mask class="form-control" v-model="addData.driver.driver_mobile"&ndash;&gt;-->
<!--&lt;!&ndash;                                                      mask="+966#########" id="driver_mobile" type="text"&ndash;&gt;-->
<!--&lt;!&ndash;                                                      placeholder="+966#########"></the-mask>&ndash;&gt;-->

<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->


<!--&lt;!&ndash;                                    <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label for="nationality">Nationality</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <input v-model="addData.driver.driver_nationality" class="form-control"&ndash;&gt;-->
<!--&lt;!&ndash;                                                   id="nationality" type="text">&ndash;&gt;-->
<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label for="lic_type">License Type </label>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <select v-model="addData.driver.driver_licence_type" id="lic_type"&ndash;&gt;-->
<!--&lt;!&ndash;                                                    class="form-select mb-0" aria-label="">&ndash;&gt;-->
<!--&lt;!&ndash;                                                <option value="تصدير">تصدير</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                <option value="دبلوماسي">دبلوماسي</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                <option value="مؤقت">مؤقت</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                <option value="معدات ثقيلة">معدات ثقيلة</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                <option value="رخصة سير نقل عام">رخصة سير نقل عام</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                <option value="رخصة سير نقل خاص">رخصة سير نقل خاص</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                <option value="رخصة سير مركبة أشغال عامة">رخصة سير مركبة أشغال عامة&ndash;&gt;-->
<!--&lt;!&ndash;                                                </option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                <option value="رخصة سير سيارة أجرة">رخصة سير سيارة أجرة</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                <option value="رخصة سير دراجة الية">رخصة سير دراجة الية</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                <option value="رخصة سير خاصة">رخصة سير خاصة</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                <option value="رخصة سير حافلة صغيرة">رخصة سير حافلة صغيرة</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                                <option value="رخصة سير حافلة عامة">رخصة سير حافلة عامة</option>&ndash;&gt;-->

<!--&lt;!&ndash;                                            </select>&ndash;&gt;-->

<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->


<!--&lt;!&ndash;                                    <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label for="date_issuance_lic">Date of issuance license</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <input v-model="addData.driver.driver_date_issuance" class="form-control"&ndash;&gt;-->
<!--&lt;!&ndash;                                                   id="date_issuance_lic" type="date" placeholder="">&ndash;&gt;-->
<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div class="form-group">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label for="lic_exp_date">License expiration date</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <input v-model="addData.driver.driver_license_expiration"&ndash;&gt;-->
<!--&lt;!&ndash;                                                   class="form-control" id="lic_exp_date" type="date" placeholder="">&ndash;&gt;-->
<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->

<!--&lt;!&ndash;                                </div>&ndash;&gt;-->


<!--&lt;!&ndash;                            </div>&ndash;&gt;-->


<!--&lt;!&ndash;                        </div>&ndash;&gt;-->
<!--                    </div>-->


<!--&lt;!&ndash;                    <div class="mt-3 mb-3 ">&ndash;&gt;-->
<!--&lt;!&ndash;                        <button type="submit" class="btn btn-success">{{$trans('action.save_all')}}</button>&ndash;&gt;-->
<!--&lt;!&ndash;                    </div>&ndash;&gt;-->

<!--                </div>-->


<!--            </div>-->
<!--        </form>-->
    </div>
</template>
<script>
import {TheMask} from 'vue-the-mask'

export default {
    components: {TheMask},
    data() {
        return {
            user : {

            },
            company: {

            },
            addData: {
                lang: localStorage.getItem('lang'),
                user: {
                    maplayer: "http://mt0.google.com/vt/lyrs=m&hl=en&x={x}&y={y}&z={z} ",
                    twelveHour: false,
                    isDisabled: false,
                    readOnly: false,
                    approximation: 10,
                    deviceReadOnly: false,
                    wassel: false,
                    fullname: "",
                    limitCommands: false,
                    isAdmin: false,
                    properties: [{
                        name: null,
                        value: null
                    }]


                },
                theUser : this.$route.params.idUser,
                company: {},
                vehicle: {
                    plate_number: null,
                },
                device: {
                    attributes: [{
                        name: null,
                        value: null
                    }]
                },
                simCard: {},
                driver: {},
            },
            groups: [],
            simCards: [],
            commands: [],
            years: [],

            noStep3: 1,
            noStep4: 2,
            noStep5: 3,
            noStep6: 4,


            plateNumber: {
                fournumbers: null,
                rightLetter: null,
                middleLetter: null,
                leftLetter: null,
            }

        }
    },

    async mounted() {
        this.listYears();
        await this.getUserInfo();
        await this.getServerInfo();
        await this.getGroupsList();
        await this.getCommands();
        await this.getSimCards();
    },
    methods: {
        async getServerInfo() {
            this.isLoad = true;
            await axios.get('/server', {
                headers: this.tokenHeader
            })
                .then(({data}) => {
                    this.isLoad = false;
                    this.addData.user.approximation = data.data.zoom;
                    this.addData.user.twelveHour = data.data.twelveHourFormat;
                    this.addData.user.readOnly = data.data.readonly;
                    this.addData.user.pol = data.data.poiLayer;
                    this.addData.user.lat = data.data.latitude;
                    this.addData.user.long = data.data.longitude;
                    this.addData.user.deviceReadOnly = data.data.deviceReadonly;
                })
                .catch(({errors}) => {
                    this.isLoad = false;
                });
        },
        async getCommands() {
            this.isLoad = true;
            await axios.get('/commands', {
                headers: this.tokenHeader
            }).then(({data}) => {
                this.isLoad = false;
                this.commands = data.data;


            }).catch(({errors}) => {
                this.isLoad = false;
            });
        },
        async getGroupsList() {
            this.isLoad = true;
            await axios.get('/groups', {
                headers: this.tokenHeader
            }).then(({data}) => {
                this.isLoad = false;
                this.groups = data.data;


            }).catch(({errors}) => {
                this.isLoad = false;
            });

        },
        async getSimCards() {
            this.isLoad = true;
            await axios.get('/simcards', {
                headers: this.tokenHeader
            }).then(({data}) => {
                this.isLoad = false;
                this.simCards = data.data;


            }).catch(({errors}) => {
                this.isLoad = false;
            });

        },
        async addNewEntry() {
            let lang = localStorage.getItem('lang');
            this.addData.vehicle.plate_number = this.plateNumber.fournumbers+" "+this.plateNumber.leftLetter+" "+this.plateNumber.middleLetter+" "+this.plateNumber.rightLetter;
            this.isLoad = true;
            await axios.post('/user/new/registration', this.addData, {
                headers: this.tokenHeader
            })
                .then(({data}) => {
                    this.isLoad = false;
                    if (data.success === true) {
                        this.device = {}
                        this.driver = {}
                        this.simCard = {}
                        this.driver = {}
                        this.vehicle = {}
                        Swal.fire({
                            icon: 'success',
                            title: data.message,
                            showConfirmButton: true,
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.message,
                        })
                    }
                })
                .catch(({errors}) => {
                    this.isLoad = false;
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: errors.message[lang],
                    })
                });
        },
        listYears() {
            let years = [];
            for (var i = new Date().getFullYear(); i >= 1980; i--) {
                years.push(i);
            }

            this.years = years;
        },

        addElement(obj) {
            obj.push({
                name: null,
                value: null
            })
        },

        async getUserInfo(){
            this.isLoad = true;
            let id = this.$route.params.idUser
            await axios.get('/user/'+id, {
                headers: this.tokenHeader
            })
                .then(({data}) => {
                    this.isLoad = false;
                    this.user.fullname = data.data.name
                    this.user.account_type = data.data.user.accountType
                    this.user.birthday = data.data.user.birthday
                    this.user.user_gender = data.data.user.gender
                    this.user.email = data.data.email
                    this.user.phone = data.data.phone
                    this.user.address = data.data.user.address
                    this.user.addressNo = data.data.user.addressNo
                    this.user.city = data.data.user.city
                    this.user.state = data.data.user.state
                    this.user.zipCode = data.data.user.zipCode
                    this.user.maplayer = data.data.user.mapLayer
                    this.user.lat = data.data.latitude
                    this.user.long = data.data.longitude
                    this.user.approximation = data.data.zoom
                    this.user.coordinate_format = data.data.coordinateFormat
                    this.user.pol = data.data.poiLayer
                    this.user.twelveHour = data.data.twelveHourFormat
                    this.user.isDisabled = data.data.disabled
                    this.user.isAdmin = data.data.administrator
                    this.user.deviceReadOnly = data.data.deviceReadonly
                    this.user.readOnly = data.data.readonly
                    this.user.wassel = data.data.user.wassel
                    this.user.limitCommands = data.data.limitCommands
                    this.user.expiry_date = data.data.expirationTime
                    this.user.max_devices = data.data.deviceLimit
                    this.user.max_users = data.data.userLimit
                    this.user.ident_number = data.data.user.id_number


                    if(data.data.user.accountType !== '2'){
                        this.isLoad = true;
                        axios.get('/facility/'+id, {
                            headers: this.tokenHeader
                        }).then(({data}) => {
                            this.isLoad = false;
                            this.company.num_at_ministry = data.data.number_at_ministry;
                            this.company.commercial_register_date_issuance = data.data.commercial_register_start_date;
                            this.company.commercial_reg_number = data.data.commercial_register_number;
                            this.company.commercial_reg_expiry_date = data.data.commercial_register_end_date;
                            this.company.full_name_ar = data.data.full_name_ar;
                            this.company.full_name_en = data.data.full_name_en;
                            this.company.short_name_ar = data.data.short_name_ar;
                            this.company.short_name_en = data.data.short_name_en;
                            this.company.address = data.data.address;
                            this.company.zipCode = data.data.post_code;
                            this.company.city = data.data.city;
                            this.company.email = data.data.mail_box;
                            this.company.phone = data.data.phone;
                            this.company.fax = data.data.fax;
                            this.company.website = data.data.website;
                            this.company.manager_name = data.data.manager_name;
                            this.company.manager_phone = data.data.manager_phone;
                            this.company.manager_mobile = data.data.manager_mobile;
                            this.company.manager_email = data.data.manager_mail;
                            this.company.ident_number = data.data.id_number;
                            this.company.veh_rental_management_service = data.data.veh_rental_management_service;
                            this.company.veh_maintenance_service = data.data.veh_maintenance_service;
                            this.company.veh_tracking_service = data.data.veh_tracking_service;


                        }).catch(({errors}) => {
                            this.isLoad = false;
                        });
                    }

                })
                .catch(({errors}) => {
                    this.isLoad = false;
                });
        },

    }
}
</script>
<style>
.required {
    color: red
}

.minius {
    width: 31% !important;
}
</style>
