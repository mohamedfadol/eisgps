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
                            <router-link :to="{name:'home'}">{{ $trans('breadcrumb.dashboard') }}</router-link>
                        </li>
                        <li class="breadcrumb-item ">
                            <router-link :to="{name:'facilities-list'}">{{ $trans('menu.facilities-list') }}</router-link>
                        </li>
                        <li class="breadcrumb-item active">{{ $trans('facility.edit_facility') }}</li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 right">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div>
                        <label for="number_at_ministry">{{$trans('add_form.num_min_int')}} <span
                            class="required">*</span></label>
                        <input v-model="company.num_at_ministry" class="form-control"
                               id="number_at_ministry" type="number">
                    </div>
                </div>


                <div class="col-md-6 mb-3">
                    <label >{{$trans('add_form.comm_reg_date')}} <span  class="required">*</span></label>
                    <div class="input-group">
                        <date-picker
                            v-model="company.commercial_register_date_issuance"
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
                        <input class="form-control" v-model="company.commercial_reg_number"
                               id="comm_reg_no" type="text">
                    </div>
                </div>


                <div class="col-md-6 mb-3">
                    <label >{{$trans('add_form.comm_reg_exp_date')}}</label>
                    <div class="input-group">
                        <date-picker
                            v-model="company.commercial_reg_expiry_date"
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
                        <input v-model="company.full_name_ar" class="form-control"
                               id="full_name_ar" type="text">
                    </div>
                </div>


                <div class="col-md-6 mb-3">
                    <div>
                        <label for="full_name_en">{{$trans('add_form.comp_name_en')}}</label>
                        <input v-model="company.full_name_en" class="form-control"
                               id="full_name_en" type="text">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div>
                        <label for="short_name_ar">{{$trans('add_form.comp_shortname_ar')}}</label>
                        <input v-model="company.short_name_ar" class="form-control"
                               id="short_name_ar" type="text">
                    </div>
                </div>


                <div class="col-md-6 mb-3">
                    <div>
                        <label for="short_name_en">{{$trans('add_form.comp_shortname_en')}}</label>
                        <input v-model="company.short_name_en" class="form-control"
                               id="short_name_en" type="text">
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-6 ">
                    <div class="form-group">
                        <label for="address_company">{{$trans('add_form.address')}}</label>
                        <input class="form-control" v-model="company.address"
                               id="address_company" type="text">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="company_city">{{$trans('add_form.city')}}</label>
                        <input class="form-control" v-model="company.city" id="company_city"
                               type="text">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="zip_code">{{$trans('add_form.postcode')}}</label>
                        <the-mask v-model="company.zipCode" class="form-control"
                                  id="zip_code" mask="#####" value="" type="text"
                                  placeholder="11111"></the-mask>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="phone_number">{{$trans('add_form.phone_number')}} <span class="required">*</span></label>
                        <the-mask class="form-control" v-model="company.phone"
                                  id="phone_number" mask="+966#########" value="" type="text"
                                  placeholder="+966#########"></the-mask>

                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="fax">{{$trans('add_form.fax_number')}}</label>
                        <the-mask class="form-control" v-model="company.fax" id="fax"
                                  mask="+966#########" value="" type="text"
                                  placeholder="+966#########"></the-mask>
                    </div>
                </div>


                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="website">{{$trans('add_form.comp_website')}}</label>
                        <input class="form-control" v-model="company.website" id="website"
                               type="text">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="pro_email">{{$trans('add_form.comp_email')}}<span  class="required">*</span></label>
                        <input class="form-control" v-model="company.email" id="pro_email"
                               type="email">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="id_number"> {{$trans('add_form.id_number')}} <span
                            class="required">*</span></label>
                        <the-mask mask="##########" v-model="company.ident_number"
                                  type="text" class="form-control" id="id_number"
                                  placeholder="700#######"></the-mask>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="manager_name">{{$trans('add_form.manager_name')}} <span  class="required">*</span></label>
                        <input class="form-control" v-model="company.manager_name"
                               id="manager_name" type="text">
                    </div>
                </div>


                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="mobile">{{$trans('add_form.manager_mobile')}}<span  class="required">*</span></label>
                        <the-mask class="form-control" v-model="company.manager_mobile"
                                  mask="+966#########" id="mobile" type="text"
                                  placeholder="+966#########"></the-mask>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="manager_phone">{{$trans('add_form.manager_phone')}} <span  class="required">*</span></label>
                        <the-mask class="form-control" v-model="company.manager_phone"
                                  mask="+966#########" id="manager_phone" type="text"
                                  placeholder="+966#########"></the-mask>
                    </div>
                </div>


                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="email_manager">{{$trans('add_form.manager_email')}}</label>
                        <input class="form-control" id="email_manager"
                               v-model="company.manager_email" type="email">
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-check dashboard-check">
                        <input class="form-check-input"
                               v-model="company.veh_rental_management_service"
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
                               v-model="company.veh_maintenance_service"
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
                               v-model="company.veh_tracking_service"
                               id="veh_tracking_service">
                        <label class="form-check-label" for="veh_tracking_service">
                            <label for="veh_tracking_service">
                                {{$trans('add_form.veh_track_op_maint')}}
                            </label>
                        </label>
                    </div>
                </div>



            </div>

            <div class="row">

                <div class="col-12 text-center">
                    <div class="mt-3 mb-3 ">
                        <button type="submit" @click="updateCompany" class="btn btn-success">{{$trans('action.save')}}</button>
                    </div>
                </div>

            </div>
        </div>

