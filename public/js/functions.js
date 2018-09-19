$(function () {
    //const api = "http://web.test/api/";

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

function getFormData($form){
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}