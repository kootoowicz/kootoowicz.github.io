<?php
/**
 * Author: Kotowicz 17018747
 */
require_once 'Core/init.php';

class TopicView
{
    private TopicModel $_topicModel;
    private TopicController $_topicController;


    /**
     * TopicView constructor.
     * @param TopicModel $_topicModel
     * @param TopicController $_topicController
     */
    public function __construct(TopicModel $_topicModel, TopicController $_topicController)
    {
        $this->_topicModel = $_topicModel;
        $this->_topicController = $_topicController;
    }

    public function displayCurrentView()
    {
        switch($this->_topicController->getCurrentViewName())
        {
            case 'displayCreateTopicForm':
                return $this->displayCreateTopicForm();
                break;
            case 'displayTopic':
                return $this->displayTopic();
                break;
            default:
                return "";
        }
    }

    public function displayCreateTopicForm() : string
    {
        return " <form class='topicForm' method='post' action=''>
           <label for='topicName' class='topicName'>Topic Name</label>
           <br/>
           <input type='text' class='inputField topicNameField' name='topicName' id='topicName'/>
           <br/>
           <br/>
           <label for='topicContent'></label>
           <textarea name='topicContent' class='topicTextArea' id='topicContent'></textarea>
           <br/>
           <br/>
           <input type='submit' name='cancelPost' value='Cancel'/>
           <input type='submit' name='submitTopic' value='Submit Topic'/>
       </form>";
    }

    public function displayCreatePostForm() : string
    {
        if($this->_topicController->createPost())
        {
            return " <form class='form' method='post' action=''>
                        <textarea class='postTextArea' name='postContent' id='postContent' rows='4' cols='50'></textarea>
                        <br/>
                        <br/>         
                        <input type='submit' name='submitPost' value='Submit Reply'/>
                     </form>";
        }

        return "";
    }

    public function displayQuotePostForm() : string
    {
        if($this->_topicController->quotePost())
        {
            $postContent = Session::get('quotedPost');
            $quotedUser = Session::get('quotedUser');
            Session::delete('quotedPost');
            Session::delete('quotedUser');
            return " <form class='form' method='post' action=''>
                        <textarea class='postTextArea' name='postContent' id='postContent'>$quotedUser wrote: \"$postContent\"</textarea>                       
                        <br/>
                        <br/>         
                        <input type='submit' name='submitPost' value='Submit Reply'/>
                     </form>";
        }

        return "";
    }

    public function displayTopic() : string
    {

        $topicName = "<h1 class='topicName'>{$this->_topicModel->getTopicName()}</h1>";
        $topicMakePostButton = "<form method='post' action=''>
                                    <input class='createPostButton' type='submit' name='createPost' value='Reply to this topic' />
                                </form>";
        $this->_topicModel->initialisePosts();
        $posts = $this->_topicModel->getTopicPosts();

        $topicPost = "";


        for($i = 0; $i < sizeof($posts); $i++)
        {

            $post = $posts[$i];
            $user = $posts[$i]->getUser();


            $topicPost .= "<section class='box'>
              <section class='post'>
                  <article class='userBox'>
                      <div class='username'>{$user->getUsername()}</div>
                      <div class='centeredPhoto'><img class='userPicture' src='Images/{$user->getPhotoName()}' alt='U'></div>
                      <div class='userGroup'>{$user->getGroupModel()->getGroupName()}</div>
                      <div class='userJoined'>{$user->getJoined()->format('d/M/Y')}</div>
                  </article>
    
                  <article class='postContent'>
                      <div class='postDatePosted'>Posted on: {$post->getReplyDate()->format('d/M/Y')}</div>
                      <form  method='post' action=''>
                               <input type='hidden' name='postUser' value='{$post->getUser()->getUsername()}'/>
                               <input type='hidden' name='postContent' value='{$post->getContent()}'/>
                               <input class='quote' type='submit' name='quotePost' value='Quote' />
                      </form>
                      <div class='content'>{$post->getContent()}</div>
                  </article>
              </section>
           </section>";
        }

        return $topicName . $topicMakePostButton .= $topicPost;
    }
}