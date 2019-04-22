<html>
<head>
    <title>Order</title>
</head>
<body>
<?php
if($this->session->flashdata('message'))
{
    echo $this->session->flashdata('message');
}
?>
<?php echo form_open('ordercrud/addOrder','','')?>
<?php echo form_input('Order_Id','','placeholder=ID')?>
<?php echo form_input('Product_Name','','placeholder=Product_Name')?>
<?php echo form_input('Description','','placeholder=Description')?>
<?php echo form_input('Quantity','','placeholder=Quantity')?>
<?php echo form_input('Discount','','placeholder=Discount')?>
<?php echo form_input('Net_Price','','placeholder=Net_Price')?>

<?php echo form_submit('Submit','Submit','') ?>

<?php echo form_close();?>
</body>


</html>