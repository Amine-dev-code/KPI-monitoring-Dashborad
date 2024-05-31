<template>
  <div class="h-screen md:w-60 w-10 bg-[#3D4c67] shadow-xl shadow-black float-left overflow-hidden ">
  <div class="flex justify-start">
    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 48 48"><g fill="#3F51B5"><circle cx="8" cy="38" r="3"/><circle cx="16" cy="40" r="3"/><circle cx="24" cy="33" r="3"/><circle cx="32" cy="35" r="3"/><circle cx="40" cy="31" r="3"/><path d="m39.1 29.2l-7.3 3.7l-8.3-2.1l-8 7l-7-1.7l-1 3.8l9 2.3l8-7l7.7 1.9l8.7-4.3z"/></g><g fill="#00BCD4"><circle cx="8" cy="20" r="3"/><circle cx="16" cy="22" r="3"/><circle cx="24" cy="15" r="3"/><circle cx="32" cy="20" r="3"/><circle cx="40" cy="8" r="3"/><path d="M38.3 6.9c-2.1 3.2-5.3 8-6.9 10.4c-1.2-.7-3.1-2-6.4-4l-1.3-.8l-8.3 7.3l-7-1.7l-1 3.9l9 2.3l7.7-6.7c2.6 1.6 5.8 3.6 6.5 4.1l.5.5l.9-.1c1.1-.1 1.1-.1 9.5-12.9l-3.2-2.3z"/></g></svg>
    <h1 class="text-gray-300 mt-3 ml-5 text-lg font-bold">Admin Panel</h1>
    <svg class="w-10 ml-5 mt-2" fill="none" stroke="rgb(209 213 219)" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
</svg>
  </div>
  <section class="mt-10 ">
    <div ref="Global">
  <router-link class="flex justify-start h-10 mb-12 "  :to="{name:'Global'}">
    <svg class="w-6 ml-2 inline" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 1024 1024"><path fill="white" d="M946.5 505L560.1 118.8l-25.9-25.9a31.5 31.5 0 0 0-44.4 0L77.5 505a63.9 63.9 0 0 0-18.8 46c.4 35.2 29.7 63.3 64.9 63.3h42.5V940h691.8V614.3h43.4c17.1 0 33.2-6.7 45.3-18.8a63.6 63.6 0 0 0 18.7-45.3c0-17-6.7-33.1-18.8-45.2zM568 868H456V664h112v204zm217.9-325.7V868H632V640c0-22.1-17.9-40-40-40H432c-22.1 0-40 17.9-40 40v228H238.1V542.3h-96l370-369.7l23.1 23.1L882 542.3h-96.1z"/></svg>
    <h3 class="text-gray-300 ml-2 text-lg mt-2">Global</h3>
  </router-link>
</div>
  <div ref="unites">
  <router-link class="flex justify-start h-10 mb-12 "   :to="{name:'unites'}">
    <svg class="w-6 ml-2 " xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"><path fill="white" d="M21.999 8a.997.997 0 0 0-.143-.515L19.147 2.97A2.01 2.01 0 0 0 17.433 2H6.565c-.698 0-1.355.372-1.714.971L2.142 7.485A.997.997 0 0 0 1.999 8c0 1.005.386 1.914 1 2.618V20a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-5h4v5a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-9.382c.614-.704 1-1.613 1-2.618zm-2.016.251A2.002 2.002 0 0 1 17.999 10c-1.103 0-2-.897-2-2c0-.068-.025-.128-.039-.192l.02-.004L15.219 4h2.214l2.55 4.251zm-9.977-.186L10.818 4h2.361l.813 4.065C13.957 9.138 13.079 10 11.999 10s-1.958-.862-1.993-1.935zM6.565 4h2.214l-.76 3.804l.02.004c-.015.064-.04.124-.04.192c0 1.103-.897 2-2 2a2.002 2.002 0 0 1-1.984-1.749L6.565 4zm3.434 12h-4v-3h4v3z"/></svg>
    <h3 class="text-gray-300 ml-2 text-lg mt-2">Unités</h3>
  </router-link>
