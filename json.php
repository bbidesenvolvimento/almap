<?php 
include 'tableau_trusted2.php';
/*
América Latina: httpss://srv.bbi.net.br/views/AmricaLatina/INVESTIMENTOSEMPROPAGANDA
Custos de Mídia: httpss://srv.bbi.net.br/views/CustosdeMdia/EVOLUODOSCUSTOSDEMDIA
Entretenimento: httpss://srv.bbi.net.br/views/Entretenimento/NMERODECINEMASQUEEXIBEMPUBLICIDADE
Jornal: httpss://srv.bbi.net.br/views/JORNAL/PERFILEPENETRAODOSCONSUMIDORESDOMEIO
Mercado & Demografia: httpss://srv.bbi.net.br/views/MERCADODEMOGRAFIA_0/AFORMAOUNIVERSITRIADEPUBLICIDADENOBRASIL
Mídia Digital: httpss://srv.bbi.net.br/views/MDIADIGITAL/OSMAIORESUSURIOSDEINTERNETDOMUNDOeNMERODEINTERNAUTAPORGRANDESREGIES
Mídia Internacional: httpss://srv.bbi.net.br/views/MDIAINTERNACIONAL/INVESTIMENTOEMPROPAGANDANOMUNDO
Out of Home: httpss://srv.bbi.net.br/views/OUT-OF-HOME/PERFILDEMOGRFICOEPENETRAO
Pesquisas Ad-Hoc: httpss://srv.bbi.net.br/views/PesquisaAd-Hoc/ALIMENTAO
Rádio: httpss://srv.bbi.net.br/views/Rdio/EVOLUODOSDOMICLIOSCOMRDIO
Revista: httpss://srv.bbi.net.br/views/REVISTA/PERFILEPENETRAODOMEIO
Televisão: httpss://srv.bbi.net.br/views/TELEVISO/PERFILDEMOGRFICOPENETRAOEEVOLUODAPENETRAONOMEIO
TV por Assinatura: httpss://srv.bbi.net.br/views/TVPORASSINATURA/PERFILPENETRAOEEVOLUODAPENETRAODOMEIO
*/

header ('Content-type: text/html; charset=utf-8');
header('Access-Control-Allow-Origin: *');

$urls_array = array(
'mercadoDemografia' => array('titulo' => 'A formação universitária de Publicidade no Brasil', 'link' => 'MERCADODEMOGRAFIA_0/AFORMAOUNIVERSITRIADEPUBLICIDADENOBRASIL','ad' =>''), 
'adHoc' => array('titulo' => 'Alimentação','link' => 'PesquisaAd-Hoc/ALIMENTAO','ad' => ''),
'televisao' => array('titulo' =>'Perfil Demográfico Penetração e Evolução da Penetração no meio','link' => 'TELEVISO/PERFILDEMOGRFICOPENETRAOEEVOLUODAPENETRAONOMEIO','ad' =>''),
'tvAssinatura' => array('titulo' => 'Perfil da Penetração no Meio','link' => 'TVPORASSINATURA/PERFILPENETRAOEEVOLUODAPENETRAODOMEIO','ad' =>''),
'radio' => array('titulo' =>'Evolução dos Domicílios','link' => 'Rdio/EVOLUODOSDOMICLIOSCOMRDIO','ad' =>''),
'revista' => array('titulo' =>'Perfil e Penetração do Meio','link' => 'REVISTA/PERFILEPENETRAODOMEIO','ad' =>''),
'jornal' => array('titulo' =>'Perfil e Penetração dos Consumidores do Meio','link' => 'JORNAL/PERFILEPENETRAODOSCONSUMIDORESDOMEIO','ad' =>''),
'entretenimento' => array('titulo' =>'Número de Cinemas que Exibe Publicidade','link' => 'Entretenimento/NMERODECINEMASQUEEXIBEMPUBLICIDADE','ad' =>''),
'midiaOutHome' => array('titulo' =>'Perfil Demográfico - Penetração','link' => 'OUT-OF-HOME/PERFILDEMOGRFICOEPENETRAO','ad' =>''),
'midiaDigital' =>array('titulo' =>'Maiores usuários de Internet','link' => 'MDIADIGITAL/OSMAIORESUSURIOSDEINTERNETDOMUNDOeNMERODEINTERNAUTAPORGRANDESREGIES','ad' =>''),
'custoMidia' => array('titulo' =>'Evolução dos Custos de Mídia','link' => 'CustosdeMdia/EVOLUODOSCUSTOSDEMDIA','ad' =>''),
'americaLatina' => array('titulo' =>'Investimentos em Propaganda','link' => 'AmricaLatina/INVESTIMENTOSEMPROPAGANDA','ad' =>''),
'midiaInternacional' => array('titulo' =>'Investimentos em Propaganda - Mundo','link' => 'MDIAINTERNACIONAL/INVESTIMENTOEMPROPAGANDANOMUNDO','ad' =>''));

$arr_json = array();

foreach($urls_array as $cat => $url){
	 echo '<a href="'.get_trusted_url($user,$server,'views/'.$url['link']).'">'.$cat.'</a><br>';
	array_push($arr_json, 
		array($cat => array(
						'titulo' => $url['titulo'],
						'link' => get_trusted_url($user,$server,'views/'.$url['link']),
						'ad' => ''
				)
			)
		);
}

$JSONString = json_encode($arr_json);
echo "<pre>";
print_r($JSONString); 
echo "</pre>";
?>