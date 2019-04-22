<html>
<head>
    <title>Products</title>
</head>
<body>
<?php
if($this->session->flashdata('message'))
{
    echo $this->session->flashdata('message');
}
?>
<?php echo form_open('productcrud/addProduct','','')?>
<?php echo form_input('Product_Id','','placeholder=ID')?>
<?php echo form_input('Product_Name','','placeholder=Name')?>
<?php echo form_input('Brand','','placeholder=Brand')?>
<?php echo form_input('Sale_Price','','placeholder=SalePrice')?>
<?php echo form_input('Purchase_Price','','placeholder=PurchasePrice')?>
<?php echo form_input('Product_Qty','','placeholder=Quantity')?>
<?php echo form_input('Product_Barcode','','placeholder=Barcode')?>
<?php echo form_input('Pack','','placeholder=Pack')?>
<?php echo form_input('Discount','','placeholder=Discount')?>
<?php echo form_input('product_category_id','','placeholder=ProductCategoryId')?>

<?php echo form_submit('Submit','Submit','') ?>

<?php echo form_close();?>
</body>


</html>