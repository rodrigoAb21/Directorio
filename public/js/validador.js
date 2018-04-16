$(function () {
    // Validacion de textos
    $("#nombreE, #nombreU, #direccion, #descripcion").blur(function () {
        var cadena = $(this).val().trim();
        var x = cadena.length;
        if (x == 0 && x >= 255){
            $(this)[0].setCustomValidity("Es necesario rellenar este campo");
        } else{
            $(this)[0].setCustomValidity("");
            $(this).val(cadena);
        }
    });

    // Validacion de telefono
    $("#telefono").blur(function () {
        var cadena = $(this).val().trim();
        var x = cadena.length;
        if (x != 0){
            var numero = /^[0-9]+$/;
            if (numero.test(cadena) && (x == 7|| x == 8)){
                $(this)[0].setCustomValidity("");
                $(this).val(cadena);
            }else{
                $(this)[0].setCustomValidity("El telefono debe tener solo 8 o 7 digitos");
            }
        }else{
            $(this)[0].setCustomValidity("");
            $(this).val(cadena);
        }
    });

    // Validacion del formato de la imagen
    $("#logo").blur(function () {
        var cadena = $(this).val().trim();
        var x = cadena.length;
        if (x != 0){
          var formato = /\.(jpg|jpeg|bmp|png)/;
          if (!formato.test(cadena) || x > 255){
              $(this).val("");
              alert("La imagen debe ser de formato jpg, jpeg, bmp, png");
          }
        }else{
            $(this).val("");
        }
    });

    // Validacion del email
    $("#email").blur(function () {
        var cadena = $(this).val().trim();
        var x = cadena.length;
        if (x != 0){
            var formato = /\w+@\w+\.[a-z]/;
            if (formato.test(cadena)){
                $(this)[0].setCustomValidity("");
                $(this).val(cadena);
            }else{
                $(this)[0].setCustomValidity("Debe ingresar un E-Mail valido");
            }
        } else {
            $(this).val("");
        }
    });
});


