﻿<?php
error_reporting(0);
$flag = 0;
if(!empty($_POST["ho_ten"]) && !empty($_POST["email"]) && !empty($_POST["ten_dn"]) && !empty($_POST["mat_khau"]))
{
	$ho_ten = $_POST["ho_ten"];
	$email = $_POST["email"];
	$ten_dn = $_POST["ten_dn"];
	$mat_khau = $_POST["mat_khau"];

  $data = array(
    'ho_ten' => $ho_ten,
    'email' => $email,
    'ten_dn' => $ten_dn,
    'mat_khau' => $mat_khau,
  );
  $json_data = json_encode($data);
  $thongtin = setcookie("thong_tin",$json_data, time()+ 3600, '/');

  // Bước 1: Lấy giá trị từ cookie
if (isset($_COOKIE["thong_tin"])) {
  $json_data = $_COOKIE["thong_tin"];

  // Bước 2: Chuyển đổi chuỗi JSON thành mảng
  $data1 = json_decode($json_data, true);

}
$flag = 1;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>tao_session</title>
<style type="text/css">
#form1 table tr td {
	font-family: Arial, Helvetica, sans-serif;
}
#form1 table tr td {
	font-family: Lucida Sans Unicode, Lucida Grande, sans-serif;
}
#form1 table tr td {
	font-family: Lucida Console, Monaco, monospace;
}
#form1 table tr td {
	font-family: "Times New Roman", Times, serif;
}
#form1 table tr td h3 strong {
	color: #FFF;
}
</style>
</head>

<body>

<form id="form1" name="form1" method="post" action="session.php">
  <table width="338" height="205" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="32" colspan="2" align="center" valign="middle" bgcolor="#006666"><h3><strong>THÔNG TIN ĐĂNG NHẬP</strong></h3></td>
    </tr>
    <tr bgcolor="#009FAA">
      <td width="130" height="35"> <strong> Họ và tên:</strong></td>
      <td width="208">      <input name="ho_ten" type="text" id="textfield9" value="<?php echo $data1['ho_ten'] ?>" /></td>
    </tr>
    <tr bgcolor="#009FAA">
      <td height="37"><strong> Email:</strong></td>
      <td>      <input name="email" type="text" id="textfield10" value="<?php echo $data1['email']?>" /></td>
    </tr>
    <tr bgcolor="#009FAA">
      <td height="33"><strong> Tên đăng nhập:</strong></td>
      <td>      <input name="ten_dn" type="text" id="textfield11" value="<?php echo $data1['ten_dn']?>" /></td>
    </tr>
    <tr bgcolor="#009FAA">
      <td height="34"><strong> Mật khẩu:</strong></td>
      <td><input name="mat_khau" type="password" id="textfield12" value="<?php echo $data1['mat_khau']?>" /></td>
    </tr>
    <tr bgcolor="#009FAA">
      <td height="34" colspan="2" align="center"><input type="submit" name="button" id="button" value="Đăng nhập" /></td>
    </tr>
  </table>
</form>

<p align="center"><font color="#FF0000"></font></p>
<form id="form2" name="form2" method="post" action="">
  <?php
  error_reporting(0);
 	if($flag==1)
	{
		echo "<table width='350' border='0' align='center' cellpadding='0' cellspacing='0' bgcolor='#009FAA' class='style10'>
		<tr bgcolor='#009FAA' align='center'><td>";
		echo "<font color='#ffffff'>Xin chào ". $data1['ho_ten'] ."<br>";
		echo "Email: ".$data1['email'] . "<br>";
		echo "Tên đăng nhập: <b><i> ".$data1['ten_dn'] . "</b></i><br>";
		echo "Mật khẩu: ".$data1['mat_khau'] . "<br>";
		echo "<a href='doc_session.php'>Click here!</a>";
		echo "</td></tr></table>";
		}
 ?>
</form>
</body>
</html>