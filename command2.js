   // hena akhaye badr dire aya product jedide b tesewira ou tamane ou title 
   const products = [
    {
        id: 1,
        title: "Salon Magheribi",
        price: 30000,
        image: "assets/beldi3.webp"
    },
    {
        id: 2,
        title: "Salon Magheribi",
        price: 15000.00 ,
        image: "assets/beldi1.jpg"
    },
    {
        id: 3,
        title: "Salon Magheribi",
        price: 30000,
        image: "assets/beldi3.webp"
    },
    {
        id: 4,
        title: "Salon Magheribi",
        price: 15000.00 ,
        image: "assets/beldi1.jpg"
    },
    {
        id: 5,
        title: "Salon Magheribi",
        price: 30000,
        image: "assets/beldi3.webp"
    },
    {
        id: 6,
        title: "Salon Magheribi",
        price: 15000.00 ,
        image: "assets/beldi1.jpg"
    }
];


let cart = [];


const productsContainer = document.getElementById('productsContainer');
const cartIcon = document.getElementById('cartIcon');
const cartModal = document.getElementById('cartModal');
const closeCart = document.getElementById('closeCart');
const cartItems = document.getElementById('cartItems');
const cartCount = document.getElementById('cartCount');
const cartTotal = document.getElementById('cartTotal');
const checkoutBtn = document.getElementById('checkoutBtn');

// Display products
function displayProducts() {
    productsContainer.innerHTML = '';
    
    products.forEach(product => {
        const productEl = document.createElement('div');
        productEl.classList.add('product');
        
        productEl.innerHTML = `
            <div class="product-image">
                <img src="${product.image}" alt="${product.title}">
            </div>
            <div class="product-info">
                <h3 class="product-title">${product.title}</h3>
                <p class="product-price">${product.price.toFixed(2)} dh</p>
                <button class="add-to-cart" data-id="${product.id}">
                    <span>Ajouter au panier</span>
                    <span>+</span>
                </button>
            </div>
        `;
        
        productsContainer.appendChild(productEl);
    });
    
    // Add event listeners to buttons
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', addToCart);
    });
}

// Add product to cart
function addToCart(event) {
    const productId = parseInt(event.target.closest('.add-to-cart').getAttribute('data-id'));
    const product = products.find(p => p.id === productId);
    
    // Check if product is already in cart
    const existingItem = cart.find(item => item.id === productId);
    
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({
            id: product.id,
            title: product.title,
            price: product.price,
            image: product.image,
            quantity: 1
        });
    }
    
    updateCartCount();
    showAddedToCartAnimation(event.target.closest('.add-to-cart'));
}


function showAddedToCartAnimation(button) {
    const originalText = button.innerHTML;
    button.innerHTML = '<span> Ajouté</span>';
    button.style.backgroundColor = '#4CAF50';
    
    setTimeout(() => {
        button.innerHTML = originalText;
        button.style.backgroundColor = '';
    }, 1000);
}


function updateCartCount() {
    const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
    cartCount.textContent = totalItems;
}


function displayCartItems() {
    if (cart.length === 0) {
        cartItems.innerHTML = '<div class="empty-cart"><i>🛒</i>Votre panier est vide</div>';
        cartTotal.textContent = '0.00 dh';
        return;
    }
    
    cartItems.innerHTML = '';
    let total = 0;
    
    cart.forEach(item => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;
        
        const cartItemEl = document.createElement('div');
        cartItemEl.classList.add('cart-item');
        
        cartItemEl.innerHTML = `
            <div class="item-info">
                <div class="item-image">
                    <img src="${item.image}" alt="${item.title}">
                </div>
                <div class="item-details">
                    <h4>${item.title}</h4>
                    <p>${item.price.toFixed(2)} dh</p>
                </div>
            </div>
            <div class="item-quantity">
                <button class="quantity-btn decrease" data-id="${item.id}">-</button>
                <span class="quantity">${item.quantity}</span>
                <button class="quantity-btn increase" data-id="${item.id}">+</button>
            </div>
            <div class="item-total">${itemTotal.toFixed(2)} dh</div>
        `;
        
        cartItems.appendChild(cartItemEl);
    });
    
    cartTotal.textContent = `${total.toFixed(2)} dh`;
    
   
    document.querySelectorAll('.quantity-btn.decrease').forEach(button => {
        button.addEventListener('click', decreaseQuantity);
    });
    
    document.querySelectorAll('.quantity-btn.increase').forEach(button => {
        button.addEventListener('click', increaseQuantity);
    });
}


function decreaseQuantity(event) {
    const productId = parseInt(event.target.getAttribute('data-id'));
    const cartItem = cart.find(item => item.id === productId);
    
    if (cartItem.quantity > 1) {
        cartItem.quantity -= 1;
    } else {
        cart = cart.filter(item => item.id !== productId);
    }
    
    updateCartCount();
    displayCartItems();
}


function increaseQuantity(event) {
    const productId = parseInt(event.target.getAttribute('data-id'));
    const cartItem = cart.find(item => item.id === productId);
    
    cartItem.quantity += 1;
    
    updateCartCount();
    displayCartItems();
}


cartIcon.addEventListener('click', () => {
    displayCartItems();
    cartModal.style.display = 'flex';
});

closeCart.addEventListener('click', () => {
    cartModal.style.display = 'none';
});

cartModal.addEventListener('click', (event) => {
    if (event.target === cartModal) {
        cartModal.style.display = 'none';
    }
});


displayProducts();
updateCartCount();
