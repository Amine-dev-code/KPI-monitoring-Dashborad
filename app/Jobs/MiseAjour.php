<?php

namespace App\Jobs;

use App\Models\Kpifin;
use App\Models\Kpiglob;
use App\Models\Unite;
use Artisan;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MiseAjour implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $tries = 5;
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $autodatas=Unite::all();
        // Create a new database configuration array
        foreach($autodatas as $autodata){
            $autodata->touch();
           $value=$autodata->password;
            $passdata = Crypt::decryptString($value);
          
        $databaseConfig = [
            'driver' => 'pgsql',
            'host' => $autodata->host,
            'port' => $autodata->port,
            'database' => $autodata->databasename, 
            'username' => $autodata->username,
            'password' => $passdata,
        ];
        $dataname=$autodata->databasename;
        
        config(['database.connections.'.$dataname => $databaseConfig]);
        
        DB::reconnect($dataname);
       
        // Use the dynamically added database connection
        $data=['Marge brute MB','CA net','Résultat net','Charges de fonctionnement','Charges variables','Charges fixes','Marge sur Charges variables (MCV)','Rentabilité commercial',
        'Rentabilité Financière']; 
        $idkpiglob=$autodata->kpi_glob->id;
        $updatedkpiglobs= Kpiglob::findOrfail($idkpiglob);
        $preproduits = [];
        foreach ($data as $item){
           $kpi = DB::connection($dataname)->table('bi_fact_metrique')
           ->select('balance','balance_prev','balance_ant')
           ->where('name',$item)
           ->get();
           $preproduits[]=$kpi[0]->balance;//kpi
           if($kpi[0]->balance_prev==null){
               $preproduits[]=0;
           }
           else{
               $preproduits[]=$kpi[0]->balance_prev;//objectif
           }
           $preproduits[]=$kpi[0]->balance_ant;//realisatoin an-1
           if($kpi[0]->balance_prev==0){
               $preproduits[]=0;
           }
           else{
               $preproduits[]=$kpi[0]->balance/$kpi[0]->balance_prev;//realisation
           }
           if($kpi[0]->balance_ant==0){
               $preproduits[]=0;
           }
           else{
               $preproduits[]=$kpi[0]->balance/$kpi[0]->balance_ant;//evolution
           }
          
       }
       $i=0;
       $updatedkpiglobs->Marge_Brute_MB=round((float)$preproduits[$i++]);
       $updatedkpiglobs->Marge_Brute_MB_objectif=round((float)$preproduits[$i++]);
       $updatedkpiglobs->Marge_Brute_MB_realisation_an=round((float)$preproduits[$i++]);
       $updatedkpiglobs->Marge_Brute_MB_realisation=round((float)$preproduits[$i++]*100);
       $updatedkpiglobs->Marge_Brute_MB_evolution=round((float)$preproduits[$i++]*100);
       $updatedkpiglobs->CA_net=round((float)$preproduits[$i++]);
       $updatedkpiglobs->CA_net_objectif=round((float)$preproduits[$i++]);
       $updatedkpiglobs->CA_net_realisation_an=round((float)$preproduits[$i++]);
       $updatedkpiglobs->CA_net_realisation=round((float)$preproduits[$i++]*100);
       $updatedkpiglobs->CA_net_evolution=round((float)$preproduits[$i++]*100);
       $updatedkpiglobs->Resultat_net=round((float)$preproduits[$i++]);
       $updatedkpiglobs->Resultat_net_objectif=round((float)$preproduits[$i++]);
       $updatedkpiglobs->Resultat_net_realisation_an=round((float)$preproduits[$i++]);
       $updatedkpiglobs->Resultat_net_realisation=round((float)$preproduits[$i++]*100);
       $updatedkpiglobs->Resultat_net_evolution=round((float)$preproduits[$i++]*100);
       $updatedkpiglobs->Charges_fonctionnement=round((float)$preproduits[$i++]);
       $updatedkpiglobs->Charges_fonctionnement_objectif=round((float)$preproduits[$i++]);
       $updatedkpiglobs->Charges_fonctionnement_realisation_an=round((float)$preproduits[$i++]);
       $updatedkpiglobs->Charges_fonctionnement_realisation=round((float)$preproduits[$i++]*100);
       $updatedkpiglobs->Charges_fonctionnement_evolution=round((float)$preproduits[$i++]*100);
       $updatedkpiglobs->Charges_variables=round((float)$preproduits[$i++]);
       $updatedkpiglobs->Charges_variables_objectif=round((float)$preproduits[$i++]);
       $updatedkpiglobs->Charges_variables_realisation_an=round((float)$preproduits[$i++]);
       $updatedkpiglobs->Charges_variables_realisation=round((float)$preproduits[$i++]*100);
       $updatedkpiglobs->Charges_variables_evolution=round((float)$preproduits[$i++]*100);
       $updatedkpiglobs->Charges_fixes=round((float)$preproduits[$i++]);
       $updatedkpiglobs->Charges_fixes_objectif=round((float)$preproduits[$i++]);
       $updatedkpiglobs->Charges_fixes_realisation_an=round((float)$preproduits[$i++]);
       $updatedkpiglobs->Charges_fixes_realisation=round((float)$preproduits[$i++]*100);
       $updatedkpiglobs->Charges_fixes_evolution=round((float)$preproduits[$i++]*100);
       $updatedkpiglobs->Marge_Charges_variables=round((float)$preproduits[$i++]);
       $updatedkpiglobs->Marge_Charges_variables_objectif=round((float)$preproduits[$i++]);
       $updatedkpiglobs->Marge_Charges_variables_realisation_an=round((float)$preproduits[$i++]);
       $updatedkpiglobs->Marge_Charges_variables_realisation=round((float)$preproduits[$i++]*100);
       $updatedkpiglobs->Marge_Charges_variables_evolution=round((float)$preproduits[$i++]*100);
       $updatedkpiglobs->Rentabilité_commercial=round((float)$preproduits[$i++]*100);
       $updatedkpiglobs->Rentabilité_commercial_objectif=round((float)$preproduits[$i++]*100);
       $updatedkpiglobs->Rentabilité_commercial_realisation_an=round((float)$preproduits[$i++]*100);
       $updatedkpiglobs->Rentabilité_commercial_realisation=round((float)$preproduits[$i++]*100);
       $updatedkpiglobs->Rentabilité_commercial_evolution=round((float)$preproduits[$i++]*100);
       $updatedkpiglobs->Rentabilité_Financière=round((float)$preproduits[$i++]*100);
       $updatedkpiglobs->Rentabilité_Financière_objectif=round((float)$preproduits[$i++]*100);
       $updatedkpiglobs->Rentabilité_Financière_realisation_an=round((float)$preproduits[$i++]*100);
       $updatedkpiglobs->Rentabilité_Financière_realisation=round((float)$preproduits[$i++]*100);
       $updatedkpiglobs->Rentabilité_Financière_evolution=round((float)$preproduits[$i++]*100);
       $updatedkpiglobs->update();
          $donne=['Rotation de stock PF',
          'Moy de stock marchan',
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
          'Taux de marque ',
          'Taux de Marge sur Charges variables',
          'Rentabilité commercial',
          'Rentabilité Financière',
          'Taux de charges'
       ];
        $idkpifin=$autodata->kpi_fin->id;
        $updatedkpifins=Kpifin::findOrfail($idkpifin);
        
       $preprodct=[];
       $k=0;
       foreach($donne as $item) {
           if($k==16||$k==17||$k==18||$k==19||$k==20||$k==21){
           $kpi = DB::connection($dataname)->table('bi_fact_metrique')
           ->select('balance','balance_ant','balance_prev')
           ->where('name',$item)
           ->get();
           $preprodct[]=$kpi[0]->balance;
           $preprodct[]=$kpi[0]->balance_ant;//realisation an-1
           if($kpi[0]->balance_ant==0){
               $preprodct[]=0;
           }
           else{
               $preprodct[]=$kpi[0]->balance/$kpi[0]->balance_ant;//revolution
           }
           if($kpi[0]->balance_prev==null){
               $preprodct[]=0;
           }
           else{
               $preprodct[]=$kpi[0]->balance_prev;//objectif
           }
           }
           else{
           $kpi = DB::connection($dataname)->table('bi_fact_metrique')
           ->select('balance','balance_ant')
           ->where('name',$item)
           ->get();
           $preprodct[]=$kpi[0]->balance;
           $preprodct[]=$kpi[0]->balance_ant;//realisation an-1
           if($kpi[0]->balance_ant==0){
               $preprodct[]=0;
           }
           else{
               $preprodct[]=$kpi[0]->balance/$kpi[0]->balance_ant;//revolution
           }
           }
           $k++;
       }
       $j=0;
           $updatedkpifins->Rotation_stock_PF=round((float)$preprodct[$j++]);
           $updatedkpifins->Rotation_stock_PF_realisation_an=round((float)$preprodct[$j++]);
           $updatedkpifins->Rotation_stock_PF_evolution=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Moy_stock_marchan=round((float)$preprodct[$j++]);
           $updatedkpifins->Moy_stock_marchan_realisation_an=round((float)$preprodct[$j++]);
           $updatedkpifins->Moy_stock_marchan_evolution=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Adequation_FR=round((float)$preprodct[$j++]);
           $updatedkpifins->Adequation_FR_realisation_an=round((float)$preprodct[$j++]);
           $updatedkpifins->Adequation_FR_evolution=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Fond_Roulement=round((float)$preprodct[$j++]);
           $updatedkpifins->Fond_Roulement_realisation_an=round((float)$preprodct[$j++]);
           $updatedkpifins->Fond_Roulement_evolution=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Rotation_stock=round((float)$preprodct[$j++]);
           $updatedkpifins->Rotation_stock_realisation_an=round((float)$preprodct[$j++]);
           $updatedkpifins->Rotation_stock_evolution=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Delais_couverture_stock_PF=round((float)$preprodct[$j++]);
           $updatedkpifins->Delais_couverture_stock_PF_realisation_an=round((float)$preprodct[$j++]);
           $updatedkpifins->Delais_couverture_stock_PF_evolution=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Delais_couverture_stock_MP=round((float)$preprodct[$j++]);
           $updatedkpifins->Delais_couverture_stock_MP_realisation_an=round((float)$preprodct[$j++]);
           $updatedkpifins->Delais_couverture_stock_MP_evolution=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Moy_duree_decoullement_Stock_PF=round((float)$preprodct[$j++]);
           $updatedkpifins->Moy_duree_decoullement_Stock_PF_realisation_an=round((float)$preprodct[$j++]);
           $updatedkpifins->Moy_duree_decoullement_Stock_PF_evolution=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Moy_duree_decoullement_Stock_MP=round((float)$preprodct[$j++]);
           $updatedkpifins->Moy_duree_decoullement_Stock_MP_realisation_an=round((float)$preprodct[$j++]);
           $updatedkpifins->Moy_duree_decoullement_Stock_MP_evolution=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Moy_duree_decoullement_Stock_marchandise=round((float)$preprodct[$j++]);
           $updatedkpifins->Moy_duree_decoullement_Stock_marchandise_realisation_an=round((float)$preprodct[$j++]);
           $updatedkpifins->Moy_duree_decoullement_Stock_marchandise_evolution=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Delais_couverture_stock_marchandise=round((float)$preprodct[$j++]);
           $updatedkpifins->Delais_couverture_stock_marchandise_realisation_an=round((float)$preprodct[$j++]);
           $updatedkpifins->Delais_couverture_stock_marchandise_evolution=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Rotation_stock_MP=round((float)$preprodct[$j++]);
           $updatedkpifins->Rotation_stock_MP_realisation_an=round((float)$preprodct[$j++]);
           $updatedkpifins->Rotation_stock_MP_evolution=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Moy_duree_reglements_Credits_Clients=round((float)$preprodct[$j++]);
           $updatedkpifins->Moy_duree_reglements_Credits_Clients_realisation_an=round((float)$preprodct[$j++]);
           $updatedkpifins->Moy_duree_reglements_Credits_Clients_evolution=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Moy_duree_paiement_dettes_founisseur=round((float)$preprodct[$j++]);
           $updatedkpifins->Moy_duree_paiement_dettes_founisseur_realisation_an=round((float)$preprodct[$j++]);
           $updatedkpifins->Moy_duree_paiement_dettes_founisseur_evolution=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Moy_solde_fournisseurs=round((float)$preprodct[$j++]);
           $updatedkpifins->Moy_solde_fournisseurs_realisation_an=round((float)$preprodct[$j++]);
           $updatedkpifins->Moy_solde_fournisseurs_evolution=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Moy_solde_clients=round((float)$preprodct[$j++]);
           $updatedkpifins->Moy_solde_clients_realisation_an=round((float)$preprodct[$j++]);
           $updatedkpifins->Moy_solde_clients_evolution=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Taux_marge_brute_MB=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Taux_marge_brute_MB_realisation_an=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Taux_marge_brute_MB_evolution=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Taux_marge_brute_MB_objectif=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Taux_marque=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Taux_marque_realisation_an=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Taux_marque_evolution=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Taux_marque_objectif=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Taux_Marge_Charges_variables=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Taux_Marge_Charges_variables_realisation_an=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Taux_Marge_Charges_variables_evolution=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Taux_Marge_Charges_variables_objectif=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Rentabilité_commercial=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Rentabilité_commercial_realisation_an=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Rentabilité_commercial_evolution=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Rentabilité_commercial_objectif=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Rentabilité_Financière=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Rentabilité_Financière_realisation_an=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Rentabilité_Financière_evolution=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Rentabilité_Financière_objectif=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Taux_charges=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Taux_charges_realisation_an=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Taux_charges_evolution=round((float)$preprodct[$j++]*100);
           $updatedkpifins->Taux_charges_objectif=round((float)$preprodct[$j++]*100); 
           $updatedkpifins->update();
        }

            Artisan::call('cache:clear');
    }
}
