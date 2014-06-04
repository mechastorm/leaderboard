<?php

/**
 * Class DatabaseSeeder
 *
 * Main database seeder run by Laravel
 */
class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('PlayersTableSeeder');
	}
}

/**
 * Class PlayersTableSeeder
 * Hardcoded seed data for the players tables
 */
class PlayersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('players')->delete();

        // Seed Data
        $seedData = array(
            array(
              'name' => 'Gipsy Danger',
              'image_url' => 'http://www.giantfreakinrobot.com/wp-content/uploads/2013/07/pacific-rim-jaeger-gypsy-danger.jpg',
            ),
            array(
                'name' => 'Coyote Tango',
                'image_url' => 'http://cdn.bloody-disgusting.com/wp-content/uploads/2013/03/pacific-rim-poster-coyote-tango.jpeg',
            ),
            array(
                'name' => 'Cherno Alpha',
                'image_url' => 'http://img.moviepilot.com/assets/tarantulaV2/article_images/1364396894_521362_490228147710154_358309707_n.jpg',
            ),
            array(
                'name' => 'Strike Eureka',
                'image_url' => 'http://starseeker.com/wp-content/uploads/2013/03/pacific-rim-poster-mar-281.jpg',
            ),
        );

        foreach($seedData AS $data) {
            Player::create($data);
        }
    }

}


