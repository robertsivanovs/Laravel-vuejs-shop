var app = new Vue({
    el: "#vue-app",
    data() {
        return {
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
        this.setDefaultImage();
        $(".order_button").click(function () {
            $(".popup-form").fadeIn(550);
        });
        /* Append users selected christmas tree size and amount to popup order form */
        $("#order_button1").click(function () {
            $(".popup-egles-tips").html("Dāņu nordmann premium extra");
            $(".popup-egles-skaits").html($("#skaiti").val());
            $(".popup-egles-izmers").html($("#izmeri").val());
            $(".popup-egles-cena").html($("#front_price1").html());

            $("#egles_tips").val("Dāņu nordmann premium extra");
            $("#egles_skaits").val($("#skaiti").val());
            $("#egles_izmers").val($("#izmeri").val());
            $("#egles_cena").val($("#front_price1").html());
        });

        $("#order_button2").click(function () {
            $(".popup-egles-tips").html("Latviešu audzētavas");
            $(".popup-egles-skaits").html($("#skaiti1").val());
            $(".popup-egles-izmers").html($("#izmeri1").val());
            $(".popup-egles-cena").html($("#front_price2").html());

            $("#egles_tips").val("Latviešu audzētavas");
            $("#egles_skaits").val($("#skaiti1").val());
            $("#egles_izmers").val($("#izmeri1").val());
            $("#egles_cena").val($("#front_price2").html());
        });

        $(".close_popupform_button").click(function () {
            $(".popup-form").fadeOut(550);
        });

        $(".close_popupform_link").click(function () {
            event.preventDefault();
            $(".popup-form").fadeOut(550);
        });

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

        var price_koef = 1;

        /* Set default christmas tree prices */
        $(function () {
            set_price_koef(1, 1);
        });

        /* Set price whenever user updates tree size or amount */
        $("#izmeri").change(function () {
            set_price_koef(1);
        });

        $("#izmeri1").change(function () {
            set_price_koef(0, 1);
        });

        $("#skaiti").change(function () {
            set_price_koef(1);
        });

        $("#skaiti1").change(function () {
            set_price_koef(0, 1);
        });

        /*
         *    set_price_koef
         *
         *    Set price for each christmas tree depending on its size which user selects
         */
        function set_price_koef(baltegle, latvijas) {
            /* Danish christmas tree */
            if (baltegle) {
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
                }
            }
            /* Latvian christmas tree */
            if (latvijas) {
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
                }
            }
        }
    },
    methods: {
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
