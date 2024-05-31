<h2>voila la liste des kpi FINANCIER</h2>


<table style="border:2px solid">
    <tr>
        <th>UNITE/KPI</th>
        <th>Rotation de stock PF</th>
        <th>Rotation de stock PF Realisation anterieur</th>
        <th>Rotation de stock PF evolution</th>
        <th>Moy de stock marchandise</th>
        <th>Moy de stock marchandise Realisation anterieur</th>
        <th>Moy de stock marchandise evolution</th>
        <th>Adéquation FR</th>
        <th>Realisation anterieur Adéquation FR</th>
        <th>evolution Adéquation FR</th>
        <th>Fond de Roulement</th>
        <th>realisation anterieur Fond de Roulement</th>
        <th>evolution Fond de Roulement</th>
        <th>Rotation de stock</th>
        <th>Realisation antrieur Rotation de stock</th>
        <th>evolution Rotation de stock</th>
        <th>Délais de couverture du stock PF</th>
        <th>realisation anterieur Délais de couverture du stock PF</th>
        <th>evolution Délais de couverture du stock PF</th>
        <th>Délais de couverture du stock MP</th>
        <th>realisation anterieur Délais de couverture du stock MP</th>
        <th>evolution Délais de couverture du stock MP</th>
        <th>Moyenne durée découllement du Stock PF</th>
        <th>Realisation anterieur Moyenne durée découllement du Stock PF </th>
        <th>evolution Moyenne durée découllement du Stock PF</th>
        <th>Moyenne durée découllement du Stock MP </th>
        <th>Realisation anterieur Moyenne durée découllement du Stock MP </th>
        <th>Evolution Moyenne durée découllement du Stock MP </th>
        <th>Moyenne durée découllement du Stock marchandise</th>
        <th>realisation anterieur Moyenne durée découllement du Stock marchandise</th>
        <th>evolution Moyenne durée découllement du Stock marchandise</th>
        <th>Délais de couverture du stock de marchandise</th>
        <th>realisation anterieur Délais de couverture du stock de marchandise</th>
        <th>evolution Délais de couverture du stock de marchandise</th>
        <th>Rotation de stock MP</th>
        <th>realisation anterieur Rotation de stock MP</th>
        <th>evolution Rotation de stock MP</th>
        <th>Moyenne durée de  règlements Crédits Clients</th>
        <th>realisation anterieur Moyenne durée de  règlements Crédits Clients</th>
        <th>evolution Moyenne durée de  règlements Crédits Clients</th>
        <th>Moyenne durée de paiement dettes founisseur</th>
        <th>realisation anterieur Moyenne durée de paiement dettes founisseur</th>
        <th>evolution Moyenne durée de paiement dettes founisseur</th>
        <th>Moy de solde fournisseurs</th>
        <th>realisation anterieur Moy de solde fournisseurs</th>
        <th>evolution Moy de solde fournisseurs</th>
        <th>Moy de solde clients</th>
        <th>realisation anterieur Moy de solde clients</th>
        <th>evolution Moy de solde clients</th>
        <th>Taux de marge brute MB</th>
        <th>realisation anterieur Taux de marge brute MB</th>
        <th>evolution Taux de marge brute MB</th>
        <th>Taux de marge brute MB objectif</th>
        <th>Taux de marque</th>
        <th>realisation anterieur Taux de marque</th>
        <th>evolution Taux de marque</th>
        <th>objectif Taux de marque</th>
        <th>Taux de Marge sur Charges variables</th>
        <th>realisation anterieur Taux de Marge sur Charges variables</th>
        <th>evolution Taux de Marge sur Charges variables</th>
        <th>objectif Taux de Marge sur Charges variables</th>
        <th>Rentabilité commercial</th>
        <th>realisation anterieur Rentabilité commercial</th>
        <th>evolution Rentabilité commercial</th>
        <th>objectif Rentabilité commercial</th>
        <th>Rentabilité Financière</th>
        <th>realisation anterieur Rentabilité Financière</th>
        <th>evolution Rentabilité Financière</th>
        <th>objectif Rentabilité Financière</th>
        <th>Taux de charges</th>
        <th>realisation anterieur Taux de charges</th>
        <th>evolution Taux de charges</th>
        <th>objectif Taux de charges</th>
    </tr>
