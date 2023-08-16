@php
use App\Helpers\ApiHelper;

    $msg_whatsapp = 'https://api.whatsapp.com/send?phone=55' . ApiHelper::somente_numeros($item->whatsapp) . '&text='. rawurlencode('Olá, gostaria de falar com algum vendedor.');
@endphp

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="{{ $msg_whatsapp }}" style="position:fixed;width:60px;height:60px;bottom:40px;right:40px;background-color:#25d366;color:#FFF;border-radius:50px;text-align:center;font-size:30px;box-shadow: 1px 1px 2px #888;
  z-index:1000;" target="_blank">
<i style="margin-top:16px" class="fa fa-whatsapp"></i>
</a>