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
// $('#contactForm').bind('submit', function (e) {
//     e.preventDefault();
//     $('#contactFormMessage').empty();
//     $('#contactFormMessage').removeClass('alert-danger');
//     $('#contactFormMessage').removeClass('alert-success');
//     var tokenKey = $('meta[name=\'csrf-param\']').attr('content');
//     var token = $('meta[name=\'csrf-token\']').attr('content');
//     var postData = {
//         email: $('#contactFormEmail').val(),
//         name: $('#contactFormName').val(),
//         question: $('#contactFormQuestion').val()
//     };
//     postData[tokenKey] = token;
//     var url = $('#contactForm').attr('action');
//     $.ajax({
//         url: url,
//         type: 'post',
//         dataType: 'JSON',
//         data: postData,
//         beforeSend: function () {
//             $('#formStatus').removeClass('invisible');
//             $('#formStatus').addClass('visible')
//         },
//         success: function (data) {
//             $('meta[name=\'csrf-param\']').attr('content', data[0].tokenKey);
//             $('meta[name=\'csrf-token\']').attr('content', data[0].token);
//             $('#formStatus').removeClass('visible');
//             $('#formStatus').addClass('invisible');
//             if (data.length == 2 && data[1].result == 'success') {
//                 $('#contactFormMessage').removeClass('alert-danger');
//                 $('#contactFormMessage').addClass('alert-success');
//                 $('#contactFormMessage').text('Спасибо! Мы постараемся ответить как можно скорее!');
//                 $('#contactForm').trigger('reset')
//             } else {
//                 for (var i = 1; i < data.length; i += 1) {
//                     $('#contactFormMessage').append('<div class=\'alert alert-danger\' role=\'alert\'>' + data[i].message + '</div>')
//                 }
//             }
//         },
//         error: function (data) {
//             $('#formStatus').removeClass('visible'), $('#contactFormMessage').addClass('alert-danger'), $('#contactFormMessage').removeClass('alert-success'), $('#formStatus').addClass('invisible'), $('#contactFormMessage').text('Произошла ошибка... Обновите страницу или повторите попытку позднее.')
//         }
//     })
// });
$('#transportCarausel').carousel({
    interval: 3000
});
$('#contactCarausel').carousel({
    interval: 3000
});