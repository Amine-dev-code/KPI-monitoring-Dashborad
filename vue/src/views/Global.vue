<template>
   <div>
<div class="md:flex md:justify-center font-comic">
 <div class=" bg-gradient-to-r from-blue-400 to-emerald-400 rounded-xl mx-4 h-32 w-60 mt-16 ">
    <h3 class="my-6 mx-10 font-bold">Utilisateurs</h3>
    <h1 class="text-4xl text-center">{{ countuser }}</h1>
 </div>
 <div class=" bg-gradient-to-r from-red-200 to-red-600 rounded-xl mx-4 h-32 w-60  mt-16">
    <h3 class="my-6 mx-10 font-bold">Admins</h3>
    <h3 class="text-4xl text-center">{{ countadmin }}</h3>
 </div>
 <div class=" bg-white bg-gradient-to-r from-blue-100 via-blue-300 to-blue-500 rounded-xl mx-4 h-32 w-60 mt-16 ">
    <h3 class="my-6 mx-10 font-bold">Unités</h3>
    <h3 class="text-4xl text-center">{{countunites}}</h3>
 </div>
</div>
</div>
</template>

<script>
export default {
name:'Global',
 data() {
    return {
      countuser: null,
      countadmin:null,
      countunites:null
      

    }
  },

  // Methods are functions that mutate state and trigger updates.
  // They can be bound as event handlers in templates.
  methods: {
    async fetchUsers(){
      try{
         let token=localStorage.getItem('token');
         const res=await fetch ('http://127.0.0.1:8000/api/users',{
            headers:{
            'Authorization': `Bearer ${token}`
          }
         });
      const data= await res.json();
      return data;
      }
      catch(error){
         console.log(error)
      }
      
    },
    async fetchUnites(){
      try{
         let token=localStorage.getItem('token');
      const res=await fetch ('http://127.0.0.1:8000/api/unite/databases',{
         headers:{
            'Authorization': `Bearer ${token}`
          }
      });
      const data= await res.json();
      return data;
      }
      catch(error){
         console.log(error);
      }
      
    },
   
    },
  

  // Lifecycle hooks are called at different stages
  // of a component's lifecycle.
  // This function will be called when the component is mounted.
  async created(){
   const data=await this.fetchUsers();
   this.Totalusers=data;
   let users=this.Totalusers.filter((user) => user.role=='user');
   let admins=this.Totalusers.filter((user) => user.role=='admin');
   this.countuser=users.length;
   this.countadmin=admins.length;
   const dataunit=await this.fetchUnites();
   let unites=dataunit;
   this.countunites=unites.length;
  }
}
</script>

<style>
body{
   background-color: #F4F7FA;
}
</style>
