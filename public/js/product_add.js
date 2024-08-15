var index = 0;
var idarticulos = [];
var nombres = [];
var precios = [];

$('#btnSubmit').attr("disabled", true);

function addProductOrder() {
    productdata = document.getElementById('select-idarticulo').value.split('_');
    if(productdata[0] != '')
    {
        idarticulos[index] = productdata[0];
        nombres[index] = productdata[1];
        precios[index] = productdata[2];
        evaluar();
        fila = '<tr id="filaz' + index + '">'+
        '<td class="text-center"><input type="hidden" name="idproductos[]" value="' + productdata[0] + '">' + productdata[1] + '</td>'+
        '<td class="text-center"><input type="hidden" name="preciosproductos[]" value="' + productdata[2] + '">' + productdata[2] + '</td>'+
        '<td class="text-center"><input class="form-control text-center" name="cantidadproductos[]"></td>'+
        '<td class="text-center"><a href="javascript:void(0)" class="btn btn-default btn-xs" onclick="quitars(' + index + ')">Quitar</a></td></tr>';
        $('#product_detail').append(fila);
    }else{
        fila = '<tr id="filaz' + index + '">'+
        '<td class="text-center"><input class="form-control type="text" name="new_nombres[]"></td>'+
        '<td class="text-center"><input class="form-control type="text" name="new_preciosproductos[]"></td>'+
        '<td class="text-center"><input class="form-control text-center" name="new_cantidadproductos[]"></td>'+
        '<td class="text-center"><a href="javascript:void(0)" class="btn btn-default btn-xs" onclick="quitars(' + index + ')">Quitar</a></td></tr>';
        $('#product_detail').append(fila);
    }
}

function quitars(item) {
    $('#filaz' + item).remove();
    index--;
    codigos[item] = null;
    if (index == 0)
        $('#btnSubmit').attr("disabled", true);
    else
        $('#btnSubmit').attr("disabled", false);
}

function evaluar() {
    index++;
    if (index > 0)
        $('#btnSubmit').attr("disabled", false);
    else
        $('#btnSubmit').attr("disabled", true);

}
