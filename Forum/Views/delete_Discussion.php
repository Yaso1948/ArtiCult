<?php
include '../Controller/discussionC.php';
$discussionC = new DiscussionC();
$discussionC->deleteDiscussion($_GET["id_discussion"]);
header('Location: list_Discussion.php');
?>
