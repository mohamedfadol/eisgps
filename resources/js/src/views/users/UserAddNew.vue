<template>
    <div>
        <loading :active.sync="isLoad"
                 :is-full-page="fullPage"
                 :height="loaderHeight"
                 :width="loaderWidth"
                 :color="loaderColor"
                 :loader="loaderType"
                 :background-color="loaderBgColor"></loading>
<!--        <form @submit.prevent="addNewEntry">-->
<!--            <div class="row mt-5">-->
<!--                <div class="col-12 col-xl-8">-->
<!--                    <div class="card card-body bg-white border-light shadow-sm mb-4">-->

<!--                        <a class=" show-more collapsed"-->
<!--                           style="background: none !important;" data-toggle="collapse" href="#step1"-->
<!--                           role="button" aria-expanded="false" aria-controls="step">-->
<!--                            <h2 class="h5 mb-4 title_user">General information</h2>-->
<!--                        </a>-->
<!--                        <div class="collapse" id="step1">-->


<!--                            <div class="row">-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div>-->
<!--                                        <label>Full name <span class="required">*</span></label>-->
<!--                                        <div>{{user.fullname}}</div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div>-->
<!--                                        <label >Account type <span class="required">*</span></label>-->
<!--                                        <div v-if="user.account_type === '1'">{{$trans('main.company')}}</div>-->
<!--                                        <div v-else-if="user.account_type === '2'">{{$trans('main.customer')}}</div>-->
<!--                                        <div v-else>{{$trans('main.partner')}}</div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="row align-items-center">-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <label >Birthday Hijri <span class="required">*</span></label>-->
<!--                                    <div>{{user.birthday}}</div>-->
<!--                                </div>-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <label>Gender</label>-->
<!--                                    <div v-if="user.user_gender === 'M'">{{$trans('main.male')}}</div>-->
<!--                                    <div v-else-if="user.user_gender === 'F'">{{$trans('main.female')}}</div>-->
<!--                                    <div v-else></div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="row">-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label>Email <span class="required">*</span></label>-->
<!--                                        <div>{{user.email}}</div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label>Phone <span class="required">*</span></label>-->
<!--                                        <div>{{user.phone}}</div>-->

<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            &lt;!&ndash;***************************************************************&ndash;&gt;-->

<!--                            <div class="row">-->
<!--                                <div class="col-sm-9 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label>Address</label>-->
<!--                                        <div>{{user.address}} {{user.addressNo}} {{user.zipCode}} {{user.city}} {{user.state}} </div>-->
<!--                                    </div>-->
<!--                                </div>-->

<!--                            </div>-->


<!--                            <div class="row">-->
<!--                                <div class="col-md-12 mb-3">-->
<!--                                    <div>-->
<!--                                        <label>Map layer</label>-->
<!--                                        <div>{{user.maplayer}}</div>-->
<!--                                    </div>-->
<!--                                </div>-->

<!--                                <div class="col-sm-4 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label >Longitude</label>-->
<!--                                        <div>{{user.long}}</div>-->
<!--                                    </div>-->
<!--                                </div>-->

<!--                                <div class="col-sm-4 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label >Latitude</label>-->
<!--                                        <div>{{user.lat}}</div>-->
<!--                                    </div>-->
<!--                                </div>-->

<!--                                <div class="col-sm-4 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label>Approximation</label>-->
<!--                                        <div>{{user.approximation}}</div>-->
<!--                                    </div>-->
<!--                                </div>-->


<!--                                <div class="col-sm-6 mb-3">-->
<!--                                    <label>Coordinate format</label>-->
<!--                                    <div>{{user.coordinate_format}}</div>-->
<!--                                </div>-->


<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <label >POL points the layer of interest</label>-->
<!--                                    <div>{{user.pol}}</div>-->

<!--                                </div>-->

<!--                            </div>-->


<!--                            <div class="row">-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-check dashboard-check">-->
<!--                                        <input v-model="user.twelveHour" class="form-check-input"-->
<!--                                               type="checkbox" disabled id="12hours">-->
<!--                                        <label class="form-check-label" for="12hours">-->
<!--                                            <label for="12hours">12 hour formula</label>-->
<!--                                        </label>-->
<!--                                    </div>-->
<!--                                </div>-->

<!--                            </div>-->


<!--                            <div class="row">-->


<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-check dashboard-check">-->
<!--                                        <input v-model="user.isDisabled" class="form-check-input"-->
<!--                                               type="checkbox" disabled id="disabled">-->
<!--                                        <label class="form-check-label" for="disabled">-->
<!--                                            <label for="disabled">Disabled</label>-->
<!--                                        </label>-->
<!--                                    </div>-->
<!--                                </div>-->

<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-check dashboard-check">-->
<!--                                        <input v-model="user.isAdmin" class="form-check-input" type="checkbox"-->
<!--                                               disabled id="admin">-->
<!--                                        <label class="form-check-label" for="admin">-->
<!--                                            <label for="admin">Admin</label>-->
<!--                                        </label>-->
<!--                                    </div>-->
<!--                                </div>-->

<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-check dashboard-check">-->
<!--                                        <input v-model="user.deviceReadOnly" class="form-check-input"-->
<!--                                               type="checkbox" disabled id="device_readonly">-->
<!--                                        <label class="form-check-label" for="device_readonly">-->
<!--                                            <label for="device_readonly">Device Readonly</label>-->
<!--                                        </label>-->
<!--                                    </div>-->
<!--                                </div>-->

<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-check dashboard-check">-->
<!--                                        <input v-model="user.readOnly" class="form-check-input" type="checkbox"-->
<!--                                               disabled id="realonly">-->
<!--                                        <label class="form-check-label" for="realonly">-->
<!--                                            <label for="realonly">Read only</label>-->
<!--                                        </label>-->
<!--                                    </div>-->
<!--                                </div>-->

<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-check dashboard-check">-->
<!--                                        <input v-model="user.wassel" class="form-check-input" type="checkbox"-->
<!--                                               id="wassel" disabled>-->
<!--                                        <label class="form-check-label" for="wassel">-->
<!--                                            <label for="wassel">Wassel</label>-->
<!--                                        </label>-->
<!--                                    </div>-->
<!--                                </div>-->

<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-check dashboard-check">-->
<!--                                        <input v-model="user.limitCommands" class="form-check-input"-->
<!--                                               type="checkbox" disabled id="limit_command">-->
<!--                                        <label class="form-check-label" for="limit_command">-->
<!--                                            <label for="limit_command">Limit commands</label>-->
<!--                                        </label>-->
<!--                                    </div>-->
<!--                                </div>-->

<!--                                <div class="row align-items-center">-->
<!--                                    <div class="col-md-6 mb-3">-->
<!--                                        <label>Expiry date</label>-->
<!--                                        <div >-->
<!--                                            {{user.expiry_date}}-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-6 mb-3">-->
<!--                                        <div class="form-group">-->
<!--                                            <label >The maximum devices</label>-->
<!--                                            <div>{{user.max_devices}}</div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->


<!--                                <div class="row align-items-center">-->

<!--                                    <div class="col-md-6 mb-3">-->
<!--                                        <div class="form-group">-->
<!--                                            <label >Maximum users</label>-->
<!--                                            <div>{{user.max_users}}</div>-->
<!--                                        </div>-->
<!--                                    </div>-->


<!--                                    <div class="col-md-6 mb-3" v-if="user.account_type === '2'">-->
<!--                                        <div class="form-group">-->
<!--                                            <label > Identification Number <span-->
<!--                                                class="required">*</span></label>-->
<!--                                            <div>{{user.ident_number}}</div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->


<!--                            </div>-->

