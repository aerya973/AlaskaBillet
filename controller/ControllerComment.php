<?php
session_start();
require_once 'controller/ControllerBase.php';

// "Colle entre la vue et modele"
class ControllerComment extends ControllerBase
{

    public $_commentManager;

    public function __construct()
    {
        $this->Loadconfig();
    }

    public function ShowComments()
    {
        if ($this->verifyAdmin()) {
            $this->_commentManager = new CommentManager();
            $listeComm = $this->_commentManager->getAllComments();
            $this->_view = new View('Comment');
            $this->_view->generate(array('listeComm' => $listeComm));
        } else {
            throw new ErrorMsg('Vous n\'etes pas Admin');
        }
    }

    public function deleteComment($param)
    {
        if ($this->verifyAdmin()) {
            if (isset($param['deleteComm'])) {
                $this->_commentManager = new CommentManager();
                if ($this->_commentManager->delete($param['id'])) {
                    $this->Alert('Le commentaire a bien ete supprime', 'success');
                } else {
                    throw new ErrorMsg("Erreur lors de la suppression du commentaire");
                }
            }
            $this->ShowComments();
        }
    }

    public function addComment($param)
    {
        if (isset($param['CommentSubmit'])) {
            if (!empty($param['author']) && (!empty($param['content']))) {
                $articleId = $param['articleId'];
                $author = $param['author'];
                $content = $param['content'];
                $this->_commentManager = new CommentManager();

                if ($this->_commentManager->add($author, $content, $articleId)) {
                    header('Location: ' . $this->_config->rootPath . 'Article/Articles');
                // ALERTE A INTEGRER SUR LA PAGE Article/Articles QUI NE FONCTIONNE PAS
                    // $this->Alert('Les articles ont bien ete charges', 'success');
                } else {
                    throw new ErrorMsg("Une erreur est survenue lors de l'envoi du commentaire.");
                }
            } else {
                throw new ErrorMsg("Veuillez remplir les tous les champs");
            }
        }
        // header('Location: ' . $this->_config->rootPath . 'Article/Articles');
    }

    public function signalComment($param)
    {
        if (isset($param['signaler'])) {
            $id = $param['id'];
            $nbSignal = $param['nbSignal'] + 1;
            $this->_commentManager = new CommentManager();
            if ($this->_commentManager->update($nbSignal, $id)) {
                header('Location: ' . $this->_config->rootPath . 'Article/Articles');
                $this->Alert('Les articles ont bien ete charges', 'success');
            } else {
                throw new ErrorMsg('Erreur lors du signalement du commentaire');
            }
        }
    }
}
