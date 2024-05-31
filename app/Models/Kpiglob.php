<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kpiglob extends Model
{
    use HasFactory;
    protected $fillable=[
'Marge_Brute_MB',
'Marge_Brute_MB_objectif',
'Marge_Brute_MB_realisation_an',
'Marge_Brute_MB_realisation',
'Marge_Brute_MB_evolution',
'CA_net',
'CA_net_objectif',
'CA_net_realisation_an',
'CA_net_realisation',
'CA_net_evolution',
'Resultat_net',
'Resultat_net_objectif',
'Resultat_net_realisation_an',
'Resultat_net_realisation',
'Resultat_net_evolution',
'Charges_fonctionnement',
'Charges_fonctionnement_objectif',
'Charges_fonctionnement_realisation_an',
'Charges_fonctionnement_realisation',
'Charges_fonctionnement_evolution',
'Charges_variables',
'Charges_variables_objectif',
'Charges_variables_realisation_an',
'Charges_variables_realisation',
'Charges_variables_evolution',
'Charges_fixes',
'Charges_fixes_objectif',
'Charges_fixes_realisation_an',
'Charges_fixes_realisation',
'Charges_fixes_evolution',
'Marge_Charges_variables',
'Marge_Charges_variables_objectif',
'Marge_Charges_variables_realisation_an',
'Marge_Charges_variables_realisation',
'Marge_Charges_variables_evolution',
'Rentabilité_commercial',
'Rentabilité_commercial_objectif',
'Rentabilité_commercial_realisation_an',
'Rentabilité_commercial_realisation',
'Rentabilité_commercial_evolution',
'Rentabilité_Financière',
'Rentabilité_Financière_objectif',
'Rentabilité_Financière_realisation_an',
'Rentabilité_Financière_realisation',
'Rentabilité_Financière_evolution'
];

    public function user(){
        return $this->belongsToMany(Unite::class,'user_kpiglob');
    }
    public function unite(){
        return $this->belongsTo(Unite::class,'unite_id');
    }
}
