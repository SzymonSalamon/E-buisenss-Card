
<head>
  <link rel="stylesheet" type="text/css" href="public/style/index_style.css">
  <link rel="stylesheet" type="text/css" href="public/style/projectadd_style.css">
    <link rel="stylesheet" type="text/css" href="public/style/e_card_style.css">

    <script type="text/javascript" src="./public/js/dynamic_proj.js" defer></script>
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
              <form action="addProject" method="POST" ENCTYPE="multipart/form-data">
                  <div class="messages">
                      <?php
                      if(isset($messages)){
                          foreach($messages as $message) {
                              echo $message;
                          }
                      }
                      ?>
                  </div>
                  <input name="title" type="text" placeholder="title">
                  <textarea name="description" rows=5 placeholder="description"></textarea>
                  <textarea name="skills" rows=5 placeholder="skills & references"></textarea>
                  <input type="text" placeholder="name" name="name">
                  <input type="text" placeholder="surname" name="surname">
                  <input type="text" placeholder="company_name" name="company">
                  <p>Logo:</p>
                  <input type="file" name="file" id="fileInput">
                  <input type="color" placeholder="colorhex(EF7532)" name="color">
                  Second Page:
                  <input type="number" placeholder="123456789" name="phone">
                  <input type="text" placeholder="yourmail@gmail.com" name="email">
                  <input type="text" placeholder="www.site.com" name="www">
                  <input type="text" placeholder="00-000 Warsaw Street Name 12/37" name="location">
                  <input type="url" placeholder="Facebook Link" name="FbLink">
                  <input type="url" placeholder="Instagram Link" name="InstagramLink">
                  <input type="url" placeholder="LinkedIn Link" name="LinkedInLink">
                  <button type="submit">
                      <span>Send</span>
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
                          <img class="image" src="public/style/Icons/id_icon.svg">
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
                          <img class="image" src="public/style/Icons/id_icon.svg">
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