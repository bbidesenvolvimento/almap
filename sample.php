<p>An embedded view appears below:</p>
<?php
// This user-provided library should define get_user(), which returns the 
// name of the user currently logged into this application.
//

// Tableau-provided functions for doing trusted authentication
include 'tableau_trusted2.php';

/*
América Latina: https://srv.bbi.net.br/views/AmricaLatina/INVESTIMENTOSEMPROPAGANDA
Custos de Mídia: https://srv.bbi.net.br/views/CustosdeMdia/EVOLUODOSCUSTOSDEMDIA
Entretenimento: https://srv.bbi.net.br/views/Entretenimento/NMERODECINEMASQUEEXIBEMPUBLICIDADE
Jornal: https://srv.bbi.net.br/views/JORNAL/PERFILEPENETRAODOSCONSUMIDORESDOMEIO
Mercado & Demografia: https://srv.bbi.net.br/views/MERCADODEMOGRAFIA_0/AFORMAOUNIVERSITRIADEPUBLICIDADENOBRASIL
Mídia Digital: https://srv.bbi.net.br/views/MDIADIGITAL/OSMAIORESUSURIOSDEINTERNETDOMUNDOeNMERODEINTERNAUTAPORGRANDESREGIES
Mídia Internacional: https://srv.bbi.net.br/views/MDIAINTERNACIONAL/INVESTIMENTOEMPROPAGANDANOMUNDO
Out of Home: https://srv.bbi.net.br/views/OUT-OF-HOME/PERFILDEMOGRFICOEPENETRAO
Pesquisas Ad-Hoc: https://srv.bbi.net.br/views/PesquisaAd-Hoc/ALIMENTAO
Rádio: https://srv.bbi.net.br/views/Rdio/EVOLUODOSDOMICLIOSCOMRDIO
Revista: https://srv.bbi.net.br/views/REVISTA/PERFILEPENETRAODOMEIO
Televisão: https://srv.bbi.net.br/views/TELEVISO/PERFILDEMOGRFICOPENETRAOEEVOLUODAPENETRAONOMEIO
TV por Assinatura: https://srv.bbi.net.br/views/TVPORASSINATURA/PERFILPENETRAOEEVOLUODAPENETRAODOMEIO
*/
?>

<iframe src="<?php //echo get_trusted_url($user,$server,'views/Renavam/RENAVAM');
echo get_trusted_url($user,$server,'views/AmricaLatina/INVESTIMENTOSEMPROPAGANDA');?>" width="920" height="620" scrolling="no">
</iframe><br />
<?php

$urls_array = array(
'AmricaLatina/INVESTIMENTOSEMPROPAGANDA',
'CustosdeMdia/EVOLUODOSCUSTOSDEMDIA',
'Entretenimento/NMERODECINEMASQUEEXIBEMPUBLICIDADE',
'JORNAL/PERFILEPENETRAODOSCONSUMIDORESDOMEIO',
'MERCADODEMOGRAFIA_0/AFORMAOUNIVERSITRIADEPUBLICIDADENOBRASIL',
'MDIADIGITAL/OSMAIORESUSURIOSDEINTERNETDOMUNDOeNMERODEINTERNAUTAPORGRANDESREGIES',
'MDIAINTERNACIONAL/INVESTIMENTOEMPROPAGANDANOMUNDO',
'OUT-OF-HOME/PERFILDEMOGRFICOEPENETRAO',
'PesquisaAd-Hoc/ALIMENTAO',
'Rdio/EVOLUODOSDOMICLIOSCOMRDIO',
'REVISTA/PERFILEPENETRAODOMEIO',
'TELEVISO/PERFILDEMOGRFICOPENETRAOEEVOLUODAPENETRAONOMEIO',
'TVPORASSINATURA/PERFILPENETRAOEEVOLUODAPENETRAODOMEIO');

foreach($urls_array as $url){
	echo get_trusted_url($user,$server,'views/'.$url).'<br>';
}

?>


<p>
This was created using trusted authentication.
</p>