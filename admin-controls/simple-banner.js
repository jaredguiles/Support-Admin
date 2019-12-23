jQuery(document).ready(function ($) {
    $('<div id="simple-banner" class="simple-banner"></div> <style>#top-header{top: 74px !important;} #main-header{top: 104px !important;} #main-content{margin-top: 43px !important;}</style>')
        .prependTo('body');

    var bodyPaddingLeft = $('body').css('padding-left')
    var bodyPaddingRight = $('body').css('padding-right')

    if (bodyPaddingLeft != "0px") {
        $('head').append('<style type="text/css" media="screen">.simple-banner{margin-left:-' + bodyPaddingLeft + ';padding-left:' + bodyPaddingLeft + ';}</style>');
    }
    if (bodyPaddingRight != "0px") {
        $('head').append('<style type="text/css" media="screen">.simple-banner{margin-right:-' + bodyPaddingRight + ';padding-right:' + bodyPaddingRight + ';}</style>');
    }
});
