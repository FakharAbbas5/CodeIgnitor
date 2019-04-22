<html>
<head>
    <title>ADMIN</title>
</head>
<body>
<?php
if($this->session->flashdata('message'))
{
    echo $this->session->flashdata('message');
}
?>
<?php echo form_open('','','')?>

<a href="<?php echo site_url('salesmancrud/addSalesman')?>">Salesman</a>
<br>
<a href="<?php echo site_url('salesmancrud/allSalesman')?>">View Salesmen</a>
<br>
<a href="<?php echo site_url('customercrud/')?>">Customer CRUD</a>
<br>
<a href="<?php echo site_url('customercrud/allCustomer')?>">Customer CRUD</a>
<br>
<a href="<?php echo site_url('productcrud/')?>">Product/Inventory</a>
<br>
<a href="<?php echo site_url('productcrud/allProduct')?>">Product/Inventory</a>
<br>
<a href="<?php echo site_url('complaintcrud/allComplaint')?>">View Complaints</a>
<br>
<a href="<?php echo site_url('admincrud/logout/')?>">Logout</a>

<?php echo form_close();?>
</body>
</html>