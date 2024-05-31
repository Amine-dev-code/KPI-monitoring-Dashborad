<template>
  <h1 class="flex justify-center mb-8 text-4xl font-bold bg-gradient-to-tl from-green-300 via-blue-500 to-purple-600 text-transparent bg-clip-text">{{ unitename }}-GLOBAL</h1>
<div class="grid grid-cols-3 ml-4 ">
  
  <div class="cnv " v-for="kpig in kpiglb">
    <div class="flex justify-between ">
    <div class="flex flex-col mr-1">
      <h6 class="font-bold">objectif</h6>
      <h6 class="border-2 border-black rounded-md text-center bg-green-400">{{ kpig.objectif }}</h6>
    </div>
    <div  class="flex flex-col mr-1">
      <h6 class="font-bold">réalisation</h6>
      <h6 class="border-2 border-black rounded-md text-center  bg-green-400">{{ kpig.realisation }}</h6>
    </div>
    <div  class="flex flex-col mr-1">
      <h6 class="font-bold" >évolution</h6>
      <h6 class="border-2 border-black rounded-md text-center  bg-green-400">{{ kpig.evolution }}</h6>
    </div>
    <div  class="flex flex-col mr-2">
      <h6 class="font-bold ">réal-an</h6>
      <h6 class="border-2 border-black rounded-md text-center  bg-green-400">{{ kpig.realisation_an }}</h6>
    </div>
    </div>
  <canvas  :id="'myChart_'+kpig.name" ></canvas>
  </div>
  
</div>
  
</template>


<script>

import { Chart }  from 'chart.js/auto';

// Register the custom controller



export default {
  name: 'Dashboardglob',
  props:['id'],
  data() {
    return { 
      kpiglb:[],
      kpis:[],
      listkpi:['Marge brute MB','CA net','Résultat net','Charges de fonctionnement','Charges variables','Charges fixes','Marge sur Charges variables (MCV)','Rentabilité commercial',
        'Rentabilité Financière'],
      unitename:''
    };
  },
  methods: {
    async fetchunitkpiglb(){
      try{
        let token=localStorage.getItem('token');
        const res=await fetch (`http://127.0.0.1:8000/api/kpiglob/${this.id}`,{
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
        
    // Your methods here
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
  async mounted() {
    const kpis=await this.fetchunitkpiglb();
    this.kpis = Object.values(kpis);
    // Initialize the initial chart data
    this.kpiglb.forEach(kpig => {
      
    const data = {
      labels: [kpig.name,'NON ATTEINT'],
      datasets: [{
        
        data: [kpig.main,kpig.objectif-kpig.main], // Include 'numer' in the data array
        backgroundColor: [
          'rgb(54, 162, 235)',
          'rgb(255, 99, 132)', 
        ],
        hoverOffset: 8,
      }],
      
    };
    const options = {
  plugins: {
    tooltip:{
      callbacks:{
        label:context=>{
          const dataPoint=context.dataIndex;
          return `${context.dataset.data[dataPoint]}`;
        }
      },
      
    },
  title:{
    display:true,
    text:kpig.name
  },
  
  
  
  },
  cutout: '50%',
  circumference:'180',
  rotation:'270'
};
const doughnutlabel={
  id:'doughnutlabel',
  beforeDatasetsDraw(chart,args,pluginOptions){
    const {ctx,data}=chart;
    ctx.save();
    const xCoor=chart.getDatasetMeta(0).data[0].x;
    const yCoor=chart.getDatasetMeta(0).data[0].y;
    ctx.font='bold 15px sans-serif';
    ctx.fillstyle='rgba(54,162,235,1)';
    ctx.textAlign='center'
    ctx.fillText(kpig.main,xCoor,yCoor);
  }

}
    // Configure the chart
    const config = {
      type: 'doughnut',
      data: data,
      options:options,
      plugins:[doughnutlabel]
    };
    

    // Create the chart
    const myChart = new Chart(document.getElementById('myChart_'+kpig.name), config);
  });
  },



  async created(){
    const kpis=await this.fetchunitkpiglb();
    this.kpis = Object.values(kpis);
    let n=this.kpis.length;
    let i=1;
    let k=0;
    while(i<n-4){
      let kpiglbunit={
        name:null,
        main:null,
        evolution:null,
        objectif:null,
        realisation:null,
        realisation_an:null,
       
      }
      if(k==7||k==8){
        kpiglbunit.name=this.listkpi[k];
        kpiglbunit.main=this.kpis[i++];
        kpiglbunit.objectif=this.kpis[i++];
        kpiglbunit.realisation_an=this.kpis[i++]+' %';
        kpiglbunit.realisation=this.kpis[i++]+' %';
        kpiglbunit.evolution=this.kpis[i++]+' %';
        this.kpiglb.push(kpiglbunit);
      }
      else{
        kpiglbunit.name=this.listkpi[k];
        kpiglbunit.main=this.kpis[i++];
        kpiglbunit.objectif=this.kpis[i++];
        kpiglbunit.realisation_an=this.kpis[i++];
        kpiglbunit.realisation=this.kpis[i++]+' %';
        kpiglbunit.evolution=this.kpis[i++]+' %';
        this.kpiglb.push(kpiglbunit);
      }
        
        k++;
        
    }
    let unitenames=await this.fetchUnites()
    for(let unitenamy of unitenames){
      if(unitenamy.id==this.id){
        this.unitename=unitenamy.unitename;
      }
    }
    
  }
};
</script>
<style scoped>
.cnv{
width: 300px; /* Set the desired width */
height: 300px;
margin-bottom: 40px;


}



</style>

