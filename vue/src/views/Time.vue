<template>
  <div class="w-full h-full">
    <div class="mx-auto mt-40 border-2 border-solid border-black w-[60%] rounded-lg">
    <h2 class="text-xl ml-20 mb-10 font-bold text-green-500 mt-4">Planifier votre mise à jour des base de données </h2>
    <form  @submit.prevent="addTime" class="ml-56 mb-10 flex flex-col ">
        <label for="time" class="font-bold mr-4">Horraire (GMT)</label>
        <input v-model="settime.time" type="time" class="w-2/5 rounded-full" id="time">
        <button class=" mt-4 px-4 py-2 my-2 w-2/5 text-white font-bold rounded-xl bg-blue-700" type="submit">ajouter</button>
        <svg v-if="loading" class="ml-20" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-dasharray="15" stroke-dashoffset="15" stroke-linecap="round" stroke-width="2" d="M12 3C16.9706 3 21 7.02944 21 12"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="15;0"/><animateTransform attributeName="transform" dur="1.5s" repeatCount="indefinite" type="rotate" values="0 12 12;360 12 12"/></path></svg>
    </form>
</div>
  </div>
</template>

<script>
export default {
name:'Timing',
data() {
      return {
        timing:'',
        settime:{
            time:''
        },
        loading:null,
        secloading:null
      }
    },
  
    // Methods are functions that mutate state and trigger updates.
    // They can be bound as event handlers in templates.
    methods: {
   
    async getTime(){
      try{
        let token=localStorage.getItem('token');
      const res=await fetch('http://127.0.0.1:8000/api/time',{
        headers:{
          'Authorization': `Bearer ${token}`
        }
      });
      const data= await res.json();
      return data.time.time;
      }catch(error){
        console.log(error);
      }
      
    },
    async addTime(){
        try{
          this.loading=true
          let token=localStorage.getItem('token');
        const res=await fetch('http://127.0.0.1:8000/api/time/ajout',{
        method:'post',
        body:JSON.stringify(this.settime),
        headers:{
          'content-type': 'application/json',
          'Authorization': `Bearer ${token}`
        }
      });
      this.loading=false;
        }
        catch(error){
          console.log(error);
        }
    },
  },
  async created(){
       this.settime.time=await this.getTime();
       
       
    }
}
</script>

<style>

</style>