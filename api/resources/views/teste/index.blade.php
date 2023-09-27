@php
    


    $client_id = '52e213308e9d882584498ed90074bba58250c54e'; 
    $client_secret = 'db016607c4395f05df1eeb1f18e93ae2';

    $response_type = 'code';
    $scope = 'basic_user_info'; 
    $redirect_uri ='http://127.0.0.1/oauth.php';
    $state  = 'bla';
    $grant_type = 'authorization_code';

    $auth_host = 'dev04c6.srv.office:22406';
    $apps_host = 'dev04c6.srv.office:22406';
    $url = "https://{$auth_host}/oauth?client_id={$client_id}&response_type={$response_type}&scope={$scope}&redirect_uri={$redirect_uri}&state={$state}";
@endphp


<!-- Requisição do código de autenticação - Como explicado na seção 2.1.1 do Manual do OAuth -->
<!-- O usuário deve clicar no link para iniciar o 'oauth login' -->
<a href="<?php echo $url; ?>">Fazer login no olx.com.br</a><br><br>
<!-- uma vez clicado, o usuário deverá se autenticar no OLX e autorizar a sua aplicação a acessar seus dados -->

<?php
    # isso só deve ocorrer após o recebimento do 'code' no redirect do oauth 
    if (isset($_GET['code'])) {
            $code = $_GET['code'];

            # dados necessários para a requisição do token de acesso
            $fields = array(
                'code' => $code,
                'client_id' => $client_id,
                'client_secret' => $client_secret,
                'redirect_uri' => $redirect_uri,
                'grant_type' => $grant_type
            );

            # Requisição da chave de acesso - Como explicado na seção 2.2.1 do Manual do OAuth 
            # para utilizar o método 'http_post_fields', instalar o pacote: pecl_http 
            $response = http_post_fields("https://{$auth_host}/oauth/token",$fields);

            # separa o header do body do pacote http
            $res = preg_split("#\n\\s*?\n#", $response, 2);
            $data = json_decode($res[1]);
            echo "access_token: {$data->access_token}<br />";

            # salvar access_token
            #
            # O access_token deve ser salvo para evitar a necessidade de fazer novamente o handshake do OAuth 
            //$generic_database->saveAccessToken($data->access_token); // comando de exemplo

            $request_data =array('access_token'=>$data->access_token);

            # Acesso à API - Como explicado na seção 3.1 do Manual do OAuth neste exemplo, estamos acessando o resource basic_user_info que simplesmente retorna informações básicas do usuário para utilizar o método 'http_post_data', instalar o pacote: pecl_http 
            $response = http_post_data("https://{$apps_host}/oauth_api/basic_user_info", json_encode($request_data));

            # separa o header do body do pacote http
            $res = preg_split("#\n\\s*?\n#", $response, 2); echo "basic_user_info: {$res[1]}";
        }
?>
