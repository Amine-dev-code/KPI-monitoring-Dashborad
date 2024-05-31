<template>
    <div class="flex flex-col">
<h1 class="mx-auto font-montserrat text-xl font-bold mt-10">KPI Pour les Gérant</h1>
    <table v-for="currentuniteg in currentUnitesglb" :key="currentuniteg.id" class="mx-auto mt-10">
        <tr>
            <th>{{ currentuniteg.unitename }}</th>
        </tr>
        <tr>
            <td>
                <label :for="'checkg_'+currentuniteg.id" class="bg-blue-500 mx-auto cursor-pointer relative w-20 h-10 rounded-full float-right">
                    <input v-model="currentuniteg.status"  @click="Toggleunitglb(id,currentuniteg.id)" type="checkbox" :id="'checkg_'+currentuniteg.id" class="sr-only peer">
                    <span class="w-2/5 h-4/5 bg-slate-500 top-1 left-1 absolute rounded-full peer-checked:bg-green-600 peer-checked:left-11 transition-all duration-500"></span>
                </label>
            </td>
        </tr>
    
    </table>
    
    
    <h1 class="mx-auto font-montserrat text-xl font-bold mt-10">KPI Pour les financier</h1>
    <table v-for="currentunitef in currentUnitesfin" :key="currentunitef.id" class="mx-auto mt-10">
        <tr>
            <th>{{ currentunitef.unitename }}</th>
        </tr>
        <tr>
            <td>
                <label :for="'checkf_'+currentunitef.id" class="bg-blue-500 mx-auto cursor-pointer relative w-20 h-10 rounded-full float-right">
                    <input v-model="currentunitef.status"  @click="Toggleunitfin(id,currentunitef.id)" type="checkbox" :id="'checkf_'+currentunitef.id" class="sr-only peer">
                    <span class="w-2/5 h-4/5 bg-slate-500 top-1 left-1 absolute rounded-full peer-checked:bg-green-600 peer-checked:left-11 transition-all duration-500"></span>
                </label>
            </td>
        </tr>
    
    </table>
    </div>
   
  
</template>

<script>
export default {
props:['id'],
name:'Roles',
 data() {
    return {
      currentUnitesglb:[],
      unites:[],
      userunitesglb:[],
      userunitesfin:[],
      currentUnitesfin:[],

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
      return data;
      }
      catch(error){
        console.log(error);
      }
      
    },
    async fetchUserUnitesglb(){
      try{
        let token=localStorage.getItem('token');
      const res=await fetch (`http://127.0.0.1:8000/api/user/unite/kpiglob/${this.id}`,{
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
    async fetchUserUnitesfin(){
      try{
        let token=localStorage.getItem('token');
      const res=await fetch (`http://127.0.0.1:8000/api/user/unite/kpifin/${this.id}`,{
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
     isFoundedArray(arr1, arr2) {
  let found = false;

  // Convert both arrays to JSON strings and compare them
  const arr1String = JSON.stringify(arr1);
  for (let item of arr2) {
    if (JSON.stringify(item) === arr1String) {
      found = true;
      break;
    }
  }

  return found;
},
async Toggleunitglb(user,unite){
  try{
    let token=localStorage.getItem('token');
  
  const res=await fetch (`http://127.0.0.1:8000/api/kpiglb/ajout/${user}/${unite}`,{
    headers:{
            'Authorization': `Bearer ${token}`
          }
  });
      const data= await res.json();
  }
  catch(error){
    console.log(error);
  }
      
   
},
async Toggleunitfin(user,unite){
  try{
    let token=localStorage.getItem('token');
  const res=await fetch (`http://127.0.0.1:8000/api/kpifin/ajout/${user}/${unite}`,{
    headers:{
            'Authorization': `Bearer ${token}`
          }
  });
      const data= await res.json();
  }
  catch(error){
    console.log(error);
  }
      
   
}
},
async created(){

  
    this.unites=await this.fetchUnites();
    this.userunitesglb=await this.fetchUserUnitesglb();
    for(let unit of this.unites){
        let userunit={
       id:null,
       unitename:null,
       status:null
      }
      if(this.unites.length!=0){
        
        if(this.isFoundedArray(unit,this.userunitesglb)){
            userunit.id=unit.id;
            userunit.unitename=unit.unitename;
            userunit.status=true;
            this.currentUnitesglb.push(userunit);
        }
        else{
            userunit.id=unit.id;
            userunit.unitename=unit.unitename;
            userunit.status=false
            this.currentUnitesglb.push(userunit);
        }
    }
    }
    this.userunitesfin=await this.fetchUserUnitesfin();
    for(let unit1 of this.unites){
        let userunit1={
       id:null,
       unitename:null,
       status:null
      }
      if(this.unites.length!=0){
        
        if(this.isFoundedArray(unit1,this.userunitesfin)){
            userunit1.id=unit1.id;
            userunit1.unitename=unit1.unitename;
            userunit1.status=true;
            this.currentUnitesfin.push(userunit1);
        }
        else{
            userunit1.id=unit1.id;
            userunit1.unitename=unit1.unitename;
            userunit1.status=false
            this.currentUnitesfin.push(userunit1);
        }
    }
    }

   



  

  // Lifecycle hooks are called at different stages
  // of a component's lifecycle.
  // This function will be called when the component is mounted.
}
}
</script>

<style>

</style>