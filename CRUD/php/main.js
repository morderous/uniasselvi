
$(".btnedit").click(e =>{
    let textvalues = displayData(e);

    let id = $("input[name*='id_cliente']");
    let nome = $("input[name*='nome_cliente']");
    let cpf = $("input[name*='cpf_cliente']");
    let email = $("input[name*='email_cliente']");

    id.val(textvalues[0]);
    nome.val(textvalues[1]);
    cpf.val(textvalues[2]);
    email.val(textvalues[3]);

});

function displayData(e) {
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for (const  value of td){
        if (value.dataset.id == e.target.dataset.id){
            textvalues[id++] = value.textContent;
        }
    }
    return textvalues;
}