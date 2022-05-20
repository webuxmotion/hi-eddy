<?php

namespace app\models;

class LessonModel extends AppModel
{
  public $table = 'lesson';

  public function getList() {
    $langId = \core\Tone::$app->getProperty('language')['id'];
    $userId = $_SESSION['user']['id'] ?? null;
    $showPinned = get('pinned', 'bool');
    
    if ($userId && $showPinned) {
      $sql = "
        SELECT l.slug, ld.title, lpin.id as has_pin FROM {$this->table} l
        JOIN lesson_description ld
          ON l.id = ld.lesson_id
        JOIN lesson_pin lpin
          ON l.id = lpin.lesson_id
          AND {$userId} = lpin.user_id
        WHERE ld.language_id = ?
      ";
    } else {
      $sql = "
        SELECT l.slug, ld.title FROM {$this->table} l
        JOIN lesson_description ld
        ON l.id = ld.lesson_id
        WHERE ld.language_id = ?
      ";
    }
    
    $res = $this->db->query($sql, [$langId]);

    return $res ?? null;
  }

  public function getOneByAlias($alias) {
    $langId = \core\Tone::$app->getProperty('language')['id'];
    $userId = $_SESSION['user']['id'] ?? 0;

    $sql = "
      SELECT
        l.slug,
        l.id,
        ld.title,
        ld.meta_description,
        ld.meta_keywords,
        lpin.id as has_pin
      FROM {$this->table} l
      JOIN lesson_description ld
      ON l.id = ld.lesson_id
      LEFT JOIN lesson_pin lpin
      ON l.id = lpin.lesson_id
      AND {$userId} = lpin.user_id
      WHERE l.slug = ?
      AND ld.language_id = ?
    ";
    
    $res = $this->db->query($sql, [$alias, $langId]);
    
    return $res ? $res[0] : null;
  }
}