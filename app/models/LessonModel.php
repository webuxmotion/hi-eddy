<?php

namespace app\models;

class LessonModel extends AppModel
{
  public $table = 'lesson';

  public function getList() {
    $langId = \core\Tone::$app->getProperty('language')['id'];

    $sql = "
      SELECT l.slug, ld.title FROM {$this->table} l
      JOIN lesson_description ld
      ON l.id = ld.lesson_id
      WHERE ld.language_id = ?
    ";
    
    $res = $this->db->query($sql, [$langId]);

    return $res ?? null;
  }

  public function getOneByAlias($alias) {
    $langId = \core\Tone::$app->getProperty('language')['id'];

    $sql = "
      SELECT l.slug, ld.* FROM {$this->table} l
      JOIN lesson_description ld
      ON l.id = ld.lesson_id
      WHERE l.slug = ?
      AND ld.language_id = ?
    ";
    
    $res = $this->db->query($sql, [$alias, $langId]);
    
    return $res ? $res[0] : null;
  }
}