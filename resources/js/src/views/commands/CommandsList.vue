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
                        <li class="breadcrumb-item active">{{$trans('commands.commands_list')}}</li>
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
                                <h3 class="h4">{{$trans('commands.commands_list')}}</h3>
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
                                        :data="commands"
                                        :filters="filters"
                                        :currentPage.sync="currentPage"
                                        :pageSize="datatablePerPage"
                                        @totalPagesChanged="totalPages = $event"
                                        class="table table-bordered  w-100 table-responsive">
                                        <thead slot="head">
                                        <tr>
                                            <th scope="row"><input type="checkbox" value=""></th>
                                            <th class="border-bottom">{{$trans('commands.desc')}}</th>
                                            <th class="border-bottom">{{$trans('commands.data')}} </th>
                                            <th class="border-bottom">{{$trans('commands.type')}}</th>
                                            <th class="border-bottom">{{$trans('commands.send_sms')}}</th>
                                            <th class="border-bottom">{{$trans('main.action')}}</th>

                                        </tr>
                                        </thead>
                                        <tbody slot="body" slot-scope="{displayData}">
                                        <tr v-for="row in displayData" :key="row.id" :id="row.id">
                                            <td scope="row"><input type="checkbox" value=""></td>
                                            <td>{{row.description}}</td>
                                            <td>{{row.attributes.data}}</td>
                                            <td>{{row.type}}</td>
                                            <td>
                                                <p v-if="row.textChannel === true" >{{$trans('main.yes')}}</p>
                                                <p v-if="row.textChannel === false" >{{$trans('main.no')}}</p>
                                            </td>
                                            <td style="overflow-y:visible !important">
                                                <a href="#" id="action_menu" data-toggle="dropdown" class="mr-2 fw-bold"><span
                                                    class="fas fa-ellipsis-h icon-dark "></span></a>
                                                <div aria-labelledby="action_menu" class="dropdown-menu">

                                                    <router-link class="dropdown-item" :to="{name:'edit-command', params: { idCmd:row.id }}"><span class="fas fa-pen"></span> Edit</router-link>
                                                    <a class="dropdown-item text-danger" href="#"><span class="fas fa-user-times mr-2"></span>Suspend</a>

                                                </div>

                                                <a  @click="modalDeleteCommand(row.id)">
                                                    <span class="fas fa-times-circle text-danger mr-2 clickable"></span>
                                                </a>


                                            </td>


                                        </tr>
                                        </tbody>

                                    </v-table>
                                    <smart-pagination v-if="totalPages > 1"
                                                      :currentPage.sync="currentPage"
                                                      :totalPages="totalPages"
                                    />

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
            commands:[],
            currentPage: 1,
            totalPages: 0,
            filters: {
                search: { value: '', keys: ['description','attributes.data','type','textChannel'] }
            }
        }
    },
    mounted () {
        this.getCommandsList();
    },
    methods: {
        getCommandsList(){
            this.isLoad = true;
            axios.get('/commands', {
                headers: this.tokenHeader
            }).then(({data}) => {
                this.isLoad = false;
                this.totalPages = data.data.length / this.datatablePerPage
                this.commands = data.data;


            }).catch(({errors}) => {
                this.isLoad = false;
            });
        },
        modalDeleteCommand(id){
            Swal.fire({
                title: this.$trans('main.are_u_sure'),
                text: this.$trans('main.no_revert'),
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: this.$trans('main.yes_delete'),
                cancelButtonText:  this.$trans('main.cancel')
            }).then((result) => {
                if (result.isConfirmed) {
                    this.deleteCommand(id)
                }
            })
        },
        deleteCommand(id) {
            this.isLoad = true;
            axios.delete('/command/'+id, {
                headers: this.tokenHeader
            }).then(({data}) => {
                this.isLoad = false;
                if(data.success === true){
                    $("#"+id).hide()
                    Swal.fire(
                        this.$trans('action.deleted'),
                        this.$trans('action.deleted_text'),
                        'success'
                    )
                }else{
                    Swal.fire(
                        this.$trans('action.error'),
                        this.$trans('action.failed'),
                        'error'
                    )
                }

            }).catch(({errors}) => {
                this.isLoad = false;
            });

        },
    }
}
</script>

