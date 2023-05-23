<html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Course</title>
</head>
<body>
    <p> Do You Want To Delete This Course <b><?= $course->getName();?></b>?</p>
    <form method="post" action="course_delete">
        <input type="hidden" name="id" value="<?= $course->getId()?>">
        <input type="submit" name="yes" value="Yes">
        <input type="submit" name="no" value="No">
    </form>
</body>
</html>