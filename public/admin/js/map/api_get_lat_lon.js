$(document).ready(function () {
    document.getElementById('ward').addEventListener('change', function () {
        let ward = this.options[this.selectedIndex].text;
        document.getElementById('ward_name').value = ward;

        let district = document.getElementById('district').options[document.getElementById('district').selectedIndex].text;
        let city = document.getElementById('city').options[document.getElementById('city').selectedIndex].text;

        if (ward && district && city) {
            fetchLatLong(ward, district, city);
            sendRequest(ward, district, subStringCity(city));
        }
    });

    document.getElementById('district').addEventListener('change', function () {
        let district = this.options[this.selectedIndex].text;
        document.getElementById('district_name').value = district;
        let city = document.getElementById('city').options[document.getElementById('city').selectedIndex].text;
        fetchLatLong(null, district, city);
        sendRequest(null, district, subStringCity(city));
    });

    document.getElementById('city').addEventListener('change', function () {
        let city = this.options[this.selectedIndex].text;
        document.getElementById('city_name').value = city;
        fetchLatLong(null, null, city);
        console.log(subStringCity(city));
        sendRequest(null, null, subStringCity(city));
    });
});

function sendRequest(ward = null, district = null, city = null) {
    const requestData = {
        ward: ward,
        district: district,
        city: city
    };

    $.ajax({
        type: "GET",
        url: "/api/map/search",
        data: requestData,
        success: function (response) {
            if (Array.isArray(response)) {
                console.log(response);
                markers.clearLayers();
                response.forEach(house => {
                    if (district && house.district !== district) {
                        return;
                    }
                    if (ward && house.ward !== ward) {
                        return;
                    }
                    const marker = L.marker([house.latitude, house.longitude]);
                    const fullAddress = `${house.full_address}, ${house.street}, ${house.ward}, ${house.district}, ${house.city}`;
                    marker.bindPopup('Địa chỉ thực: ' + fullAddress);
                    markers.addLayer(marker);
                });
                map.addLayer(markers);
            }
        },
        error: function (error) {
            console.error('Error fetching real estate data:', error);
        }
    });
}


function subStringCity(City) {
    let subString = "Thành phố";
    if (City.indexOf(subString) != -1) {
        let indexStart = City.indexOf(subString);
        let indexEnd = indexStart + subString.length;
        let result = City.substring(0, indexStart) + City.substring(indexEnd);
        result = result.trim();
        return result;
    }
    subString = "Tỉnh";
    if (City.indexOf(subString) != -1) {
        let indexStart = City.indexOf(subString);
        let indexEnd = indexStart + subString.length;
        let result = City.substring(0, indexStart) + City.substring(indexEnd);
        result = result.trim();
        return result;
    }
    return City;
}

function fetchLatLong(ward = null, district = null, city = null) {
    let query = `Vietnam`;
    if (city) query = city + ", " + query;
    if (district) query = district + ", " + query;
    if (ward) query = ward + ", " + query;
    let url = `https://nominatim.openstreetmap.org/search?q=${query}&format=json`;
    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data && data.length > 0) {
                let lat = data[0].lat;
                let lon = data[0].lon;
                map = L.map('map').setView([lat, lon], 10);
            }
        })
        .catch(error => console.error('Error fetching lat/long:', error));
}

const map = L.map('map').setView([20.8506, 106.6822], 10);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(map);

const markers = L.markerClusterGroup({
    showCoverageOnHover: false, // Không hiển thị vùng phủ sóng của cluster khi hover
    zoomToBoundsOnClick: true, // Zoom vào cluster khi click
    spiderfyOnMaxZoom: true, // Hiển thị markers khi zoom max
    disableClusteringAtZoom: 16 // Ngừng clustering khi zoom >= 16
});

map.addLayer(markers);