<!--                            &lt;!&ndash;                            <div class="row" v-for="(attr, index ) in addData.user.properties">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                <div class="col-sm-6 mb-3">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                    <label for="proprety">Property name </label>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                    <select v-model="attr.name" class="form-select w-100 mb-0" id="proprety"&ndash;&gt;-->
<!--                            &lt;!&ndash;                                            aria-label="State select example">&ndash;&gt;-->

<!--                            &lt;!&ndash;                                        <option value="mail.smtp.host">{{ $trans('attr.attributeMailSmtpHost') }}&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        </option>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        <option value="mail.smtp.port">{{ $trans('attr.attributeMailSmtpPort') }}&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        </option>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        <option value="mail.smtp.starttls.enable">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                            {{ $trans('attr.attributeMailSmtpStarttlsEnable') }}&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        </option>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        <option value="mail.smtp.starttls.required">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                            {{ $trans('attr.attributeMailSmtpStarttlsRequired') }}&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        </option>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        <option value="mail.smtp.ssl.enable">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                            {{ $trans('attr.attributeMailSmtpSslEnable') }}&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        </option>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        <option value="mail.smtp.ssl.trust">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                            {{ $trans('attr.attributeMailSmtpSslTrust') }}&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        </option>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        <option value="mail.smtp.ssl.protocols">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                            {{ $trans('attr.attributeMailSmtpSslProtocols') }}&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        </option>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        <option value="mail.smtp.from">{{ $trans('attr.attributeMailSmtpFrom') }}&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        </option>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        <option value="mail.smtp.auth">{{ $trans('attr.attributeMailSmtpAuth') }}&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        </option>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        <option value="mail.smtp.username">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                            {{ $trans('attr.attributeMailSmtpUsername') }}&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        </option>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        <option value="mail.smtp.password">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                            {{ $trans('attr.attributeMailSmtpPassword') }}&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        </option>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        <option value="web.liveRouteLength">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                            {{ $trans('attr.attributeWebLiveRouteLength') }}&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        </option>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        <option value="web.selectZoom">{{ $trans('attr.attributeWebSelectZoom') }}&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        </option>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        <option value="web.maxZoom">{{ $trans('attr.attributeWebMaxZoom') }}</option>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        <option value="ui.disableReport">{{ $trans('attr.attributeUiDisableReport') }}&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        </option>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        <option value="ui.disableEvents">{{ $trans('attr.attributeUiDisableEvents') }}&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        </option>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        <option value="ui.disableVehicleFetures">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                            {{ $trans('attr.attributeUiDisableVehicleFetures') }}&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        </option>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        <option value="ui.disableDrivers">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                            {{ $trans('attr.attributeUiDisableDrivers') }}&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        </option>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        <option value="ui.disableComputedAttributes">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                            {{ $trans('attr.attributeUiDisableComputedAttributes') }}&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        </option>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        <option value="ui.disableCalendars">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                            {{ $trans('attr.attributeUiDisableCalendars') }}&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        </option>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        <option value="ui.disableMaintenance">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                            {{ $trans('attr.attributeUiDisableMaintenance') }}&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        </option>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        <option value="ui.hidePositionAttributes">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                            {{ $trans('attr.attributeUiHidePositionAttributes') }}&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        </option>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        <option value="distanceUnit">{{ $trans('attr.settingsDistanceUnit') }}</option>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        <option value="speedUnit">{{ $trans('attr.settingsSpeedUnit') }}</option>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        <option value="volumeUnit">{{ $trans('attr.settingsVolumeUnit') }}</option>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        <option value="timezone">{{ $trans('attr.sharedTimezone') }}</option>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        <option value="notificationTokens">{{&ndash;&gt;-->
<!--                            &lt;!&ndash;                                                $trans('attr.attributeNotificationTokens')&ndash;&gt;-->
<!--                            &lt;!&ndash;                                            }}&ndash;&gt;-->
<!--                            &lt;!&ndash;                                        </option>&ndash;&gt;-->

<!--                            &lt;!&ndash;                                    </select>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                </div>&ndash;&gt;-->


<!--                            &lt;!&ndash;                                <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                    <label for="proprety_val">Property value</label>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                    <input v-model="attr.value" class="form-control" id="proprety_val" type="text">&ndash;&gt;-->

<!--                            &lt;!&ndash;                                </div>&ndash;&gt;-->


<!--                            &lt;!&ndash;                            </div>&ndash;&gt;-->



<!--                        </div>-->

<!--                        <a class=" show-more collapsed"-->
<!--                           v-if="user.account_type !== '2'"-->
<!--                           style="background: none !important;" data-toggle="collapse" href="#step2"-->
<!--                           role="button" aria-expanded="false" aria-controls="step">-->
<!--                            <h2 class="h5 mb-4 title_user">Data Facility</h2>-->
<!--                        </a>-->
<!--                        <div class="collapse" id="step2">-->
<!--                            <div class="row">-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div>-->
<!--                                        <label >The number at the Ministry of Interior <span-->
<!--                                            class="required">*</span></label>-->
<!--                                        <div>{{company.num_at_ministry}}</div>-->
<!--                                    </div>-->
<!--                                </div>-->


<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <label >Commercial register date issuance <span v-if="addData.user.account_type !== '2'" class="required">*</span></label>-->
<!--                                    <div>{{company.commercial_register_date_issuance}}</div>-->
<!--                                </div>-->


<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label >Commercial Registration No</label>-->
<!--                                        <div>{{company.commercial_reg_number}}</div>-->
<!--                                    </div>-->
<!--                                </div>-->


<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <label >Commercial register expiry date</label>-->

<!--                                    <div>{{company.commercial_reg_expiry_date}}</div>-->

<!--                                </div>-->


<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div>-->
<!--                                        <label>Company Full name [Arabic]</label>-->
<!--                                        <div>{{company.full_name_ar}}</div>-->
<!--                                    </div>-->
<!--                                </div>-->


<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div>-->
<!--                                        <label>Company Full name [English]</label>-->

<!--                                        <div>{{company.full_name_en}}</div>-->
<!--                                    </div>-->
<!--                                </div>-->


<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div>-->
<!--                                        <label >Company Short name [Arabic]</label>-->

<!--                                        <div>{{company.short_name_ar}}</div>-->
<!--                                    </div>-->
<!--                                </div>-->


<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div>-->
<!--                                        <label >Company Short name [English]</label>-->

<!--                                        <div>{{company.short_name_en}}</div>-->
<!--                                    </div>-->
<!--                                </div>-->


<!--                                &lt;!&ndash;***************************************************************&ndash;&gt;-->


<!--                                <div class="row">-->


<!--                                    <div class="col-sm-12 ">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="address_company">Address</label>-->
<!--                                            <div>{{company.address}} {{company.zipCode}} {{company.city}}</div>-->
<!--                                        </div>-->
<!--                                    </div>-->

<!--                                    <div class="col-md-6 mb-3">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="phone_number">Phone number <span v-if="user.account_type !== '2'" class="required">*</span></label>-->
<!--                                            <div>{{company.phone}}</div>-->

<!--                                        </div>-->
<!--                                    </div>-->

<!--                                    <div class="col-md-6 mb-3">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="fax">Fax Number</label>-->
<!--                                            <div>{{company.fax}}</div>-->
<!--                                        </div>-->
<!--                                    </div>-->


<!--                                    <div class="col-md-6 mb-3">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="website">The company's website</label>-->
<!--                                            <div>{{company.website}}</div>-->
<!--                                        </div>-->
<!--                                    </div>-->

<!--                                    <div class="col-md-6 mb-3">-->
<!--                                        <div class="form-group">-->
<!--                                            <label>Company E-mail <span v-if="user.account_type !== '2'" class="required">*</span></label>-->
<!--                                            <div>{{company.email}}</div>-->
<!--                                        </div>-->
<!--                                    </div>-->

