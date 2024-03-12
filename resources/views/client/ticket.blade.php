<?php
use Carbon\Carbon;
?>
<!doctype html>
<html data-theme="cupcake">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<style>
h4 {
    margin: 0;
}
.w-full {
    width: 100%;
}
.w-half {
    width: 50%;
}
.margin-top {
    margin-top: 1.25rem;
}
.footer {
    font-size: 0.875rem;
    padding: 1rem;
    background-color: rgb(241 245 249);
}
table {
    width: 100%;
    border-spacing: 0;
}
table.products {
    font-size: 0.875rem;
}
table.products tr {
    background-color: rgb(96 165 250);
}
table.products th {
    color: #ffffff;
    padding: 0.5rem;
}
table tr.items {
    background-color: rgb(241 245 249);
}
table tr.items td {
    padding: 0.5rem;
}
.total {
    text-align: right;
    margin-top: 1rem;
    font-size: 0.875rem;
}

</style>
<body class="bg-base-200">
    
<table class="w-full">
    <tr>
        <td class="w-half">
            <h1>Evento</h1>
        </td>
        <td class="w-half">
            <h2>Evenement: {{$event->name}}</h2>
        </td>
    </tr>
</table>

<div class="margin-top">
    <table class="w-full">
        <tr>
            <td class="w-half">
                <div><h4>Nom:</h4></div>
                <div>{{$user->username}}</div>
                
            </td>
            <td class="w-half">
                <div><h4>Organisateur:</h4></div>
                <div>{{$event->user->username}}</div>
                
            </td>
        </tr>
    </table>
</div>

<div class="margin-top">
    <table class="products">
        <tr>
            <th>Date</th>
            <th>Description</th>
            <th>Categorie</th>
        </tr>
        <tr class="items">
            
                <td>
                    {{$date->toFormattedDateString()}} starting {{$date->format('h:i A');}}
                </td>
                <td>
                    {{ $event->description }}
                </td>
                <td>
                    {{ $event->category->name }}
                </td>
        
        </tr>
    </table>
</div>

<div class="total">
    Total: ${{$event->price}} USD
</div>

<div class="footer margin-top">
    <div>Thank you</div>
    <div>&copy; Evento</div>
</div>

</body>
</html>


