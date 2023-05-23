<html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
</head>
<body>
    <h3> Edit Course</h3>

    <form method="post" action = "course_update?id=<?= $course->getId()?>">
        Course Name:<br>
        <input type = "text" name = "name" value = "<?= $course->getName()?>"><br>
        Course Price:<br>
        <input type = "text" name = "price" value = "<?= $course->getPrice()?>"><br>
        <input type = "submit" value = "update"> 
    </form>

    
</body>
</html>