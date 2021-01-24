function changeImage() {
    event.preventDefault();
    
    if (document.getElementById("danu-baltegle").src == "https://eglitetev.lv/egles/3.jpg") {
        document.getElementById("danu-baltegle").src = "https://eglitetev.lv/egles/nordman/0ddce42e-2d35-4aa0-8a21-d6fde47b8fae.JPG";
    }

    else if (document.getElementById("danu-baltegle").src == "https://eglitetev.lv/egles/nordman/0ddce42e-2d35-4aa0-8a21-d6fde47b8fae.JPG") {
        document.getElementById("danu-baltegle").src = "https://eglitetev.lv/egles/nordman/1c2b303b-f043-45b5-8ec0-1d9697fcb503.JPG";
    }

    else if (document.getElementById("danu-baltegle").src == "https://eglitetev.lv/egles/nordman/1c2b303b-f043-45b5-8ec0-1d9697fcb503.JPG") {
        document.getElementById("danu-baltegle").src = "https://eglitetev.lv/egles/nordman/IMG_7391.JPG";
    }

    else if (document.getElementById("danu-baltegle").src == "https://eglitetev.lv/egles/nordman/IMG_7391.JPG") {
        document.getElementById("danu-baltegle").src = "https://eglitetev.lv/egles/nordman/IMG_7437.JPG";
    }
    else if (document.getElementById("danu-baltegle").src == "https://eglitetev.lv/egles/nordman/IMG_7437.JPG") {
        document.getElementById("danu-baltegle").src = "https://eglitetev.lv/egles/3.jpg";
    }
}

function changeImageLV() {
    event.preventDefault();

    if (document.getElementById("lat-egle").src == "https://eglitetev.lv/egles/lat/IMG_4567.jpg") {
        document.getElementById("lat-egle").src = "https://eglitetev.lv/egles/lat/IMG_4568.jpg";
    } else {
        document.getElementById("lat-egle").src = "https://eglitetev.lv/egles/lat/IMG_4567.jpg";
    }

}

$(".order_button").click(function () {
    $(".popup-form").fadeIn(550);
});

$("#order_button1").click(function () {

    $(".popup-egles-tips").html( "Dāņu nordmann premium extra" );
    $(".popup-egles-skaits").html( $("#skaiti").val() );
    $(".popup-egles-izmers").html( $("#izmeri").val() );
    $(".popup-egles-cena").html( $("#front_price1").html() );

    $("#egles_tips").val( "Dāņu nordmann premium extra" );
    $("#egles_skaits").val( $("#skaiti").val() );
    $("#egles_izmers").val( $("#izmeri").val() );
    $("#egles_cena").val( $("#front_price1").html() );

});

$("#order_button2").click(function () {

    $(".popup-egles-tips").html( "Latviešu audzētavas" );
    $(".popup-egles-skaits").html( $("#skaiti1").val() );
    $(".popup-egles-izmers").html( $("#izmeri1").val() );
    $(".popup-egles-cena").html( $("#front_price2").html() );

    $("#egles_tips").val( "Latviešu audzētavas" );
    $("#egles_skaits").val( $("#skaiti1").val() );
    $("#egles_izmers").val( $("#izmeri1").val() );
    $("#egles_cena").val( $("#front_price2").html() );

});

$(".close_popupform_button").click(function () {
    $(".popup-form").fadeOut(550);
});

$(".close_popupform_link").click(function () {
    event.preventDefault();
    $(".popup-form").fadeOut(550);
});


$(".pieteikt-pasutijumu").click(function () {

    if ( $("#client-name").val().length < 2 ) {
        event.preventDefault();
        alert("Lūdzu ievadiet vārdu!");
    }

    if ( $("#client-phone").val().length < 8 ) {
        event.preventDefault();
        alert("Lūdzu ievadiet derīgu telefona nummuru!");
    }

    if ( $("#client-phone").val().length > 8 ) {
        if (!$.isNumeric($("#client-phone").val())) {
            event.preventDefault();
            alert("Lūdzu ievadiet pareizu telefona nummuru!");
        }
    }
});

var price_koef = 1;

$(function() {
    get_price_koef(1, 1);
});

$( "#izmeri" ).change(function() {
    get_price_koef(1);
});

$( "#izmeri1" ).change(function() {
    get_price_koef(0, 1);
});

$( "#skaiti" ).change(function() {
    get_price_koef(1);
});

$( "#skaiti1" ).change(function() {
    get_price_koef(0, 1);
});


function get_price_koef(baltegle, latvijas) {

    if (baltegle) {

        var baltegle_cenas_35 = ['160', '170', '180'];
        var baltegle_cenas_40 = ['190'];
        var baltegle_cenas_45 = ['200', '210', '220'];
        var baltegle_cenas_60 = ['230', '240'];
        var baltegle_cenas_80 = ['250', '260', '270'];


        $.each(baltegle_cenas_35, function( index, value ) {

            if (value === $("#izmeri").val()) {
                price_koef = 35;
            }

        });

        $.each(baltegle_cenas_40, function( index, value ) {

            if (value === $("#izmeri").val()) {
                price_koef = 40;
            }

        });
        $.each(baltegle_cenas_45, function( index, value ) {

            if (value === $("#izmeri").val()) {
                price_koef = 45;
            }

        });
        $.each(baltegle_cenas_60, function( index, value ) {

            if (value === $("#izmeri").val()) {
                price_koef = 60;
            }

        });
        $.each(baltegle_cenas_80, function( index, value ) {

            if (value === $("#izmeri").val()) {
                price_koef = 80;
            }

        });

        if ($("#skaiti").val() !== "3+") {

            $("#front_price1").html(price_koef * $("#skaiti").val() + " EUR");

        } else {

            $("#front_price1").html("Individuāli vienojoties telefoniski");

        }
    }

    if (latvijas) {

        var latvijas_cenas_20 = ['160', '170'];
        var latvijas_cenas_25 = ['180', '190', '200'];
        var latvijas_cenas_35 = ['210', '220', '230'];

        $.each(latvijas_cenas_20, function( index, value ) {

            if (value === $("#izmeri1").val()) {
                price_koef = 20;
            }

        });

        $.each(latvijas_cenas_25, function( index, value ) {

            if (value === $("#izmeri1").val()) {
                price_koef = 25;
            }

        });

        $.each(latvijas_cenas_35, function( index, value ) {

            if (value === $("#izmeri1").val()) {
                price_koef = 35;
            }

        });

        if ($("#skaiti1").val() !== "3+") {

            $("#front_price2").html(price_koef * $("#skaiti1").val() + " EUR");

        } else {

            $("#front_price2").html("Individuāli vienojoties telefoniski");

        }
    }
}