
$(function() {
    "use strict";

    $(document).ready(function () {
        categoryByAjax();
    });

});
function categoryByAjax() {
    var url = $('#url').val();

    selector = $('.categories-by-ajax');

    selector.select2({
        placeholder: "Select Category",
        minimumInputLength: 2,
        ajax: {
            type: "GET",
            dataType: 'json',
            url: url + '/api/categories-by-ajax',
            data: function (params) {
                return {
                    q: params.term // search term
                };
            },
            delay: 250,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processResults: function (data) {
                data.push({
                    id:"___",
                    text:"None"
                });
                return {
                    results: data
                };
            },
            cache: true
        }
    });
}

