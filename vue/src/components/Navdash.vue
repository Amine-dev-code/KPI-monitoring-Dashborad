<template>
  <div class="h-screen md:w-60 w-10 bg-[#3D4c67] shadow-xl shadow-black float-left overflow-y-auto ">
  <div class="flex justify-start">
    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 48 48"><g fill="#3F51B5"><circle cx="8" cy="38" r="3"/><circle cx="16" cy="40" r="3"/><circle cx="24" cy="33" r="3"/><circle cx="32" cy="35" r="3"/><circle cx="40" cy="31" r="3"/><path d="m39.1 29.2l-7.3 3.7l-8.3-2.1l-8 7l-7-1.7l-1 3.8l9 2.3l8-7l7.7 1.9l8.7-4.3z"/></g><g fill="#00BCD4"><circle cx="8" cy="20" r="3"/><circle cx="16" cy="22" r="3"/><circle cx="24" cy="15" r="3"/><circle cx="32" cy="20" r="3"/><circle cx="40" cy="8" r="3"/><path d="M38.3 6.9c-2.1 3.2-5.3 8-6.9 10.4c-1.2-.7-3.1-2-6.4-4l-1.3-.8l-8.3 7.3l-7-1.7l-1 3.9l9 2.3l7.7-6.7c2.6 1.6 5.8 3.6 6.5 4.1l.5.5l.9-.1c1.1-.1 1.1-.1 9.5-12.9l-3.2-2.3z"/></g></svg>
    <h1 class="text-gray-300 mt-3 ml-5 text-lg font-bold">KPI Dashboard</h1>
    <svg class="w-8 ml-5 mt-2" fill="none" stroke="rgb(209 213 219)" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
</svg>
  </div>
  <section class="mt-10 ">
    <div ref="Global">
  <router-link class="flex justify-start h-10 mb-4  "  :to="{name:'Globdash'}">
    <svg class="w-6 ml-2 inline" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 1024 1024"><path fill="white" d="M946.5 505L560.1 118.8l-25.9-25.9a31.5 31.5 0 0 0-44.4 0L77.5 505a63.9 63.9 0 0 0-18.8 46c.4 35.2 29.7 63.3 64.9 63.3h42.5V940h691.8V614.3h43.4c17.1 0 33.2-6.7 45.3-18.8a63.6 63.6 0 0 0 18.7-45.3c0-17-6.7-33.1-18.8-45.2zM568 868H456V664h112v204zm217.9-325.7V868H632V640c0-22.1-17.9-40-40-40H432c-22.1 0-40 17.9-40 40v228H238.1V542.3h-96l370-369.7l23.1 23.1L882 542.3h-96.1z"/></svg>
    <h3 class="text-gray-300 ml-2 text-lg mt-2">Global</h3>
  </router-link>
