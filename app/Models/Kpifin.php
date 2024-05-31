<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kpifin extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable=[
    'Rotation_stock_PF',
    'Rotation_stock_PF_realisation_an',
    'Rotation_stock_PF_evolution',
    'Moy_stock_marchan',
    'Moy_stock_marchan_realisation_an',
    'Moy_stock_marchan_evolution',
    'Adequation_FR',
    'Adequation_FR_realisation_an',
    'Adequation_FR_evolution',
    'Fond_Roulement',
    'Fond_Roulement_realisation_an',
    'Fond_Roulement_evolution',
    'Rotation_stock',
    'Rotation_stock_realisation_an',
    'Rotation_stock_evolution',
    'Delais_couverture_stock_PF',
    'Delais_couverture_stock_PF_realisation_an',
    'Delais_couverture_stock_PF_evolution',
    'Delais_couverture_stock_MP',
    'Delais_couverture_stock_MP_realisation_an',
    'Delais_couverture_stock_MP_evolution',
    'Moy_duree_decoullement_Stock_PF',
    'Moy_duree_decoullement_Stock_PF_realisation_an',
    'Moy_duree_decoullement_Stock_PF_evolution',
    'Moy_duree_decoullement_Stock_MP',
    'Moy_duree_decoullement_Stock_MP_realisation_an',
    'Moy_duree_decoullement_Stock_MP_evolution',
    'Moy_duree_decoullement_Stock_marchandise',
    'Moy_duree_decoullement_Stock_marchandise_realisation_an',
    'Moy_duree_decoullement_Stock_marchandise_evolution',
    'Delais_couverture_stock_marchandise', 
    'Delais_couverture_stock_marchandise_realisation_an',
    'Delais_couverture_stock_marchandise_evolution',
    'Rotation_stock_MP',
    'Rotation_stock_MP_realisation_an',
    'Rotation_stock_MP_evolution',
    'Moy_duree_reglements_Credits_Clients',
    'Moy_duree_reglements_Credits_Clients_realisation_an',
    'Moy_duree_reglements_Credits_Clients_evolution',
    'Moy_duree_paiement_dettes_founisseur',
    'Moy_duree_paiement_dettes_founisseur_realisation_an',
    'Moy_duree_paiement_dettes_founisseur_evolution',
    'Moy_solde_fournisseurs',
    'Moy_solde_fournisseurs_realisation_an',
    'Moy_solde_fournisseurs_evolution',
    'Moy_solde_clients',
    'Moy_solde_clients_realisation_an',
    'Moy_solde_clients_evolution',
    'Taux_marge_brute_MB',
    'Taux_marge_brute_MB_realisation_an',
    'Taux_marge_brute_MB_evolution',
    'Taux_marge_brute_MB_objectif',
    'Taux_marque',
    'Taux_marque_realisation_an',
    'Taux_marque_evolution',
    'Taux_marque_objectif',
    'Taux_Marge_Charges_variables',
    'Taux_Marge_Charges_variables_realisation_an',
    'Taux_Marge_Charges_variables_evolution',
    'Taux_Marge_Charges_variables_objectif',
    'Rentabilité_commercial',
    'Rentabilité_commercial_realisation_an',
    'Rentabilité_commercial_evolution',
    'Rentabilité_commercial_objectif',
    'Rentabilité_Financière',
    'Rentabilité_Financière_realisation_an',
    'Rentabilité_Financière_evolution',
    'Rentabilité_Financière_objectif',
    'Taux_charges',
    'Taux_charges_realisation_an',
    'Taux_charges_evolution',
    'Taux_charges_objectif',
    ];
     
    public function user(){
        return $this->belongsToMany(Unite::class,'user_kpifin');
    }
    public function unite(){
        return $this->belongsTo(Unite::class,'unite_id');
    }

    
}
