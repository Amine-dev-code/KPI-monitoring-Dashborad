<template>
    <h1 class="flex justify-center mb-8 text-4xl font-bold bg-gradient-to-tl from-green-300 via-blue-500 to-purple-600 text-transparent bg-clip-text">{{ unitename }}-FINANCIERS</h1>
  <div class="grid grid-cols-3 ml-4 ">
    
    <div class="cnv " v-for="kpif in kpifin">
      <div class="flex justify-center ">
    <div class="flex flex-col mr-2">
      <h6 v-if="kpif.objectif" class="">objectif</h6>
      <h6 class="border-2 border-black rounded-md text-center bg-green-400">{{ kpif.objectif }}</h6>
    </div>
    <div  class="flex flex-col mr-2">
      <h6 class="" >évolution</h6>
      <h6 class="border-2 border-black rounded-md text-center  bg-green-400">{{ kpif.evolution }}</h6>
    </div>
    <div  class="flex flex-col mr-2">
      <h6 class=" ">réal-an</h6>
      <h6 class="border-2 border-black rounded-md text-center  bg-green-400">{{ kpif.realisation_an }}</h6>
    </div>
    </div>
    <canvas  :id="'myChart_'+kpif.name" ></canvas>
    </div>
    
  </div>
    
  </template>
  <script>
  
  import { Chart }  from 'chart.js/auto';
  
  // Register the custom controller
  
  
  
  export default {
    name: 'Dashboardfin',
    props:['id'],
    data() {
      return { 
        kpifin:[],
        kpis:[],
        listkpi:['Rotation de stock PF',
          'Moy de stock marchandise',
          'Adéquation FR ',
          'Fond de Roulement',
          'Rotation de stock',
          'Délais de couverture du stock PF',
          'Délais de couverture du stock MP',
          'Moyenne durée découllement du Stock PF',
          'Moyenne durée découllement du Stock MP',
          'Moyenne durée découllement du Stock marchandise',
          'Délais de couverture du stock de marchandise',
          'Rotation de stock MP',
          'Moyenne durée de  règlements Crédits Clients',
          'Moyenne durée de paiement dettes founisseur',
          'Moy de solde fournisseurs',
          'Moy de solde clients',
          'Taux de marge brute MB',
          'Taux de marque',
          'Taux de Marge sur Charges variables',
          'Rentabilité commercial',
          'Rentabilité Financière',
          'Taux de charges'
       ],
        unitename:''
      };
    },
    methods: {
      async fetchunitkpifin(){
        try{
          let token=localStorage.getItem('token');
          const res=await fetch (`http://127.0.0.1:8000/api/kpifin/${this.id}`,{
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
      const kpis=await this.fetchunitkpifin();
      this.kpis = Object.values(kpis);
      
     
      
      // Initialize the initial chart data
      this.kpifin.forEach(kpif => {
        
      const data = {
        labels: [kpif.name,'NON ATTEINT'],
        datasets: [{
          
          data: [kpif.main,kpif.objectif-kpif.main], // Include 'numer' in the data array
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
      text:kpif.name
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
      ctx.fillText(kpif.main,xCoor,yCoor);
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
      const myChart = new Chart(document.getElementById('myChart_'+kpif.name), config);
    });
    },
  
  
  
    async created(){
      const kpis=await this.fetchunitkpifin();
      this.kpis = Object.values(kpis);
      
      let n=this.kpis.length;
      let i=1;
      let k=0;
      while(i<n-4){
        if(k!=16 && k!=17 && k!=18 && k!=19 && k!=20 && k!=21){
          let kpifinunit={
          name:null,
          main:null,
          evolution:null,
          realisation_an:null,
        }
        
          kpifinunit.name=this.listkpi[k];
          kpifinunit.main=this.kpis[i++];
          kpifinunit.realisation_an=this.kpis[i++];
          kpifinunit.evolution=this.kpis[i++]+' %';
          this.kpifin.push(kpifinunit);
        }
        else{
          let kpifinunit={
          name:null,
          main:null,
          evolution:null,
          realisation_an:null,
          objectif:null
        }
        kpifinunit.name=this.listkpi[k];
          kpifinunit.main=this.kpis[i++];
          kpifinunit.realisation_an=this.kpis[i++]+' %';
          kpifinunit.evolution=this.kpis[i++]+' %';
          kpifinunit.objectif=this.kpis[i++];
          this.kpifin.push(kpifinunit);
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
  
  