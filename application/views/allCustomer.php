<html>
<head>
    <title>Customer</title>
</head>
<body>
<?php
if($this->session->flashdata('message'))
{
    echo $this->session->flashdata('message');
}
?>
<table border="2">
    <?php if($allCustomer->num_rows()>0):
        foreach ($allCustomer->result() as $customer):
            ?>
            <tr>
                <td>
                    <?php echo $customer->Customer_Id ?>
                </td>
                <td>
                    <?php echo $customer->Customer_Name?>
                </td>
                <td>
                    <?php echo $customer->Email?>
                </td>
                <td>
                    <?php echo $customer->Password?>
                </td>
                <td>
                    <?php echo $customer->Customer_Join_Date?>
                </td>
                <td>
                    <?php echo $customer->Picture?>
                </td>
                <td>
                    <?php echo $customer->Contact?>
                </td>

                <td>
                    <a href="<?php echo site_url('customercrud/editCustomer/'.$customer->Customer_Id)?>">Edit</a>

                </td>
                <td><a href="<?php echo site_url('customercrud/deleteCustomer/'.$customer->Customer_Id)?>">Delete</a></td>
            </tr>

        <?php endforeach; ?>

    <?php else:?>
    <?php endif;?>
</table>
</body>
</html>