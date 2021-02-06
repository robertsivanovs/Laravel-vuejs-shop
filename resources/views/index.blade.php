<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <title>Ziemassvētku eglītes</title>
</head>

<body>
    <div id="vue-app">

        <a href="/">
            <img class="banner" src="{{URL::asset('christmas-stuff-header.jpg')}}" alt="img" /></a>
        <!-- Main navigation panel component -->
        @component('components/nav')
        @endcomponent
        <div class="container">
            <div class="egle-viens-bilde produkts">
                <h3> Dāņu nordmann premium extra: </h3>
                <img id="danu-baltegle" v-if="danish_image" :key="danish_image.id" @click="switchNextImage('danish')" :src="danish_image.src">
                <a href="#" class="control_next" @click.prevent="switchNextImage('danish')">></a>
                <a href="#" class="control_prev" @click.prevent="switchPrevImage('danish')"><</a>
                        <hr>
                        <p class="main-description">
                            <strong> Importa, skaistas un masīvas egles kurām skujas nebirst līdz pat 3 menešiem.
                                Premium extra augstākās klases šķirne. </strong>
                        </p>
                        <p>Izmērs:
                            <select name="izmers" id="izmeri" class="select-css">
                                <option value="160">160cm</option>
                                <option value="170">170cm</option>
                                <option value="180">180cm</option>
                                <option value="190">190cm</option>
                                <option value="200">200cm</option>
                                <option value="210">210cm</option>
                                <option value="220">220cm</option>
                                <option value="230">230cm</option>
                                <option value="240">240cm</option>
                                <option value="250">250cm</option>
                                <option value="260">260cm</option>
                                <option value="270">270cm</option>
                            </select>
                        </p>
                        <p>Skaits:
                            <select name="skaits" id="skaiti" class="select-css">
                                <option value="1">1 Gab</option>
                                <option value="2">2 Gab</option>
                                <option value="3">3 Gab</option>
                                <option value="3+">Vairāk</option>
                            </select>
                            <strong>
                                <p> Cena: <span id="front_price1"> 0 </span> </p>
                            </strong>
                            <input type="button" value="Pasūtīt" class="order_button" id="order_button1">
                        </p>
            </div>
            <div class="egle-divi-bilde produkts">
                <h3> Latviešu audzētavas: </h3>
                <img id="lat-egle" v-if="lv_image" :key="lv_image.id" @click="switchNextImage('lv')" :src="lv_image.src">
                <a href="#" class="control_next" @click.prevent="switchNextImage('lv')">></a>
                <a href="#" class="control_prev" @click.prevent="switchPrevImage('lv')"><</a>
                        <hr>
                        <p class="main-description">
                            <strong>Latvijas audzētavas Ziemassvētku eglītes, skaistas, ļoti kuplas un smaržīgas.</strong>
                        </p>
                        <p>Izmērs:
                            <select name="izmers2" id="izmeri1" class="select-css">
                                <option value="160">160cm</option>
                                <option value="170">170cm</option>
                                <option value="180">180cm</option>
                                <option value="190">190cm</option>
                                <option value="200">200cm</option>
                                <option value="210">210cm</option>
                                <option value="220">220cm</option>
                                <option value="230">230cm</option>
                            </select>
                        </p>
                        <p>Skaits:
                            <select name="skaits" id="skaiti1" class="select-css">
                                <option value="1">1 Gab</option>
                                <option value="2">2 Gab</option>
                                <option value="3">3 Gab</option>
                                <option value="3+">Vairāk</option>
                            </select>
                            <strong>
                                <p>Cena: <span id="front_price2"> 0 </span> </p>
                            </strong>
                            <input type="button" value="Pasūtīt" class="order_button" id="order_button2">
                        </p>
            </div>
        </div>
        <div class="popup-form" hidden>
            <div style="text-align: center" class="order-info">
                <span> <strong>Jūsu pasūtījuma informācija : </strong> </span>
                <a class="close_popupform_link" href="#">X</a>
            </div>
            <form class="order_form" name="order_form" id="order_form" action="orders/order" method="POST">
                {{ csrf_field() }}
                <div class="order-items">
                    <b><span>Egles tips</span>: <span class="popup-egles-tips"></span><br>
                        <input type="text" name="egles_tips" id="egles_tips" hidden>
                        <span>Skaits</span> : <span class="popup-egles-skaits"> 0 </span><span> GAB </span><br>
                        <input type="text" name="egles_skaits" id="egles_skaits" hidden>
                        <span>Izmērs</span> : <span class="popup-egles-izmers"> 0x0 </span> <span> CM </span><br>
                        <input type="text" name="egles_izmers" id="egles_izmers" hidden>
                        <span>Cena</span> : <span class="popup-egles-cena"> 0 </span> </b> <br>
                    <input type="text" name="egles_cena" id="egles_cena" hidden>
                </div>
                <div class="contact-info">
                    <span> Vārds </span> : <br> <input type="text" name="name" id="client-name" required pattern="[a-zA-ZĀ-Žā-ž]{3,}" title="Jūsu vārds - vismaz 3 burti"> <br>
                    <span> Telefona Nr.: <br> </span> <input type="text" name="phone" id="client-phone" required pattern="[0-9+-]{8,}" title="Jūsu telefona nummurs - vismaz 8 cipari"> <br>
                    <span> Ar piegādi </span> <input type="checkbox" name="piegade"> <br>
                    <input type="submit" value="Pieteikt pasūtījumu" class="pieteikt-pasutijumu">
                    <input type="button" value="Atgriezties" class="close_popupform_button">
            </form>
        </div>
    </div>
    </div>
    <!-- Footer component -->
    @component('components/footer')
    @endcomponent
</body>
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{URL::asset('js/script.js')}}"></script>

</html>