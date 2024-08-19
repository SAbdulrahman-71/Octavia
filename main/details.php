<?php

if (session_start() === PHP_SESSION_NONE) {
    session_start();
}

include('../php/db.php');
include('../data/fetch_inventory.php');



function getitem($inventory, $id)
{


    foreach ($inventory as $catagory => $items) {
        foreach ($items as $item) {
            if ($item['id'] == $id) {
                return $item['name'];
            }
        }
    }
}

function getitem_img($inventory, $id)
{


    foreach ($inventory as $catagory => $items) {
        foreach ($items as $item) {
            if ($item['id'] == $id) {
                return $item['img'];
            }
        }
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>| Order Details</title>
</head>

<body>
    <h1>

        <?php echo getitem($inventory, 17) ?>

    </h1>

    <div class="card col-md-5">
        <div class="card-header">
            <pre>
                <?php print_r($_SESSION) ?>
            </pre>
        </div>
    </div>

    <div class="card py-5 px-5 col-6">
        <div class="card-header">
            <h1>This is the title</h1>
        </div>
        <div class="card-img">
            <img src="<?php echo getitem_img($inventory, 17) ?>"
                alt="Item Image"
                style="max-width: 150px; max-height: 150px; width: 30%; height: auto;">
        </div>
        <div class="card-footer bg-info">
            <h5>This is the footer</h5>
        </div>
    </div>


</body>

</html>