
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
                markers.clearLayers();
                response.forEach(house => {
                    const marker = L.marker([house.latitude, house.longitude]).addTo(map);
                    const fullAddress = `${house.full_address} ${house.street} ${house.ward} ${house.district} ${house.city}`;
                    marker.bindPopup('Địa chỉ thực: ' + fullAddress).openPopup();
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

const map = L.map('map').setView([10.776889, 106.700806], 10);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

const markers = L.markerClusterGroup();

$(document).ready(function () {
    document.getElementById('ward').addEventListener('change', function () {
        let ward = this.options[this.selectedIndex].text;
        document.getElementById('ward_name').value = ward;

        let district = document.getElementById('district').options[document.getElementById('district')
            .selectedIndex].text;
        let city = document.getElementById('city').options[document.getElementById('city').selectedIndex].text;

        if (ward && district && city) {
            // fetchLatLong(ward, district, city);
            sendRequest(ward, district, city);
        }
    });

    document.getElementById('district').addEventListener('change', function () {
        let district = this.options[this.selectedIndex].text;
        document.getElementById('district_name').value = district;
        let city = document.getElementById('city').options[document.getElementById('city').selectedIndex].text;
        // fetchLatLong(null, district, city);
        sendRequest(null, district, city);
    });

    document.getElementById('city').addEventListener('change', function () {
        let city = this.options[this.selectedIndex].text;
        document.getElementById('city_name').value = city;
        // fetchLatLong(null, null, city);
        sendRequest(null, null, city);
    });

});
