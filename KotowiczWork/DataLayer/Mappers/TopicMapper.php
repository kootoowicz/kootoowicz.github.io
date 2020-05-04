<?php
/**
 * Author: Kotowicz 17018747
 */
require_once 'Core/init.php';
define("TOPICS_TABLE_NAME", "topics");
define("POSTS_TABLE_NAME", "posts");

class TopicMapper
{
    private Database $_db;
    private UserMapper $_userMapper;

    /**
     * TopicMapper constructor.
     */
    public function __construct(UserMapper $userMapper)
    {
        $this->_db = Database::getInstance();
        $this->_userMapper = $userMapper;
    }

    public function insertTopic(TopicModel $topicModel, PostModel $post)
    {
        $pdo = $this->_db->getPDO();
        $pdo->beginTransaction();
        try {
            $topicFields = array(
                'Name' => $topicModel->getTopicName(),
                'Created' => date('Y-m-d H:i:s'),
                'CategoryId' => $topicModel->getCategoryId(),
                'UserId' => $topicModel->getUser()->getId(),
            );

            if (!$this->_db->insert(TOPICS_TABLE_NAME, $topicFields))
            {
                $pdo->rollBack();
                throw new Exception("There was a problem creating an topic.");
            }
            else
            {
                $topicId = $pdo->lastInsertId();
                $topicModel->setId($topicId);
                $postFields = array(
                    'Content' => $post->getContent(),
                    'ReplyDate' => date('Y-m-d H:i:s'),
                    'TopicId' => $topicId,
                    'UserId' => $topicModel->getUser()->getId()
                );

                if (!$this->_db->insert(POSTS_TABLE_NAME, $postFields))
                {
                    $pdo->rollBack();
                    throw new Exception("There was a problem creating an topic.");
                }

                $pdo->commit();
            }
        }
        catch(Exception $e)
        {
            $pdo->rollBack();
        }
    }

    public function insertPost(PostModel $post)
    {
        $postFields = array(
            'Content' => $post->getContent(),
            'ReplyDate' => date('Y-m-d H:i:s'),
            'TopicId' => $post->getTopicId(),
            'UserId' => $post->getUser()->getId()
        );

        if (!$this->_db->insert(POSTS_TABLE_NAME, $postFields))
        {
            throw new Exception("There was a problem creating an post.");
        }
    }

    public function loadPostsByTopic(int $topicId)
    {
        $postsTable = POSTS_TABLE_NAME;
        $db = $this->_db->getPDO();
        try {
            $sqlQuery = "SELECT * FROM {$postsTable} WHERE TopicId = {$topicId}";

            $stmt = $db->prepare($sqlQuery);
            $queryResult = $stmt->execute();

            $posts = array();
            if($queryResult)
            {
                while($rowObj = $stmt->fetchObject())
                {
                    $post = new PostModel();
                    $userModel = $this->_userMapper->loadUserById($rowObj->UserId);
                    $post->create(
                        $rowObj->Id,
                        $rowObj->Content,
                        date_create_from_format('Y-m-d', $rowObj->ReplyDate),
                        $topicId,
                        $userModel
                    );
                    array_push($posts, $post);
                }
                return $posts;
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
            throw new Exception("Couldn't load topic posts");
        }
    }

    public function loadTopicsByCategory(int $categoryId) : array
    {
        $topicsTable = TOPICS_TABLE_NAME;
        $db = $this->_db->getPDO();
        try {
            $sqlQuery = "SELECT * FROM {$topicsTable} WHERE CategoryId = {$categoryId}";

            $stmt = $db->prepare($sqlQuery);
            $queryResult = $stmt->execute();

            $topics = array();
            if($queryResult)
            {
                while($rowObj = $stmt->fetchObject())
                {
                    $topic = new TopicModel($rowObj->CategoryId, $this->_userMapper->loadUserById($rowObj->UserId));
                    $topic->setId($rowObj->Id);
                    $topic->setDateTopicCreated(date_create_from_format('Y-m-d', $rowObj->Created));
                    $topic->setTopicName($rowObj->Name);
                    array_push($topics, $topic);
                }
                return $topics;
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
            throw new Exception("Couldn't load topics");
        }
    }

    public function loadTopicById(int $id) : TopicModel
    {
        $data = $this->_db->get(TOPICS_TABLE_NAME, array('Id', '=', $id));


        if($data->count()) {
            $dataTopic = $data->first();

            $topic = new TopicModel($dataTopic->CategoryId, $this->_userMapper->loadUserById($dataTopic->UserId));
            $topic->setId($dataTopic->Id);
            $topic->setDateTopicCreated(date_create_from_format('Y-m-d', $dataTopic->Created));
            $topic->setTopicName($dataTopic->Name);

            return $topic;
        }

        throw new Exception("Couldn't load topic topics");
    }
}