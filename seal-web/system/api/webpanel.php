<?php
// Created by Ghilman
// isghilman@gmail.com or fb.me/ghilmaanrashif

include '../config.php';
include '../oop.php';
$por = new seal;

$action = $_POST['action'];
$delete = $_POST['delete'];
if(isset($action)) {
    if($action == "itemshop_category") {
        $idcategory = $_POST['idcategory'];
        $category_name = $_POST['category_name'];

        if(isset($delete) && $delete == 1) {
            $save = dd_q('DELETE FROM itemshop_category WHERE idcategory = ?', [$idcategory]);
        } else {
            if(strlen($idcategory) == 0) {
                $save = dd_q('INSERT INTO itemshop_category VALUES("", ?)', [$category_name]);
            } else {
                $save = dd_q('UPDATE itemshop_category SET category_name = ? WHERE idcategory = ?', [$category_name, $idcategory]);
            }
        }

        if($save !== false) {
            echo "success";
        } else {
            echo "error";
        }
    }
    else if($action == "itemshop_item") {
        $iditemshop = $_POST['id'];
        $idcategory = $_POST['idcategory'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $item_id = $_POST['item_id'];
        $item_io = $_POST['item_io'];
        $item_ioo = $_POST['item_ioo'];
        $images = false;
        $images_name = null;

        if(isset($delete) && $delete == 1) {
            $save = dd_q('DELETE FROM itemshop_item WHERE id = ?', [$iditemshop]);
        } else {
            $allowed_ext = array('png','jpg');
            $images_name = $_FILES['images']['name'];
            $x = explode('.', $images_name);
            $ext = strtolower(end($x));
            $size = $_FILES['images']['size'];
            $file_tmp = $_FILES['images']['tmp_name'];    
            if(in_array($ext, $allowed_ext)) {
                $images = true;
                // var_dump('upload');

                move_uploaded_file($file_tmp, '../../assets/img/item_shop/'.$images_name);
            }

            if(strlen($iditemshop) == 0) {
                $save = dd_q('INSERT INTO itemshop_item VALUES("", ?, ?, ?, ?, ?, ?, "", ?)', [$idcategory, $name, $price, $item_id, $item_io, $item_ioo, $images_name]);
            } else {
                $save = dd_q('UPDATE itemshop_item SET idcategory = ?, name = ?, price = ?, item_id = ?, item_io = ?, item_ioo = ?, images = ? WHERE id = ?', [$idcategory, $name, $price, $item_id, $item_io, $item_ioo, $images_name, $iditemshop]);
            }
        }
        // var_dump($save);

        if($save !== false) {
            echo "success";
        } else {
            echo "error";
        }

    }
    else if($action == "itemmall_item") {
        $iditemmall = $_POST['id'];
        $name = $_POST['name'];
        $type = $_POST['type'];
        $price = $_POST['price'];
        $item_id = $_POST['item_id'];
        $item_io = $_POST['item_io'];
        $item_limit = $_POST['item_limit'];
        $images = false;
        $images_name = null;

        if(isset($delete) && $delete == 1) {
            $save = dd_q('DELETE FROM itemmall_item WHERE id = ?', [$iditemmall]);
        } else {
            $allowed_ext = array('png','jpg');
            $images_name = $_FILES['images']['name'];
            $x = explode('.', $images_name);
            $ext = strtolower(end($x));
            $size = $_FILES['images']['size'];
            $file_tmp = $_FILES['images']['tmp_name'];    
            if(in_array($ext, $allowed_ext)) {
                $images = true;
                // var_dump('upload');

                move_uploaded_file($file_tmp, '../../assets/img/item_mall/'.$images_name);
            }

            if(strlen($iditemmall) == 0) {
                $save = dd_q('INSERT INTO itemmall_item VALUES(?, ?, ?, ?, ?, ?, ?)', [$name, $type, $price, $item_id, $item_io, $item_limit, $images_name]);
            } else {
                $save = dd_q('UPDATE itemmall_item SET name = ?, type = ?, price = ?, item_id = ?, item_io = ?, item_limit = ?, images = ? WHERE id = ?', [$name, $type, $price, $item_id, $item_io, $item_limit, $images_name, $iditemmall]);
            }
        }
        // var_dump($save);

        if($save !== false) {
            echo "success";
        } else {
            echo "error";
        }

    }
    else {
        $res = "unknown";
    }

} else {
    $res = "error";
}

echo $res;
