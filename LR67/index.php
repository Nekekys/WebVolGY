<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>laba1</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>

   <?php 
        require "header.php";
        require "logics/connect.php";
   ?>
    <div class="container">
        <h1>Рейтинг группы</h1>
        <form action="" class="d-flex" method="POST" style='margin-bottom: 15px;'>
            <select style='width: 200px; margin-right: 15px;' class="form-select" name="group" aria-label="Default select example">
                <?php
                     $query = "SELECT group_id, group_name  FROM groups";
                     $result = $mysql->query($query);
                     while ($row = $result->fetch_assoc()) {
                         echo " <option value='" . $row['group_id'] . "'>" . $row['group_name'] . "</option>";
                     }
                    
                ?>
            </select>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
        <?php
            if($_POST){
               echo '<table class="table"><thead>
                        <tr>
                            <th scope="col">Студенты</th>';
                            $id = mysqli_real_escape_string($mysql,$_POST['group']);
                            $arr = [];
                            $query = "SELECT groupsubjects.group_id, groupsubjects.subjects_id, subjects.subject_name FROM groupsubjects INNER JOIN subjects ON subjects.subject_id = groupsubjects.subjects_id WHERE groupsubjects.group_id = $id ";
                            $result = $mysql->query($query);
                            while ($row = $result->fetch_assoc()) {
                                $arr[] = $row['subjects_id'];
                                echo "<th scope='col'>" . $row['subject_name'] . "</th>";
                            }

                echo   '</tr>
                    </thead>';
                echo '<tbody>';
                    $id = mysqli_real_escape_string($mysql,$_POST['group']);

                    $query = "SELECT student_id, student_name FROM students WHERE students.student_group_id = $id ";
                    $result = $mysql->query($query);
                    while ($row = $result->fetch_assoc()) {
                        $student = $row['student_id'];
                        echo "<tr><td>" . $row['student_name'] . "</td>";
                        foreach ($arr as $value) {
                            $query = "SELECT mark_rating FROM marks WHERE mark_subject_id = $value and mark_student_id = $student";
                            $result2 = $mysql->query($query);
                            $row2 = $result2->fetch_assoc();
                            $mark = $row2['mark_rating'];
                            echo "<td>" . $mark . "</td>";
                        }
                        echo "</tr>";  
                    }
                    foreach ($arr as $value) {

                    }
                    
                echo  '</tbody>
                </table>';
            }
        ?>  
    </div>
    
    

   


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>

</html>
