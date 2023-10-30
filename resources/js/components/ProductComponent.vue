<template>
  <div class="container">
    <div class="first-product product">
      <h3> Dāņu nordmann premium extra: </h3>
      <img id="danish-product" v-if="danish_image" :key="danish_image.id" @click="switchNextImage('danish')" :src="danish_image.src">
      <a href="#" class="control_next" @click.prevent="switchNextImage('danish')">></a>
      <a href="#" class="control_prev" @click.prevent="switchPrevImage('danish')">&lt;</a>
      <p class="main-description">
        <strong> Importa, skaistas un masīvas egles kurām skujas nebirst līdz pat 3 menešiem.
                    Premium extra augstākās klases šķirne. 
        </strong>
      </p>
      <p>Izmērs (CM):
        <select name="danish-tree-sizes" id="danish-tree-sizes" class="select-css" v-model="tree_sizes.size_danish_tree" @click="setPrice('danish', $event)">
          <template v-for="value, key in tree_prices_sizes.danish">
              <option v-for="price in value" :value="price"> {{ price }}</option> 
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
      <a href="#" class="control_prev" @click.prevent="switchPrevImage('lv')">&lt;</a>
      <hr>
      <p class="main-description">
        <strong>Latvijas audzētavas Ziemassvētku eglītes, skaistas, ļoti kuplas un smaržīgas.</strong>
      </p>
      <p>Izmērs (CM):
        <select name="lv-tree-sizes" id="lv-tree-sizes" class="select-css" v-model="tree_sizes.size_lv_tree" @click="setPrice('lv', $event)">
          <template v-for="value, key in tree_prices_sizes.lv">
            <option v-for="price in value" :value="price"> {{ price }}</option> 
          </template>
        </select>
      </p>
      <p>Skaits:</p>
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
        <div class="order-items">
          <span>Egles tips: {{ tree_type }}</span>
          <input name="product-type" id="product-type" v-model="tree_type" hidden>
          <span>Skaits: {{ tree_front_amount }} GAB</span>
          <input name="product-count" id="product-count" v-model="tree_front_amount" hidden>
          <span>Izmērs: {{ tree_front_size }} CM</span>
          <input name="product-size" id="product-size" v-model="tree_front_size" hidden>
          <span>Cena: {{ tree_front_price }} EUR</span>
          <input name="product-price" id="product-price" v-model="tree_front_price" hidden>
        </div>
        <div class="contact-info">
          <span>Vārds: </span><input type="text" name="name" id="client-name" required pattern="[a-zA-Z Ā-Žā-ž]{3,}" title="Jūsu vārds - vismaz 3 burti">
          <span>Telefona Nr.: </span><input type="text" name="phone" id="client-phone" required pattern="[0-9+-]{8,}" title="Jūsu telefona nummurs - vismaz 8 cipari">
          <span>Ar piegādi <input type="checkbox" name="with-delivery"></span>
          <input type="submit" value="Pieteikt pasūtījumu" class="apply-order">
          <input type="hidden" name="_token" :value="csrfToken">
          <button class="close-popupform-button" @click="show_popupform = !show_popupform">Atgriezties</button>
        </div>
      </form>
    </div>
  </transition>
</template>

