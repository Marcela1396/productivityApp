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