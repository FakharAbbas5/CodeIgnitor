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
<table border="2">
<?php if($allAdmin->num_rows()>0):
    foreach ($allAdmin->result() as $admin):
    ?>
    <tr>
        <td>
            <?php echo $admin->Admin_Id ?>
        </td>
        <td>
            <?php echo $admin->Admin_Name?>
        </td>
        <td>
            <?php echo $admin->Admin_Email?>
        </td>
        <td>
            <?php echo $admin->Admin_Password?>
        </td>
        <td>
            <?php echo $admin->Admin_Join_Date?>
        </td>
        <td>
            <?php echo $admin->Admin_Last_Login?>
        </td>
        <td>
            <?php echo $admin->Picture?>
        </td>
        <td>
            <a href="<?php echo site_url('admincrud/editAdmin/'.$admin->Admin_Id)?>">Edit</a>

        </td>
        <td><a href="<?php echo site_url('admincrud/deleteAdmin/'.$admin->Admin_Id)?>">Delete</a></td>
    </tr>

    <?php endforeach; ?>

<?php else:?>
<?php endif;?>
</table>
</body>
</html>