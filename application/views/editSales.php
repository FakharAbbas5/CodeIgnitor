<html>
<head>
    <title>EDIT Sales</title>
</head>
<body>
<?php
if($this->session->flashdata('message'))
{
    echo $this->session->flashdata('message');
}
?>
<?php echo form_open('salescrud/updateSales','','')?>

<?php echo form_input('Product_Name',$salesRecord[0]['Product_Name']);
echo form_hidden('userId',$salesRecord[0]['Sales_Id'])
?>
<?php echo form_input('Salesman_Name',$salesRecord[0]['Salesman_Name'])?>
<?php echo form_input('Date',$salesRecord[0]['Date'])?>
<?php echo form_input('Quantity',$salesRecord[0]['Quantity'])?>
<?php echo form_input('Sale_Price',$salesRecord[0]['Sale_Price'])?>
<?php echo form_input('Description',$salesRecord[0]['Description'])?>
<?php echo form_input('Reference',$salesRecord[0]['Reference'])?>
<?php echo form_input('Sale_Type',$salesRecord[0]['Sale_Type'])?>
<?php echo form_input('Total_Price',$salesRecord[0]['Total_Price'])?>

<?php echo form_submit('Update','Update','') ?>

<?php echo form_close();?>
</body>
</html>