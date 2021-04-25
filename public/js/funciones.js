// Funcion Roles 
function alert_delete_role(data){
    color = 4;
    var dato = data;

	$.notify({
		icon: "pe-7s-trash",
		message: "<div align='center'> <h3> Delete Role </h3> <legend> </legend>  <p> Are you sure to delete the record?  </p>  <br> <a class='btn btn-round btn-fill btn-success' href=/roles/delete/"+dato+"> Confirm </a></div>",

	},{
		type: type[color],
		timer: 4000,
		placement: {
			from: 'top',
			align: 'center'
		}
	});
}

// Funcion Equipos
function alert_delete_team(data){
    color = 4;
    var dato = data;

	$.notify({
		icon: "pe-7s-trash",
		message: "<div align='center'> <h3> Delete Team </h3> <legend> </legend>  <p> Are you sure to delete the record?  </p>  <br> <a class='btn btn-round btn-fill btn-success' href=/teams/delete/"+dato+"> Confirm </a></div>",

	},{
		type: type[color],
		timer: 4000,
		placement: {
			from: 'top',
			align: 'center'
		}
	});
}

// Funcion Miembros
function alert_delete_member(data){
    color = 4;
    var dato = data;

	$.notify({
		icon: "pe-7s-trash",
		message: "<div align='center'> <h3> Delete Member </h3> <legend> </legend>  <p> Are you sure to delete the record?  </p>  <br> <a class='btn btn-round btn-fill btn-success' href=/members/delete/"+dato+"> Confirm </a></div>",

	},{
		type: type[color],
		timer: 4000,
		placement: {
			from: 'top',
			align: 'center'
		}
	});
}

// Funcion Projectos
// Buscar integrantes de un equipo 
function search_members(data){
	/*
	$.ajax({
		type: 'post',
		url: `/project/getMembers/#${data}`,
		dataType : 'json',
		success : function(response){
			alert('funciona');
			response.members.forEach(element => {
				alert("response.members.id");
				
			});
        },
        error: function(error){
            alert("No funciona");
        }
	});
	*/
	document.getElementById('Option Selected'+ resultado).innerHTML=data;
}


// Adiciona más criterios a un proyecto
let count = 1;
function* addDODGenerator(){
	while(true){
		contenido = document.getElementById('div_dod');

		const inputContainer = document.querySelector('.input-container')
		// create <div class='dod-container'>
		const newDodContainer = document.createElement('div')
		newDodContainer.classList.add("dod-container")
		// create <div class='col-md-10'>
		const newInputContainer = document.createElement('div')
		newInputContainer.classList.add("col-md-11")
		// create <div class='form-group'> 
		const newFormGroup = document.createElement('div')
		newFormGroup.classList.add('form-group')
		// create <label>
		const newInputLabel = document.createElement('label')
		newInputLabel.innerHTML = `Name`
		// create <input>
		const newInput = document.createElement('input')
		newInput.setAttribute('name', `dod_name_${count}`)
		newInput.type = 'text'
		newInput.classList.add('form-control')
		newInput.placeholder = 'Critery name'
		newInput.name = `dod_name_${count}`
		// add to <div class='form-group'> => <label> && <input>
		newFormGroup.appendChild(newInputLabel)
		newFormGroup.appendChild(newInput)  
		// add to <div class='col-md-10'> => <div class='form-group'>
		newInputContainer.appendChild(newFormGroup)
		
		// create <div class='col-md-2'>
		const newButtonContainer = document.createElement('div')
		newButtonContainer.classList.add("col-md-1")
		// create <button>
		const newButton = document.createElement('button')
		newButton.type = 'button'
		newButton.setAttribute('onclick', 'deleteDOD(this.id)')
		newButton.classList.add('btn')
		newButton.classList.add('btn-danger')
		newButton.classList.add('btn-fill')
		newButton.id = `deleteDOD_${count}`
		const newButtonIcon = document.createElement('i')
		newButtonIcon.classList.add('fa')
		newButtonIcon.classList.add('fa-trash')
		// add to <button> => <i>
		newButton.appendChild(newButtonIcon)

		// add to <div class='col-md-2'> => <button>
		newButtonContainer.appendChild(newButton)
		// add to <div class='dod-container'> => <div class='col-md-10'> && <div class='col-md-2'>
		newDodContainer.appendChild(newInputContainer)
		newDodContainer.appendChild(newButtonContainer)
		contenido.appendChild(newDodContainer)

		yield count;
		count = count + 1;
	}
}

const addDOD = addDODGenerator();


function deleteDOD(id){
	console.log(id);
	const button = document.querySelector(`#${id}`);
	const dod_container = button.parentElement.parentElement;
	let next_dod_container = dod_container.nextSibling;
	while(next_dod_container){
		const input_name = next_dod_container.querySelector(`input`).name;
		const new_input_name = parseInt(input_name.replace(`dod_name_`,``))-1;
		next_dod_container.querySelector(`input`).name = `dod_name_${new_input_name}`;
		next_dod_container = next_dod_container.nextSibling;
	}
	dod_container.parentElement.removeChild(dod_container);
	count = count - 1;
}