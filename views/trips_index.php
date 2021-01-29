<?php if (!$ajax) { ?>
<div class="row justify-content-center">
    <div class="col-6 mt-4">
        <h5>choose the date</h5>
        <div class="ajax_output">
            <?php } ?>
            <form action="/?path=/" method="GET" class="mb-4 form_list_trips">
                <label for="departure_from">Departure from</label>
                <input type="date" name="departure_from" value="<?php print $departureFrom ?>">
                <label for="arrival_to">Departure to</label>
                <input type="date" name="departure_to" value="<?php print $departureTo ?>">
                <button type="submit">find</button>
            </form>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Departure Date</th>
                    <th scope="col">Arrival Date</th>
                    <th scope="col">Region</th>
                </tr>
                </thead>
                <tbody>
                <?php if (isset($trips)) { ?>
                    <?php foreach ($trips as $index => $trip) { ?>
                        <tr>
                            <td><?=$trip->departure_date?></td>
                            <td><?=$trip->arrival_date?></td>
                            <td><?=$trip->name?></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
                </tbody>
            </table>
            <?php if (!$ajax) { ?>
        </div>
    </div>
</div>
<?php } ?>