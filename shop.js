
const sideNav = document.getElementById(`sideNav`);
const menuBtn = document.getElementById(`menuBtn`);
const menu = document.getElementById(`menu`);
const modal = document.getElementById("modal");
// const modalTitle = document.getElementById("modal-title");
// const modalDesc = document.getElementById("modal-desc");
// const modalImg = document.getElementById("modal-img");
// const modalPrice = document.getElementById("modal-price");
// const closeModal = document.querySelector(".close-btn");
const viewMoreButtons = document.querySelectorAll(".view-more");
const shopName = document.getElementById("shop_name");


document.addEventListener("click", function (event) {
    if (event.target.classList.contains("view-more")) {
        const shopName = event.target.dataset.name; // Get shop name
        fetchProducts(shopName);
    }
});

// Close modal when clicking close button
document.addEventListener("click", function (event) {
    if (event.target.classList.contains("close-btn")) {
        modal.style.display = "none";
    }
});

// Close modal when clicking outside content
window.addEventListener("click", function (event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
});
// Fetch Shops
function fetchShops() {
    fetch('fetch_shops.php')
        .then(response => response.json())
        .then(data => {
            console.log(data);
            const shopBox = document.getElementById("shop-box");
            shopBox.innerHTML = "";
            data.forEach(shop => {
                shopBox.innerHTML += `
                // <div class="single-shop">
                //     <img src="shop1.jpg" alt="Fisrt Shop">
                //     <div class="overLay"></div>
                //     <div class="shop-desc">
                //         <h3 id="shop_name">${shop.name}</h3>
                //         <!-- <a href="" class="btn">View More</a> -->
                //         <button 
                //         class="btn view-more" 
                //         data-name=${shop.name} 
                //         >View More</button>
                //     </div>
                // </div>
               `
            });
        });
}

function fetchProducts(shop_id) {
    fetch(`fetch_products.php?shop_id=${3}`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            const modal = document.getElementById("modal");
            modal.innerHTML = "";
            // const modalContent = document.getElementById("modal-content");
            data.forEach(product => {
                console.log("product",product.name);
                modal.innerHTML += `
                // <div id="modal-content" class="modal-content">
                //     <span class="close-btn">&times;</span>
                //     <h2>${product.name}</h2>
                //    <h2>${product.description}</h2>
                //     <h3>Price:Ksh ${product.price}</h3>
                // </div>
            `;
                modal.style.display = "flex";
            })
        })
        .catch(error => console.error("Error fetching products:", error));
}

// sideNav.style.right = "-250px";
// menuBtn.onclick = function () {
//     if (sideNav.style.right == "-250px") {
//         sideNav.style.right = "0"
//         menu.src = "close.png";
//     }
//     else {
//         sideNav.style.right = "-250px";
//         menu.src = "menu.png"
//     }
// }

// viewMoreButtons.forEach(button => {
// document.addEventListener("click", function () {
//     if (event.target.classList.contains("view-more")) {
//         modalTitle.textContent = this.dataset.name;
//         modalDesc.textContent = this.dataset.desc;
//         modalImg.src = this.dataset.img;
//         modalPrice.textContent = this.dataset.price;
//         modal.style.display = "flex";
//     }
// });
// });

// closeModal.addEventListener("click", function () {
//     modal.style.display = "none";
// });

window.onclick = function (event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
};
document.addEventListener("DOMContentLoaded", fetchShops)