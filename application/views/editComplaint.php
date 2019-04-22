<html>
<head>
    <title>EDIT Complaint</title>
</head>
<body>
<?php
if($this->session->flashdata('message'))
{
    echo $this->session->flashdata('message');
}
?>
<?php echo form_open('complaintcrud/updateComplaint','','')?>

<?php echo form_input('Customer_Name',$complaintRecord[0]['Customer_Name']);
echo form_hidden('userId',$complaintRecord[0]['Complaints_Id'])
?>
<?php echo form_input('Complaint_Type',$complaintRecord[0]['Complaint_Type'])?>
<?php echo form_input('Complaint_Description',$complaintRecord[0]['Complaint_Description'])?>
<?php echo form_input('Date',$complaintRecord[0]['Date'])?>
<?php echo form_input('Status',$complaintRecord[0]['Status'])?>

<?php echo form_submit('Update','Update','') ?>

<?php echo form_close();?>
</body>
</html>