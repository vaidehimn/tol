<html>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
</style>
</html>
<?php

require_once __DIR__ . '/vendor/autoload.php';

$name=$_POST["name"];
$age=$_POST["age"];
$pres=$_POST["pres"];
$dname=$_POST["dname"];
$phone=$_POST["phone"];

$mpdf = new \Mpdf\Mpdf();
$data = '';
$data .= '<div class="card"><h1>TREE OF LIFE</h1>';
$data .= '<div class="card"><h1>PRESCRIPTION</h1>';
$data .= '<p> Name :' . $name.'</p>';
$data .= '<p> Age :' . $age.'</p>';
$data .= '<p> Prescription :' . $pres.'</p>';
$data .= '<p> Doctor Name :' . $dname.'</p>';
$data .= '<p> Doctor Phone Number :' . $phone.'</p></div>';
$mpdf->WriteHTML($data);
$mpdf->Output('prescription.pdf','D');

$con = new mysqli("localhost", "root", "", "tol");
$con->query("INSERT INTO tbl_prescription(p_name,p_age,p_pres,d_name,d_phone) VALUES ('$name','$age', '$pres','$dname','$phone')");
?>
