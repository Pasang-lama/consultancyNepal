<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cp = "city_area";
    session_start();
    $present_aid = $_POST["area_list"];
    $cid = $_POST["city"];
  
    require_once "../../database.php";
    require_once "../../tables.php";
    $db = Database::Instance();
    $previous_aid = [];
     $auth_result = $db->CustomQuery("SELECT * FROM city_area WHERE city_id={$cid}");
    foreach ($auth_result as $datas) {
        $previous_aid[] = $datas->area_id;
    }
    if ($present_aid == null) {
        if ($previous_aid != null) {
            foreach ($previous_aid as $data) {
                $db->CustomQuery(
                    "DELETE FROM city_area WHERE city_id={$cid} AND area_id={$data}"
                );
            }
        }
        $_SESSION["message"] = "Changes Made Successfully";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showcity";';
        echo "</script>";
    } elseif ($previous_aid == null && $present_aid != null) {
        foreach ($present_aid as $data) {
            $db->Insert($cp, ["area_id" => $data, "city_id" => $cid]);
        }
        $_SESSION["message"] = "Changes Made Successfully";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showcity";';
        echo "</script>";
    } else {
        if (count($present_aid) > count($previous_aid)) {
            $inserting_aid = array_diff($present_aid, $previous_aid);
            foreach ($inserting_aid as $aids) {
                $aut_book_params = ["area_id" => $aids, "city_id" => $cid];
                $db->Insert($cp, $aut_book_params);
            }
            $result = $db->SelectByCriteria("city_area", "area_id", "city_id", [
                $cid,
            ]);
            $table_authors = [];
            foreach ($result as $data) {
                $table_authors[] = $data->area_id;
            }
            $re_data = array_diff($table_authors, $present_aid);
            if (count($re_data) != 0) {
                foreach ($re_data as $data) {
                    $obj->delete($cp, $where);
                    $db->CustomQuery(
                        "DELETE FROM  city_area WHERE city_id={$cid} AND area_id={$data}"
                    );
                }
            }
            $_SESSION["message"] = "Area Added";
            echo '<script type="text/javascript">';
            echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showcity";';
            echo "</script>";
        } elseif (count($previous_aid) > count($present_aid)) {
            $new_a = array_diff($present_aid, $previous_aid);
            if (count($new_a) != 0) {
                foreach ($new_a as $aids) {
                    $aut_book_params = ["area_id" => $aids, "city_id" => $cid];
                    $db->Insert($cp, $aut_book_params);
                }
                $result = $db->SelectByCriteria($cp, "area_id", "city_id", [$cid]);
                $table_authors = [];
                foreach ($result as $data) {
                    $table_authors[] = $data->area_id;
                }
                $re_data = array_diff($table_authors, $present_aid);
                if (count($re_data) != 0) {
                    foreach ($re_data as $data) {
                        $db->CustomQuery(
                            "DELETE FROM  city_area WHERE city_id={$cid} AND area_id={$data}"
                        );
                    }
                }
            } else {
                $new_b = array_diff($previous_aid, $present_aid);
                if (count($new_b) != 0) {
                    foreach ($new_b as $data) {
                        $db->CustomQuery(
                            "DELETE FROM  city_area WHERE city_id={$cid} AND area_id={$data}"
                        );
                    }
                }
            }
            $_SESSION["message"] = "Area Added";
            echo '<script type="text/javascript">';
            echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showcity";';
            echo "</script>";
        } elseif (count($present_aid) == count($previous_aid)) {
            $diff = array_diff($present_aid, $previous_aid);
            
            if (count($diff) != null) {
                foreach ($diff as $aids) {
                    $aut_book_params = ["area_id" => $aids, "city_id" => $cid];
                    $db->Insert($cp, $aut_book_params);
                }
                $result = $db->SelectByCriteria($cp, "area_id", "city_id", [$cid]);
                $table_authors = [];
                foreach ($result as $data) {
                    $table_authors[] = $data->area_id;
                }
                $re_data = array_diff($table_authors, $present_aid);
                if (count($re_data) != 0) {
                    foreach ($re_data as $data) {
                        $db->CustomQuery(
                            "DELETE FROM  city_area WHERE city_id={$cid} AND area_id={$data}"
                        );
                    }
                }
                $_SESSION["message"] = "Area Added";
                echo '<script type="text/javascript">';
                echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showcity";';
                echo "</script>";
            }
        }
    }
}
