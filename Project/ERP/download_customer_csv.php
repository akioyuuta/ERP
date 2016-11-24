<?php include "connect.php";
// output headers so that the file is downloaded rather than displayed
include "connect.php";

$query = mysqli_query($con,"SELECT * FROM customer");

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=export_'.strtotime(date('Y-m-d')).'.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('id','name','type','company','address1','address2','city','zip','country','website','job position','phone', 'mobile','fax','email','title','notes'));

// loop over the rows, outputting them
while($row = mysqli_fetch_assoc($query)) {
    $row = array('id' => $row['id'], 'name' => $row['name'], 'type' => $row['type'], 'company' => $row['company'], 'address1' => $row['address1'], 'address2' => $row['address2'], 'city' => $row['city'], 'zip' => $row['zip'],'country' => $row['country'], 'website' => $row['website'], 'job position' => $row['job_position'], 'phone' => $row['phone'], 'mobile' => $row['mobile'], 'fax' => $row['fax'], 'email' => $row['email'], 'title' => $row['title'], 'notes' => $row['notes']);
    fputcsv($output, $row);
}
?>