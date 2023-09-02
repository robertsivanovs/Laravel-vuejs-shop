<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Ziemassvētku eglītes</title>
</head>

<body>
    <div id="vue-app">
        <div class="header-container">
            <div class="banner-text-container">
                <span class="banner-text">Eglīte Tev!</span>
                <div class="banner-contacts">
                    <span class="banner-text-telephone">T: +371 22222222</span>
                    <span class="banner-text-email">E: eglitetev@eglitetev.lv</span>
                </div>
                <div class="banner-social">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-snapchat-ghost"></a>
                </div>
            </div>

            <a href="/">
                <img class="banner" src="{{URL::asset('banner_new.jpg')}}" alt="img" /></a>
            <!-- Main navigation panel component -->
            @component('components/nav')
            @endcomponent
    </div>

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
                        <p>Izmērs (CM):
                            <select name="izmers" id="izmeri" class="select-css" v-model="tree_sizes.size_danish_tree" @click="setPrice('danish', $event)">
                            <template v-for="value, key in tree_prices_sizes.danish">
                                <option v-for="price in value" :value="price"> @{{ price }}</option> 
                            </template>                           
                                </select>
                        </p>
                        <p>Skaits:
                            <select name="skaits" id="skaiti" class="select-css" v-model="tree_amount.amount_danish_tree" @click="setPrice('danish')">
                                <option value="1">1 Gab</option>
                                <option value="2">2 Gab</option>
                                <option value="3">3 Gab</option>
                                <option value="3+">Vairāk</option>
                            </select>
                            <strong>
                                <p> Cena: <span id="front_price1"> 0 </span> </p>
                            </strong>
                            <button class="order-button" id="order_button1" @click="appendOrderInfoToForm('danish')">Pasūtīt</button>
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
                        <p>Izmērs (CM):
                            <select name="izmers2" id="izmeri1" class="select-css" v-model="tree_sizes.size_lv_tree" @click="setPrice('lv', $event)">
                            <template v-for="value, key in tree_prices_sizes.lv">
                            <option v-for="price in value" :value="price"> @{{ price }}</option> 
                            </template>
                            </select>
                        </p>
                        <p>Skaits:
                            <select name="skaits" id="skaiti1" class="select-css" v-model="tree_amount.amount_lv_tree" @click="setPrice('lv')">
                                <option value="1">1 Gab</option>
                                <option value="2">2 Gab</option>
                                <option value="3">3 Gab</option>
                                <option value="3+">Vairāk</option>
                            </select>
                            <strong>
                                <p>Cena: <span id="front_price2"> 0 </span> </p>
                            </strong>
                            <button class="order-button" id="order_button2" @click="appendOrderInfoToForm('lv')">Pasūtīt</button>
            </div>
        </div>
        <transition name="fade">
            <div v-if="show_popupform" class="popup-form">
                <div style="text-align: center" class="order-info">
                    <span> <strong>Jūsu pasūtījuma informācija : </strong> </span>
                    <a class="close-popupform-link" href="#" @click.prevent="show_popupform = !show_popupform">X</a>
                </div>
                <form class="order-form" name="order_form" id="order_form" action="orders/order" method="POST">
                    {{ csrf_field() }}
                    <div class="order-items">
                        <span>Egles tips: @{{ tree_type }}</span>
                        <input name="egles_tips" id="egles_tips" v-model="tree_type" hidden>
                        <span>Skaits: @{{ tree_front_amount }} GAB</span>
                        <input name="egles_skaits" id="egles_skaits" v-model="tree_front_amount" hidden>
                        <span>Izmērs: @{{ tree_front_size }} CM</span>
                        <input name="egles_izmers" id="egles_izmers" v-model="tree_front_size" hidden>
                        <span>Cena: @{{ tree_front_price }} EUR</span>
                        <input name="egles_cena" id="egles_cena" v-model="tree_front_price" hidden>
                    </div>
                    <div class="contact-info">
                        <span>Vārds: </span><input type="text" name="name" id="client-name" required pattern="[a-zA-ZĀ-Žā-ž]{3,}" title="Jūsu vārds - vismaz 3 burti">
                        <span>Telefona Nr.: </span><input type="text" name="phone" id="client-phone" required pattern="[0-9+-]{8,}" title="Jūsu telefona nummurs - vismaz 8 cipari">
                        <span>Ar piegādi <input type="checkbox" name="piegade"></span>
                        <input type="submit" value="Pieteikt pasūtījumu" class="pieteikt-pasutijumu">
                        <button class="close-popupform-button" @click="show_popupform = !show_popupform">Atgriezties</button>
                </form>
            </div>
        </transition>
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