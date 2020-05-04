<?php
/**
 * Author: Kotowicz 17018747
 */
require_once 'Core/init.php';

class TopicController
{
    private TopicModel $_topicModel;
    private string $_currentViewName;
    /**
     * TopicController constructor.
     * @param TopicModel $_topicModel
     */
    public function __construct(TopicModel $_topicModel)
    {
        $this->_topicModel = $_topicModel;
    }

    public function submitTopic()
    {
        if(!empty($_POST["submitTopic"]))
        {
            $validate = $this->validateTopicForm();

            if ($validate->succeeded())
            {
                $postModel = new PostModel();
                $this->_topicModel->setTopicName(Input::get('topicName'));
                $postModel->setContent(Input::get('topicContent'));


                if($this->_topicModel->insertTopic($postModel))
                {
                    $this->_currentViewName = 'displayTopic';
                }
                else
                {
                    Redirect::redirectTo(404);
                }
            }
            else
            {
                foreach ($validate->getErrors() as $error)
                    echo $error, '<br/>';
            }
        }
        else if(!empty($_POST["cancelTopic"]))
        {
            Redirect::redirectTo();
        }
    }

    public function createPost() : bool
    {
        if(!empty($_POST["createPost"]))
        {
            $user = UserModel::getLoggedInUser();

            if(!$user->isLoggedIn())
            {
                //Redirect::redirectTo('login.php');
            }
            else
                return true;
        }

        return false;
    }

    public function quotePost()
    {
        if(!empty($_POST["quotePost"]))
        {
            $user = UserModel::getLoggedInUser();

            if(!$user->isLoggedIn())
                Redirect::redirectTo('login.php');
            else
                return true;

            Session::put("quotedPost", Input::get('postContent'));
            Session::put("quotedUser", Input::get('postUser'));
            return true;
        }

        return false;
    }

    public function submitPost()
    {
        if(!empty($_POST["submitPost"]))
        {
            $validate = $this->validateTopicPostForm();

            if ($validate->succeeded())
            {
                $postModel = new PostModel();
                $user = UserModel::getLoggedInUser();
                $postModel->setContent(Input::get('postContent'));
                $postModel->setTopicId($this->_topicModel->getId());
                $postModel->setUser($user);


                if($this->_topicModel->insertPost($postModel))
                {
                    unset($_POST["createPost"]);
                    Redirect::redirectTo("topic.php?topicId={$this->_topicModel->getId()}");
                }
                else
                {
                    Redirect::redirectTo(404);
                }
            }
            else
            {
                foreach ($validate->getErrors() as $error)
                    echo $error, '<br/>';
            }
        }
    }

    private function validateTopicForm()
    {
        $validation = new Validation();

        return $validation->check($_POST, array(
            'topicName' => array(
                'required' => true,
                'min' => 3,
                'max' => 50,
            ),
            'topicContent' => array(
                'required' => true,
                'min' => 15,
                'max' => 9999,
            )
        ));
    }

    private function validateTopicPostForm()
    {
        $validation = new Validation();

        return $validation->check($_POST, array(
            'postContent' => array(
                'required' => true,
                'min' => 10,
                'max' => 9999,
            )
        ));
    }

    /**
     * @return string
     */
    public function getCurrentViewName(): string
    {
        return $this->_currentViewName;
    }

    /**
     * @param string $currentViewName
     */
    public function setCurrentViewName(string $currentViewName): void
    {
        $this->_currentViewName = $currentViewName;
    }

    /**
     * @param array $views
     */
    public function setViews(array $views): void
    {
        $this->_views = $views;
    }

}