<!--                                    <div class="col-md-6 mb-3">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="id_number"> Identification Number <span-->
<!--                                                class="required">*</span></label>-->
<!--                                            <div>{{company.ident_number}}</div>-->
<!--                                        </div>-->
<!--                                    </div>-->


<!--                                </div>-->


<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="manager_name">Manager Name <span v-if="user.account_type !== '2'" class="required">*</span></label>-->
<!--                                        <div>{{company.manager_name}}</div>-->
<!--                                    </div>-->
<!--                                </div>-->


<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label >Manager Mobile number <span v-if="user.account_type !== '2'" class="required">*</span></label>-->
<!--                                        <div>{{company.manager_mobile}}</div>-->
<!--                                    </div>-->
<!--                                </div>-->

<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label >Manager phone number <span v-if="user.account_type !== '2'" class="required">*</span></label>-->
<!--                                        <div>{{company.manager_phone}}</div>-->
<!--                                    </div>-->
<!--                                </div>-->


<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label >Manager E-mail</label>-->
<!--                                        <div>{{company.manager_email}}</div>-->
<!--                                    </div>-->
<!--                                </div>-->


<!--                                <div class="row">-->
<!--                                    <div class="col-md-12">-->
<!--                                        <div class="form-check dashboard-check">-->
<!--                                            <input class="form-check-input"-->
<!--                                                   v-model="company.veh_rental_management_service"-->
<!--                                                   type="checkbox" disabled id="veh_rental_management_service">-->
<!--                                            <label class="form-check-label" for="veh_rental_management_service">-->
<!--                                                <label for="veh_rental_management_service">Vehicle rental management-->
<!--                                                    service</label>-->
<!--                                            </label>-->
<!--                                        </div>-->
<!--                                    </div>-->

<!--                                    &lt;!&ndash;&#45;&#45;&#45;&#45;&#45;&#45;***-&#45;&#45;&#45;&#45;&#45;&#45;&ndash;&gt;-->
<!--                                    <div class="col-md-12">-->
<!--                                        <div class="form-check dashboard-check">-->
<!--                                            <input class="form-check-input" type="checkbox"-->
<!--                                                   v-model="company.veh_maintenance_service" disabled-->
<!--                                                   id="veh_maintenance_service">-->
<!--                                            <label class="form-check-label" for="veh_maintenance_service">-->
<!--                                                <label for="veh_maintenance_service">Vehicle maintenance and operation-->
<!--                                                    management service</label>-->
<!--                                            </label>-->
<!--                                        </div>-->
<!--                                    </div>-->

<!--                                    &lt;!&ndash;&#45;&#45;&#45;&#45;&#45;&#45;***-&#45;&#45;&#45;&#45;&#45;&#45;&ndash;&gt;-->

<!--                                    <div class="col-md-12">-->
<!--                                        <div class="form-check dashboard-check">-->
<!--                                            <input class="form-check-input" type="checkbox"-->
<!--                                                   v-model="company.veh_tracking_service" disabled-->
<!--                                                   id="veh_tracking_service">-->
<!--                                            <label class="form-check-label" for="veh_tracking_service">-->
<!--                                                <label for="veh_tracking_service">Vehicle tracking service, including-->
<!--                                                    operation and maintenance-->
<!--                                                    management</label>-->
<!--                                            </label>-->
<!--                                        </div>-->
<!--                                    </div>-->

<!--                                    &lt;!&ndash;&#45;&#45;&#45;&#45;&#45;&#45;***-&#45;&#45;&#45;&#45;&#45;&#45;&ndash;&gt;-->


<!--                                </div>-->


<!--                            </div>-->


<!--                        </div>-->

<!--                        <a class=" show-more collapsed"-->
<!--                           style="background: none !important;" data-toggle="collapse" href="#step3"-->
<!--                           role="button" aria-expanded="false" aria-controls="step">-->
<!--                            <h2 class="h5 mb-4 title_user ">Step {{ noStep3 }}: Add New Device</h2>-->
<!--                        </a>-->
<!--                        <div class="collapse" id="step3">-->


<!--                            <div class="row">-->


<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="device_name">Devices Name<span class="required">*</span></label>-->
<!--                                        <input v-model="addData.device.device_name" class="form-control"-->
<!--                                               id="device_name" type="text">-->
<!--                                    </div>-->
<!--                                </div>-->


<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <label for="branch">Branch</label>-->
<!--                                    <input v-model="addData.device.device_branch" class="form-control" id="branch"-->
<!--                                           type="text">-->


<!--                                </div>-->


<!--                                <div class="row">-->
<!--                                    <div class="col-md-6 mb-3">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="imei">PIDENTIFIER / IMEI <span class="required">*</span></label>-->
<!--                                            <input v-model="addData.device.imei" class="form-control" id="imei"-->
<!--                                                   type="text">-->
<!--                                        </div>-->
<!--                                    </div>-->

<!--                                    <div class="col-md-6 mb-3">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="dev_model">Device Model</label>-->
<!--                                            <input v-model="addData.device.device_model" class="form-control"-->
<!--                                                   id="dev_model" type="text">-->
<!--                                        </div>-->
<!--                                    </div>-->

<!--                                    <div class="col-md-6 mb-3">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="protocol">Protocol</label>-->
<!--                                            <input v-model="addData.device.device_protocol" class="form-control"-->
<!--                                                   id="protocol" type="text">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    &lt;!&ndash;-->
<!--                                                          <div class="dropdown-menu dropdown-primary">-->
<!--                          <a class="dropdown-item" href="#"Pay</a>-->
<!--                          <a class="dropdown-item" href="#"><i class="fas fa-bell-slash"></i>&nbsp;&nbsp;Disable alertss</a>-->
<!--                          <a class="dropdown-item" href="#"><i class="far fa-envelope"></i>&nbsp;&nbsp;Check mail</a>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                                                        &ndash;&gt;-->

<!--                                    <div class="col-md-6 mb-3">-->
<!--                                        <div class="d-flex flex-column">-->

<!--                                            <div class="d-flex flex-column">-->
<!--                                                <label for="device_cat">Device Category</label>-->
<!--                                                <select v-model="addData.device.device_category" id="device_cat"-->
<!--                                                        class="form-select mb-0">-->
<!--                                                    <option value="car">Car</option>-->
<!--                                                    <option value="van">Van</option>-->
<!--                                                    <option value="bus">Bus</option>-->
<!--                                                    <option value="truck">Truck</option>-->
<!--                                                    <option value="trailer">Trailer</option>-->
<!--                                                    <option value="pick up">Pick up</option>-->
<!--                                                    <option value="motorcycle">Motorcycle</option>-->
<!--                                                    <option value="winch">Winch</option>-->

<!--                                                </select>-->
<!--                                            </div>-->


<!--                                        </div>-->


<!--                                    </div>-->


<!--                                    &lt;!&ndash;                                    <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                        <label>SIM CARD</label>&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                        <select v-model="addData.device.sim_card" class="form-select mb-0">&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                            <option selected value=""></option>&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                            <option selected value="">A</option>&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                            <option value="1">B</option>&ndash;&gt;-->

<!--                                    &lt;!&ndash;                                        </select>&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    </div>&ndash;&gt;-->


<!--                                    &lt;!&ndash;                                    <div class="col-md-6 mb-3">&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                        <label>List CARD</label>&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                        <select v-model="addData.device.list_card" class="form-select mb-0">&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                            <option selected value=""></option>&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                            <option selected value="">A</option>&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                            <option value="1">B</option>&ndash;&gt;-->

<!--                                    &lt;!&ndash;                                        </select>&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    </div>&ndash;&gt;-->


