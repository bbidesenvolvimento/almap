<?php

// Returns a trusted URL for a view on a server for the
// given user.  For example, if the URL of the view is:
//    http://tabserver/views/MyWorkbook/MyView
//
// Then:
   $server = "srv.bbi.net.br";
//   $view_url = "views/Renavam/RENAVAM";
//   $view_url = "views/MERCADODEMOGRAFIA_0/Mapa";
   $user = "midiadados";
//
function get_trusted_url($user,$server,$view_url) {
  $params = ':embed=yes&:toolbar=yes';

  $ticket = get_trusted_ticket($server, $user, $_SERVER['REMOTE_ADDR']);
  if($ticket > 0) {
    return "https://$server/trusted/$ticket/$view_url?$params";
  }
  else 
    return 0;
}

// Note that this function requires the pecl_http extension. 
// See: http://pecl.php.net/package/pecl_http

// the client_ip parameter isn't necessary to send in the POST unless you have
// wgserver.extended_trusted_ip_checking enabled (it's disabled by default)
function get_trusted_ticket($wgserver, $user, $remote_addr) {
  $params = array(
    'username' => $user,
    'client_ip' => $remote_addr
  );

  return http_parse_message(http_post_fields("http://$wgserver/trusted", $params))->body;
}

?>
