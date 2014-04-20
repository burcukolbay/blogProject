<?php


include_once  '../models/Admin.php';
include_once  '../models/Kategori.php';

$Admin = new Admin();
$Kategori = new Kategori();

//eğer daha önce ziyaretçi login olmadıysa

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
    <?php include_once './inc/body_top.php'; ?>

    <div id="container">
        <div id="content">
            <?php
            $KategoriList = $Kategori->getKategori(10);
            ?>
            <div id="deleteResult">
                <?php
                if(isset($_GET['delete'])){
                    switch ($_GET['delete']) {
                        case 'ok':
                            echo 'Delete operation successful.';
                        break;
                        case 'notok':
                            echo 'Delete operation not successful.';
                        break;
                        default:
                        break;
                    }
                }
                ?>
            </div>
            <table border="1" cellpadding="2">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>İsim</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (is_null($KategoriList) ){
                        echo '<tr><td colspan="8">No record.</td></tr>';
                    }else{
                        foreach ($KategoriList as $KategoriItem) {
                            $KategoriItem=(object)$KategoriItem;
                    ?>
                            <tr>
                                <td><?php echo $KategoriItem->id; ?></td>
                                <td></td>
                                <td><?php echo $KategoriItem->name; ?></td>
                                <td>
                                    <a href="kategori_sil.php?id=<?php echo $KategoriItem->id; ?>">
                                    Sil
                                    </a>
                                    | 
                                    <a href="kategori_guncelle.php?id=<?php echo $KategoriItem->id; ?>">
                                    Guncelle
                                    </a>
                                    </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                    
                </tbody>
            </table>

        </div>

    </div>
</body>
</html>
