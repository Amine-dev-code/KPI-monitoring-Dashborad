<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kpifins', function (Blueprint $table) {
            $table->id();
            $table->float('Rotation_stock_PF')->round();
            $table->float('Rotation_stock_PF_realisation_an');
            $table->float('Rotation_stock_PF_evolution');
            $table->float('Moy_stock_marchan');
            $table->float('Moy_stock_marchan_realisation_an');
            $table->float('Moy_stock_marchan_evolution');
            $table->float('Adequation_FR');
            $table->float('Adequation_FR_realisation_an');
            $table->float('Adequation_FR_evolution');
            $table->float('Fond_Roulement');
            $table->float('Fond_Roulement_realisation_an');
            $table->float('Fond_Roulement_evolution');
            $table->float('Rotation_stock');
            $table->float('Rotation_stock_realisation_an');
            $table->float('Rotation_stock_evolution');
            $table->float('Delais_couverture_stock_PF');
            $table->float('Delais_couverture_stock_PF_realisation_an');
            $table->float('Delais_couverture_stock_PF_evolution');
            $table->float('Delais_couverture_stock_MP');
            $table->float('Delais_couverture_stock_MP_realisation_an');
            $table->float('Delais_couverture_stock_MP_evolution');
            $table->float('Moy_duree_decoullement_Stock_PF');
            $table->float('Moy_duree_decoullement_Stock_PF_realisation_an');
            $table->float('Moy_duree_decoullement_Stock_PF_evolution');
            $table->float('Moy_duree_decoullement_Stock_MP');
            $table->float('Moy_duree_decoullement_Stock_MP_realisation_an');
            $table->float('Moy_duree_decoullement_Stock_MP_evolution');
            $table->float('Moy_duree_decoullement_Stock_marchandise');
            $table->float('Moy_duree_decoullement_Stock_marchandise_realisation_an');
            $table->float('Moy_duree_decoullement_Stock_marchandise_evolution');
            $table->float('Delais_couverture_stock_marchandise');
            $table->float('Delais_couverture_stock_marchandise_realisation_an');
            $table->float('Delais_couverture_stock_marchandise_evolution');
            $table->float('Rotation_stock_MP');
            $table->float('Rotation_stock_MP_realisation_an');
            $table->float('Rotation_stock_MP_evolution');
            $table->float('Moy_duree_reglements_Credits_Clients');
            $table->float('Moy_duree_reglements_Credits_Clients_realisation_an');
            $table->float('Moy_duree_reglements_Credits_Clients_evolution');
            $table->float('Moy_duree_paiement_dettes_founisseur');
            $table->float('Moy_duree_paiement_dettes_founisseur_realisation_an');
            $table->float('Moy_duree_paiement_dettes_founisseur_evolution');
            $table->float('Moy_solde_fournisseurs');
            $table->float('Moy_solde_fournisseurs_realisation_an');
            $table->float('Moy_solde_fournisseurs_evolution');
            $table->float('Moy_solde_clients');
            $table->float('Moy_solde_clients_realisation_an');
            $table->float('Moy_solde_clients_evolution');
            $table->float('Taux_marge_brute_MB');
            $table->float('Taux_marge_brute_MB_realisation_an');
            $table->float('Taux_marge_brute_MB_evolution');
            $table->float('Taux_marge_brute_MB_objectif');
            $table->float('Taux_marque');
            $table->float('Taux_marque_realisation_an');
            $table->float('Taux_marque_evolution');
            $table->float('Taux_marque_objectif');
            $table->float('Taux_Marge_Charges_variables');
            $table->float('Taux_Marge_Charges_variables_realisation_an');
            $table->float('Taux_Marge_Charges_variables_evolution');
            $table->float('Taux_Marge_Charges_variables_objectif');
            $table->float('Rentabilité_commercial');
            $table->float('Rentabilité_commercial_realisation_an');
            $table->float('Rentabilité_commercial_evolution');
            $table->float('Rentabilité_commercial_objectif');
            $table->float('Rentabilité_Financière');
            $table->float('Rentabilité_Financière_realisation_an');
            $table->float('Rentabilité_Financière_evolution');
            $table->float('Rentabilité_Financière_objectif');
            $table->float('Taux_charges');
            $table->float('Taux_charges_realisation_an');
            $table->float('Taux_charges_evolution');
            $table->float('Taux_charges_objectif');
            $table->foreign('unite_id')->references('id')->on('unites')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('unite_id');
            $table->timestamps();
        });

    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kpifins');
    }
};