<!--                                </div>-->
<!--                                <div class="row" v-for="(attr, index ) in addData.device.attributes">-->
<!--                                    <div class="col-sm-6 mb-3">-->
<!--                                        <label for="attr_name2">Attribute Name</label>-->
<!--                                        <select v-model="attr.name" class="form-select w-100 mb-0" id="attr_name2"-->
<!--                                                aria-label="State select example">-->
<!--                                            <option value="web.reportColor">-->
<!--                                                {{ $trans('attr.attributeWebReportColor') }}-->
<!--                                            </option>-->
<!--                                            <option value="devicePassword">-->
<!--                                                {{ $trans('attr.attributeDevicePassword') }}-->
<!--                                            </option>-->
<!--                                            <option value="processing.copyAttributes">-->
<!--                                                {{ $trans('attr.attributeProcessingCopyAttributes') }}-->
<!--                                            </option>-->
<!--                                            <option value="decoder.timezone">{{ $trans('attr.sharedTimezone') }}-->
<!--                                            </option>-->
<!--                                            <option value="deviceInactivityStart">-->
<!--                                                {{ $trans('attr.attributeDeviceInactivityStart') }}-->
<!--                                            </option>-->
<!--                                            <option value="deviceInactivityPeriod">-->
<!--                                                {{ $trans('attr.attributeDeviceInactivityPeriod') }}-->
<!--                                            </option>-->
<!--                                            <option value="speedLimit">{{ $trans('attr.attributeSpeedLimit') }}</option>-->
<!--                                            <option value="report.ignoreOdometer">-->
<!--                                                {{ $trans('attr.attributeReportIgnoreOdometer') }}-->
<!--                                            </option>-->

<!--                                        </select>-->
<!--                                    </div>-->


<!--                                    <div class="col-md-6 mb-3">-->
<!--                                        <label for="attr_val">Attribute Value</label>-->
<!--                                        <input v-model="attr.value" class="form-control" id="attr_val" type="text">-->

<!--                                    </div>-->
<!--                                </div>-->

<!--                                <a @click="addElement(addData.device.attributes)">-->
<!--                                    <span data-brackets-id="25270" class="fas fa-plus mr-2"></span>More-->
<!--                                </a>-->


<!--                                &lt;!&ndash;                                <div class="row">&ndash;&gt;-->
<!--                                &lt;!&ndash;                                    <div class="col-sm-6 mb-3">&ndash;&gt;-->
<!--                                &lt;!&ndash;                                        <label for="description">Description </label>&ndash;&gt;-->
<!--                                &lt;!&ndash;                                    </div>&ndash;&gt;-->


<!--                                &lt;!&ndash;                                </div>&ndash;&gt;-->


<!--                                &lt;!&ndash;                                <div class="row">&ndash;&gt;-->
<!--                                &lt;!&ndash;                                    <div class="col-sm-12">&ndash;&gt;-->
<!--                                &lt;!&ndash;                                        <label for="state">Type of notification</label>&ndash;&gt;-->
<!--                                &lt;!&ndash;                                        <div class="form-check dashboard-check checked_DIV">&ndash;&gt;-->


<!--                                &lt;!&ndash;                                            <input class="form-check-input" type="checkbox" value="" id="userCheck55">&ndash;&gt;-->
<!--                                &lt;!&ndash;                                            <label class="form-check-label" for="userCheck55">&ndash;&gt;-->
<!--                                &lt;!&ndash;                                                <label for="">Select All</label>&ndash;&gt;-->
<!--                                &lt;!&ndash;                                            </label>&ndash;&gt;-->

<!--                                &lt;!&ndash;                                            <br>&ndash;&gt;-->


<!--                                &lt;!&ndash;                                            <input class="form-check-input" type="checkbox" value="" id="userCheck55">&ndash;&gt;-->
<!--                                &lt;!&ndash;                                            <label class="form-check-label" for="userCheck55">&ndash;&gt;-->
<!--                                &lt;!&ndash;                                                <label for="">Vehicle rental management service</label>&ndash;&gt;-->
<!--                                &lt;!&ndash;                                            </label>&ndash;&gt;-->

<!--                                &lt;!&ndash;                                            <input class="form-check-input" type="checkbox" value="" id="userCheck55">&ndash;&gt;-->
<!--                                &lt;!&ndash;                                            <label class="form-check-label" for="userCheck55">&ndash;&gt;-->
<!--                                &lt;!&ndash;                                                <label for="">Vehicle rental management service</label>&ndash;&gt;-->
<!--                                &lt;!&ndash;                                            </label>&ndash;&gt;-->

<!--                                &lt;!&ndash;                                            <input class="form-check-input" type="checkbox" value="" id="userCheck55">&ndash;&gt;-->
<!--                                &lt;!&ndash;                                            <label class="form-check-label" for="userCheck55">&ndash;&gt;-->
<!--                                &lt;!&ndash;                                                <label for="">Vehicle rental management service</label>&ndash;&gt;-->
<!--                                &lt;!&ndash;                                            </label>&ndash;&gt;-->

<!--                                &lt;!&ndash;                                            <input class="form-check-input" type="checkbox" value="" id="userCheck55">&ndash;&gt;-->
<!--                                &lt;!&ndash;                                            <label class="form-check-label" for="userCheck55">&ndash;&gt;-->
<!--                                &lt;!&ndash;                                                <label for="">Vehicle rental management service</label>&ndash;&gt;-->
<!--                                &lt;!&ndash;                                            </label>&ndash;&gt;-->

<!--                                &lt;!&ndash;                                            <input class="form-check-input" type="checkbox" value="" id="userCheck55">&ndash;&gt;-->
<!--                                &lt;!&ndash;                                            <label class="form-check-label" for="userCheck55">&ndash;&gt;-->
<!--                                &lt;!&ndash;                                                <label for="">Vehicle rental management service</label>&ndash;&gt;-->
<!--                                &lt;!&ndash;                                            </label>&ndash;&gt;-->

<!--                                &lt;!&ndash;                                            <input class="form-check-input" type="checkbox" value="" id="userCheck55">&ndash;&gt;-->
<!--                                &lt;!&ndash;                                            <label class="form-check-label" for="userCheck55">&ndash;&gt;-->
<!--                                &lt;!&ndash;                                                <label for="">Vehicle rental management service</label>&ndash;&gt;-->
<!--                                &lt;!&ndash;                                            </label>&ndash;&gt;-->

<!--                                &lt;!&ndash;                                            <input class="form-check-input" type="checkbox" value="" id="userCheck55">&ndash;&gt;-->
<!--                                &lt;!&ndash;                                            <label class="form-check-label" for="userCheck55">&ndash;&gt;-->
<!--                                &lt;!&ndash;                                                <label for="">Vehicle rental management service</label>&ndash;&gt;-->
<!--                                &lt;!&ndash;                                            </label>&ndash;&gt;-->

<!--                                &lt;!&ndash;                                            <input class="form-check-input" type="checkbox" value="" id="userCheck55">&ndash;&gt;-->
<!--                                &lt;!&ndash;                                            <label class="form-check-label" for="userCheck55">&ndash;&gt;-->
<!--                                &lt;!&ndash;                                                <label for="">Vehicle rental management service</label>&ndash;&gt;-->
<!--                                &lt;!&ndash;                                            </label>&ndash;&gt;-->
<!--                                &lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--                                &lt;!&ndash;                                    </div>&ndash;&gt;-->


<!--                                &lt;!&ndash;                                </div>&ndash;&gt;-->




<!--                            </div>-->
<!--                        </div>-->

<!--                        <a class=" show-more collapsed"-->
<!--                           style="background: none !important;" data-toggle="collapse" href="#step4"-->
<!--                           role="button" aria-expanded="false" aria-controls="step">-->
<!--                            <h2 class="h5 mb-4 title_user">Step {{ noStep4 }}: Add New SIM Card</h2>-->
<!--                        </a>-->
<!--                        <div class="collapse" id="step4">-->


