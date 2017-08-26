//regular expresion to use
RegExp.escape = function (s) {
    return s.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g, "\\$&");
};

var $rows = $('.patient');

$('#filterp').keyup(function () {
    var regex =  new RegExp(RegExp.escape($.trim(this.value).replace(/\s+/g, ' ')), 'i');
    $rows.hide().filter(function () {
        var text = $(this).text().replace(/\s+/g, ' ');
        return regex.test(text);
    }).show();
});