<?php
include_once("config\db.php");
$sql_query = "SELECT * FROM estudiantes";
$total_estudiantes_sql .= $sql_query;
$estudiantes_sql .= $sql_query;
if(isset($where_condition) && $where_condition != '') {
$total_estudiantes_sql .= $where_condition;
$estudiantes_sql .= $where_condition;
}
// handling limit to get data
if ($limit!=-1) {
$estudiantes_sql .= "LIMIT $start, $limit";
}
// Getting total number of employee record count
$result_total = mysqli_query($conexion, $total_estudiantes_sql) or die("database error:". mysqli_error($conexion));
$total_estudiante = mysqli_num_rows($result_total);
// getting eployee records and store into an array
$resultset = mysqli_query($conexion, $estudiantes_sql) or die("database error:". mysqli_error($conexion));
while( $estudiante = mysqli_fetch_assoc($resultset) ) {
$estudiante_records[] = $estudiante;
}
// creating employee data array according to jQuery Bootgrid requirement to display records
$estudiante_json_data = array(
"current" => intval($post['current']),
'rowCount' => 10,
"total" => intval($total_estudiante),
"rows" => $estudiante_records
);
// return employee data array as JSON data
echo json_encode($estudiante_json_data);
?>