<!--                            <div class="row">-->

<!--                                <div class="col-md-6 mb-3">-->
<!--                                    &lt;!&ndash;                                   TODO Save this field&ndash;&gt;-->
<!--                                    <label for="comm_company">Name Communication company<span class="required">*</span></label>-->
<!--                                    <input id="comm_company" v-model="addData.simCard.telecom_company"-->
<!--                                           class="form-control" type="text" placeholder="">-->
<!--                                </div>-->

<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="sim">Add SIM Card <span class="required">*</span></label>-->
<!--                                        <input id="sim" v-model="addData.simCard.sim_card"-->
<!--                                               class="form-control" type="text" placeholder="">-->
<!--                                        &lt;!&ndash;                                        <select id="sim" v-model="addData.simCard.sim_card" class="form-select mb-0"&ndash;&gt;-->
<!--                                        &lt;!&ndash;                                                aria-label="">&ndash;&gt;-->
<!--                                        &lt;!&ndash;                                            <option v-for="sim in simCards" :value="sim.iccid">{{sim.iccid}}</option>&ndash;&gt;-->

<!--                                        &lt;!&ndash;                                        </select>&ndash;&gt;-->
<!--                                    </div>-->
<!--                                </div>-->

<!--                            </div>-->

<!--                        </div>-->

<!--                        <a class=" show-more collapsed"-->
<!--                           style="background: none !important;" data-toggle="collapse" href="#step5"-->
<!--                           role="button" aria-expanded="false" aria-controls="step">-->
<!--                            <h2 class="h5 mb-4 title_user">Step {{ noStep5 }}: Add New Vehicle</h2>-->
<!--                        </a>-->
<!--                        <div class="collapse" id="step5">-->

<!--                            <div class="row">-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div>-->
<!--                                        <label for="veh_code">Vehicle code</label>-->
<!--                                        <input v-model="addData.vehicle.vehicle_code" class="form-control" id="veh_code"-->
<!--                                               type="text" placeholder="">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div>-->
<!--                                        <label>Plate Number <span class="required">*</span></label>-->

<!--                                        <div class="row">-->
<!--                                            <div class="col-md-4">-->
<!--                                                <the-mask class="form-control"  v-model="plateNumber.fournumbers" mask="####" type="text"-->
<!--                                                          placeholder="1111"></the-mask>-->

<!--                                            </div>-->
<!--                                            <div class="col-md-8">-->
<!--                                                <div class="row">-->

<!--                                                    <select v-model="plateNumber.rightLetter" class="form-select minius"-->
<!--                                                            aria-label="">-->
<!--                                                        <option value="أ">أ</option>-->
<!--                                                        <option value="ب">ب</option>-->
<!--                                                        <option value="ح">ح</option>-->
<!--                                                        <option value="د">د</option>-->
<!--                                                        <option value="ر">ر</option>-->
<!--                                                        <option value="س">س</option>-->
<!--                                                        <option value="ص">ص</option>-->
<!--                                                        <option value="ط">ط</option>-->
<!--                                                        <option value="ع">ع</option>-->
<!--                                                        <option value="ق">ق</option>-->
<!--                                                        <option value="ك">ك</option>-->
<!--                                                        <option value="ل">ل</option>-->
<!--                                                        <option value="م">م</option>-->
<!--                                                        <option value="ن">ن</option>-->
<!--                                                        <option value="ه">ه</option>-->
<!--                                                        <option value="و">و</option>-->
<!--                                                        <option value="ي">ي</option>-->
<!--                                                    </select>-->

<!--                                                    <select v-model="plateNumber.middleLetter" class="form-select minius"-->
<!--                                                            aria-label="">-->
<!--                                                        <option value="أ">أ</option>-->
<!--                                                        <option value="ب">ب</option>-->
<!--                                                        <option value="ح">ح</option>-->
<!--                                                        <option value="د">د</option>-->
<!--                                                        <option value="ر">ر</option>-->
<!--                                                        <option value="س">س</option>-->
<!--                                                        <option value="ص">ص</option>-->
<!--                                                        <option value="ط">ط</option>-->
<!--                                                        <option value="ع">ع</option>-->
<!--                                                        <option value="ق">ق</option>-->
<!--                                                        <option value="ك">ك</option>-->
<!--                                                        <option value="ل">ل</option>-->
<!--                                                        <option value="م">م</option>-->
<!--                                                        <option value="ن">ن</option>-->
<!--                                                        <option value="ه">ه</option>-->
<!--                                                        <option value="و">و</option>-->
<!--                                                        <option value="ي">ي</option>-->
<!--                                                    </select>-->

<!--                                                    <select v-model="plateNumber.leftLetter" class="form-select minius"-->
<!--                                                            aria-label="">-->
<!--                                                        <option value="أ">أ</option>-->
<!--                                                        <option value="ب">ب</option>-->
<!--                                                        <option value="ح">ح</option>-->
<!--                                                        <option value="د">د</option>-->
<!--                                                        <option value="ر">ر</option>-->
<!--                                                        <option value="س">س</option>-->
<!--                                                        <option value="ص">ص</option>-->
<!--                                                        <option value="ط">ط</option>-->
<!--                                                        <option value="ع">ع</option>-->
<!--                                                        <option value="ق">ق</option>-->
<!--                                                        <option value="ك">ك</option>-->
<!--                                                        <option value="ل">ل</option>-->
<!--                                                        <option value="م">م</option>-->
<!--                                                        <option value="ن">ن</option>-->
<!--                                                        <option value="ه">ه</option>-->
<!--                                                        <option value="و">و</option>-->
<!--                                                        <option value="ي">ي</option>-->
<!--                                                    </select>-->

<!--                                                </div>-->

<!--                                            </div>-->

<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="row">-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="veh_type">Vehicle Type</label>-->
<!--                                        <select id="veh_type" v-model="addData.vehicle.vehicle_type" class="form-select mb-0"-->
<!--                                                aria-label="">-->
<!--                                            <option value="car">Car</option>-->
<!--                                            <option value="van">Van</option>-->
<!--                                            <option value="bus">Bus</option>-->
<!--                                            <option value="truck">Truck</option>-->
<!--                                            <option value="trailer">Trailer</option>-->
<!--                                            <option value="pick up">Pick up</option>-->
<!--                                            <option value="motorcycle">Motorcycle</option>-->
<!--                                            <option value="winch">Winch</option>-->
<!--                                        </select>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="phone">Manufacture Company</label>-->
<!--                                        <select v-model="addData.vehicle.manufacture_company" class="form-select mb-0"-->
<!--                                                aria-label="">-->
<!--                                            <option value="انفنيتي">انفنيتي</option>-->
<!--                                            <option value="اوبل">اوبل</option>-->
<!--                                            <option value="اودي">اودي</option>-->
<!--                                            <option value="ايسوزو">ايسوزو</option>-->
<!--                                            <option value="بورش">بورش</option>-->
<!--                                            <option value="بي ام دبليو">بي ام دبليو</option>-->
<!--                                            <option value="بيجو">بيجو</option>-->
<!--                                            <option value="تشيري">تشيري</option>-->
<!--                                            <option value="تويوتا">تويوتا</option>-->
<!--                                            <option value="جاكوار">جاكوار</option>-->
<!--                                            <option value="جي ام سي">جي ام سي</option>-->
<!--                                            <option value="جيب">جيب</option>-->
<!--                                            <option value="جيلي">جيلي</option>-->
<!--                                            <option value="دايو">دايو</option>-->
<!--                                            <option value="دودج">دودج</option>-->
<!--                                            <option value="ديهاتسو">ديهاتسو</option>-->
<!--                                            <option value="رينو">رينو</option>-->
<!--                                            <option value="سانج يونج">سانج يونج</option>-->
<!--                                            <option value="سوزوكي">سوزوكي</option>-->
<!--                                            <option value="سيتروين">سيتروين</option>-->
<!--                                            <option value="شيفروليه">شيفروليه</option>-->
<!--                                            <option value="فورد">فورد</option>-->
<!--                                            <option value="فولفو">فولفو</option>-->
<!--                                            <option value="فولكس واجن">فولكس واجن</option>-->
<!--                                            <option value="كاديلاك">كاديلاك</option>-->
<!--                                            <option value="كرايزلر">كرايزلر</option>-->
<!--                                            <option value="كيا">كيا</option>-->
<!--                                            <option value="لاند روفر">لاند روفر</option>-->
<!--                                            <option value="لكزس">لكزس</option>-->
<!--                                            <option value="لنكولن">لنكولن</option>-->
<!--                                            <option value="مازدا">مازدا</option>-->
<!--                                            <option value="مان">مان</option>-->
<!--                                            <option value="مرسيدس">مرسيدس</option>-->
<!--                                            <option value="ميتسوبيشي">ميتسوبيشي</option>-->
<!--                                            <option value="ميركوري">ميركوري</option>-->
<!--                                            <option value="نيسان">نيسان</option>-->
<!--                                            <option value="همر">همر</option>-->
<!--                                            <option value="هوندا">هوندا</option>-->
<!--                                            <option value="هونداي">هونداي</option>-->
<!--                                        </select>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->


