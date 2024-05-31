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
        Schema::create('kpiglobs', function (Blueprint $table) {
            $table->id();
            $table->float('Marge_Brute_MB');
            $table->float('Marge_Brute_MB_objectif');
            $table->float('Marge_Brute_MB_realisation_an');
            $table->float('Marge_Brute_MB_realisation');
            $table->float('Marge_Brute_MB_evolution');
            $table->float('CA_net');
            $table->float('CA_net_objectif');
            $table->float('CA_net_realisation_an');
            $table->float('CA_net_realisation');
            $table->float('CA_net_evolution');
            $table->float('Resultat_net');
            $table->float('Resultat_net_objectif');
            $table->float('Resultat_net_realisation_an');
            $table->float('Resultat_net_realisation');
            $table->float('Resultat_net_evolution');
            $table->float('Charges_fonctionnement');
            $table->float('Charges_fonctionnement_objectif');
            $table->float('Charges_fonctionnement_realisation_an');
            $table->float('Charges_fonctionnement_realisation');
            $table->float('Charges_fonctionnement_evolution');
            $table->float('Charges_variables');
            $table->float('Charges_variables_objectif');
            $table->float('Charges_variables_realisation_an');
            $table->float('Charges_variables_realisation');
            $table->float('Charges_variables_evolution');
            $table->float('Charges_fixes');
            $table->float('Charges_fixes_objectif');
            $table->float('Charges_fixes_realisation_an');
            $table->float('Charges_fixes_realisation');
            $table->float('Charges_fixes_evolution');
            $table->float('Marge_Charges_variables');
            $table->float('Marge_Charges_variables_objectif');
            $table->float('Marge_Charges_variables_realisation_an');
            $table->float('Marge_Charges_variables_realisation');
            $table->float('Marge_Charges_variables_evolution');
            $table->float('Rentabilité_commercial');
            $table->float('Rentabilité_commercial_objectif');
            $table->float('Rentabilité_commercial_realisation_an');
            $table->float('Rentabilité_commercial_realisation');
            $table->float('Rentabilité_commercial_evolution');
            $table->float('Rentabilité_Financière');
            $table->float('Rentabilité_Financière_objectif');
            $table->float('Rentabilité_Financière_realisation_an');
            $table->float('Rentabilité_Financière_realisation');
            $table->float('Rentabilité_Financière_evolution');
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
        Schema::dropIfExists('kpiglobs');
    }
};



