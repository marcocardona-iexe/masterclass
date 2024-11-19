//codigo_alumno
$("#generar_codigo_moderador").on("click", function () {
	// Función para generar el código alfanumérico

	function generateCode(length) {
		var characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		var code = "";
		for (var i = 0; i < length; i++) {
			var randomIndex = Math.floor(Math.random() * characters.length);
			code += characters.charAt(randomIndex);
		}
		return code;
	}

	// Genera un código de 8 caracteres

	let newCode = generateCode(8);
	$.ajax({
		type: "POST",
		url: "verifica-codigo-docente/" + newCode,
		dataType: "json",
		success: function (response) {
			if (!response.existe) {
				$("#codigo_docente").val(newCode);
			} else {
				alert("El codigo ya existe");
			}
		},
	});

	// Muestra el código generado en el elemento <p> con id "codeOutput"
});

//codigo_alumno
$("#generar_codigo_alumno").on("click", function () {
	// Función para generar el código alfanumérico

	function generateCode(length) {
		var characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		var code = "";
		for (var i = 0; i < length; i++) {
			var randomIndex = Math.floor(Math.random() * characters.length);
			code += characters.charAt(randomIndex);
		}
		return code;
	}

	// Genera un código de 8 caracteres

	let newCode = generateCode(8);
	$.ajax({
		type: "POST",
		url: "verifica-codigo-alumno/" + newCode,
		dataType: "json",
		success: function (response) {
			if (!response.existe) {
				$("#codigo_alumno").val(newCode);
			} else {
				alert("El codigo ya existe");
			}
		},
	});

	// Muestra el código generado en el elemento <p> con id "codeOutput"
});

$("#imagen").change(function () {
	var file = this.files[0];
	var fileType = file["type"];
	var validImageTypes = ["image/jpeg", "image/jpg", "image/png"];
	var reader = new FileReader();

	if ($.inArray(fileType, validImageTypes) < 0) {
		// Si no es un JPG
		$("#imagen").addClass("is-invalid").removeClass("is-valid");
		$("#imagenError").removeClass("d-none");
		$("#imagenPreview").hide();
	} else {
		// Si es un JPG, previsualizar
		$("#imagen").addClass("is-valid").removeClass("is-invalid");
		$("#imagenError").addClass("d-none");

		reader.onload = function (e) {
			$("#imagenPreview").attr("src", e.target.result).show();
		};
		reader.readAsDataURL(file);
	}
});

// Al enviar el formulario con id 'registroForm'
$("#registroForm").on("submit", function (e) {
	// Previene el comportamiento por defecto del formulario (que es enviar la solicitud al servidor y recargar la página)
	e.preventDefault();

	// Crear un objeto FormData con los datos del formulario
	var formData = new FormData(this);

	// Realizar una solicitud AJAX para enviar el formulario
	$.ajax({
		url: "agregar-sesion", // URL del servidor donde se enviarán los datos del formulario
		type: "POST", // Método HTTP para enviar los datos
		data: formData, // Datos del formulario en formato FormData
		contentType: false, // Indica que no se debe establecer el tipo de contenido (el navegador lo hace automáticamente con FormData)
		processData: false, // Indica que no se debe procesar los datos (el navegador lo hace automáticamente con FormData)
		success: function (response) {
			// Esta función se ejecuta si la solicitud se completa con éxito

			// Muestra un mensaje de alerta indicando que el formulario se ha enviado con éxito
			alert("Formulario enviado con éxito.");

			// Recarga la página para reflejar cualquier cambio realizado en el servidor
			location.reload();
		},
		error: function (xhr, status, error) {
			// Esta función se ejecuta si ocurre un error durante la solicitud

			// Muestra un mensaje de alerta indicando que hubo un error al enviar el formulario
			alert("Error al enviar el formulario.");

			// Aquí se puede agregar lógica adicional para manejar errores específicos si es necesario
		},
	});
});
