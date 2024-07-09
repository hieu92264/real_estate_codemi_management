function fetchLatLong(ward, district, city) {
    let query = `${ward}, ${district}, ${city}, Vietnam`;
    let url = `https://nominatim.openstreetmap.org/search?q=${query}&format=json`;
    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data && data.length > 0) {
                let lat = data[0].lat;
                let lon = data[0].lon;
                document.getElementById('ward_latitude').value = lat;
                document.getElementById('ward_longitude').value = lon;
            }
        })
        .catch(error => console.error('Error fetching lat/long:', error));
}

document.getElementById('ward').addEventListener('change', function () {
    let ward = this.options[this.selectedIndex].text;
    document.getElementById('ward_name').value = ward;

    let district = document.getElementById('district').options[document.getElementById('district')
        .selectedIndex].text;
    let city = document.getElementById('city').options[document.getElementById('city').selectedIndex].text;

    if (ward && district && city) {
        fetchLatLong(ward, district, city);
    }
});

document.getElementById('district').addEventListener('change', function () {
    let district = this.options[this.selectedIndex].text;
    document.getElementById('district_name').value = district;
});

document.getElementById('city').addEventListener('change', function () {
    let city = this.options[this.selectedIndex].text;
    document.getElementById('city_name').value = city;
});