<!--                            <div class="row">-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="model">Model</label>-->
<!--                                        <select v-model="addData.vehicle.vehicle_model" id="model"-->
<!--                                                class="form-select mb-0" aria-label="">-->
<!--                                            <option value="H1">H1</option>-->
<!--                                            <option value="H2">H2</option>-->
<!--                                            <option value="H3">H3</option>-->

<!--                                        </select>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="manufacturing_year">Manufacturing year</label>-->
<!--                                        <select v-model="addData.vehicle.manufacturing_year" id="manufacturing_year"-->
<!--                                                class="form-select mb-0" aria-label="">-->
<!--                                            <option v-for="year in years" :value="year">{{ year }}</option>-->

<!--                                        </select>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->


<!--                            <div class="row">-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="city">Vehicle color</label>-->
<!--                                        <select v-model="addData.vehicle.vehicle_color" class="form-select mb-0"-->
<!--                                                aria-label="">-->
<!--                                            <option value="ابيض">ابيض</option>-->
<!--                                            <option value="احمر">احمر</option>-->
<!--                                            <option value="اخضر">اخضر</option>-->
<!--                                            <option value="ازرق">ازرق</option>-->
<!--                                            <option value="اسود">اسود</option>-->
<!--                                            <option value="اصفر">اصفر</option>-->
<!--                                            <option value="برتقالي">برتقالي</option>-->
<!--                                            <option value="بنفسجي">بنفسجي</option>-->
<!--                                            <option value="بني">بني</option>-->
<!--                                            <option value="بيج">بيج</option>-->
<!--                                            <option value="ذهبي">ذهبي</option>-->
<!--                                            <option value="رمادي">رمادي</option>-->
<!--                                            <option value="فضي">فضي</option>-->
<!--                                            <option value="لؤلؤي">لؤلؤي</option>-->
<!--                                        </select>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <label for="state">Current counter's readers</label>-->
<!--                                    <input v-model="addData.vehicle.current_counter_reader" class="form-control"-->
<!--                                           type="text" placeholder="">-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="row">-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label>Fuel type</label>-->
<!--                                        <select v-model="addData.vehicle.fuel_type" class="form-select mb-0"-->
<!--                                                aria-label="">-->
<!--                                            <option value="بنزين 91">بنزين 91</option>-->
<!--                                            <option value="بنزين 95">بنزين 95</option>-->
<!--                                            <option value="ديزل">ديزل</option>-->
<!--                                        </select>-->
<!--                                    </div>-->
<!--                                </div>-->

<!--                                <div class="col-md-6 mb-3">-->

<!--                                    <label for="fuel_cost">Fuel cost</label>-->
<!--                                    <input v-model="addData.vehicle.fuel_cost" id="fuel_cost" class="form-control"-->
<!--                                           type="number" placeholder="00.00">-->

<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="row">-->

<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="fuel_cons_liters">Fuel consumption in liters / km</label>-->
<!--                                        <input class="form-control" v-model="addData.vehicle.fuel_cons_liters"-->
<!--                                               id="fuel_cons_liters" type="number" placeholder="00.00">-->
<!--                                    </div>-->
<!--                                </div>-->

<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="tank_capacity">Tank capacity</label>-->
<!--                                        <input v-model="addData.vehicle.tank_capacity" id="tank_capacity"-->
<!--                                               class="form-control" type="number" placeholder="00.00">-->
<!--                                    </div>-->
<!--                                </div>-->

<!--                            </div>-->
<!--                            <div class="row">-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="type_licence">Plate type <span class="required">*</span></label>-->
<!--                                        <select v-model="addData.vehicle.plate_type" id="type_licence"-->
<!--                                                class="form-select mb-0" aria-label="">-->
<!--                                            <option value="8">تصدير</option>-->
<!--                                            <option value="9">دبلوماسي</option>-->
<!--                                            <option value="11">مؤقت</option>-->
<!--                                            <option value="2">رخصة سير نقل عام</option>-->
<!--                                            <option value="3">رخصة سير نقل خاص</option>-->
<!--                                            <option value="7">رخصة سير مركبة أشغال عامة</option>-->
<!--                                            <option value="6">رخصة سير سيارة أجرة</option>-->
<!--                                            <option value="10">رخصة سير دراجة الية</option>-->
<!--                                            <option value="1">رخصة سير خاصة</option>-->
<!--                                            <option value="5">رخصة سير حافلة صغيرة خاصة</option>-->
<!--                                            <option value="4">رخصة سير حافلة صغيرة عامة</option>-->

<!--                                        </select>-->
<!--                                    </div>-->
<!--                                </div>-->


<!--                                <div class="col-sm-6 mb-3">-->
<!--                                    <label for="insurance_type">Insurance type</label>-->
<!--                                    <select v-model="addData.vehicle.insurance_type" id="insurance_type"-->
<!--                                            class="form-select mb-0" aria-label="">-->
<!--                                        <option value="Comprehensive">Comprehensive</option>-->
<!--                                        <option value="Third party">Third party</option>-->
<!--                                    </select>-->
<!--                                </div>-->
<!--                            </div>-->


<!--                            <div class="row">-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <label for="sim_number">SIM number</label>-->
<!--                                    <div> {{ addData.simCard.sim_card }}</div>-->
<!--                                </div>-->

<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <label for="telecom">Telecom Company</label>-->
<!--                                    <div>{{ addData.simCard.telecom_company }}</div>-->
<!--                                </div>-->

<!--                            </div>-->

<!--                            <div class="row">-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <label for="state">Tracking ID / IMEI code</label>-->
<!--                                    <div>{{ addData.device.imei }}</div>-->
<!--                                </div>-->

<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <label for="gender">Branch</label>-->
<!--                                    <div>{{ addData.device.device_branch }}</div>-->
<!--                                </div>-->

<!--                            </div>-->


<!--                            <div class="row">-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <label for="state">Device model</label>-->

<!--                                    <div>{{ addData.device.device_model }}</div>-->
<!--                                </div>-->

<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <label for="state">Facility Name</label>-->
<!--                                    <div>{{ addData.company.full_name_ar }}</div>-->
<!--                                </div>-->

<!--                            </div>-->


