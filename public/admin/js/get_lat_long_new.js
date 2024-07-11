// const NOMINATIM_BASE_URL = "https://us1.locationiq.com/v1/search.php?";
// const LOCATIONIQ_ACCESS_TOKEN = "pk.1ad8efda7bc75ab2edfd9872233ff845";

// let listPlace = [];
// let typingTimer;
// const typingInterval = 1500;

// document.getElementById('searchInput').addEventListener('keyup', () => {
//     clearTimeout(typingTimer);
//     typingTimer = setTimeout(handleSearch, typingInterval);
// });
// function handleSearch() {
//     const searchText = document.getElementById("searchInput").value;
//     if (searchText.trim() === "") return;

//     const params = {
//         key: LOCATIONIQ_ACCESS_TOKEN,
//         q: searchText,
//         format: "json",
//         addressdetails: 1,
//         polygon_geojson: 0,
//     };
//     const queryString = new URLSearchParams(params).toString();
//     const requestOptions = {
//         method: "GET",
//         redirect: "follow",
//     };

//     fetch(`${NOMINATIM_BASE_URL}${queryString}`, requestOptions)
//         .then((response) => {
//             if (!response.ok) {
//                 throw new Error("Network response was not ok");
//             }
//             return response.json();
//         })
//         .then((data) => {
//             listPlace = data;
//             renderList();
//             if (data.length === 0 && searchText.includes(" ")) {
//                 const mainAddress = searchText.split(" ")[1];
//                 searchByMainAddress(mainAddress);
//             }
//         })
//         .catch((err) => console.log("err: ", err));
// }

// function searchByMainAddress(mainAddress) {
//     const params = {
//         key: LOCATIONIQ_ACCESS_TOKEN,
//         q: mainAddress,
//         format: "json",
//         addressdetails: 1,
//         polygon_geojson: 0,
//     };
//     const queryString = new URLSearchParams(params).toString();
//     const requestOptions = {
//         method: "GET",
//         redirect: "follow",
//     };

//     fetch(`${NOMINATIM_BASE_URL}${queryString}`, requestOptions)
//         .then((response) => response.json())
//         .then((data) => {
//             listPlace = data;
//             renderList();
//         })
//         .catch((err) => console.log("err: ", err));
// }




// function renderList() {
//     const listElement = document.getElementById("placeList");
//     listElement.innerHTML = "";

//     listPlace.forEach((item) => {
//         const listItem = document.createElement("div");
//         listItem.setAttribute("key", item.place_id);

//         const listItemContent = document.createElement("div");
//         listItemContent.classList.add("list-item");

//         listItemContent.innerHTML = `
//             <div class="list-item" onclick='handleSelectPosition(${JSON.stringify(item)})'>
//                 <img src="./placeholder.png" alt="Placeholder">
//                 <span>${item.display_name}</span>
//             </div>
//             <hr>
//         `;
//         listItem.appendChild(listItemContent);
//         listElement.appendChild(listItem);
//     });
// }


// function handleSelectPosition(item) {
//     console.log("Selected position:", item);

//     document.getElementById("searchInput").value = item.display_name;
//     document.getElementById("lat").value = item.lat;
//     document.getElementById("long").value = item.lon;

//     console.log("Latitude:", item.lat);
//     console.log("Longitude:", item.lon);
// }
const HERE_API_KEY = 'isQPx0RpqayXu0EMpVQSHN8wkWnh-k7InyTiW6mMn6Q'; // Thay thế bằng API Key của bạn

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
                <img src="${item.icon}" alt="Place Icon">
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