</div>
  <div ref="users">
  <router-link class="flex justify-start h-10 mb-12 " :to="{name:'users'}">
  <svg class="w-6 ml-2 inline" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20"><path fill="white" d="M15.989 19.129c0-2.246-2.187-3.389-4.317-4.307c-2.123-.914-2.801-1.684-2.801-3.334c0-.989.648-.667.932-2.481c.12-.752.692-.012.802-1.729c0-.684-.313-.854-.313-.854s.159-1.013.221-1.793c.064-.817-.398-2.56-2.301-3.095c-.332-.341-.557-.882.467-1.424c-2.24-.104-2.761 1.068-3.954 1.93c-1.015.756-1.289 1.953-1.24 2.59c.065.78.223 1.793.223 1.793s-.314.17-.314.854c.11 1.718.684.977.803 1.729c.284 1.814.933 1.492.933 2.481c0 1.65-.212 2.21-2.336 3.124C.663 15.53 0 17 .011 19.129C.014 19.766 0 20 0 20h16s-.011-.234-.011-.871zm2.539-5.764c-1.135-.457-1.605-1.002-1.605-2.066c0-.641.418-.432.602-1.603c.077-.484.447-.008.518-1.115c0-.441-.202-.551-.202-.551s.103-.656.143-1.159c.05-.627-.364-2.247-2.268-2.247c-1.903 0-2.318 1.62-2.269 2.247c.042.502.144 1.159.144 1.159s-.202.109-.202.551c.071 1.107.441.631.518 1.115c.184 1.172.602.963.602 1.603c0 1.064-.438 1.562-1.809 2.152c-.069.029-.12.068-.183.102c1.64.712 4.226 1.941 4.838 4.447H20v-2.318c0-1-.273-1.834-1.472-2.317z"/></svg>
  <h3 class="text-gray-300 ml-2 text-lg mt-2">Utilisateurs Total</h3>
  </router-link>
</div>
  <div ref="trashed">
  <router-link class="flex justify-start h-10 mb-12 " :to="{name:'trashed'}">
  <svg class="w-6 ml-2 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="white" d="m170.5 51.6l-19 28.4h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6h-93.7c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6l36.7 55H424c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8v304c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128h-8c-13.3 0-24-10.7-24-24s10.7-24 24-24h69.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128v304c0 17.7 14.3 32 32 32h224c17.7 0 32-14.3 32-32V128H80zm80 64v208c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0v208c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0v208c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/></svg>
  <h3 class="text-gray-300 ml-2 text-lg mt-2">Utilisateurs supprimés</h3>
  </router-link>
</div>
  <div ref="Timing">
  <router-link class="flex justify-start h-10 " :to="{name:'Timing'}">
  <svg class="w-6 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g fill="none"><path d="M24 0v24H0V0h24ZM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01l-.184-.092Z"/><path fill="white" d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2Zm0 4a1 1 0 0 0-1 1v5a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V7a1 1 0 0 0-1-1Z"/></g></svg>
  <h3 class="text-gray-300 ml-2 text-lg mt-2 ">Planification</h3>
  </router-link>
</div>
<div>
  <h3 class="text-gray-300 ml-2 text-lg mt-2 cursor-pointer " @click="logout">Logout</h3>
  
</div>
  
</section>
  </div>
</template>

<script>
export default{
  name:'Navbar',
  data() {
      return {
        routename:''
      }
    },
  
    // Methods are functions that mutate state and trigger updates.
    // They can be bound as event handlers in templates.
    methods: {  
      
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
    }
    
  },
    watch:{
     $route(){
      if(this.$route.name==='Global'){
        this.$refs.Global.classList.add('bg-black')
      }
      else{
        this.$refs.Global.classList.remove('bg-black')
      }
       if(this.$route.name==='unites'){
        this.$refs.unites.classList.add('bg-black')
      }
      else{
        this.$refs.unites.classList.remove('bg-black')
      }
       if(this.$route.name=='users'){
        this.$refs.users.classList.add('bg-black')
      }
      else{
        this.$refs.users.classList.remove('bg-black')
      }
       if(this.$route.name=='trashed'){
        this.$refs.trashed.classList.add('bg-black')
      }
      else{
        this.$refs.trashed.classList.remove('bg-black')
      }
      if(this.$route.name=='Timing'){
        this.$refs.Timing.classList.add('bg-black')
      }
      else{
        this.$refs.Timing.classList.remove('bg-black')
      }
      
     }
    },
    async mounted(){
       
    }
    // Lifecycle hooks are called at different stages
    // of a component's lifecycle.
    // This function will be called when the component is mounted.
     
    
  }
</script>











