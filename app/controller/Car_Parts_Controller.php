<?php

class Car_Parts_Controller {
	public function index(Base $fw, array $args = []): void {
		$Car_Part = new Car_Part($fw->DB);
		$all_car_parts = $Car_Part->find([ 'name LIKE ?', '%seat%' ]);
		echo '<pre>';
		foreach($all_car_parts as $car_part) {
			echo "ID: {$car_part->id}\n";
			echo "Part: {$car_part->name}\n";
		}
		echo '</pre>';
	}

	public function insert(Base $fw, array $args = []): void {
		$car_part_name = $args['car_part_name'];

		$Car_Part = new Car_Part($fw->DB);
		$Car_Part->name = $car_part_name;
		$Car_Part->save();
		// $Car_Part->id;
		$Car_Part->reset();

		$Car_Part->name = $car_part_name.' Copy';
		$Car_Part->save();

		$fw->reroute('/car-parts', false);
	}

	public function update(Base $fw, array $args = []): void {
		$updated_name = $args['updated_name'];
		$id = $args['car_part_id'];

		$Car_Part = new Car_Part($fw->DB);
		$Car_Part->load([ 'id = ?', $id ]);

		//$Car_Part->copyfrom('POST');

		$Car_Part->name = $updated_name;
		$Car_Part->save();

		$fw->reroute('/car-parts', false);
	}
}