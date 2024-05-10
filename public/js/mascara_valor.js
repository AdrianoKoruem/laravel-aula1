var KTMaskDemo = function () {

    var demos = function () {

        $('#mascara_valor').mask("#.##0,00", {
            reverse: true
        });
    }

    return {
        init: function () {
            demos();
        }
    };
}();


jQuery(document).ready(function () {
    KTMaskDemo.init();
});