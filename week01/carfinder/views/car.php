<div class="car">
    <h2><?= $car["brand"] . ' ' . $car["type"]; ?></h2>
    <img src="cars/<?= $car["image"]; ?>">
    <dl>
        <dt>Brandstof</dt>
        <dd><?= $car["fuel"]; ?></dd>
        <dt>Prijs vanaf</dt>
        <dd><?= '€ ' . number_format($car["price_from"], 0 , "," , "." ); ?></dd>
    </dl>
</div>