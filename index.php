<!DOCTYPE html>
<!-- head importing bootstrap & jquery-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <!--  -->

<title>Livesearch</title>
<style>

/* css */
.secundaria2
{
    margin-left: 38%;

}

.principal
{
    width: 100%;
    display: flex;
}

.secundaria1
{
    width: 50%;
    align-self: start;
}
/*  */
</style>
<body class="p-3 mb-2 bg-light text-dark">
  <div style="padding:1px 0" class="container-fluid">
        <h3>Livesearch</h3> 
        <div class="principal"> 
        <div class="secundaria1">
        </select>
        </div>
        <div class="secundaria2">
        <input type="text" name="search_text" id="search_text" class="form-control" placeholder="Pesquisar">
        </div>
        </div>
        <br>
    </div>
    <div id="result"> 
    <table class="table table-bordered table-sm table-striped table-hover">
    </div>
    </div>
<script type="text/javascript">

    $(document).ready(function()
{
	load_data();
	function load_data(query)
	{
		// input value post 
		$.ajax({
			url:"fetch.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
                // switch result DIV from HTML to the newest from fetch.php post data
				$('#result').html(data);
			}
		});
	}
	// search input value sending value to function load_data
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
            
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>
</body>

</html>
