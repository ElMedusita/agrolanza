$(document).ready(function () {
    function calcularCantidadProducto() {
        const dosis = parseFloat($('#dosis').val());
        const unidad = $('input[name=unidad]:checked').val();
        const volumenCaldo = parseFloat($('#volumen-caldo').val());
        const volumenDeposito = parseFloat($('#volumen-deposito').val());

        let cantidadProducto = 0;
        let unidadResultado = '';

        switch (unidad) {
            case 'cc/L':
            case 'ml/L':
                cantidadProducto = dosis * volumenDeposito;
                unidadResultado = 'ml';
                break;

            case '%':
                cantidadProducto = (dosis / 100) * volumenDeposito;
                unidadResultado = 'L';
                break;

            case 'kg/hl':
                cantidadProducto = (dosis / 10) * volumenDeposito;
                unidadResultado = 'kg';
                break;

            case 'g/hl':
                cantidadProducto = ((dosis / 10)) * volumenDeposito;
                unidadResultado = 'g';
                break;

            case 'L/hl':
                cantidadProducto = (dosis / 10) * volumenDeposito;
                unidadResultado = 'L';
                break;

            case 'ml/hl':
                cantidadProducto = (dosis / 10) * volumenDeposito;
                unidadResultado = 'ml';
                break;
            case 'cc/hl':
                cantidadProducto = (dosis / 10) * volumenDeposito;
                unidadResultado = 'cc';
                break;

            case 'cc/ha':
                cantidadProducto = (dosis / volumenCaldo) * volumenDeposito;
                unidadResultado = 'cc';
                break;

            case 'L/ha':
                cantidadProducto = (dosis / volumenCaldo) * volumenDeposito;
                unidadResultado = 'L';
                break;

            case 'g/ha':
                cantidadProducto = (dosis / volumenCaldo) * volumenDeposito;
                unidadResultado = 'g';
                break;

            case 'kg/ha':
                cantidadProducto = (dosis / volumenCaldo) * volumenDeposito;
                unidadResultado = 'kg';
                break;

            default:
                unidadResultado = '';
                break;
        }

        $('#cantidad-producto').val(cantidadProducto.toFixed(2) + ' ' + unidadResultado);
    }

    $('#calcular').click(function () {
        calcularCantidadProducto();
    });
});
