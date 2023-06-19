<?php
session_start();

include 'config.php';
$update = false;
$id = "";
$name = "";
$email = "";
$class = "";
$phone = "";
$regfees = "";
$feesdis = "";
$fees = "";
$discount = "";
$photo = "";
$amount_paid = "";
$balance = "";

if (isset($_POST['add'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$class = $_POST['class'];
	$phone = $_POST['phone'];
	$regfees = $_POST['regfees'];
	$feesdis = $_POST['feesdis'];
	$fees = $_POST['fees'];
	$discount = $fees - $feesdis;
	$amount_paid =$_POST['amount_paid'];
	$balance =($fees -$amount_paid) + $regfees;
	
	$photo = $_FILES['image']['name'];
	$upload = "uploads/" . $photo;

	$query = "INSERT INTO data(name,email,class,phone,regfees,feesdis,fees,discount,amount_paid,balance,photo)VALUES(?,?,?,?,?,?,?,?,?,?,?)";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("sssssiiiiii", $name, $email, $class, $phone, $regfees, $feesdis, $fees,  $discount, $amount_paid, $balance, $upload);
	$stmt->execute();
	move_uploaded_file($_FILES['image']['tmp_name'], $upload);

	header('location:index.php');

	$_SESSION['response'] = "Record Successfully Added To Records";
	$_SESSION['res_type'] = "success";
}
if (isset($_GET['delete'])) {
	$id = $_GET['delete'];

	$query = "DELETE FROM data WHERE id=?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("i", $id);
	$stmt->execute();

	header('location:records.php');
	$_SESSION['response'] = "Record Successfully Deleted From Records";
	$_SESSION['res_type'] = "Danger";
}
if (isset($_GET['edit'])) {
	$id = $_GET['edit'];

	$query = "SELECT * FROM data WHERE id=?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();

	$id = $row['id'];
	$name = $row['name'];
	$email = $row['email'];
	$phone = $row['phone'];
	$photo = $row['photo'];
	$regfees = $row['regfees'];
	$feesdis = $row['feesdis'];
	$fees = $row['fees'];
	$discount = $row['discount'];
	$amount_paid = $row['amount_paid'];
	$balance = $row['balance'];

	$update = true;

}

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$regfees = $_POST['regfees'];
	$feesdis = $_POST['feesdis'];
	$fees = $_POST['fees'];
	$discount = $_POST['discount'];
	$amount_paid = $_POST['amount_paid'];
	$balance = $_POST['balance'];
	$oldimage = $_POST['oldimage'];

	if (isset($_FILES['image']['name']) && ($_FILES['image']['name'] != "")) {
		$newimage = "uploads/" . $_FILES['image']['name'];
		unlink($oldimage);
		move_uploaded_file($_FILES['image']['tmp_name'], $newimage);
	} else {
		$newimage = $oldimage;
	}
	$query = "UPDATE data SET name=?,email=?,phone=?,regfees=?,feesdis=?,fees=?,discount=?,amount_paid=?,balance=?,photo=? WHERE id=?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("ssssi", $name, $email, $phone, $regfees, $feesdis, $fees, $discount, $amount_paid, $balance, $newimage, $id);
	$stmt->execute();

	$_SESSION['response'] = "Updated Successfully";

	$_SESSION['res_type'] = "primary";
	header('location:records.php');
}

if (isset($_GET['details'])) {

	$id = $_GET['details'];
	$query = "SELECT * FROM data WHERE id=?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();

	$vid = $row['id'];
	$vname = $row['name'];
	$vemail = $row['email'];
	$vphone = $row['phone'];
	$vphoto = $row['photo'];

}
?>