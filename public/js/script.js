var app = new Vue({
    el: "#vue-app",
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
            indexes: {
                danish_index: 0,
                lv_index: 0,
            },
            danish_image: null,
            lv_image: null,
            danish_images: [
                {
                    id: 1,
                    src:
                        "https://eglitetev.lv/egles/nordman/0ddce42e-2d35-4aa0-8a21-d6fde47b8fae.JPG",
                    alt: "Dāņu nordman",
                },
                {
                    id: 2,
                    src: "https://eglitetev.lv/egles/nordman/IMG_7391.JPG",
                    alt: "Dāņu nordman",
                },
                {
                    id: 3,
                    src: "https://eglitetev.lv/egles/nordman/IMG_7437.JPG",
                    alt: "Dāņu nordman",
                },
            ],
            lv_images: [
                {
                    id: 1,
                    src: "https://eglitetev.lv/egles/lat/IMG_4567.jpg",
                    alt: "Latviešu audzētavas",
                },
                {
                    id: 2,
                    src: "https://eglitetev.lv/egles/lat/IMG_4568.jpg",
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
        $(".pieteikt-pasutijumu").click(function () {
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
        setPrice(tree_type) {
            if (tree_type == "danish") {
                var price_koef = 35;
                var baltegle_cenas_35 = ["160", "170", "180"];
                var baltegle_cenas_40 = ["190"];
                var baltegle_cenas_45 = ["200", "210", "220"];
                var baltegle_cenas_60 = ["230", "240"];
                var baltegle_cenas_80 = ["250", "260", "270"];

                $.each(baltegle_cenas_35, function (index, value) {
                    if (value === $("#izmeri").val()) {
                        price_koef = 35;
                    }
                });

                $.each(baltegle_cenas_40, function (index, value) {
                    if (value === $("#izmeri").val()) {
                        price_koef = 40;
                    }
                });
                $.each(baltegle_cenas_45, function (index, value) {
                    if (value === $("#izmeri").val()) {
                        price_koef = 45;
                    }
                });
                $.each(baltegle_cenas_60, function (index, value) {
                    if (value === $("#izmeri").val()) {
                        price_koef = 60;
                    }
                });
                $.each(baltegle_cenas_80, function (index, value) {
                    if (value === $("#izmeri").val()) {
                        price_koef = 80;
                    }
                });

                if ($("#skaiti").val() !== "3+") {
                    $("#front_price1").html(
                        price_koef * $("#skaiti").val() + " EUR"
                    );
                } else {
                    $("#front_price1").html(
                        "Individuāli vienojoties telefoniski"
                    );
                    return (this.tree_prices.danish_tree_price =
                        "Individuāli vienojoties telefoniski");
                }
                this.tree_prices.danish_tree_price =
                    price_koef * $("#skaiti").val();
            }

            if (tree_type === "lv") {
                var price_koef = 20;
                var latvijas_cenas_20 = ["160", "170"];
                var latvijas_cenas_25 = ["180", "190", "200"];
                var latvijas_cenas_35 = ["210", "220", "230"];

                $.each(latvijas_cenas_20, function (index, value) {
                    if (value === $("#izmeri1").val()) {
                        price_koef = 20;
                    }
                });

                $.each(latvijas_cenas_25, function (index, value) {
                    if (value === $("#izmeri1").val()) {
                        price_koef = 25;
                    }
                });

                $.each(latvijas_cenas_35, function (index, value) {
                    if (value === $("#izmeri1").val()) {
                        price_koef = 35;
                    }
                });

                if ($("#skaiti1").val() !== "3+") {
                    $("#front_price2").html(
                        price_koef * $("#skaiti1").val() + " EUR"
                    );
                } else {
                    $("#front_price2").html(
                        "Individuāli vienojoties telefoniski"
                    );
                    return (this.tree_prices.lv_tree_price =
                        "Individuāli vienojoties telefoniski");
                }
                this.tree_prices.lv_tree_price =
                    price_koef * $("#skaiti1").val();
            }
        },
        appendOrderInfoToForm(tree_type) {
            this.tree_type = tree_type;
            this.show_popupform = !this.show_popupform;

            if (tree_type === "danish") {
                this.tree_type = "Dāņu nordman premium extra";
                this.tree_front_price = this.tree_prices.danish_tree_price;
                this.tree_front_size = this.tree_sizes.size_danish_tree;
                this.tree_front_amount = this.tree_amount.amount_danish_tree
            }
            if (tree_type === "lv") {
                this.tree_type = "Latviešu audzētavas";
                this.tree_front_price = this.tree_prices.lv_tree_price;
                this.tree_front_size = this.tree_sizes.size_lv_tree;
                this.tree_front_amount = this.tree_amount.amount_lv_tree
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
});
