<?php
namespace Appli\Entity;

class Product
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $description;
    /**
     * @var float
     */
    private $price;
    /**
     * @var string
     */
    private $created_at;
    /**
     * @var string
     */
    private $updated_at;
    /**
     * @var bool
     */
    private $is_published;
    /**
     * @var int
     */
    private $nb_views;
    /**
     * @var int
     */
    private $category_id;
    /**
     * @var string
     */
    private $user_username;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    /**
     * @param string $created_at
     */
    public function setCreatedAt(string $created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    /**
     * @param string $updated_at
     */
    public function setUpdatedAt(string $updated_at): void
    {
        $this->updated_at = $updated_at;
    }

    /**
     * @return bool
     */
    public function isPublished(): bool
    {
        return $this->is_published;
    }

    /**
     * @param bool $is_published
     */
    public function setIsPublished(bool $is_published): void
    {
        $this->is_published = $is_published;
    }

    /**
     * @return int
     */
    public function getNbViews(): int
    {
        return $this->nb_views;
    }

    /**
     * @param int $nb_views
     */
    public function setNbViews(int $nb_views): void
    {
        $this->nb_views = $nb_views;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    /**
     * @param int $category_id
     */
    public function setCategoryId(int $category_id): void
    {
        $this->category_id = $category_id;
    }

    /**
     * @return string
     */
    public function getUserUsername(): string
    {
        return $this->user_username;
    }

    /**
     * @param string $user_username
     */
    public function setUserUsername(string $user_username): void
    {
        $this->user_username = $user_username;
    }
}
