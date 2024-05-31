<template>
    <div class="fixed  w-full h-full " @click.self="closeformedit">
      <div class="bg-white rounded-xl ml-40 mt-20 w-2/5 h-fit">
        <div class="ml-20 pt-10 my-auto w-4/5">
          <h1 class=" font-bold ml-28 text-blue-700 ">Modifier l'Unité</h1>
          <form @submit.prevent="EditUnit">
          <input type="text" v-model="currentUnit.host" class="w-4/5  h-8 mt-4 placeholder:text-sm placeholder:pl-2 border-solid border-2 rounded-md border-zinc-300" placeholder="host"> <br>
          <div class="text-red-500 text-sm">{{ hostError }}</div>
          <input type="text" v-model="currentUnit.port" class="w-4/5 h-8 mt-2 placeholder:text-sm placeholder:pl-2 border-solid border-2 rounded-md  border-zinc-300" placeholder="port"> <br>
          <div class="text-red-500 text-sm">{{ portError }}</div>
          <input type="text" v-model="currentUnit.databasename" class="w-4/5 h-8 mt-2 placeholder:text-sm placeholder:pl-2 border-solid border-2 rounded-md  border-zinc-300" placeholder="le nom de la base de donnée"> <br>
          <div class="text-red-500 text-sm">{{ bddnameError }}</div>
          <input type="text" v-model="currentUnit.username" class="w-4/5 h-8 mt-2 placeholder:text-sm placeholder:pl-2 border-solid border-2 rounded-md border-zinc-300" placeholder="userame"> <br>
          <div class="text-red-500 text-sm">{{ usernameError }}</div>
          <input type="password" v-model="currentUnit.password" class="w-4/5 h-8 mt-2 placeholder:text-sm placeholder:pl-2 border-solid border-2 rounded-md border-zinc-300" placeholder="mot de passe"> <br>
          <div class="text-red-500 text-sm">{{ passwordError }}</div>
          <input type="text" v-model="currentUnit.unitename" class="w-4/5 h-8 mt-2 placeholder:text-sm placeholder:pl-2 border-solid border-2 rounded-md border-zinc-300" placeholder="Le nom de l'unité"> <br>
          <div class="text-red-500 text-sm">{{ unitenameError }}</div>
          <input v-model="currentUnit.currency" class="w-4/5 h-8 mt-2 placeholder:text-sm placeholder:pl-2 border-solid border-2 rounded-md border-zinc-300" placeholder="Devise"> <br>
          <div class="text-green-600 text-sm">{{ success }}</div>
          <div class="text-red-500 text-sm">{{ error }}</div>
          <button class="ml-32 px-4 py-2 my-2 text-white font-bold rounded-xl bg-blue-700" type="submit">Modifier</button>
          <svg v-if="loading" class="ml-40" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-dasharray="15" stroke-dashoffset="15" stroke-linecap="round" stroke-width="2" d="M12 3C16.9706 3 21 7.02944 21 12"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="15;0"/><animateTransform attributeName="transform" dur="1.5s" repeatCount="indefinite" type="rotate" values="0 12 12;360 12 12"/></path></svg>
          
        </form>
          
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
  name:'EditUnit',
  props:['currentUnit'],
  data() {
        return {
          error:'',
          success:'',
          loading:false,
          hostError:'',
          portError:'',
          bddnameError:'',
          usernameError:'',
          passwordError:'',
          unitenameError:'',
          currencyError:'',
          loading:false
  
        }
      },
    
      // Methods are functions that mutate state and trigger updates.
      // They can be bound as event handlers in templates.
      methods: {
      EditUnit(){
        if (this.currentUnit.host==''){
          this.hostError="vous n'avez pas saisie le host";
        }
        if (this.currentUnit.port==''){
          this.portError="vous n'avez pas saisie le port";
          
        }
        if (this.currentUnit.databasename==''){
          this.bddnameError="vous n'avez pas saisie le nom de la BD";
          
        }
        if (this.currentUnit.username==''){
          this.usernameError="vous n'avez pas saisie le username";
          
        }
        if (this.currentUnit.password==''){
          this.passwordError="vous n'avez pas saisie le password";
        }
        if (this.currentUnit.unitename==''){
          this.unitenameError="vous n'avez pas saisie le nom de l'unité";
        }
        if (this.currentUnit.currency==''){
          this.unitenameError="vous n'avez pas saisie le devise de cette unité";
        }
        if(this.currentUnit.host==''|| this.currentUnit.port=='' || this.currentUnit.databasename=='' || this.currentUnit.username==''||this.currentUnit.password==''||this.currentUnit.currency==''){
          return false;
        }
        this.fetchEditUnit();
  
      },
      async fetchEditUnit(){
        try{
        this.error='';
        this.success='';
        this.hostError='';
        this.portError='';
        this.bddnameError='';
        this.usernameError='';
        this.passwordError='';
        this.unitenameError='';
        this.currencyError='';
          this.loading=true;
          let token=localStorage.getItem('token');
        const res=await fetch(`http://127.0.0.1:8000/api/unite/update/${this.currentUnit.id}`,{
          method:'put',
          body:JSON.stringify(this.currentUnit),
          headers:{
            'content-type':'application/json',
            'Authorization': `Bearer ${token}`
          }
        });
        const data= await res.json();
        this.loading=false;
        if(data.status=='error'){
          this.error="error credentials!";
        }
        else{
          this.success=data.message;
        }
      }
        catch(error){
          console.log(error);
        }
          
      },
      closeformedit(){
        this.$emit('closeEdit');
      }
    }
        
      
    
      // Lifecycle hooks are called at different stages
      // of a component's lifecycle.
      // This function will be called when the component is mounted.
      
  }
  
  </script>
  
  <style>
  
  
  </style>