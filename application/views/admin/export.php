
<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=COBA.xls");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1" style="border-collapse:collapse;">
            <tr>
                <td>NO</td>
                <td>Nama</td>
                <td>STATUS</td>
            </tr>
            <?php
                $no = 1;
                foreach ($tb_unit1 as $key => $item) {
                    $fill = null;
                    // red hexa = #FF0101
                    // green hexa = #01FF33
                    // yellow hexa = #F7FF01
                    if ($item->fill == '#FF0101') {
                        $fill = 'R';
                    }else if($item->fill == '#01FF33'){
                        $fill = 'G';
                    }else{
                        $fill = $item->fill == '#F7FF01' ? 'Y' : '';
                    }
                    
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $item->nama ?? null ?></td>
                            <td style="text-align:center; <?= "background-color:".$item->fill ?? '' ?> "><?= $fill ?></td>
                        </tr>
                    <?php
                    $no++;
                }
            ?>
    </table>
</body>
</html>