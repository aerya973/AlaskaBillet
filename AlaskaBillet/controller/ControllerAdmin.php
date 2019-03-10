<?php
session_start();
require_once 'controller/ControllerBase.php';

class ControllerAdmin extends ControllerBase
{
    private $_admin;

    public function __construct()
    {
        $this->Loadconfig();
    }

    //METHOD GENERATE AUTHENTIFICATION VIEW 
    public function Admin()
    {
        if ($this->verifyAdmin()) {
            $this->ShowArticles();
        } else {
            $this->_view = new View('Admin');
            $this->_view->generate(array('imgPath' => $this->_config->rootPath . 'assets/'));
        }
    }
    // GET PARAM FROM FORM CALL ADMIN MANAGER 
    public function Authentification($param)
    {
        $this->_adminManager = new AdminManager;
        // ADMIN EQUAL TO METHOD LOGIN RETURN TRUE/FALSE 
        $admin = $this->Login();
        return $admin;
    }
    // VERIFY IN DATABASE IF ADMIN MATCH
    public function Login()
    {
        if ((!empty($_POST['user_name'])) && (!empty($_POST['user_pass']))) {
            $user = $_POST['user_name'];
            $pass = $_POST['user_pass'];
            // GET INFO FROM FORM AND CALL MANAGER METHOD isAdmin()
            $admin = $this->_adminManager->isAdmin($user, $pass);
            // IF ADMIN IS DIFFERENT FROM FALSE OPEN SESSION $admin AND CALL METHOD ShowArticles() ELSE ERROR MSG
            if ($admin != false) {
                $_SESSION['user'] = $admin;
                header('Location: ' . $this->_config->rootPath . 'Admin/ShowArticles');
            } else {
                throw new ErrorMsg("Le nom d'utilisateur ou le mot de passe n'est pas correct");
            }
        } else {
            throw new ErrorMsg("Un des champs est vides");
        }
    }

//CRUD GESTION //

//ADMINISTRATION PAGE
    public function ShowArticles()
    {
        if ($this->verifyAdmin()) {
            // IF ADMIN, GET ALL ARTICLES FROM MODELMANAGER METHOD GET ALL
            $this->_articleManager = new ArticleManager;
            $listeArticle = $this->_articleManager->getAll();
            $this->_view = new View('AdminOk');
            // GENERATE ADMINOK VIEW WITH ALL ARTICLES 
            $this->_view->generate(array('listeArticle' => $listeArticle, 'imgPath' => $this->_config->rootPath . 'assets/'));
        } else {
            header('Location: ' . $this->_config->rootPath . 'Admin/Admin');
        }
    }

// GET ONE POST
    public function ShowArticle($param)
    {
        if ($this->verifyAdmin()) {
            $this->_articleManager = new ArticleManager;
            $oneArticle = $this->_articleManager->getOne($param['id']);
            $this->_view = new View('Edit');
            $this->_view->generate(array('oneArticle' => $oneArticle, 'imgPath' => $this->_config->rootPath . 'assets/'));
        } else {
            header('Location: ' . $this->_config->rootPath . 'Admin/Admin');
        }
    }

// CONTROL FORM AND REQUEST EDIT
    public function ShowEdit($param)
    {
        if ($this->verifyAdmin()) {
            $target_dir = "assets/";
            $target_file = $target_dir . basename($_FILES["img"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if (isset($param['editSubmit'])) {

                if (isset($param['title'], $param['content'])) {
                    $id = $param['id'];
                    $title = htmlspecialchars($param['title']);
                    $content = $param['content'];
                    $this->_articleManager = new ArticleManager;

                    if ($_FILES["img"]["size"] > 0) {
                        $check = getimagesize($_FILES["img"]["tmp_name"]);
                        if ($check !== false) {
                            $uploadOk = 1;
                        } else {
                            throw new ErrorMsg("Le fichier n'est pas une image");
                            $uploadOk = 0;
                        }
                        $image = $_FILES["img"]["name"];

                        if (isset($image)) {
                            $this->_articleManager->edit($param['id'], $title, $content, $image);
                        }

                        if ($uploadOk == 0) {
                            throw new ErrorMsg("Le fichier n'est pas une image");
                        } else {

                            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                                $this->Alert("Votre fichier " . basename($_FILES["img"]["name"]) . " a été téléchargé.", 'success');
                            } else {
                                throw new ErrorMsg("Désolé, une erreur s'est produite lors de l'envoi de votre fichier.");
                            }
                        }
                    } else {

                        if ($this->_articleManager->edit($param['id'], $title, $content, null)) {
                            $this->Alert('Le contenu a bien ete edite', 'success');
                        } else {
                            throw new ErrorMsg('Il y a eu un probleme lors de l\'envoi de votre article');
                        }
                    }
                }
            }
            $this->ShowArticles();
        } else {
            header('Location: ' . $this->_config->rootPath . 'Admin/Admin');
        }
    }

    // CALL NEW VIEW ADD FROM VIEWADMINOK
    public function ShowAdd()
    {
        if ($this->verifyAdmin()) {
            $this->_view = new View('Add');
            $this->_view->generate(array());
        } else {
            header('Location: ' . $this->_config->rootPath . 'Admin/Admin');
        }
    }
    // GET PARAM FROM ShowAdd FORM 
    public function AddArticle($param)
    {
        if ($this->verifyAdmin()) {
            // TARGET DIRECTORY TO UPLOAD TARGET FILE
            $target_dir = "assets/";
            // TARGET DIRECTORY + NAME OF FILE FROM FORM
            $target_file = $target_dir . basename($_FILES["img"]["name"]);
            $uploadOk = 1;
            // GET IMAGE TYPE
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if (isset($param['addSubmit'])) {

                if (isset($param['title'], $param['content'])) {
                    // HERE WE ADD TITLE AND CONTENT FROM FORM
                    $title = htmlspecialchars($param['title']);
                    $content = $param['content'];
                    $this->_articleManager = new ArticleManager;
                    // IF IMAGE SIZE IS GREATER THAN ZERO WE GET IMG SIZE INFO RETURN TRUE OR FALSE
                    if ($_FILES["img"]["size"] > 0) {
                        $check = getimagesize($_FILES["img"]["tmp_name"]);
                        if ($check !== false) {
                            $uploadOk = 1;
                        } else {
                            throw new ErrorMsg("Le fichier n'est pas une image");
                            $uploadOk = 0;
                        }
                        $image = $_FILES["img"]["name"];
                        // IF ISSET IMG CALL METHOD WITH TREE PARAMETER (TITLE,CONTENT,IMAGE)
                        if (isset($image)) {
                            $this->_articleManager->add($title, $content, $image);
                        }

                        if ($uploadOk == 0) {
                            throw new ErrorMsg("Désolé, votre fichier n'a pas été téléchargé.");
                        } else {
                            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                                $this->Alert("Votre fichier " . basename($_FILES["img"]["name"]) . " a été téléchargé.", 'success');
                            } else {
                                throw new ErrorMsg(" Désolé, une erreur s'est produite lors de l'envoi de votre fichier.", 'success');
                            }
                        }
                    // IF IMG IS SMALLER THAN ZERO CALL METHOD ADD WITH TREE PARAMETER BUT IMG NULL
                    } else {
                        if ($this->_articleManager->add($title, $content, null)) {
                            $this->Alert("Mise a jour effectuee", 'success');
                        } else {
                            throw new ErrorMsg("Erreur.");
                        }
                    }
                }
            }
            $this->ShowArticles();
        } else {
            header('Location: ' . $this->_config->rootPath . 'Admin/Admin');
        }
    }

    public function deleteArticle($param)
    {
        if ($this->verifyAdmin()) {
            if (isset($param['deletePost'])) {
                $this->_articleManager = new ArticleManager;

                if ($this->_articleManager->delete($param['id'])) {
                    $this->Alert('Mise a jour effectuee', 'success');
                } else {
                    throw new ErrorMsg("Erreur.");
                }
            }
            $this->ShowArticles();
        } else {
            header('Location: ' . $this->_config->rootPath . 'Admin/Admin');
        }
    }

    public function logOut()
    {
        if ($this->verifyAdmin()) {
            session_destroy();
            header('Location: ' . $this->_config->rootPath . 'Article/Articles');
        }
    }
}
