<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="/public/css/main.css">
    <link rel="stylesheet" type="text/css" href="/public/css/conversation.css">

    <script type="text/javascript" src="/public/js/img-default.js" defer></script>
    <script type="text/javascript" src="/public/js/messages.js" defer></script>
    <script src="https://kit.fontawesome.com/3010d94d2f.js" crossorigin="anonymous"></script>

    <title>User list</title>
</head>
<body>
<div class="base-container">

    <?php include('components/navigation.php') ?>

    <main class="main">

        <h2 class="header title">Conversations</h2>

        <?php if (isset($selected)) { ?>
            <div class="communicator-container">
                <div class="friend-list">
                    <?php if ($conversations != null) {
                        foreach ($conversations as $conv) { ?>

                            <form class="single" action="conversation" method="post">

                                <input name="userId" type="hidden" value="<?= $conv->getUserId() ?>">

                                <img src="public/uploads/<?= $conv->getImage() ?>" alt="user avatar" class="friend-img">

                                <div class="inner-friend-list">
                                    <p><?= $conv->getUsername() ?></p>
                                    <button class="msg-btn" type="submit"><i class="far fa-envelope"></i></button>
                                </div>

                            </form>

                            <hr class="solid">

                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="friend">

                    <div class="inside-friend">

                        <form class="friend-details" action="profile/<?= $selected->getUsername() ?>" method="post">
                            <img src="public/uploads/<?= $selected->getImage() ?>" alt="user avatar" class="friend-img">
                            <p class="friend-name"><?= $selected->getUsername() ?></p>
                            <button type="submit" class="btn profile-btn">Profile</button>
                        </form>

                        <div class="message-box">
                            <div class="messages">

                                <?php if ($messages != null) {
                                    foreach ($messages as $message) { ?>

                                        <div class="msg-container">
                                            <?php if (!$message->isSendByFriend()) { ?>

                                                <div class="self-msg">
                                                    <p><?= $message->getMessage() ?></p>
                                                </div>

                                                <img src="public/uploads/<?= $user->getImage() ?>" alt="user avatar"
                                                     class="small-img">

                                            <?php } else { ?>

                                                <img src="public/uploads/<?= $selected->getImage() ?>" alt="user avatar"
                                                     class="small-img">

                                                <div class="friend-msg">
                                                    <p><?= $message->getMessage() ?></p>
                                                </div>

                                            <?php } ?>
                                        </div>

                                    <?php } ?>
                                <?php } ?>

                            </div>

                            <div class="message">
                                <input type="hidden" name="conversationId" value="<?= $selected->getId() ?>">
                                <input type="text" name="message" class="msg-input">
                                <button id="send-btn" class="btn">Send</button>
                            </div>

                            <input type="hidden" name="userImage" value="<?= $user->getImage() ?>">
                            <input type="hidden" name="friendImage" value="<?= $selected->getImage() ?>">
                        </div>
                    </div>

                </div>
            </div>
        <?php } else { ?>
            <h2>You have no conversations started.</h2>
        <?php } ?>
    </main>
</div>
</body>
<?php include('templates/message-model.php') ?>
