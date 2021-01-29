<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <h5 class="py-4">Schedule Data</h5>
            <form action="/?path=/trips/store" method="POST">
                <div class="mb-3">
                    <select class="form-select" name="region" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <?php foreach ($regions as $index => $region) { ?>
                            <option value="<?php print $region->id ?>"><?php print $region->name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <select class="form-select" name="courier" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <?php foreach ($couriers as $index => $courier) { ?>
                            <option value="<?php print $courier->id ?>"><?php print $courier->firstname ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="departure_date" class="form-label">Email address</label>
                    <input type="date" name="departure_date" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="arrival_date" class="form-label">Email address</label>
                    <input type="date" name="arrival_date" class="form-control">
                </div>
                <button type="submit" class="btn btn-dark btn-block">Create</button>
            </form>
        </div>
    </div>
</div>

