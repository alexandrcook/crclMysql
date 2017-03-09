<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap Core CSS -->
    <link href="/views/template/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/views/template/css/shop-homepage.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="/views/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/views/template/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {

            var rebuildTable = function ($tableName) {
                var $parent = ($($tableName));
                var $tableHead = $('h2', $tableName);
                var $tableHeadNum = $('span', $tableHead);
                console.log($tableHeadNum.html());
                $tableHeadNum.html(parseInt($tableHeadNum.html()) + 1);
                var $tbody = $('tbody', $parent);
                var $allTr = $('tr', $tbody);
                $allTr.each(function () {
                    var allTd = $('td', this);
                    var $firstTd = $(allTd[0]);
                    $firstTd.html(parseInt($firstTd.html()) + 1);
                    console.log($firstTd.html());
                })
            };

            $('#searchFormAjax').on('submit', function (event) {
                event.stopPropagation(); // Остановка происходящего
                event.preventDefault();  // Полная остановка происходящего

                var form_data = new FormData(this); //constructs key/value pairs representing fields and values

                $.ajax({ //ajax form submit
                    url: "/guestbook",
                    type: 'POST',
                    data: form_data,
                    dataType: "json",
                    contentType: false,
                    cache: false,
                    processData: false
                }).done(function (res) {
                    console.log('res type ' + res.type);
                    //fetch server "json" messages when done
                    if (res.type == "error") {
                        $("#contact_results").html('<div class="error">' + res.text + "</div>");
                    }
                    if (res.type == "done") {
                        console.log(res);
                        $("#contact_results").html('<div class="success">' + res.text + "</div>");
                    }
                }).error(function (error) {
                        console.log(error);
                        //console.log(textStatus);
                        //console.log(jqXHR);
                        var data = error.responseText;
                        //$(".ajax-respond").html('<div class="error">' + data + "</div>");
                        $('.toload').html('');
                        $('.toload').append('<h1>Отзыв добавлен</h1>');
                        $('#tableToLoadData').prepend(data);
                        rebuildTable('#toLoadTable');
                        $('#searchFormAjax').trigger('reset');
                        console.log(data);
                });
            });

        });

    </script>
    <title>Crcl MySQL</title>
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<div class="container">
    <div class="row">
        <div class="col-xs-12 messages-pole">
            <div class="toload"></div>

            <hr>
        </div>
    </div>


