<template>
    <div class="page" >
        <!-- Main Navbar-->
        <header>

        </header>
        <div class="page-content d-flex align-items-stretch">
            <!-- Side Navbar -->
            <SideBar />
            <div  class="content-inner">

              <Header />

                <div class="ss pt-3 ">

                  <router-view></router-view>


                    <!--footer -->
                   <Footer />
                    <!--footer -->

                </div>


            </div>
        </div>
    </div>
</template>
<script>
import SideBar from "./SideBar";
import Header from "./Header";
import Footer from "./Footer";
export default {
    components: {Footer, Header, SideBar},
    data(){
        return {

        }
    },
    beforeMount(){

    },
    mounted() {
        let token =  localStorage.getItem('eisgps-token');

        let user =  localStorage.getItem('user');
        let loginToken =  localStorage.getItem('loginToken');
        if(token=== null || user === null  || loginToken === null) {
            this.$router.push({name:'login'});
        }
        this.$lang.setLocale(localStorage.getItem('lang'));

    },
    methods : {

        logout(){
            localStorage.removeItem('eisgps-token');
            localStorage.removeItem('user');
            this.$router.push({name:'login'});
        },

    }
}
</script>
<style type="scss">
.page-content{
    width: auto;
    margin-left: auto;
}
</style>

