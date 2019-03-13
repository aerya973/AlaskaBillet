<?php
require_once 'controller/ControllerBase.php';

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
            throw new ErrorMsg('Vous n\'êtes pas Admin');
        }
    }

    public function deleteComment($param)
    {
        if ($this->verifyAdmin()) {
            if (isset($param['deleteComm'])) {
                $this->_commentManager = new CommentManager();
                if ($this->_commentManager->delete($param['id'])) {
                    $this->Alert('Le commentaire a bien été supprimé', 'success');
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
                    $controllerArticle = new ControllerArticle();
                    $this->Alert('Les commentaires ont bien été chargés', 'success');
                    $controllerArticle->Articles();
                } else {
                    throw new ErrorMsg("Une erreur est survenue lors de l'envoi du commentaire.");
                }
            } else {
                throw new ErrorMsg("Veuillez remplir tous les champs");
            }
        }
    }

    public function signalComment($param)
    {
        if (isset($param['signaler'])) {
            $id = $param['id'];
            $nbSignal = $param['nbSignal'] + 1;
            $this->_commentManager = new CommentManager();
            if ($this->_commentManager->update($nbSignal, $id)) {
                $controllerArticle = new ControllerArticle();
                $this->Alert('Les commentaires ont bien été signalés', 'success');
                $controllerArticle->Articles();
            } else {
                throw new ErrorMsg('Erreur lors du signalement du commentaire');
            }
        }
    }
}
