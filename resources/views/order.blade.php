<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <title>Ziemassvētku eglītes</title>
</head>
<body>
    <a href="https://www.eglitetev.lv"> <img class="banner" src="76yS81607188715.jpg" alt="img" /> </a>
    <ul>
        <li><a class="button"  href="../index.html">Iegādāties eglīti</a></li>
        <li><a class="button" href="../kontakti.html">Tirdzniecības vietas</a></li>
    </ul>
    <div class="return-from-order">
    <?php

        echo '<p style = "background-color: #4BB543; font-size: 25px"> Paldies! Jūsu pasūtījums ir saņemts! </p>';
        echo '<p> Tuvākajā laikā mēs ar Jums sazināsimies, lai precizētu pasūtījuma detaļas! </p>';
        echo '<br>';
        echo '<p> Pasūtījuma informācija: </p>';
        echo '<hr>';
        echo '<p> Pasūtītāja vārds: <b> <br>' . $order_data['client_name'].'</b> </p>';
        echo '<p> Pasūtītāja Telefona nummurs: <b><br>' . $order_data['client_phone'] .'</b> </p>';
        echo '<p> Egles tips: <b><br>' . $order_data['chrystmas_tree_type'] .'</b> </p>';
        echo '<p> Skaits: <b><br>' . $order_data['chrystmas_tree_amount'] .' GAB </b></p>';
        echo '<p> Izmērs: <b><br>' . $order_data['chrystmas_tree_size'] .' CM </b></p>';
        echo '<p> Summa: <b><br>' . $order_data['chrystmas_tree_price'] .' </b></p>';

        if ($order_data['delivery'] == "on") {
            echo '<p> Ar piegādi (Adrese tiks precizēta) </p>';
        }

        echo '<p> Pasūtījuma datums / laiks : <b><br>' . \Carbon\Carbon::now()->format('d.m.Y H:i:s') .'</b> </p>';

?>

<input type="button" value="Atgriezties" class="close_popupform_button">

    
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

    $(".close_popupform_button").click(function () {
        $(location).attr('href', 'http://eglitetev.lv');
    });

</script>

</html>
