$(document).ready(function() {
    $('#tabela-usuarios').DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Portuguese-Brasil.json'
        },
    });

    $('#tabela-produtos').DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Portuguese-Brasil.json'
        },
    });

    $('#tabela-pedidos').DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Portuguese-Brasil.json'
        },
    });
})

function alterarStatus(id_pedido, obj) {
    opcao_escolhida = obj.value;

    fetch('alterarStatus/' + id_pedido, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: 'opcao=' + opcao_escolhida
    }).then(response => response.text()).then();
}