

<script>
        //Expresión para validar un correo electrónico
        var expr = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
        //Expresión para validar edad de 18 a 60 años
        var expr2 = /^1[8-9]|[2-5]\d|60$/;
        $(document).ready(function(){
            //función click
            $("#btnEnviar").click(function()
            {


                //Guardar en variables el valor que tengan las cajas de texto
                //Por medio de los id's
                //Y tener mejor manipulación de dichos valores
                var nombre = $("#name").val();
                var correo = $("#email").val();
                var comentario = $("#comments").val();

				var errorNom = false;
				var errorCorreu = false;
				var errorComentari = false;

				$("#error").remove();


                // --- Condicionales anidados ----
                //Si nombre está vacío
                //Muestra el mensaje
                //Con false sale de los if's y espera a que sea pulsado de nuevo el botón de enviar
                if(nombre == "")
                {
                	errorNom = true;
                }
               
                //Si correo está vacío y la expresión NO corresponde -test es función de JQuery
                //Muestra el mensaje
                //Con false sale de los if's y espera a que sea pulsado de nuevo el botón de enviar


                if(correo == "" || !expr.test(correo))
                {
                    errorCorreu = true;
                }
                   
                  
                if(comentario == ""){
                   errorComentari = true;
                }
                
                if (errorNom || errorCorreu || errorComentari) {

                	

                	var contingut = "<div name ='error' id='error' class='alert alert-error'><i class='icon-warning-sign'>";

                	if (errorNom) {
                		contingut = contingut + $("#errorName").val() + "<br>";
                	}
                	if (errorCorreu) {
                		contingut = contingut + $("#errorMail").val() + "<br>";
                	}
                	if (errorComentari) {
                		contingut = contingut + $("#errorComments").val() + "<br>";
                	}

                	contingut = contingut + "</i></div>";
                	$("#formulariContacte").append(contingut);

                	return false;

                }
                console.log("return true");
                 return true;
                 
            });//click
        });//ready
    </script>