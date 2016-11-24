/**
 * Created by alex on 7/9/16.
 */



function edit(key){

	$('#updateContent').load('render-form?id='+key);
	$("#modaledit").modal();
	$.ajax({
	    type     :'GET',
	    url  	 : 'load',
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
