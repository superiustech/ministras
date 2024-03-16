$(function(){ 
    $('.ajax').off('click').on('click', function(e) {
        e.preventDefault();
        var dados = {
            nome_usuario: $('#name').val(),
            nome_apelido: $('#apelido').val(),
            senha_usuario: $('#senha').val(),
            tipo_acao: 'cadastrar-cliente'
        }; 
        $(this).prop('disabled', true);
        setTimeout(() => $(this).prop('disabled', false), 700);          
        $.post('http://localhost/ministras/painel/cadastro-usuario', dados)
        .done(function(data) {
            console.log(data);
            data = typeof data === 'string' ? JSON.parse(data) : data;
            var box = $('<div class="box-alert ' + (data['sucesso'] ? 'sucesso' : 'erro') + '"><i class="fa fa-' + (data['sucesso'] ? 'check' : 'xmark') + '"></i> ' + (data['sucesso'] ? 'Sucesso: <b>Cadastrado com sucesso!</b>' : 'Ocorreram os seguintes erros: <b>' + data['mensagens'] + '</b>') + '</div>');
            $('.line').prepend(box);
            setTimeout(() => box.fadeOut(), 2000);
        })
    });
    $('.editar').off('click').on('click', function(e) {
        e.preventDefault();
        var dados = {
            nome_apelido: $('#apelido').val(),
            senha_usuario: $('#senha').val(),
            tipo_acao: 'editar-usuario'
        }; 
        $(this).prop('disabled', true);
        setTimeout(() => $(this).prop('disabled', false), 700);          
        $.post('http://localhost/ministras/painel/editar-usuario', dados)
        .done(function(data) {
            console.log(data);
            data = typeof data === 'string' ? JSON.parse(data) : data;
            var box = $('<div class="box-alert ' + (data['sucesso'] ? 'sucesso' : 'erro') + '"><i class="fa fa-' + (data['sucesso'] ? 'check' : 'xmark') + '"></i> ' + (data['sucesso'] ? 'Sucesso: <b>'+  data['mensagens'] +'</b>' : 'Ocorreram os seguintes erros: <b>' + data['mensagens'] + '</b>') + '</div>');
            $('.line').prepend(box);
            setTimeout(() => box.fadeOut(), 2000);
        })
    });
});