<!--                            <div class="row">-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div>-->
<!--                                        <label for="vehicle_serial_number">Vehicle Serial Number <span class="required">*</span></label>-->
<!--                                        <the-mask mask="#########" class="form-control" id="vehicle_serial_number"-->
<!--                                                  v-model="addData.vehicle.vehicle_serial_number" type="text"-->
<!--                                                  placeholder="123456789"></the-mask>-->
<!--                                    </div>-->
<!--                                </div>-->

<!--                            </div>-->
<!--                            <div class="row align-items-center">-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <label> Date Expiration library form </label>-->
<!--                                    <input v-model="addData.vehicle.date_exp_library_form" class="form-control"-->
<!--                                           type="date" placeholder="">-->
<!--                                </div>-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <label for="history_periodic_exam">History of the periodic examination</label>-->
<!--                                    <input id="history_periodic_exam" v-model="addData.vehicle.history_periodic_exam"-->
<!--                                           class="form-control" type="date" placeholder="">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="row">-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="structure_no">Structure No</label>-->
<!--                                        <input v-model="addData.vehicle.structure_no" id="structure_no"-->
<!--                                               class="form-control" type="text" placeholder="">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="engine_serial_number">Engine serial number</label>-->
<!--                                        <input id="engine_serial_number" v-model="addData.vehicle.engine_serial_number"-->
<!--                                               class="form-control" type="text" placeholder="">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            &lt;!&ndash;***************************************************************&ndash;&gt;-->

<!--                            <div class="row">-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="supplier">Supplier</label>-->
<!--                                        <input v-model="addData.vehicle.supplier" id="supplier" class="form-control"-->
<!--                                               type="text" placeholder="">-->


<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="purshase_date">Date of purchase</label>-->
<!--                                        <input v-model="addData.vehicle.purchase_date" id="purshase_date"-->
<!--                                               class="form-control" type="date" placeholder="">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->


<!--                            <div class="row">-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="insurance_company">Insurance company</label>-->
<!--                                        <input id="insurance_company" class="form-control"-->
<!--                                               v-model="addData.vehicle.insurance_company" type="text" placeholder="">-->

<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <label for="insurance_number">Insurance number</label>-->
<!--                                    <input id="insurance_number" class="form-control"-->
<!--                                           v-model="addData.vehicle.insurance_number" type="text" placeholder="">-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="row">-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="start_insurance_date">Start insurance date </label>-->
<!--                                        <input id="start_insurance_date" v-model="addData.vehicle.start_insurance_date"-->
<!--                                               class="form-control" type="date" placeholder="">-->
<!--                                    </div>-->
<!--                                </div>-->

<!--                                <div class="col-md-6 mb-3">-->

<!--                                    <label for="insur_end_date">Insurance end date</label>-->
<!--                                    <input id="insur_end_date" class="form-control"-->
<!--                                           v-model="addData.vehicle.end_insurance_date" type="date">-->

<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="row">-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div>-->
<!--                                        <label for="storage_box">Storage box capacity</label>-->
<!--                                        <input id="storage_box" class="form-control"-->
<!--                                               v-model="addData.vehicle.storage_box_capacity" type="number"-->
<!--                                               placeholder="">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div>-->
<!--                                        <label for="doors_no">Number of doors</label>-->
<!--                                        <input id="doors_no" v-model="addData.vehicle.number_doors" class="form-control"-->
<!--                                               type="number" placeholder="">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="row align-items-center">-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <label for="seats_no">Number of seats</label>-->
<!--                                    <input id="seats_no" v-model="addData.vehicle.seats_number" class="form-control"-->
<!--                                           type="number" placeholder="">-->
<!--                                </div>-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <label for="motion_vector">Motion vector</label>-->
<!--                                    &lt;!&ndash;                       TODO check about this field&ndash;&gt;-->
<!--                                    <select v-model="addData.vehicle.motion_vector" class="form-select mb-0"-->
<!--                                            id="motion_vector" aria-label="Gender select example">-->
<!--                                        <option value="1">A</option>-->
<!--                                        <option value="2">B</option>-->
<!--                                    </select>-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="row">-->
<!--                                <div class="col-md-6 mb-3">-->
<!--                                    <div class="row">-->
<!--                                        <div class="col-md-6">-->
<!--                                            <label for="gender">Motion vector</label>-->
<!--                                        </div>-->
<!--                                        <div class="col-md-3">-->
<!--                                            <input v-model="addData.vehicle.have_motion_vector" type="radio"-->
<!--                                                   value="yes">-->
<!--                                            <label>Yes</label>-->
<!--                                        </div>-->
<!--                                        <div class="col-md-3">-->
<!--                                            <input v-model="addData.vehicle.have_motion_vector" type="radio" value="no">-->
<!--                                            <label>No</label>-->
<!--                                        </div>-->
<!--                                    </div>-->

<!--                                </div>-->
<!--                            </div>-->


<!--                            <div class="collapse show" id="stepx" tabindex="-1" style="outline: none;">-->
<!--                                <table class="table user-table table-hover">-->

<!--                                    <tbody>-->
<!--                                    <tr class="child-table"-->
<!--                                        style="text-align: center; font-weight: bold; background: #dde9f1;">-->

<!--                                        <th class="border-bottom">Weight In Tons</th>-->
<!--                                        <th class="border-bottom">Reading sensor in volts</th>-->

<!--                                    </tr>-->

<!--                                    </tbody>-->
<!--                                    <tbody>-->


<!--                                    <tr>-->

<!--                                        <td><span class="font-weight-normal">-->
<!--                                        <input type="number" placeholder="00.00">-->
<!--                                      </span></td>-->
<!--                                        <td><span class="font-weight-normal">-->
<!--                                      <input type="number" placeholder="00.00">-->
<!--                                     </span></td>-->

<!--                                    </tr>-->


<!--                                    <tr>-->

<!--                                        <td><span class="font-weight-normal">-->
<!--                                      <input type="number" placeholder="00.00">-->
<!--                                    </span></td>-->
<!--                                        <td><span class="font-weight-normal">-->
<!--                                    <input type="number" placeholder="00.00">-->
<!--                                   </span></td>-->

<!--                                    </tr>-->


<!--                                    <tr>-->

<!--                                        <td><span class="font-weight-normal">-->
<!--                                    <input type="number" placeholder="00.00">-->
<!--                                  </span></td>-->
<!--                                        <td><span class="font-weight-normal">-->
<!--                                  <input type="number" placeholder="00.00">-->
<!--                                 </span></td>-->

<!--                                    </tr>-->


<!--                                    <tr>-->

<!--                                        <td><span class="font-weight-normal">-->
<!--                                  <input type="number" placeholder="00.00">-->
<!--                                </span></td>-->
<!--                                        <td><span class="font-weight-normal">-->
<!--                                <input type="number" placeholder="00.00">-->
<!--                               </span></td>-->

<!--                                    </tr>-->
<!--                                    </tbody>-->
<!--                                </table>-->


<!--                            </div>-->


<!--                        </div>-->

<!--                        <a class=" show-more collapsed"-->
<!--                           style="background: none !important;" data-toggle="collapse" href="#step6"-->
<!--                           role="button" aria-expanded="false" aria-controls="step">-->
<!--                            <h2 class="h5 mb-4 title_user">Step {{ noStep6 }}: Add New Driver</h2>-->
<!--                        </a>-->
<!--                        <div class="collapse" id="step6">-->

<!--                            <div class="card card-body bg-white border-light shadow-sm mb-4">-->

