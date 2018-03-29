@component('mail:message')
# Order Received

Hi {{ $orderName }},

Thank you for your order! Your order number is {{ $orderNum }}.

@component('mail:panel')

@endcomponent

@component('mail::button', ['url' => $url])
View your orders
@endcomponent


Thanks!<br>
{{ config/app.php }}

@endcomponent