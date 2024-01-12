// CMS.php
require_once 'Author.php';
require_once 'Category.php';
require_once 'Article.php';

class CMS {
    private $authors;
    private $categories;
    private $articles;

    public function __construct() {
        $this->authors = [];
        $this->categories = [];
        $this->articles = [];
    }

    public function addAuthor(Author $author) {
        $this->authors[$author->getId()] = $author;
    }

    public function addCategory(Category $category) {
        $this->categories[$category->getId()] = $category;
    }

    public function addArticle(Article $article) {
        $this->articles[$article->getId()] = $article;
    }

    public function displayCMSInfo() {
        echo "Authors:\n";
        foreach ($this->authors as $author) {
            echo "ID: {$author->getId()}, Name: {$author->getName()}, Email: {$author->getEmail()}\n";
        }

        echo "\nCategories:\n";
        foreach ($this->categories as $category) {
            echo "ID: {$category->getId()}, Name: {$category->getName()}\n";
        }

        echo "\nArticles:\n";
        foreach ($this->articles as $article) {
            echo "ID: {$article->getId()}, Title: {$article->getTitle()}, Content: {$article->getContent()}\n";
            echo "Author: {$article->getAuthor()->getName()}, Category: {$article->getCategory()->getName()}\n\n";
        }
    }
}

// Create CMS instance
$cms = new CMS();

// Create authors
$author1 = new Author(1, 'John Doe', 'john@example.com');
$author2 = new Author(2, 'Jane Doe', 'jane@example.com');

// Create categories
$category1 = new Category(1, 'Technology');
$category2 = new Category(2, 'Science');

// Create articles
$article1 = new Article(1, 'Introduction to PHP', '...', $author1, $category1);
$article2 = new Article(2, 'Exploring Mars', '...', $author2, $category2);

// Add authors, categories, and articles to CMS
$cms->addAuthor($author1);
$cms->addAuthor($author2);

$cms->addCategory($category1);
$cms->addCategory($category2);

$cms->addArticle($article1);
$cms->addArticle($article2);

// Display CMS information
$cms->displayCMSInfo();
