const NOMINATIM_BASE_URL = "https://us1.locationiq.com/v1/search.php?";
const LOCATIONIQ_ACCESS_TOKEN = "pk.1ad8efda7bc75ab2edfd9872233ff845";

let listPlace = [];
let typingTimer;
const typingInterval = 1500;

document.getElementById('searchInput').addEventListener('keyup', () => {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(handleSearch, typingInterval);
});
function handleSearch() {
    const searchText = document.getElementById("searchInput").value;
    if (searchText.trim() === "") return;

    const params = {
        key: LOCATIONIQ_ACCESS_TOKEN,
        q: searchText,
        format: "json",
        addressdetails: 1,
        polygon_geojson: 0,
    };
    const queryString = new URLSearchParams(params).toString();
    const requestOptions = {
        method: "GET",
        redirect: "follow",
    };

    fetch(`${NOMINATIM_BASE_URL}${queryString}`, requestOptions)
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then((data) => {
            listPlace = data;
            renderList();
            if (data.length === 0 && searchText.includes(" ")) {
                const mainAddress = searchText.split(" ")[1];
                searchByMainAddress(mainAddress);
            }
        })
        .catch((err) => console.log("err: ", err));
}

function searchByMainAddress(mainAddress) {
    const params = {
        key: LOCATIONIQ_ACCESS_TOKEN,
        q: mainAddress,
        format: "json",
        addressdetails: 1,
        polygon_geojson: 0,
    };
    const queryString = new URLSearchParams(params).toString();
    const requestOptions = {
        method: "GET",
        redirect: "follow",
    };

    fetch(`${NOMINATIM_BASE_URL}${queryString}`, requestOptions)
        .then((response) => response.json())
        .then((data) => {
            listPlace = data;
            renderList();
        })
        .catch((err) => console.log("err: ", err));
}




function renderList() {
    const listElement = document.getElementById("placeList");
    listElement.innerHTML = "";

    listPlace.forEach((item) => {
        const listItem = document.createElement("div");
        listItem.setAttribute("key", item.place_id);

        const listItemContent = document.createElement("div");
        listItemContent.classList.add("list-item");

        listItemContent.innerHTML = `
            <div class="list-item" onclick='handleSelectPosition(${JSON.stringify(item)})'>
                <img src="./placeholder.png" alt="Placeholder">
                <span>${item.display_name}</span>
            </div>
            <hr>
        `;
        listItem.appendChild(listItemContent);
        listElement.appendChild(listItem);
    });
}


function handleSelectPosition(item) {
    console.log("Selected position:", item);

    document.getElementById("searchInput").value = item.display_name;
    document.getElementById("lat").value = item.lat;
    document.getElementById("long").value = item.lon;

    console.log("Latitude:", item.lat);
    console.log("Longitude:", item.lon);
}

