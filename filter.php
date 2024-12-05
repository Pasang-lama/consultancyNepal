<?php
require_once("database/Database.php");
$db  = Database::Instance();
$country = $db->CustomQuery("select id,country_name as title from countries");
$cities = $db->CustomQuery("select city_id as id , city as title from city");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON Data Filtering</title>
</head>

<body>

    <!-- Add dropdowns for filtering -->
    <label for="countryFilter">Filter by Country:</label>
    <select id="countryFilter">
        <option value="none">None</option>
        <?php foreach ($country as $data) : ?>
            <option value="<?= $data->id ?>"><?= $data->title ?></option>
        <?php endforeach; ?>
    </select>

    <label for="cityFilter">Filter by City:</label>
    <select id="cityFilter">
        <option value="none">None</option>
        <?php foreach ($cities as $data) : ?>
            <option value="<?= $data->id ?>"><?= $data->title ?></option>
        <?php endforeach; ?>
    </select>

    <!-- Include your JavaScript file -->
    <script>
        function displayFilteredData(){}
        document.addEventListener("DOMContentLoaded", function() {

            //unique datas 
            function filterUniqueById(data) {
                const uniqueItems = {};
                const result = [];

                data.forEach(item => {
                    const id = item.id;
                    if (!uniqueItems.hasOwnProperty(id)) {
                        uniqueItems[id] = true;
                        result.push(item);
                    }
                });

                return result;
            }

            let jsonData; // Variable to store the original JSON data
            const displayLimit = 10; // Initial limit for displaying data
            const displayedIds = new Set(); // Set to keep track of displayed IDs

            // Fetch JSON data from an external source (replace 'your-api-endpoint' with the actual API endpoint)
            fetch('http://localhost/Consultancy-Nepal/getHomePopularConsultancy.php')
                .then(response => response.json())
                .then(data => {
                    jsonData = data;
                    console.log(jsonData);
                    result = filterUniqueById(jsonData)
                    // Initial display of data with the specified limit

                    displayData(result.slice(0, displayLimit));

                    // Attach event listeners to the dropdowns
                    document.getElementById("countryFilter").addEventListener("change", displayFilteredData);
                    document.getElementById("cityFilter").addEventListener("change", displayFilteredData);
                })
                .catch(error => console.error('Error fetching JSON data:', error));

            // Function to filter and display data
            function displayFilteredData() {
                // Get selected values from country and city dropdowns
                const selectedCountry = document.getElementById("countryFilter").value;
                const selectedCity = document.getElementById("cityFilter").value;

                // Filter the data based on selected criteria
                const filteredData = jsonData.filter(item => (
                    (selectedCountry === 'none' || selectedCountry === item.country.toString()) &&
                    (selectedCity === 'none' || selectedCity === item.city.toString())
                ));



                // Usage:
                const uniqueIdsObject = filterUniqueById(filteredData);
                // console.log(uniqueIdsObject);

                // Limit the displayed results
                const limitedData = uniqueIdsObject.slice(0, displayLimit);



                // Display the filtered and limited data or show a message if no data is found
                if (limitedData.length > 0) {
                    displayData(limitedData);
                } else {
                    displayNoDataMessage();
                }
            }

            // Function to display data in the HTML
            function displayData(data) {
                const resultContainer = document.getElementById("resultContainer");

                // Clear previous results and reset displayed IDs
                resultContainer.innerHTML = "";
                displayedIds.clear();

                // Create and append HTML elements for each item in the data
                data.forEach(item => {
                    // Check if the ID has already been displayed
                    if (!displayedIds.has(item.id)) {
                        const itemElement = document.createElement("div");
                        itemElement.textContent = `${item.consultancy_name} - ${item.country} years old - ${item.city}`;
                        resultContainer.appendChild(itemElement);

                        // Add the ID to the set of displayed IDs
                        displayedIds.add(item.id);
                    }
                });
            }

            // Function to display "No data found" message
            function displayNoDataMessage() {
                const resultContainer = document.getElementById("resultContainer");
                resultContainer.innerHTML = "<p>No data found</p>";
            }
        });
    </script>

    <!-- Add a container for the filtered results -->
    <div id="resultContainer"></div>

</body>

</html>