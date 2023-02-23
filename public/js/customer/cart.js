const containers = document.querySelectorAll(".quantity-container");
containers.forEach((container) => {
  const display = container.querySelector(".quantity-display");
  const cartid = container.querySelector("#updatecart_id").value;
  var agentid = document.getElementById('agent').value;
  var quantity = parseInt(display.textContent);

 //if the quantity is less than delete the item from the cart
  if (quantity < 1) {
    deleteitem(cartid,agentid);
  }
  //else give access to the customer to add or remove the quantity
  container.addEventListener("click", (event) => {
    if (event.target.matches(".quantity-button")) {
      const action = event.target.getAttribute("data-action");
      if (action === "add") {
        quantity++;
      } else {
        if (quantity > 0) {
          quantity--;
        }
      }
      display.textContent = quantity;
      console.log(cartid);
      console.log(quantity);
      console.log(agentid);
      updatecart(cartid,agentid,quantity);
    }
  });
});

const deliveryCheckbox = document.getElementById('delivery');
const nodeliveryCheckbox = document.getElementById('nodelivery');

const form = document.getElementById('delivery-form');
form.addEventListener('submit', function(event) {
  if (!deliveryCheckbox.checked && !nodeliveryCheckbox.checked) {
    event.preventDefault();
    alert('Please select at least one delivery option.');
  }
});

// const deliveryFeeElement = document.getElementById("deliveryfee");
// const totalElement = document.getElementById("total");

// const deliveryFee = parseFloat(deliveryFeeElement.getAttribute("value"));
// const total = parseFloat(totalElement.getAttribute("value"));

deliveryCheckbox.addEventListener('change', () => {
    if (deliveryCheckbox.checked) {
        nodeliveryCheckbox.disabled = true;
    } else {
        nodeliveryCheckbox.disabled = false;
    }
});

nodeliveryCheckbox.addEventListener('change', () => {
    if (nodeliveryCheckbox.checked) {
        deliveryCheckbox.disabled = true;
    } else {
        deliveryCheckbox.disabled = false;
    }
});

function updatecart(cartid,agentid,quantity){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //auto refresh the page after 1 second to update the cart quantity and total price 
            setTimeout(function(){ location.reload(); }, 1000);

        }
    };
    xhttp.open("POST","http://localhost:8001/controller/customer/addtocart_controller.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("cart_id=" + cartid + "&quantity=" + quantity + "&agent_id=" + agentid+"&updatecartquantity=update");
    
}
function deleteitem(cartid,agentid){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //auto refresh the page after 1 second to update the cart quantity and total price 
            setTimeout(function(){ location.reload(); }, 500);

        }
    };
    xhttp.open("POST","http://localhost:8001/controller/customer/addtocart_controller.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id="+cartid+"&agent="+agentid+"&dcartitem=delete");
    
}