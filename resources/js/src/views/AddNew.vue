<template>
    <div>
        <loading :active.sync="isLoad"
                 :is-full-page="fullPage"
                 :height="loaderHeight"
                 :width="loaderWidth"
                 :color="loaderColor"
                 :loader="loaderType"
                 :background-color="loaderBgColor"></loading>

        <div class="breadcrumb-holder container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <router-link :to="{name:'home'}">{{$trans('breadcrumb.dashboard')}}</router-link>
                        </li>
                        <li class="breadcrumb-item active">{{$trans('menu.add_new')}}</li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 right">
                </div>
            </div>
        </div>

        <section class="add-new container px-5">
            <div class="row ">
                <div class="col-12">
                    <div class="card card-body bg-white border-light shadow-sm mb-4">
                        <a class=" show-more collapsed"
                           style="background: none !important;" data-toggle="collapse" href="#step1"
                           role="button" aria-expanded="false" aria-controls="step">
                            <h2 class="h5 mb-4 title_user">{{$trans('steps.step1')}}</h2>
                        </a>
                        <div class="collapse" id="step1">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div>
                                        <label for="fullname">{{$trans('add_form.full_name')}} <span class="required">*</span></label>
                                        <input class="form-control" v-model="newData.user.fullname" id="fullname"
                                               type="text"
                                               :placeholder="$trans('add_form.full_name_plh')">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div>
                                        <label for="account_type">{{$trans('add_form.account_type')}} <span class="required">*</span></label>
                                        <select class="form-control form-select mb-0" @change="changeSteps"
                                                v-model="newData.user.account_type" id="account_type"
                                                aria-label="Gender select example">
                                            <option value="1">{{$trans('main.company')}}</option>
                                            <option value="2">{{$trans('main.customer')}}</option>
                                            <option value="3">{{$trans('main.partner')}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="email">{{$trans('add_form.email')}} <span class="required">*</span></label>
                                        <input class="form-control" id="email" v-model="newData.user.email" type="email"
                                               placeholder="name@example.com"
                                        >
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="phone">{{$trans('add_form.phone')}} <span class="required">*</span></label>
                                        <the-mask class="form-control" id="phone" v-model="newData.user.phone"
                                                  mask="+966#########" value="" type="text"
                                                  placeholder="+966#########"></the-mask>


                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center">
                                <div class="col-md-6 mb-3">
                                    <label>{{$trans('add_form.birthday_hijri')}} <span  v-if="newData.user.wassel" class="required">*</span></label>
                                    <div class="input-group">
                                        <date-picker
                                            v-model="newData.user.birthday"
                                            :locale="'en'" :calendar="'hijri'"
                                            :format="'iYYYY-iMM-iDD'"
                                            :color="'#000000'"
                                            :inputClass="'form-control datepicker-input'"
                                            :display-format="'iDD/iMM/iYYYY'"

                                        ></date-picker>

                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="gender">{{$trans('add_form.gender')}}</label>
                                    <select class="form-control form-select mb-0" id="gender" v-model="newData.user.user_gender"
                                            aria-label="Gender select example">
                                        <option value="M">{{$trans('main.male')}}</option>
                                        <option value="F">{{$trans('main.female')}}</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-9 mb-3">
                                    <div class="form-group">
                                        <label for="address">{{$trans('add_form.address')}}</label>
                                        <input class="form-control" id="address" v-model="newData.user.address"
                                               type="text"
                                               :placeholder="$trans('add_form.address_plh')">
                                    </div>
                                </div>
                                <div class="col-sm-3 mb-3">
                                    <div class="form-group">
                                        <label for="number">{{$trans('add_form.number')}}</label>
                                        <input class="form-control" id="number" v-model="newData.user.addressNo"
                                               type="number" :placeholder="$trans('add_form.number_plh')">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 mb-3">
                                    <div class="form-group">
                                        <label for="city">{{$trans('add_form.city')}}</label>
                                        <input class="form-control" id="city" v-model="newData.user.city" type="text"
                                               :placeholder="$trans('add_form.city_plh')">
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <label for="state">{{$trans('add_form.state')}}</label>
                                    <input class="form-control" id="state" v-model="newData.user.state" type="text"
                                           :placeholder="$trans('add_form.state')">
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="zip">{{$trans('add_form.zip')}}</label>
                                        <the-mask mask="#####" v-model="newData.user.zipCode"  class="form-control" id="zip" type="text"
                                                  placeholder="11111"></the-mask>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div>
                                        <label for="map_layer">{{$trans('add_form.map')}}</label>
                                        <input class="form-control" id="map_layer" v-model="newData.user.maplayer"
                                               type="text" :placeholder="$trans('add_form.map')"
                                        >
                                    </div>
                                </div>

                                <div class="col-sm-4 mb-3">
                                    <div class="form-group">
                                        <label for="longitude">{{$trans('add_form.long')}}</label>
                                        <input class="form-control" id="longitude" v-model="newData.user.long"
                                               type="text" :placeholder="$trans('add_form.long')"
                                        >
                                    </div>
                                </div>

                                <div class="col-sm-4 mb-3">
                                    <div class="form-group">
                                        <label for="latitude">{{$trans('add_form.lat')}}</label>
                                        <input class="form-control" id="latitude" v-model="newData.user.lat" type="text"
                                               :placeholder="$trans('add_form.lat')">
                                    </div>
                                </div>

                                <div class="col-sm-4 mb-3">
                                    <div class="form-group">
                                        <label for="Approximation">{{$trans('add_form.approx')}}</label>
                                        <input class="form-control" v-model="newData.user.approximation"
                                               id="Approximation" type="number" placeholder="12"
                                        >
                                    </div>
                                </div>


                                <div class="col-sm-6 mb-3">
                                    <label for="coordinate_formula">{{$trans('add_form.coord_format')}}</label>
                                    <select v-model="newData.user.coordinate_format" class="form-control form-select w-100 mb-0"
                                            id="coordinate_formula"
                                            aria-label="State select example">
                                        <option value="dd">{{$trans('add_form.dd')}}</option>
                                        <option value="ddm">{{$trans('add_form.ddm')}}</option>
                                        <option value="dms">{{$trans('add_form.dms')}}</option>

                                    </select>
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label for="pol">{{$trans('add_form.pol')}}</label>
                                    <input class="form-control" v-model="newData.user.pol" id="pol" type="text"
                                           placeholder="">

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-check dashboard-check">
                                        <input v-model="newData.user.twelveHour" class="form-check-input"
                                               type="checkbox" value="" id="12hours">
                                        <label class="form-check-label" for="12hours">
                                            <label for="12hours">{{$trans('add_form.12h')}}</label>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-check dashboard-check">
                                        <input v-model="newData.user.isDisabled" class="form-check-input"
                                               type="checkbox" value="" id="disabled">
                                        <label class="form-check-label" for="disabled">
                                            <label for="disabled">{{$trans('add_form.disabled')}}</label>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-check dashboard-check">
                                        <input v-model="newData.user.isAdmin" class="form-check-input" type="checkbox"
                                               value="0" id="admin">
                                        <label class="form-check-label" for="admin">
                                            <label for="admin">{{$trans('add_form.disabled')}}</label>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-check dashboard-check">
                                        <input v-model="newData.user.deviceReadOnly" class="form-check-input"
                                               type="checkbox" value="" id="device_readonly">
                                        <label class="form-check-label" for="device_readonly">
                                            <label for="device_readonly">{{$trans('add_form.device_read_only')}}</label>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-check dashboard-check">
                                        <input v-model="newData.user.readOnly" class="form-check-input" type="checkbox"
                                               value="" id="realonly">
                                        <label class="form-check-label" for="realonly">
                                            <label for="realonly">{{$trans('add_form.read_only')}}</label>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-check dashboard-check">
                                        <input v-model="newData.user.wassel" class="form-check-input" type="checkbox"
                                               id="wassel">
                                        <label class="form-check-label" for="wassel">
                                            <label for="wassel">{{$trans('add_form.wassel')}}</label>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-check dashboard-check">
                                        <input v-model="newData.user.limitCommands" class="form-check-input"
                                               type="checkbox" value="" id="limit_command">
                                        <label class="form-check-label" for="limit_command">
                                            <label for="limit_command">{{$trans('add_form.limit_cmd')}}</label>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center">
                                <div class="col-md-6 mb-3">
                                    <label >{{$trans('add_form.start_date')}}</label>
                                    <date-picker
                                        v-model="newData.user.start_date"
                                        :locale="'en'" :calendar="'gregory'"
                                        :format="'YYYY-MM-DD'"
                                        :color="'#000000'"
                                        :inputClass="'form-control datepicker-input'"
                                        :display-format="'DD/MM/YYYY'"
                                    ></date-picker>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label >{{$trans('add_form.exp_date')}}</label>
                                    <date-picker
                                        v-model="newData.user.expiry_date"
                                        :locale="'en'" :calendar="'gregory'"
                                        :format="'YYYY-MM-DD'"
                                        :color="'#000000'"
                                        :inputClass="'form-control datepicker-input'"
                                        :display-format="'DD/MM/YYYY'"
                                    ></date-picker>
                                </div>

                            </div>

                            <div class="row align-items-center">

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="max_users">{{$trans('add_form.max_users')}}</label>
                                        <input v-model="newData.user.max_users" class="form-control" id="max_users"
                                               type="number" placeholder="0">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label >{{$trans('add_form.max_devices')}}</label>
                                        <input v-model="newData.user.max_devices" class="form-control"
                                               id="max_device" type="number" placeholder="0">
                                    </div>
                                </div>



                                <div class="col-md-6 mb-3" v-if="newData.user.account_type === '2'">
                                    <div class="form-group">
                                        <label for="id_number_i"> {{$trans('add_form.id_number')}}
                                            <span class="required">*</span></label>
                                        <the-mask mask="##########" v-model="newData.user.ident_number" type="text"
                                                  class="form-control" id="id_number_i"
                                                  placeholder="100#######"></the-mask>
                                    </div>
                                </div>
                            </div>

                            <div class="row" v-for="(attr, index ) in newData.user.properties">
                                <div class="col-sm-6 mb-3">
                                    <label for="proprety"> {{$trans('add_form.property_name')}}</label>
                                    <select v-model="attr.name" class="form-control form-select w-100 mb-0" id="proprety"
                                            aria-label="State select example">

                                        <option value="mail.smtp.host">{{ $trans('attr.attributeMailSmtpHost') }}
                                        </option>
                                        <option value="mail.smtp.port">{{ $trans('attr.attributeMailSmtpPort') }}
                                        </option>
                                        <option value="mail.smtp.starttls.enable">
                                            {{ $trans('attr.attributeMailSmtpStarttlsEnable') }}
                                        </option>
                                        <option value="mail.smtp.starttls.required">
                                            {{ $trans('attr.attributeMailSmtpStarttlsRequired') }}
                                        </option>
                                        <option value="mail.smtp.ssl.enable">
                                            {{ $trans('attr.attributeMailSmtpSslEnable') }}
                                        </option>
                                        <option value="mail.smtp.ssl.trust">
                                            {{ $trans('attr.attributeMailSmtpSslTrust') }}
                                        </option>
                                        <option value="mail.smtp.ssl.protocols">
                                            {{ $trans('attr.attributeMailSmtpSslProtocols') }}
                                        </option>
                                        <option value="mail.smtp.from">{{ $trans('attr.attributeMailSmtpFrom') }}
                                        </option>
                                        <option value="mail.smtp.auth">{{ $trans('attr.attributeMailSmtpAuth') }}
                                        </option>
                                        <option value="mail.smtp.username">
                                            {{ $trans('attr.attributeMailSmtpUsername') }}
                                        </option>
                                        <option value="mail.smtp.password">
                                            {{ $trans('attr.attributeMailSmtpPassword') }}
                                        </option>
                                        <option value="web.liveRouteLength">
                                            {{ $trans('attr.attributeWebLiveRouteLength') }}
                                        </option>
                                        <option value="web.selectZoom">{{ $trans('attr.attributeWebSelectZoom') }}
                                        </option>
                                        <option value="web.maxZoom">{{ $trans('attr.attributeWebMaxZoom') }}</option>
                                        <option value="ui.disableReport">{{ $trans('attr.attributeUiDisableReport') }}
                                        </option>
                                        <option value="ui.disableEvents">{{ $trans('attr.attributeUiDisableEvents') }}
                                        </option>
                                        <option value="ui.disableVehicleFetures">
                                            {{ $trans('attr.attributeUiDisableVehicleFetures') }}
                                        </option>
                                        <option value="ui.disableDrivers">
                                            {{ $trans('attr.attributeUiDisableDrivers') }}
                                        </option>
                                        <option value="ui.disableComputedAttributes">
                                            {{ $trans('attr.attributeUiDisableComputedAttributes') }}
                                        </option>
                                        <option value="ui.disableCalendars">
                                            {{ $trans('attr.attributeUiDisableCalendars') }}
                                        </option>
                                        <option value="ui.disableMaintenance">
                                            {{ $trans('attr.attributeUiDisableMaintenance') }}
                                        </option>
                                        <option value="ui.hidePositionAttributes">
                                            {{ $trans('attr.attributeUiHidePositionAttributes') }}
                                        </option>
                                        <option value="distanceUnit">{{ $trans('attr.settingsDistanceUnit') }}</option>
                                        <option value="speedUnit">{{ $trans('attr.settingsSpeedUnit') }}</option>
                                        <option value="volumeUnit">{{ $trans('attr.settingsVolumeUnit') }}</option>
                                        <option value="timezone">{{ $trans('attr.sharedTimezone') }}</option>
                                        <option value="notificationTokens">{{
                                            $trans('attr.attributeNotificationTokens')
                                            }}
                                        </option>

                                    </select>
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label for="proprety_val">{{$trans('add_form.property_value')}}</label>
                                    <input v-model="attr.value" class="form-control" id="proprety_val" type="text">

                                </div>


                            </div>


                            <a @click="addElement(newData.user.properties)" class="clickable" >
                                <span data-brackets-id="25270" class="fas fa-plus mr-2"></span>{{$trans('add_form.more')}}
                            </a>
                        </div>

                        <a class=" show-more collapsed"
                           v-if="step2"
                           style="background: none !important;" data-toggle="collapse" href="#step2"
                           role="button" aria-expanded="false" aria-controls="step">
                            <h2 class="h5 mb-4 title_user">{{$trans('steps.step2')}}</h2>
                        </a>

                        <div class="collapse" id="step2">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div>
                                        <label for="number_at_ministry">{{$trans('add_form.num_min_int')}} <span
                                            class="required">*</span></label>
                                        <input v-model="newData.company.num_at_ministry" class="form-control"
                                               id="number_at_ministry" type="number">
                                    </div>
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label >{{$trans('add_form.comm_reg_date')}} <span v-if="newData.user.account_type !== '2'" class="required">*</span></label>
                                    <div class="input-group">
                                        <date-picker
                                            v-model="newData.company.commercial_register_date_issuance"
                                            :locale="'en'" :calendar="'gregory'"
                                            :format="'YYYY-MM-DD'"
                                            :color="'#000000'"
                                            :inputClass="'form-control datepicker-input'"
                                            :display-format="'DD/MM/YYYY'"
                                        ></date-picker>

                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="comm_reg_no">{{$trans('add_form.comm_reg_num')}}</label>
                                        <input class="form-control" v-model="newData.company.commercial_reg_number"
                                               id="comm_reg_no" type="text">
                                    </div>
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label >{{$trans('add_form.comm_reg_exp_date')}}</label>
                                    <div class="input-group">
                                        <date-picker
                                            v-model="newData.company.commercial_reg_expiry_date"
                                            :locale="'en'" :calendar="'gregory'"
                                            :format="'YYYY-MM-DD'"
                                            :color="'#000000'"
                                            :inputClass="'form-control datepicker-input'"
                                            :display-format="'DD/MM/YYYY'"
                                        ></date-picker>

                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div>
                                        <label for="full_name_ar">{{$trans('add_form.comp_name_ar')}}</label>
                                        <input v-model="newData.company.full_name_ar" class="form-control"
                                               id="full_name_ar" type="text">
                                    </div>
                                </div>


                                <div class="col-md-6 mb-3">
                                    <div>
                                        <label for="full_name_en">{{$trans('add_form.comp_name_en')}}</label>
                                        <input v-model="newData.company.full_name_en" class="form-control"
                                               id="full_name_en" type="text">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div>
                                        <label for="short_name_ar">{{$trans('add_form.comp_shortname_ar')}}</label>
                                        <input v-model="newData.company.short_name_ar" class="form-control"
                                               id="short_name_ar" type="text">
                                    </div>
                                </div>


                                <div class="col-md-6 mb-3">
                                    <div>
                                        <label for="short_name_en">{{$trans('add_form.comp_shortname_en')}}</label>
                                        <input v-model="newData.company.short_name_en" class="form-control"
                                               id="short_name_en" type="text">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <div class="form-group">
                                        <label for="address_company">{{$trans('add_form.address')}}</label>
                                        <input class="form-control" v-model="newData.company.address"
                                               id="address_company" type="text">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="company_city">{{$trans('add_form.city')}}</label>
                                        <input class="form-control" v-model="newData.company.city" id="company_city"
                                               type="text">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="zip_code">{{$trans('add_form.postcode')}}</label>
                                        <the-mask v-model="newData.company.zipCode" class="form-control"
                                                  id="zip_code" mask="#####" value="" type="text"
                                                  placeholder="11111"></the-mask>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="phone_number">{{$trans('add_form.phone_number')}} <span v-if="newData.user.account_type !== '2'" class="required">*</span></label>
                                        <the-mask class="form-control" v-model="newData.company.phone"
                                                  id="phone_number" mask="+966#########" value="" type="text"
                                                  placeholder="+966#########"></the-mask>

                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="fax">{{$trans('add_form.fax_number')}}</label>
                                        <the-mask class="form-control" v-model="newData.company.fax" id="fax"
                                                  mask="+966#########" value="" type="text"
                                                  placeholder="+966#########"></the-mask>
                                    </div>
                                </div>


                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="website">{{$trans('add_form.comp_website')}}</label>
                                        <input class="form-control" v-model="newData.company.website" id="website"
                                               type="text">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="pro_email">{{$trans('add_form.comp_email')}}<span v-if="newData.user.account_type !== '2'" class="required">*</span></label>
                                        <input class="form-control" v-model="newData.company.email" id="pro_email"
                                               type="email">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="id_number"> {{$trans('add_form.id_number')}} <span
                                            class="required">*</span></label>
                                        <the-mask mask="##########" v-model="newData.company.ident_number"
                                                  type="text" class="form-control" id="id_number"
                                                  placeholder="700#######"></the-mask>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="manager_name">{{$trans('add_form.manager_name')}} <span v-if="newData.user.account_type !== '2'" class="required">*</span></label>
                                        <input class="form-control" v-model="newData.company.manager_name"
                                               id="manager_name" type="text">
                                    </div>
                                </div>


                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="mobile">{{$trans('add_form.manager_mobile')}}<span v-if="newData.user.account_type !== '2'" class="required">*</span></label>
                                        <the-mask class="form-control" v-model="newData.company.manager_mobile"
                                                  mask="+966#########" id="mobile" type="text"
                                                  placeholder="+966#########"></the-mask>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="manager_phone">{{$trans('add_form.manager_phone')}} <span v-if="newData.user.account_type !== '2'" class="required">*</span></label>
                                        <the-mask class="form-control" v-model="newData.company.manager_phone"
                                                  mask="+966#########" id="manager_phone" type="text"
                                                  placeholder="+966#########"></the-mask>
                                    </div>
                                </div>


                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="email_manager">{{$trans('add_form.manager_email')}}</label>
                                        <input class="form-control" id="email_manager"
                                               v-model="newData.company.manager_email" type="email">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check dashboard-check">
                                        <input class="form-check-input"
                                               v-model="newData.company.veh_rental_management_service"
                                               type="checkbox" value="" id="veh_rental_management_service">
                                        <label class="form-check-label" for="veh_rental_management_service">
                                            <label for="veh_rental_management_service">{{$trans('add_form.veh_rent_manag_service')}}</label>
                                        </label>
                                    </div>
                                </div>

                                <!--------***--------->
                                <div class="col-md-12">
                                    <div class="form-check dashboard-check">
                                        <input class="form-check-input" type="checkbox"
                                               v-model="newData.company.veh_maintenance_service"
                                               id="veh_maintenance_service">
                                        <label class="form-check-label" for="veh_maintenance_service">
                                            <label for="veh_maintenance_service">{{$trans('add_form.veh_maint_op_services')}}</label>
                                        </label>
                                    </div>
                                </div>

                                <!--------***--------->

                                <div class="col-md-12">
                                    <div class="form-check dashboard-check">
                                        <input class="form-check-input" type="checkbox"
                                               v-model="newData.company.veh_tracking_service"
                                               id="veh_tracking_service">
                                        <label class="form-check-label" for="veh_tracking_service">
                                            <label for="veh_tracking_service">
                                                {{$trans('add_form.veh_track_op_maint')}}
                                            </label>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <a class=" show-more collapsed"
                           v-if="step3"
                           style="background: none !important;" data-toggle="collapse" href="#step3"
                           role="button" aria-expanded="false" aria-controls="step">
                            <h2 class="h5 mb-4 title_user ">{{ $trans('steps.step') }} {{ noStep3 }}: {{$trans('device.add_device')}}</h2>
                        </a>

                        <div class="collapse" id="step3">
                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="device_name">{{$trans('device.device_name')}}<span class="required">*</span></label>
                                        <input v-model="newData.device.device_name" class="form-control"
                                               id="device_name" type="text">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="imei">{{$trans('device.device_id')}}<span class="required">*</span></label>
                                        <input v-model="newData.device.imei" class="form-control" id="imei"
                                               type="text">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="sim">{{$trans('add_form.related_sim_card')}} <span class="required">*</span></label>
                                        <select id="sim" v-model="newData.simCard.sim_card" class="form-control form-select w-100 mb-0"
                                                aria-label="">
                                            <option v-for="sim in simCards" :value="sim.iccid">{{sim.iccid}}</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div>
                                        <label>{{$trans('cars.plate_number')}} <span class="required">*</span></label>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <the-mask class="form-control"  v-model="plateNumber.fournumbers" mask="####" type="text"
                                                          placeholder="1111"></the-mask>

                                            </div>
                                            <div class="col-md-8">
                                                <div class="row">

                                                    <select v-model="plateNumber.rightLetter" class="form-select form-control minius"
                                                            aria-label="">
                                                        <option value="أ">أ</option>
                                                        <option value="ب">ب</option>
                                                        <option value="ح">ح</option>
                                                        <option value="د">د</option>
                                                        <option value="ر">ر</option>
                                                        <option value="س">س</option>
                                                        <option value="ص">ص</option>
                                                        <option value="ط">ط</option>
                                                        <option value="ع">ع</option>
                                                        <option value="ق">ق</option>
                                                        <option value="ك">ك</option>
                                                        <option value="ل">ل</option>
                                                        <option value="م">م</option>
                                                        <option value="ن">ن</option>
                                                        <option value="ه">ه</option>
                                                        <option value="و">و</option>
                                                        <option value="ي">ي</option>
                                                    </select>

                                                    <select v-model="plateNumber.middleLetter" class="form-control form-select minius"
                                                            aria-label="">
                                                        <option value="أ">أ</option>
                                                        <option value="ب">ب</option>
                                                        <option value="ح">ح</option>
                                                        <option value="د">د</option>
                                                        <option value="ر">ر</option>
                                                        <option value="س">س</option>
                                                        <option value="ص">ص</option>
                                                        <option value="ط">ط</option>
                                                        <option value="ع">ع</option>
                                                        <option value="ق">ق</option>
                                                        <option value="ك">ك</option>
                                                        <option value="ل">ل</option>
                                                        <option value="م">م</option>
                                                        <option value="ن">ن</option>
                                                        <option value="ه">ه</option>
                                                        <option value="و">و</option>
                                                        <option value="ي">ي</option>
                                                    </select>

                                                    <select v-model="plateNumber.leftLetter" class="form-control form-select minius"
                                                            aria-label="">
                                                        <option value="أ">أ</option>
                                                        <option value="ب">ب</option>
                                                        <option value="ح">ح</option>
                                                        <option value="د">د</option>
                                                        <option value="ر">ر</option>
                                                        <option value="س">س</option>
                                                        <option value="ص">ص</option>
                                                        <option value="ط">ط</option>
                                                        <option value="ع">ع</option>
                                                        <option value="ق">ق</option>
                                                        <option value="ك">ك</option>
                                                        <option value="ل">ل</option>
                                                        <option value="م">م</option>
                                                        <option value="ن">ن</option>
                                                        <option value="ه">ه</option>
                                                        <option value="و">و</option>
                                                        <option value="ي">ي</option>
                                                    </select>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="branch">{{$trans('device.branch_city')}}</label>
                                    <input v-model="newData.device.device_branch" class="form-control" id="branch"
                                           type="text">
                                </div>


                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="dev_model">{{$trans('device.device_model')}}</label>
                                        <input v-model="newData.device.device_model" class="form-control"
                                               id="dev_model" type="text">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="protocol">{{ $trans('commands.dev_protocol') }}</label>
                                        <input v-model="newData.device.device_protocol" class="form-control"
                                               id="protocol" type="text">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="d-flex flex-column">

                                        <div class="d-flex flex-column">
                                            <label for="device_cat">{{$trans('add_form.device_category')}}</label>
                                            <select @change="changeVehicleType('D')" v-model="newData.device.device_category" id="device_cat"
                                                    class="form-control form-select mb-0">
                                                <option value="car">{{ $trans('add_form.cat_car') }}</option>
                                                <option value="van">{{ $trans('add_form.cat_van') }}</option>
                                                <option value="bus">{{ $trans('add_form.cat_bus') }}</option>
                                                <option value="truck">{{ $trans('add_form.cat_truck') }}</option>
                                                <option value="trailer">{{ $trans('add_form.cat_trailer') }}</option>
                                                <option value="pick up">{{ $trans('add_form.cat_pickup') }}</option>
                                                <option value="motorcycle">{{ $trans('add_form.cat_motorcycle') }}</option>
                                                <option value="winch">{{ $trans('add_form.cat_winch') }}</option>

                                            </select>
                                        </div>


                                    </div>


                                </div>






                            </div>

                            <div class="row" v-for="(attr, index ) in newData.device.attributes">
                                <div class="col-sm-6 mb-3">
                                    <label for="attr_name2">{{ $trans('add_form.property_name') }}</label>
                                    <select v-model="attr.name" class="form-select form-control w-100 mb-0" id="attr_name2"
                                            aria-label="State select example">
                                        <option value="web.reportColor">
                                            {{ $trans('attr.attributeWebReportColor') }}
                                        </option>
                                        <option value="devicePassword">
                                            {{ $trans('attr.attributeDevicePassword') }}
                                        </option>
                                        <option value="processing.copyAttributes">
                                            {{ $trans('attr.attributeProcessingCopyAttributes') }}
                                        </option>
                                        <option value="decoder.timezone">{{ $trans('attr.sharedTimezone') }}
                                        </option>
                                        <option value="deviceInactivityStart">
                                            {{ $trans('attr.attributeDeviceInactivityStart') }}
                                        </option>
                                        <option value="deviceInactivityPeriod">
                                            {{ $trans('attr.attributeDeviceInactivityPeriod') }}
                                        </option>
                                        <option value="speedLimit">{{ $trans('attr.attributeSpeedLimit') }}</option>
                                        <option value="report.ignoreOdometer">
                                            {{ $trans('attr.attributeReportIgnoreOdometer') }}
                                        </option>

                                    </select>
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label for="attr_val">{{ $trans('add_form.property_value') }}</label>
                                    <input v-model="attr.value" class="form-control" id="attr_val" type="text">

                                </div>
                            </div>

                            <a @click="addElement(newData.device.attributes)" class="clickable" >
                                <span data-brackets-id="25270" class="fas fa-plus mr-2"></span>{{$trans('add_form.more')}}
                            </a>


                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <button v-if="userAdded" type="submit" @click="openStep4()" class="btn btn-success">{{$trans('steps.next_step')}}</button>
                                </div>
                            </div>



                        </div>

                        <a class=" show-more collapsed"
                           v-if="step4"
                           style="background: none !important;" data-toggle="collapse" href="#step4"
                           role="button" aria-expanded="false" aria-controls="step">
                            <h2 class="h5 mb-4 title_user">{{ $trans('steps.step') }} {{ noStep4 }}: {{$trans('add_form.add_new_vehicle')}}</h2>
                        </a>

                        <div class="collapse" id="step4">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div>
                                        <label for="veh_code">{{$trans('add_form.vehicle_code')}}</label>
                                        <input v-model="newData.vehicle.vehicle_code" class="form-control" id="veh_code"
                                               type="text" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div>
                                        <label>Plate Number <span class="required">*</span></label>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <the-mask class="form-control"  v-model="plateNumber.fournumbers" mask="####" type="text"
                                                          placeholder="1111"></the-mask>

                                            </div>
                                            <div class="col-md-8">
                                                <div class="row">

                                                    <select v-model="plateNumber.rightLetter" class="form-select form-control minius"
                                                            aria-label="">
                                                        <option value="أ">أ</option>
                                                        <option value="ب">ب</option>
                                                        <option value="ح">ح</option>
                                                        <option value="د">د</option>
                                                        <option value="ر">ر</option>
                                                        <option value="س">س</option>
                                                        <option value="ص">ص</option>
                                                        <option value="ط">ط</option>
                                                        <option value="ع">ع</option>
                                                        <option value="ق">ق</option>
                                                        <option value="ك">ك</option>
                                                        <option value="ل">ل</option>
                                                        <option value="م">م</option>
                                                        <option value="ن">ن</option>
                                                        <option value="ه">ه</option>
                                                        <option value="و">و</option>
                                                        <option value="ي">ي</option>
                                                    </select>

                                                    <select v-model="plateNumber.middleLetter" class="form-control form-select minius"
                                                            aria-label="">
                                                        <option value="أ">أ</option>
                                                        <option value="ب">ب</option>
                                                        <option value="ح">ح</option>
                                                        <option value="د">د</option>
                                                        <option value="ر">ر</option>
                                                        <option value="س">س</option>
                                                        <option value="ص">ص</option>
                                                        <option value="ط">ط</option>
                                                        <option value="ع">ع</option>
                                                        <option value="ق">ق</option>
                                                        <option value="ك">ك</option>
                                                        <option value="ل">ل</option>
                                                        <option value="م">م</option>
                                                        <option value="ن">ن</option>
                                                        <option value="ه">ه</option>
                                                        <option value="و">و</option>
                                                        <option value="ي">ي</option>
                                                    </select>

                                                    <select v-model="plateNumber.leftLetter" class="form-control form-select minius"
                                                            aria-label="">
                                                        <option value="أ">أ</option>
                                                        <option value="ب">ب</option>
                                                        <option value="ح">ح</option>
                                                        <option value="د">د</option>
                                                        <option value="ر">ر</option>
                                                        <option value="س">س</option>
                                                        <option value="ص">ص</option>
                                                        <option value="ط">ط</option>
                                                        <option value="ع">ع</option>
                                                        <option value="ق">ق</option>
                                                        <option value="ك">ك</option>
                                                        <option value="ل">ل</option>
                                                        <option value="م">م</option>
                                                        <option value="ن">ن</option>
                                                        <option value="ه">ه</option>
                                                        <option value="و">و</option>
                                                        <option value="ي">ي</option>
                                                    </select>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div>
                                        <label for="vehicle_serial_number">{{$trans('add_form.vehicle_serial_number')}}
                                            <span class="required" v-if="newData.user.wassel">*</span></label>
                                        <the-mask mask="#########" class="form-control" id="vehicle_serial_number"
                                                  v-model="newData.vehicle.vehicle_serial_number" type="text"
                                                  placeholder="123456789"></the-mask>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="type_licence">{{$trans('add_form.plate_type')}} <span class="required">*</span></label>
                                        <select v-model="newData.vehicle.plate_type" id="type_licence"
                                                class="form-control form-select mb-0" aria-label="">
                                            <option value="8">{{$trans('add_form.pt_export')}}</option>
                                            <option value="9">{{$trans('add_form.pt_diplomat')}}</option>
                                            <option value="11">مؤقت</option>
                                            <option value="2">رخصة سير نقل عام</option>
                                            <option value="3">رخصة سير نقل خاص</option>
                                            <option value="7">رخصة سير مركبة أشغال عامة</option>
                                            <option value="6">رخصة سير سيارة أجرة</option>
                                            <option value="10">رخصة سير دراجة الية</option>
                                            <option value="1">رخصة سير خاصة</option>
                                            <option value="5">رخصة سير حافلة صغيرة خاصة</option>
                                            <option value="4">رخصة سير حافلة صغيرة عامة</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="d-flex flex-column">

                                        <div class="d-flex flex-column">
                                            <label for="vehicle_type">{{$trans('add_form.vehicle_type')}}</label>
                                            <select @change="changeVehicleType('V')" v-model="newData.vehicle.vehicle_type" id="vehicle_type"
                                                    class="form-control form-select mb-0">
                                                <option value="car">{{ $trans('add_form.cat_car') }}</option>
                                                <option value="van">{{ $trans('add_form.cat_van') }}</option>
                                                <option value="bus">{{ $trans('add_form.cat_bus') }}</option>
                                                <option value="truck">{{ $trans('add_form.cat_truck') }}</option>
                                                <option value="trailer">{{ $trans('add_form.cat_trailer') }}</option>
                                                <option value="pick up">{{ $trans('add_form.cat_pickup') }}</option>
                                                <option value="motorcycle">{{ $trans('add_form.cat_motorcycle') }}</option>
                                                <option value="winch">{{ $trans('add_form.cat_winch') }}</option>

                                            </select>
                                        </div>


                                    </div>


                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="d-flex flex-column">

                                        <div class="d-flex flex-column">
                                            <label for="manuf_company">{{$trans('add_form.manuf_company')}}</label>
                                            <select v-model="newData.vehicle.manufacture_company" id="manuf_company" class="form-control form-select mb-0"
                                                    aria-label="">
                                                <option value="انفنيتي">{{$trans('add_form.car_infiniti')}}</option>
                                                <option value="اوبل">{{$trans('add_form.car_opel')}}</option>
                                                <option value="اودي">{{$trans('add_form.car_audi')}}</option>
                                                <option value="ايسوزو">{{$trans('add_form.car_isuzu')}}</option>
                                                <option value="بورش">{{$trans('add_form.car_porsche')}}</option>
                                                <option value="بي ام دبليو">{{$trans('add_form.car_bmw')}}</option>
                                                <option value="بيجو">{{$trans('add_form.car_peugeot')}}</option>
                                                <option value="تشيري">{{$trans('add_form.car_chery')}}</option>
                                                <option value="تويوتا">{{$trans('add_form.car_toyota')}}</option>
                                                <option value="جاكوار">{{$trans('add_form.car_jaguar')}}</option>
                                                <option value="جي ام سي">{{$trans('add_form.car_gmc')}}</option>
                                                <option value="جيب">جيب</option>
                                                <option value="جيلي">جيلي</option>
                                                <option value="دايو">دايو</option>
                                                <option value="دودج">دودج</option>
                                                <option value="ديهاتسو">ديهاتسو</option>
                                                <option value="رينو">رينو</option>
                                                <option value="سانج يونج">سانج يونج</option>
                                                <option value="سوزوكي">سوزوكي</option>
                                                <option value="سيتروين">سيتروين</option>
                                                <option value="شيفروليه">شيفروليه</option>
                                                <option value="فورد">فورد</option>
                                                <option value="فولفو">فولفو</option>
                                                <option value="فولكس واجن">فولكس واجن</option>
                                                <option value="كاديلاك">كاديلاك</option>
                                                <option value="كرايزلر">كرايزلر</option>
                                                <option value="كيا">كيا</option>
                                                <option value="لاند روفر">لاند روفر</option>
                                                <option value="لكزس">لكزس</option>
                                                <option value="لنكولن">لنكولن</option>
                                                <option value="مازدا">مازدا</option>
                                                <option value="مان">مان</option>
                                                <option value="مرسيدس">مرسيدس</option>
                                                <option value="ميتسوبيشي">ميتسوبيشي</option>
                                                <option value="ميركوري">ميركوري</option>
                                                <option value="نيسان">نيسان</option>
                                                <option value="همر">همر</option>
                                                <option value="هوندا">هوندا</option>
                                                <option value="هونداي">هونداي</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="manufacturing_year">{{$trans('add_form.manuf_year')}}</label>
                                        <select v-model="newData.vehicle.manufacturing_year" id="manufacturing_year"
                                                class="form-control form-select mb-0" aria-label="">
                                            <option v-for="year in years" :value="year">{{ year }}</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="city">{{$trans('add_form.vehicle_color')}}</label>
                                        <select v-model="newData.vehicle.vehicle_color" class="form-control form-select mb-0"
                                                aria-label="">
                                            <option value="ابيض">{{$trans('add_form.color_white')}}</option>
                                            <option value="احمر">احمر</option>
                                            <option value="اخضر">اخضر</option>
                                            <option value="ازرق">ازرق</option>
                                            <option value="اسود">اسود</option>
                                            <option value="اصفر">اصفر</option>
                                            <option value="برتقالي">برتقالي</option>
                                            <option value="بنفسجي">بنفسجي</option>
                                            <option value="بني">بني</option>
                                            <option value="بيج">بيج</option>
                                            <option value="ذهبي">ذهبي</option>
                                            <option value="رمادي">رمادي</option>
                                            <option value="فضي">فضي</option>
                                            <option value="لؤلؤي">لؤلؤي</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="state">{{$trans('add_form.curr_counter_reader')}}</label>
                                    <input v-model="newData.vehicle.current_counter_reader" class="form-control"
                                           type="text" placeholder="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label>{{$trans('add_form.fuel_type')}}</label>
                                        <select v-model="newData.vehicle.fuel_type" class="form-control form-select mb-0"
                                                aria-label="">
                                            <option value="بنزين 91">{{$trans('add_form.gazoil91')}}</option>
                                            <option value="بنزين 95">{{$trans('add_form.gazoil95')}}</option>
                                            <option value="ديزل">{{$trans('add_form.diesel')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label> Date Expiration library form </label>
                                    <date-picker
                                        v-model="newData.vehicle.date_exp_library_form"
                                        :locale="'en'" :calendar="'gregory'"
                                        :format="'YYYY-MM-DD'"
                                        :color="'#000000'"
                                        :inputClass="'form-control datepicker-input'"
                                        :display-format="'DD/MM/YYYY'"
                                    ></date-picker>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label >{{$trans('add_form.history_examination')}}</label>
                                    <date-picker
                                        v-model="newData.vehicle.history_periodic_exam"
                                        :locale="'en'" :calendar="'gregory'"
                                        :format="'YYYY-MM-DD'"
                                        :color="'#000000'"
                                        :inputClass="'form-control datepicker-input'"
                                        :display-format="'DD/MM/YYYY'"
                                    ></date-picker>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="structure_no">{{$trans('add_form.structure_no')}}</label>
                                        <input v-model="newData.vehicle.structure_no" id="structure_no"
                                               class="form-control" type="text" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="engine_serial_number">{{$trans('add_form.engine_serial_no')}}</label>
                                        <input id="engine_serial_number" v-model="newData.vehicle.engine_serial_number"
                                               class="form-control" type="text" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="supplier">{{$trans('add_form.supplier')}}</label>
                                        <input v-model="newData.vehicle.supplier" id="supplier" class="form-control"
                                               type="text" placeholder="">


                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label>{{$trans('add_form.date_purchase')}}</label>
                                        <date-picker
                                            v-model="newData.vehicle.purchase_date"
                                            :locale="'en'" :calendar="'gregory'"
                                            :format="'YYYY-MM-DD'"
                                            :color="'#000000'"
                                            :inputClass="'form-control datepicker-input'"
                                            :display-format="'DD/MM/YYYY'"
                                        ></date-picker>


                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="insurance_company">{{$trans('add_form.insurance_company')}}</label>
                                        <input id="insurance_company" class="form-control"
                                               v-model="newData.vehicle.insurance_company" type="text" placeholder="">

                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="insurance_number">{{$trans('add_form.insurance_number')}}</label>
                                    <input id="insurance_number" class="form-control"
                                           v-model="newData.vehicle.insurance_number" type="text" placeholder="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label>{{$trans('add_form.insurance_start')}}</label>
                                        <date-picker
                                            v-model="newData.vehicle.start_insurance_date"
                                            :locale="'en'" :calendar="'gregory'"
                                            :format="'YYYY-MM-DD'"
                                            :color="'#000000'"
                                            :inputClass="'form-control datepicker-input'"
                                            :display-format="'DD/MM/YYYY'"
                                        ></date-picker>

                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">

                                    <label >{{$trans('add_form.insurance_end')}}</label>
                                    <date-picker
                                        v-model="newData.vehicle.end_insurance_date"
                                        :locale="'en'" :calendar="'gregory'"
                                        :format="'YYYY-MM-DD'"
                                        :color="'#000000'"
                                        :inputClass="'form-control datepicker-input'"
                                        :display-format="'DD/MM/YYYY'"
                                    ></date-picker>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <div>
                                        <label for="storage_box">{{$trans('add_form.storage_box')}}</label>
                                        <input id="storage_box" class="form-control"
                                               v-model="newData.vehicle.storage_box_capacity" type="number"
                                               placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div>
                                        <label for="doors_no">{{$trans('add_form.nb_doors')}}</label>
                                        <input id="doors_no" v-model="newData.vehicle.number_doors" class="form-control"
                                               type="number" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="seats_no">{{$trans('add_form.nb_seats')}}</label>
                                    <input id="seats_no" v-model="newData.vehicle.seats_number" class="form-control"
                                           type="number" placeholder="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="gender">{{$trans('add_form.motion_vector')}}</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input v-model="newData.vehicle.have_motion_vector" type="radio"
                                                   value="yes">
                                            <label>Yes</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input v-model="newData.vehicle.have_motion_vector" type="radio" value="no">
                                            <label>No</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="collapse show" id="stepx" tabindex="-1" style="outline: none;">
                                <table class="table user-table table-hover">

                                    <tbody>
                                    <tr class="child-table"
                                        style="text-align: center; font-weight: bold; background: #dde9f1;">

                                        <th class="border-bottom">{{$trans('add_form.weight_tons')}}</th>
                                        <th class="border-bottom">{{$trans('add_form.sensor_volt')}}</th>

                                    </tr>

                                    </tbody>
                                    <tbody>


                                    <tr>

                                        <td><span class="font-weight-normal">
                                        <input type="number" placeholder="00.00">
                                      </span></td>
                                        <td><span class="font-weight-normal">
                                      <input type="number" placeholder="00.00">
                                     </span></td>

                                    </tr>


                                    <tr>

                                        <td><span class="font-weight-normal">
                                      <input type="number" placeholder="00.00">
                                    </span></td>
                                        <td><span class="font-weight-normal">
                                    <input type="number" placeholder="00.00">
                                   </span></td>

                                    </tr>


                                    <tr>

                                        <td><span class="font-weight-normal">
                                    <input type="number" placeholder="00.00">
                                  </span></td>
                                        <td><span class="font-weight-normal">
                                  <input type="number" placeholder="00.00">
                                 </span></td>

                                    </tr>


                                    <tr>

                                        <td><span class="font-weight-normal">
                                  <input type="number" placeholder="00.00">
                                </span></td>
                                        <td><span class="font-weight-normal">
                                <input type="number" placeholder="00.00">
                               </span></td>

                                    </tr>
                                    </tbody>
                                </table>


                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <button v-if="userAdded" type="submit" @click="openStep5()" class="btn btn-success">{{$trans('steps.next_step')}}</button>
                                </div>
                            </div>

                        </div>

                        <a class=" show-more collapsed"
                           v-if="step5"
                           style="background: none !important;" data-toggle="collapse" href="#step5"
                           role="button" aria-expanded="false" aria-controls="step">
                            <h2 class="h5 mb-4 title_user">{{ $trans('steps.step') }} {{ noStep5 }}: {{$trans('add_form.add_new_driver')}}</h2>
                        </a>

                        <div class="collapse" id="step5">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div>
                                        <label for="fullname_driver">{{ $trans('add_form.driver_name') }}
                                            <span v-if="newData.user.wassel" class="required">*</span></label>
                                        <input id="fullname_driver" v-model="newData.driver.full_name"
                                               class="form-control" type="text"
                                               placeholder="Enter driver full name">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div>
                                        <label for="driver_id_number">{{ $trans('add_form.driver_id') }} <span
                                            v-if="newData.user.wassel" class="required">*</span></label>
                                        <the-mask mask="##########" id="driver_id_number"
                                                  v-model="newData.driver.driver_id_number" class="form-control"
                                                  type="text" placeholder="1234567890"></the-mask>

                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="driver_mobile">{{ $trans('add_form.driver_mobile') }} <span
                                            v-if="newData.user.wassel" class="required">*</span></label>
                                        <the-mask class="form-control" v-model="newData.driver.driver_mobile"
                                                  mask="+966#########" id="driver_mobile" type="text"
                                                  placeholder="+966#########"></the-mask>

                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label >{{ $trans('add_form.driver_birthday') }} <span
                                        v-if="newData.user.wassel" class="required">*</span></label>
                                    <div class="input-group">
                                        <date-picker
                                            v-model="newData.driver.driver_birthday"
                                            :locale="'en'" :calendar="'hijri'"
                                            :format="'iYYYY-iMM-iDD'"
                                            :color="'#000000'"
                                            :inputClass="'form-control datepicker-input'"
                                            :display-format="'iDD/iMM/iYYYY'"

                                        ></date-picker>

                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="driver_gender">{{ $trans('add_form.driver_gender') }}</label>
                                    <select v-model="newData.driver.driver_gender" class="form-control form-select mb-0"
                                            id="driver_gender" aria-label="Gender select example">
                                        <option value="M">{{$trans('main.male')}}</option>
                                        <option value="F">{{$trans('main.female')}}</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="driver_email">{{ $trans('add_form.email') }}</label>
                                        <input v-model="newData.driver.driver_email" class="form-control"
                                               id="driver_email" type="email" placeholder="name@company.com">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="nationality">{{ $trans('add_form.driver_nationality') }}</label>
                                        <input v-model="newData.driver.driver_nationality" class="form-control"
                                               id="nationality" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="lic_type">{{ $trans('add_form.driver_lic_type') }} </label>
                                        <select v-model="newData.driver.driver_licence_type" id="lic_type"
                                                class="form-control form-select mb-0" aria-label="">
                                            <option value="تصدير">تصدير</option>
                                            <option value="دبلوماسي">دبلوماسي</option>
                                            <option value="مؤقت">مؤقت</option>
                                            <option value="معدات ثقيلة">معدات ثقيلة</option>
                                            <option value="رخصة سير نقل عام">رخصة سير نقل عام</option>
                                            <option value="رخصة سير نقل خاص">رخصة سير نقل خاص</option>
                                            <option value="رخصة سير مركبة أشغال عامة">رخصة سير مركبة أشغال عامة
                                            </option>
                                            <option value="رخصة سير سيارة أجرة">رخصة سير سيارة أجرة</option>
                                            <option value="رخصة سير دراجة الية">رخصة سير دراجة الية</option>
                                            <option value="رخصة سير خاصة">رخصة سير خاصة</option>
                                            <option value="رخصة سير حافلة صغيرة">رخصة سير حافلة صغيرة</option>
                                            <option value="رخصة سير حافلة عامة">رخصة سير حافلة عامة</option>

                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label >{{ $trans('add_form.driver_date_lic') }}</label>
                                        <date-picker
                                            v-model="newData.driver.driver_date_issuance"
                                            :locale="'en'" :calendar="'gregory'"
                                            :format="'YYYY-MM-DD'"
                                            :color="'#000000'"
                                            :inputClass="'form-control datepicker-input'"
                                            :display-format="'DD/MM/YYYY'"
                                        ></date-picker>

                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label >{{ $trans('add_form.driver_exp_lic') }}</label>
                                        <date-picker
                                            v-model="newData.driver.driver_license_expiration"
                                            :locale="'en'" :calendar="'gregory'"
                                            :format="'YYYY-MM-DD'"
                                            :color="'#000000'"
                                            :inputClass="'form-control datepicker-input'"
                                            :display-format="'DD/MM/YYYY'"
                                        ></date-picker>

                                    </div>
                                </div>


                            </div>
                        </div>


                    </div>



                    <div class="mt-3 mb-3 text-center">
                        <button v-if="step5" type="submit" @click="addNewDevice" class="btn btn-success">{{$trans('action.save_device')}}</button>
                        <button v-if="userAdded" type="submit" @click="openStep3()" class="btn btn-success">{{$trans('device.add_device')}}</button>
                        <button v-if="!userAdded" type="submit" @click="addNew" class="btn btn-success">{{$trans('action.save_user')}}</button>
                    </div>

<!--TODO Redirect to list page-->

                </div>
            </div>

        </section>
    </div>
</template>
<script>
import {TheMask} from 'vue-the-mask'
import VueDatetimeJs from 'vue-datetime-js'

export default {
    components: {TheMask,VueDatetimeJs},
    data() {
        return {
            userAdded:false,
            newData: {
                userId:null,
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
                    }],
                    start_date:null,


                },
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
            step2: false,
            step3: false,
            step4: false,
            step5: false,
            noStep3: 3,
            noStep4: 4,
            noStep5: 5,


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
        await this.getServerInfo();
        await this.getGroupsList();
        await this.getCommands();
        await this.getSimCards();
        this.currentDate();
    },
    methods: {

        openStep3(){
            this.step3 = true;
        },
        openStep4(){
            this.step4 = true;
        },
        openStep5(){
            this.step5 = true;
        },

        async getServerInfo() {
            this.isLoad = true;
            await axios.get('/server', {
                headers: this.tokenHeader
            })
                .then(({data}) => {
                    this.isLoad = false;
                    this.newData.user.approximation = data.data.zoom;
                    this.newData.user.twelveHour = data.data.twelveHourFormat;
                    this.newData.user.readOnly = data.data.readonly;
                    this.newData.user.pol = data.data.poiLayer;
                    this.newData.user.lat = data.data.latitude;
                    this.newData.user.long = data.data.longitude;
                    this.newData.user.deviceReadOnly = data.data.deviceReadonly;
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
            await axios.get('/simcards/all/1', {
                headers: this.tokenHeader
            }).then(({data}) => {
                this.isLoad = false;
                this.simCards = data.data;


            }).catch(({errors}) => {
                this.isLoad = false;
            });

        },
        async addNew() {
            let lang = localStorage.getItem('lang');
            this.newData.vehicle.plate_number = this.plateNumber.fournumbers+" "+this.plateNumber.leftLetter+" "+this.plateNumber.middleLetter+" "+this.plateNumber.rightLetter;
            this.isLoad = true;
            await axios.post('/new/registration', this.newData, {
                headers: this.tokenHeader
            })
                .then(({data}) => {
                    this.isLoad = false;
                    if (data.success === true) {
                        this.user = {}
                        this.company = {}
                        this.device = {}
                        this.driver = {}
                        this.simCard = {}
                        this.driver = {}
                        this.vehicle = {}
                        this.newData.userId = data.userId;

                        this.userAdded = true;
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

        async addNewDevice() {
            let lang = localStorage.getItem('lang');
            this.newData.vehicle.plate_number = this.plateNumber.fournumbers+" "+this.plateNumber.leftLetter+" "+this.plateNumber.middleLetter+" "+this.plateNumber.rightLetter;
            this.isLoad = true;

            await axios.post('/new/device', this.newData, {
                headers: this.tokenHeader
            })
                .then(({data}) => {
                    this.isLoad = false;
                    if (data.success === true) {
                        this.user = {}
                        this.company = {}
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

        changeSteps() {
            if (this.newData.user.account_type === "2") {
                this.step2 = false;
                if (this.noStep3 === 3) {
                    this.noStep3 -= 1;
                    this.noStep4 -= 1;
                    this.noStep5 -= 1;
                }

            } else {
                this.step2 = true;
                if (this.noStep3 === 2) {
                    this.noStep3 += 1;
                    this.noStep4 += 1;
                    this.noStep5 += 1;
                }

            }

        },
        addElement(obj) {
            obj.push({
                name: null,
                value: null
            })
        },
        changeVehicleType(i){
            if(i === 'D') {
                this.newData.vehicle.vehicle_type = this.newData.device.device_category;
            }else{
                this.newData.device.device_category = this.newData.vehicle.vehicle_type;
            }

        },
        currentDate(){
            const current = new Date();
            const date = `${current.getFullYear()}-${current.getMonth()+1}-${current.getDate()}`;
            this.newData.user.start_date =date
        }
//  TODO ADD mobily account when create user
    }
}
</script>
<style>
.required {
    color: red
}
.vpd-input-group input{
    border-right: 1px solid #dadada !important;
}

.vpd-month-label{
    width: 120px !important;
}

.vpd-day-text{
    color: grey !important;
}

.minius {
    width: 31% !important;
}
</style>
