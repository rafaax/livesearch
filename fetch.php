<?php
// including connect.php 
include_once 'connect.php';
// including head from index
echo '<html lang="pt-br">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>';


if(isset($_POST["query"]))
{
    // $search receive the input text from index.php 
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = 
    "SELECT * FROM estoque 
	WHERE Categoria LIKE '%".$search."%'
	OR Nome LIKE '%".$search."%'";

}
else
{
    // query for show data if the user dont search anything
	$query = "SELECT * FROM estoque ORDER BY DataCompra desc";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
    // table columns
	echo 
    '<table class="table table-bordered table-sm table-striped table-hover">
    <thead>
    <tr> 
        <th class="fixed" scope="col">Nome</th>
        <th class="fixed" scope="col">Quantidade</th>
        <th class="fixed" scope="col">Categoria</th>
    </tr>
    </thead>';


while ($array = mysqli_fetch_array($result)) {
    // variables
    $nome = $array['Nome']; // $array['Name from DB Column'];
    $quantidade = $array['Quantidade'];
    $categoria = $array['Categoria'];

    // table lines
    echo '<tr>';
    echo '<td>'.$nome.'</td>';
    echo '<td>'.$quantidade.'</td>';
    echo '<td>'.$categoria.'</td>';
    echo '</td>';
    }
    echo '</tr>';
    echo '</tbody>';
    echo '</table>'; // ends table
}
// if not search = 
else
{
	echo 
    '<div id="alerta" class="alert alert-danger" role="alert">
        <b>No data found!!!</b>
    </div>';
}
?>
<?php 
?>