<html>
<head>
    <title>Complaint</title>
</head>
<body>
<?php
if($this->session->flashdata('message'))
{
    echo $this->session->flashdata('message');
}
?>
<?php echo form_open('complaintcrud/addComplaint','','')?>
<?php echo form_input('Complaints_Id','','placeholder=ID')?>
<?php echo form_input('Customer_Name','','placeholder=CustomerName')?>
<?php echo form_input('Complaint_Type','','placeholder=ComplaintType')?>
<?php echo form_input('Complaint_Description','','placeholder=Description')?>
<?php echo form_input('Date','','placeholder=Date')?>
<?php echo form_input('Status','','placeholder=Status')?>

<?php echo form_submit('Submit','Submit','') ?>

<?php echo form_close();?>
</body>
</html>