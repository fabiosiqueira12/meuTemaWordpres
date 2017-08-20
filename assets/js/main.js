$(document).ready(function () {

    $(document).on("scroll", onScroll);

    if ($(window).scrollTop() > $(".header-principal").outerHeight()) {
        $(".header-principal").addClass("back-fixo");
    } else {
        $(".header-principal").removeClass("back-fixo");
    }

    $(window).scroll(function () {
        if ($(window).scrollTop() > $(".header-principal").outerHeight()) {
            $(".header-principal").addClass("back-fixo");

        } else {
            $(".header-principal").removeClass("back-fixo");
        }
    });

    $(".lista-principal").find("a").each(function () {
        $(this).addClass("hvr-underline-from-left");
        $(this).addClass("desce-efeito");
    });

    $('select').material_select();
    $('.venobox').venobox({
        spinner : 'cube-grid',
        overlayClose : false,
        numeratio  : true,
        infinigall : true,
        closeBackground : '#000',
        numerationBackground : '#000'
    });

    $(".btn-galeria").click(function () {
        var quantidade = $(this).parent().parent().find('.card-gallery').find("a");
        if (quantidade.length > 0){
            $(this).parent().parent().find(".card-gallery").find("a").each(function () {
                $(this).trigger("click");
                return false;
            });
        }else{
            swal("Opss!", "Desculpe, ainda não possui galeria !!!", "warning");
        }
    });

    // browser window scroll (in pixels) after which the "back to top" link is shown
    var offset = 300,
        //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
        offset_opacity = 1200,
        //duration of the top scrolling animation (in ms)
        scroll_top_duration = 700,
        //grab the "back to top" link
        $back_to_top = $('.cd-top');
    //hide or show the "back to top" link
    $(window).scroll(function () {
        ($(this).scrollTop() > offset) ? $back_to_top.addClass('cd-is-visible'): $back_to_top.removeClass('cd-is-visible cd-fade-out');
        if ($(this).scrollTop() > offset_opacity) {
            $back_to_top.addClass('cd-fade-out');
        }
    });
    //smooth scroll to top
    $back_to_top.on('click', function (event) {
        event.preventDefault();
        $('body,html').animate({
            scrollTop: 0,
        }, scroll_top_duration);
    });

    $(".btn-descer").click(function (event) {
        event.preventDefault();
        $('body,html').animate({
            scrollTop: $($(this).attr("href")).offset().top - 120
        }, 700);
    });
    $(".desce-efeito").click(function (event) {
        $("body").removeClass("menu-ativo");
        $(".overlay-menu").slideUp();

        event.preventDefault();

        $('body,html').animate({

            scrollTop: $($(this).attr("href")).offset().top - 80

        }, 700);

    });

    $(".btn-menu").click(function () {
        $("body").addClass("menu-ativo");
        $(".overlay-menu").slideDown();
    });

    $(".btn-fecha").click(function () {
        $("body").removeClass("menu-ativo");
        $(".overlay-menu").slideUp();
    });

});

function onScroll(event) {
    var scrollPos = $(document).scrollTop();
    $('.lista-principal a').each(function () {
        var currLink = $(this);
        var refElement = $(currLink.attr("href"));
        if ( (refElement.position().top - 100) <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            if ($(refElement).attr("id") != "inicio") {
                currLink.addClass("active");
            } else {
                currLink.removeClass("active");
            }
        } else {
            currLink.removeClass("active");
        }
    });
}

function sendEmail(form, url) {
    var dados = $(form).serializeArray();
    console.log(dados);
    $("#loading").addClass("show");
    $("body").addClass("menu-ativo");

    $.ajax({
        type: "POST",
        url: url,
        data: dados,
        dataType: 'json',
        success: function (response) {
            if (response.type == 1) {
                swal("Sucesso !!", response.message, "success");
                $(form).trigger("reset");
            } else {
                swal("Erro !!", response.message, "error");
                console.log(response.mensage);
            }
        },
        error: function (response) {
            swal("Erro !!", response.message, "error");
            console.log(response.mensage);
        }

    }).always(function () {
        $("#loading").removeClass("show");
        $("body").removeClass("menu-ativo");
    });

}