<?php
/**
 * Author: Kotowicz 17018747
 */

class TopicModel
{
    private int $_id;
    private string $_topicName;
    private DateTime $_dateTopicCreated;
    private int $_categoryId;
    private IUserModel $_userModel;
    private TopicMapper $_topicMapper;
    private array $_topicPosts;

    /**
     * TopicModel constructor.
     * @param int $categoryId
     * @param IUserModel $userModel
     */
    public function __construct(int $categoryId, IUserModel $userModel)
    {
        $this->_categoryId = $categoryId;
        $this->_userModel = $userModel;
    }

    public function initialisePosts()
    {
        try
        {
            $this->_topicPosts = $this->_topicMapper->loadPostsByTopic($this->_id);
        }
        catch(Exception $e)
        {
            $e->getMessage();
            $this->_topicPosts = array();
        }
    }
    public function insertTopic(PostModel $post)
    {
        try
        {
            $this->_topicMapper->insertTopic($this, $post);
            return true;
        }
        catch(Exception $e)
        {
            return false;
        }
    }

    public function insertPost(PostModel $postModel)
    {
        try
        {
            $this->_topicMapper->insertPost($postModel);
            return true;
        }
        catch(Exception $e)
        {
            return false;
        }
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->_id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->_id = $id;
    }

    /**
     * @return IUserModel
     */
    public function getUser(): IUserModel
    {
        return $this->_userModel;
    }

    /**
     * @param IUserModel $userModel
     */
    public function setUser(IUserModel $userModel): void
    {
        $this->_userModel = $userModel;
    }

    /**
     * @return array
     */
    public function getTopicPosts(): array
    {
        return $this->_topicPosts;
    }

    /**
     * @return string
     */
    public function getTopicName(): string
    {
        return $this->_topicName;
    }

    /**
     * @param string $_topicName
     */
    public function setTopicName(string $_topicName): void
    {
        $this->_topicName = $_topicName;
    }

    /**
     * @return DateTime
     */
    public function getDateTopicCreated(): DateTime
    {
        return $this->_dateTopicCreated;
    }

    /**
     * @param DateTime $dateTopicCreated
     */
    public function setDateTopicCreated(DateTime $dateTopicCreated): void
    {
        $this->_dateTopicCreated = $dateTopicCreated;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->_categoryId;
    }

    /**
     * @param int $_categoryId
     */
    public function setCategoryId(int $_categoryId): void
    {
        $this->_categoryId = $_categoryId;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->_userId;
    }

    /**
     * @param int $_userId
     */
    public function setUserId(int $_userId): void
    {
        $this->_userId = $_userId;
    }

    /**
     * @param TopicMapper $topicMapper
     */
    public function setTopicMapper(TopicMapper $topicMapper): void
    {
        $this->_topicMapper = $topicMapper;
    }
}