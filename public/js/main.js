function setFooterHeight() {
    if ($(document).height() <= $(window).height()) {
        $('footer').addClass('fixed-bottom')
    } else {
        $('footer').removeClass('fixed-bottom')
    }
}

function setHeight() {
    var e = $('#mapHeight').width();
    $('#mapHeight').height(e);
    $('.photoContactCarausel').height(e);
    $('#travelAgencyEntrance').height(e)
}

function mainImageHeight() {
    var e = $('header').height();
    $('#mainImage').height($(window).height() - e)
}
$(window).resize(function () {
    setHeight();
    mainImageHeight();
    setFooterHeight()
});
$(document).ready(function () {
    setHeight();
    mainImageHeight();
    setFooterHeight()
});
$('#aboutLink').click(function () {
    $('html, body').animate({
        scrollTop: $('#aboutus').offset().top + 'px'
    }, 1500)
});
$('.upNewsLink').click(function () {
    $('html, body').animate({
        scrollTop: $('#news').offset().top + 'px'
    }, 1500)
});
$('#transportCarausel').carousel({
    interval: 3000
});
$('#contactCarausel').carousel({
    interval: 3000
});