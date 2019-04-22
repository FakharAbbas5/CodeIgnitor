<html>
<head>
    <title>Orderd</title>
</head>
<body>
<?php
if($this->session->flashdata('message'))
{
    echo $this->session->flashdata('message');
}
?>
<?php echo form_open('orderdcrud/addOrder','','')?>
<?php echo form_input('Order_Id','','placeholder=ID')?>
<?php echo form_input('Customer_Name','','placeholder=Customer_Name')?>
<?php echo form_input('Order_Total_Amount','','placeholder=Order_Total_Amount')?>
<?php echo form_input('Order_Date','','placeholder=Order_Date')?>
<?php echo form_input('Order_Description','','placeholder=Order_Description')?>

<?php echo form_submit('Submit','Submit','') ?>

<?php echo form_close();?>
</body>


</html>