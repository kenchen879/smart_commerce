$(document).ready(function(e) {
    var totalI = $("#pNo").val();
    for (let i = 1; i <= totalI; i++) {
        $('#uploadForm' + i).on('change', (function(e) {
            e.preventDefault();
            $.ajax({
                url: 'upload.php?pNo=' + i,
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('#imageData' + i).attr('src', '../../images/' + data);
                },
                error: function() {}
            });
        }));
    }
});