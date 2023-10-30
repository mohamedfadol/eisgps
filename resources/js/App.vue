<template>
    <router-view></router-view>
</template>
<script>
export default {

    data(){
        return {

        }
    },
    beforeMount(){
        this.created()
    },
    mounted() {

    },
    methods : {
        toLogin(){
            this.$router.push({name:'login'})
        },
        created: function () {


            axios.interceptors.response.use(function (response) {
                return response
            }, function (error) {
                if (error.response.status === 401) {
                    localStorage.removeItem('eisgps-token');
                    localStorage.removeItem('user');
                    localStorage.removeItem('loginToken');
                    localStorage.removeItem('lang');
                    window.location.href = '/'
                }

                if (error.response.status === 404) {

                    window.location.href = '/not-found'
                }

            })
        }


    }
}
</script>
<style>
@import "~vue-loading-overlay";
</style>


