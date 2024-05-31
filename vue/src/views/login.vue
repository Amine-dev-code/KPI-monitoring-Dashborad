<template>
<div class="bg-[#F4F7FA] ">
    <div class="ml-40 mt-20 h-96 pt-10 w-1/2 rounded-xl  bg-white" >
        <h1 class="flex flex-col font-bold ml-52 mb-6 text-blue-700 text-3xl ">Login</h1>
        <form @submit.prevent="signIn">
        <h3 class="ml-28">username</h3>
        <input type="text" v-model="credentials.username"  class="w-1/2 ml-28 h-8  placeholder:text-sm placeholder:pl-2 border-solid border-2 rounded-md bg-gray-300 border-zinc-300" placeholder="username"> <br>
        <div class="text-red-500 text-sm">{{  }}</div>
        <h3 class="ml-28 mt-4">password</h3>
        <input type="password" v-model="credentials.password"  class="w-1/2 ml-28 h-8 mt-2 placeholder:text-sm placeholder:pl-2 border-solid border-2 rounded-md  bg-gray-300  border-zinc-300" placeholder="password"> <br>
        <div class="text-red-500 text-sm text-center -ml-10">{{credentialError}}</div>
        <button class="ml-[135px] mt-10 px-4 py-2 my-2 w-2/5 text-white font-bold rounded-xl bg-blue-700" type="submit">Log in</button>
        <svg v-if="loading" class="mx-auto" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-dasharray="15" stroke-dashoffset="15" stroke-linecap="round" stroke-width="2" d="M12 3C16.9706 3 21 7.02944 21 12"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="15;0"/><animateTransform attributeName="transform" dur="1.5s" repeatCount="indefinite" type="rotate" values="0 12 12;360 12 12"/></path></svg>
      </form>
      </div>
</div>
</template>

<script>
export default {
name:'login',
data() {
      return {
        credentials:{
      username:'',
      password:''
        },
        credentialError:'',
        loading:false,
        
        
      }
    },
  
    // Methods are functions that mutate state and trigger updates.
    // They can be bound as event handlers in templates.
    methods: {
    AddUnit(){
      if (this.credentials.username==''){
        this.hostError="vous n'avez pas saisie votre username ";
      }
      if (this.credentials.password==''){
        this.portError="vous n'avez pas saisie votre mot de passe";
      }
      if(this.credentials.username==''|| this.credentials.password==''){
        return false;
        
      }

    },
    async signIn(){
      try{
        this.loading=true;
      const res=await fetch('http://127.0.0.1:8000/api/unite/login',{
        method:'post',
        body:JSON.stringify(this.credentials),
        headers:{
          'content-type': 'application/json',
        }
      });
      const data=await res.json();
      
        if(data.status=='success'){
          localStorage.setItem('token',data.token);
          localStorage.setItem('role',data.user.role);
          localStorage.setItem('username',data.user.username);
          localStorage.setItem('id',data.user.id);
          this.loading=false
          if(data.user.role=='admin'||data.user.role=='superadmin'){
            this.$router.push('/');
          }
          else{
            this.$router.push('/globdash');
          }
          
        }
        else{
          this.loading=false;
          this.credentialError='username ou mot de passe pas correcte'
        }
    }
    
    catch(error){
      console.log(error);
    }
  }
  }
      
    
}
</script>

<style>

</style>