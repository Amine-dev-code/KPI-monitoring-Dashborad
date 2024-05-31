<template>
    <div class=" flex justify-start ">
     
      <AddUnit v-show="activate"  @close="closeit"/>
      <EditUnit v-show="activEdit" @closeEdit="closeEdit" :currentUnit="currentUnit"/>
  <table v-if="disponible" class="w-full border-2 bg-white mt-32 mx-2 shadow-lg ">
    <tr>
    <th>Host</th>
    <th>Port</th>
    <th>Nom de la BD</th>
    <th>Username</th>
    <th>Nom d'unité</th>
    <th>Devise</th>
    <th>Dernière modification</th>
    <th>Action 1</th>
    <th>Action 2</th>
    </tr>
    <tr v-for="unite in unites" class="h-16 font-bold">
      <td class="text-center">{{ unite.host}}</td>
      <td class="text-center">{{ unite.port}}</td>
      <td class="text-center">{{ unite.databasename}}</td>
      <td class="text-center">{{ unite.username}}</td>
      <td class="text-center">{{ unite.unitename}}</td>
      <td class="text-center">{{ unite.currency}}</td>
      <td class="text-center">{{ unite.updated_at}}</td>
      <td class="text-center"><button @click="ToggleEdit(unite)" class="rounded-2xl p-2 bg-gradient-to-r from-green-400 to-blue-500 text-white">Modifier</button></td>
      <td class="text-center"><button @click="DeleteUnit(unite)" class="rounded-xl p-1 px-3 bg-gradient-to-tr from-pink-500 via-red-500 to-yellow-500 text-white">Supprimer</button></td>
    </tr>
  </table>
    </div>
    <svg v-if="loading" class="mx-auto my-40" xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-dasharray="15" stroke-dashoffset="15" stroke-linecap="round" stroke-width="2" d="M12 3C16.9706 3 21 7.02944 21 12"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="15;0"/><animateTransform attributeName="transform" dur="1.5s" repeatCount="indefinite" type="rotate" values="0 12 12;360 12 12"/></path></svg>
   <div v-show="note" class="flex justify-start items-center my-40 ">
    <svg class="ml-40"  xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24"><path fill="none" stroke="red" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m3 3l18 18M4 7h3m4 0h9m-10 4v6m4-3v3M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l.077-.923m.307-3.704L19 7M9 5V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3"/></svg>
    <h1 class="text-xl font-bold text-red-600">Y a pas des unités!</h1>
    </div>
    <button class="float-right mr-10 bg-gradient-to-r from-blue-100 via-blue-300 to-blue-500 rounded-2xl p-2 mt-10 font-bold " @click="AddUnit">Ajouter une unitée</button>
    
    
  </template>

<script>
import AddUnit from '../components/AddUnit.vue'
import EditUnit from '../components/EditUnit.vue'
import moment from 'moment'
export default {
    name:'unites',
    components:{AddUnit,EditUnit},
    data() {
    return {
     unites:[],
     loading:false,
     note:false,
     disponible:false,
     activate:false,
     activEdit:false,
     currentUnit:{},
    

    }
  },

  // Methods are functions that mutate state and trigger updates.
  // They can be bound as event handlers in templates.
  methods: {
    async fetchUnites(){
      try{
        let token=localStorage.getItem('token');
        const res=await fetch ('http://127.0.0.1:8000/api/unite/databases',{
          headers:{
          'Authorization': `Bearer ${token}`
        }
        });
      const data= await res.json();
      this.unites=[];
      for(let info of data){
        moment.locale('fr');
        info.updated_at=moment(info.updated_at).format('MMMM Do YYYY, h:mm:ss a');
        this.unites.push(info);
      }
      
   if(this.unites.length!==0)
    this.disponible=true;
    else{
      this.note=true;
      this.disponible=false;
    }
    this.loading=false;
      }
      catch(error){
        console.log(error);
      }
   },
  
    async DeleteUnit(unite){
      try{
        let token=localStorage.getItem('token');
        if(confirm("etes vous sur de supprimer "+"l'unité "+unite.unitename+"?")){const res=await fetch (`http://127.0.0.1:8000/api/unit/destroy/${unite.id}`,{
        mehtod:'delete',
        headers:{
          'Authorization': `Bearer ${token}`
        }
      });
      const data= await res.json();
      
      await this.fetchUnites();
      
      }
      
      }
      catch(error){
        console.log(error);
      }
    },
    AddUnit(){
      this.activate=true;
      
    },
    closeit(){
      this.activate=!this.activate;
    },
    ToggleEdit(unite){
      this.currentUnit=unite;
      this.activEdit=true;
    },
    closeEdit(){
      this.activEdit=!this.activEdit;
    }
  },
  
  

  // Lifecycle hooks are called at different stages
  // of a component's lifecycle.
  // This function will be called when the component is mounted.
  async created(){
  this.loading=true;
  await this.fetchUnites();
 
   
   
}
}
</script>




<style>

</style>