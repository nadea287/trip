<?php
set_include_path (dirname(__DIR__));

include 'database/connect.php';
    $db = DataBase::connect();
    $path = $_GET['path'] ?? '/';
    $ajax = $_GET['ajax'] ?? false;
    //routing
if (!$ajax) {
    include 'views/layout_start.php';
    include 'views/navbar.php';
}

    if ($path == '/trips/create') {
        $sql = 'SELECT * FROM regions';
        $stmt= $db->prepare($sql);
         $stmt->execute();
        $regions = $stmt->fetchAll();

        $sql = 'SELECT * FROM couriers';
        $stmt= $db->prepare($sql);
        $stmt->execute();
        $couriers = $stmt->fetchAll();
        include 'views/create_trip.php';
    }

    if ($path == '/trips/store') {
        if (!empty($_POST)) {


            $departure = $_POST['departure_date'] ?? null;
            $arrival = $_POST['arrival_date'] ?? null;
            $courierId = $_POST['courier'] ?? null;

            $sql = "SELECT * FROM trips";
            $where = '';
            if ($departure != null) {
                if ($where == '') {
                    $where .= ' WHERE ';
                }
                $sql .= $where . 'departure_date >= :departure';
            }
            if ($arrival != null) {
                if ($where == '') {
                    $where .= ' WHERE ';
                } else {
                    $where = ' AND ';
                }
                $sql .= $where . 'departure_date <= :arrival';
            }

            $sql .= ' AND courier_id = :courier_id';
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':courier_id', $courierId, PDO::PARAM_INT);
            if ($departure != null) {
                $stmt->bindParam(':departure', $departure, PDO::PARAM_STR);
            }

            if ($arrival != null) {
                $stmt->bindParam(':arrival', $arrival, PDO::PARAM_STR);
            }
            $stmt->execute();
            $tripsCount = $stmt->rowCount();
            if ($tripsCount > 0) {
                print 'the courier is busy';
            } else {
                $sql = "INSERT INTO trips (region_id, courier_id, departure_date, arrival_date) VALUES (?,?,?,?)";
                $stmt= $db->prepare($sql);
                $stmt->execute(array_values($_POST));
            }
        } else {
            print 'method no allowed';
        }
    }
    if ($path == '/dev/generate') {
        $regions = ['Санкт-Петербург', 'Уфа', 'Нижний Новгород'];
        foreach ($regions as $region) {
            $sql = "INSERT INTO regions (name, duration) VALUES (?,?)";
            $stmt= $db->prepare($sql);
            $stmt->execute([$region, rand(1, 50)]);
        }

        $couriers = ['ana', 'diana', 'maria'];
        foreach ($couriers as $courier) {
            $sql = "INSERT INTO couriers (firstname, lastname) VALUES (?,?)";
            $stmt= $db->prepare($sql);
            $stmt->execute([$courier, '123']);
        }
    }


    if ($path == '/') {
        $departureFrom = $_GET['departure_from'] ?? null;
        $departureTo = $_GET['departure_to'] ?? null;

            $sql = "SELECT * FROM trips INNER JOIN regions ON trips.region_id = regions.id";
            $where = '';
            if ($departureFrom != null) {
                if ($where == '') {
                    $where .= ' WHERE ';
                }
                $sql .= $where . 'departure_date >= :departure_from';
            }
            if ($departureTo != null) {
                if ($where == '') {
                    $where .= ' WHERE ';
                } else {
                    $where = ' AND ';
                }
                $sql .= $where . 'departure_date <= :departure_to';
            }
                $stmt = $db->prepare($sql);
            if ($departureFrom != null) {
                $stmt->bindParam(':departure_from', $departureFrom, PDO::PARAM_STR);
            }

            if ($departureTo != null) {
                $stmt->bindParam(':departure_to', $departureTo, PDO::PARAM_STR);
            }
                $stmt->execute();
                $trips = $stmt->fetchAll();
                include 'views/trips_index.php';
         }

        if (!$ajax) {
            include 'views/layout_end.php';
        }