<script>
export default {
  props: {
    csrfToken: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      show_popupform: false,
      tree_type: "",
      tree_front_price: 0,
      tree_front_size: 0,
      tree_front_amount: 0,

      tree_sizes: {
        size_lv_tree: 160,
        size_danish_tree: 160,
      },
      tree_amount: {
        amount_danish_tree: 1,
        amount_lv_tree: 1,
      },
      tree_prices: {
        danish_tree_price: false,
        lv_tree_price: false,
      },

      tree_prices_sizes: {
        danish: {
          35: [160, 170, 180],
          40: [190],
          45: [200, 210, 220],
          60: [230, 240],
          80: [250, 260, 270],
        },
        lv: {
          20: [160, 170],
          25: [180, 190, 200],
          35: [210, 220, 230],
        },
      },

      indexes: {
        danish_index: 0,
        lv_index: 0,
      },
      danish_image: null,
      lv_image: null,
      danish_images: [
        {
          id: 1,
          src: "../egles/IMG_7391.JPG",
          alt: "Dāņu nordman",
        },
        {
          id: 2,
          src: "../egles/nordman/IMG_7391.JPG",
          alt: "Dāņu nordman",
        },
        {
          id: 3,
          src: "../egles/nordman/IMG_7437.JPG",
          alt: "Dāņu nordman",
        },
      ],
      lv_images: [
        {
          id: 1,
          src: "../egles/lat/IMG_4567.jpg",
          alt: "Latviešu audzētavas",
        },
        {
          id: 2,
          src: "../egles/lat/IMG_4568.jpg",
          alt: "Latviešu audzētavas",
        },
      ],
    };
  },
  mounted() {
    /* Set default product images and prices */
    this.setDefaultImage();
    this.setPrice("danish");
    this.setPrice("lv");

    /* Validation for empty or too short clients name or phone number fields */
    /* Rest of the validation is done server-side */
    $(".apply-order").click(function () {
      if ($("#client-name").val().length < 2) {
        event.preventDefault();
        alert("Lūdzu ievadiet vārdu!");
      }

      if ($("#client-phone").val().length < 8) {
        event.preventDefault();
        alert("Lūdzu ievadiet derīgu telefona nummuru!");
      }

      if ($("#client-phone").val().length > 8) {
        if (!$.isNumeric($("#client-phone").val())) {
          event.preventDefault();
          alert("Lūdzu ievadiet pareizu telefona nummuru!");
        }
      }
    });
  },
  methods: {        
    setPrice(tree_type, event = null) {
      var price_koef = 0;

      if (tree_type == "danish") {
        $.each(this.tree_prices_sizes.danish, function (index, value) {
          $.each(value, function (pos, size) {
            if (!event) {
              if (size == $("#danish-tree-sizes").val()) {
                price_koef = index;
              }
            }
            if (event && size == event.target.value) {
              price_koef = index;
            }
          });
        });

        if ($("#danish-tree-count").val() !== "3+") {
          $("#front_price1").html(
            price_koef * $("#danish-tree-count").val() + " EUR"
          );
        } else {
          $("#front_price1").html(
            "Individuāli vienojoties telefoniski"
          );
          return (this.tree_prices.danish_tree_price =
            "Individuāli vienojoties telefoniski");
        }
        this.tree_prices.danish_tree_price =
          price_koef * $("#danish-tree-count").val();
      }

      if (tree_type == "lv") {
        $.each(this.tree_prices_sizes.lv, function (index, value) {
          $.each(value, function (pos, size) {
            if (!event) {
              if (size == $("#lv-tree-sizes").val()) {
                price_koef = index;
              }
            }
            if (event && size == event.target.value) {
              price_koef = index;
            }
          });
        });

        if ($("#lv-tree-count").val() !== "3+") {
          $("#front_price2").html(
            price_koef * $("#lv-tree-count").val() + " EUR"
          );
        } else {
          $("#front_price2").html(
            "Individuāli vienojoties telefoniski"
          );
          return (this.tree_prices.lv_tree_price =
            "Individuāli vienojoties telefoniski");
        }
        this.tree_prices.lv_tree_price =
          price_koef * $("#lv-tree-count").val();
      }
    },
    appendOrderInfoToForm(tree_type) {
      this.tree_type = tree_type;
      this.show_popupform = !this.show_popupform;

      if (tree_type === "danish") {
        this.tree_type = "Dāņu nordman premium extra";
        this.tree_front_price = this.tree_prices.danish_tree_price;
        this.tree_front_size = this.tree_sizes.size_danish_tree;
        this.tree_front_amount = this.tree_amount.amount_danish_tree;
      }
      if (tree_type === "lv") {
        this.tree_type = "Latviešu audzētavas";
        this.tree_front_price = this.tree_prices.lv_tree_price;
        this.tree_front_size = this.tree_sizes.size_lv_tree;
        this.tree_front_amount = this.tree_amount.amount_lv_tree;
      }
    },
    setDefaultImage() {
      this.danish_image = this.danish_images[this.indexes.danish_index];
      this.lv_image = this.lv_images[this.indexes.lv_index];
    },
    switchNextImage(tree_type) {
      if (tree_type === "danish") {
        this.indexes.danish_index =
          (this.indexes.danish_index + 1) % this.danish_images.length;
        this.danish_image = this.danish_images[
          this.indexes.danish_index
        ];
      }
      if (tree_type === "lv") {
        this.indexes.lv_index =
          (this.indexes.lv_index + 1) % this.lv_images.length;
        this.lv_image = this.lv_images[this.indexes.lv_index];
      }
    },
    switchPrevImage(tree_type) {
      if (tree_type === "danish") {
        if (this.indexes.danish_index > 0) {
          this.indexes.danish_index =
            (this.indexes.danish_index - 1) %
              this.danish_images.length;
            this.danish_image = this.danish_images[
              this.indexes.danish_index
            ];
        } else {
            this.danish_image = this.danish_images[
              this.danish_images.length - 1
            ];
            this.indexes.danish_index =
              ([this.danish_images.length] - 1) %
                this.danish_images.length;
        }
      }
      if (tree_type === "lv") {
        if (this.indexes.lv_index > 0) {
          this.indexes.lv_index =
            (this.indexes.lv_index - 1) % this.lv_images.length;
            this.lv_image = this.lv_images[this.indexes.lv_index];
        } else {
          this.lv_image = this.lv_images[this.lv_images.length - 1];
          this.indexes.lv_index =
            ([this.lv_images.length] - 1) % this.lv_images.length;
        }
      }
    },
  },
}
</script>
