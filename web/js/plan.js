/**
 * Created by alex on 7/9/16.
 */



function edit(key){

	$('#updateContent').load('plan/render-form?id='+key);
	$("#modaledit").modal();
	$.ajax({
	    type     :'GET',
	    url  	 : 'plan/load',
	    data:{
	    		id:key 
	    },
	    success  : function(data) {
	       $("body").append(data.id_plan);
			trickModal();
	   },
	   complete:function (data){
		  
	   }
	});

}
