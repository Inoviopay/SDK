$(document).ready(function () {
    var win_hight = $(window).height();// set footer at bottom
    $(".page-content-box").css("min-height", win_hight - 105 + "px");

    // reset request data from textarea
    $('.inovioreset-button').on('click', function () {
        $('#postdata').val('');
        $('#responseData.panel-body').html('');
    });

    // add active class to selected menu
    $(document).on('click', '.menu li a', function () {
        $(".menu li a").removeClass("active");
        $(this).addClass("active");
    });

    var filterMethod = getUrlParameter('request_action');
    $('#'+ filterMethod).addClass('active');

    // Reset textbox
    $('.inovioreset-button').on('click', function () {
        $('#responseData.panel-body').html('');
        $('textbox').val(null);
    });

    // view source code functionality
    $(document).on('click','.explore-source-code',function () {
        $.ajax({
            url: 'sampleCode.html',
            cache: false,
            success: function (response) {
                result = $(response).filter("#"+ filterMethod).html();
                result = (typeof(result) == 'undefined') ? 'Invalid reuqest' : result;

                $('.modal-title').html('Method Name:' + '  ' + filterMethod);
                $('.modal-body').html("<pre>" + result + "</pre>");
            }
        });
    });
});

function getUrlParameter(name)
{
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
};