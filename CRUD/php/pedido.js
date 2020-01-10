
$(".btnedit").click(e =>{
    let textvalues = displayData(e);

    let id = $("input[name*='idtb_produto']");
    let nome = $("input[name*='nome_produto']");
    let valor = $("input[name*='valor_unitario_produto']");
    let quantidade = $("input[name*='quantidade']");

    id.val(textvalues[0]);
    nome.val(textvalues[1]);
    valor.val(textvalues[2]);
    quantidade.val(textvalues[3]);

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