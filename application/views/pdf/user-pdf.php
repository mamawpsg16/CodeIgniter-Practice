<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style>
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <img src="<?php base_url('assets/images/uploads/default.png') ?>" alt="">
   
   <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email Address</th>
                <th>Phone Number</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if ($users) {
                foreach ($users as $key => $user) { ?>
                    <tr>
                        <td> <?= $user->last_name, $user->first_name ?></td>
                        <td> <?= $user->email ?></td>
                        <td> <?= $user->phone_number ?> </td>
                        <td> <?= $user->address ?></td>
                    </tr>
                <?php }  ?>
            <?php } else { ?>
                <tr>
                    <td colspan='5' class='center'>No Data</td>
                </tr>
            <?php }
            ?>
            <?php
            ?>
            
        </tbody>
    </table>

</html>