</div>
  <div class="flex justify-start h-10  ">
    <svg class="w-6 ml-2 "  xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><path fill="white" d="M7.667 27.503L2 22.448l1.331-1.492l5.641 5.031l7.69-7.445a1.928 1.928 0 0 1 2.674-.008l3.624 3.464l5.58-5.973L30 17.39l-5.581 5.975a1.996 1.996 0 0 1-2.838.08l-3.577-3.419l-7.666 7.42a1.963 1.963 0 0 1-2.671.056zM30 11h-4l2-3l2 3zm-8-7h-4v2h4v2h-3v2h3v2h-4v2h4a2.003 2.003 0 0 0 2-2V6a2.002 2.002 0 0 0-2-2zm-6 10h-6v-4a2.002 2.002 0 0 1 2-2h2V6h-4V4h4a2.002 2.002 0 0 1 2 2v2a2.002 2.002 0 0 1-2 2h-2v2h4zM6 12V4H4v1H2v2h2v5H2v2h6v-2H6z"/></svg>
    <h3 class="text-gray-300 ml-2 text-lg mt-2">KPI GLOBAL</h3>
  </div>

 
  <router-link v-for="uniteuser in unitesuser" :key="uniteuser.id" :ref="'route_'+uniteuser.id"  class="flex justify-start h-10 mb-12 ml-4 " :to="{name:'Dashboardglob',params:{ id:uniteuser.id}}">
    <svg class="w-6 ml-2 " xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"><path fill="white" d="M21.999 8a.997.997 0 0 0-.143-.515L19.147 2.97A2.01 2.01 0 0 0 17.433 2H6.565c-.698 0-1.355.372-1.714.971L2.142 7.485A.997.997 0 0 0 1.999 8c0 1.005.386 1.914 1 2.618V20a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-5h4v5a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-9.382c.614-.704 1-1.613 1-2.618zm-2.016.251A2.002 2.002 0 0 1 17.999 10c-1.103 0-2-.897-2-2c0-.068-.025-.128-.039-.192l.02-.004L15.219 4h2.214l2.55 4.251zm-9.977-.186L10.818 4h2.361l.813 4.065C13.957 9.138 13.079 10 11.999 10s-1.958-.862-1.993-1.935zM6.565 4h2.214l-.76 3.804l.02.004c-.015.064-.04.124-.04.192c0 1.103-.897 2-2 2a2.002 2.002 0 0 1-1.984-1.749L6.565 4zm3.434 12h-4v-3h4v3z"/></svg>
    <h3 class="text-gray-300 ml-2 text-lg mt-2">{{ uniteuser.unitename }}</h3>
  </router-link>
  <div class="flex justify-start h-10  ">
    <svg class="w-6 ml-2 "  xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><path fill="white" d="M7.667 27.503L2 22.448l1.331-1.492l5.641 5.031l7.69-7.445a1.928 1.928 0 0 1 2.674-.008l3.624 3.464l5.58-5.973L30 17.39l-5.581 5.975a1.996 1.996 0 0 1-2.838.08l-3.577-3.419l-7.666 7.42a1.963 1.963 0 0 1-2.671.056zM30 11h-4l2-3l2 3zm-8-7h-4v2h4v2h-3v2h3v2h-4v2h4a2.003 2.003 0 0 0 2-2V6a2.002 2.002 0 0 0-2-2zm-6 10h-6v-4a2.002 2.002 0 0 1 2-2h2V6h-4V4h4a2.002 2.002 0 0 1 2 2v2a2.002 2.002 0 0 1-2 2h-2v2h4zM6 12V4H4v1H2v2h2v5H2v2h6v-2H6z"/></svg>
    <h3 class="text-gray-300 ml-2 text-lg mt-2">KPI FINANCIERS</h3>
  </div>
  <router-link v-for="uniteusersec in unitesusersec" :key="uniteusersec.id" :ref="'route_'+uniteusersec.id"  class="flex justify-start h-10 mb-12 ml-4 " :to="{name:'Dashboardfin',params:{ id:uniteusersec.id}}">
    <svg class="w-6 ml-2 " xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"><path fill="white" d="M21.999 8a.997.997 0 0 0-.143-.515L19.147 2.97A2.01 2.01 0 0 0 17.433 2H6.565c-.698 0-1.355.372-1.714.971L2.142 7.485A.997.997 0 0 0 1.999 8c0 1.005.386 1.914 1 2.618V20a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-5h4v5a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-9.382c.614-.704 1-1.613 1-2.618zm-2.016.251A2.002 2.002 0 0 1 17.999 10c-1.103 0-2-.897-2-2c0-.068-.025-.128-.039-.192l.02-.004L15.219 4h2.214l2.55 4.251zm-9.977-.186L10.818 4h2.361l.813 4.065C13.957 9.138 13.079 10 11.999 10s-1.958-.862-1.993-1.935zM6.565 4h2.214l-.76 3.804l.02.004c-.015.064-.04.124-.04.192c0 1.103-.897 2-2 2a2.002 2.002 0 0 1-1.984-1.749L6.565 4zm3.434 12h-4v-3h4v3z"/></svg>
    <h3 class="text-gray-300 ml-2 text-lg mt-2">{{ uniteusersec.unitename }}</h3>
  </router-link>
  <div>
  <h3 class="text-gray-300 ml-2 text-lg mt-2 cursor-pointer " @click="logout">Logout</h3>
  
 

</div>
  
</section>
  </div>
</template>

<script>
export default {
name:'Navdash',
data() {
      return {
        unitesuser:[],
        unitesusersec:[]
      }
    },
  
    // Methods are functions that mutate state and trigger updates.
    // They can be bound as event handlers in templates.
    methods: {  
      async fetchUserUniteskpiglb(){
        let token=localStorage.getItem('token');
        let id=localStorage.getItem('id');
        const res=await fetch (`http://127.0.0.1:8000/api/user/unite/glb/related/${id}`,{
          headers:{
          'Authorization': `Bearer ${token}`,
         
        }
        });
        const data= await res.json();
        return data;
        
    },
    async fetchUserUniteskpifin(){
      let token=localStorage.getItem('token');
      let id=localStorage.getItem('id');
      const res=await fetch (`http://127.0.0.1:8000/api/user/unite/fin/related/${id}`,{
        headers:{
          'Authorization': `Bearer ${token}`,
        }
      });
      const data= await res.json();
      return data;
    },
   async logout(){
      let token=localStorage.getItem("token");
      const res=await fetch('http://127.0.0.1:8000/api/logout',{
        method:'post',
        headers:{
          'Authorization': `Bearer ${token}`,
        }
      });
      localStorage.removeItem("token");
        localStorage.removeItem("role");
        localStorage.removeItem("username");
        localStorage.removeItem("id");
        this.$router.push('/login');
    }},
    watch:{
     $route(){
      if(this.$route.name==='Globdash'){
        this.$refs.Global.classList.add('bg-black')
      }
      else{
        this.$refs.Global.classList.remove('bg-black')
      }
      
       
       
      
     }
    },
    async created(){
       this.unitesuser=await this.fetchUserUniteskpiglb();
       this.unitesusersec=await this.fetchUserUniteskpifin();
       
    },
    // Lifecycle hooks are called at different stages
    // of a component's lifecycle.
    // This function will be called when the component is mounted.
   
}
</script>

<style>

</style>