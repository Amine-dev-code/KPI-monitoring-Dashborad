<?php

namespace App\Http\Controllers;
use App\Jobs\MiseAjour;
use App\Models\Kpifin;
use App\Models\Kpiglob;
use App\Models\Unite;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

use Ramsey\Uuid\Converter\Time\UnixTimeConverter;
use Symfony\Component\HttpKernel\Attribute\Cache;
use Illuminate\Database\Exception;
use Illuminate\Database\QueryException;
class UniteController extends Controller
{
    /**
     * /////////done
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
        $unites=Unite::all();
        return $unites;
        }
        
        catch(\Exception $e){
        Log::debug($e->getMessage());
        return response()->json(['status' => ' error' ,
        'message'=>$e->getMessage()]);
    }
        
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
  

    /**
     * Display the specified resource.
     */
    

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
        $unite=Unite::findOrfail($id);
        $unite->host=$request->host;
        $unite->port=$request->port;
        $unite->databasename=$request->databasename;
        $unite->username=$request->username;
        $unite->password=Crypt::encryptString($request->password);
        $unite->unitename=$request->unitename;
        $databasename=$request->databasename;
        $unite->currency=$request->currency;
        $databaseConfig = [
            'driver' => 'pgsql',
            'host' => $unite->host,
            'port' => $unite->port,
            'database' => $unite->databasename, 
            'username' => $unite->username,
            'password' => $request->password
        ];
        
