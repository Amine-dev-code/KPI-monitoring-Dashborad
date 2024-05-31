
<h2>voila la liste des kpi global</h2>


<table style="border:2px solid">
    <tr>
        <th>UNITE/KPI</th>
        <th>Marge Brute</th>
        <th>Objectif Marge Brute</th>
        <th>Marge Brute Realisation anterieur</th>
        <th>Marge Brute realisation</th>
        <th>Marge Brute evolution</th>
        <th>Chiffre d'affaire Net</th>
        <th>Chiffre d'affaire Net objectif</th>
        <th>Chiffre d'affaire Net Realisation anterieur</th>
        <th>Chiffre d'affaire Net realisation</th>
        <th>Chiffre d'affaire Net evolution</th>
        <th>resultat net</th>
        <th>Objectif resultat net </th>
        <th>Realisation anterieur resultat net</th>
        <th>realisation resultat net</th>
        <th>evolution resultat net</th>
        <th>charge de fonctionnement</th>
        <th>objectif charge de fonctionnement</th>
        <th>realisation anterieur charge de fonctionnement</th>
        <th>realisation charge de fonctionnement</th>
        <th>evolution charge de fonctionnement</th>
        <th>charges variables</th>
        <th>objectif charges variables</th>
        <th>realisation anterieur charges variables</th>
        <th>realisation charges variables</th>
        <th>evolution charges variables</th>
        <th>charges fixes</th>
        <th>objectif charges fixes</th>
        <th>realisation anterieur charges fixes</th>
        <th>realisation charges fixes</th>
        <th>evolution charges fixes</th>
        <th>marges pour charges variables</th>
        <th>objectif marges pour charges variables</th>
        <th>realisation anterieur marges pour charges variables</th>
        <th>realisation marges pour charges variables</th>
        <th>evolution marges pour charges variables</th>
        <th>Rentabilite commerciale</th>
        <th>objectif Rentabilite commerciale</th>
        <th>realisation anterieur Rentabilite commerciale</th>
        <th>realisation Rentabilite commerciale</th>
        <th>evolution Rentabilite commerciale</th>
        <th>Rentabilite financiere</th>
        <th>objectif Rentabilite financiere</th>
        <th>realisation anterieur Rentabilite financiere</th>
        <th>realisation Rentabilite financiere</th>
        <th>evolution Rentabilite financiere</th>
    </tr>
<tr>
    @foreach ($user->kpi_glob as $glob)
<td>{{ $glob->unite->unitename }}</td>
<td><h3 style="font-weight: bold; color:black">{{ ($glob->Marge_Brute_MB)}}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{ $glob->Marge_Brute_MB_objectif}}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{ ($glob->Marge_Brute_MB_realisation_an)}}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{$glob->Marge_Brute_MB_realisation}}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{ $glob->Marge_Brute_MB_evolution}}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{$glob->CA_net}}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{$glob->CA_net_objectif }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{ $glob->CA_net_realisation_an}}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{$glob->CA_net_realisation}}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{ $glob->CA_net_evolution }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{$glob->Resultat_net }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{$glob->Resultat_net_objectif }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{$glob->Resultat_net_realisation_an }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{ $glob->Resultat_net_realisation }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{$glob->Resultat_net_evolution  }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{ $glob->Charges_fonctionnement }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{ $glob->Charges_fonctionnement_objectif }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{ $glob->Charges_fonctionnement_realisation_an }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{$glob->Charges_fonctionnement_realisation  }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{$glob->Charges_fonctionnement_evolution }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{ $glob->Charges_variables }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{$glob->Charges_variables_objectif  }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{ $glob->Charges_variables_realisation_an }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{ $glob->Charges_variables_realisation }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{ $glob->Charges_variables_evolution }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{ $glob->Charges_fixes }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{$glob->Charges_fixes_objectif}}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{ $glob->Charges_fixes_realisation_an}}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{ $glob->Charges_fixes_realisation }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{ $glob->Charges_fixes_evolution }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{ $glob->Marge_Charges_variables }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{ $glob->Marge_Charges_variables_objectif }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{$glob->Marge_Charges_variables_realisation_an  }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{ $glob->Marge_Charges_variables_realisation }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{$glob->Marge_Charges_variables_evolution }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{ $glob->Rentabilité_commercial }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{$glob->Rentabilité_commercial_objectif }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{$glob->Rentabilité_commercial_realisation_an  }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{$glob->Rentabilité_commercial_realisation  }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{$glob->Rentabilité_commercial_evolution  }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{$glob->Rentabilité_Financière  }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{ $glob->Rentabilité_Financière_objectif }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{ $glob->Rentabilité_Financière_realisation_an }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{$glob->Rentabilité_Financière_realisation  }}</h3></td>
<td><h3 style="font-weight: bold; color:black">{{$glob->Rentabilité_Financière_evolution  }}</h3></td>
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