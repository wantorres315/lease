<DOCTYPE html>
<html>
    <meta charset="UTF-8"/>
		<meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="public/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css"/>
    
		<script type="text/javascript" src="public/js/jquery-3.2.1.min.js"></script>
 
<head>
		<style>
			body{
    font-family:Verdana;
}
 
#tabela{
    width:100%;
    border:solid 1px;
    text-align:left;
    border-collapse:collapse;
}
 
#tabela tbody tr{
    border:solid 1px;
    height:30px;
    cursor:pointer;
}
 
#tabela thead{
    background:beige;
}
 
#tabela thead th{
    width:100px;
}
 
#tabela input, #tabela select{
    color:navy;
    width:100%;
}

</style>
</head>
<body>
	
	<div class = "card">
		<div class = "card-header">
			<div class = "row">
				<div class = "col-lg-2">
					<select id="storage" class = "form-control">
							<option value = ""></option>
							@foreach($storageFilter as $sf)
								<option value = "{{$sf}}">{{$sf}}</option>	
							@endforeach
					</select>
				</div>
				<div class = "col-lg-3">
					<select id="ram" class = "form-control"> 
						<option value = ""></option>
						@foreach($ramFilter as $rf)
							<option value = "{{$rf}}">{{$rf}}</option>	
						@endforeach
					</select>
				</div>
				<div class = "col-lg-3">
					<select id="location"  class = "form-control">
						<option value = ""></option>
						@foreach($locationFilter as $lf)
							<option value = "{{$lf->id}}">{{$lf->name}}</option>	
						@endforeach
					</select>
				</div>
				<div class = "col-lg-2">
					<select id="hddf"  class = "form-control">
						<option value = ""></option>
						@foreach($hddFilter as $hddf)
							<option value = "{{$hddf}}">{{$hddf}}</option>	
						@endforeach
					</select>	
				</div>
				<div class = "col-lg-2">
					<input type = "button" value = "Filter" class = "filter">
				</div>
			</div>
		</div>
		<div class = "card-body">

			<div id="divConteudo">
					@include('table')
			</div>
		</div>
	</div>

</body>
</html>
<script>
	$(function(){
    $("body").on('click','.filter',function(){
			
			var data = { "_token": "{{ csrf_token() }}",'storage':$("#storage").val(), 'ram':$("#ram").val(), 'location':$("#location").val(), 'hdd':$("#hddf").val() };
			$.post( "/updateTable",data , function( dados ) {
				
				$("#divConteudo").html(dados.view);
			});
			
	});
});
</script>