<!--                                <div class="row">-->
<!--                                    <div class="col-md-6 mb-3">-->
<!--                                        <div>-->
<!--                                            <label for="fullname_driver">Driver Full name <span class="required">*</span></label>-->
<!--                                            <input id="fullname_driver" v-model="addData.driver.full_name"-->
<!--                                                   class="form-control" type="text"-->
<!--                                                   placeholder="Enter driver full name">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-6 mb-3">-->
<!--                                        <div>-->
<!--                                            <label for="driver_id_number">Identity number <span-->
<!--                                                class="required">*</span></label>-->
<!--                                            <the-mask mask="##########" id="driver_id_number"-->
<!--                                                      v-model="addData.driver.driver_id_number" class="form-control"-->
<!--                                                      type="text" placeholder="1234567890"></the-mask>-->

<!--                                        </div>-->
<!--                                    </div>-->

<!--                                    <div class="col-md-6 mb-3">-->
<!--                                        <label for="driver_birthday">Birthday Hijri <span-->
<!--                                            class="required">*</span></label>-->
<!--                                        <div class="input-group">-->
<!--                                            <span class="input-group-text"><span-->
<!--                                                class="far fa-calendar-alt"></span></span>-->
<!--                                            <input v-model="addData.driver.driver_birthday" class="form-control"-->
<!--                                                   id="driver_birthday" type="date" placeholder="dd/mm/yyyy">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-6 mb-3">-->
<!--                                        <label for="driver_gender">Gender</label>-->
<!--                                        <select v-model="addData.driver.driver_gender" class="form-select mb-0"-->
<!--                                                id="driver_gender" aria-label="Gender select example">-->
<!--                                            <option value="F">Female</option>-->
<!--                                            <option value="M">Male</option>-->
<!--                                        </select>-->
<!--                                    </div>-->


<!--                                    <div class="col-md-6 mb-3">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="driver_email">Email</label>-->
<!--                                            <input v-model="addData.driver.driver_email" class="form-control"-->
<!--                                                   id="driver_email" type="email" placeholder="name@company.com">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-6 mb-3">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="driver_mobile">Mobile number <span-->
<!--                                                class="required">*</span></label>-->
<!--                                            <the-mask class="form-control" v-model="addData.driver.driver_mobile"-->
<!--                                                      mask="+966#########" id="driver_mobile" type="text"-->
<!--                                                      placeholder="+966#########"></the-mask>-->

<!--                                        </div>-->
<!--                                    </div>-->


<!--                                    <div class="col-md-6 mb-3">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="nationality">Nationality</label>-->
<!--                                            <input v-model="addData.driver.driver_nationality" class="form-control"-->
<!--                                                   id="nationality" type="text">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-6 mb-3">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="lic_type">License Type </label>-->
<!--                                            <select v-model="addData.driver.driver_licence_type" id="lic_type"-->
<!--                                                    class="form-select mb-0" aria-label="">-->
<!--                                                <option value="تصدير">تصدير</option>-->
<!--                                                <option value="دبلوماسي">دبلوماسي</option>-->
<!--                                                <option value="مؤقت">مؤقت</option>-->
<!--                                                <option value="معدات ثقيلة">معدات ثقيلة</option>-->
<!--                                                <option value="رخصة سير نقل عام">رخصة سير نقل عام</option>-->
<!--                                                <option value="رخصة سير نقل خاص">رخصة سير نقل خاص</option>-->
<!--                                                <option value="رخصة سير مركبة أشغال عامة">رخصة سير مركبة أشغال عامة-->
<!--                                                </option>-->
<!--                                                <option value="رخصة سير سيارة أجرة">رخصة سير سيارة أجرة</option>-->
<!--                                                <option value="رخصة سير دراجة الية">رخصة سير دراجة الية</option>-->
<!--                                                <option value="رخصة سير خاصة">رخصة سير خاصة</option>-->
<!--                                                <option value="رخصة سير حافلة صغيرة">رخصة سير حافلة صغيرة</option>-->
<!--                                                <option value="رخصة سير حافلة عامة">رخصة سير حافلة عامة</option>-->

<!--                                            </select>-->

<!--                                        </div>-->
<!--                                    </div>-->


<!--                                    <div class="col-md-6 mb-3">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="date_issuance_lic">Date of issuance license</label>-->
<!--                                            <input v-model="addData.driver.driver_date_issuance" class="form-control"-->
<!--                                                   id="date_issuance_lic" type="date" placeholder="">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-6 mb-3">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="lic_exp_date">License expiration date</label>-->
<!--                                            <input v-model="addData.driver.driver_license_expiration"-->
<!--                                                   class="form-control" id="lic_exp_date" type="date" placeholder="">-->
<!--                                        </div>-->
<!--                                    </div>-->

<!--                                </div>-->


<!--                            </div>-->


<!--                        </div>-->
<!--                    </div>-->


<!--                    <div class="mt-3 mb-3 ">-->
<!--                        <button type="submit" class="btn btn-success">{{$trans('action.save_all')}}</button>-->
<!--                    </div>-->

<!--                </div>-->

<!--                <div class="col-12 col-xl-4">-->
<!--                    <div class="row">-->
<!--                        <div class="col-12 mb-4">-->
<!--                            <div class="card border-light text-center p-0">-->
<!--                                <div class="profile-cover rounded-top"-->
<!--                                     data-background="/assets/img/profile-cover.jpg"></div>-->
<!--                                <div class="card card-body bg-white border-light shadow-sm mb-4 ml-4 mr-4"-->
<!--                                     style="margin-top:-80px;">-->
<!--                                    <h2 class="h5 mb-4">Select profile photo</h2>-->
<!--                                    <div class="d-xl-flex align-items-center">-->

<!--                                        <div class="file-field">-->
<!--                                            <div class="d-flex justify-content-xl-center ml-xl-3 ">-->
<!--                                                <div class="d-flex">-->
<!--                                                <span class="icon icon-md"><span-->
<!--                                                    class="fas fa-paperclip mr-3"></span></span> <input type="file">-->
<!--                                                    <div class="d-md-block text-left">-->
<!--                                                        <div class="font-weight-normal text-dark mb-1">Choose Image-->
<!--                                                        </div>-->
<!--                                                        <div class="text-gray small">JPG, GIF or PNG. Max size of 800K-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->

<!--                                <div class="card-body pb-5">-->
<!--                                    <a class="btn btn-sm btn-primary mr-2" href="#"><span-->
<!--                                        class="fas fa-user-plus mr-1"></span> Update</a>-->
<!--                                    <a class="btn btn-sm btn-secondary" href="#">Add vehicle image</a>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="col-12 mb-4">-->
<!--                            <div class="card border-light text-center p-0">-->
<!--                                <div class="profile-cover rounded-top"-->
<!--                                     data-background="/assets/img/profile-cover.jpg"></div>-->
<!--                                <div class="card card-body bg-white border-light shadow-sm mb-4 ml-4 mr-4"-->
<!--                                     style="margin-top:-80px;">-->
<!--                                    <h2 class="h5 mb-4">Select profile photo</h2>-->
<!--                                    <div class="d-xl-flex align-items-center">-->

<!--                                        <div class="file-field">-->
<!--                                            <div class="d-flex justify-content-xl-center ml-xl-3 ">-->
<!--                                                <div class="d-flex">-->
<!--                                                <span class="icon icon-md"><span-->
<!--                                                    class="fas fa-paperclip mr-3"></span></span> <input type="file">-->
<!--                                                    <div class="d-md-block text-left">-->
<!--                                                        <div class="font-weight-normal text-dark mb-1">Choose Image-->
<!--                                                        </div>-->
<!--                                                        <div class="text-gray small">JPG, GIF or PNG. Max size of 800K-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->

<!--                                <div class="card-body pb-5">-->
<!--                                    <a class="btn btn-sm btn-primary mr-2" href="#"><span-->
<!--                                        class="fas fa-user-plus mr-1"></span> Update</a>-->
<!--                                    <a class="btn btn-sm btn-secondary" href="#">Add vehicle license</a>-->
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
