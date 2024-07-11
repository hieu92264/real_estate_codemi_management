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

const HERE_API_KEY = 'isQPx0RpqayXu0EMpVQSHN8wkWnh-k7InyTiW6mMn6Q';

const map = L.map('map').setView([10.776889, 106.700806], 10);

// Here Maps tile layer
L.tileLayer(`https://{s}.base.maps.ls.hereapi.com/maptile/2.1/maptile/newest/normal.day/{z}/{x}/{y}/256/png8?apiKey=${HERE_API_KEY}&ppi=320`, {
    attribution: '© HERE 2024',
    subdomains: '1234'
}).addTo(map);

const markers = L.markerClusterGroup();

