<link rel="shortcut icon" href="assets/img/eddga-icon.ico" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="views/assets/css2/bootstrap-dark.min.css">
<link rel="stylesheet" href="views/assets/css2/icons.min.css">
<link rel="stylesheet" href="views/assets/css2/app-dark.min.css">
<script src="views/assets/js2/jquery.min.js"></script>
<script src="/assets/random/sweetalert2/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="/assets/random/eroller.css">
<link rel="stylesheet" href="/assets/random/prism.css">
<link rel="stylesheet" href="/assets/random/touchspin/jquery.bootstrap-touchspin.min.css">
<script src="/assets/random/prism-min.js"></script>
<script src="/assets/random/eroller.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="/assets/random/touchspin/jquery.bootstrap-touchspin.min.js"></script>
<style type="text/css">
    .roller .er-item {
        width: 180px;
        height: 180px;
        font-size: 14px;
        padding: 5px;
    }
</style>
<script>
    $(document).ready(function() {
        $('#datatable_itemshop_history').DataTable();
        $('#datatable_user_random').DataTable();
    })
    jQuery(document).ready(function($) {

        var items = [{
            name: '<img src="/img/randomcsgo/2.png" width="200px" class="img-fluid">',
            value: 'credit_10_10',
        }, {
            name: '<img src="/img/randomcsgo/9.png" width="200px" class="img-fluid">',
            value: 'stock_4',
        }, {
            name: '<img src="/img/randomcsgo/4.png" width="200px" class="img-fluid">',
            value: 'none',
        }, {
            name: '<img src="/img/randomcsgo/5.png" width="200px" class="img-fluid">',
            value: 'stock_2',
        }, {
            name: '<img src="/img/randomcsgo/1.png" width="200px" class="img-fluid">',
            value: 'stock_1',
        }, {
            name: '<img src="/img/randomcsgo/3.png" width="200px" class="img-fluid">',
            value: 'credit_5_25',
        }, {
            name: '<img src="/img/randomcsgo/7.png" width="200px" class="img-fluid">',
            value: 'stock_3',
        }, {
            name: '<img src="/img/randomcsgo/1.png" width="200px" class="img-fluid">',
            value: 'credit_1_5',
        }, {
            name: '<img src="/img/randomcsgo/8.png" width="200px" class="img-fluid">',
            value: 'stock_8',
        }];

        $(".roller").eroller({
            items: items,
            key: 'name',
        });
        let itemname = "";
        $(document).on('click', '.start-spin', function() {
            $('.start-spin').attr('disabled', 'disabled');
            $(".start-spin").prop("disabled", true);
            $.ajax({
                type: 'POST',
                url: '/system/api/csgogame.php'
            }).done(function(res) {
                result = res;
                console.log(result);
                var winner = result.index;
                itemname = res.message;
                $('.roller').eroller('destroy').eroller({
                    items: items,
                    key: 'name',
                    direction: 'left',
                });
                $('.roller').eroller('start', 'value', winner, 5000);
                console.clear();
            }).fail(function(jqXHR) {
                res = jqXHR.responseJSON;
                Swal.fire({
                    text: res.message,
                    icon: 'error',
                    confirmButtonColor: '#00C851',
                    confirmButtonText: 'ตกลง',
                });
                console.log(res);
                console.clear();
                $('.start-spin').removeAttr('disabled');
            });
        });

        $(document).on('eroller.complete', '.roller', function(event, item) {
            $(".start-spin").prop("disabled", false);
            $('.start-spin').removeAttr('disabled');

            Swal.fire({
                text: itemname,
                icon: 'success',
                confirmButtonColor: '#00C851',
                confirmButtonText: 'ตกลง',
            }).then((result) => {
                window.location.href = "/random";
            });
            console.clear();
        });

    });
</script>
<!--favicon-->
<link href="views/assets/images/favicon.ico" rel="icon" type="image/x-icon" />