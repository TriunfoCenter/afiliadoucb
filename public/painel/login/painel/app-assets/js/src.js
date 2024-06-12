var audio = new Audio('live.wav');
$(document).ready(function() {
    var i = 1;
    txt = '';
    $('#iniciarchk').attr('disabled', null);
    $('#iniciarchk').click(function() {
        if (!$('#lista_ccs').val().trim()) {
            $('#status_ccs').html(
                Swal.fire({
                    title: '<span style="color:#8C91B6">Aviso<span>',
                    icon: 'warning',
                    confirmButtonColor: "#AE7AF3",
                    background: '#1D203F',
                    html: '<span style="color:#8C91B6">Insira uma lista para começarmos.<span>'
                })

            );
        } else {
            var line = $('#lista_ccs').val().replace(',', '').split('\n');
            line = line.filter(function(item, index, inputArray) {
                return inputArray.indexOf(item) == index;
            });

            var total = line.length;
            var ap = 0;
            var rp = 0;
            var ts = 0;
            var st = 'Aguardando...';
            var testador = $("#SelectOptions option:selected").val();
            $('#total_ccs').html(total);
            $('#status_ccs').html(st);
            $("#lista_ccs").val(line.join("\n"));
            $('#lista_ccs').attr('disabled', 'disabled');
            $('#SelectOptions').attr('disabled', 'disabled');
            line.forEach(function(value) {
                if (value == " ") {
                    removelinha();
                    return;

                }
                var ajaxCall = $.ajax({
                    url: 'api.php',
                    type: 'POST',
                    data : {
                        key : "98839920010020293901",
                        lista :'' + value
                   },
                    beforeSend: function() {
                        $('#pararchk').attr('disabled', null);
                        $('#iniciarchk').attr('disabled', 'disabled');
                        $('#SelectOptions').attr('disabled', 'disabled');
                        var st = 'testando...';
                        $('#status_ccs').html(st);

                    },

                    success: function(data) {
                        if (data.indexOf("Aprovada") >= 0) {
                            $("#aprovadas").val(data + "\n" + $("#aprovadas").val());
                            audio.play();
                            ap = ap + 1;
                            ts = ts + 1;
                            Swal.fire({
                                title: '<span style="color:#8C91B6">+1 Aprovada!<span>',
                                icon: 'success',
                                background: '#1D203F',
                                showConfirmButton: false,
                                toast: true,
                                position: 'top-end',
                                timer: 500
                            });
                            document.getElementById("aprovadas").innerHTML += data + "<p>";
                            removelinha();

                        } else {

                            $("#reprovadas").val(data + "\n" + $("#reprovadas").val());
                            rp = rp + 1;
                            ts = ts + 1;
                            document.getElementById("reprovadas").innerHTML += data + "<p>";
                            removelinha();


                        }
                        var fila = parseInt(ap) + parseInt(rp);

                        $('#lives_ccs').html(ap);
                        $('#dies_ccs').html(rp);
                        $('#testado_ccs').html(fila);
                        // $('#total').html(fila);

                        porcentagem(total, fila);

                        if (fila == total) {
                            $('#iniciarchk').attr('disabled', null);
                            $('#pararchk').attr('disabled', 'disabled');
                            $('#lista_ccs').attr('disabled', null);
                            $('#SelectOptions').attr('disabled', null);
                            var st = 'Finalizado';
                            Swal.fire({
                                title: '<span style="color:#8C91B6">Finalizado<span>',
                                icon: 'success',
                                confirmButtonColor: "#AE7AF3",
                                background: '#1D203F',
                                html: '<span style="color:#8C91B6">Sua lista foi testada com sucesso<span>'
                            })
                            $('#status_ccs').html(st);

                        }

                    }

                });
                //delay
                $('#pararchk').click(function() {
                    ajaxCall.abort();
                    $('#iniciarchk').attr('disabled', null);
                    $('#pararchk').attr('disabled', 'disabled');
                    $('#lista_ccs').attr('disabled', null);
                    $('#SelectOptions').attr('disabled', null);
                    var st = 'Pausado...';
                    $('#status_ccs').html(st);
                });
            });
        }
    });
});

function limpar() {
    document.getElementById("lista_ccs").value = "";

}

function porcentagem(total, pctm) {
    var porcentagem = (pctm / total) * 100 + "%";
    var el = document.getElementById("progresstest");
    el.style.width = porcentagem;
}

function removelinha() {
    var lines = $("#lista_ccs").val().split('\n');
    lines.splice(0, 1);
    $("#lista_ccs").val(lines.join("\n"));
}