<tr>
    @foreach ($user->kpi_fin as $fin)
    <td>{{ $fin->unite->unitename }}</td>
    <td><h3 style="font-weight: bold; color:black">{{ $fin->Rotation_stock_PF }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Rotation_stock_PF_realisation_an }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Rotation_stock_PF_evolution }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Moy_stock_marchan }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Moy_stock_marchan_realisation_an }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Moy_stock_marchan_evolution }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Adequation_FR }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Adequation_FR_realisation_an }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Adequation_FR_evolution }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Fond_Roulement }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{ $fin->Fond_Roulement_realisation_an  }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Fond_Roulement_evolution }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Rotation_stock }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Rotation_stock_realisation_an }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Rotation_stock_evolution }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Delais_couverture_stock_PF }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Delais_couverture_stock_PF_realisation_an }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Delais_couverture_stock_PF_evolution }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Delais_couverture_stock_MP }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Delais_couverture_stock_MP_realisation_an }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Delais_couverture_stock_MP_evolution }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{ $fin->Moy_duree_decoullement_Stock_PF  }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Moy_duree_decoullement_Stock_PF_realisation_an }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Moy_duree_decoullement_Stock_PF_evolution }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Moy_duree_decoullement_Stock_MP }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Moy_duree_decoullement_Stock_MP_realisation_an }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Moy_duree_decoullement_Stock_MP_evolution }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Moy_duree_decoullement_Stock_marchandise }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Moy_duree_decoullement_Stock_marchandise_realisation_an}}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Moy_duree_decoullement_Stock_marchandise_evolution }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Delais_couverture_stock_marchandise }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Delais_couverture_stock_marchandise_realisation_an }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Delais_couverture_stock_marchandise_evolution  }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Rotation_stock_MP }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Rotation_stock_MP_realisation_an }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Rotation_stock_MP_evolution }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Moy_duree_reglements_Credits_Clients }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Moy_duree_reglements_Credits_Clients_realisation_an  }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Moy_duree_reglements_Credits_Clients_evolution}}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Moy_duree_paiement_dettes_founisseur }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Moy_duree_paiement_dettes_founisseur_realisation_an }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Moy_duree_paiement_dettes_founisseur_evolution }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{ $fin->Moy_solde_fournisseurs  }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{ $fin->Moy_solde_fournisseurs_realisation_an  }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Moy_solde_fournisseurs_evolution }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Moy_solde_clients }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Moy_solde_clients_realisation_an }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Moy_solde_clients_evolution }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Taux_marge_brute_MB }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Taux_marge_brute_MB_realisation_an}}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Taux_marge_brute_MB_evolution }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Taux_marge_brute_MB_objectif }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Taux_marque }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Taux_marque_realisation_an }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Taux_marque_evolution }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Taux_marque_objectif }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Taux_Marge_Charges_variables }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Taux_Marge_Charges_variables_realisation_an }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Taux_Marge_Charges_variables_evolution }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Taux_Marge_Charges_variables_objectif }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Rentabilité_commercial }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Rentabilité_commercial_realisation_an }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Rentabilité_commercial_evolution }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Rentabilité_commercial_objectif }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Rentabilité_Financière }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Rentabilité_Financière_realisation_an }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Rentabilité_Financière_evolution  }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Rentabilité_Financière_objectif }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Taux_charges }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Taux_charges_realisation_an }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Taux_charges_evolution }}</h3></td>
    <td><h3 style="font-weight: bold; color:black">{{  $fin->Taux_charges_objectif}}</h3></td>
</tr>
@endforeach
</table>
<style>
    table,th,td {
  border: 1px solid;
}
*{
    color: black;
}

</style>