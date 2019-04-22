<html>
<head>
    <title>COMPLAINTS</title>
</head>
<body>
<?php
if($this->session->flashdata('message'))
{
    echo $this->session->flashdata('message');
}
?>
<table border="2">
    <?php if($allComplaint->num_rows()>0):
        foreach ($allComplaint->result() as $complaint):
            ?>
            <tr>
                <td>
                    <?php echo $complaint->Complaints_Id ?>
                </td>
                <td>
                    <?php echo $complaint->Customer_Name?>
                </td>
                <td>
                    <?php echo $complaint->Complaint_Type?>
                </td>
                <td>
                    <?php echo $complaint->Complaint_Description?>
                </td>
                <td>
                    <?php echo $complaint->Date?>
                </td>
                <td>
                    <?php echo $complaint->Status?>
                </td>
                <td>
                    <a href="<?php echo site_url('complaintcrud/editComplaint/'.$complaint->Complaints_Id)?>">Edit</a>

                </td>
                <td><a href="<?php echo site_url('complaintcrud/deleteComplaint/'.$complaint->Complaints_Id)?>">Delete</a></td>
            </tr>

        <?php endforeach; ?>

    <?php else:?>
    <?php endif;?>
</table>
</body>
</html>