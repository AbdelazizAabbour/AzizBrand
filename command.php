<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AzizBrand - Boutique en ligne</title>
    
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Lora:wght@600;700&family=Poppins:wght@400;500;600;700&display=swap");
        
        :root {
            --primary-color: #2f2f2f;
            --text-dark: #18181b;
            --text-light: #71717a;
            --white: #ffffff;
            --max-width: 1200px;
            --header-font: "Lora", serif;
            --body-font: "Poppins", sans-serif;
            --accent-color: #9f7e54;
            --bg-light: #f8f8f8;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }
        
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: var(--body-font);
        }
        
        body {
            background-color: var(--bg-light);
            color: var(--text-dark);
            line-height: 1.6;
        }
        
        header {
            background-color: var(--primary-color);
            padding: 1.2rem 5%;
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .header-container {
            max-width: var(--max-width);
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-family: var(--header-font);
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--white);
            letter-spacing: 1px;
            text-decoration: none;
        }
        
        .cart-icon {
            position: relative;
            cursor: pointer;
            font-size: 1.5rem;
            color: var(--white);
            transition: transform 0.3s ease;
        }
        
        .cart-icon:hover {
            transform: scale(1.1);
        }
        
        .cart-count {
            position: absolute;
            top: -10px;
            right: -12px;
            background-color: var(--accent-color);
            color: var(--white);
            border-radius: 50%;
            width: 22px;
            height: 22px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 0.8rem;
            font-weight: 600;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        
        main {
            max-width: var(--max-width);
            margin: 3rem auto;
            padding: 0 5%;
        }
        
        .section-title {
            font-family: var(--header-font);
            font-size: 2.2rem;
            margin-bottom: 2rem;
            color: var(--text-dark);
            text-align: center;
            position: relative;
            padding-bottom: 15px;
        }
        
        .section-title::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: var(--accent-color);
        }
        
        .products {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2.5rem;
        }
        
        .product {
            background-color: var(--white);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            position: relative;
        }
        
        .product:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }
        
        .product-image {
            height: 240px;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }
        
        .product-image img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .product:hover .product-image img {
            transform: scale(1.05);
        }
        
        .product-info {
            padding: 1.5rem;
        }
        
        .product-title {
            font-family: var(--header-font);
            font-size: 1.3rem;
            margin-bottom: 0.8rem;
            color: var(--text-dark);
        }
        
        .product-price {
            font-weight: 600;
            color: var(--accent-color);
            margin-bottom: 1.5rem;
            font-size: 1.2rem;
        }
        
        .add-to-cart {
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 1rem;
            letter-spacing: 0.5px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
        }
        
        .add-to-cart:hover {
            background-color: var(--accent-color);
            transform: translateY(-2px);
        }
        
        .cart-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            backdrop-filter: blur(5px);
        }
        
        .cart-content {
            background-color: var(--white);
            width: 90%;
            max-width: 700px;
            border-radius: 12px;
            padding: 2.5rem;
            max-height: 85vh;
            overflow-y: auto;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            animation: slideUp 0.3s ease;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .cart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #eaeaea;
        }
        
        .cart-header h2 {
            font-family: var(--header-font);
            color: var(--text-dark);
            font-size: 1.8rem;
        }
        
        .close-cart {
            background: none;
            border: none;
            font-size: 2rem;
            cursor: pointer;
            color: var(--text-light);
            transition: color 0.3s ease;
        }
        
        .close-cart:hover {
            color: var(--text-dark);
        }
        
        .cart-items {
            margin-bottom: 2rem;
        }
        
        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.2rem 0;
            border-bottom: 1px solid #eaeaea;
        }
        
        .item-info {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            flex: 1;
        }
        
        .item-image {
            width: 80px;
            height: 80px;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .item-image img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }
        
        .item-details h4 {
            font-family: var(--header-font);
            color: var(--text-dark);
            margin-bottom: 6px;
        }
        
        .item-details p {
            color: var(--text-light);
        }
        
        .item-quantity {
            display: flex;
            align-items: center;
            margin: 0 2rem;
        }
        
        .quantity-btn {
            background-color: #f5f5f5;
            color: var(--text-dark);
            border: none;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.2s ease;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .quantity-btn:hover {
            background-color: var(--accent-color);
            color: var(--white);
        }
        
        .quantity {
            margin: 0 1rem;
            color: var(--text-dark);
            font-weight: 500;
            min-width: 20px;
            text-align: center;
        }
        
        .item-total {
            font-weight: 600;
            color: var(--accent-color);
            font-size: 1.1rem;
            min-width: 100px;
            text-align: left;
        }
        
        .cart-total {
            display: flex;
            justify-content: space-between;
            font-size: 1.4rem;
            font-weight: 600;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 2px solid #eaeaea;
            color: var(--text-dark);
        }
        
        .checkout-btn {
            background-color: var(--accent-color);
            color: var(--white);
            border: none;
            padding: 1rem;
            border-radius: 8px;
            width: 100%;
            margin-top: 1.5rem;
            cursor: pointer;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        
        .checkout-btn:hover {
            background-color: var(--primary-color);
            transform: translateY(-2px);
        }
        
        .empty-cart {
            text-align: center;
            padding: 3rem 0;
            color: var(--text-light);
            font-size: 1.2rem;
        }
        
        .empty-cart i {
            font-size: 4rem;
            margin-bottom: 1rem;
            display: block;
            opacity: 0.3;
        }
     
body {
  font-family: var(--body-font);
  background-color: var(--bg-light);
  margin: 0;
  padding: 0;
}

.contact-section {
  display: flex;
  justify-content: center;
  padding: 4rem 1rem;
  background-color: var(--bg-light);
}

.form-container {
  background: var(--white);
  padding: 2rem;
  border-radius: 12px;
  box-shadow: var(--shadow);
  max-width: 500px;
  width: 100%;
}

form {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

label {
  font-weight: bold;
  color: var(--text-dark);
}

input,
textarea {
  padding: 0.75rem;
  border: 1px solid #ddd;
  border-radius: 8px;
  font-family: var(--body-font);
  font-size: 1rem;
  transition: border-color 0.3s ease;
}

input:focus,
textarea:focus {
  outline: none;
  border-color: var(--accent-color);
}

button {
  padding: 0.75rem;
  background-color: var(--accent-color);
  color: var(--white);
  border: none;
  border-radius: 8px;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #8b6e45;
}

        @media (max-width: 768px) {
            .products {
                grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
                gap: 1.5rem;
            }
            
            .cart-content {
                width: 95%;
                padding: 1.5rem;
            }
            
            .item-image {
                width: 60px;
                height: 60px;
            }
            
            .item-total {
                min-width: 70px;
                font-size: 1rem;
            }
            
            .cart-item {
                flex-wrap: wrap;
            }
            
            .item-quantity {
                margin: 1rem 0 0 0;
                width: 100%;
                justify-content: flex-end;
            }
        }
        .cart-modal button a{
            color: var(--white);
            font-weight: var(--body-font);
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header>
        <div class="header-container">
            <a href="./index.html" class="logo">AzizBrand</a>
            <div class="cart-icon" id="cartIcon">
                🛒
                <span class="cart-count" id="cartCount">0</span>
            </div>
        </div>
    </header>
    
    <main>
        <h2 class="section-title">Nos Produits</h2>
        <div class="products" id="productsContainer">
            <!-- Products will be added dynamically with JavaScript -->
        </div>
    </main>
    
    <div class="cart-modal" id="cartModal">
        <div class="cart-content">
            <div class="cart-header">
                <h2>Panier</h2>
                <button class="close-cart" id="closeCart">×</button>
            </div>
            <div class="cart-items" id="cartItems">
                <!-- Cart items will be added dynamically -->
            </div>
            <div class="cart-total">
                <span>Total:</span>
                <span id="cartTotal">0.00 dh</span>
            </div>
            <button class="checkout-btn" id="checkoutBtn" type="submit"><a href="send.php">Commander</a></button>
        </div>
    </div>



    

    
    <script>
        // Product data
        const products = [
            {
                id: 1,
                title: "Chaise nordique",
                price: 699.99,
                image: "assets/craft-2.png"
            },
            {
                id: 2,
                title: "Chaise nordique",
                price: 1299.99,
                image: "assets/craft-1.png"
            },
            {
                id: 3,
                title: "Chaise nordique",
                price: 149.99,
                image: "assets/craft-2.png"
            },
            {
                id: 4,
                title: "Chaise nordique",
                price: 249.99,
                image: "assets/craft-1.png"
            },
            {
                id: 5,
                title: "Fauteuil à dossier ailé",
                price: 599.99,
                image: "assets/craft-2.png"
            },
            {
                id: 6,
                title: "Chaise nordique",
                price: 99.99,
                image: "assets/craft-1.png"
            }
        ];
        
        // Cart data
        let cart = [];
        
        // DOM elements
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
        
        // Show animation when product is added to cart
        function showAddedToCartAnimation(button) {
            const originalText = button.innerHTML;
            button.innerHTML = '<span> Ajouté</span>';
            button.style.backgroundColor = '#4CAF50';
            
            setTimeout(() => {
                button.innerHTML = originalText;
                button.style.backgroundColor = '';
            }, 1000);
        }
        
        // Update cart count
        function updateCartCount() {
            const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
            cartCount.textContent = totalItems;
        }
        
        // Display cart items
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
            
            // Add event listeners to quantity buttons
            document.querySelectorAll('.quantity-btn.decrease').forEach(button => {
                button.addEventListener('click', decreaseQuantity);
            });
            
            document.querySelectorAll('.quantity-btn.increase').forEach(button => {
                button.addEventListener('click', increaseQuantity);
            });
        }
        
        // Decrease item quantity
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
        
        // Increase item quantity
        function increaseQuantity(event) {
            const productId = parseInt(event.target.getAttribute('data-id'));
            const cartItem = cart.find(item => item.id === productId);
            
            cartItem.quantity += 1;
            
            updateCartCount();
            displayCartItems();
        }
        
        // Event listeners
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
        
        // Initialize
        displayProducts();
        updateCartCount();
    </script>
</body>
</html>