/**
 * Created by alex on 7/9/16.
 */



function edit(key, url, id_plan){

    url = (url == 'plan' ? 'plan' : '../'+url);

	$('#updateContent').load(url+'/render-form?id='+key+'&id_plan='+id_plan);
	$("#modaledit").modal();
	$.ajax({
	    type     :'GET',
	    url  	 : url+'/load',
	    data:{
	    		id:key
	    },
	    success  : function(data) {
	       $("body").append(data.id_actividad_planificacion);
			trickModal();
	   },
	   complete:function (data){
		  
	   }
	});

}
