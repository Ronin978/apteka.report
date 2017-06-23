
<form method="POST" action="{{action('PrepController@store')}}"/>
	Назва препарату: 
	<input type="text" name="title"/>
	Одиния виміру: 
	<input type="text" name="units"/>
	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
	<input type="submit" value="Додати">	
</form>
