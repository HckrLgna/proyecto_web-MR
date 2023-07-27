const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');
const descripcion = document.getElementById('descripcion');

descripcion.addEventListener("keyup", e => {
    var height = e.target.scrollHeight;
    console.log(height)
    descripcion.style.height = `${height}px`
})


const expresiones = {
    descripcion: /^[a-zA-ZÀ-ÿ\s]{1,250}$/, // Letras y espacios, pueden llevar acentos.
}

const campos = {
    descripcion: false,
    beneficiario: false,
    evaluacion: false,
}

const validarFormulario = (e) => {
	switch (e.target.name) {
        case "descripcion":
			validarCampo(expresiones.ci, e.target, 'descripcion');
		break;
	}
}

const validarCampo = (expresion, input, campo) => {
	console.log("Soy el " + campo);
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}

const validarBeneficiario = () => {
	console.log("Validando...");
	var beneficiario = document.getElementById("beneficiario");
	console.log(beneficiario.value);
	if(beneficiario.value == 0 || beneficiario.value == "") {
		campos['beneficiario'] = false;

	} else {
		campos['beneficiario'] = true;
	}
	console.log(campos.beneficiario);
}

const validarEvaluacion = () => {
    console.log("Validando...");
    var evaluacion = document.getElementById("evaluacion");
    console.log(evaluacion.value);
    if(evaluacion.value == 0 || evaluacion.value == "") {
        campos['beneficiario'] = false;

    } else {
        campos['beneficiario'] = true;
    }
    console.log(campos.beneficiario);
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) => {
	validarEvaluacion();
    validarBeneficiario();
	const terminos = document.getElementById('terminos');
	if(campos.descripcion && campos.beneficiario && campos.evaluacion){
		formulario.reset();

		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
		}, 5000);

		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario__grupo-correcto');
		});
	} else {
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
	}
});
