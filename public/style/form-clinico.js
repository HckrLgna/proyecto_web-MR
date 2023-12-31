const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');
const motivo = document.getElementById('motivo');
const prescripcion = document.getElementById('prescripcion');
const observaciones = document.getElementById('observaciones');

motivo.addEventListener("keyup", e => {
    var height = e.target.scrollHeight;
    console.log(height)
    motivo.style.height = `${height}px`
})

prescripcion.addEventListener("keyup", e => {
    var height = e.target.scrollHeight;
    console.log(height)
    prescripcion.style.height = `${height}px`
})

observaciones.addEventListener("keyup", e => {
    var height = e.target.scrollHeight;
    console.log(height)
    observaciones.style.height = `${height}px`
})


const expresiones = {
	nombre_doctor: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    motivo: /^[a-zA-ZÀ-ÿ\s]{1,250}$/, // Letras y espacios, pueden llevar acentos.
    prescripcion: /^[a-zA-ZÀ-ÿ\s]{1,250}$/, // Letras y espacios, pueden llevar acentos.
    observaciones: /^[a-zA-ZÀ-ÿ\s]{1,250}$/, // Letras y espacios, pueden llevar acentos.
}

const campos = {
	nombre_doctor: false,
	motivo: true,
	prescripcion: true,
    observaciones: true,
    beneficiario: false,
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "nombre_doctor":
			validarCampo(expresiones.nombre_doctor, e.target, 'nombre_doctor');
		break;
		case "motivo":
			validarCampo(expresiones.motivo, e.target, 'motivo');
		break;
		case "prescripcion":
			validarCampo(expresiones.prescripcion, e.target, 'prescripcion');
		break;
        case "observaciones":
			validarCampo(expresiones.observaciones, e.target, 'observaciones');
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
	console.log(beneficiario);
	if(beneficiario.value == 0 || beneficiario.value == "") {
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
    validarBeneficiario();
    console.log(campos.nombre_doctor, campos.motivo, campos.prescripcion, campos.observaciones, campos.beneficiario)
    if(campos.nombre_doctor && campos.motivo && campos.prescripcion && campos.observaciones && campos.beneficiario){
        //formulario.reset();

        document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
        setTimeout(() => {
            document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
        }, 5000);

        document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
            icono.classList.remove('formulario__grupo-correcto');
        });
    } else {
        e.preventDefault()
        document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
    }
});