<!--        <div class="card card-body border-light shadow-sm table-wrapper table-responsive">-->

<!--                <form  @submit.prevent="updateCompany">-->
<!--                    <div class="row">-->
<!--                        <div class="col-md-6 mb-3">-->
<!--                            <div>-->
<!--                                <label for="number_at_ministry">The number at the Ministry of Interior <span-->
<!--                                    class="required">*</span></label>-->
<!--                                <input v-model="company.num_at_ministry" class="form-control"-->
<!--                                       id="number_at_ministry" type="number">-->
<!--                            </div>-->
<!--                        </div>-->


<!--                        <div class="col-md-6 mb-3">-->
<!--                            <label for="issuance_date">Commercial register date issuance <span  class="required">*</span></label>-->
<!--                            <div class="input-group">-->
<!--                                <span class="input-group-text"><span class="far fa-calendar-alt"></span></span>-->
<!--                                <input v-model="company.commercial_register_date_issuance"-->
<!--                                       class="form-control datepicker-input" id="issuance_date"-->
<!--                                       type="date" placeholder="dd/mm/yyyy">-->
<!--                            </div>-->
<!--                        </div>-->


<!--                        <div class="col-md-6 mb-3">-->
<!--                            <div class="form-group">-->
<!--                                <label for="comm_reg_no">Commercial Registration No</label>-->
<!--                                <input class="form-control" v-model="company.commercial_reg_number"-->
<!--                                       id="comm_reg_no" type="text">-->
<!--                            </div>-->
<!--                        </div>-->


<!--                        <div class="col-md-6 mb-3">-->
<!--                            <label for="exp_date_comm_reg">Commercial register expiry date</label>-->
<!--                            <div class="input-group">-->
<!--                                <span class="input-group-text"><span class="far fa-calendar-alt"></span></span>-->
<!--                                <input v-model="company.commercial_reg_expiry_date"-->
<!--                                       class="form-control datepicker-input" id="exp_date_comm_reg"-->
<!--                                       type="date" placeholder="dd/mm/yyyy">-->
<!--                            </div>-->
<!--                        </div>-->


<!--                        <div class="col-md-6 mb-3">-->
<!--                            <div>-->
<!--                                <label for="full_name_ar">Company Full name [Arabic]</label>-->
<!--                                <input v-model="company.full_name_ar" class="form-control"-->
<!--                                       id="full_name_ar" type="text">-->
<!--                            </div>-->
<!--                        </div>-->


<!--                        <div class="col-md-6 mb-3">-->
<!--                            <div>-->
<!--                                <label for="full_name_en">Company Full name [English]</label>-->
<!--                                <input v-model="company.full_name_en" class="form-control"-->
<!--                                       id="full_name_en" type="text">-->
<!--                            </div>-->
<!--                        </div>-->


<!--                        <div class="col-md-6 mb-3">-->
<!--                            <div>-->
<!--                                <label for="short_name_ar">Company Short name [Arabic]</label>-->
<!--                                <input v-model="company.short_name_ar" class="form-control"-->
<!--                                       id="short_name_ar" type="text">-->
<!--                            </div>-->
<!--                        </div>-->


