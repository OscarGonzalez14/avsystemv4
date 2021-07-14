<!DOCTYPE html>
<html>
	<body>
	   <input type='text' id=“hid_id” class='hid_id' value='1' />
	   <input type='text' id=“hid_id_dos” class='hid_id' value='2' />
	   <button onclick="myFunction()">Click me</button>

	<script>
	function myFunction() {
	var id = document.getElementsByClassName("hid_id");
	  //if (id.length > 0) {
	//	  console.log(id[0].value);
	 // }

	  for(i=0;i<id.length;i++){
       console.log(id[i].value);
       console.log(id[i].id);
	  }
	}


	</script>

	</body>
</html>
