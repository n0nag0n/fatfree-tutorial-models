<?php

class Car_Parts_Controller {
	public function index(Base $fw, array $args = []): void {
		echo '<pre>';
		var_dump($fw->DB->exec("SELECT * FROM car_parts"));
		echo '</pre>';
	}

	public function insert(Base $fw, array $args = []): void {
		$car_part_name = $args['car_part_name'];

		//$fw->get('DB')->exec("INSERT INTO car_parts (name) VALUES (?)")
		$fw->get('DB')->exec("INSERT INTO car_parts SET name = ?", [ $car_part_name ]);

		$fw->reroute('/car-parts', false);
	}
}