<template>
    <div class="w-11/12 flex justify-center">
  <table v-if="disponible"  class="w-full border-2 bg-white mt-32 ml-20 shadow-lg ">
    <tr>
    <th>Nom/prénom</th>
    <th>UID</th>
    <th>User/admin</th>
    <th>Action</th>
    </tr>
    <tr v-for="Trasheduser in Trashedusers" class="h-16 font-bold">
      <td class="text-center"></td>
      <td class="text-center">{{ Trasheduser.username }}</td>
      <td class="text-center">{{ Trasheduser.role }}</td>
      <td class="text-center"><button class="rounded-2xl p-2 bg-gradient-to-r from-green-400 to-blue-500 text-white" @click="getBackUser(Trasheduser)">Récupérer</button></td>
    </tr>
  </table>
    </div>
    <svg v-if="loading" class="mx-auto my-40" xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-dasharray="15" stroke-dashoffset="15" stroke-linecap="round" stroke-width="2" d="M12 3C16.9706 3 21 7.02944 21 12"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="15;0"/><animateTransform attributeName="transform" dur="1.5s" repeatCount="indefinite" type="rotate" values="0 12 12;360 12 12"/></path></svg>
    <div v-show="note" class="flex justify-start items-center my-40 ">
    <svg class="ml-40"  xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24"><path fill="none" stroke="red" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m3 3l18 18M4 7h3m4 0h9m-10 4v6m4-3v3M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l.077-.923m.307-3.704L19 7M9 5V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3"/></svg>
    <h1 class="text-xl font-bold text-red-600">Y a pas des utilisateurs supprimés!</h1>
    </div>
  </template>
  
  <script>
  export default {
      name:'users',
      data() {
      return {
       Trashedusers:[],
       loading:false,
       true:null,
       disponible:false

      }
    },
  
    // Methods are functions that mutate state and trigger updates.
    // They can be bound as event handlers in templates.
    methods: {
      async fetchTrashedUsers(){
        try{
          let token=localStorage.getItem('token');
          const res=await fetch ('http://127.0.0.1:8000/api/trashedusers',{
            headers:{
            'Authorization': `Bearer ${token}`
          }
          });
        const data= await res.json();
        this.Trashedusers=data;
        if(this.Trashedusers.length!=0)
        this.disponible=true;
        else{
          this.note=true;
          this.disponible=false
        }
        this.loading=false;
        }
        catch(error){
          console.log(error);
        }
        
        
        
    },
      async getBackUser(user){
        try{
          let token=localStorage.getItem('token');
        const res=await fetch (`http://127.0.0.1:8000/api/getbackuser/${user.id}`,{
          headers:{
            'Authorization': `Bearer ${token}`
          }
        });
        const data= await res.json();
        await this.fetchTrashedUsers();
        }
        catch(error){
          console.log(error);
        }
        
     
      },
    },
    
  
    // Lifecycle hooks are called at different stages
    // of a component's lifecycle.
    // This function will be called when the component is mounted.
    ///getbackuser/{user}
    async created(){
     this.loading=true;
     await this.fetchTrashedUsers();
     
  }
}
  </script>
  
  <style>
  
  </style>