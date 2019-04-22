<html>
<head>
    <title>Customer</title>
</head>
<body>
<?php
if($this->session->flashdata('message'))
{
    echo $this->session->flashdata('message');
}
?>
<?php echo form_open('customercrud/addCustomer','','')?>
<?php echo form_input('Customer_Id','','placeholder=ID')?>
<?php echo form_input('Customer_Name','','placeholder=Name')?>
<?php echo form_input('Email','','placeholder=Email')?>
<?php echo form_input('Contact','','placeholder=Contact')?>
<?php echo form_input('Password','','placeholder=Password')?>
<?php echo form_input('Customer_Join_Date','','placeholder=JoinDate')?>
<?php echo form_input('Picture','','placeholder=Picture')?>

<?php echo form_submit('Submit','Submit','') ?>

<?php echo form_close();?>
</body>
</html>