<!--                        <div class="col-md-6 mb-3">-->
<!--                            <div>-->
<!--                                <label for="short_name_en">Company Short name [English]</label>-->
<!--                                <input v-model="company.short_name_en" class="form-control"-->
<!--                                       id="short_name_en" type="text">-->
<!--                            </div>-->
<!--                        </div>-->


<!--                        &lt;!&ndash;***************************************************************&ndash;&gt;-->


<!--                        <div class="row">-->


<!--                            <div class="col-sm-6 ">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="address_company">Address</label>-->
<!--                                    <input class="form-control" v-model="company.address"-->
<!--                                           id="address_company" type="text">-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="col-md-6 mb-3">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="company_city">City</label>-->
<!--                                    <input class="form-control" v-model="company.city" id="company_city"-->
<!--                                           type="text">-->
<!--                                </div>-->
<!--                            </div>-->


<!--                            <div class="col-md-6 mb-3">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="zip_code">PostCode</label>-->
<!--                                    <the-mask v-model="company.zipCode" class="form-control"-->
<!--                                              id="zip_code" mask="#####" value="" type="text"-->
<!--                                              placeholder="11111"></the-mask>-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="col-md-6 mb-3">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="phone_number">Phone number <span  class="required">*</span></label>-->
<!--                                    <the-mask class="form-control" v-model="company.phone"-->
<!--                                              id="phone_number" mask="+966#########" value="" type="text"-->
<!--                                              placeholder="+966#########"></the-mask>-->

<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="col-md-6 mb-3">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="fax">Fax Number</label>-->
<!--                                    <the-mask class="form-control" v-model="company.fax" id="fax"-->
<!--                                              mask="+966#########" value="" type="text"-->
<!--                                              placeholder="+966#########"></the-mask>-->
<!--                                </div>-->
<!--                            </div>-->


<!--                            <div class="col-md-6 mb-3">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="website">The company's website</label>-->
<!--                                    <input class="form-control" v-model="company.website" id="website"-->
<!--                                           type="text">-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="col-md-6 mb-3">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="pro_email">Company E-mail <span  class="required">*</span></label>-->
<!--                                    <input class="form-control" v-model="company.email" id="pro_email"-->
<!--                                           type="email">-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="col-md-6 mb-3">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="id_number"> Identification Number <span-->
<!--                                        class="required">*</span></label>-->
<!--                                    <the-mask mask="##########" v-model="company.ident_number"-->
<!--                                              type="text" class="form-control" id="id_number"-->
<!--                                              placeholder="700#######"></the-mask>-->
<!--                                </div>-->
<!--                            </div>-->


<!--                        </div>-->


<!--                        <div class="col-md-6 mb-3">-->
<!--                            <div class="form-group">-->
<!--                                <label for="manager_name">Manager Name <span  class="required">*</span></label>-->
<!--                                <input class="form-control" v-model="company.manager_name"-->
<!--                                       id="manager_name" type="text">-->
<!--                            </div>-->
<!--                        </div>-->


<!--                        <div class="col-md-6 mb-3">-->
<!--                            <div class="form-group">-->
<!--                                <label for="mobile">Manager Mobile number <span  class="required">*</span></label>-->
<!--                                <the-mask class="form-control" v-model="company.manager_mobile"-->
<!--                                          mask="+966#########" id="mobile" type="text"-->
<!--                                          placeholder="+966#########"></the-mask>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="col-md-6 mb-3">-->
<!--                            <div class="form-group">-->
<!--                                <label for="manager_phone">Manager phone number <span  class="required">*</span></label>-->
<!--                                <the-mask class="form-control" v-model="company.manager_phone"-->
<!--                                          mask="+966#########" id="manager_phone" type="text"-->
<!--                                          placeholder="+966#########"></the-mask>-->
<!--                            </div>-->
<!--                        </div>-->


<!--                        <div class="col-md-6 mb-3">-->
<!--                            <div class="form-group">-->
<!--                                <label for="email_manager">Manager E-mail</label>-->
<!--                                <input class="form-control" id="email_manager"-->
<!--                                       v-model="company.manager_email" type="email">-->
<!--                            </div>-->
<!--                        </div>-->


