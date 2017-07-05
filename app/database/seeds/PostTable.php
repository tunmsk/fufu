<?php

use Phinx\Seed\AbstractSeed;

class PostTable extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
      $articles = [];
      for ($i = 1; $i < 5; $i++) {
        $articles[] = [
          'name' => 'Article '.$i
        ];
      }
      $this->insert('posts', $articles);
    }
}
