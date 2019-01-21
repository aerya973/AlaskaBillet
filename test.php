public function AddArticle($param)
  {

    if($this->verifyAdmin())
    {


      $target_dir = "assets/";
      $target_file = $target_dir . basename($_FILES["img"]["name"]);
      $uploadOk = 1;
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

      if(isset($param['addSubmit']))
      {
        $check = getimagesize($_FILES["img"]["tmp_name"]);

        if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          echo "File is not an image.";
          $uploadOk = 0;
        }

        if(isset($param['title'], $param['content'], $param['img']))
        {
          $title = $param['title'];
          $content = $param['content'];
          $image = $param['img'];
          $this->_articleManager = new ArticleManager;
          if($this->_articleManager->add($title, $content, $image))
          {
            echo "Mise a jour effectuee";
          } else
          {
            echo "erreur";
          }
        }
      }
    $this->ShowArticles();



    } else
    {
      header('location: '.$this->_config->rootPath.'Admin/Admin');
    }
  }
