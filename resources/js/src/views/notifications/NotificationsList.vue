<template>
    <div>
        <loading :active.sync="isLoad"
                 :is-full-page="fullPage"
                 :height="loaderHeight"
                 :width="loaderWidth"
                 :color="loaderColor"
                 :loader="loaderType"
                 :background-color="loaderBgColor"></loading>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
            <div class="d-block mb-4 mb-md-0">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                        <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>

                        <li class="breadcrumb-item active" aria-current="page">{{$trans('notifs.notifs_list')}}</li>
                    </ol>
                </nav>
                <h2 class="h4">{{$trans('notifs.notifs_list')}}</h2>
            </div>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group ml-3">
                    <button type="button" class="btn btn-sm btn-outline-primary">{{$trans('main.import')}}</button>
                    <button type="button" class="btn btn-sm btn-outline-primary">{{$trans('main.export')}}</button>
                </div>
            </div>
        </div>
        <div class="table-settings mb-4">
            <div class="row justify-content-between align-items-center">
                <div class="col-9 col-lg-4 d-flex">
                    <div class="input-group mr-2 mr-lg-3">
                        <span class="input-group-text"><span class="fas fa-search"></span></span>
                        <input type="text" class="form-control" :placeholder="$trans('main.search')" v-model="filters.search.value">
                    </div>
                    <select class="form-select w-25  btn btn-sm btn-primary" aria-label="Message select example 2">
                        <option selected>{{$trans('main.all')}}</option>
                        <option value="1">{{$trans('main.active')}}</option>
                        <option value="2">{{$trans('main.inactive')}}</option>
                    </select>
                </div>
                <div class="col-3 col-lg-8 text-right">
                    <div class="btn-group mr-2">
                        <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="icon icon-sm icon-gray">
                                    <span class="fas fa-sliders-h"></span>
                                </span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <span class="dropdown-item font-weight-bold text-dark">Show</span>
                            <a class="dropdown-item d-flex font-weight-bold" href="#">10 <span class="icon icon-small ml-auto"><span class="fas fa-check"></span></span></a>
                            <a class="dropdown-item font-weight-bold" href="#">20</a>
                            <a class="dropdown-item font-weight-bold" href="#">30</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="card card-body border-light shadow-sm table-wrapper table-responsive">
            <div class="d-flex mb-3">
                <select class="form-select fmxw-150 btn btn-sm btn-primary" aria-label="Message select example">
                    <option selected>{{$trans('main.bulk_action')}}</option>
                    <option value="1">{{$trans('main.send_mail')}}</option>
                    <option value="2">{{$trans('main.change_group')}}</option>
                    <option value="3">{{$trans('main.delete_users')}}</option>
                </select>
                <button class="btn btn-sm px-3 btn btn-sm btn-primary border-light ml-3">{{$trans('main.apply')}}</button>
            </div>
            <v-table
                :data="notifs"
                :filters="filters"
                :currentPage.sync="currentPage"
                :pageSize="datatablePerPage"
                @totalPagesChanged="totalPages = $event"
                class="table user-table table-hover align-items-center">
                <thead slot="head">
                <tr class="child-table">
                    <th class="border-bottom">
                        <div class="checkboxAll">
                            <input class="form-check-input" type="checkbox" value="" id="userCheck3">
                            <label class="form-check-label" for="userCheck3">
                            </label>
                        </div>
                    </th>
                    <th class="border-bottom">{{$trans('notifs.type')}}</th>
                    <th class="border-bottom">{{$trans('notifs.alldevices')}} </th>
                    <th class="border-bottom">{{$trans('notifs.channels')}}</th>
                    <th class="border-bottom">{{$trans('main.action')}}</th>
                </tr>
                </thead>
                <tbody slot="body" slot-scope="{displayData}">
                <tr v-for="row in displayData" :key="row.id" :id="row.id">
                    <td class="text-center">
                        <div class="form-check dashboard-check">
                            <input class="form-check-input" type="checkbox" value="" id="userCheck18">
                            <label class="form-check-label" for="userCheck18">
                            </label>
                        </div>
                    </td>

                    <td class="text-left"><span class="font-weight-normal" >{{row.type}}</span></td>
                    <td>
                        <span v-if="row.always === true" class="font-weight-normal">{{$trans('main.yes')}}</span>
                        <span v-if="row.always === false" class="font-weight-normal">{{$trans('main.no')}}</span>
                    </td>
                    <td><span class="font-weight-normal">{{row.notificators}}</span></td>

                    <td>
                        <div class="btn-group">
                            <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="icon icon-sm">
                                            <span class="fas fa-ellipsis-h icon-dark"></span>
                                        </span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" ><span class="fas fa-pen"></span> Edit</a>
                                <a class="dropdown-item text-danger" href="#"><span class="fas fa-user-times mr-2"></span>Suspend</a>
                            </div>
                        </div>
                        <a  class="text-danger ml-2" title="Delete" data-toggle="tooltip"><span class="fas fa-times-circle"></span></a>
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
</template>

<script>

export default {
    data () {
        return {
            notifs:[],
            currentPage: 1,
            totalPages: 0,
            filters: {
                search: { value: '', keys: ['type','notificators'] }
            }
        }
    },
    mounted () {
        this.getNotificationsList();
    },
    methods: {
        getNotificationsList(){
            this.isLoad = true;
            axios.get('/notifications', {
                headers: this.tokenHeader
            }).then(({data}) => {
                this.isLoad = false;
                this.totalPages = data.data.length / this.datatablePerPage
                this.notifs = data.data;


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

