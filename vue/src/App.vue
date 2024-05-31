
<template>
  <div>
    <div class="float-left fixed">
    <Navbar v-show="adminpanel"/>
    <Navdash v-show="dashboard"/>
  </div>
  <div class="overflow-auto ml-60 ">
  <router-View/>
</div>
</div>
</template>
<script>
import Navbar from './components/Navbar.vue'
import Navdash from './components/Navdash.vue'
export default{
  name:'App',
  components:{Navbar,Navdash},
  data() {
      return {
        adminpanel:false,
        dashboard:false

      }
    },
  
    // Methods are functions that mutate state and trigger updates.
    // They can be bound as event handlers in templates.
    methods: {  
  
    },
    watch:{
     $route(){
      if(this.$route.name=='users' ||this.$route.name=='unites'|| this.$route.name=='trashed' || this.$route.name=='Timing' || this.$route.name=='Roles' || this.$route.name=='Global'){
        this.adminpanel=true;
      }
      if(this.$route.name=='Globdash' || this.$route.name=='Dashboardglob' || this.$route.name=='Dashboardfin'){
        this.dashboard=true;
      }
     }
    },
   
    // Lifecycle hooks are called at different stages
    // of a component's lifecycle.
    // This function will be called when the component is mounted.
     
    
  }
</script>
<style>

</style>

