<?php

$cat = $_GET['cat'];
$sub = $_GET['sub'];

//httpss://srv.bbi.net.br/views/TVPORASSINATURA/PERFILPENETRAOEEVOLUODAPENETRAODOMEIO?:embed=yes&:toolbar=yes
//processo para pegar o link com sessão mais atual para o grafico
 
$server = "srv.bbi.net.br";
$user = "midiadados";

function get_trusted_url($user,$server,$view_url) {
	$params = ':embed=yes&:toolbar=no';
	$ticket = get_trusted_ticket($server, $user, $_SERVER['REMOTE_ADDR']);
	if($ticket > 0) {
		return "httpss://$server/trusted/$ticket/$view_url?$params";
	}
		else 
	return 0;
}

function get_trusted_ticket($wgserver, $user, $remote_addr) {
  $params = array(
    'username' => $user,
    'client_ip' => $remote_addr
  );
  return https_parse_message(https_post_fields("https://$wgserver/trusted", $params))->body;
}

/*echo "<pre>";
var_dump($cat);
var_dump($sub);
echo "</pre>";*/
 
switch ($cat) {
	case 'mercadoDemografia':
		header("Location:". get_trusted_url($user,$server,'views/'.$sub));
		break;
	case 'adHoc':
		header("Location:".get_trusted_url($user,$server,'views/'.$sub));
		break;
	case 'televisao':
		header("Location:".get_trusted_url($user,$server,'views/'.$sub));
		break;
	case 'tvAssinatura':
		header("Location:". get_trusted_url($user,$server,'views/'.$sub));
		break;
	case 'radio':
		header("Location:". get_trusted_url($user,$server,'views/'.$sub));
		break;
	case 'revista':
		header("Location:". get_trusted_url($user,$server,'views/'.$sub));
		break;
	case 'jornal':
		header("Location:". get_trusted_url($user,$server,'views/'.$sub));
		break;
	case 'entretenimento':
		header("Location:". get_trusted_url($user,$server,'views/'.$sub));
		break;
	case 'midiaOutHome':
		header("Location:". get_trusted_url($user,$server,'views/'.$sub));
		break;
	case 'midiaDigital':
		header("Location:". get_trusted_url($user,$server,'views/'.$sub));
		break;
	case 'custoMidia':
		header("Location:". get_trusted_url($user,$server,'views/'.$sub));
		break;
	case 'americaLatina':
		header("Location:". get_trusted_url($user,$server,'views/'.$sub));
		break;
	case 'midiaInternacional':
		header("Location:". get_trusted_url($user,$server,'views/'.$sub));
		break;
 	default:
		# code...
		break;
}


//$novoLink = "https://exmplo.com.br?sessionID=adfaiodfya98ifdh98ayf";
//header("Location:". $novoLink);
