
const HERE_API_KEY = 'b4_SzA1X0Mi2Dd4J2-eIzgWYHfh7u8Aa93lcQIMCGt4';

let listPlace = [];
let typingTimer;
const typingInterval = 1500;

// Vị trí trung tâm tìm kiếm (ví dụ: Hà Nội, Việt Nam)
const defaultLatitude = 21.028511;
const defaultLongitude = 105.804817;

document.getElementById('searchInput').addEventListener('keyup', () => {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(handleSearch, typingInterval);
});

function handleSearch() {
    const searchText = document.getElementById("searchInput").value;
    if (searchText.trim() === "") return;

    const params = {
        apiKey: HERE_API_KEY,
        q: searchText,
        at: `${defaultLatitude},${defaultLongitude}`
    };
    const queryString = new URLSearchParams(params).toString();
    const requestOptions = {
        method: "GET",
        redirect: "follow",
    };

    fetch(`https://discover.search.hereapi.com/v1/discover?${queryString}`, requestOptions)
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then((data) => {
            listPlace = data.items;
            renderList();
        })
        .catch((err) => console.log("err: ", err));
}

function renderList() {
    const listElement = document.getElementById("placeList");
    listElement.innerHTML = "";

    listPlace.forEach((item) => {
        const listItem = document.createElement("div");
        listItem.setAttribute("key", item.id);

        const listItemContent = document.createElement("div");
        listItemContent.classList.add("list-item");

        listItemContent.innerHTML = `
            <div class="list-item" onclick='handleSelectPosition(${JSON.stringify(item)})'>
                <img src="../img/iconmap.png" alt=" Icon">
                <span>${item.address.label}</span>
            </div>
            <hr>
        `;
        listItem.appendChild(listItemContent);
        listElement.appendChild(listItem);
    });
}

function handleSelectPosition(item) {
    console.log("Selected position:", item);
    // Handle selection logic, e.g., update input fields with selected place details
    document.getElementById("searchInput").value = item.address.label;
    document.getElementById("lat").value = item.position.lat;
    document.getElementById("long").value = item.position.lng;
    document.getElementById('city_name').value = item.address.county;
    document.getElementById('district_name').value = item.address.city;
    document.getElementById('ward_name').value = item.address.district;
    document.getElementById('street_name').value = item.address.street;
    console.log("Latitude:", item.position.lat);
    console.log("Longitude:", item.position.lng);
}

