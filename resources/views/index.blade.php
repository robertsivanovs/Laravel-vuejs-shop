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
            <!-- Header component -->
            @component('components/header')
            @endcomponent
            <!-- Main navigation panel component -->
            @component('components/nav')
            @endcomponent
        </div>
        <div class="container">
            <div class="first-product product">
                <h3> Dāņu nordmann premium extra: </h3>
                <img id="danish-product" v-if="danish_image" :key="danish_image.id" @click="switchNextImage('danish')" :src="danish_image.src">
                <a href="#" class="control_next" @click.prevent="switchNextImage('danish')">></a>
                <a href="#" class="control_prev" @click.prevent="switchPrevImage('danish')"><</a>
                <p class="main-description">
                    <strong> Importa, skaistas un masīvas egles kurām skujas nebirst līdz pat 3 menešiem.
                                Premium extra augstākās klases šķirne. 
                    </strong>
                </p>
                <p>Izmērs (CM):
                    <select name="danish-tree-sizes" id="danish-tree-sizes" class="select-css" v-model="tree_sizes.size_danish_tree" @click="setPrice('danish', $event)">
                        <template v-for="value, key in tree_prices_sizes.danish">
                            <option v-for="price in value" :value="price"> @{{ price }}</option> 
                        </template>                           
                    </select>
                </p>
                <p>Skaits:
                    <select name="danish-tree-count" id="danish-tree-count" class="select-css" v-model="tree_amount.amount_danish_tree" @click="setPrice('danish')">
                        <option value="1">1 Gab</option>
                        <option value="2">2 Gab</option>
                        <option value="3">3 Gab</option>
                        <option value="3+">Vairāk</option>
                    </select>
                    <strong>
                        <p>Cena: <span id="front_price1">0</span></p>
                    </strong>
                    <button class="order-button" id="order_button1" @click="appendOrderInfoToForm('danish')">Pasūtīt</button>
                </p>
            </div>

            <div class="second-product product">
                <h3> Latviešu audzētavas: </h3>
                <img id="lat-egle" v-if="lv_image" :key="lv_image.id" @click="switchNextImage('lv')" :src="lv_image.src"/>
                <a href="#" class="control_next" @click.prevent="switchNextImage('lv')">></a>
                <a href="#" class="control_prev" @click.prevent="switchPrevImage('lv')"><</a>
                <hr>
                <p class="main-description">
                    <strong>Latvijas audzētavas Ziemassvētku eglītes, skaistas, ļoti kuplas un smaržīgas.</strong>
                </p>
                <p>Izmērs (CM):
                    <select name="lv-tree-sizes" id="lv-tree-sizes" class="select-css" v-model="tree_sizes.size_lv_tree" @click="setPrice('lv', $event)">
                        <template v-for="value, key in tree_prices_sizes.lv">
                            <option v-for="price in value" :value="price"> @{{ price }}</option> 
                        </template>
                    </select>
                </p>
                <p>Skaits:
                    <select name="lv-tree-count" id="lv-tree-count" class="select-css" v-model="tree_amount.amount_lv_tree" @click="setPrice('lv')">
                        <option value="1">1 Gab</option>
                        <option value="2">2 Gab</option>
                        <option value="3">3 Gab</option>
                        <option value="3+">Vairāk</option>
                    </select>
                    <strong>
                        <p>Cena: <span id="front_price2"> 0 </span></p>
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
                        <input name="product-type" id="product-type" v-model="tree_type" hidden>
                        <span>Skaits: @{{ tree_front_amount }} GAB</span>
                        <input name="product-count" id="product-count" v-model="tree_front_amount" hidden>
                        <span>Izmērs: @{{ tree_front_size }} CM</span>
                        <input name="product-size" id="product-size" v-model="tree_front_size" hidden>
                        <span>Cena: @{{ tree_front_price }} EUR</span>
                        <input name="product-price" id="product-price" v-model="tree_front_price" hidden>
                    </div>
                    <div class="contact-info">
                        <span>Vārds: </span><input type="text" name="name" id="client-name" required pattern="[a-zA-ZĀ-Žā-ž]{3,}" title="Jūsu vārds - vismaz 3 burti">
                        <span>Telefona Nr.: </span><input type="text" name="phone" id="client-phone" required pattern="[0-9+-]{8,}" title="Jūsu telefona nummurs - vismaz 8 cipari">
                        <span>Ar piegādi <input type="checkbox" name="with-delivery"></span>
                        <input type="submit" value="Pieteikt pasūtījumu" class="apply-order">
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
