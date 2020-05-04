<?php
/**
 * Author: Kotowicz 17018747
 */

class PostModel
{
    private int $_id;
    private string $_content;
    private DateTime $_replyDate;
    private int $_topicId;
    private IUserModel $_userModel;

    public function __construct()
    {

    }

    public function create(int $id, string $content, DateTime $replyDate, int $topicId, IUserModel $userModel)
    {
        $this->_id = $id;
        $this->_content = $content;
        $this->_replyDate = $replyDate;
        $this->_topicId = $topicId;
        $this->_userModel = $userModel;
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
     * @return string
     */
    public function getContent(): string
    {
        return $this->_content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->_content = $content;
    }

    /**
     * @return DateTime
     */
    public function getReplyDate(): DateTime
    {
        return $this->_replyDate;
    }

    /**
     * @param DateTime $replyDate
     */
    public function setReplyDate(DateTime $replyDate): void
    {
        $this->_replyDate = $replyDate;
    }

    /**
     * @return int
     */
    public function getTopicId(): int
    {
        return $this->_topicId;
    }

    /**
     * @param int $topicId
     */
    public function setTopicId(int $topicId): void
    {
        $this->_topicId = $topicId;
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

}