<!--                        <div class="row">-->
<!--                            <div class="col-md-12">-->
<!--                                <div class="form-check dashboard-check">-->
<!--                                    <input class="form-check-input"-->
<!--                                           v-model="company.veh_rental_management_service"-->
<!--                                           type="checkbox" value="" id="veh_rental_management_service">-->
<!--                                    <label class="form-check-label" for="veh_rental_management_service">-->
<!--                                        <label for="veh_rental_management_service">Vehicle rental management-->
<!--                                            service</label>-->
<!--                                    </label>-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            &lt;!&ndash;&#45;&#45;&#45;&#45;&#45;&#45;***-&#45;&#45;&#45;&#45;&#45;&#45;&ndash;&gt;-->
<!--                            <div class="col-md-12">-->
<!--                                <div class="form-check dashboard-check">-->
<!--                                    <input class="form-check-input" type="checkbox"-->
<!--                                           v-model="company.veh_maintenance_service"-->
<!--                                           id="veh_maintenance_service">-->
<!--                                    <label class="form-check-label" for="veh_maintenance_service">-->
<!--                                        <label for="veh_maintenance_service">Vehicle maintenance and operation-->
<!--                                            management service</label>-->
<!--                                    </label>-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            &lt;!&ndash;&#45;&#45;&#45;&#45;&#45;&#45;***-&#45;&#45;&#45;&#45;&#45;&#45;&ndash;&gt;-->

<!--                            <div class="col-md-12">-->
<!--                                <div class="form-check dashboard-check">-->
<!--                                    <input class="form-check-input" type="checkbox"-->
<!--                                           v-model="company.veh_tracking_service"-->
<!--                                           id="veh_tracking_service">-->
<!--                                    <label class="form-check-label" for="veh_tracking_service">-->
<!--                                        <label for="veh_tracking_service">Vehicle tracking service, including-->
<!--                                            operation and maintenance-->
<!--                                            management</label>-->
<!--                                    </label>-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            &lt;!&ndash;&#45;&#45;&#45;&#45;&#45;&#45;***-&#45;&#45;&#45;&#45;&#45;&#45;&ndash;&gt;-->


<!--                        </div>-->


<!--                    </div>-->
<!--                    <div class="mt-3 mb-3 ">-->
<!--                        <button type="submit" class="btn btn-success">{{$trans('action.save')}}</button>-->
<!--                    </div>-->
<!--                </form>-->

<!--        </div>-->
    </div>
</template>
<script>
import {TheMask} from 'vue-the-mask'
export default {
    components: {TheMask},
    data () {
        return {
            company  : {
                lang : localStorage.getItem('lang')
            },
            idCompany:null,

        }
    },
    async mounted () {
        this.idCompany = this.$route.params.idCompany;
        await this.getCompany()
    },
    methods: {
        async getCompany() {
            let id = this.idCompany;
            this.isLoad = true;
            await  axios.get('/facility/'+id, {
                headers: this.tokenHeader
            }).then(({data}) => {
                this.isLoad = false;
                this.company.num_at_ministry = data.data.number_at_ministry;
                this.company.commercial_reg_number = data.data.commercial_register_number;
                this.company.commercial_register_date_issuance = data.data.commercial_register_start_date;
                this.company.commercial_reg_expiry_date = data.data.commercial_register_end_date;
                this.company.full_name_ar = data.data.full_name_ar;
                this.company.full_name_en = data.data.full_name_en;
                this.company.short_name_ar = data.data.short_name_ar;
                this.company.short_name_en = data.data.short_name_en;
                this.company.address = data.data.address;
                this.company.city = data.data.city;
                this.company.email = data.data.mail_box;
                this.company.zipCode = data.data.post_code;
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

        },
        async updateCompany(){
            let lang = localStorage.getItem('lang');
            this.isLoad = true;
            let id = this.idCompany;
            await axios.put('/facility/'+id, this.company, {
                headers: this.tokenHeader
            })
                .then(({data}) => {
                    this.isLoad = false;
                    if (data.success === true) {
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
                        text: this.$trans('action.failed'),
                    })
                });
        },

    }
}
</script>
<style type="scss">
.table > :not(caption) > * > * {
    border-bottom-width: 0;
}

.form-check .form-check-input{
    float: none;
    border-color: black;
}
</style>
