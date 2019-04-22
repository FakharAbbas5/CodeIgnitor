<html>
<head>
    <title>Salesman</title>
</head>
<body>
<?php
if($this->session->flashdata('message'))
{
    echo $this->session->flashdata('message');
}
?>
<table border="2">
    <?php if($allSalesman->num_rows()>0):
        foreach ($allSalesman->result() as $salesman):
            ?>
            <tr>
                <td>
                    <?php echo $salesman->Salesman_Id ?>
                </td>
                <td>
                    <?php echo $salesman->Salesman_Name?>
                </td>
                <td>
                    <?php echo $salesman->Email?>
                </td>
                <td>
                    <?php echo $salesman->Password?>
                </td>
                <td>
                    <?php echo $salesman->Salesman_Join_Date?>
                </td>
                <td>
                    <?php echo $salesman->Salesman_Last_Login?>
                </td>
                <td>
                    <?php echo $salesman->Picture?>
                </td>
                <td>
                    <?php echo $salesman->Contact?>
                </td>

                <td>
                    <a href="<?php echo site_url('salesmancrud/editSalesman/'.$salesman->Salesman_Id)?>">Edit</a>

                </td>
                <td><a href="<?php echo site_url('salesmancrud/deleteSalesman/'.$salesman->Salesman_Id)?>">Delete</a></td>
            </tr>

        <?php endforeach; ?>

    <?php else:?>
    <?php endif;?>
</table>
</body>
</html>