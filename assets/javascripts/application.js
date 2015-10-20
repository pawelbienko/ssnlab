$(document).ready(function() {

//$('#and').hover(function(){
//    var src = $(this).val();

//});
    $('#neuronHidden').on('change', function(){
       val = $(this).val();
       $('.number').children().remove();
       $('.number').append('<p>'+val+'</p>');
    });

    $('#select_method').val(1);
    $('input').prop('disabled', true);
    $('#select_method').on('change', function() {
        if ($(this).val() == 3) {
            $('input').prop('disabled', false);
            $('#alfa').prop('readOnly', false);
            $('#alfa').val('');
            $("input:checkbox").prettyCheckable('enable');
        }
         if ($(this).val() == 2) {
            $('input').prop('disabled', false);
            $('#alfa').prop('readOnly', true);
            $('#alfa').val(0);
            $("input:checkbox").prettyCheckable('enable');
        }
        if ($(this).val() == 1) {
            $('#alfa').val('');
            $('input').prop('disabled', true);
            $("input:checkbox").prettyCheckable('disable');
        }
    });

    $('input.myClass').each(function() {
        $(this).prettyCheckable({
            color: 'red'
        });
    });
    $("input:checkbox").prettyCheckable('uncheck');
    $("input[name*='arr']").val("");
    $("input#output1").val("");
    $("input#output2").val("");
    $("input#output3").val("");
    $("input#output4").val("");

    $("#alfa").val("");
    $("#beta").val("");
    $("#epoch").val("");
    $("#thresh").val("");
    $("#neuronHidden").val("");
    $("#sample").val("");

    $("#alfa").tooltip({'trigger': 'focus', 'title': 'Współczynnik momentum zwiększa płynność procesu uczenia zmniejsza automatycznie szybkość uczenia w miarę zbliżania się do włąściwego rozwiązania najlepiej przyjmować wartości od 0 do 1.', 'placement': "right"});
    $("#beta").tooltip({'trigger': 'focus', 'title': 'Współczynnik uczenia(współczynnik korekty wag) wpływa na to o ile zmieni się wag neuronu,najlepiej przyjmować wartości od 0 do 1. ', 'placement': "right"});
    $("#epoch").tooltip({'trigger': 'focus', 'title': 'Maksymalna liczba epok(iteracji procesu uczenia), po której proces uczenia zostanie przerwany.', 'placement': "right"});
    $("#thresh").tooltip({'trigger': 'focus', 'title': 'Oczekiwana dokładność procesu uczenia, kiedy błąd osiągnie daną wartość algorytm uzna sieć za nauczoną.', 'placement': "right"});
    $("#neuronHidden").tooltip({'trigger': 'focus', 'title': 'Liczba neuronów w warstwie uktrytej', 'placement': "right"});
    $("#sample").tooltip({'trigger': 'focus', 'title': 'Określa co ile epok będzie sieć zwracać odpowiedzi. Ten parametr wynika zasobożerności renderowania wykresu(zalecam nie mniej niż 10)', 'placement': "right"});


    $("#and").popover({'trigger': 'hover', 'title': 'AND', 'template':
                '<div class="tooltip" role="tooltip">\n\
                    <div class="tooltip-arrow">\n\
                    </div>\n\
                    <div class="tooltip-inner">\n\
                       <img height=90px width=150px src="/app/assets/img/and.png">\n\
                    </div>\n\
                </div>', 'placement': "right"});
    $("#nand").popover({'trigger': 'hover', 'title': 'NAND', 'template': '<div class="tooltip" role="tooltip">\n\
                    <div class="tooltip-arrow">\n\
                    </div>\n\
                    <div class="tooltip-inner">\n\
                       <img height=90px width=150px src="/app/assets/img/nand.png">\n\
                    </div>\n\
                </div>', 'placement': "right"});
    $("#or").popover({'trigger': 'hover', 'title': 'fdfa', 'template': '<div class="tooltip" role="tooltip">\n\
                    <div class="tooltip-arrow">\n\
                    </div>\n\
                    <div class="tooltip-inner">\n\
                       <img height=90px width=150px src="/app/assets/img/or.png">\n\
                    </div>\n\
                </div>', 'placement': "right"});
    $("#xor").popover({'trigger': 'hover', 'title': 'fdfa', 'template': '<div class="tooltip" role="tooltip">\n\
                    <div class="tooltip-arrow">\n\
                    </div>\n\
                    <div class="tooltip-inner">\n\
                       <img height=90px width=150px src="/app/assets/img/xor.png">\n\
                    </div>\n\
                </div>', 'placement': "right"});
    $("#nor").popover({'trigger': 'hover', 'title': 'fdfa', 'template': '<div class="tooltip" role="tooltip">\n\
                    <div class="tooltip-arrow">\n\
                    </div>\n\
                    <div class="tooltip-inner">\n\
                       <img height=90px width=150px src="/app/assets/img/nor.png">\n\
                    </div>\n\
                </div>', 'placement': "right"});
    $("#xnor").popover({'trigger': 'hover', 'title': 'fdfa', 'template': '<div class="tooltip" role="tooltip">\n\
                    <div class="tooltip-arrow">\n\
                    </div>\n\
                    <div class="tooltip-inner">\n\
                       <img height=90px width=150px src="/app/assets/img/xnor.png">\n\
                    </div>\n\
                </div>', 'placement': "right"});

    $('#ajaxform').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            alfa: {
                validators: {
                    notEmpty: {
                        message: 'Pole jest wymagane !'
                    },
                    numeric: {
                        message: 'Możesz podawać tylko liczby !'
                    },
                    between: {
                        min: 0,
                        max: 1,
                        message: 'Współczynnik momentum musi być większy od 0 i mniejszy 1'
                    }
                }
            }, beta: {
                validators: {
                    notEmpty: {
                        message: 'Pole jest wymagane !'
                    },
                    numeric: {
                        message: 'Możesz podawać tylko liczby !'
                    },
                    between: {
                        min: 0.1,
                        max: 1,
                        message: 'Współczynnik uczenia musi być większy od 0 i mniejszy 1'
                    }
                }
            }, epoch: {
                validators: {
                    notEmpty: {
                        message: 'Pole jest wymagane !'
                    },
                    integer: {
                        message: 'Możesz podawać tylko liczby !'
                    },
                    between: {
                        min: 100,
                        max: 500000,
                        message: 'Liczba epok musi być nie mniejsza od 100 i nie większa niż 500000'
                    }
                }
            }, thresh: {
                validators: {
                    notEmpty: {
                        message: 'Pole jest wymagane !'
                    },
                    numeric: {
                        message: 'Możesz podawać tylko liczby !'
                    },
                    between: {
                        min: 0,
                        max: 1,
                        message: 'Próg dokładności musi być nie mniejsza niż 10 0 i nie większa niż 1'
                    }
                }
            }, neuronHidden: {
                validators: {
                    notEmpty: {
                        message: 'Pole jest wymagane !'
                    },
                    between: {
                        min: 1,
                        max: 100,
                        message: 'Liczba neuronów musi być nie mniejsza niż 1 i nie większa niż 100'
                    },
                    integer: {
                        message: 'Możesz podawać tylko liczby !'
                    }
                }
            }, sample: {
                validators: {
                    notEmpty: {
                        message: 'Pole jest wymagane !'
                    },
                    integer: {
                        message: 'Możesz podawać tylko liczby !'
                    },
                    between: {
                        min: 10,
                        max: 100,
                        message: 'Liczba epok musi być niemniejsza niż 10'
                    }
                }
            }
        }
    }).on('success.form.bv', function(e)
    {
        $("body").css("cursor", "progress");
        $('#firstweight').children().remove();
        $('#finalweight').children().remove();
        $('#epochnumber').children().remove();
        var postData = $('#ajaxform').serializeArray();
        error = 0;
        $.each(postData, function(i, item) {
            if (item.value == '') {
                alert('Do wykonania procesu uczenia potrzebne są wszytkie parametry ! Wybierz bramkę logiczną.');
                error = 1;
                return false;
            }
        });
        if (error != 1) {
            var formURL = $('#ajaxform').attr("action");
            $.ajax(
                    {
                        url: formURL,
                        type: "POST",
                        data: postData,
                        success: function(data, textStatus, jqXHR)
                        {
                            $("body").css("cursor", "auto");
                            if (!data['firstweight']) {
                                alert('Proces uczenia zakończył się niepowodzeniem');
                            }
                            var tablefirstweight;
                            var first_firstcolumn = [];
                            var first_secondcolumn = [];
                            $.each(data['firstweight'][0], function(i, item) {
                                $.each(data['firstweight'][0][i], function(j, item) {
                                    if (i == 1) {
                                        first_firstcolumn[j] = item;
                                    } else {
                                        $.each(data['firstweight'][0][i][j], function(k, item) {
                                            first_secondcolumn[k] = item;
                                        });
                                    }
                                });
                            });
                            
                            a = '<h3 class="text-center">Wartości Wag i Biasów</h3>\n\
                                <div class="col-md-12">\n\
                                    <div class="col-md-6">\n\
                                        <div class="col-md-12 bordered shadow white">\n\
                                            <div class="col-md-12"><h4 class="text-center">Wylosowane Wartości Wag i Biasów</h4></div>\n\
                                                <table  id="firstweight" class="table table-hover table-bordered table-striped table-condensed col-md-12">\n\
                                                </table>\n\
                                            </div>\n\
                                        </div>\n\
                                    <div class="col-md-6">\n\
                                        <div class="col-md-12 bordered shadow white">\n\
                                            <div class="col-md-12"><h4 class="text-center">Wartości Wag i Biasów Sieci Nauczonej</h4></div>\n\
                                            <table id="finalweight" class="table table-hover table-bordered table-striped table-condensed col-md-12">\n\
                                            </table>\n\
                                        </div>\n\
                                    </div>\n\
                                </div>';
                            
                            $('.placeholder').append(a);
                            
                            tablefirstweight += '<tr>\n\
                                            <th class="text-center">Warstwa Ukrytej</th><th class="text-center">Warstwa Wyściowa</th>\n\
                                            </tr>';
                            tablefirstweight += '<tr>';
                            tablefirstweight += '<td class="col-md-4">';
                            tablefirstweight += '</td>';
                            tablefirstweight += '<td class="col-md-4">';
                            tablefirstweight += '<small>Bias' + first_secondcolumn.length + '</small> = ' + first_secondcolumn[first_secondcolumn.length - 1];
                            tablefirstweight += '</td>';
                            tablefirstweight += '</tr>';

                            $.each(first_firstcolumn, function(i, item) {
                                $.each(item, function(k, val) {
                                    tablefirstweight += '<tr>';
                                    tablefirstweight += '<td class="col-md-4">';
                                    a = 2;
                                    if (k == 0) {
                                        tablefirstweight += '<small>Bias' + (i + 1) + '</small> = ' + item[a - k];
                                    } else {
                                        tablefirstweight += '<small>Waga' + (i + 1) + k + '</small> = ' + item[a - k];
                                    }
                                    if (k == 1) {
                                        tablefirstweight += '<td class="col-md-4">';
                                        tablefirstweight += '<small>Waga' + first_secondcolumn.length + (i + 1) + '</small> = ' + first_secondcolumn[i];
                                        tablefirstweight += '</td>';
                                    } else {
                                        tablefirstweight += '<td>&nbsp</td>';
                                    }
                                    tablefirstweight += '</td>';
                                    tablefirstweight += '</tr>';
                                });
                            });
                            $('#firstweight').append(tablefirstweight);
                            var tablefinalweight;
                            var final_firstcolumn = [];
                            var final_secondcolumn = [];
                            $.each(data['weight'][0], function(i, item) {
                                $.each(data['weight'][0][i], function(j, item) {
                                    if (i == 1) {
                                        final_firstcolumn[j] = item;
                                    } else {
                                        $.each(data['weight'][0][i][j], function(k, item) {
                                            final_secondcolumn[k] = item;
                                        });
                                    }
                                });
                            });
                            tablefinalweight += '<tr>\n\
                                            <th class="text-center">Warstwa Ukryta</th><th class="text-center">Warstwa Wyściowa</th>\n\
                                            </tr>';
                            tablefinalweight += '<tr>';
                            tablefinalweight += '<td class="col-md-6">';
                            tablefinalweight += '</td>';
                            tablefinalweight += '<td class="col-md-6">';
                            tablefinalweight += '<small>Bias' + final_secondcolumn.length + '</small> = ' + final_secondcolumn[final_secondcolumn.length - 1];
                            tablefinalweight += '</td>';
                            tablefinalweight += '</tr>';
                            $.each(final_firstcolumn, function(i, item) {
                                $.each(item, function(k, val) {
                                    tablefinalweight += '<tr>';
                                    tablefinalweight += '<td class="col-md-6">';
                                    if (k == 0) {
                                        tablefinalweight += '<small>Bias' + (i + 1) + '</small> = ' + item[a - k];
                                    } else {
                                        tablefinalweight += '<small>Waga' + (i + 1) + k + '</small>= ' + item[a - k];
                                    }
                                    if (k == 1) {
                                        tablefinalweight += '<td class="col-md-6">';
                                        tablefinalweight += '<small>Waga' + final_secondcolumn.length + (i + 1) + '</small> = ' + final_secondcolumn[i];
                                        tablefinalweight += '</td>';
                                    } else {
                                        tablefinalweight += '<td>&nbsp</td>';
                                    }
                                    tablefinalweight += '</td>';
                                    tablefinalweight += '</tr>';
                                });
                            });
                            $('#finalweight').append(tablefinalweight);
                            $('#output1').val(data['score'][0]);
                            $('#output2').val(data['score'][1]);
                            $('#output3').val(data['score'][2]);
                            $('#output4').val(data['score'][3]);
                            $('#epochnumber').append('<h4 class="text-center">Proces Uczenia Zakończył Się Po <strong>' + data['epoch'][0] + '</strong> Epokach</h4>');
                            $.plot("#placeholder", data['outputarray'], {
                                grid: {
                                    borderWidth: 1,
                                    minBorderMargin: 20,
                                    labelMargin: 10,
                                    backgroundColor: {
                                        colors: ["#fff", "#e4f4f4"]
                                    },
                                    margin: {
                                        top: 8,
                                        bottom: 20,
                                        left: 20
                                    }
                                },
                                yaxis: {
                                    labelWidth: 30
                                },
                                xaxis: {
                                    labelHeight: 30
                                },
                                legend: {
                                    show: true
                                }
                            });
                            var xaxisLabel = $("<div class='axisLabel xaxisLabel'></div>").text("Ilość epok").appendTo($('#placeholder'));

                            var yaxisLabel = $("<div class='axisLabel yaxisLabel'></div>").text("Wartość średniego błędu kwadratowego").appendTo($('#placeholder'));
                            yaxisLabel.css("margin-top", yaxisLabel.width() / 2 - 20);
                        },
                        error: function(jqXHR, textStatus, errorThrown)
                        {
                            alert('Proces uczenia zakończył się niepowodzeniem');
                            console.log(jqXHR, textStatus, errorThrown);
                        },
                    });
        }
        e.preventDefault(); //STOP default action
    });


    $("#AND").change(function() {
        if ($(this).is(":checked")) {
            $('[name="arr[0][0]"]').val("0");
            $('[name="arr[0][1]"]').val("0");
            $('[name="arr[0][2]"]').val("0");
            $('[name="arr[1][0]"]').val("1");
            $('[name="arr[1][1]"]').val("0");
            $('[name="arr[1][2]"]').val("0");
            $('[name="arr[2][0]"]').val("0");
            $('[name="arr[2][1]"]').val("1");
            $('[name="arr[2][2]"]').val("0");
            $('[name="arr[3][0]"]').val("1");
            $('[name="arr[3][1]"]').val("1");
            $('[name="arr[3][2]"]').val("1");
            $("#NAND").prettyCheckable('uncheck');
            $("#OR").prettyCheckable('uncheck');
            $("#XOR").prettyCheckable('uncheck');
            $("#NOR").prettyCheckable('uncheck');
            $("#XNOR").prettyCheckable('uncheck');
            //test data
            $('[name="tarr[0][0]"]').val("0");
            $('[name="tarr[0][1]"]').val("0");
            $('[name="tarr[1][0]"]').val("1");
            $('[name="tarr[1][1]"]').val("0");
            $('[name="tarr[2][0]"]').val("0");
            $('[name="tarr[2][1]"]').val("1");
            $('[name="tarr[3][0]"]').val("1");
            $('[name="tarr[3][1]"]').val("1");
        } else {
            $('[id^=output]').val("");
            $("input[name*='arr']").val("");
        }
    });
    $("#NAND")
            .change(function() {
                if ($(this).is(":checked")) {
                    $('[name="arr[0][0]"]').val("0");
                    $('[name="arr[0][1]"]').val("0");
                    $('[name="arr[0][2]"]').val("1");
                    $('[name="arr[1][0]"]').val("1");
                    $('[name="arr[1][1]"]').val("0");
                    $('[name="arr[1][2]"]').val("1");
                    $('[name="arr[2][0]"]').val("0");
                    $('[name="arr[2][1]"]').val("1");
                    $('[name="arr[2][2]"]').val("1");
                    $('[name="arr[3][0]"]').val("1");
                    $('[name="arr[3][1]"]').val("1");
                    $('[name="arr[3][2]"]').val("0");
                    $("#AND").prettyCheckable('uncheck');
                    $("#OR").prettyCheckable('uncheck');
                    $("#XOR").prettyCheckable('uncheck');
                    $("#NOR").prettyCheckable('uncheck');
                    $("#XNOR").prettyCheckable('uncheck');
                    $('[name="tarr[0][0]"]').val("0");
                    $('[name="tarr[0][1]"]').val("0");
                    $('[name="tarr[1][0]"]').val("1");
                    $('[name="tarr[1][1]"]').val("0");
                    $('[name="tarr[2][0]"]').val("0");
                    $('[name="tarr[2][1]"]').val("1");
                    $('[name="tarr[3][0]"]').val("1");
                    $('[name="tarr[3][1]"]').val("1");
                } else {
                    $('[id^=output]').val("");
                    $("input[name*='arr']").val("");
                }
            });
    $("#OR")
            .change(function() {
                if ($(this).is(":checked")) {
                    $('[name="arr[0][0]"]').val("0");
                    $('[name="arr[0][1]"]').val("0");
                    $('[name="arr[0][2]"]').val("0");
                    $('[name="arr[1][0]"]').val("1");
                    $('[name="arr[1][1]"]').val("0");
                    $('[name="arr[1][2]"]').val("1");
                    $('[name="arr[2][0]"]').val("0");
                    $('[name="arr[2][1]"]').val("1");
                    $('[name="arr[2][2]"]').val("1");
                    $('[name="arr[3][0]"]').val("1");
                    $('[name="arr[3][1]"]').val("1");
                    $('[name="arr[3][2]"]').val("1");
                    $("#NAND").prettyCheckable('uncheck');
                    $("#AND").prettyCheckable('uncheck');
                    $("#XOR").prettyCheckable('uncheck');
                    $("#NOR").prettyCheckable('uncheck');
                    $("#XNOR").prettyCheckable('uncheck');
                    $('[name="tarr[0][0]"]').val("0");
                    $('[name="tarr[0][1]"]').val("0");
                    $('[name="tarr[1][0]"]').val("1");
                    $('[name="tarr[1][1]"]').val("0");
                    $('[name="tarr[2][0]"]').val("0");
                    $('[name="tarr[2][1]"]').val("1");
                    $('[name="tarr[3][0]"]').val("1");
                    $('[name="tarr[3][1]"]').val("1");
                } else {
                    $('[id^=output]').val("");
                    $("input[name*='arr']").val("");
                }
            });
    $("#XOR")
            .change(function() {
                if ($(this).is(":checked")) {
                    $('[name="arr[0][0]"]').val("0");
                    $('[name="arr[0][1]"]').val("0");
                    $('[name="arr[0][2]"]').val("0");
                    $('[name="arr[1][0]"]').val("1");
                    $('[name="arr[1][1]"]').val("0");
                    $('[name="arr[1][2]"]').val("1");
                    $('[name="arr[2][0]"]').val("0");
                    $('[name="arr[2][1]"]').val("1");
                    $('[name="arr[2][2]"]').val("1");
                    $('[name="arr[3][0]"]').val("1");
                    $('[name="arr[3][1]"]').val("1");
                    $('[name="arr[3][2]"]').val("0");
                    $("#NAND").prettyCheckable('uncheck');
                    $("#OR").prettyCheckable('uncheck');
                    $("#AND").prettyCheckable('uncheck');
                    $("#NOR").prettyCheckable('uncheck');
                    $("#XNOR").prettyCheckable('uncheck');
                    $('[name="tarr[0][0]"]').val("0");
                    $('[name="tarr[0][1]"]').val("0");
                    $('[name="tarr[1][0]"]').val("1");
                    $('[name="tarr[1][1]"]').val("0");
                    $('[name="tarr[2][0]"]').val("0");
                    $('[name="tarr[2][1]"]').val("1");
                    $('[name="tarr[3][0]"]').val("1");
                    $('[name="tarr[3][1]"]').val("1");
                } else {
                    $('[id^=output]').val("");
                    $("input[name*='arr']").val("");
                }
            });
    $("#NOR")
            .change(function() {
                if ($(this).is(":checked")) {
                    $('[name="arr[0][0]"]').val("0");
                    $('[name="arr[0][1]"]').val("0");
                    $('[name="arr[0][2]"]').val("1");
                    $('[name="arr[1][0]"]').val("1");
                    $('[name="arr[1][1]"]').val("0");
                    $('[name="arr[1][2]"]').val("0");
                    $('[name="arr[2][0]"]').val("0");
                    $('[name="arr[2][1]"]').val("1");
                    $('[name="arr[2][2]"]').val("0");
                    $('[name="arr[3][0]"]').val("1");
                    $('[name="arr[3][1]"]').val("1");
                    $('[name="arr[3][2]"]').val("0");
                    $("#NAND").prettyCheckable('uncheck');
                    $("#OR").prettyCheckable('uncheck');
                    $("#XOR").prettyCheckable('uncheck');
                    $("#AND").prettyCheckable('uncheck');
                    $("#XNOR").prettyCheckable('uncheck');
                    $('[name="tarr[0][0]"]').val("0");
                    $('[name="tarr[0][1]"]').val("0");
                    $('[name="tarr[1][0]"]').val("1");
                    $('[name="tarr[1][1]"]').val("0");
                    $('[name="tarr[2][0]"]').val("0");
                    $('[name="tarr[2][1]"]').val("1");
                    $('[name="tarr[3][0]"]').val("1");
                    $('[name="tarr[3][1]"]').val("1");
                } else {
                    $('[id^=output]').val("");
                    $("input[name*='arr']").val("");
                }
            });
    $("#XNOR")
            .change(function() {
                if ($(this).is(":checked")) {
                    $('[name="arr[0][0]"]').val("0");
                    $('[name="arr[0][1]"]').val("0");
                    $('[name="arr[0][2]"]').val("1");
                    $('[name="arr[1][0]"]').val("1");
                    $('[name="arr[1][1]"]').val("0");
                    $('[name="arr[1][2]"]').val("0");
                    $('[name="arr[2][0]"]').val("0");
                    $('[name="arr[2][1]"]').val("1");
                    $('[name="arr[2][2]"]').val("0");
                    $('[name="arr[3][0]"]').val("1");
                    $('[name="arr[3][1]"]').val("1");
                    $('[name="arr[3][2]"]').val("1");
                    $("#NAND").prettyCheckable('uncheck');
                    $("#OR").prettyCheckable('uncheck');
                    $("#XOR").prettyCheckable('uncheck');
                    $("#NOR").prettyCheckable('uncheck');
                    $("#AND").prettyCheckable('uncheck');
                    $('[name="tarr[0][0]"]').val("0");
                    $('[name="tarr[0][1]"]').val("0");
                    $('[name="tarr[1][0]"]').val("1");
                    $('[name="tarr[1][1]"]').val("0");
                    $('[name="tarr[2][0]"]').val("0");
                    $('[name="tarr[2][1]"]').val("1");
                    $('[name="tarr[3][0]"]').val("1");
                    $('[name="tarr[3][1]"]').val("1");
                } else {
                    $('[id^=output]').val("");
                    $("input[name*='arr']").val("");
                }
            });

});// document ready 

