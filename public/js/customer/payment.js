function pay(agentid){
    var x=new XMLHttpRequest();
    x.onreadystatechange=function(){
        if(x.readyState==4){
            var text=x.responseText;

            if(text=="failed"){
                alert("Qunatity not enough to provide service");
            }else{
                //alert("Payment Successfull");
                // window.location.href="http://localhost:8001/customer/payment.php";
            // Payment completed. It can be a successful failure.
            payhere.onCompleted = function onCompleted() {
                alert("Payment completed");
                // Note: validate the payment and show success or failure page to the customer
            };

            // Payment window closed
            payhere.onDismissed = function onDismissed() {
                // Note: Prompt user to pay again or show an error page
                SpeechRecognitionAlternative("Payment dismissed");
            };

            // Error occurred
            payhere.onError = function onError() {
                // Note: show an error page
               alert("Error Occured");
            };

            // Put the payment variables here
            var payment = {
                "sandbox": true,
                "merchant_id": "1222509",    // Replace your Merchant ID
                "return_url": undefined,     // Important
                "cancel_url": undefined,     // Important
                "notify_url": "http://sample.com/notify",
                "order_id": "ItemNo12345",
                "items": "Door bell wireles",
                "amount": "1000.00",
                "currency": "LKR",
                "hash": "", // *Replace with generated hash retrieved from backend
                "first_name": "Saman",
                "last_name": "Perera",
                "email": "samanp@gmail.com",
                "phone": "0771234567",
                "address": "No.1, Galle Road",
                "city": "Colombo",
                "country": "Sri Lanka",
                "delivery_address": "No. 46, Galle road, Kalutara South",
                "delivery_city": "Kalutara",
                "delivery_country": "Sri Lanka",
                "custom_1": "",
                "custom_2": ""
                };

                // Show the payhere.js popup, when "PayHere Pay" is clicked
                //document.getElementById('payhere-payment').onclick = function (e) {
                    payhere.startPayment(payment);
                //};
            }
        }
    }
    x.open("GET","http://localhost:8001/controller/customer/payment_controller.php?id"+agentid,true);
    x.send();
}