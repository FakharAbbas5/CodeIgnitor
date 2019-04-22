<html>
<head>
    <title>EDIT Customer</title>
</head>
<body>
<?php
if($this->session->flashdata('message'))
{
    echo $this->session->flashdata('message');
}
?>
<?php echo form_open('customercrud/updateCustomer','','')?>

<?php echo form_input('Customer_Name',$customerRecord[0]['Customer_Name']);
echo form_hidden('userId',$customerRecord[0]['Customer_Id'])
?>
<?php echo form_input('Email',$customerRecord[0]['Email'])?>
<?php echo form_input('Contact',$customerRecord[0]['Contact'])?>
<?php echo form_input('Password',$customerRecord[0]['Password'])?>
<?php echo form_input('Customer_Join_Date',$customerRecord[0]['Customer_Join_Date'])?>
<?php echo form_input('Picture',$customerRecord[0]['Picture'])?>

<?php echo form_submit('Update','Update','') ?>

<?php echo form_close();?>
</body>
</html>