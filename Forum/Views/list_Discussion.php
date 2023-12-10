<?php
include "../controller/discussionC.php";

$discussionC = new DiscussionC();
$discussions = $discussionC->listDiscussions();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Discussions</title>
</head>

<body>
    <header>
        <h1>List of Discussions</h1>
        <h2><a href="add_Discussion.php">Add Discussion</a></h2>
    </header>

    <table border="1" align="center" width="70%">
        <head>
            <tr>
                <th>id_discussion</th>
                <th>titre</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </head>
        <body>
            <?php foreach ($discussions as $discussion) : ?>
                <tr>
                    <td align="center"><?= $discussion['id_discussion']; ?></td>
                    <td align="center"><?= $discussion['titre']; ?></td>
                    <td align="center">
                        <form method="POST" action="update_Discussion.php">
                            <input type="submit" name="update" value="Update">
                            <input type="hidden" value="<?= $discussion['id_discussion']; ?>" name="id_discussion">
                        </form>
                    </td>
                    <td>
                        <a href="delete_Discussion.php?id_discussion=<?php echo $discussion['id_discussion']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </body>
    </table>
</body>

</html>
