<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Front Page</title>
    <!-- Add your CSS styles here -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .discussion-container {
            max-width: 800px;
            margin: 20px auto;
        }
        .discussion {
            border: 1px solid #ddd;
            margin-bottom: 10px;
            padding: 10px;
        }
        .comment {
            margin-left: 20px;
            padding: 5px;
            background-color: #f9f9f9;
        }
        .comment-form,
        .discussion-form {
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
    </style>
</head>
<body>

<div class="discussion-container">

    <?php
    require_once 'C:/xampp/htdocs/Forum/Controller/discussionC.php';
    require_once 'C:/xampp/htdocs/Forum/Controller/commentaireC.php';

    $discussionC = new DiscussionC();
    $commentaireC = new CommentaireC();

    // Get the list of discussions
    $discussions = $discussionC->listDiscussions();

    foreach ($discussions as $discussion) {
        // Display discussion details
        echo '<div class="discussion">';
        echo '<h2><strong>' . $discussion['titre'] . '</strong></h2>';

        // Get comments for the discussion
        $comments = $commentaireC->getCommentairesByIdDiscussion($discussion['id_discussion']);

        foreach ($comments as $comment) {
            // Display comments
            echo '<div class="comment">';
            echo '<p><strong>User ID: </strong>' . $comment['user_id'] . '</p>';
            echo '<p>' . $comment['contenu'] . '</p>';
            echo '</div>';
        }

        // Comment Form for each discussion
        echo '<h3><a href="add_Commentaire.php">Add Comment</a></h2>';

        echo '</div>';
    }
    ?>

</div>
<!-- Discussion Form -->
<div class="discussion-form">
    <h2 align="center"><a href="add_Discussion.php">Add Discussion</a></h2>
</div>

</body>
</html>
