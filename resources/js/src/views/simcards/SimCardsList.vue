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
                        <li class="breadcrumb-item"><a href="#">{{ $trans('breadcrumb.dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ $trans('menu.sim-cards') }}</li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 right">
                </div>
            </div>
        </div>

        <section class="tables">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">{{ $trans('menu.sim-cards') }}</h3>
                            </div>
                            <div class="">
                                <div class="card-body">

                                    <div class="fixed-table-toolbar">
                                        <div class="columns columns-right btn-group float-right"><button class="btn btn-secondary" type="button" name="refresh" aria-label="Refresh" title="Refresh"><i class="fa fa-sync"></i> </button><button class="btn btn-secondary" type="button" name="toggle" aria-label="Show card view" title="Show card view"><i class="fa fa-toggle-off"></i> </button><button class="btn btn-secondary" type="button" name="fullscreen" aria-label="Fullscreen" title="Fullscreen"><i class="fa fa-arrows-alt"></i> </button><div class="keep-open btn-group" title="Columns">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-label="Columns" title="Columns">
                                                <i class="fa fa-th-list"></i>

                                                <span class="caret"></span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right"><label class="dropdown-item dropdown-item-marker"><input type="checkbox" class="toggle-all" checked="checked"> <span>Toggle all</span></label><div class="dropdown-divider"></div><label class="dropdown-item dropdown-item-marker"><input type="checkbox" data-field="0" value="0" checked="checked"> <span><input type="checkbox" value=""></span></label><label class="dropdown-item dropdown-item-marker"><input type="checkbox" data-field="1" value="1" checked="checked"> <span>FACILITY NAME </span></label><label class="dropdown-item dropdown-item-marker"><input type="checkbox" data-field="2" value="2" checked="checked"> <span>MANAGER NAME </span></label><label class="dropdown-item dropdown-item-marker"><input type="checkbox" data-field="3" value="3" checked="checked"> <span>EMAIL</span></label><label class="dropdown-item dropdown-item-marker"><input type="checkbox" data-field="4" value="4" checked="checked"> <span>CITY</span></label><label class="dropdown-item dropdown-item-marker"><input type="checkbox" data-field="5" value="5" checked="checked"> <span>START DATE </span></label><label class="dropdown-item dropdown-item-marker"><input type="checkbox" data-field="6" value="6" checked="checked"> <span>Expiration</span></label><label class="dropdown-item dropdown-item-marker"><input type="checkbox" data-field="7" value="7" checked="checked"> <span>Status</span></label><label class="dropdown-item dropdown-item-marker"><input type="checkbox" data-field="8" value="8" checked="checked"> <span>Action</span></label></div></div>
                                            <div class="export btn-group">
                                                <button class="btn btn-secondary dropdown-toggle" aria-label="Export" data-toggle="dropdown" type="button" title="Export data">
                                                    <i class="fa fa-download"></i>

                                                    <span class="caret"></span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item " href="#" data-type="json">JSON</a><a class="dropdown-item " href="#" data-type="xml">XML</a><a class="dropdown-item " href="#" data-type="csv">CSV</a><a class="dropdown-item " href="#" data-type="txt">TXT</a><a class="dropdown-item " href="#" data-type="sql">SQL</a><a class="dropdown-item " href="#" data-type="excel">MS-Excel</a></div></div>
                                        </div>
                                        <div class="float-right search btn-group">
                                            <input class="form-control search-input" type="search" :placeholder="$trans('main.search')" v-model="filters.search.value" autocomplete="off">
                                        </div>
                                    </div>

                                    <v-table
                                        :data="simCards"
                                        :filters="filters"
                                        :currentPage.sync="currentPage"
                                        :pageSize="datatablePerPage"
                                        @totalPagesChanged="totalPages = $event"
                                        class="table table-bordered  w-100 table-responsive">
                                        <thead slot="head">
                                        <tr>
                                            <th scope="row"><input type="checkbox" value=""></th>
                                            <th class="border-bottom">Action</th>
                                            <th class="border-bottom">ICCID</th>
                                            <th class="border-bottom">SIM Status</th>
                                            <th class="border-bottom">Rate Plane</th>
                                            <th class="border-bottom">Edit</th>

                                        </tr>
                                        </thead>
                                        <tbody slot="body" slot-scope="{displayData}">
                                        <tr v-for="row in displayData" :key="row.id" :id="row.id">
                                            <td scope="row"><input type="checkbox" value=""></td>
                                            <td></td>
                                            <td>{{row.iccid}}</td>
                                            <td><span class="font-weight-normal"><span :class="getSimIconStatus(row.status)"></span></span> {{getSimStatus(row.status)}}</td>
                                            <td>{{ row.ratePlan }}</td>
                                            <td style="overflow-y:visible !important">

                                                <a href=""><span class="fas fa-pen"></span></a>
                                                <router-link :to="{name:'sim-details', params: { idSim:row.iccid } }"><span class="fas fa-eye mr-2"></span></router-link>

                                            </td>


                                        </tr>
                                        </tbody>

                                    </v-table>
                                    <div>
                                        <a href="#" v-if="thisPage > 1" @click="getSimCardList( 1)"><span class="fas fa-step-backward"></span></a>
                                        <a href="#" v-if="thisPage > 1" @click="getSimCardList(thisPage - 1)"><span class="fas fa-chevron-circle-left mr-2"></span></a>
                                        PAGE {{thisPage}}
                                        <a href="#" v-if="isLastPage === false " @click="getSimCardList(thisPage + 1)"><span class="fas fa-chevron-circle-right mr-2"></span></a>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
</template>

<script>

export default {
    data () {
        return {
            simCards: [],
            currentPage: 1,
            thisPage: 1,
            isLastPage : false,
            totalPages: 0,
            filters: {
                search: { value: '', keys: ['iccid','status','ratePlan'] }
            }
        }
    },
    mounted () {
        this.getSimCardList(1);
    },
    methods: {

        getSimCardList(p){
            this.isLoad = true;
            axios.get('/simcards/all/'+p, {
                headers: this.tokenHeader
            }).then(({data}) => {
                this.isLoad = false;
                this.totalPages = 1
                this.thisPage = data.page
                this.isLastPage = data.isLastPage
                this.simCards = data.data;


            }).catch(({errors}) => {
                this.isLoad = false;
            });
        },

        getSimStatus(st){
            let response = "";
            switch(st) {
                case 'ACTIVATED':
                    response = 'Activated'
                    break;
                case 'ACTIVATION_READY':
                    response = 'Activated ready'
                    break;
                case 'DEACTIVATED':
                    response = 'Deactivated'
                    break;
                case 'INVENTORY':
                    response = 'INVENTORY'
                    break;
                case 'PURGED':
                    response = 'PURGED'
                    break;
                case 'REPLACED':
                    response = 'REPLACED'
                    break;
                case 'RETIRED':
                    response = 'RETIRED'
                    break;
                case 'TEST_READY':
                    response = 'Test Ready'
                    break;
                default:
                // code block
            }

            return response
        },

        getSimIconStatus(st){
            let response = "";
            switch(st) {
                case 'ACTIVATED':
                    response = 'fas fa-circle text-success mr-2'
                    break;
                case 'ACTIVATION_READY':
                    response = 'fas fa-circle yellow mr-2'
                    break;
                case 'DEACTIVATED':
                    response = 'fas fa-circle text-success mr-2'
                    break;
                case 'INVENTORY':
                    response = 'fas fa-circle text-success mr-2'
                    break;
                case 'PURGED':
                    response = 'fas fa-circle megrate mr-2'
                    break;
                case 'REPLACED':
                    response = 'fas fa-circle text-success mr-2'
                    break;
                case 'RETIRED':
                    response = 'fas fa-circle text-success mr-2'
                    break;
                case 'TEST_READY':
                    response = 'fas fa-circle sim-status mr-2'
                    break;
                default:
                // code block
            }

            return response
        }





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
