<?php
include_once('../private/initialize.php');

$title = 'Register';
include_once(SHARED_PATH . '/header.php');

if(is_post_request()) {
    $bad_topic = $_POST["users"];
    // sanitize values 
    $topic = Classes\User::sanitize_all($bad_topic);
    
    $topicObj = new Classes\User($topic);

    if ($topicObj->login()) redirect_to('index.php');
};
if (!isset($topicObj)) $topicObj = new Classes\User();
?>
<main id="login">
    <h1>login</h1>
    <?php 
        echo $topicObj->display_errors();
        echo Classes\User::get_login_form(["username"=>$topic["username"] ?? ""], false); 
    ?>
</main>


<?php include_once(SHARED_PATH . '/footer.php'); ?>