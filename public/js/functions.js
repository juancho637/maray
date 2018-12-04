$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

function collapseChecked(trigger, content) {
    $('#'+trigger).on('ifToggled', function () {
        if($(this).is(":checked")){
            $('#'+content).collapse('show');
        } else {
            $('#'+content).collapse('hide');
        }
    });
    if($('#'+trigger).is(":checked")){
        $('#'+content).collapse('show');
    }
}

function boxChecked(trigger, content) {
    $('#'+trigger).on('ifToggled', function () {
        if($(this).is(":checked")){
            $('#'+content).boxWidget('expand');
        } else {
            $('#'+content).boxWidget('collapse');
        }
    });
    if($('#'+trigger).is(":checked")){
        $('#'+content).boxWidget('expand');
    }
}