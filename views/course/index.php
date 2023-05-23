<html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
</head>
<body>
    <a href ="/task2/course_create">Create Course</a>

    <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Course Name</th>
            <th>Course Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($courses as $course): ?>
            <tr>
                <td><?= $course->getId()?></td>
                <td><?= $course->getName()?></td>
                <td><?= $course->getPrice()?></td>
                <td>
                    <form method="post" action="course_edit?id=<?= $course->getId()?>">
                        <input type = "submit" value ="edit">
                    </form>
                    <form method="post" action="course_delete?id=<?= $course->getId()?>">
                        <input type = "submit" value ="delete">
                    </form>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
        </table>

</body>
</html>