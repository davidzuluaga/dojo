<?php

namespace Drupal\CultureNews\tests\Unit;

use Drupal\Tests\UnitTestCase;
use function GuzzleHttp\json_decode;
use Drupal\Core\Database\Statement;

/**
 *
 * @author davids
 * @group CultureNews
 *
 */
class ArticleTest extends UnitTestCase {

  /**
   * Mock statement.
   *
   * @var \Drupal\Core\Database\Statement
   */
  protected $statement;

  /**
   * Mock select interface.
   *
   * @var \Drupal\Core\Database\Query\SelectInterface
   */
  protected $select;

  /**
   * Mock database connection.
   *
   * @var \Drupal\Core\Database\Connection
   */
  protected $database;

  /**
   *
   * {@inheritdoc}
   * @see \Drupal\Tests\UnitTestCase::setUp()
   */
  protected function setUp() {
    
    $this->statement = $this->getMockBuilder(Statement::class)
      ->disableOriginalConstructor()
      ->getMock();
    
    $this->statement->expects($this->any())
      ->method('fetchObject')
      ->will($this->returnCallback([$this, 'fetchObjectCallback']));
    
    $this->select = $this->getMockBuilder('Drupal\Core\Database\Query\Select')
      ->disableOriginalConstructor()
      ->getMock();
    
    $this->select->expects($this->any())
      ->method('fields')
      ->will($this->returnSelf());
    
    $this->select->expects($this->any())
      ->method('condition')
      ->will($this->returnSelf());
    
    $this->select->expects($this->any())
      ->method('execute')
      ->will($this->returnValue($this->statement));
   
    $this->database = $this->getMockBuilder('Drupal\Core\Database\Connection')
      ->disableOriginalConstructor()
      ->getMock();
    
    $this->database->expects($this->once())
      ->method('select')
      ->will($this->returnValue($this->select));
    
  }

  public function testCreateArticle(){
    
    $title = '';
    $description = '';
    $author = '';
    
    $article = new Article($title, $description, $author);
    
    assertInstanceOf(Article::class);
    
  }
  
}