        config(['database.connections.'.$databasename => $databaseConfig]);
        DB::reconnect($databasename);
        $kpi = DB::connection($databasename)->table('bi_fact_metrique')
    ->select('balance','balance_ant','balance_prev')
    ->where('name','nh')
    ->get();
    $exists = Unite::searchupdate($databasename,$request->unitename,$id);
        if(!$exists){
            $unite->update();
         return response()->json(['status' => 'success', 'message' => 'updated successfuly']);
        }
        else{
            return response()->json(['status' => 'error', 'message' => 'database exist']);
        }
    }
        catch(\Exception $e){
            Log::debug($e->getMessage());
            return response()->json(['status' => 'error' ,
            'message'=>$e->getMessage()]);
        }
    

    }
    /**
     * Remove the specified resource from storage.
     */
    
    public function truncation()
    {
        Unite::truncate();
        return response()->json('done');
    }
    public function destroy(String $id)
    {
        try{
        $unite=Unite::findOrfail($id);
        if($unite->delete())
            return response()->json(['status' => 'success', 'message' => 'deleted successfully']);
        }
        catch(\Exception $e){
            Log::debug($e->getMessage());
            return response()->json(['status' => ' error' ,
            'message'=>$e->getMessage()]);
        }
    }
    public function Autoimport(){
       MiseAjour::dispatch();
       return response()->json('updated');
       
}
                  
    public function import(Request $request){
        try{
        DB::beginTransaction();
         $unit=new Unite;
       $request->validate([
         "host"=>"required",
         "port"=>"required",
         "databasename"=>"required",
         "username"=>"required",
         "password"=>"required",
         "unitename"=>"required",
         "currency"=>"required"
        ]);
        $databasename=$request->databasename;
        $unit->host=$request->host;
        $unit->port=$request->port;
        $unit->databasename=$request->databasename;
        $unit->username=$request->username;
        $passwordnew=$request->password;
        $unit->password=Crypt::encryptString($request->password);
        $unit->unitename=$request->unitename;
        $unit->currency=$request->currency;
        
 // Create a new database configuration array
 $databaseConfig = [
     'driver' => 'pgsql',
     'host' => $unit->host,
     'port' => $unit->port,
     'database' => $request->databasename, 
     'username' => $unit->username,
     'password' => $passwordnew,
 ];
 
 config(['database.connections.'.$databasename => $databaseConfig]);
 
 DB::reconnect($databasename);
 
 $exists = Unite::checkExist($databasename,$request->unitename);
if ($exists) {
    // The record exists
    return response()->json(['status' => 'error', 'message' => 'database exist']);
    
} else {
    // The record does not exist
    $unit->save();
}
 // Use the dynamically added database connection
 $data=['Marge brute MB','CA net','Résultat net','Charges de fonctionnement','Charges variables','Charges fixes','Marge sur Charges variables (MCV)','Rentabilité commercial',
 'Rentabilité Financière']; 
 $newproduit=new Kpiglob;
 $preproduits = [];
 foreach ($data as $item){
    $kpi = DB::connection($databasename)->table('bi_fact_metrique')
    ->select('balance','balance_prev','balance_ant')
    ->where('name',$item)
    ->get();
    $preproduits[]=$kpi[0]->balance;//kpi
    if($kpi[0]->balance_prev===null){
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
$newproduit->Marge_Brute_MB=round((float)$preproduits[$i++]);
$newproduit->Marge_Brute_MB_objectif=round((float)$preproduits[$i++]);
$newproduit->Marge_Brute_MB_realisation_an=round((float)$preproduits[$i++]);
$newproduit->Marge_Brute_MB_realisation=round((float)$preproduits[$i++]*100);
$newproduit->Marge_Brute_MB_evolution=round((float)$preproduits[$i++]*100);
$newproduit->CA_net=round((float)$preproduits[$i++]);
$newproduit->CA_net_objectif=round((float)$preproduits[$i++]);
$newproduit->CA_net_realisation_an=round((float)$preproduits[$i++]);
$newproduit->CA_net_realisation=round((float)$preproduits[$i++]*100);
$newproduit->CA_net_evolution=round((float)$preproduits[$i++]*100);
$newproduit->Resultat_net=round((float)$preproduits[$i++]);
$newproduit->Resultat_net_objectif=round((float)$preproduits[$i++]);
$newproduit->Resultat_net_realisation_an=round((float)$preproduits[$i++]);
$newproduit->Resultat_net_realisation=round((float)$preproduits[$i++]*100);
$newproduit->Resultat_net_evolution=round((float)$preproduits[$i++]*100);
$newproduit->Charges_fonctionnement=round((float)$preproduits[$i++]);
$newproduit->Charges_fonctionnement_objectif=round((float)$preproduits[$i++]);
$newproduit->Charges_fonctionnement_realisation_an=round((float)$preproduits[$i++]);
$newproduit->Charges_fonctionnement_realisation=round((float)$preproduits[$i++]*100);
$newproduit->Charges_fonctionnement_evolution=round((float)$preproduits[$i++]*100);
$newproduit->Charges_variables=round((float)$preproduits[$i++]);
$newproduit->Charges_variables_objectif=round((float)$preproduits[$i++]);
$newproduit->Charges_variables_realisation_an=round((float)$preproduits[$i++]);
$newproduit->Charges_variables_realisation=round((float)$preproduits[$i++]*100);
$newproduit->Charges_variables_evolution=round((float)$preproduits[$i++]*100);
$newproduit->Charges_fixes=round((float)$preproduits[$i++]);
$newproduit->Charges_fixes_objectif=round((float)$preproduits[$i++]);
$newproduit->Charges_fixes_realisation_an=round((float)$preproduits[$i++]);
$newproduit->Charges_fixes_realisation=round((float)$preproduits[$i++]*100);
$newproduit->Charges_fixes_evolution=round((float)$preproduits[$i++]*100);
$newproduit->Marge_Charges_variables=round((float)$preproduits[$i++]);
$newproduit->Marge_Charges_variables_objectif=round((float)$preproduits[$i++]);
$newproduit->Marge_Charges_variables_realisation_an=round((float)$preproduits[$i++]);
$newproduit->Marge_Charges_variables_realisation=round((float)$preproduits[$i++]*100);
$newproduit->Marge_Charges_variables_evolution=round((float)$preproduits[$i++]*100);
$newproduit->Rentabilité_commercial=round((float)$preproduits[$i++]*100);
$newproduit->Rentabilité_commercial_objectif=round((float)$preproduits[$i++]);
$newproduit->Rentabilité_commercial_realisation_an=round((float)$preproduits[$i++]);
$newproduit->Rentabilité_commercial_realisation=round((float)$preproduits[$i++]*100);
$newproduit->Rentabilité_commercial_evolution=round((float)$preproduits[$i++]*100);
$newproduit->Rentabilité_Financière=round((float)$preproduits[$i++]*100);
$newproduit->Rentabilité_Financière_objectif=round((float)$preproduits[$i++]);
$newproduit->Rentabilité_Financière_realisation_an=round((float)$preproduits[$i++]);
$newproduit->Rentabilité_Financière_realisation=round((float)$preproduits[$i++]*100);
$newproduit->Rentabilité_Financière_evolution=round((float)$preproduits[$i++]*100);



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
$newproduct=new Kpifin;
$preprodcts=[];
$k=0;
foreach($donne as $item) {
    if($k==16||$k==17||$k==18||$k==19||$k==20||$k==21){
    $kpi = DB::connection($databasename)->table('bi_fact_metrique')
    ->select('balance','balance_ant','balance_prev')
    ->where('name',$item)
    ->get();
    $preprodcts[]=$kpi[0]->balance;
    $preprodcts[]=$kpi[0]->balance_ant;//realisation an-1
    if($kpi[0]->balance_ant==0){
        $preprodcts[]=0;
    }
    else{
        $preprodcts[]=$kpi[0]->balance/$kpi[0]->balance_ant;//revolution
    }
    if($kpi[0]->balance_prev===null){
        $preprodcts[]=0;
    }
    else{
        $preprodcts[]=$kpi[0]->balance_prev;//objectif
    }
    }
    else{
    $kpi = DB::connection($databasename)->table('bi_fact_metrique')
    ->select('balance','balance_ant')
    ->where('name',$item)
    ->get();
    $preprodcts[]=$kpi[0]->balance;
    $preprodcts[]=$kpi[0]->balance_ant;//realisation an-1
    if($kpi[0]->balance_ant==0){
        $preprodcts[]=0;
    }
    else{
        $preprodcts[]=$kpi[0]->balance/$kpi[0]->balance_ant;//revolution
    }
    }
    $k++;
}
$j=0;
    $newproduct->Rotation_stock_PF=round((float)$preprodcts[$j++]);
    $newproduct->Rotation_stock_PF_realisation_an=round((float)$preprodcts[$j++]);
    $newproduct->Rotation_stock_PF_evolution=round((float)$preprodcts[$j++]*100);
    $newproduct->Moy_stock_marchan=round((float)$preprodcts[$j++]);
    $newproduct->Moy_stock_marchan_realisation_an=round((float)$preprodcts[$j++]);
    $newproduct->Moy_stock_marchan_evolution=round((float)$preprodcts[$j++]*100);
    $newproduct->Adequation_FR=round((float)$preprodcts[$j++]);
    $newproduct->Adequation_FR_realisation_an=round((float)$preprodcts[$j++]);
    $newproduct->Adequation_FR_evolution=round((float)$preprodcts[$j++]*100);
    $newproduct->Fond_Roulement=round((float)$preprodcts[$j++]);
    $newproduct->Fond_Roulement_realisation_an=round((float)$preprodcts[$j++]);
    $newproduct->Fond_Roulement_evolution=round((float)$preprodcts[$j++]*100);
    $newproduct->Rotation_stock=round((float)$preprodcts[$j++]);
    $newproduct->Rotation_stock_realisation_an=round((float)$preprodcts[$j++]);
    $newproduct->Rotation_stock_evolution=round((float)$preprodcts[$j++]*100);
    $newproduct->Delais_couverture_stock_PF=round((float)$preprodcts[$j++]);
    $newproduct->Delais_couverture_stock_PF_realisation_an=round((float)$preprodcts[$j++]);
    $newproduct->Delais_couverture_stock_PF_evolution=round((float)$preprodcts[$j++]*100);
    $newproduct->Delais_couverture_stock_MP=round((float)$preprodcts[$j++]);
    $newproduct->Delais_couverture_stock_MP_realisation_an=round((float)$preprodcts[$j++]);
    $newproduct->Delais_couverture_stock_MP_evolution=round((float)$preprodcts[$j++]*100);
    $newproduct->Moy_duree_decoullement_Stock_PF=round((float)$preprodcts[$j++]);
    $newproduct->Moy_duree_decoullement_Stock_PF_realisation_an=round((float)$preprodcts[$j++]);
    $newproduct->Moy_duree_decoullement_Stock_PF_evolution=round((float)$preprodcts[$j++]*100);
    $newproduct->Moy_duree_decoullement_Stock_MP=round((float)$preprodcts[$j++]);
    $newproduct->Moy_duree_decoullement_Stock_MP_realisation_an=round((float)$preprodcts[$j++]);
    $newproduct->Moy_duree_decoullement_Stock_MP_evolution=round((float)$preprodcts[$j++]*100);
    $newproduct->Moy_duree_decoullement_Stock_marchandise=round((float)$preprodcts[$j++]);
    $newproduct->Moy_duree_decoullement_Stock_marchandise_realisation_an=round((float)$preprodcts[$j++]);
    $newproduct->Moy_duree_decoullement_Stock_marchandise_evolution=round((float)$preprodcts[$j++]*100);
    $newproduct->Delais_couverture_stock_marchandise=round((float)$preprodcts[$j++]);
    $newproduct->Delais_couverture_stock_marchandise_realisation_an=round((float)$preprodcts[$j++]);
    $newproduct->Delais_couverture_stock_marchandise_evolution=round((float)$preprodcts[$j++]*100);
    $newproduct->Rotation_stock_MP=round((float)$preprodcts[$j++]);
    $newproduct->Rotation_stock_MP_realisation_an=round((float)$preprodcts[$j++]);
    $newproduct->Rotation_stock_MP_evolution=round((float)$preprodcts[$j++]*100);
    $newproduct->Moy_duree_reglements_Credits_Clients=round((float)$preprodcts[$j++]);
    $newproduct->Moy_duree_reglements_Credits_Clients_realisation_an=round((float)$preprodcts[$j++]);
    $newproduct->Moy_duree_reglements_Credits_Clients_evolution=round((float)$preprodcts[$j++]*100);
    $newproduct->Moy_duree_paiement_dettes_founisseur=round((float)$preprodcts[$j++]);
    $newproduct->Moy_duree_paiement_dettes_founisseur_realisation_an=round((float)$preprodcts[$j++]);
    $newproduct->Moy_duree_paiement_dettes_founisseur_evolution=round((float)$preprodcts[$j++]*100);
    $newproduct->Moy_solde_fournisseurs=round((float)$preprodcts[$j++]);
    $newproduct->Moy_solde_fournisseurs_realisation_an=round((float)$preprodcts[$j++]);
    $newproduct->Moy_solde_fournisseurs_evolution=round((float)$preprodcts[$j++]*100);
    $newproduct->Moy_solde_clients=round((float)$preprodcts[$j++]);
    $newproduct->Moy_solde_clients_realisation_an=round((float)$preprodcts[$j++]);
    $newproduct->Moy_solde_clients_evolution=round((float)$preprodcts[$j++]*100);
    $newproduct->Taux_marge_brute_MB=round((float)$preprodcts[$j++]*100);
    $newproduct->Taux_marge_brute_MB_realisation_an=round((float)$preprodcts[$j++]*100);
    $newproduct->Taux_marge_brute_MB_evolution=round((float)$preprodcts[$j++]*100);
    $newproduct->Taux_marge_brute_MB_objectif=round((float)$preprodcts[$j++]*100);
    $newproduct->Taux_marque=round((float)$preprodcts[$j++]*100);
    $newproduct->Taux_marque_realisation_an=round((float)$preprodcts[$j++]*100);
    $newproduct->Taux_marque_evolution=round((float)$preprodcts[$j++]*100);
    $newproduct->Taux_marque_objectif=round((float)$preprodcts[$j++]*100);
    $newproduct->Taux_Marge_Charges_variables=round((float)$preprodcts[$j++]*100);
    $newproduct->Taux_Marge_Charges_variables_realisation_an=round((float)$preprodcts[$j++]);
    $newproduct->Taux_Marge_Charges_variables_evolution=round((float)$preprodcts[$j++]*100);
    $newproduct->Taux_Marge_Charges_variables_objectif=round((float)$preprodcts[$j++]);
    $newproduct->Rentabilité_commercial=round((float)$preprodcts[$j++]*100);
    $newproduct->Rentabilité_commercial_realisation_an=round((float)$preprodcts[$j++]*100);
    $newproduct->Rentabilité_commercial_evolution=round((float)$preprodcts[$j++]*100);
    $newproduct->Rentabilité_commercial_objectif=round((float)$preprodcts[$j++]*100);
    $newproduct->Rentabilité_Financière=round((float)$preprodcts[$j++]*100);
    $newproduct->Rentabilité_Financière_realisation_an=round((float)$preprodcts[$j++]*100);
    $newproduct->Rentabilité_Financière_evolution=round((float)$preprodcts[$j++]*100);
    $newproduct->Rentabilité_Financière_objectif=round((float)$preprodcts[$j++]*100);
    $newproduct->Taux_charges=round((float)$preprodcts[$j++]*100);
    $newproduct->Taux_charges_realisation_an=round((float)$preprodcts[$j++]*100);
    $newproduct->Taux_charges_evolution=round((float)$preprodcts[$j++]*100);
    $newproduct->Taux_charges_objectif=round((float)$preprodcts[$j++]*100);
   
    $newproduct->unite()->associate($unit);
    $newproduit->unite()->associate($unit);
    $newproduit->save();
    $newproduct->save();
    DB::commit();
return response()->json(['status' => 'success', 'message' => 'database imported successfully']);
}
catch(\Exception $e){
    DB::rollBack();
    Log::debug($e->getMessage());
    return response()->json(['status' => 'error' ,
    'message'=>$e->getMessage()],500);
}

}



 

}

  //ValidationException
//PDOException
//TimeoutException
//HttpException: 

                  