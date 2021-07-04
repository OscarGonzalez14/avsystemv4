<div>
	<label for="">Inngrese su nombre: </label>
<select class="js-example-basic-multiple" name="usuario[]" multiple="multiple">
  <option value="1">Carmen</option>
  <option value="2">Josue</option>
  
</select>
</div>

<script>
	$(document).ready(function() {
    $('.js-example-basic-multiple').select2();

});
</script>