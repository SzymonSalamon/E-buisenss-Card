
<head>
  <link rel="stylesheet" type="text/css" href="public/style/index_style.css">
  <link rel="stylesheet" type="text/css" href="public/style/projectadd_style.css">
    <link rel="stylesheet" type="text/css" href="public/style/e_card_style.css">
    <script type="text/javascript" src="./public/js/dynamic_proj.js" defer></script>
    <script type="text/javascript" src="./public/js/loadproject.js" defer></script>
  <title>Project Page</title>
</head>
<body>
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
        </div>
       <a href="projects" class="add-project"> <div class="add-project">
            Back
           </div></a>
    </header>
</div>
<div class="down">
  <div class="tlo">
      <div class="workspace">
          <div class="left">
          <section class="project-form">
              <form action="editProject" method="POST" ENCTYPE="multipart/form-data" id="formularz">
                  <div class="messages">
                      <?php
                      if(isset($messages)){
                          foreach($messages as $message) {
                              echo $message;
                          }
                      }
                      ?>
                  </div>
                  <input name="title" type="text" placeholder="title" value="<?= $project->getTitle()?>">
                  <textarea name="description" rows=5 placeholder="description"><?= $project->getDescription()?></textarea>
                  <textarea name="skills" rows=5 placeholder="skills & references"><?= $project->getSkill()?></textarea>
                  <input type="text" placeholder="name" name="name"value="<?= $project->getName()?>">
                  <input type="text" placeholder="surname" name="surname" value="<?= $project->getSurname()?>">
                  <input type="text" placeholder="company_name" name="company" value="<?= $project->getCompany()?>">
                  <p>Logo:</p>
                  <input type="file" id="fileInput" name="file" value="public/uploads/<?= $project->getImage()?>">
                  <input type="text" placeholder="colorhex(EF7532)" name="color" value="<?= $project->getBackground()?>">
                  Second Page:
                  <input type="number" placeholder="123456789" name="phone" value="<?= $project->getPhone()?>">
                  <input type="text" placeholder="yourmail@gmail.com" name="email" value="<?= $project->getEmail()?>">
                  <input type="text" placeholder="www.site.com" name="www" value="<?= $project->getSite()?>">
                  <input type="text" placeholder="00-000 Warsaw Street Name 12/37" name="location" value="<?= $project->getLocation()?>">
                  <input type="url" placeholder="Facebook Link" name="FbLink" value="<?= $project->getFb()?>">
                  <input type="url" placeholder="Instagram Link" name="InstagramLink" value="<?= $project->getInsta()?>">
                  <input type="url" placeholder="LinkedIn Link" name="LinkedInLink" value="<?= $project->getLinked()?>">
                  <input type="hidden" name="hidden_id" value="<?= $_POST['hidden_id'] ?>">
                  <button type="submit">
                      <div class="svg-wrapper-1">
                          <div class="svg-wrapper">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                  <path fill="none" d="M0 0h24v24H0z"></path>
                                  <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
                              </svg>
                          </div>
                      </div>
                      <span>Send</span>
                  </button>
                  <br>
                  <button class="red" type="submit" onclick="document.getElementById('formularz').action='deleteProject'">
                      <div class="svg-wrapper-1">
                          <div class="svg-wrapper">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                  <path fill="none" d="M0 0h24v24H0z"></path>
                                  <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
                              </svg>
                          </div>
                      </div>
                      <span>Delete</span>
                  </button>
              </form>
          </section>
          </div>
          <div class="right">
              <div class="container">
              <div class="e-card">
                  <div class="front">
                      <div class="Leftcard">
                      <div class="inclogo">
                          <img class="image" src="/public/uploads/<?=$project->getImage()?>">
                          <div class="company">Company Name</div>
                      </div>
                      <div class="description">
                          Description about you and your company
                      </div>
                      <div class="skills">Skills and references</div>
                      </div>
                      <div class="rightcard">
                      <div class="name">Kowalski<br>Jan</div>
                      </div>
                  </div>
                  <div class="back">
                      <div class="inclogo">
                          <img class="image" src="/public/uploads/<?=$project->getImage()?>">
                          <div class="short">
                          Company Name<br>
                          Kowalski <br>
                          Jan
                          </div>
                      </div>
                      <div class="info">
                          <div class="phone">
                              <img src="public/style/Icons/Phone.svg">
                              <div class="phonenumber">+48 123456789</div>
                          </div>
                          <div class="email">
                              <img src="public/style/Icons/Email.svg">
                              <div class="emailvalue">youremail@gmail.com</div>
                          </div>
                          <div class="web">
                              <img src="public/style/Icons/Web.svg">
                              <div class="wwwvalue">www.yoursite.com</div>
                          </div>
                          <div class="location">
                              <img src="public/style/Icons/Pin.svg">
                              <div class="locationvalue">00-000 Warsaw Street Name 12/37</div>
                          </div>
                      </div>
                          <div class="logos">
                              <a id="FB" target=”_blank”><img src="public/style/Icons/Facebook.svg"></a>
                              <a id="Insta" target=”_blank”><img src="public/style/Icons/Instagram.svg"></a>
                              <a id="LinkIn" target=”_blank”><img src="public/style/Icons/Linkedin.svg"></a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          </div>
  </div>
</div>
</div>
</body>