<template>
  <div class="w-11/12 flex justify-center">
<table v-if="disponible" class="w-full border-2 bg-white mt-32 ml-20 shadow-lg ">
  <tr>
  <th>Username</th>
  <th>email</th>
  <th>User/admin</th>
  <th>Action 1</th>
  <th>Ajouter un role</th>
  </tr>
  <tr v-for="user in users" :key="user.id" class="h-16 font-bold">
    <td class="text-center">{{ user.username }}</td>
    <td class="text-center">{{ user.email }}</td>
    <td class="text-center">{{ user.role }}</td>
    <td class="text-center"><button class="rounded-2xl p-2 bg-gradient-to-r from-green-400 to-blue-500 text-white" @click="DeleteUser(user)">Supprimer</button></td>
    <td v-if="user.role=='user'" class="text-center"><router-link class="rounded-xl p-1 px-3 bg-gradient-to-tr from-pink-500 via-red-500 to-yellow-500 text-white" :to="{name:'Roles',params:{ id:user.id}}">Roles</router-link></td>
  </tr>
</table>
  </div>
     <svg v-if="loading" class="mx-auto my-40" xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-dasharray="15" stroke-dashoffset="15" stroke-linecap="round" stroke-width="2" d="M12 3C16.9706 3 21 7.02944 21 12"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="15;0"/><animateTransform attributeName="transform" dur="1.5s" repeatCount="indefinite" type="rotate" values="0 12 12;360 12 12"/></path></svg>
   <div v-show="note" class="flex justify-start items-center my-40 ">
    <svg class="ml-40"  xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24"><path fill="none" stroke="red" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m3 3l18 18M4 7h3m4 0h9m-10 4v6m4-3v3M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l.077-.923m.307-3.704L19 7M9 5V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3"/></svg>
    <h1 class="text-xl font-bold text-red-600">Y a pas des utilisateurs</h1>
    </div>
    <div class="flex justify-end">
      <div class="text-green-600 text-sm mt-12 font-bold  mr-2 float-right">{{ synchsuccess }}</div>
    <button class="float-right mr-10 bg-gradient-to-r from-blue-100 via-blue-300 to-blue-500 rounded-2xl p-2 mt-10 font-bold " @click="Synchroniser">Synchroniser</button>
    
  </div>
</template>

<script>
export default {
    name:'users',
    data() {
    return {
     users:[],
     loading:false, 
     disponible:null,
     note:null,
     synchsuccess:''
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
      let users=data;
      let username=window.localStorage.getItem('username');
      let role=window.localStorage.getItem('role');
      this.users=[];
      for(let user of users){
        if(role=='superadmin'){
          if(user.role!='superadmin' ){
          this.users.push(user);
        }
        }else{
          if(user.username!=username && user.role=='user'){
            this.users.push(user);
          }
        }
        
      }
    
      this.loading=false;
     if(this.users.length!==0)
     this.disponible=true;
     else {
      this.note=true;
      this.disponible=false
     }
      }
      catch(error){
        console.log(error);
      }
     
      
    },
    async DeleteUser(user){
      try{
        let token=localStorage.getItem('token');
        if(confirm("etes vous sur de supprimer "+"l'utilisateur "+user.username+"?")){const res=await fetch (`http://127.0.0.1:8000/api/user/delete/${user.id}`,{
        method:'delete',
        headers:{
          'Authorization': `Bearer ${token}`
        }
      });
      const data= await res.json();
      
      await this.fetchUsers();
      }
      }
      catch(error){
        console.log(error);
      }
      
    },
    async Synchroniser(){
      try{
        let token=localStorage.getItem('token');
        
        const res=await fetch ('http://127.0.0.1:8000/api/users/getusers',{
          headers:{
          'Authorization': `Bearer ${token}`
        }
        });
      const data= await res.json();
      if(data.message){
        this.synchsuccess='les utilisateurs synchronisés avec le AD'
      }
      this.users=[];

      this.users=this.fetchUsers();
      if(this.users.length!==0){
        this.disponible=true;
        this.note=false;
      }
     
     else {
      this.note=true;
      this.disponible=false
     }
      }
      catch(error){
        console.log(error);
      }
    },
   //
    },
  

  // Lifecycle hooks are called at different stages
  // of a component's lifecycle.
  // This function will be called when the component is mounted.
  async created(){
    this.loading=true;
   await this.fetchUsers();
   
   
   }
   
}
</script>

<style>

</style>