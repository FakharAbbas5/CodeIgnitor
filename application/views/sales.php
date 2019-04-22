<html>
<head>
    <title>Sales</title>
</head>
<body>
<?php
if($this->session->flashdata('message'))
{
    echo $this->session->flashdata('message');
}
?>
<?php echo form_open('salescrud/addSales','','')?>
<?php echo form_input('Sales_Id','','placeholder=Sales_Id')?>
<?php echo form_input('Product_Name','','placeholder=Product_Name')?>
<?php echo form_input('Salesman_Name','','placeholder=Salesman_Name')?>
<?php echo form_input('Date','','placeholder=Date')?>
<?php echo form_input('Quantity','','placeholder=Quantity')?>
<?php echo form_input('Sale_Price','','placeholder=Sale_Price')?>
<?php echo form_input('Description','','placeholder=Description')?>
<?php echo form_input('Reference','','placeholder=Reference')?>
<?php echo form_input('Sale_Type','','placeholder=Sale_Type')?>
<?php echo form_input('Total_Price','','placeholder=Total_Price')?>

<?php echo form_submit('Submit','Submit','') ?>

<?php echo form_close();?>
</body>


</html>