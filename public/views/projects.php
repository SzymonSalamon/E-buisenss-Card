
<head>
  <link rel="stylesheet" type="text/css" href="public/style/index_style.css">
  <link rel="stylesheet" type="text/css" href="public/style/projects_style.css">
    <link rel="stylesheet" type="text/css" href="public/style/e_card_style.css">
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <script type="text/javascript" src="./public/js/searchMyProject.js" defer></script>
    <script type="text/javascript" src="./public/js/lock_orientation.js" async></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <title>Project Page</title>
</head>
<body>
<?php
session_start();
?>
<div class="Up">
  <div class="logo">
      <?php
      if ($_SESSION['privilage']== 'admin') {
          echo '<a href="adminpanel">';
      }
      ?>
    <img src="public/style/Icons/id_icon.svg" alt= "id_icon" />
      <?php
      if ($_SESSION['privilage']== 'admin') {
          echo '</a>';
      }
      ?>
  </div>
    <header>
        <div class="search-bar">
                <input placeholder="search project">
        </div>
        <a href="addProject" class="add-project">
            add project
        </a>
        <a href="logout" class="logout">
            <img src="public/style/Icons/exit.svg" alt="exit"/>
        </a>
    </header>
</div>
<div class="down">
  <div class="menu">
  </div>
  <div class="tlo">
      <div class="workspace">
          <section class="projects">
              <?php foreach ($projects as $project):
                  ?>
                  <div class="project_container">
                      <div class="container">
                          <div class="e-card">
                              <div class="front" style="background-color:<?= $project->getBackground(); ?>">
                                  <div class="Leftcard">
                                      <div class="inclogo">
                                          <img src="public/uploads/<?= $project->getImage(); ?>">
                                          <div class="company"><?= $project->getCompany()?></div>
                                      </div>
                                      <div class="description">
                                          <?= $project->getDescription()?>
                                      </div>
                                      <div class="skills"><?= $project->getSkill()?></div>
                                  </div>
                                  <div class="rightcard">
                                      <div class="name"><?= $project->getSurname()?><br><?= $project->getName()?></div>
                                  </div>
                              </div>
                              <div class="back" style="background-color:<?= $project->getBackground(); ?>">
                                  <div class="inclogo">
                                      <img src="public/uploads/<?= $project->getImage(); ?>">
                                      <div class="short">
                                          <?= $project->getCompany()?><br>
                                          <?= $project->getSurname()?> <br>
                                          <?= $project->getName()?>
                                      </div>
                                  </div>
                                  <div class="info">
                                      <div class="phone">
                                          <img src="public/style/Icons/Phone.svg">
                                          <div class="phonenumber"><?= $project->getPhone()?></div>
                                      </div>
                                      <div class="email">
                                          <img src="public/style/Icons/Email.svg">
                                          <div class="emailvalue"><?= $project->getEmail()?></div>
                                      </div>
                                      <div class="web">
                                          <img src="public/style/Icons/Web.svg">
                                          <div class="wwwvalue"><?= $project->getSite()?></div>
                                      </div>
                                      <div class="location">
                                          <img src="public/style/Icons/Pin.svg">
                                          <div class="locationvalue"><?= $project->getLocation()?></div>
                                      </div>
                                  </div>
                                  <div class="logos">
                                      <a id="FB" href="<?= $project->getFb()?>"target=”_blank”><img src="public/style/Icons/Facebook.svg"></a>
                                      <a id="Insta" href="<?= $project->getInsta()?>"target=”_blank”><img src="public/style/Icons/Instagram.svg"></a>
                                      <a id="LinkIn" href="<?= $project->getLinked()?>"target=”_blank”><img src="public/style/Icons/Linkedin.svg"></a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              <?php endforeach;?>
          </section>
      </div>
  </div>
</div>
</body>

<template id="project-template">
    <div class="project_container">
        <div class="container">
            <div class="e-card">
                <div class="front">
                    <div class="Leftcard">
                        <div class="inclogo">
                            <img src="public/uploads/<?= $project->getImage(); ?>">
                            <div class="company"><?= $project->getCompany()?></div>
                        </div>
                        <div class="description">
                            <?= $project->getDescription()?>
                        </div>
                        <div class="skills"><?= $project->getSkill()?></div>
                    </div>
                    <div class="rightcard">
                        <div class="name"><?= $project->getSurname()?><br><?= $project->getName()?></div>
                    </div>
                </div>
                <div class="back">
                    <div class="inclogo">
                        <img src="public/uploads/<?= $project->getImage(); ?>">
                        <div class="short">
                            <?= $project->getCompany()?><br>
                            <?= $project->getSurname()?> <br>
                            <?= $project->getName()?>
                        </div>
                    </div>
                    <div class="info">
                        <div class="phone">
                            <img src="public/style/Icons/Phone.svg">
                            <div class="phonenumber"><?= $project->getPhone()?></div>
                        </div>
                        <div class="email">
                            <img src="public/style/Icons/Email.svg">
                            <div class="emailvalue"><?= $project->getEmail()?></div>
                        </div>
                        <div class="web">
                            <img src="public/style/Icons/Web.svg">
                            <div class="wwwvalue"><?= $project->getSite()?></div>
                        </div>
                        <div class="location">
                            <img src="public/style/Icons/Pin.svg">
                            <div class="locationvalue"><?= $project->getLocation()?></div>
                        </div>
                    </div>
                    <div class="logos">
                        <a  href="<?= $project->getFb()?>"target=”_blank”><img src="public/style/Icons/Facebook.svg"></a>
                        <a  href="<?= $project->getInsta()?>"target=”_blank”><img src="public/style/Icons/Instagram.svg"></a>
                        <a  href="<?= $project->getLinked()?>"target=”_blank”><img src="public/style/Icons/Linkedin.svg"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<template id="puzzle" >
    <form method="POST" action="editProject" ENCTYPE="multipart/form-data">
        <input class="hidden" type="hidden" name="hidden_id">
        <button type="submit" class="box">
    <div class="myProject"></div>
        </button>
    </form>
</template>