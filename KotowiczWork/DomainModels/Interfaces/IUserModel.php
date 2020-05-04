<?php
/**
 * Author: Kotowicz 17018747
 */

interface IUserModel
{
    /**
     * Fills user's data. Should be used when loading user's data from the database.
     * @param int $id User's unique identificator.
     * @param string $username User's username.
     * @param string $emailAdress User's email address.
     * @param string $forename User's first name.
     * @param string $surname User's last name.
     * @param DateTime $_joined Date the user registered his account.
     * @param IGroupModel $groupModel The group the user belong to.
     * @param string $photoName User's forum photo.
     */
    public function createUser(int $id,
                               string $username,
                               string $emailAdress,
                               string $forename,
                               string $surname,
                               DateTime $_joined,
                               IGroupModel $groupModel,
                               string $photoName);

    public function logout() : void;

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     */
    public function setId(int $id): void;

    /**
     * @return IGroupModel
     */
    public function getGroupModel(): IGroupModel;

    /**
     * @param IGroupModel $groupModel
     */
    public function setGroupModel(IGroupModel $groupModel): void;

    /**
     * @return string
     */
    public function getPhotoName(): string;

    /**
     * @param string $photoName
     */
    public function setPhotoName(string $photoName): void;

    /**
     * @return string
     */
    public function getUsername(): string;

    /**
     * @param string $username
     */
    public function setUsername(string $username): void;

    /**
     * @return string
     */
    public function getEmailaddress(): string;

    /**
     * @param string $emailaddress
     */
    public function setEmailaddress(string $emailaddress): void;

    /**
     * @return string
     */
    public function getForename(): string;

    /**
     * @param string $forename
     */
    public function setForename(string $forename): void;

    /**
     * @return string
     */
    public function getSurname(): string;

    /**
     * @param string $surname
     */
    public function setSurname(string $surname): void;

    /**
     * @return DateTime
     */
    public function getJoined(): DateTime;

    /**
     * @param DateTime $joined
     */
    public function setJoined(DateTime $joined): void;

    /**
     * @return bool
     */
    public function isLoggedIn(): bool;

    /**
     * @param bool $isLoggedIn
     */
    public function setIsLoggedIn(bool $isLoggedIn): void;
}