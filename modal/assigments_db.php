<?php 

    function get_assignments_by_course($course_id) {
        global $db;
        if ($course_id) {
            $query = 'SELECT A.ID, A.Description, C.courseName FROM assigments A LEFT JOIN courses C ON A.courseID = C.courseID WHERE A.courseID = :course_id ORDER BY ID';
        } else {
            $query = 'SELECT A.ID, A.Description, C.courseName FROM assigments A LEFT JOIN courses C ON A.courseID = C.courseID ORDER BY C.courseID';
        }
        $statement = $db->prepare($query);
        if ($course_id) {
            $statement->bindValue(':course_id', $course_id);
        }
        $statement->execute();
        $assignments = $statement->fetchAll();
        $statement->closeCursor();
        return $assignments;
    }

    function delete_assignment($assignment_id) {
        global $db;
        $query = 'DELETE FROM assignments WHERE ID = :assign_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':assign_id', $assignment_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_assignment($course_id, $description) {
        global $db;
        $query = 'INSERT INTO assigments (Description, courseID) VALUES (:description, :course_id)';
        $statement = $db->prepare($query);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':course_id', $course_id); // Updated parameter name
        $statement->execute();
        $statement->closeCursor();
    }