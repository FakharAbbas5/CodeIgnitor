<html>
<head>
    <title>EDIT Product</title>
</head>
<body>
<?php
if($this->session->flashdata('message'))
{
    echo $this->session->flashdata('message');
}
?>
<?php echo form_open('productcrud/updateProduct','','')?>

<?php echo form_input('Product_Name',$productRecord[0]['Product_Name']);
echo form_hidden('userId',$productRecord[0]['Product_Id'])
?>
<?php echo form_input('Brand',$productRecord[0]['Brand'])?>
<?php echo form_input('Sale_Price',$productRecord[0]['Sale_Price'])?>
<?php echo form_input('Purchase_Price',$productRecord[0]['Purchase_Price'])?>
<?php echo form_input('Product_Qty',$productRecord[0]['Product_Qty'])?>
<?php echo form_input('Product_Barcode',$productRecord[0]['Product_Barcode'])?>
<?php echo form_input('Pack',$productRecord[0]['Pack'])?>
<?php echo form_input('Discount',$productRecord[0]['Discount'])?>
<?php echo form_input('product_category_id',$productRecord[0]['product_category_id'])?>

<?php echo form_submit('Update','Update','') ?>

<?php echo form_close();?>
</body>
</html>