<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $filteredHotels = [];

    foreach ($hotels as $index => $hotel) {
    
        $addToArray = true;
    
        if(
            isset( $_GET['parking']) == true && ($_GET['parking']) != '' ) {
    
                if ( $_GET['parking'] =='y' && $hotel['parking'] == false ) {
    
                    $addToArray = false;
                }
                elseif ( $_GET['parking'] =='n' && $hotel['parking'] == true ) {
    
                    $addToArray = false;
                }
        }
    
        if(
            isset( $_GET['vote']) == true && ($_GET['vote']) != '' && is_numeric($_GET['vote'])) {
                if ($hotel['vote'] < $_GET['vote']) {
                    $addToArray = false;
                }
            }
    
        if ( $addToArray == true) {
            $filteredHotels[] = $hotel;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP Hotel</title>

        <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <!-- CSS -->
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
    <div class="container">
		<div>
			<form action="" method="GET">
				<div class="mb-3">
					<div class="row">
						<div class="col">
							<label for="parking" class="form-label">
								Parking
							</label>
							<select class="form-select" name="parking" id="parking">
								<option value="">No need for parking</option>
								<option value="y">Yes</option>
								<option value="n">No</option>
							</select>
						</div>
						<div class="col">
							<label for="vote" class="form-label">
								Vote							</label>
							<input class="form-control" type="number" name="vote" id="vote" placeholder="Insersci un voto">
						</div>
					</div>
					
				</div>
				<div>
					<button type="submit" class="btn btn-primary ">
						Filter
					</button>
				</div>
			</form>
		</div>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Name</th>
					<th scope="col">Description</th>
					<th scope="col">Parking</th>
					<th scope="col">Vote</th>
					<th scope="col">Distance to center</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($filteredHotels as $hotel) {
				?>
					<tr>
						<th scope="row"><?php echo $hotel['name']; ?></th>
						<td><?php echo $hotel['description']; ?></td>
						<td><?php echo ($hotel['parking'] == true ? 'Si' : 'No'); ?></td>
						<td><?php echo $hotel['vote']; ?></td>
						<td><?php echo $hotel['distance_to_center']; ?></td>
					</tr>

				<?php
				}
				?>
			</tbody>
		</table>
	</div>
	</div>
    </body>
</html>